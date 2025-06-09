<?php

namespace App\Http\Controllers\admins_side\admin\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('admins_side.admin.dashboard.order.index', ['orders' => $orders]);
    }

    public function view($id)
    {
        $order = Order::find($id);
        return view('admins_side.admin.dashboard.order.view', ['order' => $order]);
    }

    public function updateStatus(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => 'required|in:10,20,30,40,50,60,70',
        ]);

        $order->status = $validated['status'];
        $order->save();

        return back()->with('success', 'Order status updated.');
    }

    public function cancel(Order $order, Request $request)
    {
        $cancelBy = $request->input('cancel_by');

        if ($cancelBy === 'admin') {
            $order->status = Order::STATUS_CANCELLED_BY_ADMIN;
        } elseif ($cancelBy === 'handyman') {
            $order->status = Order::STATUS_CANCELLED_BY_HANDYMAN;
        }

        $order->save();
        return back()->with('success', 'Order cancelled successfully.');
    }
}
