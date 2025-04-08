<?php

namespace Contracts;

use DTO\Sitemap;

abstract class BaseController {
    public string $method = "GET";
    public string $uri = "";
    public string $title = "";

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

    public function Page(array $pageInfo) : void {
        $title = $pageInfo["title"];
        $viewPath = $pageInfo["path"];

        require __DIR__ . "/../../public_html/templates/index.php";
    }
}
