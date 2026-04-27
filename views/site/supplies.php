<div class="header-stack">
    <h1>Список поставок</h1>
</div>

<body>
<div class="table-container">
<table>
    <thead>
    <tr>
        <th>НАИМЕНОВАНИЕ</th>
        <th>ДАТА</th>
        <th>АРТИКУЛ</th>
        <th>КОЛ-ВО</th>
        <th>РОЗНИЧНАЯ ЦЕНА</th>
        <th>ПОСТАВЩИК</th>
    </tr>
    </thead>
    <tbody>
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
    </tbody>
    </table>
</div>
</body>
