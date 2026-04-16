<div id="bg-modal"></div>

<div id="modal">
    <div class="modal-header">
        <h2>Login</h2>
        <p>Please enter your credentials</p>
    </div>

    <div class="modal-body">
        <div class="content" id="content-area">
            <form action="process/loginProcess.php" method="post">
                Email: <input type="email" name="user_email" required><br>
                Password: <input type="password" name="user_password" required><br>
                <input type="submit" name="submit" value="Login"><br>
            </form>
            <p>Don't have an account? - <a href="process/registerForm.php">Sign up here</a></p>
        </div>
    </div>
</div>

</body>