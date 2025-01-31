<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('orderDetails')->where('user_id', Auth::user()->id)->latest()->get();
        // return $orders;
        return view('user.order.index', [
            'title' => 'Order',
            'orders' => $orders
        ]);
    }

    public function show(string $id)
    {
        $order = Order::with('orderDetails.product')->where('user_id', Auth::user()->id)->find($id);
        // return $order;
        return view('user.order.show', [
            'title' => 'Detail Order',
            'order' => $order
        ]);
    }
}
