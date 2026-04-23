@extends('layouts.backendsettings')
@section('title', 'Cloud Desktop Collaboration Tools | File Sharing & Team Workspaces |
Pocket Office')
@section('content')
<!-- breadcrumb area start -->
<div
    class="breadcrumb-area"
    style="background-image: url('{{ asset($constants['IMAGEFILEPATH'] . 'hero-images/collaboration.svg') }}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner">
                    <h1 class="page-title">Built for Seamless Collaboration</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="collaboration-section">
    <div class="collaboration-wrapper">
        <!-- Main Heading -->
        <h2 class="collaboration-main-heading">Collaboration</h2>

        <p class="collaboration-main-subtext">
            Enable secure, real-time collaboration with centralized file sharing
            and complete control — all within your cloud workspace.
        </p>

        <!-- Tabs -->
        <div class="collaboration-tabs-wrapper">
            <div class="collaboration-tabs">
                <button class="collaboration-tab active" data-tab="realtime">
                    Real-Time Sharing
                </button>
                <button class="collaboration-tab" data-tab="workspace">
                    Shared Workspace
                </button>
                <button class="collaboration-tab" data-tab="permissions">
                    Team Permissions
                </button>
                <button class="collaboration-tab" data-tab="activity">
                    Activity Tracking
                </button>
            </div>
        </div>

        <!-- Tab Content -->
        <div class="collaboration-content-wrapper">
            <!-- REAL TIME SHARING -->
            <div class="collaboration-panel active" data-panel="realtime">
                <div class="collaboration-highlight-layout">
                    <!-- LEFT IMAGE WITH DARK BEIGE BG -->
                    <div class="video-box">
                        <video autoplay loop muted playsinline>
                            <source
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'animated-videos/collaboration/internal-sharing.mp4') }}"
                                type="video/mp4" />
                        </video>
                    </div>

                    <!-- RIGHT CONTENT -->
                    <div class="collaboration-content collaboration-framed-content">
                        <h3 class="collaboration-heading">Internal Sharing</h3>

                        <p class="collaboration-subheading">
                            Keep collaboration within your organization.
                        </p>

                        <p class="collaboration-description">
                            Pocketoffice makes it easy to share files and folders with
                            teammates while maintaining full visibility and control.
                            Everyone works from the same source, reducing duplication and
                            confusion.
                        </p>
                    </div>
                </div>

                <div class="collaboration-highlight-layout collaboration-reverse">
                    <!-- LEFT IMAGE WITH DARK BEIGE BG -->
                    <div class="video-box">
                        <video autoplay loop muted playsinline>
                            <source
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'animated-videos/collaboration/external-sharing.mp4') }}"
                                type="video/mp4" />
                        </video>
                    </div>

                    <!-- RIGHT CONTENT -->
                    <div class="collaboration-content collaboration-framed-content">
                        <h3 class="collaboration-heading">External Sharing</h3>

                        <p class="collaboration-subheading">
                            Secure access for clients and partners.
                        </p>

                        <p class="collaboration-description">
                            Share files externally with clients, vendors, or partners
                            while maintaining strict control over permissions. Decide who
                            can view, edit, or download—without exposing your internal
                            workspace.
                        </p>
                    </div>
                </div>

                <div class="collaboration-highlight-layout">
                    <!-- LEFT IMAGE WITH DARK BEIGE BG -->
                    <div class="video-box">
                        <video autoplay loop muted playsinline>
                            <source
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'animated-videos/collaboration/built-for-control.mp4') }}"
                                type="video/mp4" />
                        </video>
                    </div>

                    <!-- RIGHT CONTENT -->
                    <div class="collaboration-content collaboration-framed-content">
                        <h3 class="collaboration-heading">Built for Control</h3>

                        <p class="collaboration-subheading">
                            One sharing system. multiple use cases.
                        </p>

                        <p class="collaboration-description">
                            Whether files stay internal or go outside, Pocketoffice
                            ensures consistent security, tracking, and permission
                            management.
                        </p>
                    </div>
                </div>
            </div>

            <!-- SHARED WORKSPACE -->
            <div class="collaboration-panel" data-panel="workspace">
                <div class="collaboration-highlight-layout">
                    <!-- LEFT IMAGE WITH DARK BEIGE BG -->
                    <div class="video-box">
                        <video autoplay loop muted playsinline>
                            <source
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'animated-videos/collaboration/department-based-workspaces.mp4') }}"
                                type="video/mp4" />
                        </video>
                    </div>

                    <!-- RIGHT CONTENT -->
                    <div class="collaboration-content collaboration-framed-content">
                        <h3 class="collaboration-heading">
                            Department-Based Workspaces
                        </h3>

                        <p class="collaboration-subheading">
                            Everything in its right place.
                        </p>

                        <p class="collaboration-description">
                            Create dedicated workspaces for departments like HR, Finance,
                            Sales, or Projects. Each workspace keeps files, discussions,
                            and permissions well-organized.
                        </p>
                    </div>
                </div>

                <div class="collaboration-highlight-layout collaboration-reverse">
                    <!-- LEFT IMAGE WITH DARK BEIGE BG -->
                    <div class="video-box">
                        <video autoplay loop muted playsinline>
                            <source
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'animated-videos/collaboration/clear-ownership.mp4') }}"
                                type="video/mp4" />
                        </video>
                    </div>

                    <!-- RIGHT CONTENT -->
                    <div class="collaboration-content collaboration-framed-content">
                        <h3 class="collaboration-heading">Clear Ownership</h3>

                        <p class="collaboration-subheading">
                            No more mixed files or lost context.
                        </p>

                        <p class="collaboration-description">
                            Department-specific workspaces reduce clutter and help teams
                            focus on what’s relevant to their work.
                        </p>
                    </div>
                </div>

                <div class="collaboration-highlight-layout">
                    <!-- LEFT IMAGE WITH DARK BEIGE BG -->
                    <div class="video-box">
                        <video autoplay loop muted playsinline>
                            <source
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'animated-videos/collaboration/cross-team-collaboration.mp4') }}"
                                type="video/mp4" />
                        </video>
                    </div>

                    <!-- RIGHT CONTENT -->
                    <div class="collaboration-content collaboration-framed-content">
                        <h3 class="collaboration-heading">Cross-Team Collaboration</h3>

                        <p class="collaboration-subheading">
                            Collaborate efficiently without losing structure.
                        </p>

                        <p class="collaboration-description">
                            Share specific folders or files across departments while
                            keeping the overall workspace organized and secure.
                        </p>
                    </div>
                </div>
            </div>

            <!-- TEAM PERMISSIONS -->
            <div class="collaboration-panel" data-panel="permissions">
                <div class="collaboration-highlight-layout">
                    <!-- LEFT IMAGE WITH DARK BEIGE BG -->
                    <div class="video-box">
                        <video autoplay loop muted playsinline>
                            <source
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'animated-videos/collaboration/role-based-permissions.mp4') }}"
                                type="video/mp4" />
                        </video>
                    </div>

                    <!-- RIGHT CONTENT -->
                    <div class="collaboration-content collaboration-framed-content">
                        <h3 class="collaboration-heading">Role-Based Permissions</h3>

                        <p class="collaboration-subheading">
                            Clear roles for every user.
                        </p>

                        <p class="collaboration-description">
                            Define roles such as Admin, Editor, Contributor, and Viewer to
                            control what users can see and do across files and workspaces.
                        </p>
                    </div>
                </div>

                <div class="collaboration-highlight-layout collaboration-reverse">
                    <!-- LEFT IMAGE WITH DARK BEIGE BG -->
                    <div class="video-box">
                        <video autoplay loop muted playsinline>
                            <source
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'animated-videos/collaboration/consistent-accesscontrol.mp4') }}"
                                type="video/mp4" />
                        </video>
                    </div>

                    <!-- RIGHT CONTENT -->
                    <div class="collaboration-content collaboration-framed-content">
                        <h3 class="collaboration-heading">Consistent Access Control</h3>

                        <p class="collaboration-subheading">Same rules. Everywhere</p>

                        <p class="collaboration-description">
                            A structured permission matrix ensures permissions are applies
                            access rules consistently across teams, departments, and
                            projects.
                        </p>
                    </div>
                </div>

                <div class="collaboration-highlight-layout">
                    <!-- LEFT IMAGE WITH DARK BEIGE BG -->
                    <div class="video-box">
                        <video autoplay loop muted playsinline>
                            <source
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'animated-videos/collaboration/accountability-built-in.mp4') }}"
                                type="video/mp4" />
                        </video>
                    </div>

                    <!-- RIGHT CONTENT -->
                    <div class="collaboration-content collaboration-framed-content">
                        <h3 class="collaboration-heading">Accountability Built In</h3>

                        <p class="collaboration-subheading">
                            Everyone knows their responsibility.
                        </p>

                        <p class="collaboration-description">
                            Clear permissions reduce errors, strengthen accountability,
                            and enable secure collaboration at scale.
                        </p>
                    </div>
                </div>
            </div>

            <!-- ACTIVITY TRACKING -->
            <div class="collaboration-panel" data-panel="activity">
                <div class="collaboration-highlight-layout">
                    <!-- LEFT IMAGE WITH DARK BEIGE BG -->
                    <div class="video-box">
                        <video autoplay loop muted playsinline>
                            <source
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'animated-videos/collaboration/detailed-activity-logs.mp4') }}"
                                type="video/mp4" />
                        </video>
                    </div>

                    <!-- RIGHT CONTENT -->
                    <div class="collaboration-content collaboration-framed-content">
                        <h3 class="collaboration-heading">Detailed Activity Logs</h3>

                        <p class="collaboration-subheading">
                            Know who did what—and when.
                        </p>

                        <p class="collaboration-description">
                            Track file access, edits, downloads, and sharing events across
                            users and teams through comprehensive activity logs.
                        </p>
                    </div>
                </div>

                <div class="collaboration-highlight-layout collaboration-reverse">
                    <!-- LEFT IMAGE WITH DARK BEIGE BG -->
                    <div class="video-box">
                        <video autoplay loop muted playsinline>
                            <source
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'animated-videos/collaboration/audit-ready-reporting.mp4') }}"
                                type="video/mp4" />
                        </video>
                    </div>

                    <!-- RIGHT CONTENT -->
                    <div class="collaboration-content collaboration-framed-content">
                        <h3 class="collaboration-heading">Audit-Ready Reporting</h3>

                        <p class="collaboration-subheading">
                            Built for compliance needs.
                        </p>

                        <p class="collaboration-description">
                            Activity tracking helps organizations meet internal audits,
                            compliance standards, and regulatory requirements with
                            confidence.
                        </p>
                    </div>
                </div>

                <div class="collaboration-highlight-layout">
                    <!-- LEFT IMAGE WITH DARK BEIGE BG -->
                    <div class="video-box">
                        <video autoplay loop muted playsinline>
                            <source
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'animated-videos/collaboration/transparency-for-admins.mp4') }}" />
                        </video>
                    </div>

                    <!-- RIGHT CONTENT -->
                    <div class="collaboration-content collaboration-framed-content">
                        <h3 class="collaboration-heading">Transparency for Admins</h3>

                        <p class="collaboration-subheading">
                            Full visibility without micromanagement.
                        </p>

                        <p class="collaboration-description">
                            Admins get insight into system usage and behavior while teams
                            continue working freely and efficiently.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="collaboration-feature-section">
    <div class="collaboration-feature-wrapper">
        <h2 class="collaboration-feature-heading">See more features</h2>

        <div class="collaboration-feature-grid">
            <!-- Feature 1 -->
            <div class="collaboration-feature-card">
                <div class="collaboration-feature-image">
                    <img
                        src="{{ asset($constants['IMAGEFILEPATH'] . 'collaboration/cloud-desktop-environment.svg') }}"
                        alt="File sharing feature"
                        loading="lazy"
                        width="300"
                        height="150" />
                </div>

                <h3 class="collaboration-feature-title">
                    Cloud Desktop Environment
                </h3>

                <p class="collaboration-feature-text">
                    Access your complete cloud desktop securely across desktops,
                    laptops, tablets, and mobile devices, enabling seamless
                    productivity from any modern browser environment.
                </p>

                <a
                    href="core-features.html?tab=cloud"
                    class="collaboration-feature-link">
                    Explore cloud desktop capabilities →
                </a>
            </div>

            <!-- Feature 2 -->
            <div class="collaboration-feature-card">
                <div class="collaboration-feature-image">
                    <img
                        src="{{ asset($constants['IMAGEFILEPATH'] . 'collaboration/file-manager-storage.svg') }}"
                        alt="Save space feature"
                        loading="lazy"
                        width="300"
                        height="150" />
                </div>

                <h3 class="collaboration-feature-title">File Manager & Storage</h3>

                <p class="collaboration-feature-text">
                    Organize and manage files with flexible permissions, collaborate
                    safely with editing controls, and securely share documents across
                    teams within your workspace.
                </p>

                <a
                    href="core-features.html?tab=file"
                    class="collaboration-feature-link">
                    Explore file management tools →
                </a>
            </div>

            <!-- Feature 3 -->
            <div class="collaboration-feature-card">
                <div class="collaboration-feature-image">
                    <img
                        src="{{ asset($constants['IMAGEFILEPATH'] . 'collaboration/app-launcher.svg') }}"
                        alt="Doc scanner app"
                        loading="lazy"
                        width="300"
                        height="150" />
                </div>

                <h3 class="collaboration-feature-title">App Launcher</h3>

                <p class="collaboration-feature-text">
                    Launch productivity tools, communication apps, and custom business
                    applications instantly from a unified workspace designed to
                    simplify workflows and daily collaboration.
                </p>

                <a
                    href="core-features.html?tab=launcher"
                    class="collaboration-feature-link">
                    Explore available applications →
                </a>
            </div>

            <!-- Feature 4 -->

            <div class="collaboration-feature-card">
                <div class="collaboration-feature-image">
                    <img
                        src="{{ asset($constants['IMAGEFILEPATH'] . 'collaboration/multi-device-sync.svg') }}"
                        alt="File permissions feature"
                        loading="lazy"
                        width="300"
                        height="150" />
                </div>

                <h3 class="collaboration-feature-title">Multi-device Sync</h3>

                <p class="collaboration-feature-text">
                    Keep your files, applications, and workspace synchronized
                    instantly across desktops, laptops, tablets, and mobile devices,
                    ensuring continuous access and seamless productivity wherever you
                    work.
                </p>

                <a
                    href="core-features.html?tab=sync"
                    class="collaboration-feature-link">
                    Explore device management tools →
                </a>
            </div>
        </div>
    </div>
</section>
@endsection