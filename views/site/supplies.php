<h1>Список поставок</h1>
<table class="table">
    <tr>
        <th>№</th>
        <th>НАИМЕНОВАНИЕ</th>
        <th>ДАТА</th>
        <th>АРТИКУЛ</th>
        <th>КОЛ-ВО</th>
        <th>РОЗНИЧНАЯ ЦЕНА</th>
        <th>ПОСТАВЩИК</th>
    </tr>
    <?php foreach ($supplies as $item): ?>
        <tr>
            <td><?=$item->supply_id ?></td>
            <td><?= $item->item->item_name ?></td>
            <td><?= $item->item->sku ?></td>
            <td><?= $item->quantity ?></td>
            <td><?= $item->unit_price ?></td>
            <td><?= $item->supplier ?></td>
        </tr>
    <?php endforeach; ?>
    </table>
