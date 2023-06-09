<?php

namespace config;

use PDO;
use PDOException;

class Database
{
    public static function initDb(array $CONFIG): PDO
    {
        try {
            $dbh = new PDO(
                $CONFIG['TYPE'] . ':' . 'host=' . $CONFIG['DB_HOST'] . ';' . 'dbname=' . $CONFIG['DB_NAME'] . ', ' . $CONFIG['USER'] . ', ' .  $CONFIG['PASS']
            );
            // foreach($dbh->query('SELECT * FROM table') as $row) {
            //     print_r($row);
            // }
            // $dbh = null;
        } catch (PDOException $e) {
            if ($CONFIG['DEV']) {
                print "<br/>Erreur de connexion à la base de données : " . $e->getMessage() . "<br/>";
            }
            die();
        }
        return $dbh;
    }
}
