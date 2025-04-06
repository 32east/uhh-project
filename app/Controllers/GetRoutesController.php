<?php

class GetRoutesController extends Controllers\BaseController {
    public string $method = "GET";
    public string $uri = "/get-routes";

    public function index() : void {
        require __DIR__ . "/../../public_html/templates/routes.php";
    }
}