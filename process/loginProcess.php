<?php
session_start();
include_once '../includes/conn.php';

if (!isset($_POST['user_email']) || !isset($_POST['user_password'])) {
    header("Location: ../index.php");
    exit();
}

$user_email = trim($_POST['user_email']);
$user_password = trim($_POST['user_password']);

$stmt = $dbconn->prepare("SELECT * FROM users WHERE user_email = ?");
$stmt->bind_param('s', $user_email);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

if ($user && password_verify($user_password, $user['user_password'])) {
    $_SESSION['user_id'] = $user['user_id'];
    $_SESSION['user_email'] = $user['user_email'];
    $_SESSION['roles'] = $user['roles'];

    header("Location: ../index.php");
    exit();
} else {
    // Login failed — redirect back with error flag
    header("Location: ../index.php?error=invalid");
    exit();
}
?>