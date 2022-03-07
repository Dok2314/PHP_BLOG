<?php

include "../../application/database/database.php";
include "../../path.php";

if(!$_SESSION){
    header("Location: " . BASE_URL . "login.php");
}

$errorMessage  = '';
$id            = '';
$title         = '';
$content       = '';
$img           = '';
$topic         = '';

$allTopics          = selectAll('topics');
$posts              = selectAll('posts');
$postsAdmin         = selectAllFromPostsWithUsers('posts', 'users');

//Создание поста
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add-post'])){

    if(!empty($_FILES['img']['name'])){
        $imgName     = time() . "_" . $_FILES['img']['name'];
        $fileTmpName = $_FILES['img']['tmp_name'];
        $fileType    = $_FILES['img']['type'];
        $fileSize    = $_FILES['img']['size'];
        $destination = ROOT_PATH . "/assets/images/posts/" . $imgName;
        $image_info  = getimagesize($_FILES["img"]["tmp_name"]);
        $width = $image_info[0];
        $height = $image_info[1];
        //Height and Width

        if(strpos($fileType, 'image') === false){
            die('Можно загружать только изображение!');
        }elseif($fileSize > 50000){
            die('Слишком большой файл!');
        }elseif($width > 1000){
            die('Слишком большая ширина');
        }elseif ($height > 1000){
            die('Слишком большая высота');
        }else{
            $result = move_uploaded_file($fileTmpName, $destination);

            if($result){
                $_POST['img'] = $imgName;
            }else{
                $errorMessage = 'Ошибка загрузки файла!';
            }
        }

    }else{
        $errorMessage = 'Ошибка получения картинки!';
    }

    $title        =    trim($_POST['title']);
    $content      =    trim($_POST['content']);
    $topic        =    trim($_POST['topic']);
    $publish      =    trim($_POST['publish']);

    $publish = isset($_POST['publish']) ? 1 : 0;

    if($title === '' || $content === '' || $topic === ''){
        $errorMessage = 'Не все поля заполнены!';
    }elseif(mb_strlen($title, "UTF-8") < 5){
        $errorMessage = 'Название поста должно содержать не менее 5 символов!';
    }else{
            $post = [
                'user_id'  => $_SESSION['id'],
                'title'    => $title,
                'img'      => $_POST['img'],
                'content'  => $content,
                'status'   => $publish,
                'topic_id' => $topic
            ];
            $post = insert('posts', $post);
            $post = selectOne('posts', ['id' => $id]);
            header("Location: " . BASE_URL . "admin/posts/index.php");
        }
}else{
    $title        = '';
    $content      = '';
}

// Редактирование категории

//if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
//    $topic = selectOne('topics', ['id' => $_GET['id']]);
//    $id          = $topic['id'];
//    $name        = $topic['name'];
//    $description = $topic['description'];
//}
//
//// Обновление Категории
//if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topic-edit'])) {
//
//    $name = trim($_POST['name']);
//    $description = trim($_POST['description']);
//
//    if ($name === '' || $description === '') {
//        $errorMessage = 'Не все поля заполнены!';
//    } elseif (mb_strlen($name, "UTF-8") < 2) {
//        $errorMessage = 'Категория должна содержать не менее 2 символов!';
//    } else {
//        $topic = [
//            'name' => $name,
//            'description' => $description
//        ];
//        $id = $_POST['id'];
//        $topic_id = update('topics', $id, $topic);
//        header("Location: " . BASE_URL . "admin/topics/index.php");
//    }
//}
//
//// Удаление Категории
//if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])) {
//    $id = $_GET['delete_id'];
//    delete('topics', $id);
//    header("Location: " . BASE_URL . "admin/topics/index.php");
//}
