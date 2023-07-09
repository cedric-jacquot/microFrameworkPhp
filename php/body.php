<?php
// body example

// $data $receives vars from its Controller (MainController in this case)
dump($data);

if (isset($data)) {
    if (array_key_exists('template', $data)) {

        echo "template OK !";

        // template from Controller, generally includes in templates
        require_once $data['template'] . '.php';
    } else {
        // 400 error if does not  exists
        http_response_code(400);
        throw new Exception("missing key 'template' in " . $class);
    }
}
?>

<body>
    <h1>Body</h1>
</body>