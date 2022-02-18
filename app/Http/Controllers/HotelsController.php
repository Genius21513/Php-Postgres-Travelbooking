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
        $s = $request->input('sessionid');
        $h = $request->input('hotelid');
        
        return view('hotels-detail');
    }
}
