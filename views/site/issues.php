<h1>Срок товара</h1>
<ol>
    <?php
    foreach ($issues as $item) {
        echo '<h1>' . $item->item_name . '</h1>';
        echo '<li>' . $item->unit_of_measure . '</li>';
        echo '<li>' . $item->current_stock . '</li>';
        echo '<li>' . $item->min_threshold . '</li>';
        echo '<li>' . $item->sku . '</li>';
    }
    ?>
</ol>
