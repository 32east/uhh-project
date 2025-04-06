<?php

use Contracts\BaseController;

class HomeController extends BaseController
{
    public string $method = "GET";
    public string $uri = "/";

    public function index(array $query): void {
        parent::Page([
            "title"=>"Главная",
            "path"=>__DIR__ . "/../../public_html/templates/main.php",
        ]);
    }
}