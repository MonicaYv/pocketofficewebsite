 @extends('layouts.backendsettings')
 @section('title', 'Legal Services Solutions | Compliance & Advisory Experts')
 @section('content')
 <!-- breadcrumb area start -->
 <div
     class="breadcrumb-area"
     style="
        background-image: url(assets/img/hero-images/industries/LegalServices/Legal\ Services\ 1.svg);
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
             <h1>Legal Services</h1>
         </div>
         <div class="banner">
             <img
                 src="./assets/img/hero-images/industries/LegalServices/Legal Services 2.svg"
                 alt="governance technology"
                 loading="lazy" />
             <div class="overlay">
                 <div class="overlay-text">
                     <h3>Protecting what matters most</h3>
                     <p>Comprehensive legal services you can rely on</p>
                 </div>
             </div>
         </div>
         <!-- Overview -->
         <div class="section">
             <h2>An overview</h2>
             <p>
                 Law firms can organize case files into dedicated workspaces, manage
                 permissions, and collaborate internally—while keeping all sensitive
                 data secure and confidential.
             </p>
         </div>

         <!-- Ready Section -->
         <div class="section">
             <h2>We are ready</h2>

             <p>
                 PocketOffice provides Case File Organization Structured access to
                 legal documents.
             </p>
             <div class="features">
                 <div class="feature">
                     <h4>Case-Based Workspaces</h4>
                     <h6>Every case stays organized.</h6>
                     <p>
                         Legal documents are grouped by client or case, improving clarity
                         and reducing the risk of misfiled information.
                     </p>
                 </div>
                 <div class="feature">
                     <h4>Confidential Access</h4>
                     <h6>Privacy by default.</h6>
                     <p>
                         Strict permissions protect privileged documents and maintain
                         client confidentiality.
                     </p>
                 </div>
                 <div class="feature">
                     <h4>Work Anywhere Securely</h4>
                     <h6>Access files beyond the office.</h6>
                     <p>
                         Legal teams can securely access case files from courts, offices,
                         or remote locations.
                     </p>
                 </div>
                 <div class="feature">
                     <h4>Industry Software Integration</h4>
                     <h6>Designed for legal document workflows.</h6>
                     <p>
                         Supports tools like Clio, MyCase, SharePoint, and Google Drive
                         to manage case files, contracts, and legal documentation
                         securely.
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
                 Provides trusted legal services that protect your interests, ensure
                 regulatory compliance, and deliver strategic guidance to resolve
                 disputes and navigate complex legal matters with confidence and
                 clarity.
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