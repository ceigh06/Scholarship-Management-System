<script src="jquery-4.0.0.min.js"></script>
<script src="script.js"></script>
<link rel="stylesheet" href="style.css" />

<?php
    session_start();
    include_once 'conn.php';

    $user_email    = trim($_POST['user_email']);
    $user_password = trim($_POST['user_password']);

    $result = $dbconn->query("SELECT * FROM users WHERE user_email = '$user_email'");
    $user   = $result->fetch_assoc();

    if ($user && password_verify($user_password, $user['user_password'])) {
        $_SESSION['user_id']    = $user['id'];
        $_SESSION['user_email'] = $user['user_email'];
        $_SESSION['roles']       = $user['roles'];

        if ($user['roles'] == 'Admin') {
            header("Location: adminIndex.php");
        } else {
            header("Location: studentIndex.php");
        }
        exit();
    } else {
        echo "Invalid email or password.
        <br><a href='loginForm.php'>Go back</a>";
    }
?>