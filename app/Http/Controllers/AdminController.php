<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function create(){
        $categories = Category::all();
        return view('admin.category', compact('categories'));
    }

    public function store(Request $request){
        $category = new Category;

        $category->category_name = $request->category;
        $category->save();

        if ($category->save()) {
            return redirect()->back()->with('success', 'Category added successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to add category. Please try again.');
        }
    }
}
