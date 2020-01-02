<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Config;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'laravelVersion' => Config::get('laravel-version'),
            'ziggyVersion' => Config::get('ziggy-version'),
        ]);
    }
}
