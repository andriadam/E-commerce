<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Order;
use App\Models\OrdersDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cartList()
    {
        $cartItems = \Cart::getContent();
        $discounts = Discount::latest()->get();
        // return $discounts;
        return view('user.cart.list', compact('cartItems', 'discounts'));
    }


    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('user.cart.list');
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );
        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('user.cart.list');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('user.cart.list');
    }

    public function clearAllCart()
    {
        \Cart::clear();
        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('user.cart.list');
    }


    public function useDiscount(Request $request)
    {
        // return $request;
        // Mengambil isi keranjang
        $cartItems = \Cart::getContent();

        $totalAfterDiscount = null;
        if ($request->code) {
            $disc = $this->calculateDiscount($request->code)['disc'];
            $totalAfterDiscount = $this->calculateDiscount($request->code)['totalAfterDiscount'];
        }
        $code = $request->code;
        $cartItems = \Cart::getContent();
        $discounts = Discount::latest()->get();
        // return $discount;

        return view('user.cart.list', compact('totalAfterDiscount', 'cartItems', 'discounts', 'disc', 'code'));
    }

    public function storeOrderFromCart(Request $request)
    {
        // return $request;
        if (!empty($request->code)) {
            $discount = Discount::whereCode($request->code)->first();
            $disc = $this->calculateDiscount($request->code)['disc'];
            $totalAfterDiscount = $this->calculateDiscount($request->code)['totalAfterDiscount'];
        } else {
            $disc = 0;
            $totalAfterDiscount = \Cart::getTotal();
        }
        // Menyimpan Order di dalam tabel order
        $order = Order::create([
            'user_id' => Auth::user()->id,
            'discount_id' => $discount->id ?? null,
            'discount' => $disc,
            'total' => $totalAfterDiscount,
        ]);

        // Mengambil isi keranjang
        $cartItems = \Cart::getContent();

        // Menyimpan data ke tabel order_detail dari keranjang
        foreach ($cartItems as $items => $value) {
            $orderDetail = new OrdersDetail();
            $orderDetail->order_id = $order->id;
            $orderDetail->product_id = $value->id;
            $orderDetail->quantity = $value->quantity;
            $orderDetail->save();
        };

        // Mengirimkan pesan berhasil dan jumlah pembayaran
        session()->flash('successOrder', $totalAfterDiscount);

        // clear cart
        \Cart::clear();

        return redirect()->route('user.order.index');
    }

    public function calculateDiscount($code)
    {
        $discount = Discount::whereCode($code)->first();
        $discount_percentage = $discount->percentage ?? 0;
        $max_disc = $discount->max_disc ?? 0;


        $disc = \Cart::getTotal() * ($discount_percentage / 100);
        if ($disc > $max_disc) {
            $disc = $max_disc;
        }

        return ([
            'totalAfterDiscount' => \Cart::getTotal() - $disc,
            'disc' => $disc
        ]);
    }
}
