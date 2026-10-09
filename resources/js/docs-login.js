function setTab(tabName) {
    const container = document.getElementById("tabs");
    const tabs = container?.querySelectorAll(".tab") || [];
    const selectedTab = document.getElementById("selected_tab");
    const tabClasses = {
        user: "active-user",
        company: "active-admin",
        partner: "active-master",
    };

    tabs.forEach((tab) => tab.classList.remove("active"));
    tabs.forEach((tab) => {
        if (tab.dataset.tab === tabName) {
            tab.classList.add("active");
        }
    });

    if (container) {
        container.classList.remove("active-user", "active-admin", "active-master");
        container.classList.add(tabClasses[tabName] || "active-user");
    }

    if (selectedTab) {
        selectedTab.value = tabName;
    }
}

function togglePwd(btn) {
    const input = document.getElementById("pwd");
    const icon = btn?.querySelector("i");

    if (!input || !icon) {
        return;
    }

    if (input.type === "password") {
        input.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    } else {
        input.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }
}

// Expose functions globally for backward compatibility
window.setTab = setTab;
window.togglePwd = togglePwd;

function initDocsLogin() {
    // 1. Tab click event listeners
    const tabs = document.querySelectorAll("#tabs .tab");
    tabs.forEach((tab) => {
        tab.addEventListener("click", function () {
            const tabName = this.dataset.tab;
            if (tabName) {
                setTab(tabName);
            }
        });
    });

    // 2. Eye button click listener
    const eyeBtns = document.querySelectorAll(".eye-btn");
    eyeBtns.forEach((btn) => {
        btn.addEventListener("click", function () {
            togglePwd(this);
        });
    });

    // 3. Forgot password section toggle handlers
    const forgotPasswordSections = document.querySelectorAll(".forgot-password-section");
    const loginSections = document.querySelectorAll(".login-section");
    const forgotLinks = document.querySelectorAll(".forgot");
    const backToLoginLinks = document.querySelectorAll(".back-to-login");

    forgotPasswordSections.forEach((section) => {
        section.style.display = "none";
    });

    forgotLinks.forEach((link) => {
        link.addEventListener("click", function () {
            loginSections.forEach((section) => (section.style.display = "none"));
            forgotPasswordSections.forEach((section) => (section.style.display = ""));
        });
    });

    backToLoginLinks.forEach((link) => {
        link.addEventListener("click", function () {
            loginSections.forEach((section) => (section.style.display = ""));
            forgotPasswordSections.forEach((section) => (section.style.display = "none"));
        });
    });

    // 4. Toastr options & session error notification
    if (typeof toastr !== "undefined") {
        toastr.options = {
            closeButton: true,
            progressBar: true,
            positionClass: "toast-top-right",
            timeOut: 4000,
        };

        const loginForm = document.getElementById("docs-login-form");
        if (loginForm && loginForm.dataset.error) {
            toastr.error(loginForm.dataset.error);
        }
    }

    // 5. Form submit fallback to ensure selected_tab has a value
    const loginForm = document.getElementById("docs-login-form");
    if (loginForm) {
        loginForm.addEventListener("submit", function () {
            const selectedTabInput = document.getElementById("selected_tab");
            if (selectedTabInput && !selectedTabInput.value) {
                selectedTabInput.value = "user";
            }
        });
    }

    // 6. Set initial active tab
    const selectedTab = document.getElementById("selected_tab");
    setTab(selectedTab && selectedTab.value ? selectedTab.value : "user");
}

if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initDocsLogin);
} else {
    initDocsLogin();
}
