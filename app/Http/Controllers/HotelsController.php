<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HotelsController extends Controller
{
    public function index()
    {
        return view('hotels');
    }

    public function detail_index(Request $request)
    {
        return view('hotels-detail');
    }
}
