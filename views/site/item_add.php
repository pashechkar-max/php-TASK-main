<div class="container mt-2">
    <div class="card shadow col-md-4">
        <div class="card-body">
            <h2 class="mb-4">Добавить товар</h2>

            <form method="post">
                <div class="mb-3">
                    <input type="text" class="form" placeholder="Артикул" name="sku" required>
                </div>

                <div class="mb-3">
                    <input type="text" class="form" placeholder="Наименование" name="item_name" required>
                </div>

                <select name="unit_of_measure" class="form-select">
                    <option value="шт">шт</option>
                    <option value="кг">кг</option>
                    <option value="л">л</option>
                </select>

                <div class="mb-3">
                    <input type="text" class="form" placeholder="Кол-во" name="current_stock">
                </div>


                <div class="mb-3">
                    <input type="text" class="form" placeholder="Мин. остаток" name="min_threshold">
                </div>

                <button class="btn save">Добавить</button>
                <a href="<?= app()->route->getUrl('/items') ?>" class="btn cancel">Назад</a>

            </form>
        </div>
    </div>
</div>