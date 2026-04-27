<div class="card">
    <h2>Авторизация</h2>
    <h3><?= $message ?? ''; ?></h3>

    <?php if (app()->auth::check()): ?>
        <h3>Привет, <?= app()->auth->user()->name; ?></h3>
    <?php else: ?>
        <form method="post">
            <label>Логин <input type="text" name="login"></label>
            <label>Пароль <input type="password" name="password"></label>
            <button class="btn save in">Войти</button>
        </form>
    <?php endif; ?>
</div>
