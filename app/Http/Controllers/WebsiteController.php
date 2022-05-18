<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        return view('client.pages.home.index');
    }
    public function dashboard()
    {
        return view('client.pages.dashboard.index');
    }
    public function consult()
    {
        return view('client.pages.dashboard.consult');
    }
}
