<?php

include 'application/database/database.php';
if($_SERVER['REQUEST_METHOD']){

}
if(!empty($_POST)){
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = password_hash($_POST['pass-second'], PASSWORD_DEFAULT);
    $admin = 0;

    $post = [
      'is_admin' => $admin,
      'username' => $login,
      'email' => $email,
      'password' => $password
    ];

//    $id = insert('users', $post);
//    $last_row = selectOne('users', ['id' => $id]);

}