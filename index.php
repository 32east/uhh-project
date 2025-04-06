<?php
require_once "app/Core/Route.php";
require_once "app/Core/Database.php";

use Core\Route;

Route::init();
$newRoute = new Route();
$stripURi = explode("?", $_SERVER["REQUEST_URI"]);
$newRoute->dispatch($stripURi[0], $_SERVER["REQUEST_METHOD"]);