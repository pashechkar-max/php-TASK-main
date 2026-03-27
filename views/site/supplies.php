<div class="form-table item">
    <div class="group-row">
        <h1 class="form-title">Список поставок</h1>
    </div>
<table class="table">
    <tr>
        <th>НАИМЕНОВАНИЕ</th>
        <th>ДАТА</th>
        <th>АРТИКУЛ</th>
        <th>КОЛ-ВО</th>
        <th>РОЗНИЧНАЯ ЦЕНА</th>
        <th>ПОСТАВЩИК</th>
    </tr>
    <?php foreach ($supplies as $item): ?>
        <tr>
            <td><?= $item->item->item_name ?></td>
            <td><?= $item->supply_date?> </td>
            <td><?= $item->item->sku ?></td>
            <td><?= $item->quantity ?></td>
            <td><?= $item->unit_price ?></td>
            <td><?= $item->supplier ?></td>
        </tr>
    <?php endforeach; ?>
    </table>
</div>
