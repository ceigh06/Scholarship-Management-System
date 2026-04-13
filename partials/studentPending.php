

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
    <h3>Pending</h3>
    <p>Your application has been received and is currently pending review. Our scholarship committee is carefully evaluating all submissions, and we appreciate your patience during this process.

Kindly wait until <?php echo "{$scholarship['announcement_of_new_scholars']}";?>. Please do not contact our office for status updates, as this will not expedite the review process.</p>
 </div>
    <div id="bg-modal"></div>
    <div id="modal"></div>
