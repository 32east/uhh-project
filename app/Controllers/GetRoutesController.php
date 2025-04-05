<?php

require_once __DIR__ . "/../../app/Controller.php";

class GetRoutesController extends Controllers\Controller {
    public function index() : void {
        require __DIR__ . "/../../public_html/templates/routes.php";
    }
}