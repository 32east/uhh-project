<?php

use Contracts\BaseController;

class ShortUrlController extends BaseController
{
    public string $method = "GET";
    public string $uri = "/short-url";

    public function index(array $query): void {
        parent::Page([
            "title"=>"Сокращатель ссылок",
            "path"=>__DIR__ . "/../../public_html/templates/short-url.php",
        ]);
    }
}