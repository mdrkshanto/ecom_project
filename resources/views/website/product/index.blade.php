@extends('website.master.index')
@section('title')
    {{$product->name}}
@endsection
@section('body')
    <!-- Bread Crumb STRAT -->
    <div class="banner inner-banner1 ">
        <div class="container">
            <section class="banner-detail center-xs">
                <h1 class="banner-title">{{$product->category->name}}</h1>
            </section>
        </div>
    </div>
    <!-- Bread Crumb END -->

    <!-- CONTAIN START -->
    <section class="pt-95">
        <div class="container">
            <div class="row">
                <div class="col-md-{{isset($product->brand->image) ? 9 : 12}}">
                    <div class="row">
                        <div class="col-md-5 col-sm-5 mb-xs-30">
                            <div class="fotorama" data-nav="thumbs" data-allowfullscreen="native">
                                <img src="{{asset($product->image)}}" alt="{{$product->name}}">
                                @foreach($product->otherImages as $image)
                                    <img src="{{asset($image->image)}}" alt="{{$image->product->name}}">
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-7">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="product-detail-main">
                                        <div class="product-item-details">
                                            <h1 class="product-item-name">{{$product->name}}</h1>
                                            <div class="rating-summary-block">
                                                <div title="53%" class="rating-result"><span style="width:90%"></span>
                                                </div>
                                            </div>
                                            <div class="price-box">
                                                <span
                                                    class="price">&#2547;{{number_format($product->selling_price,2)}}</span>
                                                <del class="price old-price">
                                                    &#2547;{{number_format($product->regular_price,2)}}</del>
                                            </div>
                                            <div class="product-info-stock-sku">
                                                <div>
                                                    <label>Availability: </label>
                                                    <span
                                                        class="info-deta">{{$product->stock_amount > 1 ? $product->stock_amount . ' ' . $product->unit->name . 's' : $product->stock_amount . ' ' . $product->unit->name}}</span>
                                                </div>
                                            </div>
                                            <p class="text-justify">{!! subWords($product->short_description,120,'...') !!}</p>
                                            <div class="mb-20">
                                                <form action="{{route('cart.add',['id'=>$product->id])}}" class="" method="post">
                                                    @csrf
                                                    <div class="product-qty">
                                                        <label for="qty">Qty:</label>
                                                        <div class="custom-qty">
                                                            <button
                                                                onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) && qty > 1 ) --result.value;return false;"
                                                                class="reduced items" type="button"><i
                                                                    class="fa fa-minus"></i></button>
                                                            <input type="text" class="input-text qty" title="Qty"
                                                                   value="1" id="qty" name="qty">
                                                            <button
                                                                onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) && qty < {{$product->stock_amount}} ) ++result.value;return false;"
                                                                class="increase items" type="button"><i
                                                                    class="fa fa-plus"></i></button>
                                                        </div>
                                                        @if($errors->has('qty'))
                                                            <span class="text-danger small">{{$errors->first('qty')}}</span>
                                                        @endif
                                                    </div>
                                                    <div class="bottom-detail cart-button">
                                                        <ul>
                                                            <li class="pro-cart-icon">
                                                                <button title="Add to Cart" class="btn-color btn" type="submit">
                                                                    <span></span>Add to Cart
                                                                </button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if(isset($product->brand->image))
                    <div class="col-md-3">
                        <div class="brand-logo-pro align-center mb-30">
                            <img src="{{asset($product->brand->image)}}" alt="{{$product->brand->name}}">
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <section class="ptb-95">
        <div class="container">
            <div class="product-detail-tab">
                <div class="row">
                    <div class="col-md-12">
                        <div id="tabs">
                            <ul class="nav nav-tabs">
                                <li><a class="tab-Description selected" title="Description">Description</a></li>
                                <li><a class="tab-Reviews" title="Reviews">Reviews</a></li>
                            </ul>
                        </div>
                        <div id="items">
                            <div class="tab_content">
                                <ul>
                                    <li>
                                        <div class="items-Description selected ">
                                            <div class="Description text-justify">
                                                {!! $product->long_description !!}
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="items-Reviews">
                                            <div class="comments-area">
                                                <h4>Comments<span>(2)</span></h4>
                                                <ul class="comment-list mt-30">
                                                    <li>
                                                        <div class="comment-user"><img
                                                                src="{{asset('/')}}website/assets/images/comment-user.jpg"
                                                                alt="Eshoper"></div>
                                                        <div class="comment-detail">
                                                            <div class="user-name">John Doe</div>
                                                            <div class="post-info">
                                                                <ul>
                                                                    <li>Fab 11, 2016</li>
                                                                    <li><a href="#"><i class="fa fa-reply"></i>Reply</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <p>Consectetur adipiscing elit integer sit amet augue
                                                                laoreet maximus nuncac.</p>
                                                        </div>
                                                        <ul class="comment-list child-comment">
                                                            <li>
                                                                <div class="comment-user"><img
                                                                        src="{{asset('/')}}website/assets/images/comment-user.jpg"
                                                                        alt="Eshoper"></div>
                                                                <div class="comment-detail">
                                                                    <div class="user-name">John Doe</div>
                                                                    <div class="post-info">
                                                                        <ul>
                                                                            <li>Fab 11, 2016</li>
                                                                            <li><a href="#"><i class="fa fa-reply"></i>Reply</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <p>Consectetur adipiscing elit integer sit amet
                                                                        augue laoreet maximus nuncac.</p>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="comment-user"><img
                                                                        src="{{asset('/')}}website/assets/images/comment-user.jpg"
                                                                        alt="Eshoper"></div>
                                                                <div class="comment-detail">
                                                                    <div class="user-name">John Doe</div>
                                                                    <div class="post-info">
                                                                        <ul>
                                                                            <li>Fab 11, 2016</li>
                                                                            <li><a href="#"><i class="fa fa-reply"></i>Reply</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <p>Consectetur adipiscing elit integer sit amet
                                                                        augue laoreet maximus nuncac.</p>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <div class="comment-user"><img
                                                                src="{{asset('/')}}website/assets/images/comment-user.jpg"
                                                                alt="Eshoper"></div>
                                                        <div class="comment-detail">
                                                            <div class="user-name">John Doe</div>
                                                            <div class="post-info">
                                                                <ul>
                                                                    <li>Fab 11, 2016</li>
                                                                    <li><a href="#"><i class="fa fa-reply"></i>Reply</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <p>Consectetur adipiscing elit integer sit amet augue
                                                                laoreet maximus nuncac.</p>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="main-form mt-30">
                                                <h4>Leave a comments</h4>
                                                <div class="row mt-30">
                                                    <form>
                                                        <div class="col-sm-4 mb-30">
                                                            <input type="text" placeholder="Name" required>
                                                        </div>
                                                        <div class="col-sm-4 mb-30">
                                                            <input type="email" placeholder="Email" required>
                                                        </div>
                                                        <div class="col-sm-4 mb-30">
                                                            <input type="text" placeholder="Website" required>
                                                        </div>
                                                        <div class="col-xs-12 mb-30">
                                                            <textarea cols="30" rows="3" placeholder="Message"
                                                                      required></textarea>
                                                        </div>
                                                        <div class="col-xs-12 mb-30">
                                                            <button class="btn-color btn" name="submit" type="submit">
                                                                Submit
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="pb-95">
        <div class="container">
            <div class="product-listing">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="heading-part align-center mb-30 mb-xs-15">
                            <h2 class="main_title"><span>Related Products</span></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="pro_cat">
                        <div class="owl-carousel pro_cat_slider">
                            <div class="item">
                                <div class="product-item">
                                    <div class="new-label"><span>New</span></div>
                                    <div class="product-image"><a href="product-page.html"> <img
                                                src="{{asset('/')}}website/assets/images/1.jpg" alt=""> </a>
                                        <div class="product-detail-inner">
                                            <div class="detail-inner-left left-side">
                                                <ul>
                                                    <li class="pro-cart-icon">
                                                        <form>
                                                            <button title="Add to Cart"><span></span>Add to Cart
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="detail-inner-left right-side">
                                                <ul>
                                                    <li class="pro-wishlist-icon active"><a href="wishlist.html"
                                                                                            title="Wishlist"></a></li>
                                                    <li class="pro-compare-icon"><a href="compare.html"
                                                                                    title="Compare"></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-item-details">
                                        <div class="product-item-name"><a href="product-page.html">Defyant Reversible
                                                Dot Shorts</a></div>
                                        <div class="price-box"><span class="price">$80.00</span>
                                            <del class="price old-price">$20.00</del>
                                        </div>
                                        <div class="rating-summary-block">
                                            <div title="53%" class="rating-result"><span style="width:53%"></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-item">
                                    <div class="sale-label"><span>Sale</span></div>
                                    <div class="product-image"><a href="product-page.html"> <img
                                                src="{{asset('/')}}website/assets/images/3.jpg" alt=""> </a>
                                        <div class="product-detail-inner">
                                            <div class="detail-inner-left left-side">
                                                <ul>
                                                    <li class="pro-cart-icon">
                                                        <form>
                                                            <button title="Add to Cart"><span></span>Add to Cart
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="detail-inner-left right-side">
                                                <ul>
                                                    <li class="pro-wishlist-icon"><a href="wishlist.html"
                                                                                     title="Wishlist"></a></li>
                                                    <li class="pro-compare-icon"><a href="compare.html"
                                                                                    title="Compare"></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-item-details">
                                        <div class="product-item-name"><a href="product-page.html">Defyant Reversible
                                                Dot Shorts</a></div>
                                        <div class="price-box"><span class="price">$80.00</span>
                                            <del class="price old-price">$20.00</del>
                                        </div>
                                        <div class="rating-summary-block">
                                            <div title="53%" class="rating-result"><span style="width:53%"></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-item">
                                    <div class="new-label"><span>New</span></div>
                                    <div class="sale-label"><span>Sale</span></div>
                                    <div class="product-image"><a href="product-page.html"> <img
                                                src="{{asset('/')}}website/assets/images/4.jpg" alt=""> </a>
                                        <div class="product-detail-inner">
                                            <div class="detail-inner-left left-side">
                                                <ul>
                                                    <li class="pro-cart-icon">
                                                        <form>
                                                            <button title="Add to Cart"><span></span>Add to Cart
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="detail-inner-left right-side">
                                                <ul>
                                                    <li class="pro-wishlist-icon"><a href="wishlist.html"
                                                                                     title="Wishlist"></a></li>
                                                    <li class="pro-compare-icon"><a href="compare.html"
                                                                                    title="Compare"></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-item-details">
                                        <div class="product-item-name"><a href="product-page.html">Defyant Reversible
                                                Dot Shorts</a></div>
                                        <div class="price-box"><span class="price">$80.00</span>
                                            <del class="price old-price">$20.00</del>
                                        </div>
                                        <div class="rating-summary-block">
                                            <div title="53%" class="rating-result"><span style="width:53%"></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-item">
                                    <div class="product-image"><a href="product-page.html"> <img
                                                src="{{asset('/')}}website/assets/images/5.jpg" alt=""> </a>
                                        <div class="product-detail-inner">
                                            <div class="detail-inner-left left-side">
                                                <ul>
                                                    <li class="pro-cart-icon">
                                                        <form>
                                                            <button title="Add to Cart"><span></span>Add to Cart
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="detail-inner-left right-side">
                                                <ul>
                                                    <li class="pro-wishlist-icon"><a href="wishlist.html"
                                                                                     title="Wishlist"></a></li>
                                                    <li class="pro-compare-icon"><a href="compare.html"
                                                                                    title="Compare"></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-item-details">
                                        <div class="product-item-name"><a href="product-page.html">Defyant Reversible
                                                Dot Shorts</a></div>
                                        <div class="price-box"><span class="price">$80.00</span>
                                            <del class="price old-price">$20.00</del>
                                        </div>
                                        <div class="rating-summary-block">
                                            <div title="53%" class="rating-result"><span style="width:53%"></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-item">
                                    <div class="sale-label"><span>Sale</span></div>
                                    <div class="product-image"><a href="product-page.html"> <img
                                                src="{{asset('/')}}website/assets/images/6.jpg" alt=""> </a>
                                        <div class="product-detail-inner">
                                            <div class="detail-inner-left left-side">
                                                <ul>
                                                    <li class="pro-cart-icon">
                                                        <form>
                                                            <button title="Add to Cart"><span></span>Add to Cart
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="detail-inner-left right-side">
                                                <ul>
                                                    <li class="pro-wishlist-icon"><a href="wishlist.html"
                                                                                     title="Wishlist"></a></li>
                                                    <li class="pro-compare-icon"><a href="compare.html"
                                                                                    title="Compare"></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-item-details">
                                        <div class="product-item-name"><a href="product-page.html">Defyant Reversible
                                                Dot Shorts</a></div>
                                        <div class="price-box"><span class="price">$80.00</span>
                                            <del class="price old-price">$20.00</del>
                                        </div>
                                        <div class="rating-summary-block">
                                            <div title="53%" class="rating-result"><span style="width:53%"></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-item">
                                    <div class="product-image"><a href="product-page.html"> <img
                                                src="{{asset('/')}}website/assets/images/7.jpg" alt=""> </a>
                                        <div class="product-detail-inner">
                                            <div class="detail-inner-left left-side">
                                                <ul>
                                                    <li class="pro-cart-icon">
                                                        <form>
                                                            <button title="Add to Cart"><span></span>Add to Cart
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="detail-inner-left right-side">
                                                <ul>
                                                    <li class="pro-wishlist-icon"><a href="wishlist.html"
                                                                                     title="Wishlist"></a></li>
                                                    <li class="pro-compare-icon"><a href="compare.html"
                                                                                    title="Compare"></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-item-details">
                                        <div class="product-item-name"><a href="product-page.html">Defyant Reversible
                                                Dot Shorts</a></div>
                                        <div class="price-box"><span class="price">$80.00</span>
                                            <del class="price old-price">$20.00</del>
                                        </div>
                                        <div class="rating-summary-block">
                                            <div title="53%" class="rating-result"><span style="width:53%"></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-item">
                                    <div class="new-label"><span>New</span></div>
                                    <div class="product-image"><a href="product-page.html"> <img
                                                src="{{asset('/')}}website/assets/images/1.jpg" alt=""> </a>
                                        <div class="product-detail-inner">
                                            <div class="detail-inner-left left-side">
                                                <ul>
                                                    <li class="pro-cart-icon">
                                                        <form>
                                                            <button title="Add to Cart"><span></span>Add to Cart
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="detail-inner-left right-side">
                                                <ul>
                                                    <li class="pro-wishlist-icon"><a href="wishlist.html"
                                                                                     title="Wishlist"></a></li>
                                                    <li class="pro-compare-icon"><a href="compare.html"
                                                                                    title="Compare"></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-item-details">
                                        <div class="product-item-name"><a href="product-page.html">Defyant Reversible
                                                Dot Shorts</a></div>
                                        <div class="price-box"><span class="price">$80.00</span>
                                            <del class="price old-price">$20.00</del>
                                        </div>
                                        <div class="rating-summary-block">
                                            <div title="53%" class="rating-result"><span style="width:53%"></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-item">
                                    <div class="sale-label"><span>Sale</span></div>
                                    <div class="product-image"><a href="product-page.html"> <img
                                                src="{{asset('/')}}website/assets/images/3.jpg" alt=""> </a>
                                        <div class="product-detail-inner">
                                            <div class="detail-inner-left left-side">
                                                <ul>
                                                    <li class="pro-cart-icon">
                                                        <form>
                                                            <button title="Add to Cart"><span></span>Add to Cart
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="detail-inner-left right-side">
                                                <ul>
                                                    <li class="pro-wishlist-icon"><a href="wishlist.html"
                                                                                     title="Wishlist"></a></li>
                                                    <li class="pro-compare-icon"><a href="compare.html"
                                                                                    title="Compare"></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-item-details">
                                        <div class="product-item-name"><a href="product-page.html">Defyant Reversible
                                                Dot Shorts</a></div>
                                        <div class="price-box"><span class="price">$80.00</span>
                                            <del class="price old-price">$20.00</del>
                                        </div>
                                        <div class="rating-summary-block">
                                            <div title="53%" class="rating-result"><span style="width:53%"></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-item">
                                    <div class="new-label"><span>New</span></div>
                                    <div class="sale-label"><span>Sale</span></div>
                                    <div class="product-image"><a href="product-page.html"> <img
                                                src="{{asset('/')}}website/assets/images/4.jpg" alt=""> </a>
                                        <div class="product-detail-inner">
                                            <div class="detail-inner-left left-side">
                                                <ul>
                                                    <li class="pro-cart-icon">
                                                        <form>
                                                            <button title="Add to Cart"><span></span>Add to Cart
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="detail-inner-left right-side">
                                                <ul>
                                                    <li class="pro-wishlist-icon"><a href="wishlist.html"
                                                                                     title="Wishlist"></a></li>
                                                    <li class="pro-compare-icon"><a href="compare.html"
                                                                                    title="Compare"></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-item-details">
                                        <div class="product-item-name"><a href="product-page.html">Defyant Reversible
                                                Dot Shorts</a></div>
                                        <div class="price-box"><span class="price">$80.00</span>
                                            <del class="price old-price">$20.00</del>
                                        </div>
                                        <div class="rating-summary-block">
                                            <div title="53%" class="rating-result"><span style="width:53%"></span></div>
                                        </div>
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
