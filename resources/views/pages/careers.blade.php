@extends('layouts.backendsettings')
@section('title', 'Careers at Pocket Office | Join Our Cloud Desktop Team')
@section('meta-title', 'Careers at Pocket Office | Join Our Cloud Desktop Team')
@section('meta-description', 'Explore career opportunities at Pocket Office and join our team building innovative cloud desktop solutions for modern workspaces.')
@section('meta-keywords', 'careers pocket office, cloud desktop jobs, remote workspace team, join cloud desktop company')
@section('meta-image', 'https://pocket-office.ai/assets/img/hero-images/careers.svg')
@section('canonical', 'https://pocket-office.ai/careers')
@section('meta-url', 'https://pocket-office.ai/careers')
@section('structured-data')
@verbatim
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "Careers | Pocket Office",
  "url": "https://pocket-office.ai/careers",
  "description": "Explore career opportunities at Pocket Office and join our team building innovative cloud desktop solutions for modern workspaces.",
  "inLanguage": "en",
  "image": "https://pocket-office.ai/assets/img/hero-images/careers.svg",
  "publisher": {
    "@type": "Organization",
    "name": "Pocket Office",
    "url": "https://pocket-office.ai/",
    "logo": {
      "@type": "ImageObject",
      "url": "https://pocket-office.ai/assets/img/logo/pocket-office-tm-final-logo.png"
    }
  }
}
@endverbatim
@endsection
@section('content')
<!-- breadcrumb area start -->
<div
    class="breadcrumb-area"
    style="background-image: url('{{ asset($constants['IMAGEFILEPATH'] . 'hero-images/careers.svg') }}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner">
                    <h1 class="page-title">Careers</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb area End -->

<!--Main content-->
<div>
    <section class="careers-section">
        <div class="container content-wrapper">
            <div class="row align-items-center">
                <!-- Left Content -->
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h1 class="careers-title">Careers at Pocketoffice</h1>

                    <p class="careers-text">
                        At Pocketoffice, we create a cloud desktop platform that helps
                        people work freely, securely, and without friction. We believe
                        the best products are built by teams that value trust, clarity,
                        and collaboration.
                    </p>

                    <p class="careers-text">Join Us!</p>
                    <p class="careers-text">
                        Help shape the future of cloud work. If you’re excited about
                        building tools that make work simpler, more secure, and more
                        human—we’d love to work with you.
                    </p>
                    <a href="#open-positions" class="btn btn-careers">See open positions</a>
                </div>

                <!-- Right Image -->
                <div class="col-lg-6 text-center">
                    <img
                        src="{{ asset($constants['IMAGEFILEPATH'] . 'careers/careers-at-pocketoffice.svg') }}"
                        alt="Careers at Pocketoffice"
                        class="careers-image"
                        width="600px"
                        height="400px"
                        loading="lazy" />
                </div>
            </div>
        </div>
    </section>
    <section class="cultures-section">
        <div class="container content-wrapper">
            <h2 class="cultures-title">Our Culture</h2>
            <p class="cultures-text">
                Build meaningful work together. We are a team of builders,
                designers, and problem-solvers who care deeply about how work
                feels—not just how it functions.
            </p>
            <h5 class="defines-heading">What Defines us</h5>

            <div class="cultures-grid">
                <!-- Card 1 -->
                <div>
                    <div class="card cultures-card">
                        <img
                            src="{{ asset($constants['IMAGEFILEPATH'] . 'careers/remote-first-by-design.svg') }}"
                            class="card-img-top"
                            alt="remote first"
                            width="513px"
                            height="220px"
                            loading="lazy" />
                        <div class="card-body">
                            <h5 class="card-title">Remote-First by Design</h5>
                            <p class="card-text">
                                We focus on outcomes, not locations, whether you’re remote
                                or at a hub.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div>
                    <div class="card cultures-card">
                        <img
                            src="{{ asset($constants['IMAGEFILEPATH'] . 'careers/collaboration-over-hierarchy.svg') }}"
                            width="513px"
                            height="220px"
                            loading="lazy"
                            class="card-img-top"
                            alt="Collaboration Over Hierarchy " />
                        <div class="card-body">
                            <h5 class="card-title">Collaboration Over Hierarchy</h5>
                            <p class="card-text">
                                Good ideas can come from anywhere. We encourage open
                                discussion, shared ownership, and respectful disagreement.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div>
                    <div class="card cultures-card">
                        <img
                            src="{{ asset($constants['IMAGEFILEPATH'] . 'careers/bias-toward-simplicity.svg') }}"
                            width="513px"
                            height="220px"
                            loading="lazy"
                            class="card-img-top"
                            alt="Bias Toward Simplicity " />
                        <div class="card-body">
                            <h5 class="card-title">Bias Toward Simplicity</h5>
                            <p class="card-text">
                                Clear thinking and thoughtful solutions. Complexity is a
                                problem to solve—not celebrate.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Card 4 -->
                <div>
                    <div class="card cultures-card">
                        <img
                            src="{{ asset($constants['IMAGEFILEPATH'] . 'careers/trust-ownership.svg') }}"
                            width="513px"
                            height="220px"
                            loading="lazy"
                            class="card-img-top"
                            alt="Trust & Ownership " />
                        <div class="card-body">
                            <h5 class="card-title">Trust & Ownership</h5>
                            <p class="card-text">
                                We trust our team and give them ownership over their work.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Card 5 -->
                <div>
                    <div class="card cultures-card">
                        <img
                            src="{{ asset($constants['IMAGEFILEPATH'] . 'careers/continuous-learning.svg') }}"
                            width="513px"
                            height="220px"
                            loading="lazy"
                            class="card-img-top"
                            alt="Continuous Learning " />
                        <div class="card-body">
                            <h5 class="card-title">Continuous Learning</h5>
                            <p class="card-text">
                                Mentorship, feedback, and freedom to explore new ideas.
                            </p>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="card cultures-card">
                        <img
                            src="{{ asset($constants['IMAGEFILEPATH'] . 'careers/impact-driven-work.svg') }}"
                            width="513px"
                            height="220px"
                            loading="lazy"
                            class="card-img-top"
                            alt="Continuous Learning " />
                        <div class="card-body">
                            <h5 class="card-title">Impact-Driven Work</h5>
                            <p class="card-text">
                                Every contribution matters. We focus on building solutions
                                that create meaningful impact for users and teams.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="benefits-section">
        <div class="container content-wrapper">
            <!-- ✅ MAIN SECTION HEADING -->
            <h2 class="benefits-title">Benefits</h2>

            <div class="benefits-wrapper">
                <!-- LEFT IMAGE -->
                <div class="benefits-image">
                    <img
                        src="{{ asset($constants['IMAGEFILEPATH'] . 'careers/benefits.svg') }}"
                        alt="PocketOffice employee benefits and work environment"
                        loading="lazy" />
                </div>

                <!-- RIGHT CONTENT -->
                <div class="benefits-content">
                    <div class="benefits">
                        <div class="benefit">
                            <div class="benefit-header">
                                <i class="fa fa-laptop"></i>
                                <span>Work Setup & Flexibility :</span>
                            </div>
                            <span>Remote-friendly, flexible hours, home office support.</span>
                        </div>

                        <div class="benefit">
                            <div class="benefit-header">
                                <i class="fa fa-users"></i>
                                <span>Inclusive & Diverse Workplace :</span>
                            </div>
                            <span>Valuing diversity, respecting perspectives, equal
                                opportunity for growth.</span>
                        </div>

                        <div class="benefit">
                            <div class="benefit-header">
                                <i class="fa fa-line-chart"></i>
                                <span>Growth & Development :</span>
                            </div>
                            <span>Training, skill-building, mentorship, clear growth
                                paths.</span>
                        </div>

                        <div class="benefit">
                            <div class="benefit-header">
                                <i class="fa-solid fa-money-check-dollar"></i>
                                <span>Compensation & Security :</span>
                            </div>
                            <span>Competitive salary, performance-based growth, long-term
                                stability.</span>
                        </div>

                        <div class="benefit">
                            <div class="benefit-header">
                                <i class="fa fa-plane"></i>
                                <span>Time Off & Wellbeing :</span>
                            </div>
                            <span>Paid time off, flexible holidays, mental health
                                support.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="roles-section" id="open-positions">
    <div class="container content-wrapper">
        <h2>Open Positions</h2>

        <table class="role-table">
            <!-- JavaScript will inject data directly into this tbody -->
            <tbody id="job-rows">
                <tr>
                    <td colspan="3" class="text-center py-4">Loading open positions...</td>
                </tr>
            </tbody>
        </table>
    </div>
   </section>
</div>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const tableBody = document.getElementById("job-rows");
    const API_URL = "/fetch-jobs"; 

    fetch(API_URL)
        .then(response => response.json())
        .then(result => {
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

            // Map and inject the roles into rows
           // Map and inject the roles into rows using your ACF structure
            tableBody.innerHTML = jobs.map(job => {
                // 1. Get the title from the main object fallback
                const jobTitle = job.title?.rendered || "Open Position";
                
                // 2. Extract location directly from the ACF object safely
                const jobLocation = job.acf?.job_location || "Remote / Flexible";
                
                // 3. Keep your slug routing intact
                const jobUrl = job.slug ? `/job-details/${job.slug}` : '/job-details';

                return `
                    <tr>
                        <td>${job.acf?.company_name}</td>
                        <td>${job.acf?.employment_status}</td>
                        <td><a href="${jobUrl}" class="apply-link">Apply Now</a></td>
                    </tr>
                `;
            }).join('');
        })
        .catch(error => {
            console.error("Error fetching career data:", error);

            tableBody.innerHTML = `
                <tr>
                    <td colspan="3" class="text-center py-5" style="color: red;">
                        <h3>Oops! Something went wrong.</h3>
                        <p>We couldn't load job openings right now. Please refresh or try again later.</p>
                    </td>
                </tr>`;
        });
});
</script>
@endsection