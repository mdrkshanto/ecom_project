<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EshoperController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\CustomerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(EshoperController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/shop', 'shopProducts')->name('shop.products');
    Route::get('/{slug}/category', 'categoryProducts')->name('category.products');
    Route::get('/{slug}/subcategory', 'subcategoryProducts')->name('subcategory.products');
    Route::get('/{slug}/product/detail', 'productDetail')->name('product.detail');
    Route::post('/search', 'search')->name('search');
});

Route::get('/test', function () {
    return view('website/test');
});

Route::controller(CartController::class)->group(function () {
    Route::get('/cart', 'index')->name('cart.index');
    Route::post('/add-to-cart/{id}', 'add')->name('cart.add');
    Route::post('/update-cart/{id}', 'update')->name('cart.update');
    Route::post('/reduce-cart-item/{id}', 'remove')->name('cart.remove');
    Route::post('/cart/add-single/{id}', 'addSingle')->name('cart.addSingle');
});

Route::controller(CheckoutController::class)->group(function () {
    Route::middleware(['customer.shipping'])->group(function () {
        Route::get('/checkout/shipping', 'index')->name('checkout.index');
        Route::post('/checkout/shipping', 'shipping')->name('checkout.shipping');
        Route::middleware('customer.checkout.overview')->group(function () {
            Route::get('/checkout/overview', 'overview')->name('checkout.overview');
            Route::get('/checkout/payment', 'paymentMethod')->name('checkout.paymentMethod');
            Route::post('/checkout/payment', 'orderSubmit')->name('checkout.orderSubmit');
            Route::get('/checkout/complete', 'completeOrder')->name('checkout.completeOrder')->middleware('customer.order.complete');
        });
    });
});


Route::controller(CustomerAuthController::class)->group(function () {
    Route::middleware('customer.credential')->group(function () {
        Route::get('/signup', 'create')->name('customer.create');
        Route::post('/signup', 'store')->name('customer.store');
        Route::get('/signin', 'signin')->name('customer.signin');
        Route::post('/signin', 'login')->name('customer.login');
    });
    Route::middleware(['customer.account'])->group(function () {
        Route::post('/account/logout', 'logout')->name('customer.logout');
    });
});

Route::group(['middleware'=>'customer.account','controller'=>CustomerController::class],function (){
    Route::get('/account', 'account')->name('customer.account');
    Route::get('/account/order/{id}','order')->name('customer.order');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
    });
    Route::resource('category', CategoryController::class)->parameters(['category' => 'category:slug']);
    Route::resource('subcategory', SubcategoryController::class)->parameters(['subcategory' => 'subcategory:slug']);
    Route::resource('brand', BrandController::class)->parameters(['brand' => 'brand:slug']);
    Route::resource('unit', UnitController::class)->parameters(['unit' => 'unit:slug']);
    Route::resource('product', ProductController::class)->parameters(['product' => 'product:slug']);
    Route::get('/get-subcategory-by-category', [ProductController::class, 'getSubcategoryByCategory'])->name('get-subcategory-by-category');
});


// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index'])->name('ssl.index');
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END
