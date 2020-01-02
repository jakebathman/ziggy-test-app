<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;

class HomeController extends Controller
{
    public $laravelVersion;
    public $ziggyVersion;

    public function __construct()
    {
        $this->laravelVersion = App::VERSION();

        Artisan::call('composer:info tightenco/ziggy');
        $this->ziggyVersion = Artisan::output();
    }

    public function index()
    {
        return view('home', [
            'laravelVersion' => $this->laravelVersion,
            'ziggyVersion' => $this->ziggyVersion,
        ]);
    }
}
