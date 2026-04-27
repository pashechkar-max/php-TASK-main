<div class="header-stack">
    <h1>Подразделения</h1>
</div>

<body>
<div class="table-container">
    <table>
        <thead>
        <tr>
            <th>НАЗВАНИЕ</th>
            <th>АДРЕС</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($departments as $item): ?>
            <tr>
                <td><?=$item->department_name ?></td>
                <td><?= $item->location ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>


