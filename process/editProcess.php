<?php
include_once 'conn.php';

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

// get the user_id first
$result = $dbconn->query("SELECT user_id FROM application WHERE application_ID='$application_id'");
$row = $result->fetch_assoc();
$user_id = $row['user_id'];

// update users table
$dbconn->query("UPDATE users SET first_name='$first_name', middle_name='$middle_name', last_name='$last_name' WHERE user_id='$user_id'");

// update application table
$dbconn->query("UPDATE application SET application_date='$application_date',applicant_address='$applicant_address', birthdate='$birthdate', combined_annual_gross_income='$combined_annual_gross_income', school='$school', gwa='$gwa', eligibility='$eligibility', applicant_status='$applicant_status',gender='$gender' WHERE application_ID='$application_id'");
header("Location: applications.php");
?>