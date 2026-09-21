<?php
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Jika akses ke root
if ($uri === '/' || $uri === '' || $uri === '/index.php') {
    require __DIR__ . '/../index.php';
    exit;
}

$file = __DIR__ . '/..' . $uri;

// Jika file ditemukan langsung
if (is_file($file)) {
    require $file;
    exit;
}

// Jika file PHP tanpa ekstensi .php di URL
if (is_file($file . '.php')) {
    require $file . '.php';
    exit;
}

// Jika subfolder dan memiliki index.php
if (is_dir($file) && is_file($file . '/index.php')) {
    require $file . '/index.php';
    exit;
}

http_response_code(404);
echo "404 Not Found";
