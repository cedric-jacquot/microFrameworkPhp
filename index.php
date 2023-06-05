<?php
// report all errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// config
$dotEnv = file('config/.env');
require_once 'config/config.php';

// GET routing
require_once 'php/routing.php';

// php templates
require_once 'php/head.php';
require_once 'php/header.php';
require_once 'php/body.php';
require_once 'php/footer.php';
