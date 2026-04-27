        <div class="card">
            <h2>Добавить товар</h2>

            <form method="post">
                <label>Артикул
                    <input type="text" class="form" placeholder="Артикул" name="sku" required>
                </label>

                <label>Наименование
                    <input type="text" class="form" placeholder="Наименование" name="item_name" required>
                </label>

                <label>Единица измерения
                <select name="unit_of_measure" class="form-select">
                    <option value="шт">шт</option>
                    <option value="кг">кг</option>
                    <option value="л">л</option>
                </select>
                </label>

                <label>Кол-во
                    <input type="text" class="form" placeholder="Кол-во" name="current_stock">
                </label>

                <label>Мин. остаток
                    <input type="text" class="form" placeholder="Мин. остаток" name="min_threshold">
                </label>
                <div class="group">
                <button class="btn save in">Добавить</button>
                <a href="<?= app()->route->getUrl('/items') ?>" class="btn cancel in">Назад</a>
                </div>
            </form>
        </div>