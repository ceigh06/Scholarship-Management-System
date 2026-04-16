<?php
include_once '../includes/conn.php';

$app_id = isset($_GET['app']) ? $_GET['app'] : '';

$stmt = $dbconn->prepare("SELECT a.*, u.first_name, u.middle_name, u.last_name
                          FROM application AS a
                          JOIN users AS u ON a.user_id = u.user_id
                          WHERE a.application_ID = ?");
$stmt->bind_param('s', $app_id);
$stmt->execute();
$app = $stmt->get_result()->fetch_assoc();
?>

<div class="modal-header">
    <h2>Application #<?= htmlspecialchars($app['application_ID']) ?></h2>
    <p class="applicant-name">
        <?= htmlspecialchars(trim($app['first_name'] . ' ' . $app['middle_name'] . ' ' . $app['last_name'])) ?>
    </p>
</div>

<div class="modal-body">
    <form action="process/statusProcess.php" method="post" class="view-form">
        <input type="hidden" name="application_id" value="<?= htmlspecialchars($app['application_ID']) ?>">

        <div class="form-group">
            <label>Address</label>
            <input type="text" value="<?= htmlspecialchars($app['applicant_address']) ?>" disabled>
        </div>
        <div class="form-group">
            <label>Birthdate</label>
            <input type="text" value="<?= htmlspecialchars($app['birthdate']) ?>" disabled>
        </div>
        <div class="form-group">
            <label>Combined Annual Income</label>
            <input type="text" value="<?= htmlspecialchars($app['combined_annual_gross_income']) ?>" disabled>
        </div>
        <div class="form-group">
            <label>Gender</label>
            <input type="text" value="<?= htmlspecialchars($app['gender']) ?>" disabled>
        </div>
        <div class="form-group">
            <label>Enrolled University</label>
            <input type="text" value="<?= htmlspecialchars($app['school']) ?>" disabled>
        </div>
        <div class="form-group">
            <label>GWA</label>
            <input type="text" value="<?= htmlspecialchars($app['gwa']) ?>" disabled>
        </div>
        <div class="form-group">
            <label>Eligibility</label>
            <input type="text" value="<?= htmlspecialchars($app['eligibility']) ?>" disabled>
        </div>
        <div class="form-group">
            <label>Current Status</label>
            <input type="text" value="<?= htmlspecialchars($app['applicant_status']) ?>" disabled>
        </div>

        <div class="modal-actions full-width">
            <button type="submit" name="status" value="Approved" class="btn-approve">Approve</button>
            <button type="submit" name="status" value="Rejected" class="btn-reject">Reject</button>
            <button type="button" onclick="closeModal()" class="btn-cancel">Cancel</button>
        </div>
    </form>
</div>