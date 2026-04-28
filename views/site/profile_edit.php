<div class="auth-container">
    <div class="auth-card">

        <h2 class="auth-title">Изменение профиля</h2>

        <?php if (!empty($message)): ?>
            <div class="auth-message"><?= $message ?></div>
        <?php endif; ?>

        <form method="post" enctype="multipart/form-data" class="auth-form">

            <input type="file" name="avatar" id="file" class="input-file">

            <label for="file" class="avatar-upload" id="avatar-label">
                Выбрать аватар
            </label>

            <label>
                <span>Фамилия</span>
                <input type="text" name="surname" value="<?= $user->surname ?>">
            </label>

            <label>
                <span>Имя</span>
                <input type="text" name="name" value="<?= $user->name ?>">
            </label>

            <label>
                <span>Отчество</span>
                <input type="text" name="patronymic" value="<?= $user->patronymic ?>">
            </label>

            <label>
                <span>Дата рождения</span>
                <input type="date" name="birth_date" value="<?= $user->birth_date ?>">
            </label>

            <label>
                <span>Почта</span>
                <input type="email" name="email" value="<?= $user->email ?>">
            </label>

            <div class="form-actions">
                <button class="btn-primary">Сохранить</button>
                <a href="<?= app()->route->getUrl('/profile') ?>" class="btn-secondary">Назад</a>
            </div>

        </form>
    </div>
</div>

<script>
    document.getElementById('file').addEventListener('change', function() {
        const label = document.getElementById('avatar-label');
        if (this.files.length > 0) {
            label.textContent = 'Аватар выбран';
        }
    });
</script>