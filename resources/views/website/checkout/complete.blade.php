@extends('website.master.index')
@section('title')
    Checkout Complete
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
                                <div class="cart-item-table complete-order-table commun-table mb-30">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Product Detail</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach(Cart::content() as $item)
                                                <tr>
                                                    <td><a href="{{route('product.detail',['slug'=>$item->options->slug])}}">
                                                            <div class="product-image">
                                                                <img alt="{{$item->name}}" src="{{asset($item->options->image)}}">
                                                            </div>
                                                        </a></td>
                                                    <td>
                                                        <div class="product-title">
                                                            <a href="{{route('product.detail',['slug'=>$item->options->slug])}}">{{$item->name}}</a>
                                                            <div class="product-info-stock-sku m-0">
                                                                <div>
                                                                    <label>Price: </label>
                                                                    <div class="price-box"><span
                                                                            class="info-deta price">&#2547;{{$item->price}}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="product-info-stock-sku m-0">
                                                                <div>
                                                                    <label>Quantity: </label>
                                                                    <span class="info-deta">{{$item->qty}}</span></div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="complete-order-detail commun-table mb-30">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <td><b>Order Places :</b></td>
                                                <td>{{date("l, d F, Y", session('order_date'))}}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Total Amount:</b></td>
                                                <td>
                                                    <div class="price-box"><span class="price">&#2547;{{Cart::subtotal()}}</span></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>Payment Method :</b></td>
                                                <td>{{session()->get('payment_type') == 'cod'?'Cash on dalivery' : ucwords(session()->get('payment_type'))}}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Order No. :</b></td>
                                                <td>#{{session('order_number')}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="mb-30">
                                    <div class="heading-part">
                                        <h3 class="sub-heading">Order Confirmation</h3>
                                    </div>
                                    <hr>
                                    <p class="mt-20">Quisque id fermentum tellus. Donec fringilla mauris nec ligula
                                        maximus sodales. Donec ac felis nunc. Fusce placerat volutpat risus, ac
                                        fermentum ex tempus eget.</p>
                                </div>
                                <div class="right-side float-none-xs"><a class="btn-color btn"
                                                                         href="{{route('shop.products')}}"><span><i
                                                class="fa fa-angle-left"></i></span>Continue Shopping</a></div>
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
                                                        <li class="inner-heading"><b>{{$myCustomer['customer_name']}}</b></li>
                                                        @if(isset($myCustomer['customer_email']))
                                                        <li>
                                                            <p>Email: {{$myCustomer['customer_email']}}</p>
                                                        </li>
                                                        @endif
                                                        <li>
                                                            <p>Mobile: {{$myCustomer['customer_mobile']}}</p>
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
                                                <td>
                                                    <ul>
                                                        <li class="inner-heading"><b>{{$myCustomer['shipping_name']}}</b></li>
                                                        <li>
                                                            <p>Mobile: {{$myCustomer['shipping_mobile']}}</p>
                                                        </li>
                                                        <li>
                                                            <p>Address:<br/>{{$myCustomer['shipping_address']}}</p>
                                                        </li>
                                                    </ul>
                                                </td>
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
    @php
        session()->forget([
                    'tax',
                    'shipping',
                    'total_amount',
                    'cart',
                ]);
                Cart::destroy();
    @endphp
@endsection
