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
}
