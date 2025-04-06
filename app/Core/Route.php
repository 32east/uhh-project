<?php
namespace Core;

use Contracts\BaseController;

class Route {
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

    public function getRoute(string $name) : ?BaseController {
        return self::$routes[$name]??null;
    }

    public function dispatch(string $uri, string $method): void {
        $handler = $this->getRoute($uri);
        if (!isset($handler)) {
            BaseController::Page404();
            return;
        } elseif ($handler->method !== $method) {
            BaseController::MethodNotAllowed();
            return;
        }

        $handler->index();
    }
}