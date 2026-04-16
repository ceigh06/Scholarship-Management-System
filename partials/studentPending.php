<?php
session_start();
include_once '../includes/conn.php';

$user_ID = $_SESSION['user_ID'];
$studentResult = $dbconn->query("SELECT * FROM users WHERE user_ID = '$user_ID'");
$student = $studentResult->fetch_assoc();

$scholarshipResult = $dbconn->query('SELECT * FROM scholarships LIMIT 1');
$scholarship = $scholarshipResult->fetch_assoc();
?>

<div class="studentStatus">
    <div class="status">
        <h1 class="pending">PENDING</h1>
    </div>
    <div class="statusParagraph">
        <p>
            Your application has been received and is currently pending review. Our scholarship committee
            is carefully evaluating all submissions, and we appreciate your patience during this process.<br><br>
            Kindly wait until <strong><?= htmlspecialchars($scholarship['announcement_of_new_scholars']) ?></strong>.
            Please do not contact our office for status updates, as this will not expedite the review process.
        </p>
    </div>
</div>