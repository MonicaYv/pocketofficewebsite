 @extends('layouts.backendsettings')
 @section('title', 'Team Type')
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
 <div class="breadcrumb-area" style="background-image: url(assets/img/hero-images/By\ team\ Type.svg)">

     <div class="container">
         <div class="row">
             <div class="col-lg-12">
                 <div class="breadcrumb-inner">
                     <h1 class="page-title">Solution By Team Type</h1>

                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- breadcrumb area End -->

 <div class="container-fluid pd-top-30">
     <div class="features-tabs">
         <ul class="nav nav-underline">
             <div class="tab-underline">
                 <li class="nav-item">
                     <a class="nav-link active" data-tab="remote" aria-current="page" href="#">
                         <span class="material-symbols-outlined tab-icon">wifi</span>
                         Remote Teams
                     </a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" data-tab="startups" href="#">
                         <span class="material-symbols-outlined tab-icon">rocket_launch</span>
                         Startups
                     </a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" data-tab="enterprises" href="#">
                         <span class="material-symbols-outlined tab-icon">corporate_fare</span>
                         Enterprises
                     </a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" data-tab="freelancers" href="#">
                         <span class="material-symbols-outlined tab-icon">person</span>
                         Freelancers
                     </a>
                 </li>
             </div>

         </ul>
     </div>

     <div class="tab-content mt-4">
         <div class="features-tab-pane" id="all">
             <div class="content">
             </div>
         </div>
         <div class="features-tab-pane active" id="remote">
             <div class="content">
                 <div class="text-section">
                     <h4>Remote Teams</h4>
                     <h2 class="teamtype-heading">Work-from-anywhere scenario <br>
                         One desktop experience—wherever your team works</h2>
                     <p>PocketOffice enables remote and hybrid teams to access the same cloud desktop, files, and
                         applications from any device or location. Team members can switch devices mid-task
                         while
                         staying
                         fully synced, ensuring uninterrupted productivity.</p>
                 </div>

                 <div class="team-container">

                     <div class="team-card">

                         <h3 class="card-heading">Access From Anywhere</h3>
                         <h4 class="card-subheading">One workspace across all locations.</h4>

                         <p class="card-desc">
                             PocketOffice lets teams access the same cloud desktop, files, and apps from anywhere
                             using a browser.
                         </p>

                         <div class="card-image">
                             <img src="{{ asset($constants['IMAGEFILEPATH'] . 'solution-by-team-type/access-from-anywhere.svg') }}"
                                 alt="Remote team accessing cloud workspace from anywhere using PocketOffice"
                                 width="600" height="400" loading="lazy">
                         </div>
                     </div>


                     <div class="team-card">

                         <h3 class="card-heading">Switch Devices Mid-Task</h3>
                         <h4 class="card-subheading">No interruptions. No lost context.</h4>

                         <p class="card-desc">
                             Team members can start work on one device and continue on another without
                             re-logging, re-uploading, or restarting tasks.
                         </p>

                         <div class="card-image">
                             <img src="{{ asset($constants['IMAGEFILEPATH'] . 'solution-by-team-type/switch-devices-mid-task.svg') }}"
                                 alt="Seamlessly switch devices while working in PocketOffice cloud workspace"
                                 width="600" height="400" loading="lazy">
                         </div>

                     </div>


                     <div class="team-card">

                         <h3 class="card-heading">Stay Aligned</h3>
                         <h4 class="card-subheading">Everyone works from the same source</h4>

                         <p class="card-desc">
                             Shared files, workspaces, and permissions keep teams aligned and reduce
                             miscommunication across time zones.
                         </p>

                         <div class="card-image">
                             <img src="{{ asset($constants['IMAGEFILEPATH'] . 'solution-by-team-type/stay-aligned.svg') }}"
                                 alt="Teams stay aligned with shared files and workspace in PocketOffice" width="600"
                                 height="400" loading="lazy">
                         </div>

                     </div>


                     <div class="team-card">

                         <h3 class="card-heading">Secure by Design</h3>
                         <h4 class="card-subheading">Remote work without security risks.</h4>

                         <p class="card-desc">
                             Role-based access and secure sharing ensure company data stays protected
                             even outside the office.
                         </p>

                         <div class="card-image">
                             <img src="{{ asset($constants['IMAGEFILEPATH'] . 'solution-by-team-type/secure-by-design.svg') }}"
                                 alt="Secure cloud workspace with role based access control in PocketOffice"
                                 width="600" height="400" loading="lazy">
                         </div>

                     </div>

                 </div>
             </div>
         </div>
         <div class="features-tab-pane" id="startups">
             <div class="content">
                 <div class="text-section">
                     <h4>Startups</h4>
                     <h2 class="teamtype-heading">Fast onboarding benefits
                         Move fast without IT complexity.</h2>
                     <p>PocketOffice helps startups onboard users in minutes, not days. Easily create accounts,
                         assign
                         access, and start working immediately—no software installations or infrastructure
                         management
                         required.</p>
                 </div>

                 <div class="team-container">

                     <div class="team-card">

                         <h3 class="card-heading">Get Started in Minutes</h3>
                         <h4 class="card-subheading">No setup. No infrastructure.</h4>

                         <p class="card-desc">
                             PocketOffice lets startups onboard users instantly—no software installation
                             or complex IT configuration.
                         </p>

                         <div class="card-image">
                             <img src="{{ asset($constants['IMAGEFILEPATH'] . 'solution-by-team-type/get-started-in-minutes.svg') }}"
                                 alt="Start using PocketOffice instantly without installation or setup" width="600"
                                 height="400" loading="lazy">
                         </div>

                     </div>


                     <div class="team-card">

                         <h3 class="card-heading">Move at Startup Speed</h3>
                         <h4 class="card-subheading">Adapt as your team grows.</h4>

                         <p class="card-desc">
                             Add users, assign access, and expand storage effortlessly as your startup scales and
                             your team grows.
                         </p>

                         <div class="card-image">
                             <img src="{{ asset($constants['IMAGEFILEPATH'] . 'solution-by-team-type/move at-startup-speed.svg') }}"
                                 alt="Scale your startup team quickly with PocketOffice workspace" width="600"
                                 height="400" loading="lazy">
                         </div>

                     </div>


                     <div class="team-card">

                         <h3 class="card-heading">All Tools in One Place</h3>
                         <h4 class="card-subheading">Reduce tool sprawl early.</h4>

                         <p class="card-desc">
                             Keep files, apps, and collaboration in a single unified workspace
                             to stay focused and efficient.
                         </p>

                         <div class="card-image">
                             <img src="{{ asset($constants['IMAGEFILEPATH'] . 'solution-by-team-type/all-tools-in-one-place.svg') }}"
                                 alt="Unified workspace with files apps and collaboration tools in PocketOffice"
                                 width="600" height="400" loading="lazy">
                         </div>

                     </div>


                     <div class="team-card">

                         <h3 class="card-heading">Cost-Efficient by Design</h3>
                         <h4 class="card-subheading">Pay only for what you use.</h4>

                         <p class="card-desc">
                             Flexible pricing and scalable storage help startups manage costs
                             without compromising capability.
                         </p>

                         <div class="card-image">
                             <img src="{{ asset($constants['IMAGEFILEPATH'] . 'solution-by-team-type/cost-efficient-by-design.svg') }}"
                                 alt="Affordable cloud workspace solution for startups with flexible pricing"
                                 width="600" height="400" loading="lazy">
                         </div>

                     </div>

                 </div>
             </div>
         </div>
         <div class="features-tab-pane" id="enterprises">
             <div class="content">
                 <div class="text-section">
                     <h4>Enterprises</h4>
                     <h2 class="teamtype-heading">Governance & control
                         Enterprise-grade control at any scale.</h2>
                     <p>PocketOffice provides centralized governance with role-based access, permission management,
                         activity tracking, and security controls. Enterprises can manage users, teams, and data
                         consistently across multiple locations.</p>
                 </div>

                 <div class="team-container">

                     <div class="team-card">

                         <h3 class="card-heading">Centralized Management</h3>
                         <h4 class="card-subheading">One platform. Total visibility.</h4>

                         <p class="card-desc">
                             PocketOffice provides centralized control over users, devices, permissions,
                             and data across departments and regions.
                         </p>

                         <div class="card-image">
                             <img src="{{ asset($constants['IMAGEFILEPATH'] . 'solution-by-team-type/centralized-management.svg') }}"
                                 alt="Centralized workspace management with users devices and permissions control"
                                 width="600" height="400" loading="lazy">
                         </div>

                     </div>


                     <div class="team-card">

                         <h3 class="card-heading">Strong Access Governance</h3>
                         <h4 class="card-subheading">Clear roles. Predictable access.</h4>

                         <p class="card-desc">
                             Role-based permissions, device restrictions, and IP controls ensure secure
                             access across large teams.
                         </p>

                         <div class="card-image">
                             <img src="{{ asset($constants['IMAGEFILEPATH'] . 'solution-by-team-type/strong-access-governance.svg') }}"
                                 alt="Role based access control and security governance in PocketOffice workspace"
                                 width="600" height="400" loading="lazy">
                         </div>

                     </div>


                     <div class="team-card">

                         <h3 class="card-heading">Audit & Compliance Ready</h3>
                         <h4 class="card-subheading">Built for accountability.</h4>

                         <p class="card-desc">
                             Activity tracking and detailed logs support internal audits and compliance
                             requirements without disrupting workflows.
                         </p>

                         <div class="card-image">
                             <img src="{{ asset($constants['IMAGEFILEPATH'] . 'solution-by-team-type/audit-compliance-ready.svg') }}"
                                 alt="Activity logs and audit tracking for compliance in PocketOffice workspace"
                                 width="600" height="400" loading="lazy">
                         </div>

                     </div>


                     <div class="team-card">

                         <h3 class="card-heading">Scale Globally</h3>
                         <h4 class="card-subheading">Support distributed organizations.</h4>

                         <p class="card-desc">
                             PocketOffice enables enterprise teams to work across locations while
                             maintaining consistent policies and security controls.
                         </p>

                         <div class="card-image">
                             <img src="{{ asset($constants['IMAGEFILEPATH'] . 'solution-by-team-type/scale-globally.svg') }}"
                                 alt="Enterprise teams working globally with consistent workspace policies"
                                 width="600" height="400" loading="lazy">
                         </div>

                     </div>

                 </div>
             </div>
         </div>
         <div class="features-tab-pane" id="freelancers">
             <div class="content">
                 <div class="text-section">
                     <h4>Freelancers</h4>
                     <h2 class="teamtype-heading">Solo productivity benefits
                         Your personal cloud desktop, built for focus.</h2>
                     <p>PocketOffice gives freelancers a secure, browser-based desktop to manage files, apps, and
                         projects from anywhere. Stay organized, switch devices effortlessly, and keep work
                         separate
                         from
                         personal systems.</p>
                 </div>

                 <div class="team-container">

                     <div class="team-card">

                         <h3 class="card-heading">Work From Any Device</h3>
                         <h4 class="card-subheading">Your workspace travels with you.</h4>

                         <p class="card-desc">
                             PocketOffice lets freelancers access their full desktop, files,
                             and tools from any device—perfect for flexible work styles.
                         </p>

                         <div class="card-image">
                             <img src="{{ asset($constants['IMAGEFILEPATH'] . 'solution-by-team-type/work-from-any-device.svg') }}"
                                 alt="Freelancers accessing their cloud desktop and files from any device"
                                 width="600" height="400" loading="lazy">
                         </div>

                     </div>


                     <div class="team-card">

                         <h3 class="card-heading">Stay Organized</h3>
                         <h4 class="card-subheading">Keep work simple and structured.</h4>

                         <p class="card-desc">
                             Manage files, projects, and apps in one clean workspace without
                             juggling multiple platforms.
                         </p>

                         <div class="card-image">
                             <img src="{{ asset($constants['IMAGEFILEPATH'] . 'solution-by-team-type/stay-organized.svg') }}"
                                 alt="Organize projects files and applications in a unified PocketOffice workspace"
                                 width="600" height="400" loading="lazy">
                         </div>

                     </div>


                     <div class="team-card">

                         <h3 class="card-heading">Seamless Device Switching</h3>
                         <h4 class="card-subheading">Work when inspiration strikes.</h4>

                         <p class="card-desc">
                             Start on a laptop, continue on a tablet, and finish on your desktop
                             without losing progress.
                         </p>

                         <div class="card-image">
                             <img src="{{ asset($constants['IMAGEFILEPATH'] . 'solution-by-team-type/seamless-device-switching.svg') }}"
                                 alt="Switch between laptop tablet and desktop while working in PocketOffice"
                                 width="600" height="400" loading="lazy">
                         </div>

                     </div>


                     <div class="team-card">

                         <h3 class="card-heading">Keep Work Secure</h3>
                         <h4 class="card-subheading">Separate personal and professional work.</h4>

                         <p class="card-desc">
                             PocketOffice helps freelancers keep client work secure and isolated
                             from personal devices.
                         </p>

                         <div class="card-image">
                             <img src="{{ asset($constants['IMAGEFILEPATH'] . 'solution-by-team-type/keep-work-secure.svg') }}"
                                 alt="Secure workspace for freelancers to protect client work and data" width="600"
                                 height="400" loading="lazy">
                         </div>

                     </div>

                 </div>
             </div>
         </div>
     </div>
 </div>

 <!-- footer area end -->

 <!-- back to top area start -->
 <div class="back-to-top">
     <span class="back-top"><i class="fa fa-angle-up"></i></span>
 </div>
 <!-- back to top area end -->
 @endsection