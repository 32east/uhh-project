<?php

namespace DTO;

class Sitemap {
    public string $uri;
    public string $method;

    public function __construct(string $uri, string $method) {
        $this->uri = $uri;
        $this->method = $method;
    }
}
