     @extends('layouts.backendsettings')
     @section('title', 'Media Publishing')
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
         style="background-image: url(assets/img/hero-images/industries/Media-Publishing/Media\ &\ Publishing\ 1.svg)">
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
                 <h1>Media & Publishing</h1>
             </div>
             <div class="banner">
                 <img src="{{ asset($constants['IMAGEFILEPATH'] . 'hero-images/industries/Media-Publishing/Media & Publishing 2.svg') }}"
                     alt="Advertising" />
                 <div class="overlay">
                     <div class="overlay-text">
                         <h3>Digital transformation</h3>
                         <p>Empowering marketing & advertising</p>
                     </div>
                 </div>
             </div>
             <!-- Overview -->
             <div class="section">
                 <h2>An overview</h2>
                 <p>
                     Pocketoffice helps media teams organize files, collaborate seamlessly, and streamline workflows
                     across all contributors
                 </p>
             </div>


             <!-- Ready Section -->
             <div class="section">
                 <h2>We are ready</h2>

                 <p>
                     PocketOffice provides Content Production Workflow
                     Manage content from draft to publish, all in one place.
                 </p>
                 <div class="features">
                     <div class="feature">
                         <h4>Central Content Hub</h4>
                         <h6>Keep all your content in one place. </h6>
                         <p>Drafts, assets, and approvals are managed in a single workspace, making production workflows
                             simple.</p>
                     </div>
                     <div class="feature">
                         <h4>Collaborate Across Contributors</h4>
                         <h6>Writers, editors, and designers stay aligned. </h6>
                         <p>Teams collaborate seamlessly without version confusion or scattered feedback.</p>
                     </div>
                     <div class="feature">
                         <h4>Always the Latest Version</h4>
                         <h6>Say goodbye to outdated drafts. </h6>
                         <p>Real-time updates ensure everyone works on the most current content.</p>
                     </div>
                     <div class="feature">
                         <h4>Industry Software Integration</h4>
                         <h6>Compatible with publishing platforms.</h6>
                         <p>Integrates with content management systems like WordPress and Drupal while supporting
                             collaborative editorial workflows.</p>
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
                     Provides dynamic media and publishing solutions that amplify brand storytelling, streamline content
                     production, and deliver engaging, multi-platform experiences that captivate audiences and drive
                     measurable growth.
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