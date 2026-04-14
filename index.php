<?php
session_start();

if (isset($_GET['logout'])) {
    $_SESSION = array();
    session_destroy();
    header("Location: index.php");
    exit();
}

$role = $_SESSION['roles'] ?? null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/style.css">
    <title>GKS Online Application</title>
</head>

<body>

    <?php
    if ($role === 'Admin') {
        include 'views/adminIndex.php';
    } elseif ($role === 'Student') {
        include 'views/studentIndex.php';
    } else {
        include 'views/guest.php';  // this has #modal and #bg-modal in it
    }
    ?>

    <!-- scripts AFTER the DOM so #modal etc. exist before scripts run -->
    <script src="assets/jquery-4.0.0.min.js"></script>
    <script src="assets/script.js?v=<?= time() ?>"></script>

    <?php if ($role === 'Admin'): ?>
        <script>loadPage('partials/dashboard.php');</script>
    <?php elseif ($role === 'Student'): ?>
        <script>loadPage('partials/studentApply.php');</script>
    <?php else: ?>
        <script>openModal('forms/loginForm.php');</script>
    <?php endif; ?>

</body>

</html>