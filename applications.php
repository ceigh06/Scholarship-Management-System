<!DOCTYPE html>
<html>
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    include_once 'conn.php';
    $sql = "SELECT a.*, u.* FROM application as a JOIN users as u ON a.user_id = u.user_id";
    $applications = $dbconn->query($sql);
    ?>

    <header class="header">
        <img src="GKSLogo.png" alt="Foundation Logo" class="logo"> 
            <h1>
                Diwa ng Bayani Foundation<br>
                Gintong Kabataan Scholarship<br>
                Online Application
            </h1>
    </header> 

    <div class="nav">
        <ul>
            <li><a href="adminIndex.php">Dashboard</a></li>
            <li><a href="applications.php" class="active">Application</a></li>
        </ul>
    </div>

    <div class="benefits">
        <table>
            <thead>
                <tr>
                    <th>Application ID</th>
                    <th>Name</th>
                    <th>Application Date</th>
                    <th>Eligibility</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            
            <tbody>
                <?php
                if ($applications && $applications->num_rows > 0) {
                    foreach($applications as $application) {
                        $appId = $application['application_ID'];
                        $fullName = $application['first_name'] . ' ' . $application['middle_name'] . ' ' . $application['last_name'];
                        $appDate = $application['application_date'];
                        $eligibility = $application['eligibility'];
                        $status = $application['applicant_status'];
                        
                        echo "
                        <tr>
                            <td>{$appId}</td>
                            <td>{$fullName}</td>
                            <td>{$appDate}</td>
                            <td>{$eligibility}</td>
                            <td>{$status}</td>
                            <td class='actionButtons'>
                                <button onclick='openModal(\"viewApplication.php?app={$appId}\")'>View</button>
                                <button onclick='openModal(\"editApplications.php?app={$appId}\")'>Edit</button>
                                <button onclick='openModal(\"deleteApplicationConfirm.php?app={$appId}\")'>Delete</button>
                            </td>
                        </tr>
                        ";
                    }
                } else {
                    echo "<tr><td colspan='6' style='text-align: center; padding: 40px;'>No applications found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    
    <div id="bg-modal"></div>
    <div id="modal"></div>
</body>
</html>