   <?php
        include_once 'conn.php';
        $scholarshipResult=$dbconn->query('select * from scholarships');
        $scholarship=$scholarshipResult->fetch_assoc();   
    ?>

        <?php
        include_once 'conn.php';
        // $student_number=$_GET['sno'];
        $reqResult=$dbconn->query('select * from scholarships_requirements');
        $requirements=$reqResult->fetch_all(MYSQLI_ASSOC);  
    ?>
<div class="content" id="content-area">
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

    <div class="benefits">
        <h2>Scholarship Benefits</h2>

<table border=1>
    <tr>
        <th>Label</th>
        <th>Description</th>
        <th>Amount</th>
        <th>Per Semester</th>
    </tr>
    <?php
        $benefits = $dbconn->query('SELECT * FROM scholarships_benefits');

        foreach($benefits as $benefit) {
            echo "
            <tr>
            <td>{$benefit['label']}</td>
                <td>{$benefit['description']}</td>
                
                <td>{$benefit['amount']}</td>
                <td>{$benefit['per_semester']}</td>
            </tr>
            ";
        }
    ?>
</table>
    </div>

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
    </div>