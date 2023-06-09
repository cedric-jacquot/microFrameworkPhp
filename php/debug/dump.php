<?php

function dump(mixed $data): mixed
{
    return "echo '<pre>'; var_dump($data); echo '</pre>';";
}
