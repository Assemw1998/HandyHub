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

        // Check if there's an existing order with same service_id and customer_id where status is NOT completed
        $existingOrder = Order::where('service_id', $request->service_id)
            ->where('customer_id', $customerId)
            ->where('status', '!=', Order::STATUS_COMPLETED)
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
            'created_by' => $customerId,
        ]);

        return response()->json(['success' => true, 'order_id' => $order->id]);
    }
}
