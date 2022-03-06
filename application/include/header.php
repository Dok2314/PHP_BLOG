<header class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h1>
                    <a href="<?php echo BASE_URL; ?>">My blog</a>
                </h1>
            </div>
            <nav class="col-8">
                <ul>
                    <li><a href="<?php echo BASE_URL; ?>">Главная</a></li>
                    <li><a href="">О Нас</a></li>
                    <li><a href="">Услуги</a></li>
                    <li>
                        <?php if($_SESSION['id']): ?>

                            <a href="">
                                <i class="far fa-user"></i>
                                <?=$_SESSION['login'];?>
                            </a>
                            <ul class="dropdown-content dropdown">
                                <?php if($_SESSION['admin']): ?>
                                    <li><a href="#">Админ панель</a></li>
                                <?php endif; ?>
                                <li><a href="<?php echo BASE_URL . 'logout.php'; ?>">Выход</a></li>
                            </ul>
                        <?php else: ?>
                            <a href="<?php echo BASE_URL . 'login.php'; ?>">
                                <i class="far fa-user"></i>
                                Войти
                            </a>
                            <ul class="dropdown-content dropdown">
                                <li><a href="<?php echo BASE_URL . 'register.php'; ?>">Регистрация</a></li>
                            </ul>
                        <?php endif; ?>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
