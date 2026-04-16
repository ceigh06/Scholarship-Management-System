<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
include_once '../includes/conn.php';

$role = $_SESSION['roles'] ?? '';
$user_ID = $_SESSION['user_ID'] ?? '';

// If admin: load students who don't have an application yet
$students_without_app = [];
if ($role === 'Admin') {
  $res = $dbconn->query(
    "SELECT u.user_ID, u.first_name, u.middle_name, u.last_name
         FROM users AS u
         LEFT JOIN application AS a ON u.user_ID = a.user_ID
         WHERE u.roles = 'Student' AND a.user_ID IS NULL
         ORDER BY u.last_name, u.first_name"
  );
  if ($res) {
    while ($row = $res->fetch_assoc()) {
      $students_without_app[] = $row;
    }
  }
}
?>

<div class="form-panel">
  <form action="process/addApplication.php" method="post" id="applicationForm">

    <!-- USER ID: dropdown for admin, hidden field for student -->
    <div class="form-group">
      <label>Applicant</label>

      <?php if ($role === 'Admin'): ?>
        <?php if (empty($students_without_app)): ?>
          <p style="color: #888; font-style: italic;">All registered students already have an application.</p>
          <button type="button" onclick="closeModal()" class="btn-cancel" style="margin-top:10px;">Close</button>
        <?php else: ?>
          <select name="user_ID" id="user_ID" required>
            <option value="" disabled selected>— Select a student —</option>
            <?php foreach ($students_without_app as $s): ?>
              <?php
              $fullName = trim($s['first_name'] . ' ' . $s['middle_name'] . ' ' . $s['last_name']);
              ?>
              <option value="<?= htmlspecialchars($s['user_ID']) ?>">
                <?= htmlspecialchars($fullName) ?> (ID: <?= htmlspecialchars($s['user_ID']) ?>)
              </option>
            <?php endforeach; ?>
          </select>
        <?php endif; ?>

      <?php else: ?>
        <input type="hidden" name="user_ID" id="user_ID" value="<?= htmlspecialchars($user_ID) ?>">
        <input type="text" value="<?= htmlspecialchars($user_ID) ?>" disabled style="background-color:#e9ecef;">
      <?php endif; ?>
    </div>

    <?php if ($role !== 'Admin' || !empty($students_without_app)): ?>

      <div class="form-group">
        <label>Gender</label>
        <select name="gender" required>
          <option value="" disabled selected>— Select —</option>
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
        <label>Applicant Address <small style="font-weight:normal; color:#888;">(must be in Bulacan)</small></label>
        <input type="text" name="applicant_address" id="applicant_address" placeholder="e.g. Malolos, Bulacan" required>
      </div>

      <div class="form-group">
        <label>Contact Number</label>
        <input type="text" name="contact_number" required>
      </div>

      <div class="form-group">
        <label>Enrolled University / College</label>
        <input type="text" name="school" required>
      </div>

      <div class="form-group">
        <label>Program</label>
        <input type="text" name="program" required>
      </div>

      <div class="form-group">
        <label>Year Level <small style="font-weight:normal; color:#888;">(must be 2nd Year to qualify)</small></label>
        <select name="school_year" id="school_year" required>
          <option value="" disabled selected>— Select —</option>
          <option value="1st Year">1st Year</option>
          <option value="2nd Year">2nd Year</option>
          <option value="3rd Year">3rd Year</option>
          <option value="4th Year">4th Year</option>
        </select>
      </div>

      <div class="form-group">
        <label>GWA <small style="font-weight:normal; color:#888;">(must be ≤ 2.0 to qualify)</small></label>
        <input type="number" step="0.01" min="1" max="100" name="gwa" id="gwa" required>
      </div>

      <div class="form-group">
        <label>Combined Annual Gross Income <small style="font-weight:normal; color:#888;">(max ₱350,000 to
            qualify)</small></label>
        <input type="number" step="0.01" min="0" name="combined_annual_gross_income" id="combined_annual_gross_income"
          required>
      </div>

      <!-- Eligibility Status Display -->
      <div id="eligibilityStatus"
        style="padding: 15px; margin-bottom: 15px; border-radius: 5px; background-color: #fff3cd; color: #856404; border: 1px solid #ffeaa7;">
        <strong id="statusTitle">Fill in all eligibility fields to check qualification</strong>
        <div id="debugInfo" style="font-size: 0.8em; margin-top: 5px; color: #666;"></div>
        <ul id="eligibilityReasons" style="margin: 5px 0 0 20px; font-size: 0.9em;"></ul>
      </div>

      <div class="form-actions">
        <input type="submit" name="submit" value="Submit Application" class="btn-submit" id="submitBtn" disabled
          style="opacity: 0.5; cursor: not-allowed;">
        <button type="button" id="close-modal" class="btn-cancel" onclick="closeModal()">Cancel</button>
      </div>

    <?php endif; ?>
  </form>
</div>

<script>
  (function () {
    // Elements are already in DOM when this script runs (via setInnerHTMLWithScripts)
    const addressInput = document.getElementById('applicant_address');
    const yearInput = document.getElementById('school_year');
    const gwaInput = document.getElementById('gwa');
    const incomeInput = document.getElementById('combined_annual_gross_income');
    const submitBtn = document.getElementById('submitBtn');
    const statusDiv = document.getElementById('eligibilityStatus');
    const statusTitle = document.getElementById('statusTitle');
    const reasonsList = document.getElementById('eligibilityReasons');
    const debugInfo = document.getElementById('debugInfo');

    // Safety check - if elements not found, log error
    if (!addressInput || !yearInput || !gwaInput || !incomeInput) {
      console.error('Eligibility checker: Could not find all required inputs');
      return;
    }

    function checkEligibility() {
      const addressVal = addressInput.value;
      const yearVal = yearInput.value;
      const gwaVal = gwaInput.value;
      const incomeVal = incomeInput.value;

      debugInfo.innerHTML = `
            Address: "${addressVal}" | 
            Year: "${yearVal}" | 
            GWA: "${gwaVal}" | 
            Income: "${incomeVal}"
        `;

      const hasAddress = addressVal.trim() !== '';
      const hasYear = yearVal !== '';
      const hasGwa = gwaVal !== '';
      const hasIncome = incomeVal !== '';

      const allFilled = hasAddress && hasYear && hasGwa && hasIncome;

      if (!allFilled) {
        statusDiv.style.backgroundColor = '#fff3cd';
        statusDiv.style.color = '#856404';
        statusDiv.style.border = '1px solid #ffeaa7';
        statusTitle.textContent = 'Fill in all eligibility fields to check qualification';

        const missing = [];
        if (!hasAddress) missing.push('Address');
        if (!hasYear) missing.push('Year Level');
        if (!hasGwa) missing.push('GWA');
        if (!hasIncome) missing.push('Income');

        reasonsList.innerHTML = '<li>Missing: ' + missing.join(', ') + '</li>';
        submitBtn.disabled = true;
        submitBtn.style.opacity = '0.5';
        submitBtn.style.cursor = 'not-allowed';
        return;
      }

      const address = addressVal.toLowerCase();
      const year = yearVal.toLowerCase().trim();
      const gwa = parseFloat(gwaVal) || 0;
      const income = parseFloat(incomeVal) || 0;

      const reasons = [];

      if (!address.includes('bulacan')) {
        reasons.push('Address must contain "Bulacan"');
      }
      if (year !== '2nd year') {
        reasons.push('Must be 2nd Year');
      }
      if (gwa > 2) {
        reasons.push('GWA must be ≤ 2.0');
      }
      if (income > 350000) {
        reasons.push('Income must be ≤ ₱350,000');
      }

      const isEligible = reasons.length === 0;

      if (isEligible) {
        statusDiv.style.backgroundColor = '#d4edda';
        statusDiv.style.color = '#155724';
        statusDiv.style.border = '1px solid #c3e6cb';
        statusTitle.textContent = '✓ You are eligible to apply!';
        reasonsList.innerHTML = '';
        submitBtn.disabled = false;
        submitBtn.style.opacity = '1';
        submitBtn.style.cursor = 'pointer';
      } else {
        statusDiv.style.backgroundColor = '#f8d7da';
        statusDiv.style.color = '#721c24';
        statusDiv.style.border = '1px solid #f5c6cb';
        statusTitle.textContent = '✗ Not eligible:';
        reasonsList.innerHTML = reasons.map(r => `<li>${r}</li>`).join('');
        submitBtn.disabled = true;
        submitBtn.style.opacity = '0.5';
        submitBtn.style.cursor = 'not-allowed';
      }
    }

    // Attach listeners
    [addressInput, yearInput, gwaInput, incomeInput].forEach(input => {
      input.addEventListener('input', checkEligibility);
      input.addEventListener('change', checkEligibility);
    });

    // Initial check
    checkEligibility();
  })();
</script>