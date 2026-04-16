<?php
session_start();
include_once '../includes/conn.php';

$user_id = $_SESSION['user_ID'];

$scholarshipResult = $dbconn->query('SELECT * FROM scholarships LIMIT 1');
$scholarship = $scholarshipResult->fetch_assoc();

$reqResult = $dbconn->query('SELECT * FROM scholarships_requirements');
$requirements = $reqResult->fetch_all(MYSQLI_ASSOC);

// Check if student already has an application
$appCheck = $dbconn->prepare("SELECT applicant_status FROM application WHERE user_id = ?");
$appCheck->bind_param('i', $user_id);
$appCheck->execute();
$existingApp = $appCheck->get_result()->fetch_assoc();
?>

<div class="student-apply-container">
    <div class="scholarship-header">
        <h2><?= htmlspecialchars($scholarship['scholarship_name']) ?></h2>
        <p><?= htmlspecialchars($scholarship['description']) ?></p>
    </div>

    <div class="criteria-container">
        <div class="indexCriteria" onclick="loadPage('partials/eligibilityDetails.php')">
            Eligibility
        </div>
        <div class="indexCriteria" onclick="loadPage('partials/benefitDetails.php')">
            Benefits
        </div>
    </div>

    <div class="applyProcess">
        <h2>Application Process</h2>
        <div class="process-card">
            <h4>Valid and Secured Email Address</h4>
            <p>A valid email address is needed for logging in to your application account.</p>
        </div>
        <div class="process-card">
            <h4>Security of Access Credentials</h4>
            <p>Your User ID and personal info will serve as your login. Keep them secure.</p>
        </div>
        <div class="process-card">
            <h4>No to Multiple Accounts!</h4>
            <p>Do not create multiple accounts. This will delay your access to your application forms.</p>
        </div>
    </div>

    <div class="sched">
        <h2>Schedule</h2>
        <div class="schedule-grid">
            <div class="schedule-item">
                <h3><?= htmlspecialchars($scholarship['opening_date']) ?></h3>
                <p>Start of Online Application / Registration Period</p>
            </div>
            <div class="schedule-item">
                <h3><?= htmlspecialchars($scholarship['closing_date']) ?></h3>
                <p>Last Day of Submission of Application</p>
            </div>
            <div class="schedule-item">
                <h3><?= htmlspecialchars($scholarship['announcement_of_new_scholars']) ?></h3>
                <p>Announcement of New Scholars</p>
            </div>
        </div>
    </div>

    <?php if (!$existingApp): ?>
        <div class="apply">
            <div class="apply-btn" onclick="openModal('forms/applicationForm.php')">Apply Now!</div>
        </div>
    <?php else: ?>
        <div class="apply">
            <p style="font-size:18px; color:#5a199b; font-weight:600;">
                Your application status: <strong><?= htmlspecialchars($existingApp['applicant_status']) ?></strong>
            </p>
        </div>
    <?php endif; ?>
</div>