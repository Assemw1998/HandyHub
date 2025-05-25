<?php

namespace App\Http\Controllers\admins_side\admin\dashboard;

use App\Http\Controllers\Controller;
use App\Models\BackgroundImage;
use Illuminate\Http\Request;

class BackgroundImagesController  extends Controller
{
    public function index()
    {
        $backgroundImages=  BackgroundImage::all();
        return view('admins_side.admin.dashboard.background_image.index', ['backgroundImages' => $backgroundImages]);
    }
    public function createView()
    {
        return view('admins_side.admin.dashboard.background_image.create');
    }

    public function create(Request $request)
    {

        $backgroundImageFile=$request->file('background_image');
        $backgroundImage = new BackgroundImage;
        $backgroundImage->background_image_title = $request->background_image_title;
        $backgroundImage->background_image_description	 = $request->background_image_description;
        $path = $backgroundImageFile->store('/images/resource', ['disk' =>   'images']);
        $backgroundImage->image_url = $path;
        $backgroundImage->save();

        return redirect()->route('admin.dashboard.background-image-view', ['id' => $backgroundImage->id]);

    }

    public function view($id)
    {
        $backgroundImage = BackgroundImage::find($id);
        return view('admins_side.admin.dashboard.background_image.view', ['backgroundImage' => $backgroundImage]);
    }

    public function updateView($id)
    {
        $backgroundImage = BackgroundImage::find($id);
        return view('admins_side.admin.dashboard.background_image.update', ['backgroundImage' => $backgroundImage]);
    }


    public function update($id,Request $request)
    {

        $this->validate($request, [
            'background_image_title' => 'required|string|max:255',
            'background_image_description' => 'required|string|max:500',
        ]);


        $backgroundImage = BackgroundImage::find($id);
        $backgroundImage->background_image_title = $request->background_image_title;
        $backgroundImage->background_image_description	 = $request->background_image_description;
        if($request->file('background_image')){
            $backgroundImageFile=$request->file('background_image');
            $path = $backgroundImageFile->store('/images/resource', ['disk' =>   'images']);
            $backgroundImage->image_url = $path;
        }
        $backgroundImage->save();

        return redirect()->route('admin.dashboard.background-image-view', ['id' => $backgroundImage->id]);

    }

    public function delete(Request $request)
    {

        BackgroundImage::where('id', $request->id)->delete();
        return true;
    }

    public function deleteImage(Request $request)
    {
        $backgroundImage = BackgroundImage::find($request->id);
        $backgroundImage->image_url = NULL;
        if ($backgroundImage->save()) {
            return true;
        }else{
            return false;
        }

    }
}
