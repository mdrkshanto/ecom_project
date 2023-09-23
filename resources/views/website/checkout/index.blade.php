@extends('website.master.index')
@section('title')
    Checkout
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
                                    <h2 class="heading">Please fill up your Shipping details</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-8 col-sm-8 col-lg-offset-3 col-sm-offset-2">
                                <form  action="{{route('checkout.shipping')}}" method="POST" class="main-form full">
                                    @csrf
                                    <div class="mb-20">
                                        <div class="row">
                                            <div class="col-xs-12 mb-20">
                                                <div class="heading-part">
                                                    <h3 class="sub-heading">Billing Information</h3>
                                                </div>
                                                <hr>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="input-box">
                                                    <input type="text" required placeholder="Full Name" name="name" @if(session()->get('customer_name'))value="{{session()->get('customer_name')}}"@endif>
                                                </div>
                                                @if($errors->has('name'))
                                                    <span class="text-danger small">{{$errors->first('name')}}</span>
                                                @endif
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-box">
                                                    <input type="email" required placeholder="Email Address"
                                                           name="email" @if(session()->get('customer_email'))value="{{session()->get('customer_email')}}"@endif>
                                                </div>
                                                @if($errors->has('email'))
                                                    <span class="text-danger small">{{$errors->first('email')}}</span>
                                                @endif
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-box">
                                                    <input type="number" required placeholder="Contact Number"
                                                           name="mobile" @if(session()->get('customer_mobile'))value="{{session()->get('customer_mobile')}}"@endif>
                                                </div>
                                                @if($errors->has('mobile'))
                                                    <span class="text-danger small">{{$errors->first('mobile')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-20">
                                        <div class="row">
                                            <div class="col-xs-12 mb-20">
                                                <div class="heading-part">
                                                    <h3 class="sub-heading">Shipping Information</h3>
                                                </div>
                                                <hr>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-box">
                                                    <input type="text" required placeholder="Full Name"
                                                           name="shipping_name" @if(session()->get('shipping_name'))value="{{session()->get('shipping_name')}}"@endif>
                                                </div>
                                                @if($errors->has('shipping_name'))
                                                    <span class="text-danger small">{{$errors->first('shipping_name')}}</span>
                                                @endif
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-box">
                                                    <input type="number" required placeholder="Contact Number"
                                                           name="shipping_mobile" @if(session()->get('shipping_mobile'))value="{{session()->get('shipping_mobile')}}"@endif>
                                                </div>
                                                @if($errors->has('shipping_mobile'))
                                                    <span class="text-danger small">{{$errors->first('shipping_mobile')}}</span>
                                                @endif
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="input-box">
                                                    <textarea name="shipping_address" required
                                                              placeholder="Shipping Address">@if(session()->get('shipping_address')){{session()->get('shipping_address')}}@endif</textarea>
                                                </div>
                                                @if($errors->has('shipping_address'))
                                                    <span class="text-danger small">{{$errors->first('shipping_address')}}</span>
                                                @endif
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="input-box">
                                                    <textarea name="order_note"
                                                              placeholder="Order Note (Optional)">@if(session()->get('order_note')){{session()->get('order_note')}}@endif</textarea>
                                                </div>
                                                @if($errors->has('order_note'))
                                                    <span class="text-danger small">{{$errors->first('order_note')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-20">
                                        <div class="row">
                                            <div class="col-xs-12 mb-20">
                                                <div class="heading-part">
                                                    <h3 class="sub-heading">Account Creation Information (Optional)</h3>
                                                </div>
                                                <hr>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-box">
                                                    <input type="password" placeholder="Password"
                                                           name="password" @if(session()->get('password'))value="{{session()->get('password')}}"@endif>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-box">
                                                    <input type="password" placeholder="Confirm Password"
                                                           name="password_confirmation " @if(session()->get('password_confirmation '))value="{{session()->get('password_confirmation ')}}"@endif>
                                                </div>
                                            </div>
                                            @if($errors->has('password'))
                                                <span class="text-danger small">{{$errors->first('password')}}</span>
                                            @endif
                                            <div class="col-sm-12">
                                                <button type="submit" class="btn btn-color right-side">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- CONTAINER END -->
@endsection
