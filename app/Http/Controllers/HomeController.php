<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function dashboard()
    {
        switch (Auth::user()->role) {
            case 'admin':
                return redirect(route('admin.product.index'));
                break;
            default:
                return redirect(route('product.index'));
                break;
        }
    }
}
