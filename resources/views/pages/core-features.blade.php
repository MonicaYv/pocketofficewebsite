@extends('layouts.backendsettings')
@section('title', 'Cloud Desktop Core Features | File Manager, Multitasking & Sync | Pocket
Office')
@section('meta-title', 'Cloud Desktop Core Features | File Manager, Multitasking & Sync | Pocket Office')
@section('meta-description', 'Explore Pocket Office core features including file manager, multitasking, sync, and collaboration tools for a powerful cloud desktop workspace.')
@section('meta-keywords', 'cloud desktop features, file manager, multitasking, sync tools, collaboration workspace')
@section('meta-image', 'https://pocket-office.ai/assets/img/hero-images/core-features.svg')
@section('canonical', 'https://pocket-office.ai/core-features')
@section('meta-url', 'https://pocket-office.ai/core-features')
@section('structured-data')
@verbatim
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "Core Features | Pocket Office",
  "url": "https://pocket-office.ai/core-features",
  "description": "Explore Pocket Office core features including file manager, multitasking, sync, and collaboration tools for a powerful cloud desktop workspace.",
  "inLanguage": "en",
  "image": "https://pocket-office.ai/assets/img/hero-images/core-features.svg",
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
                    Cloud Desktop
                </button>
                <button class="core-features-tab" data-tab="file">
                    Files & Storage
                </button>
                <button class="core-features-tab" data-tab="window">
                    Multiple-Window Support
                </button>
                <button class="core-features-tab" data-tab="launcher">
                    My Apps
                </button>
                <button class="core-features-tab" data-tab="drag">
                    One-Click Drag & Drop 
                </button>
                <button class="core-features-tab" data-tab="keyboard">
                    Keyboard shortcuts
                </button>
                <button class="core-features-tab" data-tab="sync">
                    Sync Across Devices
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
                                Desktop & Laptop
                            </h3>
                            <p>
                                Access your personal cloud desktop from any Windows, Mac, or Linux computer—no installation required. Just open your web browser and start working.
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
                                Tablets & Mobile Devices
                            </h3>
                            <p>
                               Access your cloud desktop from your tablet or smartphone anytime. View files, manage your work, and stay productive wherever you are.
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
                            <h3>Web Browser Access</h3>
                            <p>
                                Open your cloud desktop in any modern web browser. Access your cloud desktop instantly using Chrome, Edge, Firefox, Safari, or any modern web browser.
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
                                Calendar & Reminders
                            </h3>
                            <p>
                                Keep your work organized with an easy-to-use calendar. Schedule meetings, track important dates, and receive timely reminders.
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
                                Real-Time System Status
                            </h3>
                            <p>
                                Keep an eye on your cloud desktop's performance with real-time updates on apps, memory, storage, and system activity—all in one place.
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
                            <h3>Smart Notification Center</h3>
                            <p>
                               Get instant alerts for shared files, important updates, reminders, and system events to keep your work on track.
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
                            <h3>View-Only Access</h3>
                            <p>
                                Share files and folders with confidence. Others can open and view your content without editing, deleting, or making any changes.
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
                            <h3>Easy File Collaboration</h3>
                            <p>
                                Work together on files and folders in real time. Give trusted users permission to edit, update, and save changes with ease.
                            </p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'core-features/share-access.svg') }}"
                                alt="PocketOffice secure file sharing with role-based access permissions"
                                title="Secure File Sharing in PocketOffice"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>Share Access</h3>
                            <p>
                                Share files and folders securely with the right people. Choose who can access, view, or edit your content with ease.
                            </p>
                        </div>
                    </div>

                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'core-features/on-demand.svg') }}"
                                alt="PocketOffice on-demand cloud storage with scalable workspace capacity"
                                title="On-Demand Cloud Storage in PocketOffice"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Expand Storage Anytime
                            </h3>
                            <p>
                                Start with the storage you need today and expand it anytime as your files, projects, and team continue to grow.
                            </p>
                        </div>
                    </div>

                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'core-features/no-disruption.svg') }}"
                                alt="PocketOffice seamless workflow with zero disruption during file access and collaboration"
                                title="Seamless Workflow Without Disruption"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Upgrade Without Interruptions
                            </h3>
                            <p>
                               Add more storage without stopping your work. Everything continues to run smoothly while your storage is upgraded.
                            </p>
                        </div>
                    </div>

                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'core-features/admin-controlled.svg') }}"
                                alt="PocketOffice admin control panel with user management and access permissions"
                                title="Administrative Control & User Management"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Smart Storage Management
                            </h3>
                            <p>
                                Easily allocate and adjust storage for users, teams, and workspaces—all from a single admin dashboard.
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
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'core-features/true-desktop.svg') }}"
                                alt="PocketOffice true cloud desktop experience accessible from any browser or device"
                                title="True Cloud Desktop Experience"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Multiple Apps, One Workspace
                            </h3>
                            <p>
                                Open and use multiple apps at the same time. Resize, switch, and organize windows just like on your personal computer.
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'core-features/faster-task-switching.svg') }}"
                                alt="PocketOffice optimized performance for faster task execution and workflow efficiency"
                                title="Faster Task Execution & Optimized Performance"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>Smooth Multitasking</h3>
                            <p>
                                Keep multiple windows open and move between files, apps, and tools effortlessly—so you can stay productive without breaking your workflow.
                            </p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'core-features/better-focus.svg') }}"
                                alt="PocketOffice distraction-free cloud desktop designed for better focus and productivity"
                                title="Distraction-Free Workspace for Better Focus"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Everything You Need, All at Once
                            </h3>
                            <p>
                               Keep multiple apps and files visible in one workspace, making it easier to stay focused, organized, and productive throughout your day.
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
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'core-features/productivity-office-apps.svg') }}"
                                alt="PocketOffice integrated productivity office apps within the cloud desktop workspace"
                                title="Integrated Productivity Office Apps"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Work Smarter with Office Apps
                            </h3>
                            <p>
                                Create, edit, and manage documents, spreadsheets, presentations, and notes from one secure cloud desktop Pocketoffice no switching between platforms or devices.
                            </p>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'core-features/communication-collaboration.svg') }}"
                                alt="PocketOffice real-time collaboration and synchronized work across teams"
                                title="Work in Sync with Real-Time Collaboration"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Communicate with Your Team
                            </h3>
                            <p>
                                Access chat and email directly from your cloud desktop, keeping conversations, collaboration, and work together in one secure workspace
                            </p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'core-features/web-custom-applications.svg') }}"
                                alt="PocketOffice custom web application integration within the cloud desktop workspace"
                                title="Custom Web Application Integration"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>Bring Your Own Apps</h3>
                            <p>
                                Access your favorite web applications and business tools directly from your cloud desktop. Add your own apps and launch them instantly Pocketoffice no switching between platforms or devices.
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
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'core-features/move-files.svg') }}"
                                alt="PocketOffice organized cloud workspace with structured files and folder management"
                                title="Organize Your Workspace Efficiently"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Drag, Drop & Stay Organized
                            </h3>
                            <p>
                                Easily move files and folders around your cloud desktop with familiar drag-and-drop controls, making file management quick, simple, and hassle-free.
                            </p>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'core-features/seamless-app-file-interaction.svg') }}"
                                alt="PocketOffice seamless integration between apps and files within the cloud workspace"
                                title="Seamless App and File Integration"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Move Files Effortlessly
                            </h3>
                            <p>
                                Drag files into applications, organize folders, and share content with ease. Enjoy a familiar desktop-like experience that makes every task faster and more intuitive.
                            </p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'core-features/designed-for-speed.svg') }}"
                                alt="PocketOffice cloud desktop designed for speed, accuracy, and efficient task execution"
                                title="Designed for Speed and Accuracy"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Designed for Better Productivity
                            </h3>
                            <p>
                                A simple drag-and-drop experience helps you organize files quickly, so you can spend more time working and less time managing.
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
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'core-features/use-familiar-os-shortcuts.svg') }}"
                                alt="PocketOffice cloud desktop with operating system keyboard shortcuts support"
                                title="Use OS-Level Keyboard Shortcuts"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Use Familiar Keyboard Shortcuts
                            </h3>
                            <p>
                                Use familiar keyboard shortcuts for everyday actions like copy, paste, save, and switch between apps so you can work comfortably and stay productive from the very first login. 
                            </p>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'core-features/speed-up-daily-actions.svg') }}"
                                alt="PocketOffice tools that speed up daily actions and improve workflow productivity"
                                title="Speed Up Daily Actions"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Save Time on Every Task
                            </h3>
                            <p>
                                Use familiar keyboard shortcuts to navigate your workspace, manage files, and switch between applications quickly so you can focus more on your work and less on repetitive actions. 
                            </p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'core-features/power-user productivity.svg') }}"
                                alt="PocketOffice advanced productivity tools designed for power users and efficient workflows"
                                title="Power User Productivity Features"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Boost Your Productivity
                            </h3>
                            <p>
                                Work faster with familiar keyboard shortcuts that help you switch between apps, manage files, and complete tasks efficiently Pocketoffice keeping your attention on your work instead of navigating menus.
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
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'core-features/work-across-devices-seamlessly.svg') }}"
                                alt="PocketOffice cloud desktop that works seamlessly across desktop, laptop, and mobile devices"
                                title="Work Seamlessly Across Devices"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                One Workspace. Every Device
                            </h3>
                            <p>
                                Your cloud desktop, files, and applications stay synchronized across all your devices. Simply sign in from anywhere and continue working exactly where you left off. 
                            </p>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'core-features/a-day-to-day-scenario.svg') }}"
                                alt="PocketOffice cloud desktop designed to support everyday business workflows and daily tasks"
                                title="Built for Everyday Work Scenarios"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Your Workspace Moves with You
                            </h3>
                            <p>
                                Start your day at the office, continue from home, or work while traveling. Your desktop, files, and applications stay synchronized, so you can pick up right where you left off. 
                            </p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'core-features/always-up-to-date.svg') }}"
                                alt="PocketOffice cloud desktop that stays automatically updated with the latest features and security improvements"
                                title="Always Up to Date"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>Your Workspace, Always Up to Date</h3>
                            <p>
                                Every change you make is automatically synchronized across your devices, so your files, applications, and desktop are always ready with the latest updates wherever you work. 
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
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'core-features/desktop-laptop.svg') }}"
                                alt="PocketOffice device-based access security feature for desktop and laptop"
                                title="Device-Based Access Control - PocketOffice"
                                loading="lazy"
                                width="600"
                                height="400" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Desktop & Laptop
                            </h3>
                            <p>
                               Access your personal cloud desktop from any Windows, Mac, or Linux computer—no installation required. Just open your web browser and start working.
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
                                Tablets & Mobile Devices
                            </h3>
                            <p>
                                Access your cloud desktop from your tablet or smartphone anytime. View files, manage your work, and stay productive wherever you are.
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
                            <h3>Web Browser Access</h3>
                            <p>
                                Open your cloud desktop in any modern web browser. Access your cloud desktop instantly using Chrome, Edge, Firefox, Safari, or any modern web browser.
                            </p>
                        </div>
                    </div>

                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'core-features/calender-widget.svg') }}"
                                alt="Secure Access"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>
                        <div class="core-features-card-content">
                            <h3>
                                Calendar & Reminders
                            </h3>
                            <p>
                                Keep your work organized with an easy-to-use calendar. Schedule meetings, track important dates, and receive timely reminders.
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
                                Real-Time System Status
                            </h3>
                            <p>
                                Keep an eye on your cloud desktop's performance with real-time updates on apps, memory, storage, and system activity—all in one place.
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
                            <h3>Smart Notification Center</h3>
                            <p>
                               Get instant alerts for shared files, important updates, reminders, and system events to keep your work on track.
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
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'core-features/view-access.svg') }}"
                                alt="PocketOffice file sharing and permission-based access control interface"
                                title="Permission-Based Access Control in PocketOffice"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>View-Only Access</h3>
                            <p>
                                Share files and folders with confidence. Others can open and view your content without editing, deleting, or making any changes.
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
                            <h3>Easy File Collaboration</h3>
                            <p>
                                Work together on files and folders in real time. Give trusted users permission to edit, update, and save changes with ease.
                            </p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'core-features/share-access.svg') }}"
                                alt="PocketOffice secure file sharing with role-based access permissions"
                                title="Secure File Sharing in PocketOffice"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>Share Access</h3>
                            <p>
                                Share files and folders securely with the right people. Choose who can access, view, or edit your content with ease.
                            </p>
                        </div>
                    </div>

                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'core-features/on-demand.svg') }}"
                                alt="PocketOffice on-demand cloud storage with scalable workspace capacity"
                                title="On-Demand Cloud Storage in PocketOffice"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Expand Storage Anytime
                            </h3>
                            <p>
                                Start with the storage you need today and expand it anytime as your files, projects, and team continue to grow.
                            </p>
                        </div>
                    </div>

                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'core-features/no-disruption.svg') }}"
                                alt="PocketOffice seamless workflow with zero disruption during file access and collaboration"
                                title="Seamless Workflow Without Disruption"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Upgrade Without Interruptions
                            </h3>
                            <p>
                               Add more storage without stopping your work. Everything continues to run smoothly while your storage is upgraded.
                            </p>
                        </div>
                    </div>

                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'core-features/admin-controlled.svg') }}"
                                alt="PocketOffice admin control panel with user management and access permissions"
                                title="Administrative Control & User Management"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Smart Storage Management
                            </h3>
                            <p>
                                Easily allocate and adjust storage for users, teams, and workspaces—all from a single admin dashboard.
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
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'core-features/true-desktop.svg') }}"
                                alt="PocketOffice true cloud desktop experience accessible from any browser or device"
                                title="True Cloud Desktop Experience"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Multiple Apps, One Workspace
                            </h3>
                            <p>
                                Open and use multiple apps at the same time. Resize, switch, and organize windows just like on your personal computer.
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'core-features/faster-task-switching.svg') }}"
                                alt="PocketOffice optimized performance for faster task execution and workflow efficiency"
                                title="Faster Task Execution & Optimized Performance"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>Smooth Multitasking</h3>
                            <p>
                                Keep multiple windows open and move between files, apps, and tools effortlessly—so you can stay productive without breaking your workflow.
                            </p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'core-features/better-focus.svg') }}"
                                alt="PocketOffice distraction-free cloud desktop designed for better focus and productivity"
                                title="Distraction-Free Workspace for Better Focus"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Everything You Need, All at Once
                            </h3>
                            <p>
                               Keep multiple apps and files visible in one workspace, making it easier to stay focused, organized, and productive throughout your day.
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
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'core-features/productivity-office-apps.svg') }}"
                                alt="PocketOffice integrated productivity office apps within the cloud desktop workspace"
                                title="Integrated Productivity Office Apps"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Work Smarter with Office Apps
                            </h3>
                            <p>
                                Create, edit, and manage documents, spreadsheets, presentations, and notes from one secure cloud desktop Pocketoffice no switching between platforms or devices.
                            </p>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'core-features/communication-collaboration.svg') }}"
                                alt="PocketOffice real-time collaboration and synchronized work across teams"
                                title="Work in Sync with Real-Time Collaboration"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Communicate with Your Team
                            </h3>
                            <p>
                                Access chat and email directly from your cloud desktop, keeping conversations, collaboration, and work together in one secure workspace
                            </p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'core-features/web-custom-applications.svg') }}"
                                alt="PocketOffice custom web application integration within the cloud desktop workspace"
                                title="Custom Web Application Integration"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>Bring Your Own Apps</h3>
                            <p>
                                Access your favorite web applications and business tools directly from your cloud desktop. Add your own apps and launch them instantly Pocketoffice no switching between platforms or devices.
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
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'core-features/move-files.svg') }}"
                                alt="PocketOffice organized cloud workspace with structured files and folder management"
                                title="Organize Your Workspace Efficiently"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Drag, Drop & Stay Organized
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
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'core-features/seamless-app-file-interaction.svg') }}"
                                alt="PocketOffice seamless integration between apps and files within the cloud workspace"
                                title="Seamless App and File Integration"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Move Files Effortlessly
                            </h3>
                            <p>
                                Drag files into applications, organize folders, and share content with ease. Enjoy a familiar desktop-like experience that makes every task faster and more intuitive.
                            </p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'core-features/designed-for-speed.svg') }}"
                                alt="PocketOffice cloud desktop designed for speed, accuracy, and efficient task execution"
                                title="Designed for Speed and Accuracy"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Designed for Better Productivity
                            </h3>
                            <p>
                                A simple drag-and-drop experience helps you organize files quickly, so you can spend more time working and less time managing.
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
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'core-features/use-familiar-os-shortcuts.svg') }}"
                                alt="PocketOffice cloud desktop with operating system keyboard shortcuts support"
                                title="Use OS-Level Keyboard Shortcuts"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Use Familiar Keyboard Shortcuts
                            </h3>
                            <p>
                                Use familiar keyboard shortcuts for everyday actions like copy, paste, save, and switch between apps so you can work comfortably and stay productive from the very first login. 
                            </p>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'core-features/speed-up-daily-actions.svg') }}"
                                alt="PocketOffice tools that speed up daily actions and improve workflow productivity"
                                title="Speed Up Daily Actions"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Save Time on Every Task
                            </h3>
                            <p>
                                Use familiar keyboard shortcuts to navigate your workspace, manage files, and switch between applications quickly so you can focus more on your work and less on repetitive actions. 
                            </p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'core-features/power-user productivity.svg') }}"
                                alt="PocketOffice advanced productivity tools designed for power users and efficient workflows"
                                title="Power User Productivity Features"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Boost Your Productivity
                            </h3>
                            <p>
                                Work faster with familiar keyboard shortcuts that help you switch between apps, manage files, and complete tasks efficiently Pocketoffice keeping your attention on your work instead of navigating menus.
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
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'core-features/work-across-devices-seamlessly.svg') }}"
                                alt="PocketOffice cloud desktop that works seamlessly across desktop, laptop, and mobile devices"
                                title="Work Seamlessly Across Devices"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                One Workspace. Every Device
                            </h3>
                            <p>
                                Your cloud desktop, files, and applications stay synchronized across all your devices. Simply sign in from anywhere and continue working exactly where you left off. 
                            </p>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="core-features-card">
                        <div class="core-features-card-img">
                            <img
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'core-features/a-day-to-day-scenario.svg') }}"
                                alt="PocketOffice cloud desktop designed to support everyday business workflows and daily tasks"
                                title="Built for Everyday Work Scenarios"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>
                                Your Workspace Moves with You.
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
                                src="{{ asset($constants['IMAGEFILEPATH'] . 'core-features/always-up-to-date.svg') }}"
                                alt="PocketOffice cloud desktop that stays automatically updated with the latest features and security improvements"
                                title="Always Up to Date"
                                width="600"
                                height="400"
                                loading="lazy" />
                        </div>

                        <div class="core-features-card-content">
                            <h3>Your Workspace, Always Up to Date</h3>
                            <p>
                                Every change you make is automatically synchronized across your devices, so your files, applications, and desktop are always ready with the latest updates wherever you work. 
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection