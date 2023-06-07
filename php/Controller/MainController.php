<?php

namespace Controller;

class MainController
{
    public function __construct()
    {
        echo '<pre>MainController OK !</pre>';

        return [
            'template'  => 'template/main',
            'name'      => 'Main',
        ];
    }
}
