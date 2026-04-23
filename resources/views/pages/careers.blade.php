@extends('layouts.backendsettings')
@section('title', 'Careers at Pocket Office | Join Our Cloud Desktop Team')
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
        <div class="container">
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
        <div class="container">
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
        <div class="container">
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
                                <i class="fa fa-money"></i>
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
        <div class="container">
            <h2>Open Positions</h2>

            <table class="role-table">
                <tbody>
                    <tr>
                        <td>Account Executive, APAC</td>
                        <td>India</td>
                        <td><a href="job-details.html">Apply Now</a></td>
                    </tr>
                    <tr>
                        <td>Account Executive, APAC</td>
                        <td>India</td>
                        <td><a href="job-details.html">Apply Now</a></td>
                    </tr>
                    <tr>
                        <td>Account Executive, APAC</td>
                        <td>India</td>
                        <td><a href="job-details.html">Apply Now</a></td>
                    </tr>
                    <tr>
                        <td>Account Executive, APAC</td>
                        <td>India</td>
                        <td><a href="job-details.html">Apply Now</a></td>
                    </tr>
                    <tr>
                        <td>Account Executive, APAC</td>
                        <td>India</td>
                        <td><a href="job-details.html">Apply Now</a></td>
                    </tr>
                    <tr>
                        <td>Account Executive, APAC</td>
                        <td>India</td>
                        <td><a href="job-details.html">Apply Now</a></td>
                    </tr>
                    <tr>
                        <td>Account Executive, APAC</td>
                        <td>India</td>
                        <td><a href="job-details.html">Apply Now</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</div>
@endsection