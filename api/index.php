<?php

$isVercel = getenv('VERCEL') ?: getenv('VERCEL_ENV') ?: false;

if ($isVercel) {
    $tmp = '/tmp/laravel';
    @mkdir($tmp, 0777, true);

    $tmpDb = $tmp . '/database.sqlite';
    $srcDb = __DIR__ . '/../database/database.sqlite';
    if (file_exists($srcDb) && !file_exists($tmpDb)) {
        copy($srcDb, $tmpDb);
    }

    putenv('DB_DATABASE=' . $tmpDb);
    putenv('DB_CONNECTION=sqlite');

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

require __DIR__.'/../public/index.php';
