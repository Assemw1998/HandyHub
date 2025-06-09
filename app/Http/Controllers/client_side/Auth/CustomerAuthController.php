<?php

namespace App\Http\Controllers\client_side\Auth;

use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules\Password;

class CustomerAuthController extends Controller
{
    public function showRegisterForm() {
        return view('client_side.auth.customer_register');
    }

    public function register(Request $request) {
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'phone_number' => 'required|string|between:1,10|unique:customers,phone_number',
            'address' => 'nullable|string|max:255',
            'password'      => ['nullable', 'string', Password::min(8)
                ->mixedCase()
                ->numbers()
                ->symbols()],
        ]);
        $profileImageFile = $request->file('profile_image');
        $path = $profileImageFile->store('/images/resource', ['disk' => 'images']);

        $customer = new Customer;
        $customer->full_name = $validatedData['full_name'];
        $customer->email = $validatedData['email'];
        $customer->phone_number = $validatedData['phone_number'];
        $customer->address = $validatedData['address'] ?? null;
        $customer->password = $validatedData['password'];
        $customer->image_url = $path;

        $customer->save();


        Auth::guard('customer')->login($customer);

        return redirect()->route('/');
    }

    public function showLoginForm() {
        return view('client_side.auth.customer_login');
    }

    public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        $customer = \App\Models\Customer::where('email', $credentials['email'])->first();

        if (!$customer) {
            return back()->withErrors(['email' => 'Invalid email or password'])->withInput();
        }

        if ($customer->status == Customer::STATUS_INACTIVE) {
            return back()->withErrors(['email' => 'Your account has been suspended.'])->withInput();
        }

        if (Auth::guard('customer')->attempt($credentials)) {
            return redirect()->route('/');
        }

        return back()->withErrors(['email' => 'Invalid email or password'])->withInput();
    }


    public function logout() {
        Auth::guard('customer')->logout();
        return redirect()->route('/');
    }
}
