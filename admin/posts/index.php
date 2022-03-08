<?php
    include('../../path.php');
    include('../../application/controllers/posts.php');
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
                <a href="<?php echo BASE_URL . "admin/posts/created.php";?>" class="col-2 btn btn-success">Создать</a>
            </div>
            <div class="row title-table">
                <h2>Управление Записями</h2>
                <div class="col-1">ID</div>
                <div class="col-3">Название</div>
                <div class="col-2">Автор</div>
                <div class="col-6">Управление</div>
            </div>
            <?php foreach ($postsAdmin as $post) { ?>
            <div class="row post">
                <div class="id col-1"><?php echo $post['id'];?></div>
                <div class="title col-3"><?php echo $post['title'];?></div>
                <div class="author col-2"><?php echo $post['username'];?></div>
                <div class="red col-2"><a href="edit.php?id=<?=$post['id'];?>">Edit</a></div>
                <div class="del col-2"><a href="edit.php?delete_id=<?=$post['id'];?>">Delete</a></div>
                <?php if($post['status']): ?>
                    <div class="status col-2"><a href="edit.php?publish=0&pub_id=<?=$post['id'];?>">Unpublish</a></div>
                <?php else: ?>
                    <div class="status col-2"><a href="edit.php?publish=1&pub_id=<?=$post['id'];?>">Publish</a></div>
                <?php endif; ?>
            </div>
            <?php } ?>
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