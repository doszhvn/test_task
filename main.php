<?php

require_once(__DIR__ . '/Validator.php');

$validator = new Validator();

$jsonFilePath = 'example.json';

$jsonData = file_get_contents($jsonFilePath);
$data = json_decode($jsonData, true);

if ($data !== null) {
    $data["baz"] = $validator->phoneNumber($data["baz"]);
    $data["foo"] = $validator->integer($data["foo"]);
    $data["bar"] = $validator->string($data["bar"]);
    echo json_encode($data, JSON_PRETTY_PRINT) . "\n";
}
