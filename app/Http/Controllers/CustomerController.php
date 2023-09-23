<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function account()
    {
        $orders = Order::with([
            'customer' => function ($customer) {
                $customer->find(session('customerLoginId'));
            },
            'orderDetails'
        ])->latest()->take(3)->get();

        return view('website.account.index', ['orders' => $orders]);
    }

    public function order($id)
    {
//        $order = Order::where('order_number', $id)->first();

        return view('website.account.order.detail', ['order' => Order::where('order_number', $id)->first()]);
    }
}
