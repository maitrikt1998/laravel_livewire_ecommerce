<?php

namespace App\Http\Controllers;

use App\Livewire\Admin\Product;
use App\Models\Product as ModelsProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::user()->user_type == "user"){
            return view('dashboard');
        }elseif(Auth::user()->user_type == "adm"){

            return redirect('admin/home');
        }
    }

    public function homepage()
    {
        $products = ModelsProduct::all();
        return view('welcome',compact('products'));
    }

   
}
