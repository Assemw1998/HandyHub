<?php

namespace App\Http\Controllers\admins_side\admin\dashboard;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\Order;
class ContactUsController extends Controller
{
    public function index()
    {
        $contactsUs = ContactUs::all();
        return view('admins_side.admin.dashboard.contact_us.index', ['contactsUs' => $contactsUs]);
    }
}
