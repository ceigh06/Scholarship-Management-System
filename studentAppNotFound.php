<?php
session_start();
include_once '../includes/conn.php';

$user_id = $_SESSION['user_id'];
$studentResult = $dbconn->query("SELECT * FROM users WHERE user_id = '$user_id'");
$student = $studentResult->fetch_assoc();
?>

<div class="studentStatus">
    <div class="status">
        <h1 class="notFound">Application Not Found</h1>
    </div>
    <div class="statusParagraph">
        <p>
            We are unable to locate your application in our system,
            <strong><?= htmlspecialchars($student['first_name'] . ' ' . $student['last_name']) ?></strong>.
            This may occur if your submission was withdrawn, deleted prior to the review deadline, or if
            incomplete applications were removed following the close of the application period.<br><br>
            Please verify that you are logged into the correct account. If you believe this message was received
            in error, contact our support team at
            <a href="mailto:diwangbayani@gmail.com">diwangbayani@gmail.com</a>
            with your full name and the email address used during registration.
        </p>
    </div>
</div>