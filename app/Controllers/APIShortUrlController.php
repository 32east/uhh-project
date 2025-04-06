<?php

use Contracts\BaseController;
use Core\Database;
use Core\Utils;

class APIShortUrlController extends BaseController {
    public string $method = "POST";
    public string $uri = "/api/v1/shorty";

    public function index(array $query): void
    {
        $url = trim($query["url"]);
        if (!preg_match("/(http(s)?:\/\/)[a-zA-Z0-9]+\.[a-zA-Z0-9]+/", $url)) {
            return;
        }

        if (!Utils::Ping($url)) {
            echo json_encode([
                "success"=>false,
                "reason"=>"failed to check url"
            ]);

            return;
        }

        header("Content-Type", "application/json");

        $pdo = Database::getConnection();
        $lastValue = $pdo->query("select uri from url order by id desc limit 1;")->fetch();
        $finalShortUri = $lastValue["uri"];

        if (!isset($finalShortUri)) {
            $finalShortUri = "AAAA";
        } else {
            $finalShortUri++;
        }

        $state = $pdo->prepare("insert into url (url, uri, created_by, created_at) values (:url, :uri, :created_by, now());");
        $success = $state->execute([
            "url"=>$url,
            "uri"=>$finalShortUri,
            "created_by"=>$_SERVER["REMOTE_ADDR"]
        ]);

        if (!$success) {
            echo json_encode([
                "success"=>false,
            ]);

            return;
        }

        echo json_encode([
            "success"=>true,
            "url"=>$finalShortUri,
        ]);
    }
}