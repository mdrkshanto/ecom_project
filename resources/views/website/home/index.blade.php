@extends('website.master.index')
@section('title')
    Home
@endsection
@section('body')


    <!-- BANNER STRAT -->
    <div class="banner mb-30 mb-xs-0 container-full-sm">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-banner">
                        @foreach($carouselProducts as $carouselProduct)
                            <div class="banner mb-30 mb-xs-0 container-full-sm"><img src="{{asset($carouselProduct->image)}}"
                                                     alt="{{$carouselProduct->name}}" class="w-100" height="355">
                                <div class="banner-detail">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-9 col-xs-8">
                                                <div class="banner-detail-inner">
                                                    {{--                                            <span class="slogan">Premium</span>--}}
                                                    <h1 class="banner-title">{{$carouselProduct->category->name}}</h1>
                                                    <span class="offer">{{$carouselProduct->name}}</span>
                                                </div>
                                                <a class="btn btn-color big" href="{{route('product.detail',['slug'=>$carouselProduct->slug])}}">Shop Now!</a>
                                            </div>
                                            <div class="col-sm-3 col-xs-4"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BANNER END -->

    <section class="container">
        <div class="row">
            <div class="col-md-12 right-side float-none-sm float-right-imp">
                <!-- SUB-BANNER START -->
                <div class="sub-banner-block mb-30">
                    <div class="">
                        <div class=" center-sm">
                            <div class="row">
                                <div class="col-md-4 col-sm-4 ">
                                    <div class="sub-banner sub-banner1">
                                        <img alt="Electro"
                                             src="{{asset('/')}}website/assets/images/sub-banner1.jpg">
                                        <div class="sub-banner-effect"></div>
                                        <div class="sub-banner-detail">
                                            <div class="sub-banner-title sub-banner-title-color">Winter</div>
                                            <div class="sub-banner-subtitle">womens jackets</div>
                                            <a class="btn btn-color" href="shop.html">Shop Now!</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 ">
                                    <div class="banner-top ">
                                        <div class="sub-banner sub-banner2">
                                            <img alt="Electro"
                                                 src="{{asset('/')}}website/assets/images/sub-banner2.jpg">
                                            <div class="sub-banner-effect"></div>
                                            <div class="sub-banner-detail">
                                                <div class="sub-banner-title sub-banner-title-color">Big Discounts
                                                </div>
                                                <div class="sub-banner-subtitle">50%-70% off on mens and women's
                                                    clothing
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 ">
                                    <div class="sub-banner sub-banner3">
                                        <img alt="Electro"
                                             src="{{asset('/')}}website/assets/images/sub-banner3.jpg">
                                        <div class="sub-banner-effect"></div>
                                        <div class="sub-banner-detail">
                                            <div class="sub-banner-title sub-banner-title-color">wide selection
                                            </div>
                                            <div class="sub-banner-subtitle">mens jackets</div>
                                            <a class="btn btn-color " href="shop.html">Shop Now!</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- SUB-BANNER END -->

                <!--  Site Services Features Block Start  -->
                <section class="mb-60">
                    <div class="">
                        <div class="ser-feature-block center-sm">
                            <div class="row">
                                <div class="col-md-4 service-box border-right">
                                    <div class="feature-box ">
                                        <div class="feature-icon feature1"></div>
                                        <div class="feature-detail">
                                            <div class="ser-title">Free Shipping</div>
                                            <div class="ser-subtitle"> Shipping in World for orders over $99</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 service-box border-right">
                                    <div class="feature-box">
                                        <div class="feature-icon feature2"></div>
                                        <div class="feature-detail">
                                            <div class="ser-title">Special Gift</div>
                                            <div class="ser-subtitle">Give the perfect gift to your loved ones</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 service-box">
                                    <div class="feature-box ">
                                        <div class="feature-icon feature3"></div>
                                        <div class="feature-detail">
                                            <div class="ser-title">Money Back</div>
                                            <div class="ser-subtitle">Not receiving an item applied to reward</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--  Site Services Features Block End  -->

                <!--  Featured Products Slider Block Start  -->
                <div class="featured-product mb-60">
                    <div class="">
                        <div class="product-listing">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="heading-part align-center mb-30">
                                        <div id="tabs" class="category-bar">
                                            <ul class="tab-stap">
                                                <li><a class="tab-step1 selected" title="step1">Latest</a></li>
                                                <li><a class="tab-step2" title="step2">Featured</a></li>
                                                <li><a class="tab-step3" title="step3">Most Viewed</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div id="items">
                                    <div class="tab_content pro_cat">
                                        <ul>
                                            <li>
                                                <div id="data-step1"
                                                     class="items-step1 product-slider-main position-r selected"
                                                     data-temp="tabdata">
                                                    @foreach($latestProducts as $product)
                                                        <div class="col-md-3">
                                                            <div class="product-item h-100">
                                                                <div class="product-image">
                                                                    <a href="{{route('product.detail',['slug'=>$product->slug])}}">
                                                                        <img
                                                                            src="{{asset($product->image)}}"
                                                                            alt="{{$product->name}}" height="150">
                                                                    </a>
                                                                    <div class="product-detail-inner">
                                                                        <div class="detail-inner-left left-side">
                                                                            <ul>
                                                                                <li class="pro-cart-icon">
                                                                                    <form action="{{route('cart.addSingle',['id'=>$product->id])}}" method="POST">
                                                                                        @csrf
                                                                                        <button title="Add to Cart" type="submit">
                                                                                            <span></span>Add to Cart
                                                                                        </button>
                                                                                    </form>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="detail-inner-left right-side">
                                                                            <ul>
                                                                                <li class="pro-wishlist-icon active"><a
                                                                                        href="wishlist.html"
                                                                                        title="Wishlist"></a></li>
                                                                                <li class="pro-compare-icon"><a
                                                                                        href="compare.html"
                                                                                        title="Compare"></a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="product-item-details">
                                                                    <div class="product-item-name"><a
                                                                            href="{{route('product.detail',['slug'=>$product->slug])}}">{{$product->name}}</a>
                                                                    </div>
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
                                            </li>
                                            <li>
                                                <div id="data-step2"
                                                     class="items-step2 product-slider-main position-r"
                                                     data-temp="tabdata">
                                                    @foreach($featuredProducts as $product)
                                                        <div class="col-md-3">
                                                            <div class="product-item h-100">
                                                                <div class="product-image">
                                                                    <a href="{{route('product.detail',['slug'=>$product->slug])}}">
                                                                        <img
                                                                            src="{{asset($product->image)}}"
                                                                            alt="{{$product->name}}" height="150">
                                                                    </a>
                                                                    <div class="product-detail-inner">
                                                                        <div class="detail-inner-left left-side">
                                                                            <ul>
                                                                                <li class="pro-cart-icon">
                                                                                    <form action="{{route('cart.addSingle',['id'=>$product->id])}}" method="POST">
                                                                                        @csrf
                                                                                        <button title="Add to Cart" type="submit">
                                                                                            <span></span>Add to Cart
                                                                                        </button>
                                                                                    </form>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="detail-inner-left right-side">
                                                                            <ul>
                                                                                <li class="pro-wishlist-icon active"><a
                                                                                        href="wishlist.html"
                                                                                        title="Wishlist"></a></li>
                                                                                <li class="pro-compare-icon"><a
                                                                                        href="compare.html"
                                                                                        title="Compare"></a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="product-item-details">
                                                                    <div class="product-item-name"><a
                                                                            href="{{route('product.detail',['slug'=>$product->slug])}}">{{$product->name}}</a>
                                                                    </div>
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
                                            </li>
                                            <li>
                                                <div id="data-step3"
                                                     class="items-step3 product-slider-main position-r"
                                                     data-temp="tabdata">
                                                    @foreach($mostViewedProducts as $product)
                                                        <div class="col-md-3">
                                                            <div class="product-item h-100">
                                                                <div class="product-image">
                                                                    <a href="{{route('product.detail',['slug'=>$product->slug])}}">
                                                                        <img
                                                                            src="{{asset($product->image)}}"
                                                                            alt="{{$product->name}}" height="150">
                                                                    </a>
                                                                    <div class="product-detail-inner">
                                                                        <div class="detail-inner-left left-side">
                                                                            <ul>
                                                                                <li class="pro-cart-icon">
                                                                                    <form action="{{route('cart.addSingle',['id'=>$product->id])}}" method="POST">
                                                                                        @csrf
                                                                                        <button title="Add to Cart" type="submit">
                                                                                            <span></span>Add to Cart
                                                                                        </button>
                                                                                    </form>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="detail-inner-left right-side">
                                                                            <ul>
                                                                                <li class="pro-wishlist-icon active"><a
                                                                                        href="wishlist.html"
                                                                                        title="Wishlist"></a></li>
                                                                                <li class="pro-compare-icon"><a
                                                                                        href="compare.html"
                                                                                        title="Compare"></a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="product-item-details">
                                                                    <div class="product-item-name"><a
                                                                            href="{{route('product.detail',['slug'=>$product->slug])}}">{{$product->name}}</a>
                                                                    </div>
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
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  Featured Products Slider Block End  -->
            </div>
        </div>
    </section>
    <!-- Brand logo block Start  -->
    <section class="container">
        <div class="row brand">
            <div class="col-md-12">
                <div id="brand-logo" class="owl-carousel align_center">
                    @foreach($brands as $brand)
                        <div class="item">
                            <img src="{{asset($brand->image)}}">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Brand logo block End  -->
@endsection


