<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\Category as CategoryModel;

class Category extends Component
{
    public $name = '';

    protected $rules = [
        'name' => 'required'
    ];

    public function resetFields()
    {
        $this->name = '';
    }

    public function render()
    {
        $categories = CategoryModel::all();
        return view('livewire.admin.category', compact('categories'))->layout('layouts.admin', ['title' => 'Categories']);
    }

    public function create()
    {
        $this->validate();
        CategoryModel::create([
            'name' => $this->name
        ]);
        session()->flash('success','Category Created Successfully!!');
        $this->reset();
    }

    public function delete($id)
    {
        CategoryModel::find($id)->delete();
    }
}
