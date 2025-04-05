<?php

require_once __DIR__ . "/../../app/Controller.php";

class HomeController extends Controllers\Controller
{
    public function index(): void {
        $viewPath = __DIR__ . "/../../public_html/templates/main.php";
        require __DIR__ . "/../../public_html/templates/index.php";
    }
}