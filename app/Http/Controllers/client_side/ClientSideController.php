<?php

namespace App\Http\Controllers\client_side;

use App\Http\Controllers\Controller;
use App\Models\BackgroundImage;
use App\Models\Category;
use App\Models\ContactUs;
use App\Models\Service;
use Illuminate\Http\Request;

class ClientSideController extends Controller
{
    public function index()
    {
        $backgroundImage = BackgroundImage::inRandomOrder()->first();
        $categories = Category::where('status', Category::STATUS_ACTIVE)->get();
        $popularServices = Service::where('status', Service::STATUS_ACTIVE)
            ->withCount('orders')
            ->orderByDesc('orders_count')
            ->take(9)
            ->get();

        return view('client_side.pages.index', [
            'backgroundImage' => $backgroundImage,
            'categories' => $categories,
            'popularServices' =>$popularServices
        ]);
    }

    public function about()
    {
        $backgroundImage = BackgroundImage::inRandomOrder()->first();
        return view('client_side.pages.about',[
            'backgroundImage' => $backgroundImage,
        ]);
    }

    public function contactUs()
    {
        $backgroundImage = BackgroundImage::inRandomOrder()->first();
        return view('client_side.pages.contact_us',[
            'backgroundImage' => $backgroundImage,
        ]);
    }

    public function contactUsStore(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email'     => 'required|email|max:255',
            'subject'   => 'required|string|max:255',
            'message'   => 'required|string',
        ]);

        ContactUs::create($validated);

        return redirect()->back()->with('success', 'Your message has been sent successfully.');
    }

    public function servicesByCategory(Request $request)
    {
        $categoryId = $request->query('id');

        $services = Service::where('status', 1)
            ->where('category_id', $categoryId)
            ->with('handyman') // assuming you have relation in Service model
            ->get();

        $category = Category::findOrFail($categoryId);

        return view('client_side.pages.services_by_category', [
            'services' => $services,
            'category' => $category,
        ]);
    }
}
