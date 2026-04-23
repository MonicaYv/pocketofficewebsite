 @extends('layouts.backendsettings')
 @section('title', 'Education')
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
     style="background-image: url(assets/img/hero-images/industries/Education/Education\ 1.svg)">
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

         <a href="bpo.html">
             <i class="fa fa-phone mr-2"></i>BPO Outsourcing
         </a>

         <a href="consulting.html">
             <i class="fa fa-briefcase mr-2"></i>Consulting
         </a>

         <a href="design.html">
             <i class="fa fa-paint-brush mr-2"></i>Design & Media Studios
         </a>

         <a href="education.html">
             <i class="fa fa-graduation-cap mr-2"></i>Education
         </a>

         <a href="finance-accounting.html">
             <i class="fa fa-line-chart mr-2"></i>Finance & Accounting
         </a>

         <a href="healthcare.html">
             <i class="fa fa-heartbeat mr-2"></i>Healthcare
         </a>

         <a href="it-software.html">
             <i class="fa fa-desktop mr-2"></i>IT & Software Development
         </a>

         <a href="legal-services.html">
             <i class="fa fa-balance-scale mr-2"></i>Legal Services
         </a>

         <a href="manufacturing.html">
             <i class="fa fa-industry mr-2"></i>Manufacturing
         </a>

         <a href="media-publishing.html">
             <i class="fa fa-newspaper-o mr-2"></i>Media & Publishing
         </a>

         <a href="retail-ecommerce.html">
             <i class="fa fa-shopping-cart mr-2"></i>Retail & E-commerce
         </a>


     </aside>



     <!-- Main Content -->
     <main class="main">
         <!-- Hero -->
         <div class="hero">
             <h1>Education</h1>
         </div>
         <div class="banner">
             <img src="{{ asset($constants['IMAGEFILEPATH'] . 'hero-images/industries/Education/Education 2.svg') }}" alt="governance technology" />
             <div class="overlay">
                 <div class="overlay-text">
                     <h3>Digital learning revolution</h3>
                     <p>Empowering institutions & future-ready education</p>
                 </div>
             </div>
         </div>
         <!-- Overview -->
         <div class="section">
             <h2>An overview</h2>
             <p>
                 PocketOffice enables schools and institutions to provide a unified cloud desktop for learning
                 materials, assignments, and collaboration—accessible from both classrooms and remote environments.
             </p>
         </div>


         <!-- Ready Section -->
         <div class="section">
             <h2>We are ready</h2>

             <p>
                 PocketOffice provides Classroom & remote learning
                 One digital classroom for every student.
             </p>
             <div class="features">
                 <div class="feature">
                     <h4>Unified Digital Classroom</h4>
                     <h6>One workspace for students and educators.</h6>
                     <p>All lesson materials, assignments, and learning tools live in a single cloud desktop,
                         providing students and teachers with a consistent experience across classrooms, labs, and
                         home devices.</p>
                 </div>
                 <div class="feature">
                     <h4>Seamless Classroom-to-Home Learning</h4>
                     <h6>Learning continues beyond school walls.</h6>
                     <p>Students can start work in class and continue at home without re-uploading files or losing
                         progress, ensuring uninterrupted learning across devices.</p>
                 </div>
                 <div class="feature">
                     <h4>Safe Access for Every Role</h4>
                     <h6>The right content for the right users.</h6>
                     <p>Role-based permissions ensure students, teachers, and administrators only access relevant
                         content, helping institutions maintain structure, safety, and control.</p>
                 </div>
                 <div class="feature">
                     <h4>Industry Software Integration</h4>
                     <h6>Compatible with modern education platforms.</h6>
                     <p>Integrates with tools like Google Classroom, Moodle, Canvas LMS, and Microsoft Teams for
                         Education to simplify course management, assignments, and collaboration.</p>
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
                 Provides secure, cloud-hosted desktops that enable employees to work from anywhere while keeping
                 business data protected.
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