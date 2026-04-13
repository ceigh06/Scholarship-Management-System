<?php
include_once 'conn.php';

$application_id = $_POST['application_id'];
$status = $_POST['status'];

$dbconn->query("UPDATE application SET applicant_status='$status' WHERE application_ID='$application_id'");

header("Location: applications.php");
?>