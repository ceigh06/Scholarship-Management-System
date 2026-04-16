<?php
session_start();
include_once '../includes/conn.php';

$user_ID = $_SESSION['user_ID'];
$studentResult = $dbconn->query("SELECT * FROM users WHERE user_ID = '$user_ID'");
$student = $studentResult->fetch_assoc();
?>

<div class="studentStatus">
    <div class="status">
        <h1 class="rejected">REJECTED</h1>
    </div>
    <div class="statusParagraph">
        <p>
            Thank you for your interest in the Gintong Kabataan Scholarship,
            <strong><?= htmlspecialchars($student['first_name'] . ' ' . $student['last_name']) ?></strong>.
            After careful consideration, we regret to inform you that we are unable to offer you a scholarship at this
            time.<br><br>
            We received an exceptionally large number of highly qualified applicants this year, and the selection
            process
            was extremely competitive. Please know that this decision is not a reflection of your abilities,
            achievements,
            or potential.<br><br>
            We encourage you to explore other scholarship opportunities and wish you the very best in your academic
            pursuits.
        </p>
    </div>
</div>