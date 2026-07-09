function handleFeaturesTabClick(link) {
    // Read target id safely (prevents whitespace/empty-string bugs).
    const targetId = (link.getAttribute("data-tab") || "").trim();

    // Validate target pane first; if it's missing, avoid removing
    // the existing "active" state (this fixes "highlight but no content").
    if (targetId === "all") {
        const allPane = document.getElementById("all");
        if (!allPane) return;
    } else {
        const targetPane = document.getElementById(targetId);
        if (!targetPane) return;
    }

    // Remove active class from all tabs
    document.querySelectorAll(".features-tabs .nav-link").forEach(el => el.classList.remove("active"));
    link.classList.add("active");

    // Hide all tab panes
    document.querySelectorAll(".features-tab-pane").forEach(pane => pane.classList.remove("active", "fade-in"));

    // Show the selected tab
    if (targetId === "all") {
        const allPane = document.getElementById("all");

        // Reset but keep a wrapper
        allPane.innerHTML = `<div class="content"></div>`;
        const contentWrapper = allPane.querySelector(".content");

        // Collect other panes and append their innerHTML
        document.querySelectorAll(".features-tab-pane").forEach(pane => {
            if (pane.id !== "all") {
                const content = pane.querySelector(".content");
                if (!content) return;
                const cloneContent = content.cloneNode(true);
                contentWrapper.appendChild(cloneContent);
            }
        });

        allPane.classList.add("active", "fade-in");
    } else {
        const targetPane = document.getElementById(targetId);
        targetPane.classList.add("active", "fade-in");
    }
}

document.querySelectorAll(".features-tabs .nav-link").forEach(link => {
    link.addEventListener("click", function (e) {
        e.preventDefault();
        handleFeaturesTabClick(this);
    });
});


window.addEventListener("DOMContentLoaded", () => {
    const defaultTab = document.querySelector(".features-tabs .nav-link.active");
    if (defaultTab) {
        handleFeaturesTabClick(defaultTab);
    }
});