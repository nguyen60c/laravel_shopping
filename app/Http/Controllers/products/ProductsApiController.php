<?php

namespace App\Http\Controllers\products;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsApiController extends Controller
{

    /*
     * Get all products
     */
    public function index(){
        $products = Product::all();
        return $products;
    }

    /*
     * Get specified product by id
     */
    public function searchById($id){
        $product = Product::find($id);
        return $product;
    }

    /*
     * Change amount of products
     */
    public function buyProduct($id,Request $request, User $user){
        $product = Product::find($id);
        $product->quantity = ($product->quantity - $request->amount);
        $product->save();
        return redirect()->route('products.showProducts');
    }
}
