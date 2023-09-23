<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Customer;
use Illuminate\Support\ServiceProvider;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('website.*', function ($view) {
            $view->with('categories', Category::with(['subcategories' => function ($subcategories) {
                $subcategories->whereHas('products', function ($products) {
                    $products->where('stock_amount', '>=', '1')->where('status', '1');
                })->where('status', '1');
            }])
                ->orWhereHas('products', function ($products) {
                    $products->where('stock_amount', '>=', '1')->where('status', '1');
                })
                ->where('status', '1')
                ->get());
            $view->with('customer', Customer::find(session('customerLoginId')));
        });
    }
}
