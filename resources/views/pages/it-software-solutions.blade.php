    @extends('layouts.backendsettings')
    @section('title', ' IT Software Solutions & Software Development Services | Pocket Office')
    @section('meta-title', 'IT & Software Development Services | Custom Solutions')
    @section('meta-description', 'Discover IT software solutions and software development services with business software solutions designed to streamline operations, improve efficiency, and support business growth.')
    @section('meta-keywords', 'IT software development, custom solutions, cloud workspaces developers, IT services')
    @section('meta-image', 'https://pocket-office.ai/assets/img/hero-images/industries/IT-Software/Software-1.svg')
    @section('canonical', 'https://pocket-office.ai/it-software')
    @section('meta-url', 'https://pocket-office.ai/it-software')
    @section('structured-data')
    @verbatim
    {
      "@context": "https://schema.org",
      "@type": "WebPage",
      "name": "IT & Software | Pocket Office",
      "url": "https://pocket-office.ai/it-software",
      "description": "Discover IT software solutions and software development services with business software solutions designed to streamline operations, improve efficiency, and support business growth.",
      "inLanguage": "en",
      "image": "https://pocket-office.ai/assets/img/hero-images/industries/IT-Software/Software-1.svg",
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
    @include('layouts.industry_hero', ['bgImage' => 'hero-images/industries/IT-Software/Software-1.svg'])
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
                <h1>IT & Software Devlopment</h1>
            </div>
            <div class="banner-it">
                <img
                    src="./assets/img/hero-images/industries/IT-Software/Software-2.svg"
                    alt="governance technology"
                    loading="lazy" />
                <div class="overlay">
                    <div class="overlay-text">
                        <h3> Transforming Ideas into Intelligent IT Software Solutions</h3>
                        <p>Custom software, cloud strategy & enterprise IT excellence</p>
                    </div>
                </div>
            </div>
            <!-- Overview -->
            <div class="section">
                <h2>An overview</h2>
                <p>
                    PocketOffice provides developers with a centralized workspace to access code, documentation, tools, and internal systems seamlessly across devices, supporting efficient IT software solutions and modern development workflows.
                </p>
            </div>

            <!-- Ready Section -->
            <div class="section">
                <h2>We are ready</h2>

                <p>
                     PocketOffice provides software development services and developer workspace management solutions that help create consistent environments for modern development teams.
                </p>
                <div class="features">
                    <div class="feature">
                        <h4>Centralized Developer Workspace</h4>
                        <h6>Everything developers need, in one place.</h6>
                        <p>
                            Business software solutions provide access to documentation, internal tools, dashboards, and systems from a single cloud desktop, reducing environment fragmentation and improving team productivity.
                        </p>
                    </div>
                    <div class="feature">
                        <h4>Device-Independent Workflows</h4>
                        <h6>Work from anywhere without setup.</h6>
                        <p>
                            Software development services can support flexible development workflows, allowing developers to move between laptops, desktops, or remote environments without reconfiguring tools or losing context.
                        </p>
                    </div>
                    <div class="feature">
                        <h4>Organized Technical Assets</h4>
                        <h6>Keep knowledge easy to find.</h6>
                        <p>
                             IT software solutions help keep specifications, diagrams, and internal resources structured, searchable, and accessible across development teams.
                        </p>
                    </div>
                    <div class="feature">
                        <h4>Industry Software Integration</h4>
                        <h6>Built for development environments.</h6>
                        <p>
                            PocketOffice supports software development services by integrating with tools such as GitHub, GitLab, Jira, and Bitbucket while enabling collaboration through Slack and Microsoft Teams.
                        </p>
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
                    Provides innovative IT software solutions and software development services that streamline operations, enhance user experiences, and accelerate digital transformation. With flexible business software solutions, organizations can improve collaboration, support scalable workflows, strengthen security, and build reliable technology environments designed for long-term business growth.
                </p>
            </div>
        </main>
    </div>
    @endsection