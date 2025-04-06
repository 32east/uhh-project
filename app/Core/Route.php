<?php
namespace Core;

use Controllers\BaseController;

class Route {
    static private array $routes = [];

    static public function init() : void {
        $controllersDir = __DIR__ . "/../../app/Controllers/";
        foreach (scandir($controllersDir) as $file) {
            if (!str_ends_with($file, "php")) {
                continue;
            }

            $controllerName = substr($file, 0, strlen($file) - strlen("php") - 1);
            require_once __DIR__ . "/../../app/Controllers/" . $file;

            if (!class_exists($controllerName)) {
                continue;
            }

            $controllerName = "\\" . substr($file, 0, strlen($file) - strlen("php") - 1);
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