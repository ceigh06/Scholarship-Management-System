<div class="form-box">
    <h1>Create Account</h1>
    <form action="process/addStudentUser.php" method="post">

        <div class="name-row">
            <div class="name-field">
                <label>First Name</label>
                <input type="text" name="first_name" required>
            </div>
            <div class="name-field">
                <label>Middle Name</label>
                <input type="text" name="middle_name">
            </div>
            <div class="name-field">
                <label>Last Name</label>
                <input type="text" name="last_name" required>
            </div>
        </div>

        <label>Email</label>
        <input type="email" name="user_email" required><br>

        <label>Password</label>
        <input type="password" name="user_password" id="reg-password" required><br>

        <label>Confirm Password</label>
        <input type="password" id="reg-confirm" required><br>

        <p id="pw-error" style="color:red; font-size:13px; display:none; margin-top:-8px; margin-bottom:8px;">
            ⚠️ Passwords do not match.
        </p>

        <input type="submit" name="submit" value="Register"><br>
    </form>
    <p>Already have an account? – <a href="#" onclick="loadPage('forms/loginForm.php')">Login here</a></p>
</div>

<script>
    (function () {
        var form = document.querySelector('.form-box form');
        if (form) {
            form.addEventListener('submit', function (e) {
                var pw = document.getElementById('reg-password').value;
                var cpw = document.getElementById('reg-confirm').value;
                var err = document.getElementById('pw-error');
                if (pw !== cpw) {
                    e.preventDefault();
                    err.style.display = 'block';
                } else {
                    err.style.display = 'none';
                }
            });
        }
    })();
</script>