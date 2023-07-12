<?php

namespace config;

use PDO;
use PDOException;

class Database
{
    /**
     * Return connection to DB
     * @return PDO $dbh
     */
    public static function initDb(): PDO
    {
        try {
            // retrieve connection infos from '.env'
            $dsn = $GLOBALS['CONFIG']['DB_TYPE'] . ':' . 'host=' . $GLOBALS['CONFIG']['DB_HOST'] . ';' . 'dbname=' . $GLOBALS['CONFIG']['DB_NAME'];
            // instanciates PDO
            $dbh = new PDO($dsn, $GLOBALS['CONFIG']['DB_USER'], $GLOBALS['CONFIG']['DB_PASS']);
        } catch (PDOException $e) {
            // if in dev mode show error
            if ($GLOBALS['CONFIG']['DEV']) {
                print "<p/>Erreur de connexion à la base de données : " . $e->getMessage() . "<p/>";
                print "<p/>Vérfier les données de connexion à la BDD dans config/.env<p/>";
            }
            die();
        }
        return $dbh;
    }
}
