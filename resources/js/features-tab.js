function handleFeaturesTabClick(link) {
    // Remove active class from all tabs
    document.querySelectorAll(".features-tabs .nav-link")
        .forEach(el => el.classList.remove("active"));
    link.classList.add("active");

    // Hide all tab panes
    document.querySelectorAll(".features-tab-pane")
        .forEach(pane => pane.classList.remove("active", "fade-in"));

    // Show the selected tab
    const targetId = link.getAttribute("data-tab");

    if (targetId === "all") {
        const allPane = document.getElementById("all");

        // Reset but keep a wrapper
        allPane.innerHTML = `<div class="content"></div>`;
        const contentWrapper = allPane.querySelector(".content");

        // Collect other panes and append their innerHTML
        document.querySelectorAll(".features-tab-pane").forEach(pane => {
            if (pane.id !== "all") {
                const cloneContent = pane.querySelector(".content").cloneNode(true);
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