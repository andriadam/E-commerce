<?php

namespace App\Http\Controllers;

use App\Models\ProductGroup;
use Illuminate\Http\Request;

class AdminProductGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_groups = ProductGroup::with('Product')->latest()->get();
        // return $product_groups;
        return view('admin.product_group.index', [
            'title' => 'Grup Produk',
            'product_groups' => $product_groups
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product_group.create', [
            'title' => 'Grup Produk',
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
            'group_name' => 'required|max:40'
        ]);
        // simpan ke database
        ProductGroup::create($validatedData);

        return redirect(route('admin.productGroup.index'))->with('success', 'New Product Group has been added!');
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
    public function edit(ProductGroup $productGroup)
    {
        return view('admin.product_group.edit', [
            'title' => 'Grup Produk',
            'product_group' => $productGroup,
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
        // return $request;
        // Cek data request
        $validatedData = $request->validate([
            'group_name' => 'required|max:40'
        ]);

        // update ke database
        ProductGroup::where('id', $id)->update($validatedData);

        return redirect(route('admin.productGroup.index'))->with('success', 'New Product Group has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductGroup::destroy($id);
        return redirect(route('admin.productGroup.index'))->with('success', 'Product Group has been deleted!');
    }
}
