<?php

namespace Core;

class Utils {
    static public function Ping(string $url) : bool {
        $checkConnection = curl_init($url);
        curl_setopt($checkConnection, CURLOPT_TIMEOUT, 3);
        curl_setopt($checkConnection, CURLOPT_CONNECTTIMEOUT, 3);
        curl_setopt($checkConnection, CURLOPT_NOBODY, true);
        $data = curl_exec($checkConnection);
        curl_close($checkConnection);
        return $data != false;
    }

    static public function ImportClasses(string $controllersDir) : array {
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
}