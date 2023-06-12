<?php

namespace config;

use PDO;
use PDOException;

class Database
{
    public static function initDb(): PDO
    {
        try {
            $dsn = $GLOBALS['CONFIG']['DB_TYPE'] . ':' . 'host=' . $GLOBALS['CONFIG']['DB_HOST'] . ';' . 'dbname=' . $GLOBALS['CONFIG']['DB_NAME'];
            $dbh = new PDO($dsn, $GLOBALS['CONFIG']['DB_USER'], $GLOBALS['CONFIG']['DB_PASS']);
        } catch (PDOException $e) {
            if ($GLOBALS['CONFIG']['DEV']) {
                print "<br/>Erreur de connexion à la base de données : " . $e->getMessage() . "<br/>";
            }
            die();
        }
        return $dbh;
    }
}
