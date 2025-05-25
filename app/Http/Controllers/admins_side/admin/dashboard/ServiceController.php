<?php

namespace App\Http\Controllers\admins_side\admin\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\HandyMen;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $handyMen = HandyMen::where('status', HandyMen::STATUS_ACTIVE)->get();
        $categories = Category::where('status', Category::STATUS_ACTIVE)->get();
        return view(
            'admins_side.admin.dashboard.service.index',
            ['services' => $services, 'handyMen' => $handyMen, 'categories' => $categories]
        );
    }

    public function createView()
    {
        $handyMen = HandyMen::where('status', HandyMen::STATUS_ACTIVE)->get();
        $categories = Category::where('status', Category::STATUS_ACTIVE)->get();
        return view('admins_side.admin.dashboard.service.create',['handyMen' => $handyMen, 'categories' => $categories]);
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'category_id'    => 'required|exists:categories,id',
            'handy_man_id'   => 'required|exists:handy_men,id',
            'title'          => 'required|string|max:255',
            'description'    => 'required|string',
            'price'          => 'nullable|numeric|between:0,99999999.99',
        ]);

        $serviceImageFile = $request->file('service_image');
        $path = $serviceImageFile->store('/images/resource', ['disk' => 'images']);

        $service = new Service();
        $service->category_id = $validatedData['category_id'];
        $service->handy_man_id = $validatedData['handy_man_id'];
        $service->title = $validatedData['title'];
        $service->description = $validatedData['description'];
        $service->price = $validatedData['price'] ?? null;
        $service->image_url = $path;

        $service->save();

        return redirect()->route('admin.dashboard.service-view', ['id' => $service->id]);
    }


    public function updateView($id)
    {
        $service = Service::find($id);
        $handyMen = HandyMen::where('status', HandyMen::STATUS_ACTIVE)->get();
        $categories = Category::where('status', Category::STATUS_ACTIVE)->get();
        return view('admins_side.admin.dashboard.service.update', ['service' => $service,'handyMen' => $handyMen,'categories' => $categories]);
    }

    public function update($id, Request $request)
    {
        $validatedData = $request->validate([
            'category_id'    => 'required|exists:categories,id',
            'handy_man_id'   => 'required|exists:handy_men,id',
            'title'          => 'required|string|max:255',
            'description'    => 'required|string',
            'price'          => 'nullable|numeric|between:0,99999999.99',
            'service_image'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $service = Service::find($id);
        $service->category_id = $validatedData['category_id'];
        $service->handy_man_id = $validatedData['handy_man_id'];
        $service->title = $validatedData['title'];
        $service->description = $validatedData['description'];
        $service->price = $validatedData['price'] ?? null;

        if ($request->file('service_image')) {
            $serviceImageFile = $request->file('service_image');
            $path = $serviceImageFile->store('/images/resource', ['disk' => 'images']);
            $service->image_url = $path;
        }


        $service->save();

        return redirect()->route('admin.dashboard.service-view', ['id' => $service->id]);
    }

    public function view($id)
    {
        $service = Service::find($id);
        return view('admins_side.admin.dashboard.service.view', ['service' => $service]);
    }

    public function activateDeactivate(Request $request)
    {
        $service = Service::find($request->id);

        if ($service->status == Service::STATUS_ACTIVE) {
            $service->status = Service::STATUS_INACTIVE;
        } elseif ($service->status == Service::STATUS_INACTIVE) {
            $service->status = Service::STATUS_ACTIVE;
        }
        if ($service->save()) {
            return true;
        }

        return false;
    }

    public function delete(Request $request)
    {
        return Service::where('id', $request->id)->delete();
    }

    public function deleteProfileImage(Request $request)
    {
        $service = Service::find($request->id);
        $service->image_url = null;
        if ($service->save()) {
            return true;
        } else {
            return false;
        }
    }

}
