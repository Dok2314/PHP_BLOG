<?php

include 'application/database/database.php';

$errorMessage = '';

function loginUser($user)
{
    $_SESSION['id']  =    $user['id'];
    $_SESSION['login']  = $user['username'];
    $_SESSION['admin']  = $user['is_admin'];
    if($_SESSION['admin']){
        header("Location: " . BASE_URL . 'admin/posts/index.php');
    }else{
        header("Location: " . BASE_URL);
    }
}

//Код для формы регистрации
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg'])){
    $admin =    0;
    $login =    trim($_POST['login']);
    $email =    trim($_POST['email']);
    $passF =    trim($_POST['pass-first']);
    $passS =    trim($_POST['pass-second']);

    if($login === '' || $email === '' || $passF === ''){
        $errorMessage = 'Не все поля заполнены!';
    }elseif(mb_strlen($login, "UTF-8") < 2){
        $errorMessage = 'Поле login должно содержать не менее 2 символов!';
    }elseif($passF !== $passS){
        $errorMessage = 'Пароли не совпадают!';
    }else{
        $existence = selectOne('users', ['email' => $email]);
        if($existence['email'] === $email){
            $errorMessage = 'Пользователь с такой почтой уже существует!';
        }else{
            $pass = password_hash($passF, PASSWORD_DEFAULT);
            $post = [
                'is_admin' => $admin,
                'username' => $login,
                'email' => $email,
                'password' => $pass
            ];
            $id = insert('users', $post);
            $user = selectOne('users', ['id' => $id]);
            loginUser($user);
        }
    }
}else{
    $login = '';
    $email = '';
}

//Код для формы авторизации
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-log'])){

    $email    =  trim($_POST['email']);
    $password =  trim($_POST['password']);

    if($email === '' || $password === '') {
        $errorMessage = 'Не все поля заполнены!';
    }else{
        $existence = selectOne('users', ['email' => $email]);
        if($existence && password_verify($password, $existence['password'])){
            loginUser($existence);
        }else{
            $errorMessage = 'Почта либо пароль введены не верно!';
        }
    }
}else{
    $email = '';
}
