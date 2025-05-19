<?php

namespace App\Http\Controllers\admins_side\admin\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admins_side.admin.dashboard.category.index', ['categories' => $categories]);
    }
    public function createView()
    {
        $categories = Category::all();
        return view('admins_side.admin.dashboard.category.create',['$categories' => $categories]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);
        $category = new Category;
        $category->name = $request->name;


        if ($category->save()) {
            return redirect()->route('admin.dashboard.category-view', ['id' => $category->id]);
        }
    }

    public function view($id)
    {
        $category = Category::find($id);
        return view('admins_side.admin.dashboard.category.view', ['category' => $category]);
    }
    public function updateView($id)
    {
        $category = Category::find($id);
        return view('admins_side.admin.dashboard.category.update', ['category' => $category]);
    }


    public function update($id,Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);

        $category = Category::find($id);
        $category->name = $request->name;

        if ($category->save()) {
            return redirect()->route('admin.dashboard.category-view', ['id' => $category->id]);
        }
    }

    public function delete(Request $request)
    {

        Category::where('id', $request->id)->delete();
        return true;
    }



}
