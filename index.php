<?php

require_once 'setting.php';

$connect = new mysqli($host, $username, $password, $dbname);

if($connect->connect_error) die('Error connect!');

$query = 'SELECT * FROM users';
$result = $connect->query($query);

$data = $result->fetch_all();

foreach($data as $item)
{
    echo 'Name: ' . $item[1] . '<br>';
    echo 'Email: ' . $item[2] . '<br>';
    echo '<hr>';
}

$result->close();
$connect->close();