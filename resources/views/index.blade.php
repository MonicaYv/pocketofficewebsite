<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pocketoffice</title>
    <link rel="icon" type="image/svg+xml" href="assets/img/logo/fav-icon.svg">
    <!-- bootstrap -->
    <link rel="stylesheet" href="public/assets/css/bootstrap.min.css">
    <!-- icons -->
    <link rel="stylesheet" href="public/assets/css/font-awesome.min.css" />
    <link rel="stylesheet" href="public/assets/css/themify-icons.css" />
    <link rel="stylesheet" href="public/assets/css/magnific-popup.css" />
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="public/assets/css/style.css">
    <link rel="stylesheet" href="vassets/css/enquiry.css">
    <!-- responsive Stylesheet -->
    <link rel="stylesheet" href="public/assets/css/responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
    <!-- preloader area start -->
    <div class="preloader" id="preloader">
        <div class="preloader-inner">
            <div class="spinner">
                <div class="dot1"></div>
                <div class="dot2"></div>
            </div>
        </div>
    </div>
    <!-- preloader area end -->
    <!-- //. search Popup -->
    <div class="body-overlay" id="body-overlay"></div>
    <div class="search-popup" id="search-popup">
        <form onsubmit="searchPage(event)" class="search-form">
            <div class="form-group">
                <input type="text" class="form-control" id="search-input" placeholder="Search....." />
            </div>
            <button type="submit" class="submit-btn">
                <i class="fa fa-search"></i>
            </button>
            <div id="search-results" class="search-results"></div>
        </form>
    </div>
    <!-- navbar area start -->
    <nav class="navbar navbar-area navbar-expand-lg nav-style-01">
        <div class="top-nav">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-9">
                        <a href="#" id="sales-enquiry-trigger">Sales Enquiry</a>
                        <span class="divider">|</span>
                        <a href="https://helpdesk.pocketoffice.sizaf.com/submit-ticket">Submit a
                            Ticket</a>
                        <span class="divider">|</span>
                        <a href="contact-us.html">Contact us</a>
                    </div>
                    <div class="col-md-3 text-md-end">
                        <div class="nav-right">
                            <a href="pricing.html" class="order-now-btn btn-radius btn-green s-animate-3">Order now</a>
                            <a href="https://pocketoffice.sizaf.com/" target="_blank"
                                class="order-now-btn btn-radius btn-green s-animate-3">Customer Login</a>
                            <a href="https://helpdesk.pocketoffice.sizaf.com/staff/login" target="_blank"
                                class="order-now-btn btn-radius btn-green s-animate-3">NOC Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container nav-container">
            <div class="responsive-mobile-menu">
                <div class="logo-wrapper mobile-logo">
                    <a href="index.html" class="logo custom-width"></a>
                </div>
                <div class="nav-right-content default-blue">
                    <ul>
                        <li class="search">
                            <i class="ti-search"></i>
                        </li>
                    </ul>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#MapUI_main_menu"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggle-icon default-blue">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                    </span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="MapUI_main_menu">
                <div class="logo-wrapper desktop-logo">
                    <a href="index.html" class="logo custom-width"></a>
                </div>
                <ul class="navbar-nav default-blue">

                    <!-- Products Mega Menu -->
                    <li class="mega-menu-item">
                        <a href="#" class="mega-menu-trigger">Products</a>
                        <div class="mega-menu-dropdown">
                            <div class="mega-menu-container products-mega-menu">
                                <div class="mega-menu-content">
                                    <!-- Core Features Section -->
                                    <div class="mega-menu-section">
                                        <h3 class="mega-section-heading">Core Features</h3>
                                        <ul class="mega-section-list">
                                            <li class="mega-section-item">
                                                <a href="core-features.html?tab=cloud" class="mega-item-link">
                                                    <strong class="mega-item-title">Cloud Desktop Environment</strong>
                                                </a>
                                            </li>
                                            <li class="mega-section-item">
                                                <a href="core-features.html?tab=file" class="mega-item-link">
                                                    <strong class="mega-item-title">File Manager & Storage</strong>
                                                </a>
                                            </li>
                                            <li class="mega-section-item">
                                                <a href="core-features.html?tab=window" class="mega-item-link">
                                                    <strong class="mega-item-title">Window-based Multitasking</strong>
                                                </a>
                                            </li>
                                            <li class="mega-section-item">
                                                <a href="core-features.html?tab=launcher" class="mega-item-link">
                                                    <strong class="mega-item-title">App Launcher</strong>
                                                </a>
                                            </li>
                                            <li class="mega-section-item">
                                                <a href="core-features.html?tab=drag" class="mega-item-link">
                                                    <strong class="mega-item-title">Drag & Drop UI</strong>
                                                </a>
                                            </li>
                                            <li class="mega-section-item">
                                                <a href="core-features.html?tab=keyboard" class="mega-item-link">
                                                    <strong class="mega-item-title">Keyboard Shortcuts</strong>
                                                </a>
                                            </li>
                                            <li class="mega-section-item">
                                                <a href="core-features.html?tab=sync" class="mega-item-link">
                                                    <strong class="mega-item-title">Multi-device Sync</strong>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <!-- Collaboration Section -->
                                    <div class="mega-menu-section">
                                        <h3 class="mega-section-heading">Collaboration</h3>
                                        <ul class="mega-section-list">
                                            <li class="mega-section-item">
                                                <a href="collaboration.html?tab=realtime" class="mega-item-link">
                                                    <strong class="mega-item-title whitespace-nowrap">Real-time File
                                                        Sharing</strong>
                                                </a>
                                            </li>
                                            <li class="mega-section-item">
                                                <a href="collaboration.html?tab=workspace" class="mega-item-link">
                                                    <strong class="mega-item-title">Shared Workspaces</strong>
                                                </a>
                                            </li>
                                            <li class="mega-section-item">
                                                <a href="collaboration.html?tab=permissions" class="mega-item-link">
                                                    <strong class="mega-item-title">Team Permissions</strong>
                                                </a>
                                            </li>
                                            <li class="mega-section-item">
                                                <a href="collaboration.html?tab=activity" class="mega-item-link">
                                                    <strong class="mega-item-title">Activity Tracking</strong>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <!-- Security Section -->
                                    <div class="mega-menu-section">
                                        <h3 class="mega-section-heading">Security</h3>
                                        <ul class="mega-section-list">
                                            <li class="mega-section-item">
                                                <a href="security.html?tab=realtime" class="mega-item-link">
                                                    <strong class="mega-item-title">Role-based Access</strong>
                                                </a>
                                            </li>
                                            <li class="mega-section-item">
                                                <a href="security.html?tab=workspace" class="mega-item-link">
                                                    <strong class="mega-item-title">Backup & Recovery</strong>
                                                </a>
                                            </li>
                                            <li class="mega-section-item">
                                                <a href="security.html?tab=permissions" class="mega-item-link">
                                                    <strong class="mega-item-title">Data Privacy Compliance</strong>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="mega-menu-item">
                        <a href="#" class="mega-menu-trigger">Solutions</a>
                        <div class="mega-menu-dropdown">
                            <div class="mega-menu-container solutions-mega-menu">
                                <div class="mega-menu-content">
                                    <!-- Core Features Section -->
                                    <div class="mega-menu-section">
                                        <h3 class="mega-section-heading">By Team Type</h3>
                                        <ul class="mega-section-list">
                                            <li class="mega-section-item">
                                                <a href="team-type.html?tab=remote" class="mega-item-link">
                                                    <strong class="mega-item-title">Remote Teams</strong>
                                                </a>
                                            </li>
                                            <li class="mega-section-item">
                                                <a href="team-type.html?tab=startups" class="mega-item-link">
                                                    <strong class="mega-item-title">Startups</strong>
                                                </a>
                                            </li>
                                            <li class="mega-section-item">
                                                <a href="team-type.html?tab=enterprises" class="mega-item-link">
                                                    <strong class="mega-item-title">Enterprises</strong>
                                                </a>
                                            </li>
                                            <li class="mega-section-item">
                                                <a href="team-type.html?tab=freelancers" class="mega-item-link">
                                                    <strong class="mega-item-title">Freelancers</strong>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Security Section -->
                                    <div class="mega-menu-section">
                                        <h3 class="mega-section-heading">By Use Case</h3>
                                        <ul class="mega-section-list">
                                            <li class="mega-section-item">
                                                <a href="use-case.html?tab=file-sharing" class="mega-item-link">
                                                    <strong class="mega-item-title">File Sharing</strong>
                                                </a>
                                            </li>
                                            <li class="mega-section-item">
                                                <a href="use-case.html?tab=virtual-desktop" class="mega-item-link">
                                                    <strong class="mega-item-title">Virtual Desktop</strong>
                                                </a>
                                            </li>
                                            <li class="mega-section-item">
                                                <a href="use-case.html?tab=team-workspaces" class="mega-item-link">
                                                    <strong class="mega-item-title">Team Workspaces</strong>
                                                </a>
                                            </li>
                                            <li class="mega-section-item">
                                                <a href="use-case.html?tab=cloud-storage" class="mega-item-link">
                                                    <strong class="mega-item-title">Cloud Storage</strong>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="mega-menu-section ">
                                        <h3 class="mega-section-heading">Integration</h3>
                                        <div class="integration-menu">
                                            <ul class="mega-section-list">
                                                <li class="mega-section-item">
                                                    <a href="integrations.html?tab=alibaba" class="mega-item-link">
                                                        <strong class="mega-item-title">Alibaba OSS</strong>
                                                    </a>
                                                </li>


                                                <li class="mega-section-item">
                                                    <a href="integrations.html?tab=tencent-ios" class="mega-item-link">
                                                        <strong class="mega-item-title">Tencent COS</strong>
                                                    </a>
                                                </li>

                                                <li class="mega-section-item">
                                                    <a href="integrations.html?tab=qiniucloud" class="mega-item-link">
                                                        <strong class="mega-item-title">Qiniu Cloud</strong>
                                                    </a>
                                                </li>
                                                <li class="mega-section-item">
                                                    <a href="integrations.html?tab=amazon-s3" class="mega-item-link">
                                                        <strong class="mega-item-title">Amazon S3</strong>
                                                    </a>
                                                </li>

                                                <li class="mega-section-item">
                                                    <a href="integrations.html?tab=tianyi-cloud" class="mega-item-link">
                                                        <strong class="mega-item-title">Tianyi Cloud</strong>
                                                    </a>
                                                </li>

                                                <li class="mega-section-item">
                                                    <a href="integrations.html?tab=sds" class="mega-item-link">
                                                        <strong class="mega-item-title">XSKY SDS</strong>
                                                    </a>
                                                </li>
                                            </ul>
                                            <ul class="mega-section-list">
                                                <li class="mega-section-item">
                                                    <a href="integrations.html?tab=sangfor-eds" class="mega-item-link">
                                                        <strong class="mega-item-title">Sangfor EDS</strong>
                                                    </a>
                                                </li>

                                                <li class="mega-section-item">
                                                    <a href="integrations.html?tab=min-io" class="mega-item-link">
                                                        <strong class="mega-item-title">MinIO</strong>
                                                    </a>
                                                </li>

                                                <li class="mega-section-item">
                                                    <a href="integrations.html?tab=ftp" class="mega-item-link">
                                                        <strong class="mega-item-title">FTP</strong>
                                                    </a>
                                                </li>

                                                <li class="mega-section-item">
                                                    <a href="integrations.html?tab=web-dav" class="mega-item-link">
                                                        <strong class="mega-item-title">WebDAV</strong>
                                                    </a>
                                                </li>



                                                <li class="mega-section-item">
                                                    <a href="integrations.html?tab=one-drive" class="mega-item-link">
                                                        <strong class="mega-item-title">OneDrive</strong>
                                                    </a>
                                                </li>

                                                <li class="mega-section-item">
                                                    <a href="integrations.html?tab=google-drive" class="mega-item-link">
                                                        <strong class="mega-item-title">Google Drive</strong>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="mega-menu-item">
                        <a href="#" class="mega-menu-trigger">Industries</a>
                        <div class="mega-menu-dropdown">
                            <div class="mega-menu-container">
                                <div class="mega-menu-content">
                                    <!-- Core Features Section -->
                                    <div class="mega-menu-section">
                                        <h3 class="mega-section-heading">Industries</h3>
                                        <div class="industry-menu">
                                            <ul class="mega-section-list ">
                                                <li class="mega-section-item">
                                                    <a href="bpo.html" class="mega-item-link">
                                                        <strong class="mega-item-title">BPO Outsourcing</strong>
                                                    </a>
                                                </li>

                                                <li class="mega-section-item">
                                                    <a href="consulting.html" class="mega-item-link">
                                                        <strong class="mega-item-title">Consulting</strong>
                                                    </a>
                                                </li>

                                                <li class="mega-section-item">
                                                    <a href="design.html" class="mega-item-link">
                                                        <strong class="mega-item-title">Design & Media
                                                            Studios</strong>
                                                    </a>
                                                </li>

                                                <li class="mega-section-item">
                                                    <a href="education.html" class="mega-item-link">
                                                        <strong class="mega-item-title">Education</strong>
                                                    </a>
                                                </li>

                                                <li class="mega-section-item">
                                                    <a href="finance-accounting.html" class="mega-item-link">
                                                        <strong class="mega-item-title">Finance & Accounting</strong>
                                                    </a>
                                                </li>

                                                <li class="mega-section-item">
                                                    <a href="healthcare.html" class="mega-item-link">
                                                        <strong class="mega-item-title">Healthcare</strong>
                                                    </a>
                                                </li>






                                            </ul>
                                            <ul class="mega-section-list industry-list">

                                                <li class="mega-section-item">
                                                    <a href="it-software.html" class="mega-item-link">
                                                        <strong class="mega-item-title">IT & Software
                                                            Development</strong>
                                                    </a>
                                                </li>

                                                <li class="mega-section-item">
                                                    <a href="legal-services.html" class="mega-item-link">
                                                        <strong class="mega-item-title">Legal Services</strong>
                                                    </a>
                                                </li>

                                                <li class="mega-section-item">
                                                    <a href="manufacturing.html" class="mega-item-link">
                                                        <strong class="mega-item-title">Manufacturing</strong>
                                                    </a>
                                                </li>


                                                <li class="mega-section-item">
                                                    <a href="media-publishing.html" class="mega-item-link">
                                                        <strong class="mega-item-title">Media & Publishing</strong>
                                                    </a>
                                                </li>
                                                <li class="mega-section-item">
                                                    <a href="retail-ecommerce.html" class="mega-item-link">
                                                        <strong class="mega-item-title">Retail & E-commerce</strong>
                                                    </a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="./pricing.html">Pricing</a>
                    </li>
                    <li class="mega-menu-item">
                        <a href="#" class="mega-menu-trigger">Resources</a>
                        <div class="mega-menu-dropdown">
                            <div class="mega-menu-container">
                                <div class="mega-menu-content">
                                    <div class="mega-menu-section">
                                        <h3 class="mega-section-heading">Resources</h3>
                                        <ul class="mega-section-list">
                                            <li class="mega-section-item">
                                                <a href="documentation.html" class="mega-item-link">
                                                    <strong class="mega-item-title">Documentation</strong>
                                                </a>
                                            </li>
                                            <li class="mega-section-item">
                                                <a href="faq.html" class="mega-item-link">
                                                    <strong class="mega-item-title">FAQs</strong>
                                                </a>
                                            </li>
                                            <li class="mega-section-item">
                                                <a href="blog.html" class="mega-item-link">
                                                    <strong class="mega-item-title whitespace-nowrap">
                                                        Updates</strong>
                                                </a>
                                            </li>
                                            <li class="mega-section-item">
                                                <a href="news.html" class="mega-item-link">
                                                    <strong class="mega-item-title whitespace-nowrap">Latest
                                                        News</strong>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="mega-menu-section">
                                        <h3 class="mega-section-heading">Company</h3>
                                        <ul class="mega-section-list">
                                            <li class="mega-section-item">
                                                <a href="about.html" class="mega-item-link">
                                                    <strong class="mega-item-title">About Us</strong>
                                                </a>
                                            </li>
                                            <li class="mega-section-item">
                                                <a href="careers.html" class="mega-item-link">
                                                    <strong class="mega-item-title">Careers</strong>
                                                </a>
                                            </li>
                                            <li class="mega-section-item">
                                                <a href="contact-us.html" class="mega-item-link">
                                                    <strong class="mega-item-title">Contact</strong>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="mega-menu-section">
                                        <h3 class="mega-section-heading">Legal</h3>
                                        <ul class="mega-section-list">
                                            <li class="mega-section-item">
                                                <a href="terms-condition.html" class="mega-item-link">
                                                    <strong class="mega-item-title whitespace-nowrap">Terms &
                                                        Conditions</strong>
                                                </a>
                                            </li>
                                            <li class="mega-section-item">
                                                <a href="privacy.html" class="mega-item-link">
                                                    <strong class="mega-item-title">Privacy Policy</strong>
                                                </a>
                                            </li>
                                            <li class="mega-section-item">
                                                <a href="disclaimer.html" class="mega-item-link">
                                                    <strong class="mega-item-title">Disclaimer</strong>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>






                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="menu-item-has-children d-lg-none">
                        <a href="#">More</a>
                        <ul class="sub-menu">
                            <li><a href="sales-enquiry.html">Sales Enquiry</a></li>
                            <li> <a href="submit-ticket.html" target="_blank">Submit
                                    a Ticket</a></li>
                            <li><a href="contact-us.html">Contact Us</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="nav-right-content default-blue">
                <ul>
                    <li class="search">
                        <i class="ti-search" id="search-btn"></i>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- navbar area end -->

    <!-- header area start -->
    <section class="hero-header">
        <!-- Background Image -->
        <div class="hero-bg">
            <img src="assets/img/Hero Section.webp"
                srcset="assets/img/Hero Section.webp 480w,assets/img/Hero Section.webp 1200w"
                sizes="(max-width: 768px) 100vw, 1200px"
                alt="Digital productivity interface with modern workspace layout" width="1200" height="900"
                loading="lazy" />
        </div>
        <div class="">
            <div class="hero-wrapper">

                <!-- Main Hero Content -->
                <div class="hero-content">

                    <h1>
                        A <span class="highlight-text">Cloud Desktop</span> That <br> Runs Everywhere.
                    </h1>

                    <p class="hero-subtitle">
                        A browser-based workspace that brings your files, apps, and teams into one secure, unified
                        environment.
                    </p>

                    <div class="hero-buttons">
                        <a href="/contact-us.html" class="btn-primary">Start Building</a>
                        <a href="/core-features.html" class="btn-secondary">
                            Explore Features →
                        </a>
                    </div>

                    <p class="hero-tagline">Runs on any device · No installation required</p>
                </div>

            </div>
        </div>
    </section>
    <!-- header area End -->
    <section class="how-section">
        <div class="how-wrapper">

            <div class="how-header">
                <h2>A modern cloud desktop<br>for focused, distributed teams</h2>
            </div>

            <div class="how-cards">

                <div class="how-card">
                    <div class="how-card-img">
                        <video autoplay muted loop playsinline preload="metadata">
                            <source src="/assets/animated-videos/index/access-from-anywhere.mp4" type="video/mp4">
                        </video>
                    </div>

                    <h3>Access from Anywhere</h3>
                    <p>
                        Pocketoffice runs entirely in your browser, giving you secure access to your complete desktop
                        from anywhere. No installations, no device lock-in—just log in and start working, without being
                        tied to a specific device

                    </p>
                </div>

                <div class="how-card">
                    <div class="how-card-img">
                        <video autoplay muted loop playsinline preload="metadata">
                            <source src="/assets/animated-videos/index/work-without-distraction-video.mp4"
                                type="video/mp4">
                        </video>
                    </div>

                    <h3>Work Without Distractions</h3>
                    <p>
                        Pocketoffice looks and behaves like a traditional operating system, while delivering the speed
                        and flexibility of a cloud platform. Manage files, run apps, multitask, and collaborate in one
                        unified workspace.

                    </p>
                </div>

                <div class="how-card">
                    <div class="how-card-img">
                        <video autoplay muted loop playsinline preload="metadata">
                            <source src="/assets/animated-videos/index/secure-by-design-video.mp4" type="video/mp4">
                        </video>
                    </div>

                    <h3>Secure by Design</h3>
                    <p>
                        Security in Pocketoffice is not an add-on—it’s foundational. Control access, protect data, and
                        maintain ownership without compromising usability.
                    </p>
                </div>

            </div>

        </div>
    </section>
    <section class="core-feature-section">

        <div class="core-feature-wrapper">

            <!-- HEADER -->
            <div class="core-feature-header">

                <h2>Core Features That Power Your Cloud Workspace
                </h2>
                <p>
                    Explore the essential tools and capabilities designed to enhance file management, collaboration and
                    multitasking within your PocketOffice desktop environment.

                </p>
            </div>

            <div class="core-feature-content">

                <!-- LEFT SIDE FEATURES -->
                <div class="core-feature-left">

                    <!-- COLUMN 1 -->
                    <div class="feature-column">

                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fa-solid fa-desktop"></i>
                            </div>
                            <div>
                                <h4>Cloud Desktop Environment</h4>
                                <p>
                                    Built-in system widgets such as calendar, notifications and monitoring tools
                                    keep essential information visible without leaving your workspace.
                                </p>
                            </div>
                        </div>

                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fa-solid fa-folder-open"></i>
                            </div>
                            <div>
                                <h4>File Manager & Storage</h4>
                                <p>
                                    Define who can view, edit or share files with flexible permission levels
                                    while maintaining full governance across folders.
                                </p>
                            </div>
                        </div>

                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fa-solid fa-window-restore"></i>
                            </div>
                            <div>
                                <h4>Window-based Multitasking</h4>
                                <p>
                                    Work with multiple files and applications side by side in a
                                    true desktop-style environment.
                                </p>
                            </div>
                        </div>

                    </div>

                    <!-- COLUMN 2 -->
                    <div class="feature-column">

                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fa-solid fa-rocket"></i>
                            </div>
                            <div>
                                <h4>App Launcher</h4>
                                <p>
                                    Access productivity apps, communication tools and business applications
                                    from a centralized launcher that keeps your workspace organized without
                                    interrupting workflow.


                                </p>
                            </div>
                        </div>

                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fa-solid fa-hand-pointer"></i>
                            </div>
                            <div>
                                <h4>Drag & Drop UI</h4>
                                <p>
                                    Move files, organize folders and rearrange shortcuts using simple drag-and-drop
                                    actions across your desktop workspace.


                                </p>
                            </div>
                        </div>

                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fa-solid fa-keyboard"></i>
                            </div>
                            <div>
                                <h4>Keyboard Shortcuts</h4>
                                <p>
                                    Manage files, switch windows and perform common actions
                                    quickly using familiar shortcuts.
                                </p>
                            </div>
                        </div>

                    </div>

                </div>

                <!-- RIGHT SIDE IMAGE -->
                <div class="core-feature-right">
                    <div class="feature-image-wrapper">
                        <video autoplay muted loop playsinline preload="auto">
                            <source src="/assets/animated-videos/index/index-core-features-video.mp4" type="video/mp4">
                        </video>
                    </div>
                </div>

            </div>

        </div>

    </section>
    <section class="sector-adaptive-section">
        <div class="sector-adaptive-wrapper">
            <div class="sector-main-header">
                <h2>Built for Diverse Industries & Workflows</h2>
            </div>


            <!-- Tabs -->
            <div class="sector-tabs">

                <button class="sector-tab active" data-target="education"
                    data-img="/assets/img/sectors/education-workspace.webp" data-number="01">
                    01. 🎓 Education
                </button>

                <button class="sector-tab" data-target="healthcare"
                    data-img="/assets/img/sectors/healthcare-records.webp" data-number="02">
                    02. 🏥 Healthcare
                </button>

                <button class="sector-tab" data-target="finance" data-img="/assets/img/sectors/finance-documents.webp"
                    data-number="03">
                    03. 🏦 Finance & Legal
                </button>

                <button class="sector-tab" data-target="it" data-img="/assets/img/sectors/it-documentation.webp"
                    data-number="04">
                    04. 🖥️ IT & Software
                </button>

            </div>

            <!-- Content -->
            <div class="sector-content-area">

                <!-- Education -->
                <div class="sector-content active" id="education">

                    <div class="sector-left">
                        <h1 class="sector-number">01. Education</h1>
                        <h2 class="sector-heading">
                            Empowering Digital Learning Environments
                        </h2>

                        <p class="sector-text">
                            Create unified digital classrooms for assignments, learning materials,
                            and real-time collaboration — accessible from anywhere. PocketOffice
                            helps educators manage coursework, share resources, and enable
                            secure communication across teams.
                        </p>

                        <p class="sector-text">
                            With centralized access to files and applications, institutions
                            can streamline academic workflows while ensuring flexibility
                            for both students and faculty working remotely.
                        </p>
                    </div>

                    <div class="sector-right">
                        <video autoplay muted loop playsinline loading="lazy">
                            <source src="/assets/animated-videos/index/education.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>

                </div>

                <!-- Healthcare -->
                <div class="sector-content" id="healthcare">

                    <div class="sector-left">
                        <h1 class="sector-number">02. Healthcare</h1>
                        <h2 class="sector-heading">
                            Secure Patient Data Management & Healthcare Collaboration
                        </h2>

                        <p class="sector-text">
                            Enable secure access to sensitive patient records while supporting
                            compliance, role-based access, and remote collaboration across
                            healthcare teams. PocketOffice helps professionals manage clinical
                            documents, coordinate care workflows, and maintain secure
                            communication between departments.
                        </p>

                        <p class="sector-text">
                            With centralized access to records and applications, healthcare
                            institutions can streamline administrative processes while ensuring
                            data integrity and controlled access for authorized personnel
                            working across locations.
                        </p>

                    </div>

                    <div class="sector-right">
                        <video autoplay muted loop playsinline loading="lazy">
                            <source src="/assets/animated-videos/index/healthcare.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>

                </div>

                <!-- Finance -->
                <div class="sector-content" id="finance">

                    <div class="sector-left">
                        <h1 class="sector-number">03. Finance & Legal</h1>
                        <h2 class="sector-heading">
                            Secure Financial & Legal Document Management
                        </h2>

                        <p class="sector-text">
                            Manage confidential financial documents, contracts, and reports
                            in structured workspaces with audit-ready tracking and
                            role-based access controls. PocketOffice enables teams to
                            securely organize sensitive data while ensuring compliance
                            with internal policies and regulatory standards.
                        </p>

                        <p class="sector-text">
                            With centralized access to files and applications, finance and
                            legal departments can streamline documentation workflows while
                            maintaining controlled sharing and accountability across teams
                            working across locations.
                        </p>
                    </div>


                    <div class="sector-right">
                        <video autoplay muted loop playsinline loading="lazy">
                            <source src="/assets/animated-videos/index/finance-legal.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>

                <!-- IT -->
                <div class="sector-content" id="it">

                    <div class="sector-left">
                        <h1 class="sector-number">04. IT & Software</h1>
                        <h2 class="sector-heading">
                            Centralized IT Documentation & System Access
                        </h2>

                        <p class="sector-text">
                            Provide centralized access to technical documentation,
                            repositories, and internal systems across distributed
                            development teams. PocketOffice helps IT professionals
                            organize project resources while maintaining structured
                            access to critical tools and environments.
                        </p>

                        <p class="sector-text">
                            With unified workspace management, teams can streamline
                            development workflows, collaborate securely, and ensure
                            consistent knowledge sharing across multiple locations
                            without operational disruptions.
                        </p>
                    </div>

                    <div class="sector-right">
                        <video autoplay muted loop playsinline loading="lazy">
                            <source src="/assets/animated-videos/index/it-software.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>

                </div>

            </div>


        </div>
    </section>
    <section class="storage-integration-section">
        <div class="storage-wrapper">

            <h2 class="storage-main-heading">
                Connect Your Existing Storage and Tools — Instantly
            </h2>

            <div class="storage-content-wrapper">

                <!-- LEFT FAQ -->
                <div class="storage-left">

                    <!-- 1 -->
                    <div class="storage-item active"
                        data-video="/assets/animated-videos/index/works-with-your-cloud-storage.mp4">

                        <div class="storage-header">
                            🔗 Works With Your Cloud Storage
                            <span class="arrow">
                                <i class="fa-solid fa-chevron-down"></i>
                            </span>
                        </div>

                        <div class="storage-body">
                            <div class="storage-body-content">
                                <p>
                                    Pocketoffice integrates seamlessly with leading cloud and enterprise storage
                                    providers including Amazon S3, Alibaba OSS, Tencent COS, Google Drive, OneDrive,
                                    Dropbox, MinIO, and more. Your data stays where it is — Pocketoffice simply makes it
                                    easier to access and manage.
                                </p>
                            </div>
                        </div>

                    </div>

                    <!-- 2 -->
                    <div class="storage-item" data-video="/assets/animated-videos/index/one-unified-desktop-view.mp4">

                        <div class="storage-header">
                            📁 One Unified Desktop View
                            <span class="arrow">
                                <i class="fa-solid fa-chevron-down"></i>
                            </span>
                        </div>

                        <div class="storage-body">
                            <div class="storage-body-content">
                                <p>
                                    Bring multiple storage systems into one clean desktop interface. Access buckets,
                                    folders, and files from different providers without switching platforms or
                                    duplicating data.

                                </p>
                            </div>
                        </div>

                    </div>

                    <!-- 3 -->
                    <div class="storage-item" data-video="/assets/animated-videos/index/enterprise-on-prem-support.mp4">

                        <div class="storage-header">
                            ⚙️ Enterprise & On-Prem Support
                            <span class="arrow">
                                <i class="fa-solid fa-chevron-down"></i>
                            </span>
                        </div>

                        <div class="storage-body">
                            <div class="storage-body-content">
                                <p>
                                    Connect on-prem storage like XSKY SDS or enterprise systems like Sangfor EDS and
                                    Tianyi Cloud securely through your browser-based desktop.

                                </p>
                            </div>
                        </div>

                    </div>

                    <!-- 4 -->
                    <div class="storage-item" data-video="/assets/animated-videos/index/no-migration-required.mp4">

                        <div class="storage-header">
                            🚀 No Migration Required
                            <span class="arrow">
                                <i class="fa-solid fa-chevron-down"></i>
                            </span>
                        </div>

                        <div class="storage-body">
                            <div class="storage-body-content">
                                <p>
                                    Your storage architecture remains unchanged. Pocketoffice enhances how teams
                                    interact with it — without disrupting existing infrastructure.Bring multiple storage
                                    systems into one clean desktop interface. Access buckets, folders, and files from
                                    different providers without switching platforms or duplicating data.

                                </p>
                            </div>
                        </div>

                    </div>

                </div>

                <!-- RIGHT IMAGE -->
                <div class="storage-right">
                    <video id="storage-video" autoplay muted loop playsinline preload="auto">

                        <source id="storage-video-source"
                            src="/assets/animated-videos/index/works-with-your-cloud-storage.mp4" type="video/mp4">

                    </video>
                </div>

            </div>

        </div>
    </section>
    </div>
    </div>
    <!-- Products & Partners Section -->
    <section class="partners-section">
        <div class="partners-container">
            <!-- Header -->
            <div class="partners-header">


                <h2 class="partners-title">
                    <!-- Handshake Icon SVG -->
                    <svg class="partners-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18 15l3-3a2.828 2.828 0 00-4-4l-1 1m-2 2l-1 1m-2 2l-2 2m5-5L9 9l-6 6m0 0l3 3m3-3l3 3m3-3l2 2" />
                    </svg>
                    PRODUCTS & PARTNERS
                </h2>

                <p class="partners-description">
                    PocketOffice collaborates with leading technology providers to deliver reliable, scalable, and
                    future-ready
                    location intelligence. Our strategic partnerships ensure seamless integration, advanced security,
                    and enterprise-grade performance.
                </p>
            </div>
        </div>

        <!-- Logos Marquee -->
        <div class="partners-logos-wrapper">
            <div class="partners-marquee-container">
                <div class="partners-marquee-track">
                    <!-- Strip 1 -->
                    <div class="partners-logo-strip">
                        <img src="public//assets/img/acronis-logo.png" alt="Acronis" />
                        <img src="public//assets/img/kaspersky-logo.png" alt="Kaspersky" />
                        <img src="public//assets/img/microsoft-logo.png" alt="Microsoft" />
                        <img src="public//assets/img/dell-logo.png" alt="Dell" />
                        <img src="public//assets/img/amazon-logo.png" alt="Amazon" />
                        <img src="public//assets/img/quick-heal-logo.png" alt="Quick Heal" />
                        <img src="public//assets/img/escan-logo.png" alt="Escan" />
                        <img src="public//assets/img/sonic-wall-logo.png" alt="SonicWall" />
                        <img src="public//assets/img/hp-logo.png" alt="HP" />
                        <img src="public//assets/img/fortinet-logo.png" alt="Fortinet" />
                        <img src="public//assets/img/eset-logo.png" alt="ESET" />
                        <img src="public//assets/img/cisco-logo.png" alt="Cisco" />
                        <img src="public//assets/img/alibaba-cloud-logo.png" alt="Alibaba Cloud" />
                        <img src="public//assets/img/sophos-logo.png" alt="Sophos" />
                        <img src="public//assets/img/symantec-logo.png" alt="Symantec" />
                        <img src="public//assets/img/trend-micro-logo.png" alt="Trend Micro" />
                        <img src="public//assets/img/veeam-logo.png" alt="Veeam" />
                        <img src="public//assets/img/watchguard-logo.png" alt="Watchguard" />
                    </div>

                    <!-- Duplicate strip for seamless loop -->
                    <div class="partners-logo-strip">
                        <img src="/assets/img/acronis-logo.png" alt="Acronis" />
                        <img src="/assets/img/kaspersky-logo.png" alt="Kaspersky" />
                        <img src="/assets/img/microsoft-logo.png" alt="Microsoft" />
                        <img src="/assets/img/dell-logo.png" alt="Dell" />
                        <img src="/assets/img/amazon-logo.png" alt="Amazon" />
                        <img src="/assets/img/quick-heal-logo.png" alt="Quick Heal" />
                        <img src="/assets/img/escan-logo.png" alt="Escan" />
                        <img src="/assets/img/sonic-wall-logo.png" alt="SonicWall" />
                        <img src="/assets/img/hp-logo.png" alt="HP" />
                        <img src="/assets/img/fortinet-logo.png" alt="Fortinet" />
                        <img src="/assets/img/eset-logo.png" alt="ESET" />
                        <img src="/assets/img/cisco-logo.png" alt="Cisco" />
                        <img src="/assets/img/alibaba-cloud-logo.png" alt="Alibaba Cloud" />
                        <img src="/assets/img/sophos-logo.png" alt="Sophos" />
                        <img src="/assets/img/symantec-logo.png" alt="Symantec" />
                        <img src="/assets/img/trend-micro-logo.png" alt="Trend Micro" />
                        <img src="/assets/img/veeam-logo.png" alt="Veeam" />
                        <img src="/assets/img/watchguard-logo.png" alt="Watchguard" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="sales-enquiry-overlay" style="display:none;">
        <div id="sales-enquiry-modal">
            <button id="sales-enquiry-close" aria-label="Close">&times;</button>

            <!-- Paste your existing modal content here -->
            <div class="contact-modal">
                <h2 class="modal-title">Tell us how we can help</h2>
                <form id="serviceForm" class="form needs-validation salesEnquiryForm" novalidate>
                    <div class="form-item">
                        <label for="companyName">Company Name</label>
                        <input type="text" id="companyName" name="companyName" placeholder="Company Name"
                            class="form-control" required />
                        <div class="invalid-feedback">Company name is required.</div>
                    </div>
                    <div class="enquiry-form-group">
                        <label for="industry">Industry</label>
                        <select id="industry" name="industry" required
                            style="padding:12px 40px 12px 16px;appearance:none;-webkit-appearance:none;-moz-appearance:none;background-image:url('data:image/svg+xml;utf8,<svg fill=\'%23333\' height=\'20\' viewBox=\'0 0 20 20\' width=\'20\' xmlns=\'http://www.w3.org/2000/svg\'><path d=\'M5 7l5 5 5-5z\'/></svg>');background-repeat:no-repeat;background-position:right 12px center;">
                            <option value="" hidden>Select Industry</option>
                            <option value="education">Education</option>
                            <option value="consulting">Consulting</option>
                            <option value="healthcare">Healthcare</option>
                            <option value="finance">Finance & Accounting</option>
                            <option value="software">IT & Software Development</option>
                            <option value="design">Design & Creative Studios</option>
                            <option value="legal">Legal Services</option>
                            <option value="manufacturing">Manufacturing</option>
                            <option value="media">Media & Publishing</option>
                            <option value="retail">Retail & E-commerce</option>
                            <option value="bpo">BPO Outsourcing</option>
                        </select>
                    </div>
                    <div class="form-grid">
                        <div class="form-item">
                            <label for="firstName">First Name</label>
                            <input type="text" id="firstName" name="firstName" placeholder="First name"
                                class="form-control" required />
                            <div class="invalid-feedback">First name is required.</div>
                        </div>
                        <div class="form-item">
                            <label for="lastName">Last Name</label>
                            <input type="text" id="lastName" name="lastName" placeholder="Last name"
                                class="form-control" required />
                            <div class="invalid-feedback">Last name is required.</div>
                        </div>
                    </div>
                    <div class="form-grid">
                        <div class="form-item">
                            <label for="phoneNumber">Contact Number</label>
                            <div class="phone-input">
                                <select id="countryCodes" name="countryCodes" required></select>
                                <div class="contact-divider"></div>
                                <input type="tel" id="phoneNumber" name="phoneNumber" placeholder="Enter Contact Number"
                                    class="form-control" required />
                                <div class="invalid-feedback">Valid contact number is required.</div>
                            </div>
                        </div>
                        <div class="form-item">
                            <label for="email" class="emailLabel">Email</label>
                            <div class="phone-input">
                                <input type="email" id="email" name="email" placeholder="Email" class="form-control"
                                    required />
                                <div class="invalid-feedback">Please enter a valid email address.</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-grid">
                        <div class="form-item">
                            <label for="website">Website</label>
                            <input type="text" id="website" name="website" placeholder="Website URL"
                                class="form-control" required />
                            <div class="invalid-feedback">Please enter a valid website URL.</div>
                        </div>
                        <div class="form-item">
                            <label for="companyAddress">Company Address</label>
                            <input type="text" id="companyAddress" name="companyAddress" placeholder="Company Address"
                                class="form-control" required />
                            <div class="invalid-feedback">Company address is required.</div>
                        </div>
                        <div class="form-item">
                            <label for="country">Country</label>
                            <select id="country" name="country" required>
                                <option value="">Loading countries...</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="city">City</label>
                            <input type="text" id="city" name="city" placeholder="City" class="form-control" required />
                            <div class="invalid-feedback">City is required.</div>
                        </div>
                    </div>
                    <div class="form-item services-form">
                        <label>Services</label>
                        <div class="accordion" id="accordion">
                            <div class="single-accordion card">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Core Location & Mapping APIs
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                    data-parent="#accordion">
                                    <div class="card-body-enquiry">
                                        <div class="checkbox-grid">
                                            <div class="form-check"><input
                                                    class="form-check-input big-checkbox select-all"
                                                    type="checkbox" /><span class="form-check-label">Select All</span>
                                            </div>
                                            <div class="form-check"><input class="form-check-input big-checkbox"
                                                    type="checkbox" name="services[]" value="Autocomplete" /><span
                                                    class="form-check-label">Autocomplete</span>
                                            </div>
                                            <div class="form-check"><input class="form-check-input big-checkbox"
                                                    type="checkbox" name="services[]" value="Geocoding" /><span
                                                    class="form-check-label">Geocoding</span></div>
                                            <div class="form-check"><input class="form-check-input big-checkbox"
                                                    type="checkbox" name="services[]" value="Reverse Geocoding" /><span
                                                    class="form-check-label">Reverse
                                                    Geocoding</span></div>
                                            <div class="form-check"><input class="form-check-input big-checkbox"
                                                    type="checkbox" name="services[]"
                                                    value="Places Nearby Search" /><span class="form-check-label">Places
                                                    Nearby
                                                    Search</span></div>
                                            <div class="form-check"><input class="form-check-input big-checkbox"
                                                    type="checkbox" name="services[]" value="Place Details" /><span
                                                    class="form-check-label">Place Details</span>
                                            </div>
                                            <div class="form-check"><input class="form-check-input big-checkbox"
                                                    type="checkbox" name="services[]" value="Text Search" /><span
                                                    class="form-check-label">Text Search</span>
                                            </div>
                                            <div class="form-check"><input class="form-check-input big-checkbox"
                                                    type="checkbox" name="services[]" value="Custom POI" /><span
                                                    class="form-check-label">Custom POI</span></div>
                                            <div class="form-check"><input class="form-check-input big-checkbox"
                                                    type="checkbox" name="services[]" value="Address Validation" /><span
                                                    class="form-check-label">Address
                                                    Validation</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-accordion card">
                                <div class="card-header" id="headingTwo">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapseTwo" aria-expanded="false"
                                            aria-controls="collapseTwo">
                                            Navigation, Routing & Transport APIs
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                    data-parent="#accordion">
                                    <div class="card-body-enquiry">
                                        <div class="checkbox-grid">
                                            <div class="form-check"><input
                                                    class="form-check-input big-checkbox select-all"
                                                    type="checkbox" /><span class="form-check-label">Select All</span>
                                            </div>
                                            <div class="form-check"><input class="form-check-input big-checkbox"
                                                    type="checkbox" name="services[]" value="Route Optimizer" /><span
                                                    class="form-check-label">Route
                                                    Optimizer</span></div>
                                            <div class="form-check"><input class="form-check-input big-checkbox"
                                                    type="checkbox" name="services[]"
                                                    value="Directions Navigation" /><span
                                                    class="form-check-label">Directions
                                                    Navigation</span></div>
                                            <div class="form-check"><input class="form-check-input big-checkbox"
                                                    type="checkbox" name="services[]" value="Snap-to-Road" /><span
                                                    class="form-check-label">Snap-to-Road</span>
                                            </div>
                                            <div class="form-check"><input class="form-check-input big-checkbox"
                                                    type="checkbox" name="services[]" value="Speed Limits" /><span
                                                    class="form-check-label">Speed Limits</span>
                                            </div>
                                            <div class="form-check"><input class="form-check-input big-checkbox"
                                                    type="checkbox" name="services[]" value="Elevation API" /><span
                                                    class="form-check-label">Elevation API</span>
                                            </div>
                                            <div class="form-check"><input class="form-check-input big-checkbox"
                                                    type="checkbox" name="services[]" value="Fleet Planner" /><span
                                                    class="form-check-label">Fleet Planner</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-accordion card">
                                <div class="card-header" id="headingThree">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseThree">
                                            Map Visualization, Geofencing & Analytics APIs
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                    data-parent="#accordion">
                                    <div class="card-body-enquiry">
                                        <div class="checkbox-grid">
                                            <div class="form-check"><input
                                                    class="form-check-input big-checkbox select-all"
                                                    type="checkbox" /><span class="form-check-label">Select All</span>
                                            </div>
                                            <div class="form-check"><input class="form-check-input big-checkbox"
                                                    type="checkbox" name="services[]" value="Geofencing CRUD" /><span
                                                    class="form-check-label">Geofencing
                                                    CRUD</span></div>
                                            <div class="form-check"><input class="form-check-input big-checkbox"
                                                    type="checkbox" name="services[]" value="Vector Tiles" /><span
                                                    class="form-check-label">Vector Tiles</span>
                                            </div>
                                            <div class="form-check"><input class="form-check-input big-checkbox"
                                                    type="checkbox" name="services[]" value="Street View" /><span
                                                    class="form-check-label">Street View</span>
                                            </div>
                                            <div class="form-check"><input class="form-check-input big-checkbox"
                                                    type="checkbox" name="services[]" value="Satellite View" /><span
                                                    class="form-check-label">Satellite
                                                    View</span></div>
                                            <div class="form-check"><input class="form-check-input big-checkbox"
                                                    type="checkbox" name="services[]" value="Maps Analytics" /><span
                                                    class="form-check-label">Maps
                                                    Analytics</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-item">
                        <label for="message">Your Message</label>
                        <textarea placeholder="Write a Message..." class="message" id="message" name="message"
                            rows="4"></textarea>
                    </div>
                    <div class="form-item">
                        <div class="g-recaptcha" data-sitekey="6LftJJ8qAAAAAOGdsVx3yOGqvRXTVc2VUQl8D-tW"></div>
                    </div>
                    <div class="form-item">
                        <button class="enquiry-btn" type="submit">Submit Request</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- footer area start -->
    <footer class="pocket-footer">
        <div class="footer-container">

            <!-- Column 1 (UNCHANGED) -->
            <div class="footer-column">
                <h4>Core Features</h4>
                <ul>
                    <li><a href="/core-features.html?tab=cloud" id="cloud">Cloud Desktop Environment</a></li>
                    <li><a href="/core-features.html?tab=file">File Manager & Storage</a></li>
                    <li><a href="/core-features.html?tab=window">Window-based Multitasking</a></li>
                    <li><a href="/core-features.html?tab=launcher">App Launcher</a></li>
                    <li><a href="/core-features.html?tab=drag">Drag & Drop UI</a></li>
                    <li><a href="/core-features.html?tab=keyboard">Keyboard Shortcuts</a></li>
                    <li><a href="/core-features.html?tab=sync">Multi-device Sync</a></li>
                </ul>
            </div>

            <!-- Column 2 -->
            <div class="footer-column">
                <h4>Collaboration</h4>
                <ul>
                    <li><a href="/collaboration.html?tab=realtime">Real-time File Sharing</a></li>
                    <li><a href="/collaboration.html?tab=workspace">Shared Workspaces</a></li>
                    <li><a href="/collaboration.html?tab=permissions">Team Permissions</a></li>
                    <li><a href="/collaboration.html?tab=activity">Activity Tracking</a></li>
                </ul>

                <h4>Security</h4>
                <ul>
                    <li><a href="/security.html">Role-based Access</a></li>
                    <li><a href="/security.html?tab=workspace">Backup & Recovery</a></li>
                    <li><a href="/security.html?tab=permissions">Data Privacy Compliance</a></li>
                </ul>
            </div>

            <!-- Column 3 -->
            <div class="footer-column">
                <h4>Solutions</h4>
                <h5 class="footer-sub-heading">By Team Type</h5>


                <ul>
                    <li><a href="/team-type.html?tab=remote">Remote Teams</a></li>
                    <li><a href="/team-type.html?tab=startups">Startups</a></li>
                    <li><a href="/team-type.html?tab=enterprises">Enterprises</a></li>
                    <li><a href="/team-type.html?tab=freelancers">Freelancers</a></li>
                </ul>

                <h5 class="footer-sub-heading">By Use Case</h5>
                <ul>
                    <li><a href="/use-case.html?tab=file-sharing">File Sharing</a></li>
                    <li><a href="/use-case.html?tab=virtual-desktop">Virtual Desktop</a></li>
                    <li><a href="/use-case.html?tab=team-workspaces">Team Workspaces</a></li>
                    <li><a href="/use-case.html?tab=cloud-storage">Cloud Storage</a></li>
                </ul>
            </div>

            <!-- Column 4 -->


            <!-- Column 5 (UNCHANGED) -->
            <div class="footer-column">
                <h4>Resources</h4>
                <ul>
                    <li><a href="/documentation.html">Documentation</a></li>
                    <li><a href="/faq.html">FAQs</a></li>
                    <li><a href="/blog.html">Updates</a></li>
                    <li><a href="/news.html">Latest News</a></li>
                </ul>
            </div>

            <!-- Column 6 (UNCHANGED) -->
            <div class="footer-column">
                <h4>Company</h4>
                <ul>
                    <li><a href="/about.html">About Us</a></li>
                    <li><a href="/careers.html">Careers</a></li>
                    <li><a href="/contact-us.html">Contact</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h4>Legal</h4>
                <ul>
                    <li><a href="terms-condition.html">Terms & Conditions</a></li>
                    <li><a href="privacy.html">Privacy Policy</a></li>
                    <li><a href="disclaimer.html">Disclaimer</a></li>
                </ul>
            </div>

        </div>

        <!-- Bottom Section -->
        <div class="footer-bottom">
            <div class="social-icons">
                <a href="https://x.com/aibuzz_tech" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
                <a href="https://www.facebook.com/aibuzztech/" target="_blank"><i
                        class="fa-brands fa-facebook-f"></i></a>
                <a href="https://www.linkedin.com/company/aibuzz-techno/" target="_blank"><i
                        class="fa-brands fa-linkedin"></i></a>
                <a href="https://www.instagram.com/aibuzz_technoventures/" target="_blank"><i
                        class="fa-brands fa-instagram"></i></a>
            </div>

            <div class="copyright-text">
                © 2025 PocketOffice. All rights reserved.
            </div>
        </div>
    </footer>
    <!-- footer area end -->

    <!-- back to top area start -->
    <div class="back-to-top">
        <span class="back-top"><i class="fa fa-angle-up"></i></span>
    </div>
    <!-- back to top area end -->

    <!-- jquery -->
    <script src="public/assets/js/jquery-2.2.4.min.js"></script>
    <script src="public/assets/js/imagesloaded.pkgd.min.js"></script>
    <!-- bootstrap -->
    <script src="public/assets/js/bootstrap.min.js"></script>
    <!-- main js -->
    <script src="public/assets/js/main.js"></script>
    <script src="public/assets/js/home.js"></script>
    <script src="public/assets/js/search-box.js"></script>
    <script src="public/assets/js/countries.js"></script>
    <script src="public/assets/js/enquiry.js"></script>
    <!-- magnific popup -->
    <script src="public/assets/js/jquery.magnific-popup.js"></script>
    <!-- wow -->
    <script src="public/assets/js/wow.min.js"></script>
    <!-- cssslider slider -->
    <script src="public/assets/js/jquery.cssslider.min.js"></script>
    <script src="public/assets/js/sales-enquiry-form.js"></script>
</body>

</html>