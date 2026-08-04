@extends('layouts.backendsettings')
@section('title', 'Help Center & Documentation | Cloud Desktop Guides | Pocket Office')
@section('meta-title', 'Help Center & Documentation | Cloud Desktop Guides | Pocket Office')
@section('meta-description', 'Access Pocket Office help center and documentation for cloud desktop guides, setup instructions, and support resources.')
@section('meta-keywords', 'help center documentation, cloud desktop guides, pocket office support, setup instructions')
@section('meta-image', 'https://pocket-office.ai/assets/img/hero-images/getting-started.svg')
@section('canonical', 'https://pocket-office.ai/documentation')
@section('meta-url', 'https://pocket-office.ai/documentation')
@section('structured-data')
@verbatim
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "Documentation | Pocket Office",
  "url": "https://pocket-office.ai/documentation",
  "description": "Access Pocket Office help center and documentation for cloud desktop guides, setup instructions, and support resources.",
  "inLanguage": "en",
  "image": "https://pocket-office.ai/assets/img/hero-images/getting-started.svg",
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

<!-- Breadcrumb -->
<div class="breadcrumb-area" style="background-image: url(assets/img/hero-images/getting-started.svg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner">
                    <h1 class="page-title">Getting Started</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Terms & Conditions Area Start-->
 <div class="terms-container content-wrapper">
   <!-- Sidebar -->
   <div class="sidebar-section">
     <aside class="sidebar" style="height: auto; max-height: 400px; overflow-y: auto;">
       <h2>Table Of Contents</h2>

       <a href="#overview">
         <i class="fa fa-file-text mr-2"></i> Overview
       </a>

       <a href="#account-responsibilities">
         <i class="fa fa-user mr-2"></i> Set Up Your Workspace
       </a>

       <a href="#acceptable-use">
         <i class="fa fa-check-square mr-2"></i> Start Working
       </a>

       <a href="#content-responsibility">
         <i class="fa fa-pencil-square mr-2"></i> Collaborate & Share
       </a>

       <a href="#team-responsibility">
         <i class="fa fa-users mr-2"></i> Secure & Manage Access
       </a>
     </aside>
     <div class="mt-4">
            <a href="/docs-login" class="btn btn-green w-100" id="loginBtn">
                Login to Training Portal
            </a>
        </div>
   </div>

   <div class="content-section">
     <!--Overview Section-->
     <section id="overview" class="card">
       <div class="card-header">
         <div class="icon-box">
           <i class="fa fa-file-text"></i>
         </div>
         <div>
           <h3>1. Overview</h3>
         </div>
       </div>
       <div class="card-body">
         <p>
           Get familiar with PocketOffice and understand how your digital workspace is organized before you begin customizing it.
         </p>
         <h6>Introduction to PocketOffice</h6>
         <p>PocketOffice provides a secure, cloud-based desktop experience that combines files, applications, collaboration tools, and workspace management in one place. Whether you’re working individually or as part of a team, PocketOffice helps you stay organized, productive, and connected from any device.</p>
         <h6>Explore the Demo Workspace</h6>
         <p>Experience PocketOffice firsthand through our interactive demo environment. Browse files and folders, open applications, test workspace features, and explore how teams collaborate within shared environments.</p>
          <p style="margin-top:.5rem"><strong style="color:#0d2d36;font-size:13.5px">What you can explore:</strong></p>
                <ul>
                    <li>Desktop navigation and workspace layout</li>
                    <li>File and folder management</li>
                    <li>Application launching and switching</li>
                    <li>Shared workspaces and collaboration features</li>
                    <li>System widgets and productivity tools</li>
                </ul>
            <span class="note">
                    Note: Changes made in the demo workspace are temporary and will reset when the page is refreshed.
                    Advanced administrative controls and security settings may not be available in the demo environment.
            </span>
             <p style="margin-top:.5rem"><strong style="color:#0d2d36;font-size:13.5px">Learn how to:</strong></p>
                <ul>
                    <li>Navigate the desktop interface</li>
                    <li>Open, resize, and organize windows</li>
                    <li>Use drag-and-drop actions</li>
                    <li>Access applications and widgets</li>
                    <li>Manage files quickly and efficiently</li>
                </ul>
       </div>
     </section>

     <!--Account Responsibilities Section-->
     <section id="account-responsibilities" class="card">
       <div class="card-header">
         <div class="icon-box">
           <i class="fa fa-user"></i>
         </div>
         <div>
           <h3>2. Set Up Your Workspace</h3>
         </div>
       </div>
       <div class="card-body">
         <p>Create a workspace that matches your workflow and helps you stay productive from day one.</p>
         <h6>Create Your Desktop</h6>
         <p>
           Launch your personal cloud desktop in seconds and access it securely from any modern browser. No software installation is required, allowing you to work from anywhere with ease.
         </p>
         <h6>Organize Files & Folders</h6>
         <p>Keep your workspace structured by uploading documents, creating folders, and organizing resources for quick access.</p>
         <p style="margin-top:.5rem"><strong style="color:#0d2d36;font-size:13.5px">Benefits::</strong></p>
                <ul>
                    <li>Faster file discovery</li>
                    <li>Better project organization</li>
                    <li>Improved productivity</li>
                    <li>Simplified document management</li>
                </ul>
        <h6>Connect External Storage (Optional)</h6>
         <p>
           Integrate your existing cloud storage services directly into PocketOffice and access all your files from a single workspace.
        </p>
        <p style="margin-top:.5rem"><strong style="color:#0d2d36;font-size:13.5px">Supported integrations include:</strong></p>
                <ul>
                    <li>Google Drive</li>
                    <li>Dropbox</li>
                    <li>Microsoft OneDrive</li>
                </ul>
        <p>Manage multiple storage locations without switching between different platforms.</p>
       </div>
     </section>

     <!--Acceptable Use Section-->
     <section id="acceptable-use" class="card">
       <div class="card-header">
         <div class="icon-box">
           <i class="fa fa-check-square"></i>
         </div>
         <div>
           <h3>3. Start Working</h3>
         </div>
       </div>
       <div class="card-body">
         <p>
           Personalize your workspace and begin completing tasks independently or collaboratively with your team.
         </p>
         <h6>Launch Apps</h6>
         <p>Access the tools you need directly from your desktop. Open productivity applications, communication platforms, internal business tools, and web-based services without disrupting your workflow.</p>
        <p style="margin-top:.5rem"><strong style="color:#0d2d36;font-size:13.5px">Common use cases:</strong></p>
                <ul>
                    <li>Document creation and editing</li>
                    <li>Team communication</li>
                    <li>Project management</li>
                    <li>Data analysis and reporting </li>
                    <li>Internal business operations</li>
                </ul>
        <h6>Use Multitasking & Shortcuts</h6>
         <p>
           Boost efficiency with built-in multitasking capabilities and keyboard shortcuts designed for faster navigation and smoother workflows.
         </p>
            <p style="margin-top:.5rem"><strong style="color:#0d2d36;font-size:13.5px">Features include:</strong></p>
                    <ul>
                        <li>Multiple open windows</li>
                        <li>Quick application switching</li>
                        <li>Keyboard shortcuts</li>
                        <li>Workspace organization tools</li>
                        <li>Enhanced productivity controls</li>
                    </ul>
        <h6>Enable Multi-Device Sync</h6>
         <p>Stay connected across all your devices. Your files, settings, and workspace preferences remain synchronized, allowing you to continue working seamlessly whether you’re on a desktop, laptop, or tablet.</p>
       </div>
     </section>

     <!--Content Responsibility Section-->
     <section id="content-responsibility" class="card">
       <div class="card-header">
         <div class="icon-box">
           <i class="fa fa-pencil-square"></i>
         </div>
         <div>
           <h3>4. Collaborate & Share</h3>
         </div>
       </div>
       <div class="card-body">
         <p>
           Empower your team with secure collaboration tools that make sharing information and working together simple and efficient.
         </p>
         <h6>Invite Team Members</h6>
         <p>Easily add colleagues, partners, or external collaborators to your workspace. Assign appropriate roles and permissions to ensure everyone has the right level of access.</p>
        <h6>Share Files & Folders</h6>
         <p>
          Share documents securely with team members or external stakeholders while maintaining full control over access.
         </p>
        <p style="margin-top:.5rem"><strong style="color:#0d2d36;font-size:13.5px">Sharing options include:</strong></p>
                <ul>
                    <li>Internal team sharing</li>
                    <li>External collaboration links</li>
                    <li>View-only permissions</li>
                    <li>Editing permissions</li>
                    <li>Time-limited access links</li>
                    <li>Secure file distribution</li>
                </ul>
        <h6>Create Shared Workspaces</h6>
        <p>Build dedicated workspaces for teams, departments, projects, or clients. Shared workspaces centralize files, applications, and communication, making collaboration more organized and effective.</p>
        <p style="margin-top:.5rem"><strong style="color:#0d2d36;font-size:13.5px">Ideal for:</strong></p>
                <ul>
                    <li>Project teams</li>
                    <li>Department collaboration</li>
                    <li>Client portals</li>
                    <li>Cross-functional initiatives</li>
                    <li>Remote and hybrid teams</li>
                </ul>
    </div>
     </section>

     <!--Team & Administrator Responsibility Section-->
     <section id="team-responsibility" class="card">
       <div class="card-header">
         <div class="icon-box">
           <i class="fa fa-users"></i>
         </div>
         <div>
           <h3>5. Secure & Manage Access</h3>
         </div>
       </div>
       <div class="card-body">
         <p>Protect your data and maintain complete visibility over how information is accessed and shared.</p>
         <h6>Set Permissions</h6>
         <p>Define access levels for users, groups, and teams. Control who can view, edit, download, share, or manage files and resources across your workspace.</p>
        <p style="margin-top:.5rem"><strong style="color:#0d2d36;font-size:13.5px">Permission controls include:</strong></p>
                <ul>
                    <li>User-based access</li>
                    <li>Role-based permissions</li>
                    <li>Group management</li>
                    <li>File-level controls</li>
                    <li>Workspace-level controls</li>
                </ul>
        <h6>Review Activity Logs</h6>
         <p>
           Maintain transparency with detailed activity tracking. Monitor file access, modifications, sharing events, and user actions across your organization.
        </p>
        <p style="margin-top:.5rem"><strong style="color:#0d2d36;font-size:13.5px">Track activities such as:</strong></p>
                <ul>
                    <li>File uploads and downloads</li>
                    <li>Document edits</li>
                    <li>Sharing actions</li>
                    <li>Login activity</li>
                    <li>Workspace changes</li>
                </ul>
        <h6>Configure Backup & Recovery</h6>
         <p>
           Keep your data protected with reliable backup and recovery options. Quickly restore important files and maintain business continuity in the event of accidental deletion or unexpected issues.
         </p>
        <p style="margin-top:.5rem"><strong style="color:#0d2d36;font-size:13.5px">Key benefits:</strong></p>
                <ul>
                    <li>Automated data protection</li>
                    <li>Fast recovery options</li>
                    <li>Reduced risk of data loss</li>
                    <li>Improved business resilience</li>
                    <li>Continuous workspace availability</li>
                </ul>
        <h6>Work with Confidence</h6>
         <p>
           PocketOffice combines productivity, collaboration, and enterprise-grade security in a single platform, helping individuals and teams work smarter while keeping their data protected.
        </p>
       </div>
     </section>

     

     <!--Contact Section-->
     <section id="contact" class="card">
       <div class="card-header">
         <div class="icon-box">
           <i class="fa fa-envelope"></i>
         </div>
         <div>
           <h3>6. Contact Information</h3>
         </div>
       </div>
       <div class="card-body">
         <p>
           For questions regarding these Terms or your account, please
           contact PocketOffice through the support channels listed on our
           website.
         </p>
       </div>
     </section>
   </div>
 </div>
 <script>
      (function () {
        const navLinks = document.querySelectorAll(".sidebar a");

        if (navLinks.length > 0) {
          navLinks[0].classList.add("active");
        }

        navLinks.forEach((link) => {
          link.addEventListener("click", function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();

            navLinks.forEach((l) => l.classList.remove("active"));
            this.classList.add("active");

            const targetId = this.getAttribute("href").substring(1);
            const targetSection = document.getElementById(targetId);
            if (!targetSection) return;

            const offset =
              targetSection.getBoundingClientRect().top + window.pageYOffset - 110;

            window.scrollTo({ top: offset, behavior: "smooth" });
          });
        });
      })();
</script>

@endsection