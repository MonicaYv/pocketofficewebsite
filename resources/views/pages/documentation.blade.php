@extends('layouts.backendsettings')
@section('title', 'Help Center & Documentation | Cloud Desktop Guides | Pocket Office')
@section('meta-title', 'Help Center & Documentation | Cloud Desktop Guides | Pocket Office')
@section('meta-description', 'Access Pocket Office help center and documentation for cloud desktop guides, setup instructions, and support resources.')
@section('meta-keywords', 'help center documentation, cloud desktop guides, pocket office support, setup instructions')
@section('meta-image', 'https://pocketdesk.sizaf.com/assets/img/hero-images/getting-started.svg')
@section('canonical', 'https://pocketdesk.sizaf.com/documentation')
@section('meta-url', 'https://pocketdesk.sizaf.com/documentation')
@section('structured-data')
@verbatim
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "Documentation | Pocket Office",
  "url": "https://pocketdesk.sizaf.com/documentation",
  "description": "Access Pocket Office help center and documentation for cloud desktop guides, setup instructions, and support resources.",
  "inLanguage": "en",
  "image": "https://pocketdesk.sizaf.com/assets/img/hero-images/getting-started.svg",
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
    style="background-image: url(assets/img/hero-images/getting-started.svg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner">
                    <h1 class="page-title">Team Setup & Collaboration</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb area End -->

<section class="docs-wrapper">
    <!-- Sidebar Navigation -->
    <div class="aside-login">
        <aside class="docs-sidebar">
            <h3>Getting Started</h3>
            <ul>
                <li><a href="#overview" class="nav-link">Get a Quick Overview</a></li>
                <li>
                    <a href="#workspace" class="nav-link">Set Up Your Workspace</a>
                </li>
                <li><a href="#working" class="nav-link">Start Working</a></li>
                <li>
                    <a href="#collaborate" class="nav-link">Collaborate & Share</a>
                </li>
                <li><a href="#secure" class="nav-link">Secure & Manage Access</a></li>
            </ul>
            <!-- CTA Button -->

        </aside>
        <div class="mt-4">
            <a href="./docs-login.html" class="btn btn-primary w-100" id="loginBtn">
                Login to Training Portal
            </a>
        </div>
    </div>
    <!-- Main Content -->
    <div class="docs-content">
        <!-- Hero Section -->
        <div class="hero">
            <h1>Getting Started</h1>
            <p>
                Set up your complete PocketOffice cloud desktop in minutes — no
                installation or complex configuration required. This checklist
                guides you from your first login to productive use.
            </p>
        </div>

        <!-- Section 1 -->
        <section id="overview" class="doc-section">
            <h3>Get a Quick Overview</h3>
            <p class="section-intro">
                Understand the desktop layout and core workflows before customizing.
            </p>

            <div class="doc-item">
                <h3>Intro to PocketOffice</h3>
                <p>
                    High-level walkthrough of files, apps, multitasking, and system
                    widgets.
                </p>
            </div>

            <div class="doc-item">
                <h3>Explore the Demo Workspace</h3>
                <p>
                    Try a live demo of files, folders, apps, and shared workspaces.
                </p>
                <span class="note">
                    Note: Demo changes reset on refresh and may not include advanced
                    admin or security settings.
                </span>
            </div>

            <div class="doc-item">
                <h3>Watch the Desktop Tour</h3>
                <p>
                    Learn navigation, window management, and drag-and-drop actions.
                </p>
            </div>
        </section>

        <!-- Section 2 -->
        <section id="workspace" class="doc-section">
            <h3>Set Up Your Workspace</h3>
            <p class="section-intro">
                Customize your workspace solo or with a team.
            </p>

            <div class="doc-item">
                <h3>Create Your Desktop</h3>
                <p>Access your cloud desktop instantly from any browser.</p>
            </div>

            <div class="doc-item">
                <h3>Organize Files & Folders</h3>
                <p>Upload and arrange files for quick access.</p>
            </div>

            <div class="doc-item">
                <h3>Connect Storage (Optional)</h3>
                <p>Link Google Drive, Dropbox, or OneDrive.</p>
            </div>
        </section>

        <!-- Section 3 -->
        <section id="working" class="doc-section">
            <h3>Start Working</h3>
            <p class="section-intro">
                Personalize your workspace and start working independently or
                together with your team.
            </p>

            <div class="doc-item">
                <h3>Launch Apps</h3>
                <p>Open productivity, communication, or internal tools.</p>
            </div>

            <div class="doc-item">
                <h3>Use Multitasking & Shortcuts</h3>
                <p>Switch tasks quickly and efficiently.</p>
            </div>

            <div class="doc-item">
                <h3>Enable Multi-Device Sync</h3>
                <p>Work seamlessly across devices.</p>
            </div>
        </section>

        <!-- Section 4 -->
        <section id="collaborate" class="doc-section">
            <h3>Collaborate & Share</h3>
            <p class="section-intro">
                Share resources securely and collaborate with your team to keep work
                organized and accessible.
            </p>

            <div class="doc-item">
                <h3>Invite Team Members</h3>
                <p>Add users with appropriate roles.</p>
            </div>

            <div class="doc-item">
                <h3>Share Files & Folders</h3>
                <p>
                    Internal or external sharing with permission and time-limited
                    access.
                </p>
            </div>

            <div class="doc-item">
                <h3>Create Shared Workspaces</h3>
                <p>Organize by teams, departments, or projects.</p>
            </div>
        </section>

        <!-- Section 5 -->
        <section id="secure" class="doc-section">
            <h3>Secure & Manage Access</h3>

            <div class="doc-item">
                <h3>Set Permissions</h3>
                <p>Control who can view, edit, or share.</p>
            </div>

            <div class="doc-item">
                <h3>Review Activity Logs</h3>
                <p>Track file access and changes.</p>
            </div>

            <div class="doc-item">
                <h3>Configure Backup & Recovery</h3>
                <p>Protect and recover your data anytime.</p>
            </div>
        </section>
    </div>
</section>
@endsection