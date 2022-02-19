<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Apis\ResVoyageApi;

class HotelsController extends Controller
{
    private $api;

    public function __construct() {
        $this->api = App::make(ResVoyageApi::class);
    }

    public function index()
    {
        return view('hotels');
    }

    public function detail_index (Request $request)
    {   
        $s = $request->input('sessionid');
        $h = $request->input('hotelid');
        
        $ret = $this->api->getHotelDetails ($s, $h);
        return view('hotels-detail', ['data' => $ret]);
    }

    public function search_dest (Request $request)
    {
        $dest = $request->input('dest');
        $ret = $this->api->searchDestination ($dest);
        exit(json_encode ($ret));
    }

    public function search_hotel (Request $request)
    {
        $hc = $request->input('hcc');
        $ci = $request->input('cid');
        $co = $request->input('cod');
        $ad = $request->input('adu');
        $rc = $request->input('rc');

        $ret = $this->api->searchHotel ($hc, $ci, $co, $ad, $rc);
        exit(json_encode ($ret));
    }
}
