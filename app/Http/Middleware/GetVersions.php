<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;

class GetVersions
{
    public function handle($request, Closure $next)
    {
        try {
            Config::set('laravel-version', App::VERSION());
        } catch (\Throwable $e) {
            //
        }

        try {
            Artisan::call('composer:info', ['package' => 'tightenco/ziggy']);
            Config::set('ziggy-version', Artisan::output());
        } catch (\Throwable $e) {
            //
        }

        return $next($request);
    }
}
