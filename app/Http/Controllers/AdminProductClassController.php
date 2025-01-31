<?php

namespace App\Http\Controllers;

use App\Models\ProductClass;
use Illuminate\Http\Request;

class AdminProductClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_classes = ProductClass::with('Product')->latest()->get();
        // return $product_classes;
        return view('admin.product_class.index', [
            'title' => 'Produk',
            'product_classes' => $product_classes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product_class.create', [
            'title' => 'Produk',
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
            'class_name' => 'required|max:40'
        ]);
        // simpan ke database
        ProductClass::create($validatedData);

        return redirect(route('admin.productClass.index'))->with('success', 'New Product Class has been added!');
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
    public function edit(ProductClass $productClass)
    {
        return view('admin.product_class.edit', [
            'title' => 'Kelas Produk',
            'product_class' => $productClass,
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
        // Cek data request
        $validatedData = $request->validate([
            'class_name' => 'required|max:40'
        ]);

        // update ke database
        ProductClass::where('id', $id)->update($validatedData);

        return redirect(route('admin.productClass.index'))->with('success', 'New Product Class has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductClass::destroy($id);
        return redirect(route('admin.productClass.index'))->with('success', 'Product Class has been deleted!');
    }
}
