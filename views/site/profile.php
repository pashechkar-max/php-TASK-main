<div class="container mt-2">
    <div class="card shadow col-md-4">
        <div class="card-body">
            <h2>Здравствуйте, <?= app()->auth::user()->name ?> <?= app()->auth::user()->patronymic ?></h2>

            <table class="table">
                <tr>
                    <th>ФАМИЛИЯ</th>
                    <td><?= app()->auth::user()->surname ?></td>
                </tr>
                <tr>
                    <th>ИМЯ</th>
                    <td><?= app()->auth::user()->name ?></td>
                </tr>
                <tr>
                    <th>ОТЧЕСТВО</th>
                    <td><?= app()->auth::user()->patronymic ?></td>
                </tr>
                <tr>
                    <th>EMAIL</th>
                    <td><?= app()->auth::user()->email ?></td>
                </tr>
                <tr>
                    <th>ЛОГИН</th>
                    <td><?= app()->auth::user()->login ?></td>
                </tr>
            </table>

            <a href="<?= app()->route->getUrl('/profile/edit') ?>" class="btn edit">Редактировать профиль</a>

        </div>
    </div>
</div>