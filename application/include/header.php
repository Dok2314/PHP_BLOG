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
                        <a href="">
                            <i class="far fa-user"></i>
                            Кабинет
                        </a>
                        <ul class="dropdown-content dropdown">
                            <li><a href="<?php echo BASE_URL . 'login.php'; ?>">Админ панель</a></li>
                            <li><a href="">Выход</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
