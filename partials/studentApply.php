<div id="content-area">
    <?php
        include_once 'conn.php';
        // $student_number=$_GET['sno'];
        $reqResult=$dbconn->query('select * from scholarships_requirements');
        $requirements=$reqResult->fetch_all(MYSQLI_ASSOC);  
    ?>

    <?php
        include_once 'conn.php';
        // $student_number=$_GET['sno'];
        $studentResult=$dbconn->query('select * from users');
        $student=$studentResult->fetch_assoc();   
    ?>
    
    <?php
        include_once 'conn.php';
        $scholarshipResult=$dbconn->query('select * from scholarships');
        $scholarship=$scholarshipResult->fetch_assoc();   
    ?>
    

         <?php echo "{$scholarship['scholarship_name']}";?>
         <br>
         <?php echo "{$scholarship['description']}";?>


         <a href="eligibilityDetails.php"><h2>Eligibility</h2></a>


        <a href="benefitDetails.php"><h2>Benefits</h2></a>


<div class="applyProcess">
<h2>Application Process</h2>
    <div>
        <h4>
            Valid and Secured Email Address
        </h4>
        <p>
            Valid email address is needed for logging in to your application account.
        </p>
    </div>
    <div>
        <h4>
            Security of Access Credentials
        </h4>
        <p>
            Your User ID and personal info will serve as your login. Keep them secure.
        </p>
    </div>
    <div>
        <h4>
            No to multiple accounts!
        </h4>
        <p>
            Do not create multiple accounts. This will delay your access to your application forms.
        </p>
    </div>
    
</div>
<!-- for js, make the dates into long readable format  (january 1, 2026) -->
<div class="sched">
    <h2>Schedule</h2>
    Opening Date
    <br>
    <?php echo "{$scholarship['opening_date']}";?>
    <br>
Closing Date
<br>
<?php echo "{$scholarship['closing_date']}";?>
<br>
Announcement of New Scholars
<br>
<?php echo "{$scholarship['announcement_of_new_scholars']}";?>
<br>
<div>
    <button onclick="addApplication()">Apply</button>
</div>

    <div id="bg-modal"></div>
    <div id="modal"></div>
</div>