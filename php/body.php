<?php

if (isset($data)) {
    if (array_key_exists('template', $data)) {
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