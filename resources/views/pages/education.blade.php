 @extends('layouts.backendsettings')
 @section('title', 'AI in Education & Education Management Software | Pocket Office')
 @section('meta-title', 'AI in Education & Education Management Software | Pocket Office')
 @section('meta-description', 'Discover AI in education with artificial intelligence in education and education management software designed to improve learning, administration, efficiency, and outcomes.')
 @section('meta-keywords', 'education solutions, digital learning, EdTech services, cloud workspaces education')
 @section('meta-image', 'https://pocket-office.ai/assets/img/hero-images/industries/Education/Education 1.svg')
 @section('canonical', 'https://pocket-office.ai/education')
 @section('meta-url', 'https://pocket-office.ai/education')
 @section('structured-data')
 @verbatim
 {
   "@context": "https://schema.org",
   "@type": "WebPage",
   "name": "Education | Pocket Office",
   "url": "https://pocket-office.ai/education",
   "description": "Discover AI in education with artificial intelligence in education and education management software designed to improve learning, administration, efficiency, and outcomes.",
   "inLanguage": "en",
   "image": "https://pocket-office.ai/assets/img/hero-images/industries/Education/Education 1.svg",
   "publisher": {
     "@type": "Organization",
     "name": "Pocket Office",
     "url": "https://pocket-office.ai/",
     "logo": {
       "@type": "ImageObject",
       "url": "https://pocket-office.ai/assets/img/logo/pocket-office-tm-final-logo.png"
     }
   }
 }
 @endverbatim
 @endsection
 @section('content')
 <!-- breadcrumb area start -->
 
 
@include('layouts.industry_hero', ['bgImage' => 'hero-images/industries/Education/Education 1.svg'])
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
             <h1>Education</h1>
         </div>
         <div class="banner">
             <img
                 src="./assets/img/hero-images/industries/Education/Education 2.svg"
                 alt="governance technology"
                 loading="lazy" />
             <div class="overlay">
                 <div class="overlay-text">
                     <h3>Digital Learning Revolution with AI in Education</h3>
                     <p>Empowering institutions & future-ready education</p>
                 </div>
             </div>
         </div>
         <!-- Overview -->
         <div class="section">
             <h2>An overview</h2>
             <p>
                 PocketOffice enables schools and institutions to embrace AI in education with a unified cloud desktop for learning materials, assignments, and collaboration—accessible from classrooms, labs, and remote learning environments.
             </p>
         </div>

         <!-- Ready Section -->
         <div class="section">
             <h2>We are ready</h2>

             <p>
                 PocketOffice provides education management software for classroom and remote learning, creating one digital classroom where students and educators can access learning resources, assignments, and collaboration tools.
             </p>
             <div class="features">
                 <div class="feature">
                     <h4>Unified Digital Classroom</h4>
                     <h6>One workspace for students and educators.</h6>
                     <p>
                         Artificial intelligence in education can support more connected and efficient digital learning environments, while lesson materials, assignments, and learning tools live in a single cloud desktop for a consistent experience across classrooms, labs, and home devices.
                     </p>
                 </div>
                 <div class="feature">
                     <h4>Seamless Classroom-to-Home Learning</h4>
                     <h6>Learning continues beyond school walls.</h6>
                     <p>
                         Students can start work in class and continue at home without
                         re-uploading files or losing progress, ensuring uninterrupted
                         learning across devices.
                     </p>
                 </div>
                 <div class="feature">
                     <h4>Safe Access for Every Role</h4>
                     <h6>The right content for the right users.</h6>
                     <p>
                         Role-based permissions within education management software ensure students, teachers, and administrators only access relevant content, helping institutions maintain structure, safety, and control.
                     </p>
                 </div>
                 <div class="feature">
                     <h4>Industry Software Integration</h4>
                     <h6>Compatible with modern education platforms.</h6>
                     <p>
                         PocketOffice's education management software integrates with tools like Google Classroom, Moodle, Canvas LMS, and Microsoft Teams for Education to simplify course management, assignments, and collaboration.
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
                 Provides secure, cloud-hosted learning environments that support AI in education and modern digital learning. With artificial intelligence in education and education management software, institutions can improve collaboration, simplify learning management, support remote education, and provide students and educators with secure access to resources from anywhere.
             </p>
         </div>
     </main>
 </div>
 @endsection