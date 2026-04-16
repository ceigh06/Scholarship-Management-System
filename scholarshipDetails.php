<?php
include_once 'includes/conn.php';
$scholarshipResult = $dbconn->query('select * from scholarships');
$scholarship = $scholarshipResult->fetch_assoc();
?>

<?php
include_once 'includes/conn.php';
// $student_number=$_GET['sno'];
$reqResult = $dbconn->query('select * from scholarships_requirements');
$requirements = $reqResult->fetch_all(MYSQLI_ASSOC);
?>
<div class="content" id="content-area">
    <div class="eligibility">
        <h1>Eligibility Criteria</h1>
        <div class="criteria-box">
            <?php foreach ($requirements as $requirement) { ?>
                <div class="criteria-card">
                    <p><strong><?php echo $requirement['requirement_name']; ?></strong></p>
                    <p><?php echo $requirement['description']; ?></p>
                </div>
            <?php } ?>
        </div>
    </div>

    <div class="benefits">
        <h1>Scholarship Benefits</h1>

        <table border=1>
            <tr>
                <th>Label</th>
                <th>Description</th>
                <th>Amount</th>
                <th>Per Semester</th>
            </tr>
            <?php
            $benefits = $dbconn->query('SELECT * FROM scholarships_benefits');

            foreach ($benefits as $benefit) {
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

    </table>
    <div class="sched">
    <h2>Schedule</h2>
    <div class="schedule-grid">
        <div class="schedule-item">
            <h3><?php echo "{$scholarship['opening_date']}"; ?></h3>
            <p>Start of Online Application / Registration Period</p>
        </div>
        <div class="schedule-item">
            <h3><?php echo "{$scholarship['closing_date']}"; ?></h3>
            <p>Last Day of Submission of Application</p>
        </div>
        <div class="schedule-item">
            <h3><?php echo "{$scholarship['announcement_of_new_scholars']}"; ?></h3>
            <p>Schedule of Qualifying Examination</p>
        </div>
    </div>
</div>
</div>

