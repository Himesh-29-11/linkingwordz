<?php

/**
 * Export SQLite database to Hostinger-friendly MySQL SQL.
 */

$sqlitePath = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR . 'database.sqlite';
$outPath = __DIR__ . DIRECTORY_SEPARATOR . 'linkingwordz.sql';

if (! is_file($sqlitePath)) {
    fwrite(STDERR, "SQLite DB not found: {$sqlitePath}\n");
    exit(1);
}

$pdo = new PDO('sqlite:' . $sqlitePath);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$skipTables = ['sqlite_sequence'];

// Hostinger-safe create order (parents before children)
$preferredOrder = [
    'users',
    'password_reset_tokens',
    'sessions',
    'cache',
    'cache_locks',
    'jobs',
    'job_batches',
    'failed_jobs',
    'trust_stats',
    'services',
    'testimonials',
    'posts',
    'comments',
    'post_likes',
    'inquiries',
    'migrations',
];

$existing = $pdo->query(
    "SELECT name FROM sqlite_master WHERE type='table' AND name NOT LIKE 'sqlite_%'"
)->fetchAll(PDO::FETCH_COLUMN);

$tables = [];
foreach ($preferredOrder as $name) {
    if (in_array($name, $existing, true)) {
        $tables[] = $name;
    }
}
foreach ($existing as $name) {
    if (! in_array($name, $tables, true)) {
        $tables[] = $name;
    }
}

function mysqlEscape(string $value): string
{
    return "'" . str_replace(
        ["\\", "\0", "\n", "\r", "'", '"', "\x1a"],
        ["\\\\", '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'],
        $value
    ) . "'";
}

function mapColumn(array $col): string
{
    $name = $col['name'];
    $rawType = strtoupper(trim((string) $col['type']));
    $notNull = ((int) $col['notnull']) === 1;
    $pk = ((int) $col['pk']) > 0;
    $default = $col['dflt_value'];

    // Known Laravel column shapes
    $overrides = [
        'id' => 'BIGINT UNSIGNED NOT NULL AUTO_INCREMENT',
        'user_id' => 'BIGINT UNSIGNED NULL',
        'post_id' => 'BIGINT UNSIGNED NOT NULL',
        'email' => 'VARCHAR(255) NOT NULL',
        'name' => 'VARCHAR(255) NOT NULL',
        'password' => 'VARCHAR(255) NOT NULL',
        'remember_token' => 'VARCHAR(100) NULL',
        'slug' => 'VARCHAR(255) NOT NULL',
        'title' => 'VARCHAR(255) NOT NULL',
        'excerpt' => 'VARCHAR(600) NULL',
        'body' => 'LONGTEXT NULL',
        'category' => 'VARCHAR(255) NOT NULL DEFAULT \'Blog\'',
        'image' => 'VARCHAR(255) NULL',
        'display_date' => 'VARCHAR(255) NULL',
        'status' => 'VARCHAR(255) NOT NULL',
        'views' => 'INT UNSIGNED NOT NULL DEFAULT 0',
        'likes_count' => 'INT UNSIGNED NOT NULL DEFAULT 0',
        'published_at' => 'TIMESTAMP NULL DEFAULT NULL',
        'created_at' => 'TIMESTAMP NULL DEFAULT NULL',
        'updated_at' => 'TIMESTAMP NULL DEFAULT NULL',
        'email_verified_at' => 'TIMESTAMP NULL DEFAULT NULL',
        'read_at' => 'TIMESTAMP NULL DEFAULT NULL',
        'author_name' => 'VARCHAR(255) NOT NULL DEFAULT \'Guest\'',
        'author_email' => 'VARCHAR(255) NULL',
        'ip_address' => 'VARCHAR(45) NULL',
        'guest_key' => 'VARCHAR(255) NOT NULL',
        'first_name' => 'VARCHAR(255) NOT NULL',
        'last_name' => 'VARCHAR(255) NULL',
        'phone' => 'VARCHAR(255) NULL',
        'message' => 'LONGTEXT NULL',
        'is_admin' => 'TINYINT(1) NOT NULL DEFAULT 0',
        'meta_title' => 'VARCHAR(255) NULL',
        'meta_description' => 'VARCHAR(500) NULL',
        'seo_title' => 'VARCHAR(255) NULL',
        'seo_description' => 'VARCHAR(320) NULL',
        'seo_keywords' => 'VARCHAR(320) NULL',
        'canonical_url' => 'VARCHAR(255) NULL',
        'og_image' => 'VARCHAR(255) NULL',
        'token' => 'VARCHAR(255) NOT NULL',
        'key' => 'VARCHAR(255) NOT NULL',
        'value' => 'MEDIUMTEXT NOT NULL',
        'owner' => 'VARCHAR(255) NOT NULL',
        'expiration' => 'INT NOT NULL',
        'payload' => 'LONGTEXT NOT NULL',
        'user_agent' => 'TEXT NULL',
        'last_activity' => 'INT NOT NULL',
        'queue' => 'VARCHAR(255) NOT NULL',
        'attempts' => 'INT UNSIGNED NOT NULL',
        'reserved_at' => 'INT UNSIGNED NULL',
        'available_at' => 'INT UNSIGNED NOT NULL',
        'migration' => 'VARCHAR(255) NOT NULL',
        'batch' => 'INT NOT NULL',
        'uuid' => 'VARCHAR(255) NOT NULL',
        'connection' => 'TEXT NULL',
        'exception' => 'LONGTEXT NOT NULL',
        'failed_at' => 'TIMESTAMP NOT NULL',
        'label' => 'VARCHAR(255) NOT NULL',
        'detail' => 'VARCHAR(255) NULL',
        'icon' => 'VARCHAR(255) NULL',
        'sort_order' => 'INT NOT NULL DEFAULT 0',
        'audience' => 'VARCHAR(255) NULL',
        'text' => 'TEXT NULL',
        'quote' => 'TEXT NULL',
        'role' => 'VARCHAR(255) NULL',
        'avatar' => 'VARCHAR(255) NULL',
        'href' => 'VARCHAR(255) NULL',
        'description' => 'TEXT NULL',
    ];

    if (isset($overrides[$name])) {
        return "  `{$name}` {$overrides[$name]}";
    }

    if ($pk && (str_contains($rawType, 'INT') || $rawType === '')) {
        return "  `{$name}` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT";
    }

    $mysqlType = 'TEXT';
    if (preg_match('/VARCHAR\((\d+)\)/i', $rawType, $m)) {
        $mysqlType = 'VARCHAR(' . $m[1] . ')';
    } elseif (str_contains($rawType, 'INT')) {
        $mysqlType = 'BIGINT';
    } elseif ($rawType === 'BLOB') {
        $mysqlType = 'LONGBLOB';
    } elseif ($rawType === 'REAL' || $rawType === 'FLOAT' || $rawType === 'DOUBLE') {
        $mysqlType = 'DOUBLE';
    } elseif ($rawType !== '') {
        $mysqlType = $rawType;
    }

    $line = "  `{$name}` {$mysqlType}";
    if ($notNull) {
        $line .= ' NOT NULL';
    } else {
        $line .= ' NULL';
    }

    if ($default !== null) {
        if (strtoupper((string) $default) === 'NULL') {
            $line .= ' DEFAULT NULL';
        } elseif (is_numeric($default)) {
            $line .= ' DEFAULT ' . $default;
        } else {
            $cleaned = trim((string) $default, "\"'");
            $line .= ' DEFAULT ' . mysqlEscape($cleaned);
        }
    }

    return $line;
}

$sql = [];
$sql[] = '-- LinkingWordz database dump for Hostinger (MySQL / MariaDB)';
$sql[] = '-- Generated: ' . gmdate('Y-m-d H:i:s') . ' UTC';
$sql[] = '-- Import via phpMyAdmin or mysql CLI';
$sql[] = 'SET NAMES utf8mb4;';
$sql[] = 'SET FOREIGN_KEY_CHECKS = 0;';
$sql[] = 'SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";';
$sql[] = '';

foreach ($tables as $table) {
    $cols = $pdo->query("PRAGMA table_info(`{$table}`)")->fetchAll(PDO::FETCH_ASSOC);
    $fks = $pdo->query("PRAGMA foreign_key_list(`{$table}`)")->fetchAll(PDO::FETCH_ASSOC);
    $indexes = $pdo->query("PRAGMA index_list(`{$table}`)")->fetchAll(PDO::FETCH_ASSOC);

    $sql[] = "DROP TABLE IF EXISTS `{$table}`;";
    $sql[] = "CREATE TABLE `{$table}` (";

    $definitions = [];
    $primary = [];

    foreach ($cols as $col) {
        $definitions[] = mapColumn($col);
        if ((int) $col['pk'] > 0) {
            $primary[] = $col['name'];
        }
    }

    if ($primary !== []) {
        $definitions[] = '  PRIMARY KEY (`' . implode('`,`', $primary) . '`)';
    }

    foreach ($indexes as $idx) {
        if ((int) $idx['unique'] !== 1) {
            continue;
        }
        $info = $pdo->query("PRAGMA index_info(`{$idx['name']}`)")->fetchAll(PDO::FETCH_ASSOC);
        $idxCols = array_map(fn ($r) => $r['name'], $info);
        if ($idxCols === $primary) {
            continue;
        }
        $keyName = substr(preg_replace('/[^A-Za-z0-9_]/', '_', $idx['name']), 0, 64);
        $definitions[] = '  UNIQUE KEY `' . $keyName . '` (`' . implode('`,`', $idxCols) . '`)';
    }

    foreach ($fks as $fk) {
        $definitions[] = sprintf(
            '  CONSTRAINT `fk_%s_%s` FOREIGN KEY (`%s`) REFERENCES `%s` (`%s`) ON DELETE CASCADE',
            $table,
            $fk['from'],
            $fk['from'],
            $fk['table'],
            $fk['to']
        );
    }

    $sql[] = implode(",\n", $definitions);
    $sql[] = ') ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;';
    $sql[] = '';

    $rows = $pdo->query("SELECT * FROM `{$table}`")->fetchAll(PDO::FETCH_ASSOC);
    if ($rows === []) {
        continue;
    }

    $colNames = array_keys($rows[0]);
    $colList = '`' . implode('`,`', $colNames) . '`';

    foreach (array_chunk($rows, 25) as $chunk) {
        $values = [];
        foreach ($chunk as $row) {
            $vals = [];
            foreach ($colNames as $c) {
                $v = $row[$c];
                $vals[] = $v === null ? 'NULL' : mysqlEscape((string) $v);
            }
            $values[] = '(' . implode(',', $vals) . ')';
        }
        $sql[] = "INSERT INTO `{$table}` ({$colList}) VALUES";
        $sql[] = implode(",\n", $values) . ';';
        $sql[] = '';
    }
}

$sql[] = 'SET FOREIGN_KEY_CHECKS = 1;';

file_put_contents($outPath, implode("\n", $sql) . "\n");
echo "Wrote {$outPath} (" . number_format(filesize($outPath)) . " bytes)\n";
echo 'Tables: ' . implode(', ', $tables) . "\n";
