<?php
namespace Controllers\Core;

use Controllers\Controller;

class Route {
    static private array $routes = [];

    public function addRoute(string $uri, string $method, Controller $handler) : void {
        self::$routes[$uri] = [
            "method"=>$method,
            "handler"=>$handler,
        ];
    }

    static public function getRoutes() : array {
        return self::$routes;
    }

    public function getRoute(string $name) : ?array {
        return self::$routes[$name]??null;
    }

    public function dispatch(string $uri, string $method): void {
        $handler = $this->getRoute($uri);
        if (!isset($handler)) {
            Controller::Page404();
            return;
        } elseif ($handler["method"] !== $method) {
            Controller::MethodNotAllowed();
            return;
        }

        $handler["handler"]->index();
    }
}