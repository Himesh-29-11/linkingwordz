<?php

/**
 * One-time migration runner for Hostinger. Delete after use.
 * Visit: /deploy/run-migrate.php?key=lw-migrate-2026
 */

declare(strict_types=1);

$key = $_GET['key'] ?? '';
if ($key !== 'lw-migrate-2026') {
    http_response_code(403);
    echo 'Forbidden';
    exit;
}

header('Content-Type: text/plain; charset=utf-8');

$root = dirname(__DIR__);
chdir($root);

require $root.'/vendor/autoload.php';

$app = require $root.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "Running migrations...\n";
$status = Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
echo Illuminate\Support\Facades\Artisan::output();
echo "\nSeeding CMS content...\n";
Illuminate\Support\Facades\Artisan::call('db:seed', ['--class' => 'Database\\Seeders\\ContentSeeder', '--force' => true]);
echo Illuminate\Support\Facades\Artisan::output();
echo "\nDone. Delete deploy/run-migrate.php after confirming admin works.\n";
