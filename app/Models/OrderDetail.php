<?php

namespace App\Models;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $guarded = [];

    private static $orderDetail, $product;

    protected static function createNewOrderDetail($order)
    {
        foreach (Cart::content() as $item)
        {
            self::$orderDetail = new OrderDetail();

            self::$orderDetail->order_id = $order->id;
            self::$orderDetail->product_id = $item->id;
            self::$orderDetail->product_slug = $item->options->slug;
            self::$orderDetail->product_name = $item->name;
            self::$orderDetail->product_image = $item->options->image;
            self::$orderDetail->product_price = $item->price;
            self::$orderDetail->product_quantity = $item->qty;
            self::$orderDetail->save();

            self::$product = Product::find($item->id);
            self::$product->stock_amount = self::$product->stock_amount - $item->qty;
            self::$product->save();
        }
    }


    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
