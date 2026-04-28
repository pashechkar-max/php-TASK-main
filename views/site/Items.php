<div class="header-stack">
    <h1>Список товаров</h1>
    <a href="<?= app()->route->getUrl('/item/add') ?>" class="btn btn-add">+ Добавить</a>
</div>

<form method="get" class="search-form">
    <input type="text" name="search" value="<?= $search ?? '' ?>" placeholder="Название или артикул">
    <button class="btn btn-add">Найти</button>
</form>

<div class="table-container">
    <table>
        <thead>
        <tr>
            <th>Название</th>
            <th>Артикул</th>
            <th>Запас</th>
            <th>Мин количество</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($items as $item): ?>
            <tr>
                <td><?= $item->item_name ?></td>
                <td><?= $item->sku ?></td>
                <td><?= $item->current_stock ?> <?= $item->unit_of_measure ?></td>
                <td><?= $item->min_threshold ?> <?= $item->unit_of_measure ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>