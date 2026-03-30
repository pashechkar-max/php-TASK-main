<div class="container">
<div class="group-search">
<form method="get">
        <input type="text" name="search" class="input-search"
               value="<?= $search ?? '' ?>"
               placeholder="Название или артикул">
        <button class="btn search">Найти</button>
    </form>
</div>
    <div class="form-table item">
        <div class="group-row">
            <h1 class="form-title">Список товаров</h1>
            <a href="<?= app()->route->getUrl('/item/add') ?>" class="btn save">Добавить товар</a>
        </div>
    <table class="table">
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
    </div>

</div>
