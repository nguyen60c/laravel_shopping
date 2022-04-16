<?php

namespace App\Http\Controllers\Carts;

use App\Http\Controllers\Controller;
use App\Http\Requests\carts\CartRequest;
use App\Models\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{

    /*
     * Get all cart product
     * Show view list cart
     */
    public function index()
    {
        $cartItems = \Cart::getContent();
        return view("carts.cart", compact("cartItems"));
    }

    /*
     * add cart
     */
    public function store(CartRequest $request)
    {
//        \Cart::add([
//            "id" => $request->id,
//            "name" => $request->title,
//            "price" => $request->price,
//            "description" => $request->description,
//            "quantity" => $request->quantity,
//            "attributes" => array(
//                "img" => $request->img_product
//            ),
//        ],$request->validated());
        \Cart::add($request->validated());
        session()->flash("success", "Product is Added to Cart Successfully !");

        return redirect()->route("cart.index");
    }

    /*
     * update
     */
    public function update(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                "relative" => false,
                "value" => $request->quantity
            ]
        );
        session()->flash('success', 'Item Cart is Updated Successfully !');
        return redirect().route("cart.index");
    }

    public function clearAllCart(){
        \Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect().route("cart.index");
    }
}
