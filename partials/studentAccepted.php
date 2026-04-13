

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
    <h3>Accepted</h3>
    <p>Congratulations! On behalf of the Diwa ng Bayani Foundation selection committee, we are delighted to inform you that you have been selected as a recipient of the Gintong Kabataan Scholarship.

Your application stood out among many highly qualified candidates, and we were deeply impressed by your academic achievements, leadership qualities, and commitment to academic excellence.

Welcome to the  Gintong Kabataan community. We look forward to supporting your educational journey.</p>
 </div>
    <div id="bg-modal"></div>
    <div id="modal"></div>
