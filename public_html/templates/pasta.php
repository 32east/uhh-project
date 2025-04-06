<?php
$fileName = __DIR__ . "/../../public_html/staticfiles/book.txt";
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