@extends('website.master.index')
@section('title')
    Payment Methods
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
                                    <h2 class="heading">Select a payment method</h2>
                                    @if($errors->has('payment_type'))
                                        <span
                                            class="text-danger small fw-bolder">{{$errors->first('payment_type')}}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <form action="{{route('checkout.orderSubmit')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-8 col-sm-8 col-lg-offset-3 col-sm-offset-2">
                                    <div class="payment-option-box mb-30">
                                        <div class="payment-option-box-inner gray-bg">
                                            <div class="payment-top-box">
                                                <div class="radio-box left-side"> <span>
                        <input type="radio" id="online" value="online" name="payment_type" checked>
                        </span>
                                                    <label for="online">Online Payment</label>
                                                </div>
                                                <div class="paypal-box">
                                                    <div class="paypal-img"><img
                                                            src="{{asset('/')}}website/assets/images/payment-method.png"
                                                            alt="Eshoper"></div>
                                                </div>
                                            </div>
                                            <p>If you Don't have CCAvenue Account, it doesn,t matter. You can also pay
                                                via
                                                CCAvenue with you credit card or bank debit card</p>
                                            <p>Payment can be submitted in any currency.</p>
                                        </div>
                                    </div>
                                    <div class="payment-option-box mb-30">
                                        <div class="payment-option-box-inner gray-bg">
                                            <div class="payment-top-box">
                                                <div class="radio-box left-side"> <span>
                        <input type="radio" id="cash" value="cod" name="payment_type">
                        </span>
                                                    <label for="cash">Would you like to pay by Cash on Delivery?</label>
                                                </div>
                                            </div>
                                            <p>Vestibulum semper accumsan nisi, at blandit tortor maxi'mus in phasellus
                                                malesuada sodales odio, at dapibus libero malesuada quis.</p>
                                        </div>
                                    </div>
                                    <div class="right-side float-none-xs">
                                        <button class="btn-color btn" type="submit">
                                            Place Order
                                            <span><i class="fa fa-angle-right"></i></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- CONTAINER END -->
@endsection
