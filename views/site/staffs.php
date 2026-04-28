<div class="header-stack">
    <h1>Сотрудники</h1>
    <a href="<?= app()->route->getUrl('/user/add') ?>" class="btn btn-add">+ Добавить</a>
</div>

<div class="table-container">
    <table>
        <thead>
        <tr>
            <th>Должность</th>
            <th>Имя</th>
            <th>Фамилия</th>
            <th>Отчество</th>
            <th>Дата рождения</th>
            <th>Почта</th>
            <th>Подразделение</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($staffs as $item): ?>
            <tr>
                <td><?= $item->role->role_title ?></td>
                <td><?= $item->user->name ?></td>
                <td><?= $item->user->surname ?></td>
                <td><?= $item->user->patronymic ?></td>
                <td><?= $item->user->birth_date ?></td>
                <td><?= $item->user->email ?></td>
                <td><?= $item->department->department_name ?></td>
                <td>
                    <form action="<?= app()->route->getUrl('/user/delete') ?>" method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $item->user->user_id ?>">
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>