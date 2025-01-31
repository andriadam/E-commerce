<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductClass;
use App\Models\ProductGroup;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // return $request;
        if (isset($request->class_id)) {
            $product = Product::where('product_class_id', $request->class_id)->get();
        } elseif (isset($request->group_id)) {
            $product = Product::where('product_group_id', $request->group_id)->get();
        } else {
            $product = Product::all();
        }
        // $product = Product::where('product_class_id', $request->class_id)->get();

        // return $product;
        return view('user.product.index', [
            'title' => 'Produk',
            'products' => $product,
            'product_classes' => ProductClass::all(),
            'product_groups' => ProductGroup::all()
        ]);
    }


    public function show(string $id)
    {
        $product = Product::with('productGroup', 'productClass')->find($id);
        // return $product;
        return view('user.product.show', [
            'title' => 'Detail Produk',
            'product' => $product
        ]);
    }
}
