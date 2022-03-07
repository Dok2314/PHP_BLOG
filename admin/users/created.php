<?php
session_start();
include('../../path.php');
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!--  Font Awesome  -->
    <script src="https://kit.fontawesome.com/8c07973f2e.js" crossorigin="anonymous"></script>

    <!--  CUSTOM STYLES  -->
    <link rel="stylesheet" href="../../assets/css/admin.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&display=swap" rel="stylesheet">
    <title>My Blog!</title>
</head>
<body>

<!-- HEADER START  -->
<?php include('../../application/include/admin_header.php'); ?>
<!-- HEADER END  -->

<div class="container">
    <div class="row">

        <?php include "../../application/include/admin_sidebar.php"; ?>

        <div class="posts col-9">
            <div class="button row">
                <a href="<?php echo BASE_URL . "admin/users/created.php";?>" class="col-2 btn btn-success">Создать</a>
                <span class="col-1"></span>
                <a href="<?php echo BASE_URL . "admin/users/index.php";?>" class="col-3 btn btn-warning">Управление</a>
            </div>
            <div class="row title-table">
                <h2>Создание Пользователя</h2>
            </div>
            <div class="row add-post">
                <form action="created.php" method="post">
                    <form>
                        <div class="col">
                            <label for="formGroupExampleInput" class="form-label">Ваш Логин</label>
                            <input type="text" name="login" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder" value="<?=$login;?>">
                        </div>
                        <div class="col">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=$email;?>">
                        </div>
                        <div class="col">
                            <label for="exampleInputPassword1" class="form-label">Пароль</label>
                            <input type="password" name="pass-first" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="col">
                            <label for="exampleInputPassword2" class="form-label">Подтвердите пароль</label>
                            <input type="password" name="pass-second" class="form-control" id="exampleInputPassword2">
                        </div>
                        <div class="col">
                            <label for="role">Роль: </label>
                        <select class="form-select" aria-label="Default select example" id="role">
                            <option value="1">User</option>
                            <option value="2">Admin</option>
                        </select>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Создать</button>
                    </form>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- FOOTER START  -->
<?php include('../../application/include/footer.php'); ?>
<!-- FOOTER END  -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>