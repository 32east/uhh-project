<?php

require_once __DIR__ . "/../../app/Controllers/BaseController.php";

header("HTTP/1.1 200", null, 200);
header('Content-Type: application/json');

$routes = \Core\Route::getRoutes();
foreach ($routes as $key=>$value) {
    unset($value->uri);
}

echo json_encode($routes);