
<?php
include_once 'conn.php';

$application_ID = $_GET['app'];

$conn->query("DELETE FROM application WHERE application_ID = '$application_ID'");
echo "
       Application deleted successfully.
        <button id='close-modal'>Close</button>
";
?>