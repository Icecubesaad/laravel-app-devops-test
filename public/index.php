<?php

// Simple Laravel-like router for testing
header('Content-Type: application/json');

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

// Routes
if ($uri === '/' && $method === 'GET') {
    echo json_encode([
        'message' => 'Laravel Test Application',
        'status' => 'running',
        'timestamp' => date('c'),
        'endpoints' => [
            'health' => '/api/health',
            'items' => '/api/items',
            'stats' => '/api/stats'
        ]
    ]);
    exit;
}

if ($uri === '/api/health' && $method === 'GET') {
    echo json_encode([
        'status' => 'healthy',
        'timestamp' => date('c'),
        'service' => 'laravel-app',
        'php_version' => PHP_VERSION
    ]);
    exit;
}

if ($uri === '/api/items' && $method === 'GET') {
    echo json_encode([
        'items' => [
            ['id' => 1, 'name' => 'Sample Item 1', 'price' => 19.99],
            ['id' => 2, 'name' => 'Sample Item 2', 'price' => 29.99],
        ],
        'count' => 2
    ]);
    exit;
}

if ($uri === '/api/stats' && $method === 'GET') {
    echo json_encode([
        'total_items' => 2,
        'php_version' => PHP_VERSION,
        'timestamp' => date('c')
    ]);
    exit;
}

// 404
http_response_code(404);
echo json_encode([
    'error' => 'Not Found',
    'path' => $uri
]);
