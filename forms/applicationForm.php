<script src="jquery-4.0.0.min.js"></script>
<script src="script.js"></script>
<link rel="stylesheet" href="style.css"/>

<form action="addApplication.php" method="post">
    User ID: <input type="text" name="user_ID" required>
    <br>
    Gender:
    <select name="gender">
        <option>Male</option>
        <option>Female</option>
    </select>
    <br>
    
    Birthdate: <input type="date" name="birthdate" required>
    <br>
    Applicant Email: <input type="text" name="applicant_email" required>
    <br>
    Applicant Address: <input type="text" name="applicant_address" required>
    <br>
    Contact Number: <input type="text" name="contact_number" required>
    <br>

    <br>
     School: <input type="text" name="school" required>
    <br>
    Program: <input type="text" name="program" required>
    <br>
    School Year: <input type="text" name="school_year" required>
    <br>
    Date Enrolled: <input type="date" name="date_enrolled" required>
    <br>
    <br>
    
    GWA: <input type="number" step="0.01" name="gwa" required>
    <br>
    Combined Annual Gross Income: <input type="number" step="0.01" name="combined_annual_gross_income" required>
    <br>
    

    <input type="submit" name="submit" value="Submit">
    <br>
    <button type="button" id="close-modal">Cancel</button>
</form>