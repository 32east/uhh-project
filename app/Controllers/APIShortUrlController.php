<?php

use Contracts\BaseController;
use Core\Database;

class APIShortUrlController extends BaseController {
    public string $method = "POST";
    public string $uri = "/api/v1/shorty";

    public function index(array $query): void
    {
        $pdo = Database::getConnection();
        header("Content-Type", "application/json");
    }
}