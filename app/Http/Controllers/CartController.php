<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    private $product;

    public function index()
    {
//        return session()->all();
        return view('website/cart/index', ['items' => Cart::content()]);
    }

    public function add(Request $request, $id)
    {
        $this->product = Product::find($id);
        $stockAmount = $this->product->stock_amount;

        if (Cart::count() > 0) {
            foreach (Cart::content() as $item) {
                if ($item->id == $id) {
                    $quantity = ($item->qty + $request->qty);
                    if ($stockAmount < $quantity) {
                        $request->merge(['qty' => $quantity]);
                    }
                }
            }
        }

        $this->validate($request, [
            'qty' => "required|numeric|min:1|max:$stockAmount",
        ], [
            'qty.max' => 'The quantity cannot be greater than ' . $stockAmount . '.'
        ]);

        session(['tax' => 0.15, 'shipping' => 100]);
        Cart::add([
            'id' => $id,
            'name' => $this->product->name,
            'qty' => $request->qty,
            'price' => $this->product->selling_price,
            'tax' => 10,
            'options' => [
                'slug' => $this->product->slug,
                'image' => $this->product->image,
                'category' => $this->product->category->name,
                'brand' => isset($this->product->brand->name) ? $this->product->brand->name : null
            ]]);
        return redirect()->route('cart.index');
    }

    public function addSingle(Request $request, $id)
    {
        $request->merge(['qty' => 1]);
        return $this->add($request, $id);
    }

    public function update(Request $request, $id)
    {
        $cartItem = Cart::get($id);

        $this->product = Product::find($cartItem->id);
        $stockAmount = $this->product->stock_amount;

        if (Cart::count() > 0) {
            foreach (Cart::content() as $item) {
                if ($item->id == $id) {
                    $quantity = ($item->qty + $request->qty);
                    if ($stockAmount < $quantity) {
                        $request->merge(['qty' => $quantity]);
                    }
                }
            }
        }

        $this->validate($request, [
            'qty' => "required|numeric|min:1|max:$stockAmount",
        ], [
            'qty.max' => 'The quantity cannot be greater than ' . $stockAmount . '.'
        ]);

        Cart::update($id, $request->qty);
        return back()->with('message', 'Your cart item has updated successfully.');
    }

    public function remove($id)
    {
        Cart::remove($id);
        return back()->with('message', 'Your cart item has removed successfully.');
    }
}
