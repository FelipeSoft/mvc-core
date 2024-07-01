<?php

function request($name) {
    return json_decode(file_get_contents("php://input"), true)[$name];
}

function response(int $status, array $array) {
    http_response_code($status);
    echo json_encode($array);
}

