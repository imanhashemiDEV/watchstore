<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orders()
    {
        return view('admin.orders.orders');
    }

    public function orderDetails($order_id)
    {
        return view('admin.orders.order_details', compact('order_id'));
    }
}
