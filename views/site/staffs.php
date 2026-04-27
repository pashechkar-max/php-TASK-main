<body>
<div class="header-stack">
    <h1>Список сотрудников</h1>
    <a href="<?= app()->route->getUrl('/user/add') ?>" class="btn btn-add">+ Добавить сотрудника</a>
</div>

    <div class="table-container">
<table>
    <thead>
    <tr>
        <th>ДОЛЖНОСТЬ</th>
        <th>ИМЯ</th>
        <th>ФАМИЛИЯ</th>
        <th>ОТЧЕСТВО</th>
        <th>ДАТА РОЖДЕНИЯ</th>
        <th>ПОЧТА</th>
        <th>ПОДРАЗДЕЛЕНИЕ</th>
        <th></th>
    </tr>
    </thead>
    <?php foreach ($staffs as $item): ?>
    <tr>
        <td><?=$item->role->role_title ?></td>
        <td><?= $item->user->name ?></td>
        <td><?= $item->user->surname ?></td>
        <td><?= $item->user->patronymic ?></td>
        <td><?= $item->user->birth_date ?></td>
        <td><?= $item->user->email ?></td>
        <td><?= $item->department->department_name ?>, <?= $item->department->location?></td>
        <td>
            <a href="/user/delete?id=<?= $item->user->id ?>"
               class="btn cancel"
               onclick="return confirm('Удалить пользователя?')">
                Удалить
            </a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
    </div>

</body>
