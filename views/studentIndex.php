<?php
include_once 'conn.php';
// $student_number=$_GET['sno'];
$studentResult = $dbconn->query('select * from users');
$student = $studentResult->fetch_assoc();
?>

<?php
include_once 'conn.php';
// $student_number=$_GET['sno'];
$studentResult = $dbconn->query('select * from users');
$student = $studentResult->fetch_assoc();
?>

<?php
include_once 'conn.php';
$scholarshipResult = $dbconn->query('select * from scholarships');
$scholarship = $scholarshipResult->fetch_assoc();
?>
<div class="header1">
    <?php echo "{$scholarship['organization_name']}"; ?>
    <br>
    <?php echo "{$scholarship['scholarship_name']}"; ?>
    <br>
    Online Scholarship
    <br>
    <?php echo "{$scholarship['tagline']}"; ?>
    <br>
    <hr>

</div>

<!-- CONTENT AREA (AJAX, ditu lalabas ung mga kinemberlu) -->
<div class="content" id="content-area">

</div>


<div class="footer">
    <?php echo "{$scholarship['tagline']}"; ?>
    <button onclick=mailContact()>Contact Us</button>
</div>
<div id="bg-modal"></div>
<div id="modal"></div>
<a href="index.php?logout=1">Logout</a>