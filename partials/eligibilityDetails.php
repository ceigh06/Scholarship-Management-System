<?php
include_once '../includes/conn.php';

$reqResult = $dbconn->query('SELECT * FROM scholarships_requirements');
$requirements = $reqResult->fetch_all(MYSQLI_ASSOC);
?>

<div class="eligibility">
    <h1>Eligibility Criteria</h1>
    <div class="criteria-box">
        <?php foreach ($requirements as $requirement): ?>
            <div class="criteria-card">
                <p><strong><?= htmlspecialchars($requirement['requirement_name']) ?></strong></p>
                <p><?= htmlspecialchars($requirement['description']) ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</div>