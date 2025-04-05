<?php

require_once __DIR__ . "/../../app/Controller.php";

header("HTTP/1.1 200", null, 200);
header('Content-Type: application/json');

$routes = \Controllers\Core\Route::getRoutes();
foreach ($routes as $key=>$value) {
    unset($routes[$key]["handler"]);
}

echo json_encode($routes);