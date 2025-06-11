<?php

namespace App\Http\Controllers\client_side\profile;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
        ]);

        $customerId = Auth::guard('customer')->id();

        $excludedStatuses = [
            Order::STATUS_COMPLETED,
            Order::STATUS_CANCELLED_BY_ADMIN,
            Order::STATUS_CANCELLED_BY_CUSTOMER,
            Order::STATUS_CANCELLED_BY_HANDYMAN,
        ];

        $existingOrder = Order::where('service_id', $request->service_id)
            ->where('customer_id', $customerId)
            ->whereNotIn('status', $excludedStatuses)
            ->first();

        if ($existingOrder) {
            return response()->json([
                'success' => false,
                'message' => 'You already have an order for this service that is not completed.'
            ], 422); // 422 Unprocessable Entity for validation-like error
        }

        $order = Order::create([
            'service_id' => $request->service_id,
            'customer_id' => $customerId,
            'status' => Order::STATUS_PENDING,
            'full_address'=>$request->full_address??null,
            'note_description'=>$request->note_description??null,
            'created_by' => $customerId,
        ]);

        return response()->json(['success' => true, 'order_id' => $order->id]);
    }
}
