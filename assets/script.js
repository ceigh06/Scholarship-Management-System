/**
 * GKS Scholarship Portal — Main Scripts
 */

// ─── Page Loader ────────────────────────────────────────────────────────────

function loadPage(url, navLink) {
  const contentArea = document.getElementById("content-area");

  contentArea.style.opacity = "0.5";
  contentArea.style.pointerEvents = "none";

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

      // Execute any scripts in the loaded content
      const scripts = contentArea.querySelectorAll("script");
      scripts.forEach(function (oldScript) {
        const newScript = document.createElement("script");

        // Copy attributes
        Array.from(oldScript.attributes).forEach(function (attr) {
          newScript.setAttribute(attr.name, attr.value);
        });

        // Copy content
        newScript.textContent = oldScript.textContent;

        // Replace to execute
        oldScript.parentNode.replaceChild(newScript, oldScript);
      });

      contentArea.style.opacity = "1";
      contentArea.style.pointerEvents = "";
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

// Handle any form with class 'ajax-form'
document.addEventListener("submit", function (e) {
  if (e.target.classList.contains("ajax-form")) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);

    fetch(form.action, {
      method: "POST",
      body: formData,
    })
      .then((response) => response.text())
      .then(() => {
        closeModal(); // Close modal if open

        // Refresh current page - works for any load parameter
        const currentLoad =
          new URLSearchParams(window.location.search).get("load") ||
          "applications";
        loadPage("partials/" + currentLoad + ".php");
      })
      .catch((error) => {
        console.error("Error:", error);
        alert("Something went wrong");
      });
  }
});


function deleteApplication(appId) {
    $.get('process/deleteApplication.php?app=' + encodeURIComponent(appId), function(data) {
        $('.delete-confirm').html(data);
        if (data.includes('successfully')) {
            loadPage('partials/applications.php');
            setTimeout(closeModal, 1500);
        }
    });
}
