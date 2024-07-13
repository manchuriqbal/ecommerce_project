<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
            toastr()->closeButton()->timeOut(5000)->success('Category Add successfully!');
            return redirect()->back();
        } else {
            toastr()->closeButton()->timeOut(5000)->warning('Field to Add Category. try again later!');
            return redirect()->back();
        }
    }
    public function delete($id){
        $data = Category::find($id);
        $data->delete();



        if ($data->delete()) {
            toastr()->closeButton()->timeOut(5000)->info('Category Delete successfully!');
            return redirect()->back();
        } else {
            toastr()->closeButton()->timeOut(5000)->warning('Category Delete successfully!');
            return redirect()->back();
        }

    }

    public function edit($id){
        $data = Category::find($id);
        return view('admin.edit_category', compact('data'));
    }

    public function update(Request $request, $id){
        $data = Category::find($id);

        $data->category_name = $request->category;
        $data->save();

        return redirect(route('category.create'));
    }

    public function add_product(){
        $categories = Category::all();
        return view('admin.add_product', compact('categories'));

    }

    public function store_product(Request $request){
        $products = new Product;

        $products->name = $request->title;
        $products->description = $request->description;
        $products->price = $request->price;
        $products->quantity = $request->quantity;
        $products->category = $request->category;
        $image = $request->image;
        if ($image) {
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products', $image_name);
            $products->image = $image_name;
        }

        $products->save();

        if ($products->save()) {
            toastr()->closeButton()->timeOut(5000)->success('Product Add successfully!');
            return redirect()->back();
        } else {
            toastr()->closeButton()->timeOut(5000)->warning('Field to Add Product. try again later!');
            return redirect()->back();
        }

    }

}
