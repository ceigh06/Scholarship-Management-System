<script src="jquery-4.0.0.min.js"></script>
<script src="script.js"></script>
<link rel="stylesheet" href="style.css" />

<?php
    include_once 'conn.php';

    $first_name  = trim($_POST['first_name']);
    $middle_name = trim($_POST['middle_name']);
    $last_name   = trim($_POST['last_name']);
    $user_email  = trim($_POST['user_email']);
    $user_password = password_hash(trim($_POST['user_password']), PASSWORD_BCRYPT);

    $dbconn->query("INSERT INTO users (first_name, middle_name, last_name, user_email, user_password) 
    VALUES ('$first_name', '$middle_name', '$last_name', '$user_email', '$user_password')");

    echo "
        Student registered successfully.
        <button id='close-modal'>Close</button>
    ";
?>