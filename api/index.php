<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

$tmp = null;

if (isset($_ENV['VERCEL'])) {
    $tmp = '/tmp/laravel';

    @mkdir($tmp, 0777, true);

    $tmpDb = $tmp . '/database.sqlite';
    $srcDb = __DIR__ . '/../database/database.sqlite';
    if (file_exists($srcDb) && !file_exists($tmpDb)) {
        copy($srcDb, $tmpDb);
    }

    putenv("DB_DATABASE=$tmpDb");

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

$app->handleRequest(Request::capture());
