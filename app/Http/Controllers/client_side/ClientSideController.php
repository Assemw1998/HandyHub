<?php

namespace App\Http\Controllers\client_side;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientSideController extends Controller
{
    public function index()
    {
        return view('client_side.pages.index');
    }

    public function about()
    {
        return view('client_side.pages.about');
    }

    public function services()
    {
        return view('client_side.pages.services');
    }

    public function registerHandyman()
    {
        return view('client_side.pages.register-handyman');
    }

    public function contact()
    {
        return view('client_side.pages.contact');
    }
}
