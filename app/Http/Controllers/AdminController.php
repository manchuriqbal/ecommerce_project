<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class AdminController extends Controller
{

    public function index(){
        $user = User::where('usertype', 'user')->get()->count();
        $product = Product::all()->count();
        $order = Order::all()->count();
        $delivered = Order::where('status', 'delivered')->get()->count();
        return view('admin.index', compact('user', 'product', 'order', 'delivered'));
    }

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
            return redirect(route('product.view'));
        } else {
            toastr()->closeButton()->timeOut(5000)->warning('Field to Add Product. try again later!');
            return redirect()->back();
        }

    }


    public function view_products(){
        $product = Product::paginate(3);
        return view('admin.view_products', compact('product'));
    }


    public function edit_product($id){
        $categories = Category::all();
        $product = Product::find($id);
        return view('admin.edit_product', compact('product', 'categories'));
    }

    public function update_product(Request $request, $id){
        $product_data = Product::find($id);

        $product_data->name = $request->title;
        $product_data->description = $request->description;
        $product_data->price = $request->price;
        $product_data->category = $request->category;
        $product_data->quantity = $request->quantity;

        $image = $request->image;
        if ($image) {
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products', $image_name);
            $product_data->image = $image_name;
        }

        if ($product_data->save()) {
            toastr()->closeButton()->timeOut(5000)->success('Product Update successfully!');
            return redirect(route('product.view'));
        } else {
            toastr()->closeButton()->timeOut(5000)->warning('Field to Update Product. try again later!');
            return redirect(route('product.view'));
        }

    }

    public function delete_product($id){
        $product = Product::find($id);


        $image_path = public_path('products/'.$product->image);
        if (file_exists($image_path)) {
            unlink($image_path);
        }


        if ($product->delete()) {
            toastr()->closeButton()->timeOut(5000)->success('Product Delete successfully!');
            return redirect()->back();
        } else {
            toastr()->closeButton()->timeOut(5000)->warning('Field to Delete Product. try again later!');
            return redirect()->back();
        }


    }


    public function search_product (Request $request){

        $search = $request->search;

        $product = Product::where('name', 'LIKE', '%' .$search .'%')->paginate(3);

        return view('admin.view_products', compact('product'));

    }

    public function orders(){
        $datas = Order::all();
        return view('admin.orders', compact('datas'));
    }

    public function on_the_way($id){
        $data = Order::find($id);
        $data->status = "on_the_way";
        $data->save();
        return redirect()->back();
    }

    public function delivered($id){
        $data = Order::find($id);
        $data->status = "delivered";
        $data->save();
        return redirect()->back();
    }

    public function print_pdf($id){
        $data = Order::find($id);

        $pdf = Pdf::loadView('admin.invoice', compact('data'));
        return $pdf->download('invoice.pdf');
    }



}
