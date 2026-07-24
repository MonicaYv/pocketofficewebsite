 @extends('layouts.backendsettings')
 @section('title', ' Manufacturing Management Software & Smart Manufacturing | Pocket Office')
@section('meta-title', 'IT & Software Development Services | Custom Solutions')
@section('meta-description', 'Discover manufacturing management software, smart manufacturing solutions, and manufacturing workflow automation designed to streamline production, improve efficiency, and optimize operations.')
@section('meta-keywords', 'IT software development, custom solutions, cloud workspaces developers, IT services')
  
 @section('content')
 <!-- breadcrumb area start -->
@include('layouts.industry_hero', ['bgImage' => 'hero-images/industries/Manufacturing/Manufacturing 1.svg'])
 <!-- breadcrumb area End -->

 <!--Logistics & Supply Chain Area Start-->
 <div class="main-container content-wrapper">
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
                     <h3>Manufacturing Excellence Redefined with Smart Manufacturing Solutions</h3>
                     <p>Smart processes. Stronger output. Sustainable growth.</p>
                 </div>
             </div>
         </div>
         <!-- Overview -->
         <div class="section">
             <h2>An overview</h2>
             <p>
                  PocketOffice enables manufacturing teams to use manufacturing management software to securely access SOPs, reports, and operational data across locations and devices, ensuring consistent workflows and informed decision-making.
             </p>
         </div>


         <!-- Ready Section -->
         <div class="section">
             <h2>We are ready</h2>

             <p>
                  PocketOffice provides smart manufacturing solutions for operations and documentation access, giving teams centralized access to critical operational documents and information.
             </p>
             <div class="features">
                 <div class="feature industry-container">
                    <div class="feature-icon">
                        <img src="/assets/img/industry-icons/central-sop.svg" alt="industry-icon">
                    </div>
                    <div>
                     <h4>Central SOP Repository</h4>
                     <h6>One source of operational truth.</h6>
                     <p>Manufacturing management software helps store procedures, manuals, and reports centrally, ensuring teams always reference the correct documentation and maintain consistent operational processes.
                     </p>
                    </div>
                 </div>
                 <div class="feature industry-container">
                    <div class="feature-icon">
                        <img src="/assets/img/industry-icons/access-across.svg" alt="industry-icon">
                    </div>
                    <div>
                     <h4>Access Across Locations</h4>
                     <h6>Information where it’s needed.</h6>
                     <p>Smart manufacturing solutions enable teams to securely access operational documents from offices, plants, or remote sites without delays, supporting connected and efficient manufacturing operations.</p>
                    </div>
                 </div>
                 <div class="feature industry-container">
                    <div class="feature-icon">
                        <img src="/assets/img/industry-icons/controlled-visibility.svg" alt="industry-icon">
                    </div>
                    <div>
                     <h4>Controlled Visibility</h4>
                     <h6>Only relevant information shown.</h6>
                     <p>Permissions within manufacturing management software help ensure employees see only documents relevant to their roles and responsibilities, improving security and operational control.
                     </p>
                    </div>
                 </div>
                 <div class="feature industry-container">
                    <div class="feature-icon">
                        <img src="/assets/img/industry-icons/industry-software-integration.svg" alt="industry-icon">
                    </div>
                    <div>
                     <h4>Industry Software Integration</h4>
                     <h6>Integrates with manufacturing systems.</h6>
                     <p> PocketOffice supports manufacturing workflow automation by working with ERP solutions like SAP, Oracle NetSuite, and Microsoft Dynamics to streamline production documentation and operational workflows.</p>
                    </div>
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
                 Provides efficient and scalable manufacturing management software and smart manufacturing solutions that help optimize production processes, maintain high-quality standards, and reduce operational costs. With manufacturing workflow automation, businesses can streamline documentation, improve operational visibility, support consistent workflows, and enable teams to make informed decisions while driving continuous innovation and sustainable growth.
             </p>
         </div>


     </main>
 </div>
 @endsection