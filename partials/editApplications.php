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
    <h2>Edit Application #<?= htmlspecialchars($app['application_ID']) ?></h2>
    <p class="applicant-name">
        <?= htmlspecialchars(trim($app['first_name'] . ' ' . $app['middle_name'] . ' ' . $app['last_name'])) ?>
    </p>
</div>

<div class="modal-body">
    <form action="process/editProcess.php" method="post" class="view-form">
        <input type="hidden" name="application_id" value="<?= htmlspecialchars($app['application_ID']) ?>">

        <div class="form-group">
            <label>First Name</label>
            <input type="text" name="first_name" value="<?= htmlspecialchars($app['first_name']) ?>">
        </div>
        <div class="form-group">
            <label>Middle Name</label>
            <input type="text" name="middle_name" value="<?= htmlspecialchars($app['middle_name']) ?>">
        </div>
        <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="last_name" value="<?= htmlspecialchars($app['last_name']) ?>">
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="applicant_address" value="<?= htmlspecialchars($app['applicant_address']) ?>">
        </div>
        <div class="form-group">
            <label>Birthdate</label>
            <input type="date" name="birthdate" value="<?= htmlspecialchars($app['birthdate']) ?>">
        </div>
        <div class="form-group">
            <label>Application Date</label>
            <input type="date" name="application_date" value="<?= htmlspecialchars($app['application_date']) ?>">
        </div>
        <div class="form-group">
            <label>Combined Annual Income</label>
            <input type="number" step="0.01" name="combined_annual_gross_income"
                value="<?= htmlspecialchars($app['combined_annual_gross_income']) ?>">
        </div>
        <div class="form-group">
            <label>Gender</label>
            <div class="select-wrapper">
                <select name="gender">
                    <?php foreach (['Male', 'Female'] as $gender): ?>
                        <option value="<?= $gender ?>" <?= $app['gender'] === $gender ? 'selected' : '' ?>>
                            <?= $gender ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label>Enrolled University</label>
            <input type="text" name="school" value="<?= htmlspecialchars($app['school']) ?>">
        </div>
        <div class="form-group">
            <label>GWA</label>
            <input type="number" step="0.01" name="gwa" value="<?= htmlspecialchars($app['gwa']) ?>">
        </div>
        <div class="form-group">
            <label>Eligibility</label>
            <div class="select-wrapper">
                <select name="eligibility">
                    <?php foreach (['Qualified', 'Not Qualified'] as $eligibility): ?>
                        <option value="<?= $eligibility ?>" <?= $app['eligibility'] === $eligibility ? 'selected' : '' ?>>
                            <?= $eligibility ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label>Status</label>
            <div class="select-wrapper">
                <select name="applicant_status">
                    <?php foreach (['Pending', 'Approved', 'Rejected'] as $status): ?>
                        <option value="<?= $status ?>" <?= $app['applicant_status'] === $status ? 'selected' : '' ?>>
                            <?= $status ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="modal-actions full-width">
            <button type="submit" class="btn-approve">Save Changes</button>
            <button type="button" onclick="closeModal()" class="btn-cancel">Cancel</button>
        </div>
    </form>
</div>