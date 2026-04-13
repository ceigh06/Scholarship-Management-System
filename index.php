<?php
session_start();

// Handle logout
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
    <script src="assets/script.js"></script>
    <title>GKS Online Application</title>
</head>

<body>

    <?php
    // include makes it that we stay on the index without redirecting the url
    if ($role === 'Admin') {
        include 'views/adminIndex.php';

    } elseif ($role === 'Student') {
        include 'views/studentIndex.php';

    } else {
        // Not logged in — show login form
        include 'views/guest.php';

    }
    ?>

</body>

</html>