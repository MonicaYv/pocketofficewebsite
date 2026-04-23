 @extends('layouts.backendsettings')
 @section('title', 'Use Case')
 @section('content')
 <!-- preloader area start -->
 <!-- <div class="preloader" id="preloader">
     <div class="preloader-inner">
         <div class="spinner">
             <div class="dot1"></div>
             <div class="dot2"></div>
         </div>
     </div>
 </div> -->
 <!-- preloader area end -->

 <!-- search Popup -->
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



 <!-- breadcrumb area start -->
 <div class="breadcrumb-area" style="background-image: url(assets/img/hero-images/By\ use\ case\ .svg)">
     <div class="container">
         <div class="row">
             <div class="col-lg-12">
                 <div class="breadcrumb-inner">
                     <h1 class="page-title">Solution By Use Case</h1>

                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- breadcrumb area End -->

 <div class=" pd-top-30 ">
     <div class="features-tabs">
         <ul class="nav nav-underline">
             <div class="tab-underline">
                 <li class="nav-item">
                     <a class="nav-link active" data-tab="file-sharing" aria-current="page" href="#">
                         <span class="material-symbols-outlined tab-icon">folder_shared</span>
                         File Sharing
                     </a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" data-tab="virtual-desktop" href="#"><span
                             class="material-symbols-outlined tab-icon">desktop_windows</span>Virtual Desktop</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" data-tab="team-workspaces" href="#"><span
                             class="material-symbols-outlined tab-icon">group_work</span>Team Workspaces</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" data-tab="cloud-storage" href="#"><span
                             class="material-symbols-outlined tab-icon">cloud</span>Cloud Storage</a>
                 </li>
             </div>

         </ul>
     </div>

     <div class="tab-content  use-case-content">
         <div class="features-tab-pane active" id="file-sharing">
             <div class="content">
                 <div class="text-section">
                     <h4>File Sharing</h4>
                     <h2 class="use-case-heading">Secure sharing scenarios
                         Share files safely — without losing control.</h2>
                     <p>Pocketoffice lets you set granular permissions for internal teams and external collaborators.

                         Control who can view, edit, or download files, keeping sensitive data protected at every
                         step.
                     </p>
                 </div>

                 <div class="usecase-grid">
                     <div class="usecase-card">
                         <div class="card-video">
                             <video src="{{ asset($constants['IMAGEFILEPATH'] . 'videos/solutions-use-case/file-sharing/Permission-Based Sharing.mp4') }}"
                                 autoplay loop muted playsinline></video>
                         </div>

                         <h1>Permission-Based Sharing</h1>
                         <h6>Only the right people get access.</h6>
                         <p>Pocketoffice enables secure file sharing with granular permissions, ensuring files are
                             accessed only by authorized users—internally or externally.
                         </p>
                     </div>

                     <div class="usecase-card">
                         <div class="card-video">
                             <video src="{{ asset($constants['IMAGEFILEPATH'] . 'videos/solutions-use-case/file-sharing/Time-Controlled Access.mp4') }}"
                                 autoplay loop muted playsinline></video>
                         </div>

                         <h1>Time-Controlled Access</h1>
                         <h6>Share with confidence, revoke automatically.</h6>
                         <p>Set time limits on shared files so access expires automatically, reducing the risk of
                             data exposure
                         </p>
                     </div>

                     <div class="usecase-card">
                         <div class="card-video">
                             <video src="{{ asset($constants['IMAGEFILEPATH'] . 'videos/solutions-use-case/file-sharing/Internal & External Use.mp4') }}"
                                 autoplay loop muted playsinline></video>
                         </div>

                         <h1>Internal & External Use</h1>
                         <h6>One system for every sharing need.</h6>
                         <p>Share files within teams or with clients and partners using the same secure workflow—no
                             separate tools required
                         </p>
                     </div>

                     <div class="usecase-card">
                         <div class="card-video">
                             <video src="{{ asset($constants['IMAGEFILEPATH'] . 'videos/solutions-use-case/file-sharing/Built-In Security.mp4') }}"
                                 autoplay loop muted playsinline></video>
                         </div>

                         <h1>Built-In Security</h1>
                         <h6>Protection at every step.</h6>
                         <p>All shared files are protected by access controls, activity tracking, and secure
                             permissions.
                         </p>
                     </div>
                 </div>
             </div>
         </div>
         <div class="features-tab-pane" id="virtual-desktop">
             <div class="content">
                 <div class="text-section">
                     <h4>Virtual Desktop</h4>
                     <h2 class="use-case-heading">Replace local OS workflow
                         Move beyond device-bound desktops.</h2>
                     <p>Pocketoffice replaces traditional operating systems with a browser-based cloud desktop,
                         giving
                         you full access to your workspace from any device—no software installation or hardware
                         management needed.</p>
                 </div>

                 <div class="usecase-grid">
                     <div class="usecase-card">
                         <div class="card-video">
                             <video src="{{ asset($constants['IMAGEFILEPATH'] . 'videos/solutions-use-case/virtual-desktop/Browser-Based Desktop.mp4') }}"
                                 autoplay loop muted playsinline></video>
                         </div>

                         <h1>Browser-Based Desktop</h1>
                         <h6>Your OS, now in the cloud.</h6>
                         <p>Pocketoffice replaces traditional desktops with a fully functional cloud OS accessible
                             from any browser.
                         </p>
                     </div>

                     <div class="usecase-card">
                         <div class="card-video">
                             <video src="{{ asset($constants['IMAGEFILEPATH'] . 'videos/solutions-use-case/virtual-desktop/Device Independence.mp4') }}"
                                 autoplay loop muted playsinline></video>
                         </div>

                         <h1>Device Independence</h1>
                         <h6>No reliance on a single machine.</h6>
                         <p>Switch devices anytime without reinstalling apps or transferring files—your workspace
                             stays intact.
                         </p>
                     </div>

                     <div class="usecase-card">
                         <div class="card-video">
                             <video
                                 src="{{ asset($constants['IMAGEFILEPATH'] . 'videos/solutions-use-case/virtual-desktop/Simplified IT Management.mp4') }}"
                                 autoplay loop muted playsinline></video>
                         </div>

                         <h1>Simplified IT Management</h1>
                         <h6>Less maintenance, more productivity.</h6>
                         <p>Centralize updates, backups, and IT management with a cloud-based OS.
                         </p>
                     </div>

                     <div class="usecase-card">
                         <div class="card-video">
                             <video src="{{ asset($constants['IMAGEFILEPATH'] . 'videos/solutions-use-case/virtual-desktop/Secure by Design.mp4') }}"
                                 autoplay loop muted playsinline></video>
                         </div>

                         <h1>Secure by Design</h1>
                         <h6>Security without compromise.</h6>
                         <p>Built-in access controls and automated backups protect your data better than traditional
                             local systems
                         </p>
                     </div>
                 </div>
             </div>
         </div>
         <div class="features-tab-pane" id="team-workspaces">
             <div class="content">
                 <div class="text-section">
                     <h4>Team Workspaces</h4>
                     <h2 class="use-case-heading">Team Collaboration Flow
                         Everything your team needs — in one shared space.</h2>
                     <p>Pocketoffice workspaces unite files, apps, and collaboration in a structured environment.
                         Teams
                         stay aligned with real-time updates, clear ownership, and controlled access.</p>
                 </div>

                 <div class="usecase-grid">
                     <div class="usecase-card">
                         <div class="card-video">
                             <video
                                 src="{{ asset($constants['IMAGEFILEPATH'] . 'videos/solutions-use-case/team-worksppace/Centralized Collaboration.mp4') }}"
                                 autoplay loop muted playsinline></video>
                         </div>

                         <h1>Centralized Collaboration</h1>
                         <h6>One workspace. Shared clarity.</h6>
                         <p>Pocketoffice workspaces bring files, apps, and collaboration together in a single,
                             organized environment.
                         </p>
                     </div>

                     <div class="usecase-card">
                         <div class="card-video">
                             <video src="{{ asset($constants['IMAGEFILEPATH'] . 'videos/solutions-use-case/team-worksppace/Structured Workflows.mp4') }}"
                                 autoplay loop muted playsinline></video>
                         </div>

                         <h1>Structured Workflows</h1>
                         <h6>Less chaos, more focus.</h6>
                         <p>Organize projects, departments, or teams into dedicated workspaces with clear ownership
                             and permissions.
                         </p>
                     </div>

                     <div class="usecase-card">
                         <div class="card-video">
                             <video src="{{ asset($constants['IMAGEFILEPATH'] . 'videos/solutions-use-case/team-worksppace/Real-Time Updates.mp4') }}"
                                 autoplay loop muted playsinline></video>
                         </div>

                         <h1>Real-Time Updates</h1>
                         <h6>Stay aligned effortlessly.</h6>
                         <p>Changes by any team member are instantly visible to others, keeping collaboration smooth
                             and transparent
                         </p>
                     </div>

                     <div class="usecase-card">
                         <div class="card-video">
                             <video src="{{ asset($constants['IMAGEFILEPATH'] . 'videos/solutions-use-case/team-worksppace/Controlled Access.mp4') }}"
                                 autoplay loop muted playsinline></video>
                         </div>

                         <h1>Controlled Access</h1>
                         <h6>Collaboration without risk.</h6>
                         <p>Permissions ensure users see only what they need, maintaining security across all teams.
                         </p>
                     </div>
                 </div>
             </div>
         </div>
         <div class="features-tab-pane" id="cloud-storage">
             <div class="content">
                 <div class="text-section">
                     <h4>Cloud Storage</h4>
                     <h2 class="use-case-heading">Central Storage Benefits
                         Keep all your files centralized and secure.</h2>
                     <p>Pocketoffice consolidates cloud storage across teams and tools, making files easy to find,
                         manage, and protect. Scale storage effortlessly while maintaining permissions, backups, and
                         compliance.</p>
                 </div>
                 <div class="usecase-grid">
                     <div class="usecase-card">
                         <div class="card-video">
                             <video
                                 src="{{ asset($constants['IMAGEFILEPATH'] . 'videos/solutions-use-case/cloud-storage/Centralized File Management.mp4') }}"
                                 autoplay loop muted playsinline></video>
                         </div>

                         <h1>Centralized File Management</h1>
                         <h6>No more scattered storage.</h6>
                         <p>Pocketoffice centralizes files across teams and tools, making information easy to find
                             and manage
                         </p>
                     </div>

                     <div class="usecase-card">
                         <div class="card-video">
                             <video src="{{ asset($constants['IMAGEFILEPATH'] . 'videos/solutions-use-case/cloud-storage/Unified Access.mp4') }}" autoplay
                                 loop muted playsinline></video>
                         </div>

                         <h1>Unified Access</h1>
                         <h6>One desktop, multiple storage sources.</h6>
                         <p>Access all connected storage from a single cloud desktop—no platform switching required.
                         </p>
                     </div>

                     <div class="usecase-card">
                         <div class="card-video">
                             <video src="{{ asset($constants['IMAGEFILEPATH'] . 'videos/solutions-use-case/cloud-storage/Scalable Storage.mp4') }}"
                                 autoplay loop muted playsinline></video>
                         </div>

                         <h1>Scalable Storage</h1>
                         <h6>Grow without limits.</h6>
                         <p>Expand storage as your data grows, with zero downtime or complex migrations.
                         </p>
                     </div>

                     <div class="usecase-card">
                         <div class="card-video">
                             <video src="{{ asset($constants['IMAGEFILEPATH'] . 'videos/solutions-use-case/cloud-storage/Secure by Default.mp4') }}"
                                 autoplay loop muted playsinline></video>
                         </div>

                         <h1>Secure by Default</h1>
                         <h6>Built-in protection for all files. </h6>
                         <p>Permissions, backups, and activity tracking keep your data secure and compliant.
                         </p>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>




 <!-- back to top area start -->
 <div class="back-to-top">
     <span class="back-top"><i class="fa fa-angle-up"></i></span>
 </div>
 <!-- back to top area end -->
 <script>
     const cards = document.querySelectorAll('.usecase-card');

     const observer = new IntersectionObserver((entries) => {
         entries.forEach(entry => {
             if (entry.isIntersecting) {
                 entry.target.classList.add('is-visible');
                 // Stop observing once animated in
                 observer.unobserve(entry.target);
             }
         });
     }, {
         threshold: 0.15 // Trigger when 15% of the card is visible
     });

     cards.forEach(card => observer.observe(card));
 </script>
 @endsection