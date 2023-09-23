@extends('auth.master')
@section('title')
    Register
@endsection
@section('body')
    <form class="login100-form validate-form" action="{{route('register')}}" method="POST">
        @csrf
        <span class="login100-form-title">
										Registration
									</span>
        <div class="wrap-input100 validate-input" data-bs-validate = "Valid email is required: ex@abc.xyz">
            <input class="input100" type="text" name="name" placeholder="Name">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
											<i class="mdi mdi-account" aria-hidden="true"></i>
										</span>
        </div>
        <div class="wrap-input100 validate-input" data-bs-validate = "Valid email is required: ex@abc.xyz">
            <input class="input100" type="text" name="email" placeholder="Email">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
											<i class="zmdi zmdi-email" aria-hidden="true"></i>
										</span>
        </div>
        <div class="wrap-input100 validate-input" data-bs-validate = "Password is required">
            <input class="input100" type="password" name="password" placeholder="Password">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
											<i class="zmdi zmdi-lock" aria-hidden="true"></i>
										</span>
        </div>
        <div class="wrap-input100 validate-input" data-bs-validate = "Password is required">
            <input class="input100" type="password" name="password_confirmation" placeholder="Confirm Password">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
											<i class="zmdi zmdi-lock" aria-hidden="true"></i>
										</span>
        </div>
        <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn btn-primary">
                Register
            </button>
        </div>
        <div class="text-center pt-3">
            <p class="text-dark mb-0">Already have account?<a href="{{route('login')}}" class="text-primary ms-1">Login</a></p>
        </div>
    </form>
@endsection
