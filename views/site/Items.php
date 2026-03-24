<h1>Товары</h1>
<ol>
    <?php
    foreach ($items as $item) {
        echo '<li>' . $item->item_name . '</li>';
        echo '<li>' . $item->unit_of_measure . '</li>';
        echo '<li>' . $item->current_stock . '</li>';
        echo '<li>' . $item->min_threshold . '</li>';
        echo '<li>' . $item->sku . '</li>';
    }
    ?>
</ol>
