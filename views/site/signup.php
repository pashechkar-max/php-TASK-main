<div class="auth-container">
    <div class="auth-card">
        <h2 class="auth-title">Регистрация</h2>

        <?php if (!empty($message)): ?>
            <div class="auth-message"><?= $message ?></div>
        <?php endif; ?>

        <form method="post" class="auth-form">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>

            <div class="form-row">
                <label>
                    <span>Фамилия</span>
                    <input type="text" name="surname">
                </label>

                <label>
                    <span>Имя</span>
                    <input type="text" name="name">
                </label>
            </div>

            <label>
                <span>Отчество</span>
                <input type="text" name="patronymic">
            </label>

            <label>
                <span>Дата рождения</span>
                <input type="date" name="birth_date">
            </label>

            <label>
                <span>Почта</span>
                <input type="email" name="email">
            </label>

            <label>
                <span>Логин</span>
                <input type="text" name="login">
            </label>

            <label>
                <span>Пароль</span>
                <input type="password" name="password">
            </label>

            <button class="btn-primary">Зарегистрироваться</button>
        </form>
    </div>
</div>
