<?php
include_once '../includes/conn.php';
$app_id = $_GET['app'];

$applicationResult = $dbconn->query("SELECT a.*, u.* FROM application as a JOIN users as u on a.user_id=u.user_id WHERE a.application_ID='$app_id'");
$applications = $applicationResult->fetch_assoc();
?>

<div class="modal-header">
    <h2>Edit Application #<?php echo $applications['application_ID']; ?></h2>
    <p class="applicant-name">
        <?php echo $applications['first_name'] . ' ' . $applications['middle_name'] . ' ' . $applications['last_name']; ?>
    </p>
</div>

<div class="modal-body">
    <form action="editProcess.php" method="post" class="view-form">
        <label>Address</label>
        <input type="text" name="applicant_address" value="<?php echo $applications['applicant_address'] ?>">

        <label>Birthdate</label>
        <input type="date" name="birthdate" value="<?php echo $applications['birthdate'] ?>">

        <label>Application Date</label>
        <input type="date" name="application_date" value="<?php echo $applications['application_date'] ?>">

        <label>Combined Annual Salary</label>
        <input type="text" name="combined_annual_gross_income"
            value="<?php echo $applications['combined_annual_gross_income'] ?>">

        <label>Gender</label>
        <div class="select-wrapper">
            <select name="gender">
                <?php
                $genders = ['Male', 'Female'];
                foreach ($genders as $gender) {
                    $selected = ($applications['gender'] == $gender) ? 'selected' : '';
                    echo "<option value='$gender' $selected>$gender</option>";
                }
                ?>
            </select>
        </div>

        <label>Enrolled University</label>
        <input type="text" name="school" value="<?php echo $applications['school'] ?>">

        <label>GWA</label>
        <input type="text" name="gwa" value="<?php echo $applications['gwa'] ?>">

        <label>Eligibility</label>
        <div class="select-wrapper">
            <select name="eligibility">
                <?php
                $eligibilities = ['Qualified', 'Not Qualified'];
                foreach ($eligibilities as $eligibility) {
                    $selected = ($applications['eligibility'] == $eligibility) ? 'selected' : '';
                    echo "<option value='$eligibility' $selected>$eligibility</option>";
                }
                ?>
            </select>
        </div>

        <label>Status</label>
        <div class="select-wrapper">
            <select name="applicant_status">
                <?php
                $statuses = ['Pending', 'Approved', 'Rejected'];
                foreach ($statuses as $status) {
                    $selected = ($applications['applicant_status'] == $status) ? 'selected' : '';
                    echo "<option value='$status' $selected>$status</option>";
                }
                ?>
            </select>
        </div>

        <input type="hidden" name="application_id" value="<?php echo $applications['application_ID'] ?>">

        <div class="modal-actions">
            <button type="submit" class="btn-approve">Save Changes</button>
            <button type="button" onclick="closeModal()" class="btn-cancel">Cancel</button>
        </div>
    </form>
</div>