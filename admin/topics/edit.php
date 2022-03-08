<?php
    session_start();
    include('../../path.php');
    include('../../application/controllers/topics.php');
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
                <a href="<?php echo BASE_URL . "admin/topics/created.php";?>" class="col-2 btn btn-success">Создать</a>
                <span class="col-1"></span>
                <a href="<?php echo BASE_URL . "admin/topics/index.php";?>" class="col-3 btn btn-warning">Управлять</a>
            </div>
            <div class="row title-table">
                <h2>Обновление Категории <span style="color: green; font-weight: bolder"><?php echo $name; ?></span></h2>
            </div>
            <div class="row add-post">
                <form action="edit.php" method="post">
                    <?php if($errorMessage){ ?>
                        <div class="mb-3 col-12 col-md-4 err">
                            <?php include "../../application/helps/error_info.php"; ?>
                        </div>
                    <?php } ?>
                    <input type="hidden" name="id" value="<?=$id;?>">
                    <div class="mb-3">
                        <label for="title">Название Категории</label>
                        <input type="name" class="form-control" name="name" placeholder="Название" id="title" aria-label="Название категории" value="<?php echo $name; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="content">Описание Категории</label>
                        <textarea class="form-control" name="description" placeholder="Описание..." id="content" style="height: 100px"><?php echo $description; ?></textarea>
                    </div>
                    <br>
                    <button type="submit" name="topic-edit" class="btn btn-primary">Обновить Категорию</button>
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