<?php

include "../../application/database/database.php";
include "../../path.php";

$errorMessage = [];
$id           = '';
$name         = '';
$description  = '';
$allTopics    = selectAll('topics');

//Создание категории
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topic-create'])){

    $name        =    trim($_POST['name']);
    $description =    trim($_POST['description']);

    if($name === '' || $description === ''){
        array_push($errorMessage,'Не все поля заполнены!');
    }elseif(mb_strlen($name, "UTF-8") < 2){
        array_push($errorMessage,'Категория должна содержать не менее 2 символов!');
    }else{
        $existence = selectOne('topics', ['name' => $name]);
        if($existence['name'] === $name){
            array_push($errorMessage,'Такая категория уже есть!');
        }else{
            $topic = [
                'name' => $name,
                'description' => $description
            ];
            $id = insert('topics', $topic);
            $topic = selectOne('topics', ['id' => $id]);
            header("Location: " . BASE_URL . "admin/topics/index.php");
        }
    }
}else{
    $name        = '';
    $description = '';
}

// Редактирование категории

if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
    $topic = selectOne('topics', ['id' => $_GET['id']]);
    $id          = $topic['id'];
    $name        = $topic['name'];
    $description = $topic['description'];
}

// Обновление Категории
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topic-edit'])) {

    $name = trim($_POST['name']);
    $description = trim($_POST['description']);

    if ($name === '' || $description === '') {
        array_push($errorMessage,'Не все поля заполнены!');
    } elseif (mb_strlen($name, "UTF-8") < 2) {
        array_push($errorMessage,'Категория должна содержать не менее 2 символов!');
    } else {
        $topic = [
            'name' => $name,
            'description' => $description
        ];
        $id = $_POST['id'];
        $topic_id = update('topics', $id, $topic);
        header("Location: " . BASE_URL . "admin/topics/index.php");
    }
}

// Удаление Категории
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    delete('topics', $id);
    header("Location: " . BASE_URL . "admin/topics/index.php");
}
