<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;

class VercelDatabaseSetup
{
    public function handle(Request $request, Closure $next)
    {
        if (!env('VERCEL') && !env('VERCEL_ENV')) {
            return $next($request);
        }

        $marker = storage_path('framework/.vercel-db-ready');

        if (!file_exists($marker)) {
            try {
                DB::statement('PRAGMA journal_mode=WAL');
                DB::statement('PRAGMA busy_timeout=5000');

                Artisan::call('migrate', ['--force' => true]);

                if (!\App\Models\User::where('email', 'sinarmax@gmail.com')->exists()) {
                    Artisan::call('db:seed', ['--force' => true]);
                }

                file_put_contents($marker, now()->toDateTimeString());
            } catch (\Throwable $e) {
                report($e);
            }
        }

        return $next($request);
    }
}
