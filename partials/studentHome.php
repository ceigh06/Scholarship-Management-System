<?php
include_once __DIR__ . '/../includes/conn.php';
// $student_number=$_GET['sno'];
$studentResult = $dbconn->query('select * from users');
$student = $studentResult->fetch_assoc();
?>

<?php
include_once __DIR__ . '/../includes/conn.php';
// $student_number=$_GET['sno'];
$studentResult = $dbconn->query('select * from users');
$student = $studentResult->fetch_assoc();
?>

<?php
include_once __DIR__ . '/../includes/conn.php';
$scholarshipResult = $dbconn->query('select * from scholarships');
$scholarship = $scholarshipResult->fetch_assoc();
?>

<div class="description">
    <p>
        Gintong Kabataan Scholarship is the flagship scholarship program of the Diwa ng Bayani Foundation that<br>
        accepts applications from second year college students in the province of Bulacan. The program provides<br>
        educational financial assistance to deserving Bulakenyo students pursuing their college education.
    </p>
</div>

<div class="criteria-container">
    <div class="indexCriteria" onclick="loadPage('partials/eligibilityDetails.php');">
        Eligibility
    </div>

    <div class="indexCriteria" onclick="loadPage('partials/benefitDetails.php');">
        Benefits
    </div>
</div>

<div class="apply">
    <div class="apply-btn" onclick="openModal('forms/applicationForm.php');">
        Apply Now!
    </div>
</div>