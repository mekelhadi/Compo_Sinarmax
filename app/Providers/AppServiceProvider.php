<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Database\Seeders\RolePermissionSeeder;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\Facades\Artisan;


class AppServiceProvider extends ServiceProvider
{
    protected static bool $booted = false;

    public function register(): void
    {
        require_once app_path('Models/helpers.php');
    }

    public function boot(): void
    {
        Gate::before(function ($user, $ability) {
            if ($user->hasRole('superadmin')) {
                return true;
            }
        });

        if (app()->environment('production')) {
            URL::forceScheme('https');
        }

        if (!self::$booted && (env('VERCEL') || env('VERCEL_ENV'))) {
            self::$booted = true;
            try {
                Artisan::call('migrate', ['--force' => true]);
                if (!User::where('email', 'sinarmax@gmail.com')->exists()) {
                    Artisan::call('db:seed', ['--force' => true]);
                }
            } catch (\Throwable $e) {
                report($e);
            }
        }
    }
}
