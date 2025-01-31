<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductClass;
use App\Models\ProductGroup;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('ProductClass', 'ProductGroup')->latest()->get();
        // return $products;
        return view('admin.product.index', [
            'title' => 'Produk',
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create', [
            'product_classes' => ProductClass::all(),
            'product_groups' => ProductGroup::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $validatedData = $request->validate([
            'product_name' => 'required|max:40',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'description' => 'required|max:64',
            'product_class_id' => 'required',
            'product_group_id' => 'required',
        ]);
        // simpan ke database
        Product::create($validatedData);

        return redirect(route('admin.product.index'))->with('success', 'New Product has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        // return $product;
        return view('admin.product.edit', [
            'title' => 'Produk',
            'product' => $product,
            'product_class' => ProductClass::all(),
            'product_group' => ProductGroup::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $product;
        $validatedData = $request->validate([
            'product_name' => 'required|max:40',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'description' => 'required|max:64',
            'product_class_id' => 'required',
            'product_group_id' => 'required',
        ]);
        // Update ke database
        Product::where('id', $id)->update($validatedData);

        return redirect(route('admin.product.index'))->with('success', 'Product has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Order::where('product_id', $product->id)->delete();
        Product::destroy($id);
        return redirect(route('admin.product.index'))->with('success', 'Product has been deleted!');
    }
}
