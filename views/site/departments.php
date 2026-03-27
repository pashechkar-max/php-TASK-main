<div class="form-table dep">
    <div class="group-row">
<h1 class="form-title">Список подразделений </h1>
    </div>
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
</div>
