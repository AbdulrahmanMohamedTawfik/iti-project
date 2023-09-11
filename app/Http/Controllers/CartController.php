<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($uid)
    {
        $items = CartItem::with('product')->get();
        // $products = $items->products;

        $user = User::find($uid);
        return view('cart.index', ['items' => $items], ['uid' => $user->id]);
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
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    function destroy($cid, $uid)
    {
        $item = CartItem::find($cid);
        $items = CartItem::with('product')->get();
        $user = User::find($uid);
        $item->delete();
        return redirect()->route('cart.index', ['items' => $items, 'uid' => $user->id]);
    }

    // public function addToCart(Request $request, $productId)
    // {
    //     // Validate the request
    //     $request->validate([
    //         'quantity' => 'required|numeric|min:1',
    //     ]);

    //     // Retrieve the product
    //     $product = Product::findOrFail($productId);

    //     // Check if the product is already in the cart for the current user
    //     $cartItem = CartItem::where('user_id', auth()->id())
    //         ->where('product_id', $product->id)
    //         ->first();

    //     if ($cartItem) {
    //         // If the product is already in the cart, update the quantity
    //         $cartItem->update([
    //             'quantity' => $cartItem->quantity + $request->input('quantity'),
    //         ]);
    //     } else {
    //         // If the product is not in the cart, create a new cart item
    //         CartItem::create([
    //             'user_id' => auth()->id(),
    //             'product_id' => $product->id,
    //             'quantity' => $request->input('quantity'),
    //         ]);
    //     }

    //     // Redirect back to the product page or cart page
    //     return redirect()->route('products.show', $productId)->with('success', 'Product added to cart.');
    // }
    public function addToCart(Request $request, $productId, $uid)
    {
        // Retrieve the product
        $product = Product::where('id', $productId)->first();
        // Check if the product is already in the cart for the current user
        // print_r($product->price);
        $cartItem = CartItem::where('user_id', $uid)
            ->where('product_id', $productId)
            ->first();
        if ($cartItem) {
            // If the product is already in the cart, update the quantity
            $cartItem->update([
                'quantity' => $cartItem->quantity + $request->input('quantity'),
                'total_price' => $cartItem->total_price + $product->price * $request->input('quantity')
            ]);
        } else {
            // If the product is not in the cart, create a new cart item
            CartItem::create([
                'user_id' => $uid,
                'product_id' => $productId,
                'quantity' => $request->input('quantity'),
                'total_price' => ($product->price * $request->input('quantity'))
            ]);
        }

        // Redirect back to the product page or cart page
        return redirect()->route('user.profile', ['id' => $uid]);
    }
}
