@extends('layouts.backendsettings')
@section('title', 'Job Details')
@section('content')

<div class="breadcrumb-area" style="background-image: url({{ asset('assets/img/hero-images/careers.svg') }})">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner">
                    <h1 class="page-title">Pocketoffice Jobs</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="job-details-area pd-top-112">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 offset-xl-1" id="job-detail-container">
                <div class="section-title">
                    <h2 class="title">Job Details</h2>
                </div>
                
                <h6 class="title" id="jd-title">Loading Position Title...</h6>
                <span id="jd-company">Loading Company...</span>
                
                <h6 class="sub-title">Vacancy</h6>
                <span id="jd-vacancy">-</span>
                
                <h6 class="sub-title">Job Responsibilities</h6>
                <div id="jd-responsibilities" class="mb-4">Loading responsibilities...</div>
                
                <h6 class="sub-title">Educational Requirements</h6>
                <div id="jd-education" class="mb-4">Loading requirements...</div>
                
                <h6 class="sub-title">Experience Requirements</h6>
                <div id="jd-experience" class="mb-4">Loading experience details...</div>
                
                <h6 class="sub-title">Additional Requirements</h6>
                <div id="jd-additional" class="mb-4">Loading additional details...</div>
                
                <h6 class="sub-title">Job Location</h6>
                <p id="jd-location">Loading location...</p>
                
                <h6 class="sub-title">Salary</h6>
                <p id="jd-salary" class="m-0">Loading structure...</p>
                
                <a href="{{ url('job-apply') }}" class="job-apply-btn mt-4">Apply Now</a>
            </div>

            <div class="col-xl-3 col-lg-4 offset-xl-1">
                <div class="widget widget-job-details">
                    <h3 class="widget-title">Job Overview</h3>
                    
                    <div class="media single-job-details">
                        <img src="{{ asset('assets/img/icons/Department.svg') }}" alt="icon" loading="lazy" />
                        <div class="media-body">
                            <h6>Company</h6>
                            <span id="widget-company">-</span>
                        </div>
                    </div>
                    
                    <div class="media single-job-details">
                        <img src="{{ asset('assets/img/icons/Location.svg') }}" alt="icon" loading="lazy" />
                        <div class="media-body">
                            <h6>Location</h6>
                            <span id="widget-location">-</span>
                        </div>
                    </div>
                    
                    <div class="media single-job-details">
                        <img src="{{ asset('assets/img/icons/Job-Type.svg') }}" alt="icon" loading="lazy" />
                        <div class="media-body">
                            <h6>Job Type</h6>
                            <span id="widget-type">-</span>
                        </div>
                    </div>
                    
                    <div class="media single-job-details">
                        <img src="{{ asset('assets/img/icons/Experience.svg') }}" alt="icon" loading="lazy" />
                        <div class="media-body">
                            <h6>Experience</h6>
                            <span id="widget-experience">-</span>
                        </div>
                    </div>
                    
                    <div class="media single-job-details mb-0">
                        <img src="{{ asset('assets/img/icons/Salary.svg') }}" alt="icon" loading="lazy" />
                        <div class="media-body">
                            <h6>Salary</h6>
                            <span id="widget-salary">-</span>
                        </div>
                    </div>

                    <a href="http://127.0.0.1:8000/job-apply?slug=flutter-developer-intern&amp;title=Flutter+Developer+Intern" class="job-apply-btn mt-4">Apply Now</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const pathSegments = window.location.pathname.split('/');
    const jobSlug = pathSegments[pathSegments.length - 1];

    if (!jobSlug) {
        console.error("No valid job slug detected.");
        return;
    }

    const API_URL = `/fetch-job-detail/${jobSlug}`;

    fetch(API_URL)
        .then(response => response.json())
        .then(result => {
            if (!result.status || !result.data) {
                document.getElementById("jd-title").innerText = "Position Not Found";
                document.getElementById("jd-responsibilities").innerHTML = "<p>The requested job opening could not be located on the server.</p>";
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
            const experienceYears = acf.experience_requirements ? `${acf.experience_requirements} Years` : "Not Specified";
            
            // Handle Employment Status array wrapper if exists
            const employmentType = Array.isArray(acf.employment_status) 
                ? acf.employment_status.join(', ') 
                : (acf.employment_status || "Full-time");

            // Meta tags updates
            document.title = `${jobTitle} | Pocketoffice Careers`;

            // Update main content fields
            document.getElementById("jd-title").innerText = jobTitle;
            document.getElementById("jd-company").innerText = companyName;
            document.getElementById("jd-vacancy").innerText = vacancyCount;
            document.getElementById("jd-location").innerText = jobLocation;
            document.getElementById("jd-salary").innerText = salaryPackage;

            // Render rich content blocks (inner HTML from WordPress)
            document.getElementById("jd-responsibilities").innerHTML = acf.job_responsibilities || "<p>Contact HR for duties.</p>";
            document.getElementById("jd-education").innerHTML = acf.educational_requirements || "<p>Degree equivalent background.</p>";
            document.getElementById("jd-experience").innerHTML = acf.experience_requirements ? `<p>${acf.experience_requirements} year(s) of core experience required.</p>` : "<p>Open to entry-level professionals.</p>";
            document.getElementById("jd-additional").innerHTML = acf.additional_requirements || "<p>No specific extra prerequisites.</p>";

            // Update Sidebar Widget info fields
            document.getElementById("widget-company").innerText = companyName;
            document.getElementById("widget-location").innerText = jobLocation;
            document.getElementById("widget-type").innerText = employmentType;
            document.getElementById("widget-experience").innerText = experienceYears;
            document.getElementById("widget-salary").innerText = salaryPackage;

            const applyButton = document.querySelector(".job-apply-btn");
            if (applyButton) {
                const applyUrl = new URL("{{ url('job-apply') }}", window.location.origin);
                applyUrl.searchParams.set("slug", jobSlug);
                applyUrl.searchParams.set("title", jobTitle);
                applyButton.href = applyUrl.toString();
            }
        })
        .catch(err => {
            console.error("Job details loading error:", err);
            document.getElementById("jd-title").innerText = "Error Loading Details";
            document.getElementById("jd-responsibilities").innerHTML = "<p>An unexpected technical connection error occurred while pulling position information.</p>";
        });
});
</script>

@endsection
