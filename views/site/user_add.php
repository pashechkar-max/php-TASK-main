<div class="auth-container">
    <div class="auth-card">
        <h2 class="auth-title">Добавить сотрудника</h2>

        <form method="post" class="auth-form">

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

            <div class="form-row">
                <label>
                    <span>Логин</span>
                    <input type="text" name="login">
                </label>

                <label>
                    <span>Пароль</span>
                    <input type="password" name="password">
                </label>
            </div>

            <label>
                <span>Дата рождения</span>
                <input type="date" name="birth_date">
            </label>

            <label>
                <span>Email</span>
                <input type="email" name="email">
            </label>

            <label>
                <span>Роль</span>
                <select name="role_id" class="form-select">
                    <?php foreach ($roles as $item): ?>
                        <option value="<?= $item->role_id ?>">
                            <?= $item->role_title ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </label>

            <div class="group">
                <button class="btn-primary">Добавить</button>
                <a href="<?= app()->route->getUrl('/staffs') ?>" class="btn-secondary">Назад</a>
            </div>

        </form>
    </div>
</div>