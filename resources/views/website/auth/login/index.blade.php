@extends('website.master.index')
@section('title')
    Sign in
@endsection
@section('body')
    <!-- Bread Crumb STRAT -->
    <div class="banner inner-banner1 ">
        <div class="container">
            <section class="banner-detail center-xs">
                <h1 class="banner-title">Login</h1>
            </section>
        </div>
    </div>
    <!-- Bread Crumb END -->

    <!-- CONTAIN START -->
    <section class="checkout-section ptb-95">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-lg-6 col-md-8 col-sm-8 col-lg-offset-3 col-sm-offset-2">
                            <form class="main-form full" action="{{route('customer.login')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-xs-12 mb-20">
                                        <div class="heading-part heading-bg">
                                            <h2 class="heading">Your Login</h2>
                                            @if(session('message'))
                                                <div
                                                    class="alert alert-success alert-dismissible show small text-center p-1"
                                                    role="alert" data-dismiss="alert">
                                                    <span class="fw-bolder">{{session('message')}}</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="input-box">
                                            <label>Email or Mobile</label>
                                            <input name="login_id" type="text" required placeholder="Email or Mobile">
                                        </div>
                                        @if($errors->has('login_id'))
                                            <span class="text-danger small">{{$errors->first('login_id')}}</span>
                                        @endif
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="input-box">
                                            <label>Password</label>
                                            <input type="password" required placeholder="Enter your Password"
                                                   name="password">
                                        </div>
                                        @if($errors->has('password'))
                                            <span class="text-danger small">{{$errors->first('password')}}</span>
                                        @endif
                                    </div>
                                    <div class="col-xs-12">
                                        <button type="submit" class="btn-color">Log In</button>
                                        <a title="Forgot Password" class="right-side forgot-password mtb-20" href="#">Forgot
                                            your
                                            password?</a>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="new-account align-center mt-20"><span>New User?</span> <a
                                                class="link" href="{{route('customer.create')}}">Create New Account</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- CONTAINER END -->
@endsection
