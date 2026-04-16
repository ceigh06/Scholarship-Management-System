<?php
include_once '../includes/conn.php';

$benefits = $dbconn->query('SELECT * FROM scholarships_benefits');
?>

<div class="benefits">
    <h1>Scholarship Benefits</h1>
    <table>
        <thead>
            <tr>
                <th>Label</th>
                <th>Description</th>
                <th>Amount</th>
                <th>Per Semester</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($benefits as $benefit): ?>
                <tr>
                    <td><?= htmlspecialchars($benefit['label']) ?></td>
                    <td><?= htmlspecialchars($benefit['description']) ?></td>
                    <td><?= htmlspecialchars($benefit['amount']) ?></td>
                    <td><?= htmlspecialchars($benefit['per_semester']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>