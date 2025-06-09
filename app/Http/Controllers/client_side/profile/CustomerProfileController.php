<?php

namespace App\Http\Controllers\client_side\profile;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class CustomerProfileController extends Controller
{
    public function index()
    {
        $customer = Auth::guard('customer')->user();
        return view('client_side.customer.index',compact('customer'));
    }
    public function customerUpdate(Request $request)
    {
        $id = Auth::guard('customer')->id();

        $validatedData = $request->validate([
            'full_name'     => 'required|string|max:255',
            'email'         => 'required|email|unique:customers,email,' . $id,
            'phone_number'  => 'required|string|between:1,10|unique:customers,phone_number,' . $id,
            'address'       => 'nullable|string|max:255',
            'password'      => ['nullable', 'string', Password::min(8)
                ->mixedCase()
                ->numbers()
                ->symbols()],
        ]);


        $customer = Auth::guard('customer')->user();

        if ($request->file('profile_image')) {
            $profileImageFile = $request->file('profile_image');
            $path = $profileImageFile->store('/images/resource', ['disk' => 'images']);
            $customer->image_url = $path;
        }

        if ($request->password) {
            $customer->password = $request->password;
        }

        $customer->update($validatedData);

        return response()->json(['success' => true, 'message' => 'Profile updated successfully.']);
    }

    public function listOrders()
    {
        $orders = Order::with('customer', 'service')
            ->where('customer_id', Auth::guard('customer')->id())
            ->latest()
            ->get();

        return view('client_side.customer.order', compact('orders'));
    }

    public function cancelOrder(Order $order)
    {
        if ($order->customer_id !== auth()->id()) {
            abort(403);
        }

        if (!in_array($order->status, [Order::STATUS_PENDING, Order::STATUS_APPROVED_BY_ADMIN])) {
            return back()->with('error', 'Order cannot be cancelled.');
        }

        $order->status = Order::STATUS_CANCELLED_BY_CUSTOMER;
        $order->save();

        return back()->with('success', 'Order cancelled.');
    }

    public function rateOrder(Request $request, Order $order)
    {
        $request->validate(['rate' => 'required|integer|min:1|max:5']);

        if ($order->customer_id !== auth()->id() || $order->status !== Order::STATUS_COMPLETED) {
            abort(403);
        }

        $existingRate = Rate::where('service_id', $order->service_id)
            ->where('customer_id', auth()->id())
            ->first();

        if ($existingRate) {
            return back()->with('error', 'You already rated this service.');
        }

        Rate::create([
            'service_id' => $order->service_id,
            'customer_id' => auth()->id(),
            'rate' => $request->rate,
        ]);

        return back()->with('success', 'Thank you for your rating.');
    }




}
