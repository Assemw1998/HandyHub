<?php

namespace App\Http\Controllers\admins_side\admin\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Customer;
use App\Models\ContactUs;
use App\Models\Service;
use App\Models\Admin;

class IndexController extends Controller
{
    public function index()
    {
        $ordersCount = Order::count();
        $customerCount = Customer::count();
        $contactUsCount = ContactUs::count();
        $servicesCount = Service::count();
        $adminsCount = Admin::count();


        return view('admins_side.admin.dashboard.index', [
            "adminsCount" => $adminsCount,
            'customerCount' => $customerCount,
            'contactUsCount' => $contactUsCount,
            'ordersCount' => $ordersCount,
            'servicesCount' => $servicesCount
        ]);    }
}
