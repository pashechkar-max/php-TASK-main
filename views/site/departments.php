<div class="header-stack">
    <h1>Подразделения</h1>
</div>

<div class="table-container">
    <table>
        <thead>
        <tr>
            <th>Название</th>
            <th>Адрес</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($departments as $item): ?>
            <tr>
                <td><?= $item->department_name ?></td>
                <td><?= $item->location ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>


