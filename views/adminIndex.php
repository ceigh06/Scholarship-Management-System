<header class="header">
    <img src="assets/images/GKSLogo.png" alt="Foundation Logo" class="logo">
    <h1>
        Diwa ng Bayani Foundation<br>
        Gintong Kabataan Scholarship<br>
        Online Application
    </h1>

    <button class="logOutBtn" onclick="window.location.href='index.php?logout=1'">Log out</button>
</header>

<div class="nav">
    <ul>
        <li><a href="#" onclick="loadPage('partials/dashboard.php')">Dashboard</a></li>
        <li><a href="#" onclick="loadPage('partials/applications.php')">Applications</a></li>
    </ul>
</div>



<!-- THIS is the only content area. Everything swaps in here. -->
<div id="content-area"></div>
<div id="bg-modal"></div>
<div id="modal">
    <div id="modal-content"></div>
</div>