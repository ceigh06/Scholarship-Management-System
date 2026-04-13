<?php
$application_ID = isset($_GET['app']) ? $_GET['app'] : '';
?>

<div class="delete-confirm">
    <div class="delete-icon">⚠️</div>
    <h3>Are you sure you want to delete this application?</h3>
    <p class="delete-warning">This action cannot be undone.</p>
    <br>
    
    <div class="modal-actions">
        <button onclick="deleteApplication('<?php echo $application_ID; ?>')" class="btn-reject">Delete</button>
        <button onclick="closeModal()" class="btn-cancel">Cancel</button>
    </div>
</div>