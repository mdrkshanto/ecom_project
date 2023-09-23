@extends('website.master.index')
@section('title')
    Account
@endsection
@section('body')
    <!-- Bread Crumb STRAT -->
    <div class="banner inner-banner1 ">
        <div class="container">
            <section class="banner-detail center-xs">
                <h1 class="banner-title">Account</h1>
            </section>
        </div>
    </div>
    <!-- Bread Crumb END -->

    <!-- CONTAIN START -->
    <section class="checkout-section ptb-95">
        <div class="container">
            <div class="row">
                @include('website.account.includes.sidebar')
                <div class="col-md-9 col-sm-8">
                    @include('website.account.dashboard.index')
                    @include('website.account.order.index')
                    @include('website.account.addresses.index')
                    @include('website.account.profile.index')
                </div>
            </div>
        </div>
    </section>
    <!-- CONTAINER END -->
@endsection
