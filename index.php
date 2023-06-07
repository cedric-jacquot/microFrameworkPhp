<?php

use Routing\Routes;

// report all errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// config
$dotEnv = file('php/config/.env');
require_once 'php/config/config.php';

echo '<pre>' . __DIR__ . '</pre>';

// GET routing
require_once 'php/Routing/Routes.php';
$routes = new Routes;

// php templates
require_once 'php/head.php';
require_once 'php/header.php';
require_once 'php/body.php';
require_once 'php/footer.php';
