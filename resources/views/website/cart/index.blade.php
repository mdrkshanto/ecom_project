@extends('website.master.index')
@section('title')
    Cart
@endsection
@section('body')
    <!-- Bread Crumb STRAT -->
    <div class="banner inner-banner1 ">
        <div class="container">
            <section class="banner-detail center-xs">
                <h1 class="banner-title">Shopping Cart</h1>
            </section>
        </div>
    </div>
    <!-- Bread Crumb END -->


    <!-- CONTAIN START -->
    <section class="ptb-95">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 mb-xs-30">
                    <div class="cart-item-table commun-table">
                        @if(session('message'))
                            <span class="card-title fw-bolder text-success text-center">{{session('message')}}</span>
                        @endif
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Sub Total</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($items->count() > 0)
                                    @foreach($items as $item)
                                        <tr>
                                            <td>
                                                <a href="{{route('product.detail',['slug'=>$item->options->slug])}}">
                                                    <div class="product-image"><img alt="{{$item->name}}"
                                                                                    src="{{asset($item->options->image)}}">
                                                    </div>
                                                </a>
                                            </td>
                                            <td>
                                                <div class="product-title"><a
                                                        href="{{route('product.detail',['slug'=>$item->options->slug])}}">{{$item->name}}</a>
                                                </div>
                                                @if($errors->has('qty'))
                                                    <span class="text-danger small">{{$errors->first('qty')}}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <ul>
                                                    <li>
                                                        <div class="base-price price-box"><span
                                                                class="price">&#2547;{{$item->price}}</span></div>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td>
                                                <form action="{{route('cart.update',['id'=>$item->rowId])}}"
                                                      method="POST">
                                                    @csrf
                                                    <div class="cart-quantity">
                                                        <input type="text" name="qty" class="form-control"
                                                               value="{{$item->qty}}">
                                                        <button class="btn-color" type="submit">Update</button>
                                                    </div>
                                                </form>
                                            </td>
                                            <td>
                                                <div class="total-price price-box"><span
                                                        class="price">&#2547;{{$item->subtotal}}</span></div>
                                            </td>
                                            <td>
                                                <form action="{{route('cart.remove',['id'=>$item->rowId])}}"
                                                      method="POST">
                                                    @csrf
                                                    <button class="btn-link" type="submit"
                                                            onclick="return confirm('Are you sure to reduce the item?')">
                                                        <i class="fa fa-trash cart-remove-item"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6">Your cart is empty yet. Please add product to your cart.</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-30">
                <div class="row">
                    <div class="col-md-auto">
                        <div class="mt-30"><a href="{{route('shop.products')}}" class="btn-color btn"><span><i
                                        class="fa fa-angle-left"></i></span>Continue Shopping</a></div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="mtb-30">
                <div class="row">
                    <div class="col-sm-6 mb-xs-40">
                    </div>
                    <div class="col-sm-6">
                        <div class="cart-total-table commun-table">
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
                                        <td class="text-right">
                                            <div class="price-box"><span
                                                    class="price">&#2547;{{number_format(Cart::subtotal(),2)}}</span>
                                            </div>
                                        </td>
                                    </tr>
                                    @if(Cart::content()->count() >= 1)
                                        <tr>
                                            <td>TAX Amount ({{session()->get('tax')*100}}%)</td>
                                            <td class="text-right">
                                                <div class="price-box"><span
                                                        class="price">&#2547;{{number_format(Cart::subtotal() * session()->get('tax') , 2)}}</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Shipping Charge</td>
                                            <td class="text-right">
                                                <div class="price-box"><span
                                                        class="price">&#2547;{{number_format(session()->get('shipping')*Cart::content()->count(),2)}}</span>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td><b>Amount Payable</b></td>
                                        @php(session(['total_amount' => (Cart::subtotal() + Cart::subtotal() * session()->get('tax') + session('shipping')*Cart::content()->count())]))
                                        <td class="text-right">
                                            <div class="price-box"><span
                                                    class="price"><b>&#2547;{{Cart::content()->count() >= 1 ? number_format(round(session()->get('total_amount')),2) : number_format(false,2)}}</b></span>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if(Cart::content()->count() >=1)
                <hr>
                <div class="mt-30">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="right-side float-none-xs"><a href="{{route('checkout.index')}}"
                                                                     class="btn-color btn">Proceed to checkout<span><i
                                            class="fa fa-angle-right"></i></span></a></div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
    <!-- CONTAINER END -->
@endsection
