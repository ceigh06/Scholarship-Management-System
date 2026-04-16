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
$date_enrolled = trim($_POST['date_enrolled']);
$gwa = trim($_POST['gwa']);
$combined_annual_gross_income = trim($_POST['combined_annual_gross_income']);

$dbconn->query("INSERT INTO application (user_ID, gender, birthdate, applicant_email, applicant_address, contact_number, school, program, school_year, date_enrolled, gwa, combined_annual_gross_income, eligibility, scholarship_ID) 
    VALUES ('$user_ID', '$gender', '$birthdate', '$applicant_email', '$applicant_address', '$contact_number', '$school', '$program', '$school_year', '$date_enrolled', '$gwa', '$combined_annual_gross_income','Qualified', 'SCH0001')");

echo "<script>window.location.href = '../index.php';</script>";
?>