<?php

namespace Contracts;

use DTO\Sitemap;

abstract class BaseController {
    public string $method = "GET";
    public string $uri = "";
    public string $title = "";

    abstract public function index();

    static public function Page404() : void {
        header("HTTP/1.1 404 Not Found", null, 404);
        echo "404 not found";
    }
    static public function MethodNotAllowed() : void {
        echo "method not allowed";
    }
    public function GenerateSitemapDTO() : Sitemap {
        return new Sitemap($this->uri, $this->method);
    }
}
