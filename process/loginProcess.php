<?php
session_start();
include_once '../includes/conn.php';

$user_email = trim($_POST['user_email']);
$user_password = trim($_POST['user_password']);

$result = $dbconn->query("SELECT * FROM users WHERE user_email = '$user_email'");
$user = $result->fetch_assoc();

if (!isset($_POST['user_email']) || !isset($_POST['user_password'])) {
    header("Location: index.php?error=missing");
    exit();
}

if ($user && password_verify($user_password, $user['user_password'])) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_email'] = $user['user_email'];
    $_SESSION['roles'] = $user['roles'];

    if ($user['roles'] == 'Admin' || $user['roles'] == 'Student') {
        header("Location: ../index.php");
    }
    exit();
} else {
    echo '<script>
    window.location.href = "../index.php";
    </script>';
}
?>

<!-- 
    echo "Invalid email or password.
        <br><a href='loginForm.php'>Go back</a>"; -->