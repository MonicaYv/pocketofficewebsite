 @extends('layouts.backendsettings')
 @section('title', ' Legal Case Management & Legal Practice Management Software | Pocket Office')
    @section('meta-title', 'IT & Software Development Services | Custom Solutions')
    @section('meta-description', ' Discover legal case management software and legal practice management software with legal document management software designed to streamline legal operations, organize documents, and improve efficiency.')
    @section('meta-keywords', 'IT software development, custom solutions, cloud workspaces developers, IT services')
    
 @section('content')
 <!-- breadcrumb area start -->
@include('layouts.industry_hero', ['bgImage' => 'hero-images/industries/LegalServices/Legal Services 1.svg'])
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
             <h1>Legal Services</h1>
         </div>
         <div class="banner">
             <img
                 src="./assets/img/hero-images/industries/LegalServices/Legal Services 2.svg"
                 alt="governance technology"
                 loading="lazy" />
             <div class="overlay">
                 <div class="overlay-text">
                     <h3>Protecting What Matters Most with Legal Case Management Software</h3>
                     <p>Comprehensive legal services you can rely on</p>
                 </div>
             </div>
         </div>
         <!-- Overview -->
         <div class="section">
             <h2>An overview</h2>
             <p>
                 Law firms can use legal case management software to organize case files into dedicated workspaces, manage permissions, and collaborate internally while keeping sensitive client data secure and confidential.
             </p>
         </div>

         <!-- Ready Section -->
         <div class="section">
             <h2>We are ready</h2>

             <p>
                 PocketOffice provides legal practice management software with structured case file organization, helping legal teams securely manage access to important legal documents and case information.
             </p>
             <div class="features">
                 <div class="feature">
                     <h4>Case-Based Workspaces</h4>
                     <h6>Every case stays organized.</h6>
                     <p>
                         Legal case management software helps legal documents stay grouped by client or case, improving clarity and reducing the risk of misfiled information.
                     </p>
                 </div>
                 <div class="feature">
                     <h4>Confidential Access</h4>
                     <h6>Privacy by default.</h6>
                     <p>
                          Legal document management software with strict permissions helps protect privileged documents and maintain client confidentiality while ensuring sensitive information is accessible only to authorized users.
                     </p>
                 </div>
                 <div class="feature">
                     <h4>Work Anywhere Securely</h4>
                     <h6>Access files beyond the office.</h6>
                     <p>
                         Legal practice management software enables legal teams to securely access case files from courts, offices, or remote locations while maintaining secure workflows.
                     </p>
                 </div>
                 <div class="feature">
                     <h4>Industry Software Integration</h4>
                     <h6>Designed for legal document workflows.</h6>
                     <p>
                         PocketOffice's legal document management software supports tools like Clio, MyCase, SharePoint, and Google Drive to manage case files, contracts, and legal documentation securely.
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
                 Provides secure legal case management software and legal practice management software solutions that help law firms organize cases, manage documents, protect confidential information, and streamline daily operations. With legal document management software, legal teams can securely manage contracts, case files, and important documentation while improving collaboration, efficiency, and accessibility across offices and remote environments.
             </p>
         </div>
     </main>
 </div>
 @endsection