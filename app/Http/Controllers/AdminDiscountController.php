<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;

class AdminDiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discounts = Discount::all();
        return view('admin.discount.index', [
            'title' => 'Diskon',
            'discounts' => $discounts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.discount.create');
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
            'name' => 'required|max:40',
            'code' => 'required',
            'description' => 'required|max:64',
            'percentage' => 'required|numeric',
            'max_disc' => 'required|numeric',
        ]);
        // simpan ke database
        Discount::create($validatedData);

        return redirect(route('admin.discount.index'))->with('success', 'New Discount has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function show(Discount $discount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function edit(Discount $discount)
    {
        return view('admin.discount.edit', [
            'discount' => $discount
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Discount $discount)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:40',
            'code' => 'required',
            'description' => 'required|max:64',
            'percentage' => 'required|numeric',
            'max_disc' => 'required|numeric',
        ]);

        // Update di database
        $discount->update($validatedData);

        return redirect(route('admin.discount.index'))->with('success', "Discount has been updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Discount $discount)
    {
        // Delete di database
        $discount->delete();

        return redirect(route('admin.discount.index'))->with('success', 'Discount has been deleted!');
    }
}
