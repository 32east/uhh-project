<?php

use Contracts\BaseController;

class PastaController extends BaseController
{
    public string $method = "GET";
    public string $uri = "/pasta";

    public function index(array $query): void {
        parent::Page([
            "title"=>"Паста с Двача",
            "path"=>__DIR__ . "/../../public_html/templates/pasta.php",
        ]);
    }
}