<?php
$fileName = __DIR__ . "/../../book.txt";
$resource = fopen($fileName, "r");
$pasta = fread($resource, filesize($fileName));
fclose($resource);

$pasta = str_replace(". ", ".<br>", $pasta);
echo $pasta;