<?php

class HomeController extends Controllers\BaseController
{
    public string $method = "GET";
    public string $uri = "/";

    public function index(): void {
        $viewPath = __DIR__ . "/../../public_html/templates/main.php";
        require __DIR__ . "/../../public_html/templates/index.php";
    }
}