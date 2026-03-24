<h1>Список поставок</h1>
<ol>
    <?php
    foreach ($supplies as $item) {
        echo '<li>' . $item->item_id . '</li>';
    }
    ?>
</ol>
