<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\Category as CategoryModel;

class Category extends Component
{
    public $name;
    #[Layout('components.layouts.app')]
    #[Title('Category')]
    public function render()
    {
        $categories = CategoryModel::all();
        return view('livewire.admin.category',compact('categories'));
    }

    public function create()
    {
        $validatedData = $this->validate([
            'name'=>'required|unique:categories,name',
        ]);
        CategoryModel::create($validatedData);
        $this->name = '';
    }

    public function delete($id)
    {
        CategoryModel::find($id)->delete();
    }
}
