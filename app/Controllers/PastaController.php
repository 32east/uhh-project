<?php

class PastaController extends Controllers\BaseController
{
    public string $method = "GET";
    public string $uri = "/pasta";

    public function index(): void {
        $viewPath = __DIR__ . "/../../public_html/templates/pasta.php";
        require __DIR__ . "/../../public_html/templates/index.php";
    }
}