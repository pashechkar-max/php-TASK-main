<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/php-TASK-main/public/css/style.css">
    <title>php-TASK-main</title>
</head>
<body>
<header>
    <nav>
        <?php
        if (!app()->auth::check()):
            ?>
            <a href="<?= app()->route->getUrl('/login') ?>">Вход</a>
            <a href="<?= app()->route->getUrl('/signup') ?>">Регистрация</a>
        <?php
        else:
            ?>

        <?php if (app()->auth::user()->staff->role_id == 1): ?>
            <a href="<?= app()->route->getUrl('/staffs') ?>">Сотрудники</a>
            <a href="<?= app()->route->getUrl('/departments') ?>">Подразделения</a>
            <a href="<?= app()->route->getUrl('/items') ?>">Товары</a>
        <?php endif; ?>

            <a href="<?= app()->route->getUrl('/supplies') ?>">Поставки</a>
            <a href="<?= app()->route->getUrl('/issues') ?>">Списание</a>

            <a href="<?= app()->route->getUrl('/profile') ?>">Профиль</a>
            <a href="<?= app()->route->getUrl('/logout') ?>">Выход</a>
        <?php
        endif;
        ?>
    </nav>
</header>
<main>
    <?= $content ?? '' ?>
</main>

</body>
</html>
