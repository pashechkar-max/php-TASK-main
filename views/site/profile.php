        <div class="card">
            <?php
            $user = app()->auth::user();
            $avatar = !empty($user->avatar) ? $user->avatar : 'default-avatar.png';
            $avatarPath = __DIR__ . '/../../public/uploads/avatars/' . $avatar; // для PHP
            $avatarUrl = '/php-TASK-main/public/uploads/avatars/' . $avatar;     // для тега <img>
            ?>

            <table class="table-container">
                <tr>
                    <th><img src="<?= $avatarUrl ?>" alt="Аватар"></th>
                    <td>
                        <h2><?= $user->login ?></h2>
                    </td>
                </tr>
                <tr>
                    <th>ФАМИЛИЯ</th>
                    <td><?= $user->surname ?></td>
                </tr>
                <tr>
                    <th>ИМЯ</th>
                    <td><?= $user->name ?></td>
                </tr>
                <tr>
                    <th>ОТЧЕСТВО</th>
                    <td><?= $user->patronymic ?></td>
                </tr>
                <tr>
                    <th>ПОЧТА</th>
                    <td><?= $user->email ?></td>
                </tr>
            </table>
            <a href="<?= app()->route->getUrl('/profile/edit') ?>" class="avatar">
                Изменить профиль
            </a>


        </div>
