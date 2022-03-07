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
        <div class="sidebar col-3">
            <ul>
                <li>
                    <a href="">Пользователи</a>
                </li>
                <li>
                    <a href="">Записи</a>
                </li>
                <li>
                    <a href="">Категории</a>
                </li>
            </ul>
        </div>
        <div class="posts col-9">
            <div class="button row">
                <a href="" class="col-2 btn btn-success">Создать</a>
                <span class="col-1"></span>
                <a href="" class="col-3 btn btn-warning">Редактировать</a>
            </div>
            <div class="row title-table">
                <h2>Создать Категорию</h2>
            </div>
            <div class="row add-post">
                <form action="created.php" method="post">
                    <form>
                        <div class="mb-3">
                            <label for="title">Название Категории</label>
                            <input type="email" class="form-control" placeholder="Название" id="title" aria-label="Название категории">
                        </div>
                        <div class="mb-3">
                            <label for="content">Описание Категории</label>
                            <textarea class="form-control" placeholder="Описание..." id="content" style="height: 100px"></textarea>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Создать Категорию</button>
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