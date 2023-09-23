<?php

namespace App\Models;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
//    protected $guarded = [];

    private static $order;

    protected static function createNewOrder($customer)
    {
        $sessionCustomer = session('customer');
        self::$order = new Order();
        self::$order->customer_id = $customer->id;
        self::$order->order_number = genId('orders','order_number',12, date('Y'));
        self::$order->order_total = Cart::subtotal();
        self::$order->tax_total = (Cart::subtotal()*session('tax'));
        self::$order->shipping_total = (Cart::content()->count()*session('shipping'));
        self::$order->order_date = date('Y-m-d');
        self::$order->order_timestamps = strtotime(date('Y-m-d'));
        self::$order->shipping_name = $sessionCustomer['shipping_name'];
        self::$order->shipping_mobile = $sessionCustomer['shipping_mobile'];
        self::$order->delivery_address = $sessionCustomer['shipping_address'];
        self::$order->payment_type = session('payment_type');
        self::$order->save();
        return self::$order;
    }



    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
