<?php

class UrlDTO {
    private string $uri;
    private string $created_by;
    private int $created_at;

    public function __construct(string $uri, string $created_by, int $created_at) {
        $this->uri = $uri;
        $this->created_at = $created_by;
        $this->created_by = $created_at;
    }
}