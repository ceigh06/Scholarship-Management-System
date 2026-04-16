<div class="application-container">
  <div class="sidebar">
    <h2>Application Form</h2>
    <ul class="steps">
      <li class="active">1. Personal Information</li>
      <li>2. Academic Profile</li>
      <li>3. Submit</li>
    </ul>
  </div>

  <div class="form-panel">
    <form action="addApplication.php" method="post">
      <div class="form-group">
        <label>User ID</label>
        <input type="text" name="user_ID" required>
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
        <label>School</label>
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
        <label>Date Enrolled</label>
        <input type="date" name="date_enrolled" required>
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
        <button type="button" id="close-modal" class="btn-cancel" onclick="history.back()">Cancel</button>
      </div>
    </form>
  </div>
</div>