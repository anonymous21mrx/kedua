<?php
use Illuminate\Http\Request;

error_reporting(E_ALL);
ini_set('display_errors', '1');
putenv('APP_DEBUG=true');
$_ENV['APP_DEBUG'] = 'true';
$_SERVER['APP_DEBUG'] = 'true';

define('LARAVEL_START', microtime(true));

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
$app = require_once __DIR__.'/../bootstrap/app.php';

// Vercel serverless environment is read-only. We must change the storage path to /tmp
$storagePath = '/tmp/storage';
$app->useStoragePath($storagePath);

// Ensure required directories exist in /tmp
$dirs = [
    "$storagePath/framework/views",
    "$storagePath/framework/cache/data",
    "$storagePath/framework/sessions",
    "$storagePath/logs",
];
foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
}

$app->handleRequest(Request::capture());
