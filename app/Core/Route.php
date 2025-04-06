<?php
namespace Core;

use Contracts\BaseController;

final class Route {
    static private array $routes = [];

    static public function init() : void {
        ImportClasses(__DIR__ . "/../../app/Contracts/");
        $arr_controllers = ImportClasses(__DIR__ . "/../../app/Controllers/");

        foreach ($arr_controllers as $controllerName) {
            self::addRoute(new $controllerName);
        }
    }

    static private function addRoute(BaseController $handler) : void {
        self::$routes[$handler->uri] = $handler;
    }

    static public function getRoutes() : array {
        return self::$routes;
    }

    static public function getRoute(string $name) : ?BaseController {
        return self::$routes[$name]??null;
    }

    static public function dispatch(): void {
        self::init();
        $stripURi = explode("?", $_SERVER["REQUEST_URI"]);
        $handler = self::getRoute($stripURi[0]);
        if (!isset($handler)) {
            BaseController::Page404();
            return;
        } elseif ($handler->method !== $_SERVER["REQUEST_METHOD"]) {
            BaseController::MethodNotAllowed();
            return;
        }

        $urlParse = parse_url($_SERVER["REQUEST_URI"]);
        parse_str($urlParse["query"]??null, $queryParse);

        $handler->index($queryParse);
    }
}