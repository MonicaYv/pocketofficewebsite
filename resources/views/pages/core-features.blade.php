@extends('layouts.backendsettings')
@section('title', 'Cloud Desktop Core Features | File Manager, Multitasking & Sync | Pocket
Office')
@section('content')
<!-- breadcrumb area start -->
<div
    class="breadcrumb-area"
    style="background-image: url({{ asset($constants['IMAGEFILEPATH'] . 'hero-images/core-features.svg') }})">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner">
                    <h1 class="page-title">Powering Your Cloud Workspace</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb area End -->

<section class="core-features-section">
    <div class="core-features-wrapper">
        <!-- Main Heading -->
        <h2 class="core-features-main-heading">Core Features</h2>

        <!-- Subtext -->
        <p class="core-features-subtext">
            Powerful capabilities designed to deliver a seamless cloud desktop
            experience — built for speed, collaboration, and security.
        </p>

        <!-- Tabs -->
        <div class="core-features-tabs-wrapper">
            <div class="core-features-tabs">
                <button class="core-features-tab" data-tab="view-all">
                    View All
                </button>
                <button class="core-features-tab active" data-tab="cloud">
                    Cloud Desktop Environment
                </button>
                <button class="core-features-tab" data-tab="file">
                    File Manager & Storage
                </button>
                <button class="core-features-tab" data-tab="window">
                    Window-based Multitasking
                </button>
                <button class="core-features-tab" data-tab="launcher">
                    App Launcher
                </button>
                <button class="core-features-tab" data-tab="drag">
                    Drag & Drop UI
                </button>
                <button class="core-features-tab" data-tab="keyboard">
                    Keyboard Shortcuts
                </button>
                <button class="core-features-tab" data-tab="sync">
                    Multi-device Sync
                </button>
            </div>
        </div>

        <!-- TAB CONTENT -->
        <div class="core-features-content">
            <!-- VIEW ALL -->
            <div class="core-features-panel" id="view-all">
                <h3 class="core-features-view-main-heading">
                    Cloud Desktop Environment
                </h3>
                <div class="core-features-grid">
                    <!-- Card 1 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'core-features/desktop-laptop.svg') }}"
                                alt="PocketOffice device-based access security feature for desktop and laptop"
                                title="Device-Based Access Control - PocketOffice"
                                loading="lazy"
                                width="600"
                                height="400" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Desktop & Laptop: Your full cloud desktop on any computer.
                            </h3>
                            <p>
                                Pocketoffice runs entirely in the browser, giving you
                                instant access to your desktop from Windows, macOS, or Linux
                                systems—no software installation required.
                            </p>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'core-features/tablets-mobile-devices.svg') }}"
                                alt="PocketOffice cloud workspace interface on tablet and mobile devices"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Tablets & Mobile Devices: Work on the go, without
                                compromise.
                            </h3>
                            <p>
                                Access your cloud desktop from tablets and mobile devices to
                                review files, manage tasks, or continue work while
                                traveling—everything stays automatically synced.
                            </p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'core-features/modern-browsers.svg') }}"
                                alt="PocketOffice cloud workspace accessible through modern web browsers"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>Modern Browsers: No downloads. Just open and work.</h3>
                            <p>
                                Pocketoffice supports all major modern browsers, ensuring a
                                consistent, secure, and fast desktop experience across
                                devices.
                            </p>
                        </div>
                    </div>

                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'core-features/calender-widget.svg') }}"
                                alt="Secure Access"
                                loading="lazy" />
                        </div>
                        <div class="core-features-card-content">
                            <h3>
                                Calendar Widget: Stay on schedule without leaving your
                                desktop.
                            </h3>
                            <p>
                                The built-in calendar widget keeps your daily agenda visible
                                at a glance, helping you manage meetings, deadlines, and
                                reminders directly from your cloud desktop.
                            </p>
                        </div>
                    </div>

                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'core-features/system-monitor.svg') }}"
                                alt="PocketOffice cloud workspace displayed across multiple system monitors"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                System Monitor: Real-time visibility into your workspace.
                            </h3>
                            <p>
                                Track active applications, system activity, and resource
                                usage through a lightweight system monitor—full visibility
                                without disrupting your workflow.
                            </p>
                        </div>
                    </div>

                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'core-features/notifications.svg') }}"
                                alt="PocketOffice notification center dashboard with real-time alerts and updates"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>Notifications Center: Never miss what matters.</h3>
                            <p>
                                Instant alerts for file activity, sharing updates, and
                                system events, all centralized in one notifications widget
                                for quick access.
                            </p>
                        </div>
                    </div>
                </div>

                <h3 class="core-features-view-main-heading">
                    File Manager & Storage
                </h3>

                <div class="core-features-grid">
                    <!-- Card 1 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'core-features/view-access.svg') }}"
                                alt="PocketOffice file sharing and permission-based access control interface"
                                title="Permission-Based Access Control in PocketOffice"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>View Access: See files without making changes.</h3>
                            <p>
                                Grant view-only access to files and folders so users can
                                review content securely without the risk of edits or
                                accidental changes.
                            </p>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'core-features/edit-access.svg') }}"
                                alt="PocketOffice edit access permissions and secure file modification interface"
                                title="Edit Access Control in PocketOffice"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>Edit Access: Collaborate with confidence.</h3>
                            <p>
                                Allow users to edit files and folders while maintaining
                                visibility and control—perfect for active team
                                collaboration.
                            </p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="/assets/img/core-features/share-access.svg"
                                alt="PocketOffice secure file sharing with role-based access permissions"
                                title="Secure File Sharing in PocketOffice"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>Share Access: Control file sharing.</h3>
                            <p>
                                Manage who can share files externally or internally, with
                                options to restrict, allow, or time-limit sharing according
                                to your organization’s policies.
                            </p>
                        </div>
                    </div>

                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="/assets/img/core-features/on-demand.svg"
                                alt="PocketOffice on-demand cloud storage with scalable workspace capacity"
                                title="On-Demand Cloud Storage in PocketOffice"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                On-Demand Storage Scaling: Add space whenever you need it.
                            </h3>
                            <p>
                                Pocketoffice let's you expand storage instantly as files,
                                projects, and teams grow. No migrations, no downtime, no
                                manual setup—just increase storage and keep working.
                            </p>
                        </div>
                    </div>

                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="/assets/img/core-features/no-disruption.svg"
                                alt="PocketOffice seamless workflow with zero disruption during file access and collaboration"
                                title="Seamless Workflow Without Disruption"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                No Disruption, No Downtime: Keep your workflow
                                uninterrupted.
                            </h3>
                            <p>
                                Storage expansion happens seamlessly in the background,
                                ensuring users can access files without delays or
                                performance drops.
                            </p>
                        </div>
                    </div>

                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="/assets/img/core-features/admin-controlled.svg"
                                alt="PocketOffice admin control panel with user management and access permissions"
                                title="Administrative Control & User Management"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Admin-Controlled Allocation: Allocate storage where it
                                matters most.
                            </h3>
                            <p>
                                Admins can manage storage limits per user, team, or
                                workspace—maintaining cost control while supporting growth.
                            </p>
                        </div>
                    </div>
                </div>

                <h3 class="core-features-view-main-heading">
                    Window-based Multitasking
                </h3>
                <div class="core-features-grid">
                    <!-- Card 1 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="/assets/img/core-features/true-desktop.svg"
                                alt="PocketOffice true cloud desktop experience accessible from any browser or device"
                                title="True Cloud Desktop Experience"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                True Desktop-Style Multitasking: Multiple windows. One
                                workspace.
                            </h3>
                            <p>
                                Open, resize, and manage multiple application windows
                                simultaneously in Pocketoffice—just like a traditional OS,
                                but fully cloud-based.
                            </p>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="/assets/img/core-features/faster-task-switching.svg"
                                alt="PocketOffice optimized performance for faster task execution and workflow efficiency"
                                title="Faster Task Execution & Optimized Performance"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>Faster Task Switching: Move between tasks instantly.</h3>
                            <p>
                                Keep files, apps, and tools visible side by side, reducing
                                context switching and helping you complete work faster with
                                fewer interruptions.
                            </p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="/assets/img/core-features/better-focus.svg"
                                alt="PocketOffice distraction-free cloud desktop designed for better focus and productivity"
                                title="Distraction-Free Workspace for Better Focus"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Better Focus, Better Flow: See everything that matters.
                            </h3>
                            <p>
                                Window-based multitasking helps users stay in control,
                                maintain visual context, and avoid constantly opening and
                                closing apps.
                            </p>
                        </div>
                    </div>
                </div>

                <h3 class="core-features-view-main-heading">App Launcher</h3>
                <div class="core-features-grid">
                    <!-- Card 1 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="/assets/img/core-features/productivity-office-apps.svg"
                                alt="PocketOffice integrated productivity office apps within the cloud desktop workspace"
                                title="Integrated Productivity Office Apps"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Productivity & Office Apps: Get everyday work done faster.
                            </h3>
                            <p>
                                Access document editors, spreadsheets, presentations, and
                                note-taking tools directly from your cloud desktop—no
                                platform switching required.
                            </p>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="/assets/img/core-features/communication-collaboration.svg"
                                alt="PocketOffice real-time collaboration and synchronized work across teams"
                                title="Work in Sync with Real-Time Collaboration"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Communication & Collaboration: Stay connected without
                                leaving your workspace.
                            </h3>
                            <p>
                                Launch chat and email tools from one place, keeping
                                conversations and work in sync.
                            </p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="/assets/img/core-features/web-custom-applications.svg"
                                alt="PocketOffice custom web application integration within the cloud desktop workspace"
                                title="Custom Web Application Integration"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>Web & Custom Applications: Bring your own tools.</h3>
                            <p>
                                Connect any web-based or internal application via URL or
                                IP-based access and launch them like native desktop apps.
                            </p>
                        </div>
                    </div>
                </div>

                <h3 class="core-features-view-main-heading">Drag & Drop UI</h3>
                <div class="core-features-grid">
                    <!-- Card 1 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="/assets/img/core-features/move-files.svg"
                                alt="PocketOffice organized cloud workspace with structured files and folder management"
                                title="Organize Your Workspace Efficiently"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Move Files & Folders Instantly: Organize your workspace with
                                simple drag-and-drop actions.
                            </h3>
                            <p>
                                Move files or folders across the desktop, into folders, or
                                between workspaces—just like a traditional operating system,
                                but fully browser-based.
                            </p>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="/assets/img/core-features/seamless-app-file-interaction.svg"
                                alt="PocketOffice seamless integration between apps and files within the cloud workspace"
                                title="Seamless App and File Integration"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Seamless App & File Interaction: Actions feel natural, not
                                forced.
                            </h3>
                            <p>
                                Drag files into apps, move items between windows, or drop
                                content into shared folders—all without extra clicks or
                                menus.
                            </p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="/assets/img/core-features/designed-for-speed.svg"
                                alt="PocketOffice cloud desktop designed for speed, accuracy, and efficient task execution"
                                title="Designed for Speed and Accuracy"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Designed for Speed & Accuracy: Less friction. More focus
                            </h3>
                            <p>
                                The intuitive drag-and-drop UI reduces repetitive actions,
                                helping users stay focused and efficient throughout the
                                workday.
                            </p>
                        </div>
                    </div>
                </div>
                <h3 class="core-features-view-main-heading">Keyboard Shortcuts</h3>

                <div class="core-features-grid">
                    <!-- Card 1 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="/assets/img/core-features/use-familiar-os-shortcuts.svg"
                                alt="PocketOffice cloud desktop with operating system keyboard shortcuts support"
                                title="Use OS-Level Keyboard Shortcuts"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Use Familiar OS Shortcuts : No learning curve required.
                            </h3>
                            <p>
                                Pocketoffice supports commonly used keyboard shortcuts from
                                traditional operating systems, helping users stay productive
                                from day one.
                            </p>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="/assets/img/core-features/speed-up-daily-actions.svg"
                                alt="PocketOffice tools that speed up daily actions and improve workflow productivity"
                                title="Speed Up Daily Actions"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Speed Up Daily Actions: Small shortcuts, big time savings.
                            </h3>
                            <p>
                                Reduce repetitive actions and complete tasks
                                faster—especially when managing files, switching windows, or
                                navigating the desktop.
                            </p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="/assets/img/core-features/power-user productivity.svg"
                                alt="PocketOffice advanced productivity tools designed for power users and efficient workflows"
                                title="Power User Productivity Features"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Power-User Productivity: Designed for focused, high-output
                                work.
                            </h3>
                            <p>
                                For advanced users, keyboard shortcuts make multitasking
                                smoother and keep attention on the task at hand instead of
                                navigating menus.
                            </p>
                        </div>
                    </div>
                </div>

                <h3 class="core-features-view-main-heading">Multi-device Sync</h3>
                <div class="core-features-grid">
                    <!-- Card 1 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="/assets/img/core-features/work-across-devices-seamlessly.svg"
                                alt="PocketOffice cloud desktop that works seamlessly across desktop, laptop, and mobile devices"
                                title="Work Seamlessly Across Devices"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Work Across Devices Seamlessly : Your desktop follows you
                                everywhere.
                            </h3>
                            <p>
                                With Pocketoffice multi-device sync, your files, apps, and
                                open workspace stay in sync across all devices. Simply log
                                in and continue exactly where you left off.
                            </p>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="/assets/img/core-features/a-day-to-day-scenario.svg"
                                alt="PocketOffice cloud desktop designed to support everyday business workflows and daily tasks"
                                title="Built for Everyday Work Scenarios"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                A Day-to-Day Scenario: From office to home to on the move.
                            </h3>
                            <p>
                                Reduce repetitive actions and complete tasks
                                faster—especially when managing files, switching windows, or
                                navigating the desktop.
                            </p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="/assets/img/core-features/always-up-to-date.svg"
                                alt="PocketOffice cloud desktop that stays automatically updated with the latest features and security improvements"
                                title="Always Up to Date"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>Always Up to Date: No manual syncing required.</h3>
                            <p>
                                Changes made on one device are automatically reflected
                                everywhere, keeping your workspace current and consistent.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CLOUD -->
            <div class="core-features-panel active" id="cloud">
                <div class="core-features-grid">
                    <!-- Card 1 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="/assets/img/core-features/desktop-laptop.svg"
                                alt="PocketOffice device-based access security feature for desktop and laptop"
                                title="Device-Based Access Control - PocketOffice"
                                loading="lazy"
                                width="600"
                                height="400" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Desktop & Laptop: Your full cloud desktop on any computer.
                            </h3>
                            <p>
                                Pocketoffice runs entirely in the browser, giving you
                                instant access to your desktop from Windows, macOS, or Linux
                                systems—no software installation required.
                            </p>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="/assets/img/core-features/tablets-mobile-devices.svg"
                                alt="PocketOffice cloud workspace interface on tablet and mobile devices"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Tablets & Mobile Devices: Work on the go, without
                                compromise.
                            </h3>
                            <p>
                                Access your cloud desktop from tablets and mobile devices to
                                review files, manage tasks, or continue work while
                                traveling—everything stays automatically synced.
                            </p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="/assets/img/core-features/modern-browsers.svg"
                                alt="PocketOffice cloud workspace accessible through modern web browsers"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>Modern Browsers: No downloads. Just open and work.</h3>
                            <p>
                                Pocketoffice supports all major modern browsers, ensuring a
                                consistent, secure, and fast desktop experience across
                                devices.
                            </p>
                        </div>
                    </div>

                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="/assets/img/core-features/calender-widget.svg"
                                alt="Secure Access"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>
                        <div class="core-features-card-content">
                            <h3>
                                Calendar Widget: Stay on schedule without leaving your
                                desktop.
                            </h3>
                            <p>
                                The built-in calendar widget keeps your daily agenda visible
                                at a glance, helping you manage meetings, deadlines, and
                                reminders directly from your cloud desktop.
                            </p>
                        </div>
                    </div>

                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="/assets/img/core-features/system-monitor.svg"
                                alt="PocketOffice cloud workspace displayed across multiple system monitors"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                System Monitor: Real-time visibility into your workspace.
                            </h3>
                            <p>
                                Track active applications, system activity, and resource
                                usage through a lightweight system monitor—full visibility
                                without disrupting your workflow.
                            </p>
                        </div>
                    </div>

                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="/assets/img/core-features/notifications.svg"
                                alt="PocketOffice notification center dashboard with real-time alerts and updates"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>Notifications Center: Never miss what matters.</h3>
                            <p>
                                Instant alerts for file activity, sharing updates, and
                                system events, all centralized in one notifications widget
                                for quick access.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FILE -->
            <div class="core-features-panel" id="file">
                <div class="core-features-grid">
                    <!-- Card 1 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="/assets/img/core-features/view-access.svg"
                                alt="PocketOffice file sharing and permission-based access control interface"
                                title="Permission-Based Access Control in PocketOffice"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>View Access: See files without making changes.</h3>
                            <p>
                                Grant view-only access to files and folders so users can
                                review content securely without the risk of edits or
                                accidental changes.
                            </p>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="/assets/img/core-features/edit-access.svg"
                                alt="PocketOffice edit access permissions and secure file modification interface"
                                title="Edit Access Control in PocketOffice"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>Edit Access: Collaborate with confidence.</h3>
                            <p>
                                Allow users to edit files and folders while maintaining
                                visibility and control—perfect for active team
                                collaboration.
                            </p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="/assets/img/core-features/share-access.svg"
                                alt="PocketOffice secure file sharing with role-based access permissions"
                                title="Secure File Sharing in PocketOffice"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>Share Access: Control file sharing.</h3>
                            <p>
                                Manage who can share files externally or internally, with
                                options to restrict, allow, or time-limit sharing according
                                to your organization’s policies.
                            </p>
                        </div>
                    </div>

                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="/assets/img/core-features/on-demand.svg"
                                alt="PocketOffice on-demand cloud storage with scalable workspace capacity"
                                title="On-Demand Cloud Storage in PocketOffice"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                On-Demand Storage Scaling: Add space whenever you need it.
                            </h3>
                            <p>
                                Pocketoffice let's you expand storage instantly as files,
                                projects, and teams grow. No migrations, no downtime, no
                                manual setup—just increase storage and keep working.
                            </p>
                        </div>
                    </div>

                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="/assets/img/core-features/no-disruption.svg"
                                alt="PocketOffice seamless workflow with zero disruption during file access and collaboration"
                                title="Seamless Workflow Without Disruption"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                No Disruption, No Downtime: Keep your workflow
                                uninterrupted.
                            </h3>
                            <p>
                                Storage expansion happens seamlessly in the background,
                                ensuring users can access files without delays or
                                performance drops.
                            </p>
                        </div>
                    </div>

                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="/assets/img/core-features/admin-controlled.svg"
                                alt="PocketOffice admin control panel with user management and access permissions"
                                title="Administrative Control & User Management"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Admin-Controlled Allocation: Allocate storage where it
                                matters most.
                            </h3>
                            <p>
                                Admins can manage storage limits per user, team, or
                                workspace—maintaining cost control while supporting growth.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- WINDOW -->
            <div class="core-features-panel" id="window">
                <div class="core-features-grid">
                    <!-- Card 1 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="/assets/img/core-features/true-desktop.svg"
                                alt="PocketOffice true cloud desktop experience accessible from any browser or device"
                                title="True Cloud Desktop Experience"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                True Desktop-Style Multitasking: Multiple windows. One
                                workspace.
                            </h3>
                            <p>
                                Open, resize, and manage multiple application windows
                                simultaneously in Pocketoffice—just like a traditional OS,
                                but fully cloud-based.
                            </p>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="/assets/img/core-features/faster-task-switching.svg"
                                alt="PocketOffice optimized performance for faster task execution and workflow efficiency"
                                title="Faster Task Execution & Optimized Performance"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>Faster Task Switching: Move between tasks instantly.</h3>
                            <p>
                                Keep files, apps, and tools visible side by side, reducing
                                context switching and helping you complete work faster with
                                fewer interruptions.
                            </p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="/assets/img/core-features/better-focus.svg"
                                alt="PocketOffice distraction-free cloud desktop designed for better focus and productivity"
                                title="Distraction-Free Workspace for Better Focus"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Better Focus, Better Flow: See everything that matters.
                            </h3>
                            <p>
                                Window-based multitasking helps users stay in control,
                                maintain visual context, and avoid constantly opening and
                                closing apps.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- LAUNCHER -->
            <div class="core-features-panel" id="launcher">
                <div class="core-features-grid">
                    <!-- Card 1 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="/assets/img/core-features/productivity-office-apps.svg"
                                alt="PocketOffice integrated productivity office apps within the cloud desktop workspace"
                                title="Integrated Productivity Office Apps"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Productivity & Office Apps: Get everyday work done faster.
                            </h3>
                            <p>
                                Access document editors, spreadsheets, presentations, and
                                note-taking tools directly from your cloud desktop—no
                                platform switching required.
                            </p>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="/assets/img/core-features/communication-collaboration.svg"
                                alt="PocketOffice real-time collaboration and synchronized work across teams"
                                title="Work in Sync with Real-Time Collaboration"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Communication & Collaboration: Stay connected without
                                leaving your workspace.
                            </h3>
                            <p>
                                Launch chat and email tools from one place, keeping
                                conversations and work in sync.
                            </p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="/assets/img/core-features/web-custom-applications.svg"
                                alt="PocketOffice custom web application integration within the cloud desktop workspace"
                                title="Custom Web Application Integration"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>Web & Custom Applications: Bring your own tools.</h3>
                            <p>
                                Connect any web-based or internal application via URL or
                                IP-based access and launch them like native desktop apps.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- DRAG -->
            <div class="core-features-panel" id="drag">
                <div class="core-features-grid">
                    <!-- Card 1 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="/assets/img/core-features/move-files.svg"
                                alt="PocketOffice organized cloud workspace with structured files and folder management"
                                title="Organize Your Workspace Efficiently"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Move Files & Folders Instantly: Organize your workspace with
                                simple drag-and-drop actions.
                            </h3>
                            <p>
                                Move files or folders across the desktop, into folders, or
                                between workspaces—just like a traditional operating system,
                                but fully browser-based.
                            </p>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="/assets/img/core-features/seamless-app-file-interaction.svg"
                                alt="PocketOffice seamless integration between apps and files within the cloud workspace"
                                title="Seamless App and File Integration"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Seamless App & File Interaction: Actions feel natural, not
                                forced.
                            </h3>
                            <p>
                                Drag files into apps, move items between windows, or drop
                                content into shared folders—all without extra clicks or
                                menus.
                            </p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="/assets/img/core-features/designed-for-speed.svg"
                                alt="PocketOffice cloud desktop designed for speed, accuracy, and efficient task execution"
                                title="Designed for Speed and Accuracy"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Designed for Speed & Accuracy: Less friction. More focus
                            </h3>
                            <p>
                                The intuitive drag-and-drop UI reduces repetitive actions,
                                helping users stay focused and efficient throughout the
                                workday.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- KEYBOARD -->
            <div class="core-features-panel" id="keyboard">
                <div class="core-features-grid">
                    <!-- Card 1 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="/assets/img/core-features/use-familiar-os-shortcuts.svg"
                                alt="PocketOffice cloud desktop with operating system keyboard shortcuts support"
                                title="Use OS-Level Keyboard Shortcuts"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Use Familiar OS Shortcuts : No learning curve required.
                            </h3>
                            <p>
                                Pocketoffice supports commonly used keyboard shortcuts from
                                traditional operating systems, helping users stay productive
                                from day one.
                            </p>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="/assets/img/core-features/speed-up-daily-actions.svg"
                                alt="PocketOffice tools that speed up daily actions and improve workflow productivity"
                                title="Speed Up Daily Actions"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Speed Up Daily Actions: Small shortcuts, big time savings.
                            </h3>
                            <p>
                                Reduce repetitive actions and complete tasks
                                faster—especially when managing files, switching windows, or
                                navigating the desktop.
                            </p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="/assets/img/core-features/power-user productivity.svg"
                                alt="PocketOffice advanced productivity tools designed for power users and efficient workflows"
                                title="Power User Productivity Features"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Power-User Productivity: Designed for focused, high-output
                                work.
                            </h3>
                            <p>
                                For advanced users, keyboard shortcuts make multitasking
                                smoother and keep attention on the task at hand instead of
                                navigating menus.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SYNC -->
            <div class="core-features-panel" id="sync">
                <div class="core-features-grid">
                    <!-- Card 1 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="/assets/img/core-features/work-across-devices-seamlessly.svg"
                                alt="PocketOffice cloud desktop that works seamlessly across desktop, laptop, and mobile devices"
                                title="Work Seamlessly Across Devices"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Work Across Devices Seamlessly : Your desktop follows you
                                everywhere.
                            </h3>
                            <p>
                                With Pocketoffice multi-device sync, your files, apps, and
                                open workspace stay in sync across all devices. Simply log
                                in and continue exactly where you left off.
                            </p>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="/assets/img/core-features/a-day-to-day-scenario.svg"
                                alt="PocketOffice cloud desktop designed to support everyday business workflows and daily tasks"
                                title="Built for Everyday Work Scenarios"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                A Day-to-Day Scenario: From office to home to on the move.
                            </h3>
                            <p>
                                Reduce repetitive actions and complete tasks
                                faster—especially when managing files, switching windows, or
                                navigating the desktop.
                            </p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="/assets/img/core-features/always-up-to-date.svg"
                                alt="PocketOffice cloud desktop that stays automatically updated with the latest features and security improvements"
                                title="Always Up to Date"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>Always Up to Date: No manual syncing required.</h3>
                            <p>
                                Changes made on one device are automatically reflected
                                everywhere, keeping your workspace current and consistent.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection