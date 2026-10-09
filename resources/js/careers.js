document.addEventListener("DOMContentLoaded", function () {
    const tableBody = document.getElementById("job-rows");
    if (!tableBody) return;

    fetch("/fetch-jobs")
        .then(response => response.json())
        .then(result => {
            tableBody.innerHTML = "";

            const jobs = result.data || [];

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

            tableBody.innerHTML = jobs.map(job => {
                const jobUrl = job.slug ? `/job-details/${job.slug}` : "/job-details";

                return `
                    <tr>
                        <td>${job.acf?.company_name}</td>
                        <td>${job.acf?.employment_status}</td>
                        <td><a href="${jobUrl}" class="apply-link">Apply Now</a></td>
                    </tr>
                `;
            }).join("");
        })
        .catch(error => {
            console.error("Error fetching career data:", error);

            tableBody.innerHTML = `
                <tr>
                    <td colspan="3" class="text-center py-5 job-load-error">
                        <h3>Oops! Something went wrong.</h3>
                        <p>We couldn't load job openings right now. Please refresh or try again later.</p>
                    </td>
                </tr>`;
        });
});
