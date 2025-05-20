<?php

namespace App\Http\Controllers\admins_side\admin\dashboard;

use App\Http\Controllers\Controller;
use App\Models\HandyMen;
use Illuminate\Http\Request;

class HandyManController extends Controller
{
    public function index()
    {
        $handyMen = HandyMen::all();
        return view('admins_side.admin.dashboard.handyman.index', ['handyMen' => $handyMen]);
    }

    public function createView()
    {
        return view('admins_side.admin.dashboard.handyman.create');
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:handy_men,email',
            'phone_number' => 'required|string|between:1,10|unique:handy_men,phone_number',
            'address' => 'nullable|string|max:255',
        ]);

        $handyMan = new HandyMen;
        $handyMan->full_name = $validatedData['full_name'];
        $handyMan->email = $validatedData['email'];
        $handyMan->phone_number = $validatedData['phone_number'];
        $handyMan->address = $validatedData['address'] ?? null;

        $handyMan->save();

        return redirect()->route('admin.dashboard.handyman-view', ['id' => $handyMan->id]);
    }

    public function updateView($id)
    {
        $handyMan = HandyMen::find($id);
        return view('admins_side.admin.dashboard.handyman.update', ['handyMan' => $handyMan]);
    }

    public function update($id, Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:handy_men,email,' . $id,
            'phone_number' => 'required|string|between:1,10|unique:handy_men,phone_number,' . $id,
            'address' => 'nullable|string|max:255',
        ]);

        $handyMan = HandyMen::find($id);
        $handyMan->full_name = $request->full_name;
        $handyMan->phone_number = $request->phone_number;
        $handyMan->email = $request->email;
        $handyMan->address = $request->address;
        $handyMan->save();

        return redirect()->route('admin.dashboard.handyman-view', ['id' => $handyMan->id]);
    }

    public function view($id)
    {
        $handyMan = HandyMen::find($id);
        return view('admins_side.admin.dashboard.handyman.view', ['handyMan' => $handyMan]);
    }

    public function activateDeactivate(Request $request)
    {
        $handyMan = HandyMen::find($request->id);

        if ($handyMan->status == HandyMen::STATUS_ACTIVE) {
            $handyMan->status = HandyMen::STATUS_INACTIVE;
        } elseif ($handyMan->status == HandyMen::STATUS_INACTIVE) {
            $handyMan->status = HandyMen::STATUS_ACTIVE;
        }
        if ($handyMan->save()) {
            return true;
        }

        return false;
    }

    public function delete(Request $request)
    {
        return HandyMen::where('id', $request->id)->delete();
    }

}
