<?php

include "../../application/database/database.php";
include "../../path.php";

if(!$_SESSION){
    header("Location: " . BASE_URL . "login.php");
}

$errorMessage  = [];
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
            array_push($errorMessage, 'Слишком большой файл!');
        }elseif($width > 1000){
            array_push($errorMessage, 'Слишком большая ширина');
        }elseif ($height > 1000){
            array_push($errorMessage, 'Слишком большая высота');
        }else{
            $result = move_uploaded_file($fileTmpName, $destination);

            if($result){
                $_POST['img'] = $imgName;
            }else{
                array_push($errorMessage, 'Ошибка загрузки файла!');
            }
        }

    }else{
        array_push($errorMessage, 'Ошибка получения картинки!');
    }

    $title        =    trim($_POST['title']);
    $content      =    trim($_POST['content']);
    $topic        =    trim($_POST['topic']);
    $publish      =    trim($_POST['publish']);

    $publish = isset($_POST['publish']) ? 1 : 0;

    if($title === '' || $content === '' || $topic === ''){
        array_push($errorMessage, 'Не все поля заполнены!');
    }elseif(mb_strlen($title, "UTF-8") < 5){
        array_push($errorMessage, 'Название поста должно содержать не менее 5 символов!');
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
    $id           = '';
    $title        = '';
    $content      = '';
    $publish      = '';
    $topic        = '';
}

// Редактирование сатьи
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
    $post        = selectOne('posts', ['id' => $_GET['id']]);

    $id      = $post['id'];
    $title   = $post['title'];
    $content = $post['content'];
    $topic   = $post['topic_id'];
    $publish = $post['status'];
}

// Обновление Категории
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit-post'])) {

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
            array_push($errorMessage, 'Слишком большой файл!');
        }elseif($width > 1000){
            array_push($errorMessage, 'Слишком большая ширина');
        }elseif ($height > 1000){
            array_push($errorMessage, 'Слишком большая высота');
        }else{
            $result = move_uploaded_file($fileTmpName, $destination);

            if($result){
                $_POST['img'] = $imgName;
            }else{
                array_push($errorMessage, 'Ошибка загрузки файла!');
            }
        }

    }else{
        array_push($errorMessage, 'Ошибка получения картинки!');
    }
    $id           =    $_POST['id'];
    $title        =    trim($_POST['title']);
    $content      =    trim($_POST['content']);
    $topic        =    trim($_POST['topic']);
    $publish      =    trim($_POST['publish']);

    $publish = isset($_POST['publish']) ? 1 : 0;

    if($title === '' || $content === '' || $topic === ''){
        array_push($errorMessage, 'Не все поля заполнены!');
    }elseif(mb_strlen($title, "UTF-8") < 5){
        array_push($errorMessage, 'Название поста должно содержать не менее 5 символов!');
    }else{
        $post = [
            'user_id'  => $_SESSION['id'],
            'title'    => $title,
            'img'      => $_POST['img'],
            'content'  => $content,
            'status'   => $publish,
            'topic_id' => $topic
        ];
        $post = update('posts', $id, $post);
        header("Location: " . BASE_URL . "admin/posts/index.php");
    }
}else{
    $title        = $_POST['title'];
    $content      = $_POST['content'];
    $publish      = isset($_POST['publish']) ? 1 : 0;
    $topic        = $_POST['topic_id'];
}

// Обновление Статуса(Publish/Unpublish) Поста
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['pub_id'])) {
    $id      = $_GET['pub_id'];
    $publish = $_GET['publish'];

    $postId  = update('posts',$id, ['status' => $publish]);

    header("Location: " . BASE_URL . "admin/posts/index.php");
}

// Удаление Поста
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    delete('posts', $id);
    header("Location: " . BASE_URL . "admin/posts/index.php");
}
