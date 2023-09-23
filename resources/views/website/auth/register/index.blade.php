@extends('website.master.index')
@section('title')
    Register
@endsection
@section('body')
    <!-- Bread Crumb STRAT -->
    <div class="banner inner-banner1 ">
        <div class="container">
            <section class="banner-detail center-xs">
                <h1 class="banner-title">Register</h1>
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
                            <form class="main-form full" action="{{route('customer.store')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-xs-12 mb-20">
                                        <div class="heading-part heading-bg">
                                            <h2 class="heading">Create your account</h2>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="input-box">
                                            <label>Full Name</label>
                                            <input type="text" required placeholder="Full Name" name="name" autofocus>
                                        </div>
                                        @if($errors->has('name'))
                                            <span class="text-danger small">{{$errors->first('name')}}</span>
                                        @endif
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="input-box">
                                            <label>Mobile Number</label>
                                            <input type="text" required placeholder="Mobile Number" name="mobile">
                                        </div>
                                        @if($errors->has('mobile'))
                                            <span class="text-danger small">{{$errors->first('mobile')}}</span>
                                        @endif
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="input-box">
                                            <label>Email address (Optional)</label>
                                            <input type="email" placeholder="Email Address (Optional)" name="email">
                                        </div>
                                        @if($errors->has('email'))
                                            <span class="text-danger small">{{$errors->first('email')}}</span>
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
                                        <div class="input-box">
                                            <label>Re-enter Password</label>
                                            <input type="password" required placeholder="Re-enter your Password"
                                                   name="password_confirmation">
                                        </div>
                                        @if($errors->has('password_confirmation'))
                                            <span
                                                class="text-danger small">{{$errors->first('password_confirmation')}}</span>
                                        @endif
                                    </div>
                                    <div class="col-xs-12">
                                        <button type="submit" class="btn-color left-side">Submit</button>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="new-account align-center mt-20"><span>Already have an account with us</span>
                                            <a class="link" href="{{route('customer.signin')}}">Sign in Here</a></div>
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
@endsection()
