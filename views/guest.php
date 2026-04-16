<!-- guest.php now provides the full page wrapper -->
<header class="header">
    <img src="assets/images/GKSLogo.png" alt="Foundation Logo" class="logo">
    <h1>
        Diwa ng Bayani Foundation<br>
        Gintong Kabataan Scholarship<br>
        Online Application
    </h1>
</header>

<nav class="nav">
    <div class="RegLog-btn">
        <a href="#" onclick="loadPage('scholarshipDetails.php')">Check Scholarship Details</a>
        <a href="#" onclick="loadPage('partials/viewFAQs.php')">FAQs</a>
    </div>
</nav>

<main class="form-container" id="content-area">
    <!-- loginForm.php gets injected here -->
</main>

<footer class="footer">
    <p>© Copyright 2026. Powered by BSIT 2AG2 Group 2</p>
    <button onclick="location.href='mailto:piaamandarebuelta@gmail.com'">Contact Us</button>
</footer>

<div id="bg-modal"></div>
<div id="modal"></div>

<script>
    // Initial load after DOM is ready
    document.addEventListener('DOMContentLoaded', function () {
        loadPage('forms/loginForm.php');
    });
</script>