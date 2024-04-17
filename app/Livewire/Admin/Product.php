<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product as ProductModel;
use App\Models\Category;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Storage;

class Product extends Component
{
    use WithFileUploads;

    public $name, $image, $description;
    public $categories = [];
    public $category;
    public $updateProduct = false;
    public $selectedProductId;
    public $previousImagePath;

    protected $rules = [
        'name' => 'required',
        'image' => 'required|image|max:1024',
        'description' => 'nullable',
        'category' => 'required',
    ];

    public function mount()
    {
        $this->name = '';
        $this->categories =Category::select('name', 'id')->get();
    }

    #[Layout('components.layouts.app')]
    #[Title('Products')]
    public function render()
    {
        $products = ProductModel::all();
        return view('livewire.admin.product',compact('products'));
    }

    public function resetFields()
    {
        $this->name = '';
        $this->image = '';
        $this->description = '';
    }

    public function cancel()
    {
        $this->updateProduct = false;
        $this->resetFields();
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
            $this->resetFields(); // Reset form fields
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
        $this->category = $product->category_id;
        $this->updateProduct = true;
    }

    public function update()
{
    
    
    // Validate the form inputs
    $validatedData =  $this->validate([
        'name' => 'required',
        'image' => 'nullable|image|max:1024', // Allow image to be nullable for not updating it
        'description' => 'nullable',
        'category' => 'required',
    ]);

    try {
        $product = ProductModel::find($this->selectedProductId);
        $product->name = $validatedData['name'];
        $product->category = $validatedData['category'];
        $product->name = $this->name;
        $product->category_id = $this->category;

        if ($this->image) {
            Storage::disk('public')->delete($this->previousImagePath);
            $imagePath = $this->image->store('images', 'public');
            $product->image = $imagePath; // Update image_path to image
        }

        $product->description = $this->description;

        $product->save();

        session()->flash('success', 'Product updated successfully!');

        $this->resetFields();
        $this->updateProduct = false;
    } catch (\Exception $e) {
        session()->flash('error', 'Something went wrong while updating the product!');
        $this->resetFields();
    }
}

   
}
