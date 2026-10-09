function loadCareers() {
    const tableBody = document.getElementById("job-rows");
    if (!tableBody) return;

    const API_URL = "/fetch-jobs";

    fetch(API_URL)
        .then((response) => response.json())
        .then((result) => {
            // Clear out loading state
            tableBody.innerHTML = "";

            const jobs = result.data || [];

            // If API returned failure or an empty list
            if (!result.status || jobs.length === 0) {
                tableBody.innerHTML = `
                    <tr>
                        <td colspan="3" class="text-center py-5">
                            <h3>No open positions right now.</h3>
                            <p>Please check back later or send us an open application!</p>
                        </td>
                    </tr>`;
                return;
            }

            // Map and inject the roles into rows using ACF structure
            tableBody.innerHTML = jobs
                .map((job) => {
                    // 1. Get the title from the main object fallback
                    const jobTitle = job.title?.rendered || "Open Position";

                    // 2. Extract location directly from the ACF object safely
                    const jobLocation = job.acf?.job_location || "Remote / Flexible";

                    // 3. Keep slug routing intact
                    const jobUrl = job.slug ? `/job-details/${job.slug}` : "/job-details";

                    return `
                    <tr>
                        <td>${job.acf?.company_name || ""}</td>
                        <td>${job.acf?.employment_status || ""}</td>
                        <td><a href="${jobUrl}" class="apply-link">Apply Now</a></td>
                    </tr>
                `;
                })
                .join("");
        })
        .catch((error) => {
            console.error("Error fetching career data:", error);

            tableBody.innerHTML = `
                <tr>
                    <td colspan="3" class="text-center py-5" style="color: red;">
                        <h3>Oops! Something went wrong.</h3>
                        <p>We couldn't load job openings right now. Please refresh or try again later.</p>
                    </td>
                </tr>`;
        });
}

if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", loadCareers);
} else {
    loadCareers();
}
