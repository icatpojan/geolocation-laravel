<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class UserController extends Controller
{
    public function get_ip_address(Request $request)
    {
        // $ip = $request->ip(); dinamic ip
        $ip = '110.137.192.50'; // static ip
        $currentUserInfo = Location::get($ip);
        return view('get-ip-address', compact('currentUserInfo'));
    }

    public function get_latitude()
    {
        return view('get-latitude');
    }

    public function mark_location()
    {
        return view('mark-location');
    }

    public function set_mark()
    {
        return view('set-mark');
    }

    public function polylines()
    {
        return view('polylines');
    }

    function jaarak()
    {
        $coord_a = "-6.455760963883071,38.42550567634645";
        $coord_b = "-6.159617,106.839523";
        # jarak kilometer dimensi (mean radius) bumi
        $R = 6371;
        $coord_a = explode(",", $coord_a);
        $coord_b = explode(",", $coord_b);
        $dLat = $this->rad(($coord_b[0]) - ($coord_a[0]));
        $dLong = $this->rad($coord_b[1] - $coord_a[1]);
        $a = sin($dLat / 2) * sin($dLat / 2) + cos($this->rad($coord_a[0])) * cos($this->rad($coord_b[0])) * sin($dLong / 2) * sin($dLong / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $d = $R * $c;
        # hasil akhir dalam satuan kilometer
        return number_format($d, 0, '.', ',');
    }

    function jarak()
    {
        $lat1 = "-6.455760963883071";
        $lon1 = "38.42550567634645";
        $lat2 = "-6.159617";
        $lon2 = "106.839523";
        $theta = $lon1 - $lon2;
        $miles = (sin(deg2rad($lat1)) * sin(deg2rad($lat2))) + (cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)));
        $miles = acos($miles);
        $miles = rad2deg($miles);
        $miles = $miles * 60 * 1.1515;
        $feet = $miles * 5280;
        $yards = $feet / 3;
        $kilometers = $miles * 1.609344;
        $meters = $kilometers * 1000;
        return compact('miles', 'feet', 'yards', 'kilometers', 'meters');
    }
}
