<?php
session_start();
include_once '../includes/conn.php';

$user_id = $_SESSION['user_id'];
$studentResult = $dbconn->query("SELECT * FROM users WHERE user_id = '$user_id'");
$student = $studentResult->fetch_assoc();
?>

<div class="studentStatus">
    <div class="status">
        <h1 class="accepted">ACCEPTED</h1>
    </div>
    <div class="statusParagraph">
        <p>
            Congratulations, <strong><?= htmlspecialchars($student['first_name'] . ' ' . $student['last_name']) ?></strong>!
            On behalf of the Diwa ng Bayani Foundation selection committee, we are delighted to inform you that
            you have been selected as a recipient of the Gintong Kabataan Scholarship.<br><br>
            Your application stood out among many highly qualified candidates, and we were deeply impressed by
            your academic achievements, leadership qualities, and commitment to academic excellence.<br><br>
            Welcome to the Gintong Kabataan community. We look forward to supporting your educational journey.
        </p>
    </div>
</div>