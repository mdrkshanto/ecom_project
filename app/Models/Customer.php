<?php

namespace App\Models;

//use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $guarded = [];

    private static $customer;

    protected static function createNewCustomer()
    {
        self::$customer = new Customer();

        $sessionCustomer = session('customer');

        self::$customer->name = ucwords($sessionCustomer['customer_name']);
        self::$customer->email = $sessionCustomer['customer_email'];
        self::$customer->mobile = $sessionCustomer['customer_mobile'];
        self::$customer->password = $sessionCustomer['customer_password'] ? bcrypt($sessionCustomer['customer_password']) : null;
        self::$customer->save();
        return self::$customer;
    }


    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
