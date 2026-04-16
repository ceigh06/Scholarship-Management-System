<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once __DIR__ . '/../includes/conn.php';

$user_ID = $_SESSION['user_ID'];

$appCheck = $dbconn->prepare("SELECT applicant_status FROM application WHERE user_ID = ?");
$appCheck->bind_param('i', $user_ID);
$appCheck->execute();
$existingApp = $appCheck->get_result()->fetch_assoc();

if (!$existingApp) {
    $initialPage = 'partials/studentHome.php';
} else {
    switch ($existingApp['applicant_status']) {
        case 'Approved':
            $initialPage = 'partials/studentAccepted.php';
            break;
        case 'Rejected':
            $initialPage = 'partials/studentRejected.php';
            break;
        default: // Pending or any other status
            $initialPage = 'partials/studentPending.php';
            break;
    }
}
?>

<body>
    <header class="header">
        <img src="GKSLogo.png" alt="Foundation Logo" class="logo">
        <h1>
            Diwa ng Bayani Foundation<br>
            Gintong Kabataan Scholarship<br>
            Online Application
        </h1>
        <button class="logOutBtn" onclick="window.location.href='index.php?logout=1'">Log out</button>
    </header>


    <div class="content-wrapper">
        <div class="content" id="content-area">
            <!-- Partials load here -->
        </div>
    </div>

    <div id="bg-modal"></div>
    <div id="modal"></div>

    <footer class="footer">
        <p> © Copyright 2026. Powered by BSIT 2AG2 Group 2
        <p>
            <button onclick="location.href='mailto:piaamandarebuelta@gmail.com'">Contact Us</button>
    </footer>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            loadPage('<?= $initialPage ?>');
        });
    </script>