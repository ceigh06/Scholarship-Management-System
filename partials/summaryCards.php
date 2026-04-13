<?php
include_once "conn.php";

$totalApplications = $dbconn->query("SELECT COUNT(*) as total FROM application")->fetch_assoc()["total"];
$totalApproved     = $dbconn->query("SELECT COUNT(*) as total FROM application WHERE applicant_status = 'Approved'")->fetch_assoc()["total"];
$totalPending      = $dbconn->query("SELECT COUNT(*) as total FROM application WHERE applicant_status = 'Pending'")->fetch_assoc()["total"];
$totalRejected     = $dbconn->query("SELECT COUNT(*) as total FROM application WHERE applicant_status = 'Rejected'")->fetch_assoc()["total"];

$data = array(
    "total"    => $totalApplications,
    "approved" => $totalApproved,
    "pending"  => $totalPending,
    "rejected" => $totalRejected
);

header("Content-Type: application/json");
echo json_encode($data);
?>