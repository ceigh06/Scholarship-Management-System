<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Admin</title>
</head>
<body>
    <header class="header">
        <img src="GKSLogo.png" alt="Foundation Logo" class="logo"> 
            <h1>
                Diwa ng Bayani Foundation<br>
                Gintong Kabataan Scholarship<br>
                Online Application
            </h1>
    </header>

    <div class="nav">
        <ul>
            <li><a href="adminIndex.php">Dashboard</a></li>
            <li><a href="applications.php">Application</a></li>
        </ul>
    </div>

    <div class="dashboard-container">
        <div class="top-section">
            <div class="stats-grid">
                <div class="stat-card">
                    <h3>No. of Applications</h3>
                    <div class="number">189</div><!-- php dapat to-->
                </div>
                
                <div class="stat-card">
                    <h3>Approved</h3>
                    <div class="number">80</div> <!-- php dapat to-->
                </div>
                
                <div class="stat-card">
                    <h3>Pending</h3>
                    <div class="number">56</div><!-- php dapat to-->
                </div>
                
                <div class="stat-card">
                    <h3>Rejected</h3>
                    <div class="number">53</div><!-- php dapat to-->
                </div>
            </div>
            
            <div class="quick-actions">
                <h3>Quick Actions</h3>
                <a href="#" class="action-btn">Approve Scholarships</a> <!-- how do you approve it? -->
                <a href="applications.php" class="action-btn">View Applications</a>
            </div>
            
        </div>
        
        <div class="charts-section">
            <div class="chart-container">
                <h4>Application Trends</h4>
                <div class="chart-placeholder">
                    <span>dito ilalagay yung line graph</span>
                </div>
            </div>
            
            <div class="chart-container">
                <h4>Distribution</h4>
                <div class="chart-placeholder">
                    <span>dito ka maglalagay ng donut chart</span>
                </div>
            </div>
        </div>
    </div>

    <!-- CONTENT AREA (AJAX loads pages here) -->
    <div class="content" id="content-area"></div>

    <!-- MODALS -->
    <div id="bg-modal"></div>
    <div id="modal"></div>
</body>
</html>