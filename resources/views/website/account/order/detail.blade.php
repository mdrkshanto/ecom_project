@extends('website.master.index')
@section('title')
    Order Detail
@endsection
@section('body')
    <!-- Bread Crumb STRAT -->
    <div class="banner inner-banner1 ">
        <div class="container">
            <section class="banner-detail center-xs">
                <h1 class="banner-title">Order Detail</h1>
            </section>
        </div>
    </div>
    <!-- Bread Crumb END -->

    <!-- CONTAIN START -->
    <section class="checkout-section ptb-95">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="account-content">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="heading-part heading-bg mb-30">
                                    <div class="heading m-0">
                                        <h2 class="heading col-xs-9">Order Detail</h2>
                                        <h2 class="heading col-xs-3 text-right">
                                            <a href="{{url()->previous()}}" class="">Back</a>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 mb-xs-30">
                                <div class="cart-item-table commun-table">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th colspan="4">
                                                    <ul>
                                                        <li><span>Order placed</span>
                                                            <span>{{date("d F, Y", $order->order_timestamps)}}</span>
                                                        </li>
                                                        <li class="price-box"><span>Total</span> <span class="price">&#2547;{{number_format($order->order_total,2)}}</span>
                                                        </li>
                                                        <li><span>Order No.</span>
                                                            <span>#{{$order->order_number}}</span></li>
                                                    </ul>
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($order->orderDetails as $orderDetail)
                                                <tr>
                                                    <td>
                                                        <a href="{{route('product.detail',['slug'=>$orderDetail->product_slug])}}">
                                                            <div class="product-image"><img
                                                                    alt="{{$orderDetail->product_name}}"
                                                                    src="{{asset($orderDetail->product_image)}}">
                                                            </div>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <div class="product-title">
                                                            <a href="{{route('product.detail',['slug'=>$orderDetail->product_slug])}}">{{$orderDetail->product_name}}</a>
                                                        </div>
                                                        <div class="product-info-stock-sku m-0">
                                                            <div>
                                                                <label>Price: </label>
                                                                <span class="info-deta">&#2547;{{number_format($orderDetail->product_price,2)}}</span>
                                                            </div>
                                                            <div>
                                                                <label>Quantity: </label>
                                                                <span class="info-deta">{{$orderDetail->product_quantity}}</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="base-price price-box"><span
                                                                class="price">&#2547;{{number_format($orderDetail->product_price*$orderDetail->product_quantity,2)}}</span></div>
                                                    </td>
                                                </tr>
                                            @endforeach
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
