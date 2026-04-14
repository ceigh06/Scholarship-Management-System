<?php
include_once '../includes/conn.php';
$app_id = $_GET['app'];

$applicationResult = $dbconn->query("SELECT a.*, u.* FROM application as a JOIN users as u on a.user_id=u.user_id WHERE a.application_ID='$app_id'");
$applications = $applicationResult->fetch_assoc();
?>
<div class="modal-header">
    <h2>Application ID<?php echo $applications['application_ID']; ?></h2>
    <p class="applicant-name">
        <?php echo $applications['first_name'] . ' ' . $applications['middle_name'] . ' ' . $applications['last_name']; ?>
    </p>
</div>

<div class="modal-body">
    <form action="statusProcess.php" method="post" class="view-form">

        <div class="form-group">
            <label>Address</label>
            <input type="text" value="<?php echo $applications['applicant_address'] ?>" disabled>
        </div>

        <div class="form-group">
            <label>Birthdate</label>
            <input type="text" value="<?php echo $applications['birthdate'] ?>" disabled>
        </div>

        <div class="form-group">
            <label>Combined Annual Salary</label>
            <input type="text" value="<?php echo $applications['combined_annual_gross_income'] ?>" disabled>
        </div>

        <div class="form-group">
            <label>Gender</label>
            <input type="text" value="<?php echo $applications['gender'] ?>" disabled>
        </div>

        <div class="form-group">
            <label>Enrolled University</label>
            <input type="text" value="<?php echo $applications['school'] ?>" disabled>
        </div>

        <div class="form-group">
            <label>GWA</label>
            <input type="text" value="<?php echo $applications['gwa'] ?>" disabled>
        </div>

        <div class="form-group">
            <label>Eligibility</label>
            <input type="text" value="<?php echo $applications['eligibility'] ?>" disabled>
        </div>

        <div class="form-group">
            <label>Status</label>
            <input type="text" value="<?php echo $applications['applicant_status'] ?>" disabled>
        </div>

        <input type="hidden" name="application_id" value="<?php echo $applications['application_ID'] ?>">

        <!-- this is a simple version lang for me to text the UI -->
        <div class="modal-actions">
            <button type="submit" name="status" value="Approved" class="btn-approve">Approve</button>
            <button type="submit" name="status" value="Rejected" class="btn-reject">Reject</button>
            <button type="button" onclick="closeModal()" class="btn-cancel">Cancel</button>
        </div>
    </form>
</div>