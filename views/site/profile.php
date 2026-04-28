<div class="auth-container">
    <div class="auth-card">

        <?php
        $user = app()->auth::user();
        $avatar = !empty($user->avatar) ? $user->avatar : 'default-avatar.png';
        $avatarUrl = '/php-TASK-main/public/uploads/avatars/' . $avatar;
        ?>

        <div class="profile-header">
            <img src="<?= $avatarUrl ?>" alt="Аватар">
            <div class="profile-login"><?= $user->login ?></div>
        </div>

        <table class="profile-table">
            <tr>
                <th>Фамилия</th>
                <td><?= $user->surname ?></td>
            </tr>
            <tr>
                <th>Имя</th>
                <td><?= $user->name ?></td>
            </tr>
            <tr>
                <th>Отчество</th>
                <td><?= $user->patronymic ?></td>
            </tr>
            <tr>
                <th>Почта</th>
                <td><?= $user->email ?></td>
            </tr>
        </table>

        <a href="<?= app()->route->getUrl('/profile/edit') ?>" class="profile-btn">
            Изменить профиль
        </a>

    </div>
</div>