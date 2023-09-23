@extends('auth.register')
@section('title')
    Login
@endsection
@section('body')
    <form class="login100-form validate-form" action="{{route('login')}}" method="POST">
        @csrf
									<span class="login100-form-title">
										Login
									</span>
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
        <label class="custom-control custom-checkbox mt-4">
            <input type="checkbox" class="custom-control-input" name="remember">
            <span class="custom-control-label">Remember me</span>
        </label>
        <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn btn-primary">
                Login
            </button>
        </div>
        <div class="text-end pt-1">
            <p class="mb-0"><a href="{{route('password.request')}}" class="text-primary ms-1">Forgot Password?</a></p>
        </div>
    </form>
@endsection
