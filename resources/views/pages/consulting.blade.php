 @extends('layouts.backendsettings')
 @section('title', 'AI Consulting & Business Consulting Services | Pocket Office')
 @section('meta-title', 'AI Consulting & Business Consulting Services | Pocket Office')
 @section('meta-description', 'Get AI consulting and business consulting services with AI business consulting solutions to improve strategy, streamline operations, drive innovation, and support growth.')
 @section('meta-keywords', 'business consulting, cloud desktop strategy, growth experts, workspace consulting, business strategy')
 @section('meta-image', 'https://pocket-office.ai/assets/img/hero-images/industries/Consulting/Consulting 2.svg')
 @section('canonical', 'https://pocket-office.ai/consulting')
 @section('meta-url', 'https://pocket-office.ai/consulting')
 @section('structured-data')
 @verbatim
 {
   "@context": "https://schema.org",
   "@type": "WebPage",
   "name": "Consulting | Pocket Office",
   "url": "https://pocket-office.ai/consulting",
   "description": "Get AI consulting and business consulting services with AI business consulting solutions to improve strategy, streamline operations, drive innovation, and support growth.",
   "inLanguage": "en",
   "image": "https://pocket-office.ai/assets/img/hero-images/industries/Consulting/Consulting 2.svg",
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
@include('layouts.industry_hero', ['bgImage' => 'hero-images/industries/Consulting/Consulting 2.svg'])
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
             <h1>Consulting</h1>
         </div>
         <div class="banner">
             <img
                 src="{{ asset($constants['IMAGEFILEPATH'] . 'hero-images/industries/Consulting/Consulting-1.svg') }}"
                 alt="governance technology"
                 loading="lazy" />
             <div class="overlay">
                 <div class="overlay-text">
                     <h3> AI Consulting & Strategic Business Consulting</h3>
                     <p>Driving growth, efficiency & sustainable transformation</p>
                 </div>
             </div>
         </div>
         <!-- Overview -->
         <div class="section">
             <h2>An overview</h2>
             <p>
                 PocketOffice enables AI consulting and consulting teams to create client-specific workspaces, securely share files, and manage access—keeping data separate across engagements while ensuring confidentiality and efficient collaboration.
             </p>
         </div>

         <!-- Ready Section -->
         <div class="section">
             <h2>We are ready</h2>

             <p>
                 PocketOffice provides secure client collaboration workflows that support business consulting services, helping teams work efficiently and securely across clients and projects.
             </p>
             <div class="features">
                 <div class="feature industry-container">
                    <div class="feature-icon">
                        <img src="/assets/img/industry-icons/client-specific.svg" alt="industry-icon">
                    </div>
                    <div>
                        <h4>Client-Specific Workspaces</h4>
                        <h6>One workspace per client.</h6>
                        <p>
                            Each client engagement gets its own isolated workspace, keeping
                            documents, data, and discussions clearly separated and
                            confidential.
                        </p>
                    </div>
                 </div>
                 <div class="feature industry-container">
                    <div class="feature-icon">
                        <img src="/assets/img/industry-icons/secure-file.svg" alt="industry-icon">
                    </div>
                    <div>
                        <h4>Secure File Sharing</h4>
                        <h6>Share without oversharing.</h6>
                        <p>
                            Consultants can share reports and deliverables with granular
                            permissions and optional expiry, ensuring clients only access
                            what’s intended.
                        </p>
                    </div>
                 </div>
                 <div class="feature industry-container">
                    <div class="feature-icon">
                        <img src="/assets/img/industry-icons/easy-project.svg" alt="industry-icon">
                    </div>
                    <div>
                        <h4>Easy Project Switching</h4>
                        <h6>Move between clients effortlessly.</h6>
                        <p>
                            Switch between client workspaces without logging out or changing
                            tools, reducing context switching and operational friction.
                        </p>
                    </div>
                 </div>
                 <div class="feature industry-container">
                    <div class="feature-icon">
                        <img src="/assets/img/industry-icons/industry-software-integration.svg" alt="industry-icon">
                    </div>
                    <div>
                        <h4>Industry Software Integration</h4>
                        <h6>Connect with consulting workflow tools.</h6>
                        <p>
                            Connect your AI business consulting workflows with leading platforms such as Salesforce, Asana, Trello, and Slack, helping consulting teams manage projects, clients, and documentation efficiently.
                        </p>
                    </div>
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
                 Our AI consulting and business consulting services help organizations solve complex challenges, optimize performance, and drive sustainable growth. Through AI business consulting, businesses can identify opportunities for innovation, streamline operations, minimize risks, and maximize return on investment.
             </p>
         </div>
     </main>
 </div>
 @endsection