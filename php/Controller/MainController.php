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
        return [
            'template'  => 'templates/main2',
            'name'      => 'Main2',
        ];
    }
}
