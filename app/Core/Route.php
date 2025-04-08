<?php
namespace Core;

use Contracts\BaseController;

require "Functions.php";

final class Route {
    static private array $routes = [];

    static public function init() : void {
        Utils::ImportClasses(__DIR__ . "/../../app/Contracts/");
        $arr_controllers = Utils::ImportClasses(__DIR__ . "/../../app/Controllers/");

        self::addRoute('/{carId}/{car2Id}', ['GET', 'POST'], [\HomeController::class, 'index'], ["carId"=>"\d{1,10}", "car2Id"=>"\d{1,10}"]);
    }

    static private function addRoute(string $regex, array $methods, array $execFunc, array $requirements=[]) : void {
        self::$routes[] = [
            "methods"=>$methods,
            "execFunc"=>$execFunc,
            "regex"=>$regex,
            "requirements"=>$requirements,
        ];
    }

    static public function getRoutes() : array {
        return self::$routes;
    }

    static public function getRoute(string $name) : ?BaseController {
        return self::$routes[$name]??null;
    }

    static public function dispatch(): void {
        self::init();

        foreach (self::$routes as $route) {
            if (!in_array($_SERVER["REQUEST_METHOD"], $route["methods"])) {
                return;
            }

            $editedRoute = "#^/". trim($route["regex"], "/") ."$#";

            foreach ($route["requirements"] as $key=>$val) {
                $editedRoute = str_replace("{".$key."}", sprintf('(?P<%s>%s)', $key, $val), $editedRoute);
            }

            if (preg_match($editedRoute, "/".trim($_SERVER["REQUEST_URI"], "/"), $matches)) {
                $newController = new $route["execFunc"][0];
                $urlParse = parse_url($_SERVER["REQUEST_URI"]);
                parse_str($urlParse["query"] ?? null, $queryParse);

                foreach ($matches as $key=>$value) {
                    if (is_numeric($key)) {
                        unset($matches[$key]);
                    }
                }

                $newController->{$route["execFunc"][1]}($queryParse, ...$matches);
            }
        }
    }
}