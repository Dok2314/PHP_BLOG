<?php
    include('../../path.php');
    include('../../application/controllers/posts.php');
?>
<!doctype html>
<html lang="ru">
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
                <span class="col-1"></span>
                <a href="<?php echo BASE_URL . "admin/posts/index.php";?>" class="col-3 btn btn-warning">Редактировать</a>
            </div>
            <div class="row title-table">
                <h2>Добавление Записи</h2>
            </div>
            <div class="row add-post">
                <form action="created.php" method="post" enctype="multipart/form-data">
                        <?php if($errorMessage){ ?>
                            <div class="mb-3 col-12 col-md-4 err">
                                <p><?=$errorMessage;?></p>
                            </div>
                        <?php } ?>
                        <div class="mb-3">
                            <label for="title">Название Статьи</label>
                            <input type="text" name="title" class="form-control" placeholder="Название" id="title" aria-label="Название Сатьи">
                        </div>
                        <div class="mb-3">
                            <label for="editor">Содержимое Записи</label>
                            <textarea class="form-control" name="content" placeholder="Сатьтя..." id="editor" style="height: 100px"></textarea>
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="img" id="upload">
                            <label for="upload" class="input-group-text">Загрузить</label>
                        </div>
                        <select class="form-select" aria-label="Default select example" name="topic">
                            <option selected>Выберите категорию</option>
                            <?php foreach ($allTopics as $topic) { ?>
                                <option value="<?php echo $topic['id'] ;?>"><?php echo $topic['name']; ?></option>
                            <?php } ?>
                        </select>
                        <br>
                        <div class="input-group mb-3">
                            <label for="publish">Publish?</label>
                            <input type="checkbox" value="1" name="publish" id="publish" style="margin-top: 5px; margin-left: 5px;">
                        </div>
                        <br>
                        <button type="submit" name="add-post" class="btn btn-primary">Добавить Запись</button>
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
<script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>

<script type="text/javascript" src="../../assets/js/script.js"></script>
</body>
</html>