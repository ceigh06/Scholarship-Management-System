<header class="header">
    <img src="../assets/images/GKSLogo.png" alt="Foundation Logo" class="logo">
    <h1>
        Diwa ng Bayani Foundation<br>
        Gintong Kabataan Scholarship<br>
        Online Application
    </h1>
</header>

<nav class="nav">
    <div class="RegLog-btn">
        <a href="scholarshipDetails.php">Check Scholarship Details</a>
        <a href="viewFAQs.php">FAQs</a>
    </div>
</nav>

<main class="form-container">
    <div class="form-box">
        <h1>Login</h1>
        <form action="process/loginProcess.php" method="post">
            <label>Email</label>
            <input type="email" name="user_email" required><br>

            <label>Password</label>
            <input type="password" name="user_password" required><br>

            <input type="submit" name="submit" value="Login"><br>
        </form>
        <p>Don't have an account? – <a href="../process/registerForm.php">Sign up here</a></p>
    </div>
</main>

<footer class="footer">
    <p>© Copyright 2026. Powered by BSIT 2AG2 Group 2</p>
    <button onclick="location.href='mailto:piaamandarebuelta@gmail.com'">Contact Us</button>
</footer>


<div class="content" id="content-area"></div>
<div id="bg-modal"></div>
<div id="modal"></div>



<!-- <div id=headerLogin>
    <a href="scholarshipDetails.php">Check Scholarship Details</a>
    <a href="viewFAQs.php">FAQS</a>
</div>

<div id=bgPic>
    <img src="assets/images/bgPic.jpg" alt="background photo">
</div>


<script> // initial load
    openModal('forms/loginForm.php');
</script> -->