<div class="auth-container">
    <div class="auth-card">
        <h2 class="auth-title">Добавить товар</h2>

        <form method="post" class="auth-form">

            <label>
                <span>Артикул</span>
                <input type="text" name="sku" required>
            </label>

            <label>
                <span>Название</span>
                <input type="text" name="item_name" required>
            </label>

            <label>
                <span>Единица измерения</span>
                <select name="unit_of_measure" class="form-select">
                    <option value="шт">шт</option>
                    <option value="кг">кг</option>
                    <option value="л">л</option>
                </select>
            </label>

            <div class="form-row">
                <label>
                    <span>Кол-во</span>
                    <input type="text" name="current_stock">
                </label>

                <label>
                    <span>Мин. остаток</span>
                    <input type="text" name="min_threshold">
                </label>
            </div>

            <div class="group">
                <button class="btn-primary">Добавить</button>
                <a href="<?= app()->route->getUrl('/items') ?>" class="btn-secondary">Назад</a>
            </div>

        </form>
    </div>
</div>