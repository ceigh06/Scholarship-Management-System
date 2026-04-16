/**
 * GKS Scholarship Portal — Main Scripts
 */

// ─── Page Loader ────────────────────────────────────────────────────────────

function loadPage(url, navLink) {
  const contentArea = document.getElementById("content-area");

  // Show subtle loading state
  contentArea.style.opacity = "0.5";
  contentArea.style.pointerEvents = "none";

  // Update active nav link
  if (navLink) {
    document.querySelectorAll(".nav a").forEach(function (a) {
      a.classList.remove("active");
    });
    navLink.classList.add("active");
  }

  fetch(url)
    .then(function (response) {
      if (!response.ok) throw new Error("Page could not be loaded.");
      return response.text();
    })
    .then(function (html) {
      contentArea.innerHTML = html;
      contentArea.style.opacity = "1";
      contentArea.style.pointerEvents = "";
      // Smooth scroll to top of content
      contentArea.scrollIntoView({ behavior: "smooth", block: "start" });
    })
    .catch(function (err) {
      contentArea.innerHTML =
        '<div class="load-error"><p>⚠️ ' + err.message + "</p></div>";
      contentArea.style.opacity = "1";
      contentArea.style.pointerEvents = "";
    });
}

// ─── Modal ──────────────────────────────────────────────────────────────────

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
  document.getElementById("modal").innerHTML = "";
}

// Close modal when clicking the background overlay
document.addEventListener("DOMContentLoaded", function () {
  const bgModal = document.getElementById("bg-modal");
  if (bgModal) {
    bgModal.addEventListener("click", closeModal);
  }

  // Close modal on Escape key
  document.addEventListener("keydown", function (e) {
    if (e.key === "Escape") closeModal();
  });
});

// ─── Utility ────────────────────────────────────────────────────────────────

/**
 * Contact shortcut — opens default mail client.
 * Called by the footer "Contact Us" button in student view.
 */
function mailContact() {
  window.location.href = "mailto:support@diwangbayani.org";
}
