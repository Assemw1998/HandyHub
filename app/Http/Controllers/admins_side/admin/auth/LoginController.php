<?php

namespace App\Http\Controllers\admins_side\admin\auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\AdminLoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('admins_side.admin.auth.index');
    }


    public function login(AdminLoginRequest $request)
    {
        $admin = Admin::first();
        $admin->password = '123456';
        $admin->save();

        $credentials = $request->getCredentials();

        if(!Auth::guard('admin')->attempt($credentials))
            return redirect()->back()->withInput()->withErrors(trans('auth.failed'));


        $admin = Auth::guard('admin')->attempt($credentials);


        return $this->authenticated($request, $admin);
    }


    protected function authenticated(Request $request, $admin)
    {
        return redirect()->route('admin.dashboard.index');
    }
}
