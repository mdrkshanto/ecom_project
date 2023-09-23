@extends('website.master.index')

@section('title')
    Checkout Overview
@endsection
@section('body')
    <!-- Bread Crumb STRAT -->
    <div class="banner inner-banner1 ">
        <div class="container">
            <section class="banner-detail center-xs">
                <h1 class="banner-title">Checkout</h1>
            </section>
        </div>
    </div>
    <!-- Bread Crumb END -->

    <!-- CONTAIN START -->
    <section class="checkout-section ptb-95">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    @include('website.checkout.includes.checkout-steps')
                    <div class="checkout-content">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="heading-part align-center">
                                    <h2 class="heading">Order Overview</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8 mb-sm-30">
                                <div class="cart-item-table commun-table mb-30">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Product Detail</th>
                                                <th>Sub Total</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach(Cart::content() as $item)
                                            <tr>
                                                <td><a href="{{route('product.detail',['slug'=>$item->options->slug])}}">
                                                        <div class="product-image"><img alt="Honour" src="{{asset($item->options->image)}}"></div>
                                                    </a></td>
                                                <td><div class="product-title"> <a href="{{route('product.detail',['slug'=>$item->options->slug])}}">{{$item->name}}</a>
                                                        <div class="product-info-stock-sku m-0">
                                                            <div>
                                                                <label>Price: </label>
                                                                <div class="price-box">
                                                                    <span class="info-deta price">&#2547;{{$item->price}}</span> </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-info-stock-sku m-0">
                                                            <div>
                                                                <label>Quantity: </label>
                                                                <span class="info-deta">{{$item->qty}}</span> </div>
                                                        </div>
                                                    </div></td>
                                                <td><div data-id="100" class="total-price price-box"> <span class="price">&#2547;{{$item->subtotal}}</span> </div></td>
                                                <td>
                                                    <form action="{{route('cart.remove',['id'=>$item->rowId])}}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-link">
                                                            <i class="fa fa-trash cart-remove-item" data-id="100" title="Remove Item From Cart"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="cart-total-table commun-table mb-30">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th colspan="2">Cart Total</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>{{Cart::content()->count()>1?'Items':'Item'}} Subtotal</td>
                                                <td class="text-right"><div class="price-box"> <span class="price">&#2547;{{number_format(Cart::subtotal(),2)}}</span> </div></td>
                                            </tr>
                                            <tr>
                                                <td>TAX Amount ({{session()->get('tax')*100}}%)</td>
                                                <td class="text-right"><div class="price-box"> <span class="price">&#2547;{{number_format(Cart::subtotal() * session()->get('tax') , 2)}}</span> </div></td>
                                            </tr>
                                            <tr>
                                                <td>Shipping Charge</td>
                                                <td class="text-right"><div class="price-box"> <span class="price">&#2547;{{number_format(session()->get('shipping')*Cart::content()->count(),2)}}</span> </div></td>
                                            </tr>
                                            <tr>
                                                <td><b>Amount Payable</b></td>
                                                <td class="text-right"><div class="price-box"> <span class="price"><b>&#2547;{{Cart::content()->count() >= 1 ? number_format(round(Cart::subtotal() + Cart::subtotal() * session()->get('tax') + session('shipping')*Cart::content()->count()),2) : number_format(false,2)}}</b></span> </div></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="right-side float-none-xs"> <a href="{{route('checkout.paymentMethod')}}" class="btn-color btn">Next</a> </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="cart-total-table address-box commun-table mb-30">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Billing Information</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <ul>
                                                        <li class="inner-heading"> <b>{{$myCustomer['customer_name']}}</b> </li>
                                                        <li>
                                                            <p>Mobile: {{$myCustomer['customer_mobile']}}</p>
                                                        </li>
                                                        <li>
                                                            <p>Email: {{$myCustomer['customer_email']}}</p>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="cart-total-table address-box commun-table">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Shipping Information</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><ul>
                                                        <li class="inner-heading"> <b>{{$myCustomer['shipping_name']}}</b> </li>
                                                        <li>
                                                            <p>Mobile: {{$myCustomer['shipping_mobile']}}</p>
                                                        </li>
                                                        <li>
                                                            <p class="text-justify">Address: <br/> {{$myCustomer['shipping_address']}}</p>
                                                        </li>
                                                    </ul></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- CONTAINER END -->
@endsection
