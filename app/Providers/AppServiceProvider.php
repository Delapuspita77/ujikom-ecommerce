<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public const HOME = '/home'; // untuk user biasa

    // di App\Providers\RouteServiceProvider@boot tambahkan:
    protected function redirectTo()
    {
        if (auth()->user()->role === 'admin') {
            return route('admin.dashboard');
        }
        return route('home');
    }

}
