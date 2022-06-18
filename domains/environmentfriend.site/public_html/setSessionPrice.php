<?php
session_start();

echo '<script>alert("setsession")</script>';
$jsonData = file_get_contents("php://input");
print_r($jsonData);
$data = json_decode(file_get_contents("php://input"));
print_r($data);
console.log($data);

?>