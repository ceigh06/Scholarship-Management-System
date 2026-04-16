<?php
include_once '../includes/conn.php';

$application_ID = isset($_GET['app']) ? $_GET['app'] : '';

$stmt = $dbconn->prepare("DELETE FROM application WHERE application_ID = ?");
$stmt->bind_param('s', $application_ID);

if ($stmt->execute()) {
        echo "<div style='text-align:center; padding:20px;'>
            <p style='font-size:18px; margin-bottom:15px;'>✅ Application deleted successfully.</p>
            <button onclick=\"loadPage('partials/applications.php'); closeModal();\" class='btn-approve'>Back to Applications</button>
          </div>";
} else {
        echo "<div style='text-align:center; padding:20px;'>
            <p style='color:red;'>❌ Failed to delete application.</p>
            <button onclick='closeModal()' class='btn-cancel'>Close</button>
          </div>";
}
?>