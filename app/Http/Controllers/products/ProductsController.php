<?php

namespace App\Http\Controllers\products;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = product::latest()->paginate(10);

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file("img_product");
        $reImage = time() . "." . $image->getClientOriginalExtension();
        $dest = public_path("\imgs\products");
        $image->move($dest, $reImage);
        $request["img_product"] = $reImage;
        // $product = new Product();
        // $product->img_product = $request->img_product;
        // $product->title = $request->title;
        // $product->description = $request->description;
        // $product->price = $request->price;
        // $product->quantity = $request->quantity;
        // $product->save();
        product::create(array_merge(
            $request
                ->only('title', 'description', 'price', "quantity", "img_product"),
            [
                'user_id' => auth()->id()
            ]
        ));

        return redirect()->route('products.index')
            ->withSuccess(__('product created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', [
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->only('title', 'description', 'price', "quantity", "img_product"));

        return redirect()->route('products.index')
            ->withSuccess(__('product updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->withSuccess(__('product deleted successfully.'));
    }

    public function showProducts()
    {
        $products = product::latest()->paginate(10);

        return view('selling.index', compact('products'));
    }

    public function showDetailsProduct(Product $product){
        return view("selling.show", [
            'product' => $product
        ]);
    }

    public function buyProducts(Product $product,User $user)
    {
        if ($product->quantity > 0) {
            $product->quantity = ($product->quantity - 1);
            $specifiedUser = $user->find(auth()->user()->id);
            $specifiedUser->total += $product->price;
            $specifiedUser->save();
            $product->save();
        } else {
            return redirect()->route('products.showProducts')
                ->withError("This product is out of stock");
        }
        return redirect()->route('products.showProducts')
            ->with("This product is out of stock");
    }
}
