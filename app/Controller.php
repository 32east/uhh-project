<?php

namespace Controllers;

abstract class Controller {
    abstract public function index() : void;

    static public function Page404() : void {
        echo "404 not found";
    }
    static public function MethodNotAllowed() : void {
        echo "method not allowed";
    }
}
