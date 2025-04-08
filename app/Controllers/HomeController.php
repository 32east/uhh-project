<?php

use Contracts\BaseController;

class HomeController extends BaseController
{
    public string $method = "GET";
    public string $uri = "/";

    public function index($query, $carId, $car2Id): void {
        echo $carId, $car2Id;
        // parent::Page([
        //     "title"=>"Главная",
        //     "path"=>__DIR__ . "/../../public_html/templates/main.php",
        // ]);
        // var_dump($query);
    }
}