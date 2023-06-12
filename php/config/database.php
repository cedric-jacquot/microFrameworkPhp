<?php

namespace config;

use PDO;
use PDOException;

class Database
{
    public static function initDb(): PDO
    {
        try {
            $dbh = new PDO(
                $GLOBALS['CONFIG']['TYPE'] . ':' . 'host=' . $GLOBALS['CONFIG']['DB_HOST'] . ';' . 'dbname=' . $GLOBALS['CONFIG']['DB_NAME'] . ', ' . $GLOBALS['CONFIG']['USER'] . ', ' .  $GLOBALS['CONFIG']['PASS']
            );
            // foreach($dbh->query('SELECT * FROM table') as $row) {
            //     print_r($row);
            // }
            // $dbh = null;
        } catch (PDOException $e) {
            if ($GLOBALS['CONFIG']['DEV']) {
                print "<br/>Erreur de connexion à la base de données : " . $e->getMessage() . "<br/>";
            }
            die();
        }
        return $dbh;
    }
}
