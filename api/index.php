<?php
use Illuminate\Http\Request;

error_reporting(E_ALL);
ini_set('display_errors', '1');
putenv('APP_DEBUG=true');
$_ENV['APP_DEBUG'] = 'true';
$_SERVER['APP_DEBUG'] = 'true';

putenv('LOG_CHANNEL=stderr');
$_ENV['LOG_CHANNEL'] = 'stderr';
$_SERVER['LOG_CHANNEL'] = 'stderr';

putenv('SESSION_DRIVER=cookie');
$_ENV['SESSION_DRIVER'] = 'cookie';
$_SERVER['SESSION_DRIVER'] = 'cookie';

define('LARAVEL_START', microtime(true));

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
$app = require_once __DIR__.'/../bootstrap/app.php';

// Vercel serverless environment is read-only. We must change all cache/storage paths to /tmp
$storagePath = '/tmp/storage';
$app->useStoragePath($storagePath);

// Override cache paths for read-only filesystem
putenv("APP_CONFIG_CACHE={$storagePath}/framework/cache/config.php");
putenv("APP_EVENTS_CACHE={$storagePath}/framework/cache/events.php");
putenv("APP_ROUTES_CACHE={$storagePath}/framework/cache/routes.php");
putenv("VIEW_COMPILED_PATH={$storagePath}/framework/views");
$_ENV['APP_CONFIG_CACHE'] = "{$storagePath}/framework/cache/config.php";
$_ENV['APP_EVENTS_CACHE'] = "{$storagePath}/framework/cache/events.php";
$_ENV['APP_ROUTES_CACHE'] = "{$storagePath}/framework/cache/routes.php";
$_ENV['VIEW_COMPILED_PATH'] = "{$storagePath}/framework/views";

// Ensure required directories exist in /tmp
$dirs = [
    "$storagePath/app",
    "$storagePath/framework/views",
    "$storagePath/framework/cache/data",
    "$storagePath/framework/sessions",
    "$storagePath/logs",
    "$storagePath/bootstrap/cache",
];
foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
}

// Optional: catch any output buffer that Vercel might be swallowing
ob_start();

try {
    $app->handleRequest(Request::capture());
} catch (\Throwable $e) {
    echo "<h1>CRITICAL PHP ERROR</h1>";
    echo "<pre>" . htmlspecialchars((string) $e) . "</pre>";
}

ob_end_flush();
