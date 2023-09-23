<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('website.checkout.index');
    }

    public function shipping(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'nullable|email:rfc,dns',
            'mobile' => 'required|numeric|digits:11|starts_with:01',
            'shipping_name' => 'required',
            'shipping_mobile' => 'required|numeric|digits:11|starts_with:01',
            'shipping_address' => 'required',
            'order_note' => 'nullable',
            'password' => ['nullable', 'max:20', Password::min(6)
                ->symbols()
                ->mixedCase()
                ->numbers()
                ->uncompromised(), 'same:password'],
        ], [
            'mobile.starts_with' => 'Mobile number must be a bangladeshi mobile number.',
            'shipping_mobile.starts_with' => 'Mobile number must be a bangladeshi mobile number.'
        ]);

        $customer = Customer::where('mobile', $request->mobile)->first();

        if ($customer) {
            session()->flash('customer', [
                'customer_name' => $customer->name,
                'customer_email' => $customer->email,
                'customer_mobile' => $customer->mobile,
                'shipping_name' => $request->shipping_name,
                'shipping_mobile' => $request->shipping_mobile,
                'shipping_address' => $request->shipping_address,
                'order_note' => $request->order_note
            ]);
        } else {
            session()->flash('customer', [
                'customer_name' => $request->name,
                'customer_email' => $request->email,
                'customer_mobile' => $request->mobile,
                'shipping_name' => $request->shipping_name,
                'shipping_mobile' => $request->shipping_mobile,
                'shipping_address' => $request->shipping_address,
                'order_note' => $request->order_note,
                'customer_password' => $request->password,
            ]);
        }
        return redirect()->route('checkout.overview');
    }

    public function overview()
    {
        session()->keep('customer');
        return view('website.checkout.over-view',['myCustomer' => session('customer')]);
    }

    public function paymentMethod()
    {
        session()->keep('customer');
        return view('website.checkout.payment');
    }

    public function orderSubmit(Request $request, SslCommerzPaymentController $sslCommerzPaymentController)
    {
        $this->validate($request, [
            'payment_type' => 'required|in:online,cod'
        ]);
        session()->keep('customer');

        $sessionCustomer = session('customer');

        $customer = Customer::where('mobile', $sessionCustomer['customer_mobile'])->first();

        if ($customer) {
            if ($request->payment_type == 'cod') {
                session()->flash('payment_type', $request->payment_type);
                $order = Order::createNewOrder($customer);
                session()->flash('order_number', $order->order_number);
                session()->flash('order_date', $order->order_timestamps);
                OrderDetail::createNewOrderDetail($order);

                return redirect()->route('checkout.completeOrder');
            } elseif ($request->payment_type == 'online') {
                session()->flash('payment_type', $request->payment_type);
//                $order = Order::createNewOrder($customer);
                $order = $sslCommerzPaymentController->index($request, $customer);
                session()->flash('order_number', $order->order_number);
                session()->flash('order_date', $order->order_timestamps);
                OrderDetail::createNewOrderDetail($order);
//                return $order;
            }
        } else {
            if ($request->payment_type == 'cod') {
                session()->flash('payment_type', $request->payment_type);
                $customer = Customer::createNewCustomer();
                $order = Order::createNewOrder($customer);
                session()->flash('order_number', $order->order_number);
                session()->flash('order_date', $order->order_timestamps);
                OrderDetail::createNewOrderDetail($order);
                return redirect()->route('checkout.completeOrder');
            } elseif ($request->payment_type == 'online') {
                session()->flash('payment_type', $request->payment_type);
                $customer = Customer::createNewCustomer();
//                $order = Order::createNewOrder($customer);
                $order = $sslCommerzPaymentController->index($request,$customer);
                session()->flash('order_number', $order->order_number);
                session()->flash('order_date', $order->order_timestamps);
//                OrderDetail::createNewOrderDetail($order);
            }
        }
    }

    public function completeOrder()
    {
        return view('website.checkout.complete',['myCustomer'=>session('customer')]);
    }
}
