function initJobApply() {
    const fileInput = document.getElementById("sb-file-input");
    const fileLabel = document.querySelector('label[for="sb-file-input"]');
    const jobTitleField = document.getElementById("jobTitleField");
    const jobSlugField = document.getElementById("jobSlugField");
    const positionInput = document.querySelector('input[name="position"]');
    const queryParams = new URLSearchParams(window.location.search);
    const querySlug = queryParams.get("slug") || "";
    const queryTitle = queryParams.get("title") || queryParams.get("position") || "";

    if (jobSlugField) {
        jobSlugField.value = querySlug;
    }

    if (jobTitleField) {
        jobTitleField.value = queryTitle;
    }

    if (positionInput && queryTitle) {
        positionInput.value = queryTitle;
        positionInput.parentElement?.classList.add("active");
    }

    if (fileInput && fileLabel) {
        fileInput.addEventListener("change", function () {
            const file = this.files[0];

            if (!file) {
                fileLabel.textContent = "Upload Your Resume";
                return;
            }

            const allowedType = "application/pdf";

            if (file.type !== allowedType) {
                if (typeof toastr !== "undefined") {
                    toastr.error("Only PDF files are allowed.");
                } else {
                    alert("Only PDF files are allowed.");
                }

                this.value = "";
                fileLabel.textContent = "Upload Your Resume";
                return;
            }

            if (file.size > 1 * 1024 * 1024) {
                if (typeof toastr !== "undefined") {
                    toastr.error("Maximum file size is 1MB.");
                } else {
                    alert("Maximum file size is 1MB.");
                }

                this.value = "";
                fileLabel.textContent = "Upload Your Resume";
                return;
            }

            // Show selected file name
            fileLabel.textContent = file.name;
        });
    }

    // Floating labels
    const fields = document.querySelectorAll(
        ".single-input-wrap input, .single-input-wrap textarea"
    );

    fields.forEach((field) => {
        // Check existing value on page load
        if (field.value.trim() !== "") {
            field.parentElement?.classList.add("active");
        }

        // When user types
        field.addEventListener("input", function () {
            if (this.value.trim() !== "") {
                this.parentElement?.classList.add("active");
            } else {
                this.parentElement?.classList.remove("active");
            }
        });

        // When focus
        field.addEventListener("focus", function () {
            this.parentElement?.classList.add("active");
        });

        // When blur
        field.addEventListener("blur", function () {
            if (this.value.trim() === "") {
                this.parentElement?.classList.remove("active");
            }
        });
    });

    // Form submit
    const applyForm = document.getElementById("jobApplyForm");
    if (!applyForm) return;

    applyForm.addEventListener("submit", function (e) {
        e.preventDefault();

        const submitBtn = applyForm.querySelector('button[type="submit"]');
        const originalBtnText = submitBtn ? submitBtn.textContent : "Submit";

        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.textContent = "Submitting...";
        }

        const formData = new FormData(applyForm);
        const csrfToken =
            document.querySelector('meta[name="csrf-token"]')?.content || "";
        const submitUrl =
            applyForm.getAttribute("action") ||
            applyForm.dataset.url ||
            "/job-application-submit";

        fetch(submitUrl, {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
                "X-Requested-With": "XMLHttpRequest",
            },
            body: formData,
        })
            .then(async (res) => {
                const data = await res.json().catch(() => ({}));

                if (!res.ok || !data.status) {
                    throw new Error(data.message || "Unable to submit application.");
                }

                return data;
            })
            .then((data) => {
                if (typeof toastr !== "undefined") {
                    toastr.success(data.message || "Application submitted successfully!");
                } else {
                    alert(data.message || "Application submitted successfully!");
                }

                applyForm.reset();

                // Remove active class after reset
                document.querySelectorAll(".single-input-wrap").forEach((el) => {
                    el.classList.remove("active");
                });

                if (jobSlugField) {
                    jobSlugField.value = querySlug;
                }

                if (jobTitleField) {
                    jobTitleField.value = queryTitle;
                }

                if (fileInput) {
                    fileInput.value = "";
                    const label = fileInput.nextElementSibling;
                    if (label && label.classList.contains("custom-file-label")) {
                        label.innerText = "Upload Your Resume";
                    }
                }
            })
            .catch((error) => {
                if (typeof toastr !== "undefined") {
                    toastr.error(error.message || "Something went wrong. Try again.");
                } else {
                    alert(error.message || "Something went wrong. Try again.");
                }
            })
            .finally(() => {
                if (submitBtn) {
                    submitBtn.disabled = false;
                    submitBtn.textContent = originalBtnText;
                }
            });
    });
}

if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initJobApply);
} else {
    initJobApply();
}
