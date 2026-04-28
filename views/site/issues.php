<div class="header-stack">
    <h1>Списание</h1>
</div>

<div class="table-container">
    <table>
        <thead>
        <tr>
            <th>Наименование</th>
            <th>Артикул</th>
            <th>Сотрудник</th>
            <th>Должность</th>
            <th>Дата списания</th>
            <th>Кол-во</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($issues as $item): ?>
            <tr>
                <td><?= $item->item->item_name ?></td>
                <td><?= $item->item->sku ?></td>
                <td><?= $item->staff->user->surname ?> <?= mb_substr($item->staff->user->name,0,1) ?>. <?= mb_substr($item->staff->user->patronymic,0,1) ?>.</td>
                <td><?= $item->staff->user->staff->role->role_title ?></td>
                <td><?= $item->issue_date ?></td>
                <td><?= $item->quantity ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>