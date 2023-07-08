<?php

namespace Controller;

use PDO;
use config\Database;

class MainController
{
    public function main()
    {
        return [
            'template'  => 'templates/main',
            'name'      => 'Main',
        ];
    }

    public function main2(): array
    {
        // database connection init
        $pdo = Database::initDb();

        $stmt = $pdo->query(
            'SELECT * FROM `mainTable`;'
        );
        $select = $stmt->fetchall(PDO::FETCH_KEY_PAIR);

        return [
            'template'  => 'templates/main2',
            'name'      => 'Main2',
            'title'     => 'Titre',
            'select'    => $select,
        ];
    }
}
