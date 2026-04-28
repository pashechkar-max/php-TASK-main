<div class="header-stack">
    <h1>Поставки</h1>
</div>

<div class="table-container">
    <table>
        <thead>
        <tr>
            <th>Наименование</th>
            <th>Дата</th>
            <th>Артикул</th>
            <th>Кол-во</th>
            <th>Цена</th>
            <th>Поставщик</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($supplies as $item): ?>
            <tr>
                <td><?= $item->item->item_name ?></td>
                <td><?= $item->supply_date ?></td>
                <td><?= $item->item->sku ?></td>
                <td><?= $item->quantity ?></td>
                <td><?= $item->unit_price ?></td>
                <td><?= $item->supplier ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>