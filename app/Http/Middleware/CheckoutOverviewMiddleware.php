<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckoutOverviewMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
//        $customerName = session()->get('customer_name');
//        $customerEmail = session()->get('customer_email');
//        $customerMobile = session()->get('customer_mobile');
//        $shippingName = session()->get('shipping_name');
//        $shippingMobile = session()->get('shipping_mobile');
//        $shippingAddress = session()->get('shipping_address');
        if (session('customer')) {
            return $next($request);
        }else{
            return redirect()->route('checkout.shipping');
        }
    }
}
