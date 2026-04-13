$(document).ready(function() {
    $.ajax({
        url: 'summaryCards.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            $('#total').text(data.total);
            $('#approved').text(data.approved);
            $('#pending').text(data.pending);
            $('#rejected').text(data.rejected);
        },
        error: function() {
            alert('Failed to load data.');
        }
    });
});

function openModal(url) {
    fetch(url)
        .then(response => response.text())
        .then(data => {
            document.getElementById('modal').innerHTML = data;
            document.getElementById('bg-modal').style.display = 'block';
            document.getElementById('modal').style.display = 'block';
        });
}

function closeModal() {
    document.getElementById('bg-modal').style.display = 'none';
    document.getElementById('modal').style.display = 'none';
}

document.getElementById('bg-modal').onclick = closeModal;s