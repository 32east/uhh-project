<?php

use Contracts\BaseController;

class SitemapController extends BaseController {
    public string $method = "GET";
    public string $uri = "/sitemap";
    public string $title = "Карта сайта";

    public function index() : void {
        require __DIR__ . "/../../public_html/templates/sitemap.php";
    }
}