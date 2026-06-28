<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use App\Models\User;

class EnsureDatabaseSeeded
{
    public function handle(Request $request, Closure $next)
    {
        $marker = storage_path('framework/.laravel-ready');

        if (!file_exists($marker)) {
            Artisan::call('migrate', ['--force' => true]);
            if (!User::where('email', 'sinarmax@gmail.com')->exists()) {
                Artisan::call('db:seed', ['--force' => true]);
            }
            file_put_contents($marker, now()->toDateTimeString());
        }

        return $next($request);
    }
}
