<div class="card">
            <h2>Изменение профиля</h2>
    <h3><?= $message ?? '' ?></h3>

    <form method="post" enctype="multipart/form-data">
        <input type="file" name="avatar" id="file" class="input-file">
        <label for="file" class="avatar" id="avatar-label">Изменить аватар</label>

                <label>Фамилия
                <input type="text" name="surname"
                       value="<?= $user->surname ?>" placeholder="Фамилия">
                </label>
                <label>Имя
                <input type="text" name="name"
                       value="<?= $user->name ?>" placeholder="Имя">
                </label>
                <label>Отчество
                <input type="text" name="patronymic"
                       value="<?= $user->patronymic ?>" placeholder="Отчество">
                </label>
                <label>Дата рождения
                <input type="date" name="birth_date"
                       value="<?= $user->birth_date ?>">
                </label>
                <label>Почта
                <input type="email" name="email"
                       value="<?= $user->email ?>" placeholder="Email">
                </label>
                <div class="group">
                    <button class="btn save in">Сохранить</button>
                    <a href="<?= app()->route->getUrl('/profile') ?>" class="btn cancel in">Назад</a>
                </div>
            </form>

</div>

<script>
    document.getElementById('file').addEventListener('change', function() {
        const label = document.getElementById('avatar-label');

        if (this.files.length > 0) {
            label.textContent = 'Аватар изменен';
        }
    });
</script>