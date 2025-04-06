<?php

use Contracts\BaseController;

class HomeController extends BaseController
{
    public string $method = "GET";
    public string $uri = "/";
    public string $title = "Главная";

    public function index(): void {
        $viewPath = __DIR__ . "/../../public_html/templates/main.php";
        require __DIR__ . "/../../public_html/templates/index.php";
    }
}