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
    echo "<div style='text-align:center; padding:20px;'>
            <p style='font-size:18px; margin-bottom:15px;'>✅ Registered successfully! You can now log in.</p>
            <button onclick=\"openModal('forms/loginForm.php')\" class='btn-approve'>Go to Login</button>
          </div>";
} else {
    echo "<div style='text-align:center; padding:20px;'>
            <p style='color:red;'>❌ Registration failed. The email may already be in use.</p>
            <button onclick='closeModal()' class='btn-cancel'>Close</button>
          </div>";
}
?>