<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
$user_ID = $_SESSION['user_ID'] ?? '';
?>



<div class="form-panel">
  <form action="process/addApplication.php" method="post">
    <input type="hidden" name="user_ID" value="<?= htmlspecialchars($user_ID) ?>">

    <!-- Optional: Show User ID as read-only text -->
    <div class="form-group">
      <label>User ID</label>
      <input type="text" value="<?= htmlspecialchars($user_ID) ?>" disabled style="background-color: #e9ecef;">
    </div>

    <div class="form-group">
      <label>Gender</label>
      <select name="gender" required>
        <option>Male</option>
        <option>Female</option>
      </select>
    </div>

    <div class="form-group">
      <label>Birthdate</label>
      <input type="date" name="birthdate" required>
    </div>

    <div class="form-group">
      <label>Applicant Email</label>
      <input type="email" name="applicant_email" required>
    </div>

    <div class="form-group">
      <label>Applicant Address</label>
      <input type="text" name="applicant_address" required>
    </div>

    <div class="form-group">
      <label>Contact Number</label>
      <input type="text" name="contact_number" required>
    </div>

    <div class="form-group">
      <label>Enrolled University/College</label>
      <input type="text" name="school" required>
    </div>

    <div class="form-group">
      <label>Program</label>
      <input type="text" name="program" required>
    </div>

    <div class="form-group">
      <label>School Year</label>
      <input type="text" name="school_year" required>
    </div>

    <div class="form-group">
      <label>Year Level</label>
      <select name="year_level">
        <option>1st Year</option>
        <option>2nd Year</option>
        <option>3rd Year</option>
        <option>4th Year</option>
      </select>
    </div>

    <div class="form-group">
      <label>GWA</label>
      <input type="number" step="0.01" name="gwa" required>
    </div>

    <div class="form-group">
      <label>Combined Annual Gross Income</label>
      <input type="number" step="0.01" name="combined_annual_gross_income" required>
    </div>

    <div class="form-actions">
      <input type="submit" name="submit" value="Submit" class="btn-submit">
      <button type="button" id="close-modal" class="btn-cancel" onclick="closeModal()">Cancel</button>
    </div>
  </form>