<h1>Список персонала</h1>
<ol>
    <?php
    foreach ($staffs as $item) {
        // Используем $item, а не $staffs
        echo '<li>' . $item->job_title . '</li>';
    }
    ?>
</ol>
