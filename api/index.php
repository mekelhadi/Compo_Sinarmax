<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

$tmp = null;

$isVercel = getenv('VERCEL') ?: getenv('VERCEL_ENV') ?: false;
if (isset($_ENV['VERCEL'])) $isVercel = true;
if (isset($_SERVER['VERCEL'])) $isVercel = true;

if ($isVercel) {
    $tmp = '/tmp/laravel';
    @mkdir($tmp, 0777, true);
    @mkdir('/tmp/views', 0777, true);

    $tmpDb = $tmp . '/database.sqlite';
    $srcDb = __DIR__ . '/../database/database.sqlite';
    if (file_exists($srcDb) && !file_exists($tmpDb)) {
        copy($srcDb, $tmpDb);
    }

    putenv('DB_DATABASE=' . $tmpDb);
    putenv('DB_CONNECTION=sqlite');
    putenv('APP_CONFIG_CACHE=/tmp/config.php');
    putenv('APP_EVENTS_CACHE=/tmp/events.php');
    putenv('APP_PACKAGES_CACHE=/tmp/packages.php');
    putenv('APP_ROUTES_CACHE=/tmp/routes.php');
    putenv('APP_SERVICES_CACHE=/tmp/services.php');
    putenv('VIEW_COMPILED_PATH=/tmp/views');
    putenv('CACHE_DRIVER=array');
    putenv('LOG_CHANNEL=stderr');
    putenv('SESSION_DRIVER=cookie');

    $storageDirs = [
        'storage/framework/cache/data',
        'storage/framework/sessions',
        'storage/framework/views',
        'storage/logs',
    ];
    foreach ($storageDirs as $dir) {
        $path = "$tmp/$dir";
        if (!is_dir($path)) {
            @mkdir($path, 0777, true);
        }
    }
}

if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

require __DIR__.'/../vendor/autoload.php';

$app = require_once __DIR__.'/../bootstrap/app.php';

if ($tmp !== null) {
    $app->useStoragePath($tmp . '/storage');
}

try {
    $app->handleRequest(Request::capture());
} catch (\Throwable $e) {
    http_response_code(500);
    header('Content-Type: text/plain');
    echo "=== ERROR ===\n";
    echo get_class($e) . ': ' . $e->getMessage() . PHP_EOL;
    echo $e->getFile() . ':' . $e->getLine() . PHP_EOL;
    echo "\n=== TRACE ===\n";
    echo $e->getTraceAsString() . PHP_EOL;
}
