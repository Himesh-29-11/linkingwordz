<?php

/**
 * One-time Hostinger SQL importer. Delete this file after use.
 * Visit: /import-db.php?key=lw-import-2026
 */

declare(strict_types=1);

$key = $_GET['key'] ?? '';
if ($key !== 'lw-import-2026') {
    http_response_code(403);
    echo 'Forbidden';
    exit;
}

header('Content-Type: text/plain; charset=utf-8');

$root = dirname(__DIR__);
$envFile = $root . '/.env';
$sqlFile = $root . '/linkingwordz.sql';

if (! is_file($envFile)) {
    echo "Missing .env\n";
    exit(1);
}
if (! is_file($sqlFile)) {
    echo "Missing linkingwordz.sql\n";
    exit(1);
}

$env = [];
foreach (file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
    $line = trim($line);
    if ($line === '' || str_starts_with($line, '#') || ! str_contains($line, '=')) {
        continue;
    }
    [$k, $v] = explode('=', $line, 2);
    $v = trim($v);
    if (
        (str_starts_with($v, '"') && str_ends_with($v, '"')) ||
        (str_starts_with($v, "'") && str_ends_with($v, "'"))
    ) {
        $v = substr($v, 1, -1);
    }
    $env[trim($k)] = $v;
}

$host = $env['DB_HOST'] ?? '127.0.0.1';
$port = $env['DB_PORT'] ?? '3306';
$db = $env['DB_DATABASE'] ?? '';
$user = $env['DB_USERNAME'] ?? '';
$pass = $env['DB_PASSWORD'] ?? '';

try {
    $pdo = new PDO(
        "mysql:host={$host};port={$port};dbname={$db};charset=utf8mb4",
        $user,
        $pass,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (Throwable $e) {
    echo 'DB connect failed: ' . $e->getMessage() . "\n";
    exit(1);
}

$sql = file_get_contents($sqlFile);
if ($sql === false || trim($sql) === '') {
    echo "SQL file empty\n";
    exit(1);
}

// Strip BOM
if (str_starts_with($sql, "\xEF\xBB\xBF")) {
    $sql = substr($sql, 3);
}

try {
    $pdo->exec($sql);
    echo "SQL import OK\n";
} catch (Throwable $e) {
    // Fallback: run statement by statement
    echo "Bulk exec failed, trying split: " . $e->getMessage() . "\n";
    $pdo->exec('SET FOREIGN_KEY_CHECKS=0');
    $parts = preg_split('/;\s*\n/', $sql) ?: [];
    $ok = 0;
    $fail = 0;
    foreach ($parts as $part) {
        $stmt = trim($part);
        if ($stmt === '' || str_starts_with($stmt, '--')) {
            continue;
        }
        try {
            $pdo->exec($stmt);
            $ok++;
        } catch (Throwable $inner) {
            $fail++;
            echo 'FAIL: ' . substr($stmt, 0, 80) . '... => ' . $inner->getMessage() . "\n";
        }
    }
    $pdo->exec('SET FOREIGN_KEY_CHECKS=1');
    echo "Done split import. ok={$ok} fail={$fail}\n";
}

$tables = $pdo->query('SHOW TABLES')->fetchAll(PDO::FETCH_COLUMN);
echo 'Tables: ' . implode(', ', $tables) . "\n";
$posts = 0;
if (in_array('posts', $tables, true)) {
    $posts = (int) $pdo->query('SELECT COUNT(*) FROM posts')->fetchColumn();
}
echo "posts count={$posts}\n";
echo "DELETE public/import-db.php now.\n";
