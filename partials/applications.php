<?php
include_once '../includes/conn.php';
$sql = "SELECT a.*, u.* FROM application as a JOIN users as u ON a.user_id = u.user_id";
$applications = $dbconn->query($sql);
?>

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
                foreach ($applications as $application) {
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
                               <button onclick='openModal(\"partials/viewApplication.php?app={$appId}\")'>View</button>
                                <button onclick='openModal(\"partials/editApplications.php?app={$appId}\")'>Edit</button>
                                <button onclick='openModal(\"partials/deleteApplicationConfirm.php?app={$appId}\")'>Delete</button> <
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