<?php
include_once '../includes/conn.php';

$totalApplications = $dbconn->query("SELECT COUNT(*) as total FROM application")->fetch_assoc()['total'];
$totalApproved = $dbconn->query("SELECT COUNT(*) as total FROM application WHERE applicant_status = 'Approved'")->fetch_assoc()['total'];
$totalPending = $dbconn->query("SELECT COUNT(*) as total FROM application WHERE applicant_status = 'Pending'")->fetch_assoc()['total'];
$totalRejected = $dbconn->query("SELECT COUNT(*) as total FROM application WHERE applicant_status = 'Rejected'")->fetch_assoc()['total'];
?>

<div class="dashboard-container">
    <div class="top-section">
        <div class="stats-grid">
            <div class="stat-card stat-total">
                <h3>No. of Applications</h3>
                <div class="number"><?= $totalApplications ?></div>
            </div>
            <div class="stat-card stat-approved">
                <h3>Approved</h3>
                <div class="number"><?= $totalApproved ?></div>
            </div>
            <div class="stat-card stat-pending">
                <h3>Pending</h3>
                <div class="number"><?= $totalPending ?></div>
            </div>
            <div class="stat-card stat-rejected">
                <h3>Rejected</h3>
                <div class="number"><?= $totalRejected ?></div>
            </div>
        </div>

        <div class="quick-actions">
            <h3>Quick Actions</h3>
            <!-- IBAHIN TO AH NOTE TO CHETYDRL -->
            <a href="#" onclick="openModal('forms/applicationForm.php')" class="action-btn">Add Scholarships</a>
            <a href="#" onclick="loadPage('partials/applications.php')" class="action-btn">Approve Scholarships</a>
        </div>
    </div>

    <div class="charts-section">
        <div class="chart-container">
            <h4>Application Trends</h4>
            <div class="chart-placeholder"><span>No chart data yet</span></div>
        </div>
        <div class="chart-container">
            <h4>Status Distribution</h4>
            <div class="chart-placeholder"><span>No chart data yet</span></div>
        </div>
    </div>
</div>