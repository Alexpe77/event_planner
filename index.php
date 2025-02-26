<?php

$request = $_SERVER['REQUEST_URI'];
$path = parse_url($request, PHP_URL_PATH);
$pathParts = explode('/', trim($path, '/'));

$page = isset($pathParts[0]) && !empty($pathParts[0]) ? $pathParts[0] : 'accueil';

$pages = [
    'accueil' => 'accueil.php',
    '404'     => '404.php',
];

if (array_key_exists($page, $pages)) {
    $page_file = $pages[$page];
    if (file_exists($page_file)) {
        include $page_file;
    } else {
        header("HTTP/1.0 404 Not Found");
        include '404.php';
    }
} else {
    header("HTTP/1.0 404 Not Found");
    include '404.php';
}

?>