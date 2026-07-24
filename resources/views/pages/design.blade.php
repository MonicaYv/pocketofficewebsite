    @extends('layouts.backendsettings')
    @section('title', 'Website Design & Web Design Services | Pocket Office')
    @section('meta-title', 'Website Design & Web Design Services | Pocket Office')
    @section('meta-description', 'Get professional website design and web design services with responsive web design solutions to create engaging, user-friendly websites that support business growth.')
    @section('meta-keywords', 'website design, web design services, responsive web design, web design solutions, user-friendly websites, business growth')
    @section('meta-image', 'https://pocket-office.ai/assets/img/hero-images/industries/Design/Design 1.svg')
    @section('canonical', 'https://pocket-office.ai/design')
    @section('meta-url', 'https://pocket-office.ai/design')
    @section('structured-data')
    @verbatim
    {
      "@context": "https://schema.org",
      "@type": "WebPage",
      "name": "Design & Media | Pocket Office",
      "url": "https://pocket-office.ai/design",
      "description": "Get professional website design and web design services with responsive web design solutions to create engaging, user-friendly websites that support business growth.",
      "inLanguage": "en",
      "image": "https://pocket-office.ai/assets/img/hero-images/industries/Design/Design 1.svg",
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
@include('layouts.industry_hero', ['bgImage' => 'hero-images/industries/Design/Design 1.svg'])
    <!-- breadcrumb area End -->

    <!--Logistics & Supply Chain Area Start-->
    <div class="main-container content-wrapper">
        <!-- Sidebar -->
        <aside class="sidebar">
            <h2><strong>Industry Solutions</strong></h2>
            @include('pages.industry_solution')
        </aside>

        <!-- Main Content -->
        <main class="main">
            <!-- Hero -->
            <div class="hero">
                <h1>Design & Media Studios</h1>
            </div>
            <div class="banner">
                <img
                    src="{{ asset($constants['IMAGEFILEPATH'] . 'hero-images/industries/Design/Design 2.svg') }}"
                    alt="governance technology"
                    loading="lazy" />
                <div class="overlay">
                    <div class="overlay-text">
                        <h3>Creative Vision, Crafted Beautifully with Website Design</h3>
                        <p>
                            Designing brands, experiences & digital stories that inspire
                        </p>
                    </div>
                </div>
            </div>
            <!-- Overview -->
            <div class="section">
                <h2>An overview</h2>
                <p>
                    Design teams can store, organize, and collaborate on large design files in shared workspaces while maintaining version control and proper permissions. PocketOffice supports website design teams with secure workspaces that simplify creative collaboration and asset management.
                </p>
            </div>

            <!-- Ready Section -->
            <div class="section">
                <h2>We are ready</h2>

                <p>
                    PocketOffice provides web design services, asset management, and collaboration solutions that help creative teams manage digital assets efficiently and work together without chaos.
                </p>
                <div class="features">
                    <div class="feature industry-container">
                        <div class="feature-icon">
                            <img src="/assets/img/industry-icons/centralized-creative.svg" alt="industry-icon">
                        </div>
                        <div>
                            <h4>Centralized Creative Assets</h4>
                            <h6>All designs in one workspace.</h6>
                            <p>
                                Large design files, media assets, and project folders are
                                organized in a single cloud desktop, reducing duplication and
                                confusion.
                            </p>
                        </div>
                    </div>
                    <div class="feature industry-container">
                        <div class="feature-icon">
                            <img src="/assets/img/industry-icons/real-time-design.svg" alt="industry-icon">
                        </div>
                        <div>
                            <h4>Real-Time Collaboration</h4>
                            <h6>Create together without confusion.</h6>
                            <p>
                                Designers, reviewers, and stakeholders can work on the same
                                assets with clear visibility and fewer version conflicts.
                            </p>
                        </div>
                    </div>
                    <div class="feature industry-container">
                        <div class="feature-icon">
                            <img src="/assets/img/industry-icons/device-friendly.svg" alt="industry-icon">
                        </div>
                        <div>
                            <h4>Device-Friendly Creativity</h4>
                            <h6>Create anywhere inspiration strikes.</h6>
                            <p>
                                Switch seamlessly between studio systems and personal devices without disrupting creative workflows. Support responsive web design projects with flexible access to creative assets across devices.
                            </p>
                        </div>
                    </div>
                    <div class="feature industry-container">
                        <div class="feature-icon">
                            <img src="/assets/img/industry-icons/industry-software-design.svg" alt="industry-icon">
                        </div>
                         <div>
                            <h4>Industry Software Integration</h4>
                            <h6>Works with leading creative platforms.</h6>
                            <p>
                                PocketOffice supports web design services by integrating with Adobe Creative Cloud, Figma, and Canva while connecting with cloud storage tools for easy file sharing.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="services">
                <div class="service">
                    <h3>
                        <i class="fa fa-check-circle-o me-2 text-success"></i> Pocket
                        Office powers modern work
                    </h3>
                    <p>
                        At Pocket Office, we deliver secure and scalable Desktop as a
                        Service (DaaS) solutions that enable organizations to access their
                        work environment anytime, anywhere. By centralizing desktops in
                        the cloud, we simplify IT management, enhance security, and ensure
                        seamless collaboration across teams.
                    </p>
                </div>
                <div class="service">
                    <h3>
                        <i class="fa fa-globe me-2 text-primary"></i> A smarter way to
                        work
                    </h3>
                    <p>
                        With Pocket Office, businesses can reduce infrastructure costs,
                        improve flexibility, and support remote or hybrid workforces with
                        ease. Our cloud-hosted desktops provide reliable performance,
                        enterprise-grade security, and effortless scalability to meet
                        evolving business demands.
                    </p>
                </div>
            </div>
            <!-- Services -->
            <div class="services-heading">
                <h1>Benefits</h1>
                <p>
                    Provides innovative website design and creative solutions that bring ideas to life, strengthen brand identity, and deliver visually compelling experiences. With web design services and responsive web design capabilities, businesses can create engaging digital experiences that connect with audiences and drive meaningful impact.
                </p>
            </div>
        </main>
    </div>
    @endsection