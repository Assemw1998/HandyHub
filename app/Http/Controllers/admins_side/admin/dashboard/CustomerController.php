<?php

namespace App\Http\Controllers\admins_side\admin\dashboard;

use App\Http\Controllers\Controller;
use App\Models\BackgroundImage;
use App\Models\Customer;
use Illuminate\Http\Request;
use IlluminateSupportFacadesAuth;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('admins_side.admin.dashboard.customer.index', ['customers' => $customers]);
    }

    public function createView()
    {
        return view('admins_side.admin.dashboard.customer.create');
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'phone_number' => 'required|string|between:1,10|unique:customers,phone_number',
            'address' => 'nullable|string|max:255',
            'password' => 'required|string|min:6',
        ]);
        $profileImageFile = $request->file('profile_image');
        $path = $profileImageFile->store('/images/resource', ['disk' => 'images']);

        $customer = new Customer;
        $customer->full_name = $validatedData['full_name'];
        $customer->email = $validatedData['email'];
        $customer->phone_number = $validatedData['phone_number'];
        $customer->address = $validatedData['address'] ?? null;
        $customer->password = bcrypt($validatedData['password']);
        $customer->image_url = $path;

        $customer->save();

        return redirect()->route('admin.dashboard.customer-view', ['id' => $customer->id]);
    }

    public function updateView($id)
    {
        $customer = Customer::find($id);
        return view('admins_side.admin.dashboard.customer.update', ['customer' => $customer]);
    }

    public function update($id, Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,' . $id,
            'phone_number' => 'required|string|between:1,10|unique:customers,phone_number,' . $id,
            'address' => 'nullable|string|max:255',
        ]);

        $customer = Customer::find($id);
        $customer->full_name = $request->full_name;
        $customer->phone_number = $request->phone_number;
        $customer->email = $request->email;
        $customer->address = $request->address;

        if ($request->file('profile_image')) {
            $profileImageFile = $request->file('profile_image');
            $path = $profileImageFile->store('/images/resource', ['disk' => 'images']);
            $customer->image_url = $path;
        }

        if ($request->password) {
            $customer->password = $request->password;
        }

        $customer->save();

        return redirect()->route('admin.dashboard.customer-view', ['id' => $customer->id]);
    }

    public function view($id)
    {
        $customer = Customer::find($id);
        return view('admins_side.admin.dashboard.customer.view', ['customer' => $customer]);
    }

    public function activateDeactivate(Request $request)
    {
        $customer = Customer::find($request->id);

        if ($customer->status == Customer::STATUS_ACTIVE) {
            $customer->status = Customer::STATUS_INACTIVE;
        } elseif ($customer->status == Customer::STATUS_INACTIVE) {
            $customer->status = Customer::STATUS_ACTIVE;
        }
        if ($customer->save()) {
            return true;
        }

        return false;
    }

    public function delete(Request $request)
    {
        return Customer::where('id', $request->id)->delete();
    }

    public function deleteProfileImage(Request $request)
    {
        $customer = Customer::find($request->id);
        $customer->image_url = null;
        if ($customer->save()) {
            return true;
        } else {
            return false;
        }
    }

}
