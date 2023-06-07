<?php
try {
    $dbh = new PDO(
        $CONFIG['TYPE'] . ':' . 'host=' . $CONFIG['DB_HOST'] . ';' . 'dbname=' . $CONFIG['DB_NAME'] . ', ' . $CONFIG['USER'] . ', ' .  $CONFIG['PASS']
    );
    foreach($dbh->query('SELECT * FROM table') as $row) {
        print_r($row);
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
