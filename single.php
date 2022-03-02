<?php include('path.php'); ?>
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
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&display=swap" rel="stylesheet">
    <title>My Blog!</title>
</head>
<body>

<!-- HEADER START  -->
<?php include('application/include/header.php'); ?>
<!-- HEADER END  -->

<!-- Блок main start -->
<div class="container">
    <div class="content row">
        <!--   Main Content     -->
        <div class="main-content col-md-9 col-12">
            <h2>Заголовок публикации</h2>

            <div class="single_post row">
                <div class="img col-12">
                    <img src="assets/images/image_3.jpeg" alt="" class="img-thumbnail">
                </div>
                <div class="info">
                    <i class="far fa-user">Имя автора</i>
                    <i class="far fa-calendar">Март 11, 2021</i>
                </div>
                <div class="single_post_text col-12">
                    <h3>Заголовок третьего уровня</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Blanditiis cupiditate <a href="">eveniet</a> nisi placeat quos tenetur
                        voluptas. Adipisci animi at doloribus error ex excepturi
                        maiores, nemo nobis numquam perferendis quia voluptatem!
                    </p>
                </div>
            </div>

        </div>
        <!--   Sidebar content     -->
        <div class="main-content col-md-3 col-12">
            <div class="section search">
                <h3>Поиск</h3>
                <form action="">
                    <input type="text" name="search-term" class="text-input" placeholder="Введите искомое слово...">
                </form>
            </div>

            <div class="section topics">
                <h3>Категории</h3>
                <ul>
                    <li><a href="">Поемы</a></li>
                    <li><a href="">Поемы</a></li>
                    <li><a href="">Поемы</a></li>
                    <li><a href="">Поемы</a></li>
                    <li><a href="">Поемы</a></li>
                    <li><a href="">Поемы</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Блок main end -->

<!-- FOOTER START  -->
<?php include('application/include/footer.php'); ?>
<!-- FOOTER END  -->

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->
</body>
</html>