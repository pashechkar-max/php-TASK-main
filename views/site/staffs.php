<div class="form-table">
    <div class="group-row">
        <h2 class="form-title">Список сотрудников</h2>
    <a href="<?= app()->route->getUrl('/user/add') ?>" class="btn save">Добавить сотрудника</a>
    </div>
<table class="table">
    <tr>
        <th>ДОЛЖНОСТЬ</th>
        <th>ИМЯ</th>
        <th>ФАМИЛИЯ</th>
        <th>ОТЧЕСТВО</th>
        <th>ДАТА РОЖДЕНИЯ</th>
        <th>ПОЧТА</th>
        <th>ПОДРАЗДЕЛЕНИЕ</th>
    </tr>
    <?php foreach ($staffs as $item): ?>
    <tr>
        <td><?=$item->role->role_title ?></td>
        <td><?= $item->user->name ?></td>
        <td><?= $item->user->surname ?></td>
        <td><?= $item->user->patronymic ?></td>
        <td><?= $item->user->birth_date ?></td>
        <td><?= $item->user->email ?></td>
        <td><?= $item->department->department_name ?>, <?= $item->department->location?></td>
    </tr>
    <?php endforeach; ?>
</table>
</div>
