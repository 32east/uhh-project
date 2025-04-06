<?php
$fileName = __DIR__ . "/../../book.txt";
$resource = fopen($fileName, "r");

use Contracts\BaseController;

if (!$resource) {
    BaseController::Page404();
    return;
}

$pasta = fread($resource, filesize($fileName));
fclose($resource);

$pasta = str_replace(". ", ".<br>", $pasta);
echo $pasta;