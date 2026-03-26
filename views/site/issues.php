<h1>Списание товаров</h1>
<table class="table">
    <tr>
        <th>НАЗВАНИЕ</th>
        <th>АРТИКУЛ</th>
        <th>СОТРУДНИК</th>
        <th>ДОЛЖНОСТЬ</th>
        <th>ДАТА</th>
        <th>КОЛ-ВО</th>
    </tr>
    <?php foreach ($issues as $item): ?>
        <tr>
            <td><?=$item->item->item_name ?></td>
            <td><?= $item->item->sku ?></td>
            <td><?= $item->staff->user->surname?> <?= mb_substr($item->staff->user->name, 0, 1) ?>. <?= mb_substr($item->staff->user->patronymic, 0, 1) ?>.</td>
            <td><?= $item->staff->user->staff->role->role_title ?></td>
            <td><?= $item->issue_date ?></td>
            <td><?= $item->quantity ?></td>
        </tr>
    <?php endforeach; ?>
</table>


