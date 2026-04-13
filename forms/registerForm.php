<script src="jquery-4.0.0.min.js"></script>
<script src="script.js"></script>
<link rel="stylesheet" href="style.css"/>
<div class="content" id="content-area">
<form action="addStudentUser.php" method="post">
    First Name: <input type="text" name="first_name" required><br>
    Middle Name: <input type="text" name="middle_name" ><br>
    Last Name: <input type="text" name="last_name" required><br>
    Email: <input type="email" name="user_email" required><br>
    Password: <input type="password" name="user_password" required><br>

    <input type="submit" name="submit" value="Register"><br>
</form>
<p>Already have an account? - Login <a href="loginForm">here</a></p>
</div>