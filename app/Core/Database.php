<?php

namespace Core;

use PDO;
use PDOException;

class Database {
    static private ?PDO $instance = null;
    static public function getConnection() : ?PDO {
        if (self::$instance == null) {
            $host = "172.25.0.2";
            $dbname = "songs";
            $user = "postgres";
            $passwd = "1";
            $dsn = "pgsql:host=$host;dbname=$dbname;";

            try {
                self::$instance = new PDO($dsn, $user, $passwd);
            } catch (PDOException $err) {
                die("Database connect failed: " . $err);
            }
        }

        return self::$instance;
    }
}