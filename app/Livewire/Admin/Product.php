<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product as ProductModel;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class Product extends Component
{
    use WithFileUploads;
    public $name, $image, $description, $category;
    public $categories = [];
    public $previousImagePath;
    public $selectedProductId;
    public $updateProduct = false;

    protected $rules = [
        'name' => 'required',
        'image' => 'required|image|max:1024',
        'description' => 'nullable',
        'category' => 'required',
    ];

    public function resetFields()
    {
        $this->name = '';
        $this->category = '';
        $this->image = '';
        $this->description = '';
    }

    public function mount()
    {
        $this->categories =Category::select('name', 'id')->get();
    }

    public function render()
    {
        $products = ProductModel::all();
        return view('livewire.admin.product',compact('products'))->layout('layouts.admin', ['title' => 'Products']);;
    }

    public function store()
    {
        $this->validate();
        try {
            $imagePath = $this->image->store('images', 'public');
            ProductModel::create([
                'name' => $this->name,
                'image' => $imagePath,
                'description' => $this->description,
                'category_id' => $this->category,
            ]);

            session()->flash('success','Product Created Successfully!!');
            $this->resetFields();
            $this->reset('image');
        } catch (\Exception $e) {
            session()->flash('error', 'Something went wrong while creating product!!');
            $this->resetFields();
        }

    }

    public function edit($productId)
    {
        $product = ProductModel::find($productId);

        $this->name = $product->name;
        $this->description = $product->description;
        $this->previousImagePath = $product->image;
        $this->selectedProductId = $productId;
        $this->category = $product->category_id;
        $this->updateProduct = true;
    }

    public function update()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'image' => 'nullable|image|max:1024', // Allow image to be nullable for not updating it
            'description' => 'nullable',
            'category' => 'required',
        ]);
    
        try {
            $product = ProductModel::find($this->selectedProductId);
    
            if (!$product) {
                session()->flash('error', 'Product not found!');
                return;
            }
    
            $product->name = $validatedData['name'];
            $product->category_id = $validatedData['category'];
    
            if ($this->image) {
                if ($product->image && Storage::disk('public')->exists($product->image)) {
                    Storage::disk('public')->delete($product->image);
                }
                $imagePath = $this->image->store('images', 'public');
                $product->image = $imagePath;
            }
    
            $product->description = $this->description;
    
            $product->save();
    
            session()->flash('success', 'Product updated successfully!');
    
            $this->resetFields();
            $this->updateProduct = false;
        } catch (\Exception $e) {
            dd($e->getMessage());
            session()->flash('error', 'Something went wrong while updating the product!');
            $this->resetFields();
        }
    }
    


    public function cancel()
    {
        $this->updateProduct = false;
        $this->resetFields();
    }

    public function delete($id)
    {
        ProductModel::find($id)->delete();
    }

}