  <?php
        include_once 'conn.php';
        // $student_number=$_GET['sno'];
        $reqResult=$dbconn->query('select * from scholarships_requirements');
        $requirements=$reqResult->fetch_all(MYSQLI_ASSOC);  
    ?>
    
<h2>Eligibility Criteria</h2>

<div class="reqs">
<?php foreach ($requirements as $requirement) { ?>
    <?php echo "{$requirement['requirement_name']}"; ?>
    <br>
    <?php echo "{$requirement['description']}"; ?>
    <br>
    <br>
<?php } ?>
</div>
