

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

 <div>
    <h2>Welcome Back! <?php echo "{$student['first_name']} {$student['middle_name']} {$student['last_name']}";?></h2>
    <h3>Rejected</h3>
    <p>Thank you for your interest in the Gintong Kabataan Scholarship and for taking the time to submit your application. After careful consideration, we regret to inform you that we are unable to offer you a scholarship at this time.
    We received an exceptionally large number of highly qualified applicants this year, and the selection process was extremely competitive. Please know that this decision is not a reflection of your abilities, achievements, or potential.
    We encourage you to explore other scholarship opportunities and wish you the very best in your academic pursuits.</p>
 </div>
    <div id="bg-modal"></div>
    <div id="modal"></div>
