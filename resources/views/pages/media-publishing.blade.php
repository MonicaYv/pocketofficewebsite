     @extends('layouts.backendsettings')
     @section('title', 'Media Management Software & Digital Publishing Platform | Pocket Office')
     @section('meta-title', 'Media & Publishing Services | Digital Content Solutions')
     @section('meta-description', 'Discover media management software and a digital publishing platform with content management software designed to streamline content creation, organize digital assets, and improve publishing efficiency.')
     @section('meta-keywords', 'media publishing services, digital content solutions, cloud workspaces publishers, media tools')
     @section('meta-image', 'https://pocket-office.ai/assets/img/hero-images/industries/Media-Publishing/Media & Publishing 1.svg')
     @section('canonical', 'https://pocket-office.ai/media-publishing')
     @section('meta-url', 'https://pocket-office.ai/media-publishing')
     @section('structured-data')
     @verbatim
     {
       "@context": "https://schema.org",
       "@type": "WebPage",
       "name": "Media & Publishing | Pocket Office",
       "url": "https://pocket-office.ai/media-publishing",
       "description": "Discover media management software and a digital publishing platform with content management software designed to streamline content creation, organize digital assets, and improve publishing efficiency.",
       "inLanguage": "en",
       "image": "https://pocket-office.ai/assets/img/hero-images/industries/Media-Publishing/Media & Publishing 1.svg",
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
        @include('layouts.industry_hero', ['bgImage' => 'hero-images/industries/Media-Publishing/Media & Publishing 1.svg'])
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
                 <h1>Media & Publishing</h1>
             </div>
             <div class="banner">
                 <img
                     src="./assets/img/hero-images/industries/Media-Publishing/Media & Publishing 2.svg"
                     alt="Advertising"
                     loading="lazy" />
                 <div class="overlay">
                     <div class="overlay-text">
                         <h3>Digital transformation</h3>
                         <p>Empowering Media & Publishing with Digital Solutions</p>
                     </div>
                 </div>
             </div>
             <!-- Overview -->
             <div class="section">
                 <h2>An overview</h2>
                 <p>
                     PocketOffice helps media teams use media management software to organize files, collaborate seamlessly, and streamline content workflows across writers, editors, designers, and other contributors.
                 </p>
             </div>

             <!-- Ready Section -->
             <div class="section">
                 <h2>We are ready</h2>

                 <p>
                     PocketOffice provides a digital publishing platform that helps media teams manage content production workflows from draft to publish, keeping projects, files, and collaboration organized in one place.
                 </p>
                 <div class="features">
                     <div class="feature industry-container">
                        <div class="feature-icon">
                            <img src="/assets/img/industry-icons/central-content.svg" alt="industry-icon">
                        </div>
                        <div>
                         <h4>Central Content Hub</h4>
                         <h6>Keep all your content in one place.</h6>
                         <p>
                             Content management software helps teams manage drafts, digital assets, and approvals within a single workspace, making content production workflows simpler and more efficient.
                         </p>
                        </div>
                     </div>
                     <div class="feature industry-container">
                        <div class="feature-icon">
                            <img src="/assets/img/industry-icons/collaborate-across.svg" alt="industry-icon">
                        </div>
                        <div>
                         <h4>Collaborate Across Contributors</h4>
                         <h6>Writers, editors, and designers stay aligned.</h6>
                         <p>
                             With media management software, teams can collaborate seamlessly while reducing version confusion and keeping feedback organized across content projects.
                         </p>
                        </div>
                     </div>
                     <div class="feature industry-container">
                        <div class="feature-icon">
                            <img src="/assets/img/industry-icons/always-latest.svg" alt="industry-icon">
                        </div>
                        <div>
                         <h4>Always the Latest Version</h4>
                         <h6>Say goodbye to outdated drafts.</h6>
                         <p>
                             A digital publishing platform with real-time updates helps ensure everyone works on the most current content, reducing errors and improving publishing workflows.
                         </p>
                        </div>
                     </div>
                     <div class="feature industry-container">
                        <div class="feature-icon">
                            <img src="/assets/img/industry-icons/industry-software-media.svg" alt="industry-icon">
                        </div>
                        <div>
                         <h4>Industry Software Integration</h4>
                         <h6>Compatible with publishing platforms.</h6>
                         <p>
                               PocketOffice's content management software integrates with systems like WordPress and Drupal while supporting collaborative editorial workflows and efficient digital content management.
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
                     Provides dynamic media management software and digital publishing platform solutions that help businesses amplify brand storytelling and streamline content production. With content management software, teams can organize digital assets, collaborate efficiently, manage content workflows, and deliver engaging multi-platform experiences that captivate audiences and support measurable business growth.
                 </p>
             </div>
         </main>
     </div>
     @endsection