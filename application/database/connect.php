<?php

$driver = 'mysql';
$host = 'localhost';
$db_name = 'my_blog';
$db_user = 'root1';
$db_pass = 'root';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

try{
    $pdo = new PDO("$driver:host=$host;dbname=$db_name",
        $db_user,$db_pass,$options
    );
}catch(PDOException $e){
    die('Ошибка подключения к Базе Данных!');
}