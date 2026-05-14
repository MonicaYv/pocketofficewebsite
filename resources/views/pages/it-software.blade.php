    @extends('layouts.backendsettings')
    @section('title', 'IT & Software Development Services | Custom Solutions')
    @section('meta-title', 'IT & Software Development Services | Custom Solutions')
    @section('meta-description', 'Explore Pocket Office IT and software development services, offering custom solutions and secure cloud workspaces for developers and IT teams.')
    @section('meta-keywords', 'IT software development, custom solutions, cloud workspaces developers, IT services')
    @section('meta-image', 'https://pocketdesk.sizaf.com/assets/img/hero-images/industries/IT-Software/Software-1.svg')
    @section('canonical', 'https://pocketdesk.sizaf.com/it-software')
    @section('meta-url', 'https://pocketdesk.sizaf.com/it-software')
    @section('structured-data')
    @verbatim
    {
      "@context": "https://schema.org",
      "@type": "WebPage",
      "name": "IT & Software | Pocket Office",
      "url": "https://pocketdesk.sizaf.com/it-software",
      "description": "Explore Pocket Office IT and software development services, offering custom solutions and secure cloud workspaces for developers and IT teams.",
      "inLanguage": "en",
      "image": "https://pocketdesk.sizaf.com/assets/img/hero-images/industries/IT-Software/Software-1.svg",
      "publisher": {
        "@type": "Organization",
        "name": "Pocket Office",
        "url": "https://pocketdesk.sizaf.com",
        "logo": {
          "@type": "ImageObject",
          "url": "https://pocketdesk.sizaf.com/assets/img/logo/pocket-office-tm-final-logo.png"
        }
      }
    }
    @endverbatim
    @endsection
    @section('content')
    <!-- breadcrumb area start -->
    <div
        class="breadcrumb-area"
        style="
        background-image: url(assets/img/hero-images/industries/IT-Software/Software-1.svg);
      ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner">
                        <h1 class="page-title"></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area End -->

    <!--Logistics & Supply Chain Area Start-->
    <div class="main-container">
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
                        <h3>Transforming ideas into intelligent systems</h3>
                        <p>Custom software, cloud strategy & enterprise IT excellence</p>
                    </div>
                </div>
            </div>
            <!-- Overview -->
            <div class="section">
                <h2>An overview</h2>
                <p>
                    PocketOffice provides developers with a centralized workspace to
                    access code, documentation, tools, and internal systems seamlessly
                    across devices.
                </p>
            </div>

            <!-- Ready Section -->
            <div class="section">
                <h2>We are ready</h2>

                <p>
                    PocketOffice provides Developer Workspace Management Consistent
                    environments for modern development teams.
                </p>
                <div class="features">
                    <div class="feature">
                        <h4>Centralized Developer Workspace</h4>
                        <h6>Everything developers need, in one place.</h6>
                        <p>
                            Documentation, internal tools, dashboards, and systems are
                            accessible from a single cloud desktop, reducing environment
                            fragmentation.
                        </p>
                    </div>
                    <div class="feature">
                        <h4>Device-Independent Workflows</h4>
                        <h6>Work from anywhere without setup.</h6>
                        <p>
                            Developers can move between laptops, desktops, or remote
                            environments without reconfiguring tools or losing context.
                        </p>
                    </div>
                    <div class="feature">
                        <h4>Organized Technical Assets</h4>
                        <h6>Keep knowledge easy to find.</h6>
                        <p>
                            Specifications, diagrams, and internal resources stay
                            structured, searchable, and accessible across teams.
                        </p>
                    </div>
                    <div class="feature">
                        <h4>Industry Software Integration</h4>
                        <h6>Built for development environments.</h6>
                        <p>
                            Integrates with tools such as GitHub, GitLab, Jira, and
                            Bitbucket while supporting collaboration through Slack and
                            Microsoft Teams.
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
                    Provides innovative IT and software development solutions that
                    streamline operations, enhance user experiences, and accelerate
                    digital transformation while ensuring security, scalability, and
                    long-term reliability.
                </p>
            </div>
        </main>
    </div>
    @endsection

    <script>
        const currentPage = window.location.pathname.split("/").pop();
        document.querySelectorAll(".sidebar a").forEach((link) => {
            if (link.getAttribute("href") === currentPage) {
                link.classList.add("active");
            }
        });
    </script>