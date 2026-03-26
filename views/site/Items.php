<h1>Список товаров</h1>
    <table class="table">
        <tr>
            <td><a href="<?= app()->route->getUrl('/item/add') ?>" class="btn add">Добавить товар</a></td>
        </tr>
        <tr>
            <th>НАЗВАНИЕ</th>
            <th>АРТИКУЛ</th>
            <th>ТЕКУЩИЙ ЗАПАС</th>
            <th>МИНИМАЛЬНОЕ КОЛ-ВО</th>
        </tr>
        <?php foreach ($items as $item): ?>
        <tr>
            <td><?=$item->item_name ?></td>
            <td><?= $item->sku ?></td>
            <td><?= $item->current_stock ?> <?= $item->unit_of_measure ?></td>
            <td><?= $item->min_threshold ?> <?= $item->unit_of_measure ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

