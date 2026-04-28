<div class="auth-container">
    <div class="auth-card">
        <h2 class="auth-title">Авторизация</h2>

        <?php if (!empty($message)): ?>
            <div class="auth-message"><?= $message ?></div>
        <?php endif; ?>

        <?php if (app()->auth::check()): ?>
            <h3 class="auth-title">Привет, <?= app()->auth->user()->name; ?></h3>
        <?php else: ?>
            <form method="post" class="auth-form">
                <label>
                    <span>Логин</span>
                    <input type="text" name="login">
                </label>

                <label>
                    <span>Пароль</span>
                    <input type="password" name="password">
                </label>

                <button class="btn-primary">Войти</button>
            </form>
        <?php endif; ?>
    </div>
</div>
