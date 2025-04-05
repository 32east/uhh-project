<?php
require_once "app/Core/Route.php";
require_once "app/Core/Database.php";

require_once "app/Controllers/HomeController.php";
require_once "app/Controllers/GetRoutesController.php";
require_once "app/Controllers/PastaController.php";

use Controllers\Core\Route;

$newRoute = new Route();
$newRoute->addRoute("/", "GET",new HomeController);
$newRoute->addRoute("/get-routes", "GET",new GetRoutesController);
$newRoute->addRoute("/pasta", "GET",new PastaController);

$stripURi = explode("?", $_SERVER["REQUEST_URI"]);
$newRoute->dispatch($stripURi[0], $_SERVER["REQUEST_METHOD"]);