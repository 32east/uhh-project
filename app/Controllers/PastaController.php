<?php

use Contracts\BaseController;

class PastaController extends BaseController
{
    public string $method = "GET";
    public string $uri = "/pasta";
    public string $title = "Паста с Двача";

    public function index(): void {
        $viewPath = __DIR__ . "/../../public_html/templates/pasta.php";
        require __DIR__ . "/../../public_html/templates/index.php";
    }
}