 @extends('layouts.backendsettings')
 @section('title', 'Legal Services')
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
 <!-- //. search Popup -->




 <!-- breadcrumb area start -->
 <div class="breadcrumb-area"
     style="background-image: url(assets/img/hero-images/industries/LegalServices/Legal\ Services\ 1.svg)">
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

         <a href="  {{ url('bpo') }}
">
             <i class="fa fa-phone mr-2"></i>BPO Outsourcing
         </a>

         <a href="  {{ url('consulting') }}">
             <i class="fa fa-briefcase mr-2"></i>Consulting
         </a>

         <a href="{{ url('design') }}">
             <i class="fa fa-paint-brush mr-2"></i>Design & Media Studios
         </a>

         <a href="{{ url('education') }}">
             <i class="fa fa-graduation-cap mr-2"></i>Education
         </a>

         <a href="{{ url('finance-accounting') }}">
             <i class="fa fa-line-chart mr-2"></i>Finance & Accounting
         </a>

         <a href="{{ url('healthcare') }}">
             <i class="fa fa-heartbeat mr-2"></i>Healthcare
         </a>

         <a href="{{ url('it-software') }}">
             <i class="fa fa-desktop mr-2"></i>IT & Software Development
         </a>

         <a href="{{ url('legal-services') }}">
             <i class="fa fa-balance-scale mr-2"></i>Legal Services
         </a>

         <a href="{{ url('manufacturing') }}">
             <i class="fa fa-industry mr-2"></i>Manufacturing
         </a>

         <a href="{{ url('media-publishing') }}">
             <i class="fa fa-newspaper-o mr-2"></i>Media & Publishing
         </a>

         <a href="{{ url('retail-ecommerce') }}">
             <i class="fa fa-shopping-cart mr-2"></i>Retail & E-commerce
         </a>


     </aside>

     <!-- Main Content -->
     <main class="main">
         <!-- Hero -->
         <div class="hero">
             <h1>Legal Services</h1>
         </div>
         <div class="banner">
             <img src="{{ asset($constants['IMAGEFILEPATH'] . 'hero-images/industries/LegalServices/Legal Services 2.svg') }}"
                 alt="governance technology" />
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
                 Law firms can organize case files into dedicated workspaces, manage permissions, and collaborate
                 internally—while keeping all sensitive data secure and confidential.
             </p>
         </div>


         <!-- Ready Section -->
         <div class="section">
             <h2>We are ready</h2>

             <p>
                 PocketOffice provides Case File Organization
                 Structured access to legal documents.
             </p>
             <div class="features">
                 <div class="feature">
                     <h4>Case-Based Workspaces</h4>
                     <h6>Every case stays organized.</h6>
                     <p>Legal documents are grouped by client or case, improving clarity and reducing the risk of
                         misfiled information.</p>
                 </div>
                 <div class="feature">
                     <h4>Confidential Access</h4>
                     <h6>Privacy by default.</h6>
                     <p>Strict permissions protect privileged documents and maintain client confidentiality.</p>
                 </div>
                 <div class="feature">
                     <h4>Work Anywhere Securely</h4>
                     <h6>Access files beyond the office.</h6>
                     <p>Legal teams can securely access case files from courts, offices, or remote locations.</p>
                 </div>
                 <div class="feature">
                     <h4>Industry Software Integration</h4>
                     <h6>Designed for legal document workflows.</h6>
                     <p>Supports tools like Clio, MyCase, SharePoint, and Google Drive to manage case files,
                         contracts, and legal documentation securely.</p>
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
                 Provides trusted legal services that protect your interests, ensure regulatory compliance, and
                 deliver strategic guidance to resolve disputes and navigate complex legal matters with confidence
                 and clarity.
             </p>
         </div>


     </main>
 </div>



 <!-- back to top area start -->
 <div class="back-to-top">
     <span class="back-top"><i class="fa fa-angle-up"></i></span>
 </div>
 <!-- back to top area end -->
 <script>
     const currentPage = window.location.pathname.split("/").pop();
     document.querySelectorAll(".sidebar a").forEach((link) => {
         if (link.getAttribute("href") === currentPage) {
             link.classList.add("active");
         }
     });
 </script>
 @endsection