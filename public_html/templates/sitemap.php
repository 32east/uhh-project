<?php

require_once __DIR__ . "/../../app/Controllers/BaseController.php";
require_once __DIR__ . "/../../app/DTO/Sitemap.php";

header("HTTP/1.1 200", null, 200);
header('Content-Type: application/json');

use Core\Route;

$arr_routes = [];
$routes = Route::getRoutes();
foreach ($routes as $key=>$value) {
    $arr_routes[] = $value->GenerateSitemapDTO();
}

echo json_encode($arr_routes);