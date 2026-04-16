<!-- Only the form content, no <html>, <head>, <body>, or page structure -->


<div class="form-box">
    <h1>Login</h1>
    <form action="process/loginProcess.php" method="post">
        <label>Email</label>
        <input type="email" name="user_email" required><br>

        <label>Password</label>
        <input type="password" name="user_password" required><br>

        <input type="submit" name="submit" value="Login"><br>
    </form>
    <p>Don't have an account? – <a href="#" onclick="loadPage('forms/registerForm.php')">Sign up here</a></p>
</div>