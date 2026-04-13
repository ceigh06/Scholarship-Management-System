

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
    <h3>Application Not found</h3>
    <p>We are unable to locate your application in our system. Your application no longer exists. This may occur if your submission was withdrawn, deleted prior to the review deadline, or if incomplete applications were removed following the close of the application period.

Please verify that you are logged into the correct account. If you believe this message was received in error, contact our support team at diwangbayani@gmail.com with your full name and the email address used during registration.</p>
 </div>
    <div id="bg-modal"></div>
    <div id="modal"></div>
