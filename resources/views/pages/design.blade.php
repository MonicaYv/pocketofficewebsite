    @extends('layouts.backendsettings')
    @section('title', 'Design & Media Services | Creative Branding Solutions')
    @section('meta-title', 'Design & Media Services | Creative Branding Solutions')
    @section('meta-description', 'Explore Pocket Office for design and media services, offering creative branding solutions and secure cloud workspaces for media professionals.')
    @section('meta-keywords', 'design media services, creative branding solutions, media workspaces, cloud design tools')
    @section('meta-image', 'https://pocketdesk.sizaf.com/assets/img/hero-images/industries/Design/Design 1.svg')
    @section('canonical', 'https://pocketdesk.sizaf.com/design')
    @section('meta-url', 'https://pocketdesk.sizaf.com/design')
    @section('structured-data')
    @verbatim
    {
      "@context": "https://schema.org",
      "@type": "WebPage",
      "name": "Design & Media | Pocket Office",
      "url": "https://pocketdesk.sizaf.com/design",
      "description": "Explore Pocket Office for design and media services, offering creative branding solutions and secure cloud workspaces for media professionals.",
      "inLanguage": "en",
      "image": "https://pocketdesk.sizaf.com/assets/img/hero-images/industries/Design/Design 1.svg",
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
        background-image: url('{{ asset($constants['IMAGEFILEPATH'] . 'hero-images/industries/Design/Design\ 1.svg') }}');
      ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12"></div>
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
                <h1>Design & Media Studios</h1>
            </div>
            <div class="banner">
                <img
                    src="{{ asset($constants['IMAGEFILEPATH'] . 'hero-images/industries/Design/Design 2.svg') }}"
                    alt="governance technology"
                    loading="lazy" />
                <div class="overlay">
                    <div class="overlay-text">
                        <h3>Creative vision, crafted beautifully</h3>
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
                    Design teams can store, organize, and collaborate on large design
                    files in shared workspaces while maintaining version control and
                    proper permissions.
                </p>
            </div>

            <!-- Ready Section -->
            <div class="section">
                <h2>We are ready</h2>

                <p>
                    PocketOffice provides Asset Management & Collaboration. Manage
                    creative assets without chaos.
                </p>
                <div class="features">
                    <div class="feature">
                        <h4>Centralized Creative Assets</h4>
                        <h6>All designs in one workspace.</h6>
                        <p>
                            Large design files, media assets, and project folders are
                            organized in a single cloud desktop, reducing duplication and
                            confusion.
                        </p>
                    </div>
                    <div class="feature">
                        <h4>Real-Time Collaboration</h4>
                        <h6>Create together without confusion.</h6>
                        <p>
                            Designers, reviewers, and stakeholders can work on the same
                            assets with clear visibility and fewer version conflicts.
                        </p>
                    </div>
                    <div class="feature">
                        <h4>Device-Friendly Creativity</h4>
                        <h6>Create anywhere inspiration strikes.</h6>
                        <p>
                            Switch seamlessly between studio systems and personal devices
                            without disrupting creative workflows.
                        </p>
                    </div>
                    <div class="feature">
                        <h4>Industry Software Integration</h4>
                        <h6>Works with leading creative platforms.</h6>
                        <p>
                            Supports integration with Adobe Creative Cloud, Figma, and Canva
                            while connecting with cloud storage tools for easy file sharing.
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
                    Provides innovative design and creative solutions that bring ideas
                    to life, strengthen brand identity, and deliver visually compelling
                    experiences that engage audiences and drive meaningful impact.
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