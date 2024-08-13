<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function home(){
        $products = Product::paginate(8);
        return view('home.index', compact('products'));
    }

    public function dashboard (){
        $products = Product::paginate(8);
        return view('home.index', compact('products'));
    }
    public function show_products(){
        $products = Product::all();
        return view('home.show_products', compact('products'));
    }

    public function product_details($id){
        $product = Product::find($id);
        return view('home.product_details', compact('product'));
    }
}
