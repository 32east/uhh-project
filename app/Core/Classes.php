<?php

namespace Core;
function ImportClasses(string $controllersDir) : array {
    $arr_output = [];

    foreach (scandir($controllersDir) as $file) {
        if (!str_ends_with($file, "php")) {
            continue;
        }

        $controllerName = substr($file, 0, strlen($file) - strlen("php") - 1);
        require_once $controllersDir . $file;

        if (!class_exists($controllerName)) {
            continue;
        }

        $controllerName = "\\" . substr($file, 0, strlen($file) - strlen("php") - 1);
        $arr_output[] = $controllerName;
    }

    return $arr_output;
}