<?php

namespace Controller;

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
        return [
            'template'  => 'templates/main2',
            'name'      => 'Main2',
            'title'     => 'Titre',
        ];
    }
}
