 @extends('layouts.backendsettings')
 @section('title', 'Healthcare IT Solutions | Digital Healthcare Services')
 @section('content')
 <!-- breadcrumb area start -->
 <div
     class="breadcrumb-area"
     style="
        background-image: url(assets/img/hero-images/industries/Healthcare/Healthcare\ 1.svg);
      ">
     <div class="container">
         <div class="row">
             <div class="col-lg-12">
                 <div class="breadcrumb-inner">
                     <h1 class="page-title"></h1>
                 </div>
             </div>
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
             <h1>Healthcare</h1>
         </div>
         <div class="banner">
             <img
                 src="./assets/img/hero-images/industries/Healthcare/Healthcare 2.svg"
                 alt="Healthcare"
                 loading="lazy" />
             <div class="overlay">
                 <div class="overlay-text">
                     <h3>Compassionate care. Advanced medicine</h3>
                     <p>Delivering trusted healthcare for healthier communities.</p>
                 </div>
             </div>
         </div>
         <!-- Overview -->
         <div class="section">
             <h2>An overview</h2>
             <p>
                 PocketOffice enables healthcare teams to access files and systems
                 with controlled permissions, maintaining privacy and regulatory
                 compliance while supporting remote and hybrid work.
             </p>
         </div>

         <!-- Ready Section -->
         <div class="section">
             <h2>We are ready</h2>

             <p>
                 PocketOffice provides Secure Data Access & Compliance Access
                 critical information securely..
             </p>
             <div class="features">
                 <div class="feature">
                     <h4>Centralized Healthcare Files</h4>
                     <h6>Information where care happens.</h6>
                     <p>
                         Healthcare teams can securely access documents across hospitals,
                         clinics, and remote locations without relying on local systems.
                     </p>
                 </div>
                 <div class="feature">
                     <h4>Remote-Ready Workflows</h4>
                     <h6>Support modern healthcare delivery.</h6>
                     <p>
                         Enable distributed teams and telehealth workflows while keeping
                         sensitive data protected.
                     </p>
                 </div>
                 <div class="feature">
                     <h4>Privacy-First Access Control</h4>
                     <h6>Protect sensitive information.</h6>
                     <p>
                         Strict role-based permissions ensure only authorized personnel
                         can view or manage confidential healthcare data.
                     </p>
                 </div>
                 <div class="feature">
                     <h4>Industry Software Integration</h4>
                     <h6>Supports healthcare management systems.</h6>
                     <p>
                         Integrates with EHR systems, hospital management software, and
                         secure cloud platforms for managing reports and medical
                         documentation.
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
                 Provides comprehensive healthcare solutions that improve patient
                 outcomes, enhance operational efficiency, and ensure secure,
                 compliant management of medical data while delivering high-quality,
                 accessible care.
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