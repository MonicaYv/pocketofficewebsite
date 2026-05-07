@extends('layouts.backendsettings')
@section('title', 'Cloud Desktop That Runs Anywhere | Pocket Office')
@section('meta-title', 'Cloud Desktop That Runs Anywhere | Pocket Office')
@section('meta-description', 'Experience Pocket Office, the secure browser-based cloud desktop workspace that lets your team access files, apps, and collaboration tools from anywhere without installation.')
@section('meta-keywords', 'cloud desktop, browser-based workspace, secure cloud desktop, remote collaboration, file management, virtual desktop')
@section('meta-image', 'https://pocketdesk.sizaf.com/assets/img/Hero Section.webp')
@section('canonical', 'https://pocketdesk.sizaf.com/')
@section('meta-url', 'https://pocketdesk.sizaf.com/')
@section('structured-data')
@verbatim
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "Pocket Office",
  "url": "https://pocketdesk.sizaf.com/",
  "description": "Pocket Office is a secure browser-based cloud desktop workspace that lets teams access files, apps, and collaboration tools from anywhere without installation.",
  "inLanguage": "en",
  "image": "https://pocketdesk.sizaf.com/assets/img/Hero Section.webp",
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
<!-- header area start -->
<section class="hero-header">
    <!-- Background Image -->
    <div class="hero-bg">
        <img src="assets/img/Hero Section.webp"
            srcset="assets/img/Hero Section.webp 480w,assets/img/Hero Section.webp 1200w"
            sizes="(max-width: 768px) 100vw, 1200px"
            alt="Digital productivity interface with modern workspace layout" width="1200" height="900"
            loading="eager" />
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
                    <a href="/pricing.html" class="btn-primary">Start Building</a>
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
                        <source src="/assets/img/animated-videos/index/access-from-anywhere.mp4" type="video/mp4">
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
                        <source src="/assets/img/animated-videos/index/work-without-distraction-video.mp4"
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
                        <source src="/assets/img/animated-videos/index/secure-by-design-video.mp4" type="video/mp4">
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

            <h3>Core Features That Power Your Cloud Workspace
            </h3>
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
                        <source src="/assets/img/animated-videos/index/index-core-features-video.mp4" type="video/mp4">
                    </video>
                </div>
            </div>

        </div>

    </div>

</section>
<section class="sector-adaptive-section">
    <div class="sector-adaptive-wrapper">
        <div class="sector-main-header">
            <h3>Built for Diverse Industries & Workflows</h3>
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
                        <source src="/assets/img/animated-videos/index/education.mp4" type="video/mp4">
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
                        <source src="/assets/img/animated-videos/index/healthcare.mp4" type="video/mp4">
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
                        <source src="/assets/img/animated-videos/index/finance-legal.mp4" type="video/mp4">
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
                        <source src="/assets/img/animated-videos/index/it-software.mp4" type="video/mp4">
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
                    data-video="/assets/img/animated-videos/index/works-with-your-cloud-storage.mp4">

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
                            <div class="storage-video-mobile">
                                <video autoplay muted loop playsinline preload="auto">
                                    <source src="/assets/img/animated-videos/index/works-with-your-cloud-storage.mp4"
                                        type="video/mp4">
                                </video>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- 2 -->
                <div class="storage-item" data-video="/assets/img/animated-videos/index/one-unified-desktop-view.mp4">

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
                            <div class="storage-video-mobile">
                                <video autoplay muted loop playsinline preload="auto">
                                    <source src="/assets/img/animated-videos/index/one-unified-desktop-view.mp4"
                                        type="video/mp4">
                                </video>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- 3 -->
                <div class="storage-item" data-video="/assets/img/animated-videos/index/enterprise-on-prem-support.mp4">

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
                            <div class="storage-video-mobile">
                                <video autoplay muted loop playsinline preload="auto">
                                    <source src="/assets/img/animated-videos/index/enterprise-on-prem-support.mp4"
                                        type="video/mp4">
                                </video>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- 4 -->
                <div class="storage-item" data-video="/assets/img/animated-videos/index/no-migration-required.mp4">

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
                            <div class="storage-video-mobile">
                                <video autoplay muted loop playsinline preload="auto">
                                    <source src="/assets/img/animated-videos/index/no-migration-required.mp4"
                                        type="video/mp4">
                                </video>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <!-- RIGHT IMAGE -->
            <div class="storage-right">
                <video id="storage-video" autoplay muted loop playsinline preload="auto">

                    <source id="storage-video-source"
                        src="/assets/img/animated-videos/index/works-with-your-cloud-storage.mp4" type="video/mp4">

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
                    <img src="/assets/img/acronis-logo.png" alt="Acronis" loading="lazy" />
                    <img src="/assets/img/kaspersky-logo.png" alt="Kaspersky" loading="lazy" />
                    <img src="/assets/img/microsoft-logo.png" alt="Microsoft" loading="lazy" />
                    <img src="/assets/img/dell-logo.png" alt="Dell" loading="lazy" />
                    <img src="/assets/img/amazon-logo.png" alt="Amazon" loading="lazy" />
                    <img src="/assets/img/quick-heal-logo.png" alt="Quick Heal" loading="lazy" />
                    <img src="/assets/img/escan-logo.png" alt="Escan" loading="lazy" />
                    <img src="/assets/img/sonic-wall-logo.png" alt="SonicWall" loading="lazy" />
                    <img src="/assets/img/hp-logo.png" alt="HP" loading="lazy" />
                    <img src="/assets/img/fortinet-logo.png" alt="Fortinet" loading="lazy" />
                    <img src="/assets/img/eset-logo.png" alt="ESET" loading="lazy" />
                    <img src="/assets/img/cisco-logo.png" alt="Cisco" />
                    <img src="/assets/img/alibaba-cloud-logo.png" alt="Alibaba Cloud" loading="lazy" />
                    <img src="/assets/img/sophos-logo.png" alt="Sophos" loading="lazy" />
                    <img src="/assets/img/symantec-logo.png" alt="Symantec" loading="lazy" />
                    <img src="/assets/img/trend-micro-logo.png" alt="Trend Micro" loading="lazy" />
                    <img src="/assets/img/veeam-logo.png" alt="Veeam" loading="lazy" />
                    <img src="/assets/img/watchguard-logo.png" alt="Watchguard" loading="lazy" />
                </div>

                <!-- Duplicate strip for seamless loop -->
                <div class="partners-logo-strip">
                    <img src="/assets/img/acronis-logo.png" alt="Acronis" loading="lazy" />
                    <img src="/assets/img/kaspersky-logo.png" alt="Kaspersky" loading="lazy" />
                    <img src="/assets/img/microsoft-logo.png" alt="Microsoft" loading="lazy" />
                    <img src="/assets/img/dell-logo.png" alt="Dell" loading="lazy" />
                    <img src="/assets/img/amazon-logo.png" alt="Amazon" loading="lazy" />
                    <img src="/assets/img/quick-heal-logo.png" alt="Quick Heal" loading="lazy" />
                    <img src="/assets/img/escan-logo.png" alt="Escan" loading="lazy" />
                    <img src="/assets/img/sonic-wall-logo.png" alt="SonicWall" loading="lazy" />
                    <img src="/assets/img/hp-logo.png" alt="HP" loading="lazy" />
                    <img src="/assets/img/fortinet-logo.png" alt="Fortinet" loading="lazy" />
                    <img src="/assets/img/eset-logo.png" alt="ESET" loading="lazy" />
                    <img src="/assets/img/cisco-logo.png" alt="Cisco" loading="lazy" />
                    <img src="/assets/img/alibaba-cloud-logo.png" alt="Alibaba Cloud" loading="lazy" />
                    <img src="/assets/img/sophos-logo.png" alt="Sophos" loading="lazy" />
                    <img src="/assets/img/symantec-logo.png" alt="Symantec" loading="lazy" />
                    <img src="/assets/img/trend-micro-logo.png" alt="Trend Micro" loading="lazy" />
                    <img src="/assets/img/veeam-logo.png" alt="Veeam" loading="lazy" />
                    <img src="/assets/img/watchguard-logo.png" alt="Watchguard" loading="lazy" />
                </div>
            </div>
        </div>
    </div>
</section>
@endsection