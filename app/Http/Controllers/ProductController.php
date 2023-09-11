<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    function index()
    {
        $products = Product::get();
        return view('product.index', ['products' => $products]);
    }
    function show($id)
    {
        $product = Product::find($id);
        return view('product.show', compact('product'));
    }
    function destroy($id)
    {
        $product = Product::find($id);
        Storage::delete('images/' . $product->product_picture);
        $product->delete();
        return redirect()->route('product.index');
    }
    function update($id)
    {
        $product = Product::find($id);
        return view('product.update', compact('product'));
    }

    function edit(Request $request, $id)
    {
        $product = Product::find($id);
        Storage::delete('images/' . $product->product_picture);
        $image = $request->file('picture');
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        $image->move('images', $image_name);

        $product->update($request->except('_method', '_token'));
        DB::table('products')->where('id', $product->id)->update([
            'picture' => $image_name
        ]);
        return redirect()->route('product.index');
    }

    public function store(Request $request)
    {
        $image = $request->file('picture');
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        $image->move('images', $image_name);

        $product = Product::create($request->all());
        DB::table('products')->where('id', $product->id)->update([
            'picture' => $image_name
        ]);
        return redirect()->route('product.index');
    }

    public function user_products($uid)
    {
        // $user = User::find($id);
        // $product = Product::find($pid);
        $products = Product::get();
        $user = User::find($uid);
        return view('product.user_products', ['products' => $products], ['uid' => $user->id]);
    }

    public function product_search(Request $request, $uid)
    {
        // print_r($request->all());
        $query = $request->input('query');
        $user = User::find($uid);
        if ($query) {
            // ->orWhere('description', 'like', "%$query%")
            $products = Product::where('name', 'like', "%$query%")->get();
        } else {
            // If no query is provided, retrieve all products
            $products = Product::all();
        }

        return view('product.user_products', ['products' => $products], ['uid' => $user->id]);
    }
    // public function user_show_products(Category $category, $uid)
    // {
    //     $products = $category->products;
    //     $user = User::find($uid);
    //     return view('category.user_show_products', compact('category', 'products'), ['uid' => $user->id]);
    // }
}
