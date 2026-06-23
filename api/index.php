<?php
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
$app = require_once __DIR__.'/../bootstrap/app.php';

// Vercel serverless environment is read-only. We must change the storage path to /tmp
$app->useStoragePath('/tmp/storage');

$app->handleRequest(Request::capture());
