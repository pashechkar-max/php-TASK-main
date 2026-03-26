<div class="container mt-2">
    <div class="card shadow col-md-4">
        <div class="card-body ">
            <h2 class="mb-4">Добавить сотрудника</h2>

            <form method="post">

                <input type="text" name="surname" class="form"
                       value="<?= $user->surname ?? '' ?>" placeholder="Фамилия">

                <input type="text" name="name" class="form"
                       value="<?= $user->name ?? '' ?>" placeholder="Имя">

                <input type="text" name="patronymic" class="form"
                       value="<?= $user->patronymic ?? '' ?>" placeholder="Отчество">

                <input type="date" name="birth_date" class="form"
                       value="<?= $user->birth_date ?? '' ?>">

                <input type="email" name="email" class="form"
                       value="<?= $user->email ?? '' ?>" placeholder="Email">

                <div class="mb-3">
                    <select name="role_id" class="form-select">
                        <?php foreach ($roles as $item): ?>
                            <option value="<?= $item->role_id ?>">
                                <?= $item->role_title ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <button class="btn save">Добавить</button>
                <a href="<?= app()->route->getUrl('/profile') ?>" class="btn cancel">Назад</a>

            </form>
        </div>
    </div>
</div>