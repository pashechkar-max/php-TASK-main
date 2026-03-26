<h1>Список сотрудников</h1>
<table class="table">
    <tr>
        <td><a href="<?= app()->route->getUrl('/user/add') ?>" class="btn add">Добавить сотрудника</a></td>
    </tr>
    <tr>
        <th>ДОЛЖНОСТЬ</th>
        <th>ИМЯ</th>
        <th>ФАМИЛИЯ</th>
        <th>ОТЧЕСТВО</th>
        <th>EMAIL</th>
        <th>ПОДРАЗДЕЛЕНИЕ</th>
    </tr>
    <?php foreach ($staffs as $item): ?>
    <tr>
        <td><?=$item->role->role_title ?></td>
        <td><?= $item->user->name ?></td>
        <td><?= $item->user->surname ?></td>
        <td><?= $item->user->patronymic ?></td>
        <td><?= $item->user->bday ?></td>
        <td><?= $item->user->email ?></td>
        <td><?= $item->department->department_name ?>, <?= $item->department->location?></td>
    </tr>
    <?php endforeach; ?>
</table>
