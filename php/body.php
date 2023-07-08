<?php

dump($data);

if (isset($data)) {
    if (array_key_exists('template', $data)) {

        echo "template OK !";

        require_once $data['template'] . '.php';
    } else {
        http_response_code(400);
        throw new Exception("missing key 'template' in " . $class);
    }
}
?>

<body>
    <h1>Body</h1>
</body>