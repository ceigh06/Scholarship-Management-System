function loadPage(url) {
    fetch(url)
        .then((response) => response.text())
        .then((html) => {
            document.getElementById("content-area").innerHTML = html;
        });
}

function openModal(url) {
    fetch(url)
        .then((response) => response.text())
        .then((data) => {
            document.getElementById("modal").innerHTML = data;
            document.getElementById("bg-modal").style.display = "block";
            document.getElementById("modal").style.display = "block";
        });
}

function closeModal() {
    document.getElementById("bg-modal").style.display = "none";
    document.getElementById("modal").style.display = "none";
}