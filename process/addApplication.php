<?php
include_once '../includes/conn.php';

$user_ID = trim($_POST['user_ID']);
$gender = trim($_POST['gender']);
$birthdate = trim($_POST['birthdate']);
$applicant_email = trim($_POST['applicant_email']);
$applicant_address = trim($_POST['applicant_address']);
$contact_number = trim($_POST['contact_number']);
$school = trim($_POST['school']);
$program = trim($_POST['program']);
$school_year = trim($_POST['school_year']);
$gwa = floatval($_POST['gwa']);
$combined_annual_gross_income = floatval($_POST['combined_annual_gross_income']);

// ── Server-side validation (backup security) ───────────────────────────────
$income_too_high = $combined_annual_gross_income > 350000;
$not_second_year = strtolower(trim($school_year)) !== '2nd year';
$gwa_too_low = $gwa > 2;
$not_bulacan = stripos($applicant_address, 'bulacan') === false;

if ($income_too_high || $not_second_year || $gwa_too_low || $not_bulacan) {
    // Redirect back with error - should rarely happen due to client-side check
    header('Location: ../index.php?error=not_eligible');
    exit;
}

$eligibility = 'Qualified';
$status = 'Pending';

// Use prepared statement for security
$stmt = $dbconn->prepare("INSERT INTO application 
    (user_ID, gender, birthdate, applicant_email, applicant_address, contact_number, school, program, school_year, gwa, combined_annual_gross_income, eligibility, scholarship_ID, applicant_status) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'SCH0001', ?)");
    
$stmt->bind_param("sssssssssdsss", $user_ID, $gender, $birthdate, $applicant_email, $applicant_address, $contact_number, $school, $program, $school_year, $gwa, $combined_annual_gross_income, $eligibility, $status);
$stmt->execute();
$stmt->close();

header('Location: ../index.php?success=application_submitted');
exit;
?>