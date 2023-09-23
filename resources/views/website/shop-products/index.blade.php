@extends('website.master.index')
@section('title')
    {{$products ? 'All Products' : 404}}
@endsection
@section('body')
    @if($products)
        <!-- Breadcrumb Start -->
        <div class="container-fluid">
            <div class="row px-xl-5">
                <div class="col-12">
                    <div class="breadcrumb bg-light mb-30">
                        All Product
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb End -->
    @endif


    <!-- Shop Start -->
    @if($products)
        <!-- CONTAIN START -->
        <section class="ptb-95">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1 class="shorting mb-30">
                            All Product
                        </h1>
                        <div class="product-listing">
                            <div class="inner-listing">
                                <div class="row mlr_-20">
                                    @foreach($products as $product)
                                        <div class="col-md-3 col-xs-6 plr-20 mb-30">
                                            <div class="product-item">
                                                <div class="product-image"><a href="{{route('product.detail',['slug'=>$product->slug])}}"> <img
                                                            src="{{asset($product->image)}}" alt="{{$product->name}}">
                                                    </a>
                                                    <div class="product-detail-inner">
                                                        <div class="detail-inner-left left-side">
                                                            <ul>
                                                                <li class="pro-cart-icon">
                                                                    <form action="{{route('cart.addSingle',['id'=>$product->id])}}" method="POST">
                                                                        @csrf
                                                                        <button title="Add to Cart" type="submit"><span></span>Add to
                                                                            Cart
                                                                        </button>
                                                                    </form>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="detail-inner-left right-side">
                                                            <ul>
                                                                <li class="pro-wishlist-icon active"><a
                                                                        href="wishlist.html" title="Wishlist"></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-item-details">
                                                    <div class="product-item-name"><a
                                                            href="{{route('product.detail',['slug'=>$product->slug])}}">{{$product->name}}</a></div>
                                                    <div class="price-box"><span
                                                            class="price">&#2547;{{$product->selling_price}}</span>
                                                        <del class="price old-price">
                                                            &#2547;{{$product->regular_price}}</del>
                                                    </div>
                                                    <div class="rating-summary-block">
                                                        <div title="53%" class="rating-result"><span
                                                                style="width:53%"></span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        {{$products->links('vendor.pagination.product-page')}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- CONTAINER END -->
    @else
        @include('website.includes.404')
    @endif
    <!-- Shop End -->
@endsection


