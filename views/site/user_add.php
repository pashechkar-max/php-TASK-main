        <div class="form-card">
            <h2 class="form-title">Добавить сотрудника</h2>

            <form method="post">
                <label>Фамилия
                <input type="text" name="surname" class="form"
                       value="<?= $user->surname ?? '' ?>" placeholder="Фамилия">
                </label>
                <label>Имя
                <input type="text" name="name" class="form"
                       value="<?= $user->name ?? '' ?>" placeholder="Имя">
                </label>
                <label>Отчество
                <input type="text" name="patronymic" class="form"
                       value="<?= $user->patronymic ?? '' ?>" placeholder="Отчество">
                </label>
                <label>Дата рождения
                <input type="date" name="birth_date" class="form"
                       value="<?= $user->birth_date ?? '' ?>">
                </label>
                <label>Почта
                <input type="email" name="email" class="form"
                       value="<?= $user->email ?? '' ?>" placeholder="Email">
                </label>
                    <label>Должность
                    <select name="role_id" class="form-select">
                        <?php foreach ($roles as $item): ?>
                            <option value="<?= $item->role_id ?>">
                                <?= $item->role_title ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    </label>
                <div class="group">
                <button class="btn save in">Добавить</button>
                <a href="<?= app()->route->getUrl('/profile') ?>" class="btn cancel in">Назад</a>
                </div>
            </form>
        </div>