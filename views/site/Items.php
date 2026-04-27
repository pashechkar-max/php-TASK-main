<div class="header-stack">
<h1>Список товаров</h1>
    <a href="<?= app()->route->getUrl('/item/add') ?>" class="btn btn-add">+ Добавить товар</a>
</div>
<h3><?= $message ?? '' ?></h3>

<div class="toolbar">
<form method="get" class="search-form">
        <input type="text" name="search"
               value="<?= $search ?? '' ?>"
               placeholder="Название или артикул">
        <button class="btn btn-search ">Найти</button>
    </form>
</div>

<body>
    <div class="table-container">
    <table>
        <thead>
        <tr>
            <th>НАЗВАНИЕ</th>
            <th>АРТИКУЛ</th>
            <th>ТЕКУЩИЙ ЗАПАС</th>
            <th>МИНИМАЛЬНОЕ КОЛ-ВО</th>
        </tr>
        </thead>
        <?php foreach ($items as $item): ?>
        <tbody>
        <tr>
            <td><?=$item->item_name ?></td>
            <td><?= $item->sku ?></td>
            <td><?= $item->current_stock ?> <?= $item->unit_of_measure ?></td>
            <td><?= $item->min_threshold ?> <?= $item->unit_of_measure ?></td>
        </tr>
        </tbody>
        <?php endforeach; ?>
    </table>
    </div>
</body>
