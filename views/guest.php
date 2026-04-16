<header class="header">
    <img src="assets/images/GKSLogo.png" alt="Foundation Logo" class="logo">
    <h1>
        Diwa ng Bayani Foundation<br>
        Gintong Kabataan Scholarship<br>
        Online Application
    </h1>
</header>

<nav class="nav">
    <ul id="guest-nav-links">
        <li><a href="#" onclick="loadPage('scholarshipDetails.php', this)">Scholarship Details</a></li>
        <li><a href="#" onclick="loadPage('partials/viewFAQs.php', this)">FAQs</a></li>
    </ul>
    <div class="RegLog-btn" id="guest-auth-btns">
        <a href="#" onclick="loadPage('forms/loginForm.php', null); setAuthState('login')">Login</a>
        <a href="#" onclick="loadPage('forms/registerForm.php', null); setAuthState('register')">Register</a>
    </div>
</nav>

<!-- Background image for guest/login page -->
<div id="bgPic"></div>

<main class="form-container" id="content-area">
    <!-- loginForm.php / registerForm.php gets injected here -->
</main>

<footer class="footer">
    <p>© Copyright 2026. Powered by BSIT 2AG2 Group 2</p>
    <button onclick="window.location.href='mailto:piaamandarebuelta@gmail.com'">Contact Us</button>
</footer>
<div id="bg-modal"></div>
<div id="modal">
    <div id="modal-content"></div>
</div>


<script>
    function setAuthState(mode) {
        var loginBtn = document.querySelector('.RegLog-btn a:nth-child(1)');
        var regBtn = document.querySelector('.RegLog-btn a:nth-child(2)');
        if (!loginBtn || !regBtn) return;
        loginBtn.classList.toggle('active', mode === 'login');
        regBtn.classList.toggle('active', mode === 'register');
    }

    document.addEventListener('DOMContentLoaded', function () {
        loadPage('forms/loginForm.php');
        setAuthState('login');
    });
</script>