<body>
    <header class="header">
        <img src="GKSLogo.png" alt="Foundation Logo" class="logo">
        <h1>
            Diwa ng Bayani Foundation<br>
            Gintong Kabataan Scholarship<br>
            Online Application
        </h1>
    </header>


    <div class="content-wrapper">
        <div class="content" id="content-area">
            <!-- Partials load here -->
        </div>
    </div>

    <div id="bg-modal"></div>
    <div id="modal"></div>

    <footer class="footer">
        <p> © Copyright 2026. Powered by BSIT 2AG2 Group 2
        <p>
            <button onclick="location.href='mailto:piaamandarebuelta@gmail.com'">Contact Us</button>
    </footer>
    <a href="index.php?logout=1">Logout</a>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            loadPage('partials/studentHome.php');
        });
    </script>