<h1>Список подразделений </h1>
    <table class="table">
        <tr>
            <th>НАЗВАНИЕ</th>
            <th>АДРЕС</th>
        </tr>
        <?php foreach ($departments as $item): ?>
        <tr>
            <td><?=$item->department_name ?></td>
            <td><?= $item->location ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
