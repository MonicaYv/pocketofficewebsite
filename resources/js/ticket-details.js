function initTicketDetails() {
    const form = document.getElementById("supportRequestForm");
    if (!form) return;

    const departmentInput = document.getElementById("support-department");
    const fileInput = document.getElementById("attach-files");
    const fileError = document.getElementById("file-error");
    const prevBtn = form.querySelector(".previous-btn") || document.querySelector(".previous-btn");
    const selectedDepartment = localStorage.getItem("selectedDepartment") || "";
    const redirectUrl = form.dataset.redirect || prevBtn?.dataset?.href || "/submit-ticket";

    // Handle Previous button navigation without inline onclick
    if (prevBtn) {
        prevBtn.addEventListener("click", function () {
            const targetUrl = this.dataset.href || redirectUrl;
            window.location.href = targetUrl;
        });
    }

    if (departmentInput) {
        departmentInput.value = selectedDepartment;
    }

    if (!selectedDepartment) {
        if (typeof toastr !== "undefined") {
            toastr.warning("Please choose a department first.");
        } else {
            console.warn("Please choose a department first.");
        }
    }

    if (fileInput) {
        fileInput.addEventListener("change", function (event) {
            const maxFileSize = 2 * 1024 * 1024;
            const files = event.target.files;
            let valid = true;

            for (let i = 0; i < files.length; i++) {
                if (files[i].size > maxFileSize) {
                    valid = false;
                    break;
                }
            }

            if (!valid) {
                if (fileError) fileError.classList.remove("d-none");
                event.target.value = "";
            } else {
                if (fileError) fileError.classList.add("d-none");
            }
        });
    }

    form.addEventListener("submit", async function (event) {
        event.preventDefault();

        if (departmentInput && !departmentInput.value) {
            if (typeof toastr !== "undefined") {
                toastr.error("Please select a department before submitting.");
            } else {
                alert("Please select a department before submitting.");
            }
            window.location.href = redirectUrl;
            return;
        }

        const submitBtn = form.querySelector(".ticket-submit-btn");
        const originalBtnText = submitBtn ? submitBtn.textContent : "Submit";

        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.textContent = "Submitting...";
        }

        const formData = new FormData(form);
        const csrfToken =
            document.querySelector('meta[name="csrf-token"]')?.content || "";
        const submitUrl =
            form.getAttribute("action") ||
            form.dataset.url ||
            "/support-request-submit";

        try {
            const response = await fetch(submitUrl, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                    "X-Requested-With": "XMLHttpRequest",
                },
                body: formData,
            });

            const data = await response.json().catch(() => ({}));

            if (!response.ok || !data.status) {
                throw new Error(data.message || "Unable to submit support request.");
            }

            if (typeof toastr !== "undefined") {
                toastr.success(data.message || "Support request submitted successfully");
            } else {
                alert(data.message || "Support request submitted successfully");
            }

            form.reset();
            if (departmentInput) departmentInput.value = "";
            localStorage.removeItem("selectedDepartment");
            if (fileError) fileError.classList.add("d-none");
        } catch (error) {
            if (typeof toastr !== "undefined") {
                toastr.error(error.message || "Something went wrong. Try again.");
            } else {
                alert(error.message || "Something went wrong. Try again.");
            }
        } finally {
            if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.textContent = originalBtnText;
            }
        }
    });
}

if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initTicketDetails);
} else {
    initTicketDetails();
}
