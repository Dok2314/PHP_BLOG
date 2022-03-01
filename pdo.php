<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$connect = new PDO("mysql:host=localhost;dbname=phpjspractice","root1","root");

$name = 'John';
$email = 'john@gmail.com';

$params = [
    'n' => $name,
    'e' => $email
];

$sql = "INSERT INTO users(name,email) VALUES(:n,:e)";
$query = $connect->prepare($sql);
$query->execute($params);
