<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::get();
        return view('category.index', ['categories' => $categories]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $products = $category->products;
        return view('category.show_products', compact('category', 'products'));
    }

    public function user_show_products(Category $category, $uid)
    {
        $products = $category->products;
        $user = User::find($uid);
        return view('category.user_show_products', compact('category', 'products'), ['uid' => $user->id]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $category = Category::find($id);
        // Storage::delete('images/' . $category->product_picture);
        // $image = $request->file('product_picture');
        // $image_name = time() . '.' . $image->getClientOriginalExtension();
        // $image->move('images', $image_name);

        $category->update($request->except('_method', '_token'));
        // DB::table('products')->where('product_id', $category->product_id)->update([
        //     'product_picture' => $image_name
        // ]);
        return redirect()->route('product.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->update($request->except('_method', '_token'));
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        // Storage::delete('images/' . $category->product_picture);
        $category->delete();
        return redirect()->route('category.index');
    }

    // public function showProducts(Category $category)
    // {
    //     $products = $category->products;

    //     return view('category.products', compact('category', 'products'));
    // }

    public function user_categories($uid)
    {
        // return view('category.user_categories');
        $categories = Category::get();
        $user = User::find($uid);
        return view('category.user_categories', ['categories' => $categories], ['uid' => $user->id]);
    }
}
