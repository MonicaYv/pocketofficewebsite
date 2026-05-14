 @extends('layouts.backendsettings')
 @section('title', 'Manufacturing Solutions | Smart Industry Services')
 @section('content')
 <!-- breadcrumb area start -->
 <div class="breadcrumb-area"
     style="background-image: url(assets/img/hero-images/industries/Manufacturing/Manufacturing\ 1.svg)">
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
             <h1>Manufacturing</h1>
         </div>
         <div class="banner">
             <img src="./assets/img/hero-images/industries/Manufacturing/Manufacturing 2.svg" alt="Manufacturing" loading="lazy" />
             <div class="overlay">
                 <div class="overlay-text">
                     <h3>Manufacturing excellence redefined</h3>
                     <p>Smart processes. Stronger output. Sustainable growth.</p>
                 </div>
             </div>
         </div>
         <!-- Overview -->
         <div class="section">
             <h2>An overview</h2>
             <p>
                 Pocketoffice enables manufacturing teams to securely access SOPs, reports, and operational data
                 across locations and devices, ensuring consistent workflows and informed decision-making.
             </p>
         </div>


         <!-- Ready Section -->
         <div class="section">
             <h2>We are ready</h2>

             <p>
                 PocketOffice provides Operations & Documentation Access,
                 Central access to operational documents.
             </p>
             <div class="features">
                 <div class="feature">
                     <h4>Central SOP Repository</h4>
                     <h6>One source of operational truth.</h6>
                     <p>Procedures, manuals, and reports are stored centrally, ensuring teams always reference the
                         correct documentation.
                     </p>
                 </div>
                 <div class="feature">
                     <h4>Access Across Locations</h4>
                     <h6>Information where it’s needed.</h6>
                     <p>Teams can access operational documents from offices, plants, or remote sites without delays.
                     </p>
                 </div>
                 <div class="feature">
                     <h4>Controlled Visibility</h4>
                     <h6>Only relevant information shown.</h6>
                     <p>Permissions ensure employees see only documents relevant to their role and responsibilities.
                     </p>
                 </div>
                 <div class="feature">
                     <h4>Industry Software Integration</h4>
                     <h6>Integrates with manufacturing systems.</h6>
                     <p>Works with ERP solutions like SAP, Oracle NetSuite, and Microsoft Dynamics to support
                         production documentation and operational workflows.</p>
                 </div>
             </div>
         </div>
         <div class="services">
             <div class="service">
                 <h3>
                     <i class="fa fa-check-circle-o me-2 text-success"></i> Pocket Office powers modern work
                 </h3>
                 <p>
                     At Pocket Office, we deliver secure and scalable Desktop as a Service (DaaS) solutions that
                     enable organizations to access their work environment anytime, anywhere. By centralizing
                     desktops in the cloud, we simplify IT management, enhance security, and ensure seamless
                     collaboration across teams.
                 </p>
             </div>
             <div class="service">
                 <h3>
                     <i class="fa fa-globe me-2 text-primary"></i> A smarter way to work
                 </h3>
                 <p>
                     With Pocket Office, businesses can reduce infrastructure costs, improve flexibility, and support
                     remote or hybrid workforces with ease. Our cloud-hosted desktops provide reliable performance,
                     enterprise-grade security, and effortless scalability to meet evolving business demands.
                 </p>
             </div>
         </div>
         <!-- Services -->
         <div class="services-heading">
             <h1>Benefits</h1>
             <p>
                 Provides efficient and scalable manufacturing solutions that optimize production processes, maintain
                 high-quality standards, and reduce operational costs while ensuring timely delivery and continuous
                 innovation.
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