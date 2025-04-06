<?php

use Contracts\BaseController;

class ShortUrlController extends BaseController
{
    public string $method = "GET";
    public string $uri = "/short-url";
    public string $title = "Сокращатель ссылок";

    public function index(): void {
        $viewPath = __DIR__ . "/../../public_html/templates/short-url.php";
        require __DIR__ . "/../../public_html/templates/index.php";
    }
}