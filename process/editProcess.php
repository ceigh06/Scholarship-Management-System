<?php
include_once '../includes/conn.php';

$application_id = $_POST['application_id'];
$first_name = $_POST['first_name'];
$middle_name = $_POST['middle_name'];
$last_name = $_POST['last_name'];
$applicant_address = $_POST['applicant_address'];
$application_date = $_POST['application_date'];
$birthdate = $_POST['birthdate'];
$combined_annual_gross_income = $_POST['combined_annual_gross_income'];
$gender = $_POST['gender'];
$school = $_POST['school'];
$gwa = $_POST['gwa'];
$eligibility = $_POST['eligibility'];
$applicant_status = $_POST['applicant_status'];

// Get the user_id linked to this application
$stmt = $dbconn->prepare("SELECT user_id FROM application WHERE application_ID = ?");
$stmt->bind_param('s', $application_id);
$stmt->execute();
$row = $stmt->get_result()->fetch_assoc();
$user_id = $row['user_id'];

// Update the users table
$stmt = $dbconn->prepare("UPDATE users SET first_name = ?, middle_name = ?, last_name = ? WHERE user_id = ?");
$stmt->bind_param('sssi', $first_name, $middle_name, $last_name, $user_id);
$stmt->execute();

// Update the application table
$stmt = $dbconn->prepare("UPDATE application SET
    application_date = ?, applicant_address = ?, birthdate = ?,
    combined_annual_gross_income = ?, school = ?, gwa = ?,
    eligibility = ?, applicant_status = ?, gender = ?
    WHERE application_ID = ?");
$stmt->bind_param(
    'sssdssssss',
    $application_date,
    $applicant_address,
    $birthdate,
    $combined_annual_gross_income,
    $school,
    $gwa,
    $eligibility,
    $applicant_status,
    $gender,
    $application_id
);
$stmt->execute();

// Redirect back to the applications list inside the SPA
echo "<script>loadPage('partials/applications.php');</script>";
exit();
?>