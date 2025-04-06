<?php

use Contracts\BaseController;

class APIShortUrlController extends BaseController {
    public string $method = "POST";
    public string $uri = "/api/v1/shorty";

    public function index(): void
    {
        echo 'ебал твою мать';
    }
}