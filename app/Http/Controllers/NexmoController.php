<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NexmoController extends Controller
{
    public function index()
    {
        return view('nexmo');
    }

    public function store(Request $request)
    {
        try {
            $nexmo = app('Nexmo\Client');
            $nexmo->message()->send([
                'to' => $request->no_hp,
                'from' => 'laravel geo',
                'text' => $request->pesan,
            ]);
            return back();
        } catch (\Throwable $th) {
            return back();
        }
    }
}
