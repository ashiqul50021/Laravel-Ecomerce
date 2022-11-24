<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use PDF;

class AdminController extends Controller
{
    public function view_category()
    {
        $categories = Category::all();
        return view('admin.category', compact('categories'));
    }

    public function add_category(Request $request)
    {
        $data = new Category();
        $data->category_name = $request->category;
        $data->save();
        return redirect()->back()->with('message', 'Category Added Successfully');
    }

    public function edit_category($id)
    {
        $categories = Category::find($id);
        return view('admin.categoryEdit', compact('categories'));
    }
    public function update_category(Request $request, $id)
    {
        $categories = Category::find($id);
        $categories->category_name = $request->category_name;
        $categories->save();
        return redirect()->back()->with('message', 'category updated Successfully!');
    }

    public function delete_category($id)
    {
        $categories = Category::find($id);
        $categories->delete();
        return redirect()->back()->with('message', 'category deleted successfully!');
    }


    public function view_product()
    {
        $categories = Category::all();
        return view('admin.product', compact('categories'));
    }

    public function add_product(Request $request)
    {
        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->quantity = $request->quantity;
        $product->category = $request->category;
        $image = $request->image;
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('product', $imageName);
        $product->image = $imageName;
        $product->save();
        return redirect()->back()->with('message', 'Product Added Successfully!');
    }

    public function show_product()
    {
        $products = Product::all();
        return view('admin.show_product', compact('products'));
    }

    public function delete_product($id)
    {
        $products = Product::find($id);
        $products->delete();
        return redirect()->back();
    }

    public function update_product($id)
    {
        $products = Product::find($id);
        $categories = Category::all();
        return view('admin.update_product', compact('products', 'categories'));
    }

    public function update_product_confirm(Request $request, $id)
    {
        $products = Product::find($id);
        $products->title = $request->title;
        $products->description = $request->description;
        $products->price = $request->price;
        $products->discount_price = $request->discount_price;
        $products->quantity = $request->quantity;
        $products->category = $request->category;
        $image = $request->image;
        if ($image) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('product', $imageName);
            $products->image = $imageName;
        }
        $products->save();
        return redirect()->back()->with('message', 'Product updated Successfully!');
    }


    public function order()
    {
        $orders = Order::all();
        return view('admin.order', compact('orders'));
    }

    public function delivered($id)
    {
        $orders = Order::find($id);
        $orders->delivery_status = "delivered";
        $orders->payment_status = "paid";
        $orders->save();
        return redirect()->back();
    }

    public function delete_orders($id)
    {
        $orders = Order::find($id);
        $orders->delete();
        return redirect()->back();
    }

    public function print_pdf($id)
    {
        $orders = Order::find($id);
        $pdf = PDF::loadView('admin.pdf', compact('orders'));
        return $pdf->download('order_details.pdf');
    }
}