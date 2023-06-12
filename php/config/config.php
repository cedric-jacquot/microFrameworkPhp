<?php

// Read .env to $GLOBALS['CONFIG']['CONFIG'] array var
$dotEnv = file('php/config/.env');

// var_dump($dotEnv);
// clean array comments and blanks
foreach ($dotEnv as $key => $value) {
    $value = trim($value);
    if (
        empty($value)
        || str_contains($value, '#')
    ) {
        unset($dotEnv[$key]);
    }
}

$GLOBALS['CONFIG'] = [];
// explode .env to associative array
foreach ($dotEnv as $constant) {
    // .env = const separator
    $explodedConstant = explode('=', $constant);

    // var_dump($explodedConstant);

    // key is in the first index
    $key = trim($explodedConstant[0]);
    // value the second
    $value = trim($explodedConstant[1]);

    // format value with signle or double quotes
    if (substr($value, 0, 1) === "'") {
        $value = (string) str_replace("'", '', $value);
    }
    if (substr($value, 0, 1) === '"') {
        $value = (string) str_replace('"', '', $value);
    }
    // add to config array
    $GLOBALS['CONFIG'][$key] = $value;
}
