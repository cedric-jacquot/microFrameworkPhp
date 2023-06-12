<?php

namespace Controller;

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

    public function main2()
    {
        echo 'main2 called';

        Database::initDb();

        return [
            'template'  => 'templates/main2',
            'name'      => 'Main2',
            'title'     => 'Titre',
        ];
    }
}
