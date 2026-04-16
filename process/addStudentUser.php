<?php
include_once '../includes/conn.php';

$first_name = trim($_POST['first_name']);
$middle_name = trim($_POST['middle_name']);
$last_name = trim($_POST['last_name']);
$user_email = trim($_POST['user_email']);
$user_password = password_hash(trim($_POST['user_password']), PASSWORD_BCRYPT);

$stmt = $dbconn->prepare("INSERT INTO users (first_name, middle_name, last_name, user_email, user_password)
                          VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param('sssss', $first_name, $middle_name, $last_name, $user_email, $user_password);

if ($stmt->execute()) {
  // Redirect with success message
  header("Location: ../index.php?registered=1");
  exit();
} else {
  // Redirect with error message
  header("Location: ../index.php?error=email_exists");
  exit();
}
?>