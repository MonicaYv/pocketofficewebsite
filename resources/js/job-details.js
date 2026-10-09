function loadJobDetails() {
    const container = document.getElementById("job-detail-container");
    const pathSegments = window.location.pathname.split("/").filter(Boolean);
    const jobSlug = container?.dataset?.slug || pathSegments[pathSegments.length - 1];

    if (!jobSlug) {
        console.error("No valid job slug detected.");
        return;
    }

    const API_URL = `/fetch-job-detail/${jobSlug}`;

    function setText(id, text) {
        const el = document.getElementById(id);
        if (el) el.innerText = text;
    }

    function setHtml(id, html) {
        const el = document.getElementById(id);
        if (el) el.innerHTML = html;
    }

    fetch(API_URL)
        .then((response) => response.json())
        .then((result) => {
            if (!result.status || !result.data) {
                setText("jd-title", "Position Not Found");
                setHtml(
                    "jd-responsibilities",
                    "<p>The requested job opening could not be located on the server.</p>"
                );
                return;
            }

            const job = result.data;
            const acf = job.acf || {};

            // Extract Main Properties safely
            const jobTitle = job.title?.rendered || "Open Position";
            const companyName = acf.company_name || "Pocketoffice";
            const vacancyCount = acf.vacancy || "N/A";
            const jobLocation = acf.job_location || "Remote";
            const salaryPackage = acf.salary || "Negotiable";
            const experienceYears = acf.experience_requirements
                ? `${acf.experience_requirements} Years`
                : "Not Specified";

            // Handle Employment Status array wrapper if exists
            const employmentType = Array.isArray(acf.employment_status)
                ? acf.employment_status.join(", ")
                : acf.employment_status || "Full-time";

            // Update page title
            document.title = `${jobTitle} | Pocketoffice Careers`;

            // Update main content fields
            setText("jd-title", jobTitle);
            setText("jd-company", companyName);
            setText("jd-vacancy", vacancyCount);
            setText("jd-location", jobLocation);
            setText("jd-salary", salaryPackage);

            // Render rich content blocks (inner HTML from WordPress)
            setHtml(
                "jd-responsibilities",
                acf.job_responsibilities || "<p>Contact HR for duties.</p>"
            );
            setHtml(
                "jd-education",
                acf.educational_requirements || "<p>Degree equivalent background.</p>"
            );
            setHtml(
                "jd-experience",
                acf.experience_requirements
                    ? `<p>${acf.experience_requirements} year(s) of core experience required.</p>`
                    : "<p>Open to entry-level professionals.</p>"
            );
            setHtml(
                "jd-additional",
                acf.additional_requirements || "<p>No specific extra prerequisites.</p>"
            );

            // Update Sidebar Widget info fields
            setText("widget-company", companyName);
            setText("widget-location", jobLocation);
            setText("widget-type", employmentType);
            setText("widget-experience", experienceYears);
            setText("widget-salary", salaryPackage);

            // Update Apply buttons with slug and title
            const applyButtons = document.querySelectorAll(".job-apply-btn");
            applyButtons.forEach((applyButton) => {
                const baseHref = applyButton.getAttribute("href") || "/job-apply";
                const applyUrl = new URL(baseHref, window.location.origin);
                applyUrl.searchParams.set("slug", jobSlug);
                applyUrl.searchParams.set("title", jobTitle);
                applyButton.href = applyUrl.toString();
            });
        })
        .catch((err) => {
            console.error("Job details loading error:", err);
            setText("jd-title", "Error Loading Details");
            setHtml(
                "jd-responsibilities",
                "<p>An unexpected technical connection error occurred while pulling position information.</p>"
            );
        });
}

if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", loadJobDetails);
} else {
    loadJobDetails();
}
