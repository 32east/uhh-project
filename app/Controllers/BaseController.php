<?php

namespace Controllers;

abstract class BaseController {
    public string $method = "GET";
    public string $uri = "";

    public function index() : void {}

    static public function Page404() : void {
        echo "404 not found";
    }
    static public function MethodNotAllowed() : void {
        echo "method not allowed";
    }
}
