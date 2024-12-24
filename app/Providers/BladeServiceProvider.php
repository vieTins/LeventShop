<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Blade::if('hasrole', function ($role) {
            $admin = Auth::guard('web')->user();  // Sử dụng guard 'admin'
            if ($admin && $admin->hasRole($role)) {
                return true;
            }
            return false;
        });
    }
}
