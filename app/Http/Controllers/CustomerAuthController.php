<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class CustomerAuthController extends Controller
{
    public function create()
    {
        return view('website.auth.register.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|between:3,60',
            'mobile' => 'required|numeric|digits:11|starts_with:01|unique:customers,mobile',
            'email' => 'nullable|email:rfc,dns|unique:customers,email',
            'password' => ['nullable', 'max:20', Password::min(6)
                ->symbols()
                ->mixedCase()
                ->numbers()
                ->uncompromised(), 'confirmed'],
            'password_confirmation' => 'required|same:password'
        ], [
            'mobile.starts_with' => 'Mobile number must be a Bangladeshi mobile number.'
        ]);

        session()->flash('customer', [
            'customer_name' => $request->name,
            'customer_mobile' => $request->mobile,
            'customer_email' => $request->email,
            'customer_password' => $request->password
        ]);
        Customer::createNewCustomer();
        return redirect()->route('customer.signin')->with('message', 'Your account has created successfully. Please, sign in to your account.');
    }

    public function signin()
    {
        return view('website.auth.login.index');
    }

    public function login(Request $request)
    {
        $customer = Customer::where('mobile', $request->login_id)->orWhere('email', $request->login_id)->first();


        $this->validate($request, [
            'login_id' => 'required|string',
            'password' => 'required|string',
        ], [
            'login_id.exists' => 'Invalid mobile or email.'
        ]);

        if (isset($customer)) {
            if (isset($customer->password)) {
                if (password_verify($request->password, $customer->password)) {
                    session(['customerLoginId' => $customer->id]);
                    return redirect()->route('customer.account');
                } else {
                    return back()->with('message', 'Wrong Credentials.');
                }
            } else {
                return 'Password not set yet.......!';
            }
        } else {
            return 'Wrong customer........!';
        }
    }



    public function logout()
    {
        session()->forget('customerLoginId');
        return redirect()->route('customer.signin');
    }
}
