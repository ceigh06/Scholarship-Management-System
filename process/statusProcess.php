<?php
include_once '../includes/conn.php';

$application_id = $_POST['application_id'];
$status = $_POST['status'];

$stmt = $dbconn->prepare("UPDATE application SET applicant_status = ? WHERE application_ID = ?");
$stmt->bind_param('ss', $status, $application_id);
$stmt->execute();

echo "<script>loadPage('partials/applications.php');</script>";
exit();
?>