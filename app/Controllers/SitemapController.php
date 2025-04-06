<?php

use Contracts\BaseController;

class SitemapController extends BaseController {
    public string $method = "GET";
    public string $uri = "/sitemap";

    public function index(array $query) : void {
        require __DIR__ . "/../../public_html/templates/sitemap.php";
    }
}