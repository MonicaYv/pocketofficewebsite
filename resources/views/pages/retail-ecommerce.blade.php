 @extends('layouts.backendsettings')
 @section('title', 'Retail & E-commerce Solutions | Online Business Growth')
 @section('meta-title', 'Retail & E-commerce Solutions | Online Business Growth')
 @section('meta-description', 'Discover Pocket Office retail and e-commerce solutions for online business growth, secure customer workflows, and cloud-based storefront management.')
 @section('meta-keywords', 'retail ecommerce solutions, online business growth, cloud storefront, retail workflow')
 @section('meta-image', 'https://pocketdesk.sizaf.com/assets/img/hero-images/industries/Retail-E-commerce/Retail & E-commerce 1.svg')
 @section('canonical', 'https://pocketdesk.sizaf.com/retail-ecommerce')
 @section('meta-url', 'https://pocketdesk.sizaf.com/retail-ecommerce')
 @section('structured-data')
 @verbatim
 {
   "@context": "https://schema.org",
   "@type": "WebPage",
   "name": "Retail & E-commerce | Pocket Office",
   "url": "https://pocketdesk.sizaf.com/retail-ecommerce",
   "description": "Discover Pocket Office retail and e-commerce solutions for online business growth, secure customer workflows, and cloud-based storefront management.",
   "inLanguage": "en",
   "image": "https://pocketdesk.sizaf.com/assets/img/hero-images/industries/Retail-E-commerce/Retail & E-commerce 1.svg",
   "publisher": {
     "@type": "Organization",
     "name": "Pocket Office",
     "url": "https://pocketdesk.sizaf.com",
     "logo": {
       "@type": "ImageObject",
       "url": "https://pocketdesk.sizaf.com/assets/img/logo/pocket-office-tm-final-logo.png"
     }
   }
 }
 @endverbatim
 @endsection
 @section('content')
 <!-- breadcrumb area start -->
 <div
   class="breadcrumb-area"
   style="
        background-image: url(assets/img/hero-images/industries/Retail-E-commerce/Retail\ &\ E-commerce\ 1.svg);
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
       <h1>Retail & E-commerce</h1>
     </div>
     <div class="banner">
       <img
         src="./assets/img/hero-images/industries/Retail-E-commerce/Retail & E-commerce 2.svg"
         alt="Ecommerce and Retail"
         loading="lazy" />
       <div class="overlay">
         <div class="overlay-text">
           <h3>Where brands meet buyers</h3>
           <p>Powerful digital commerce built for growth</p>
         </div>
       </div>
     </div>
     <!-- Overview -->
     <div class="section">
       <h2>An overview</h2>
       <p>
         Pocketoffice lets retail teams share inventory data, marketing
         assets, and operational documents from a single, centralized
         workspace.
       </p>
     </div>

     <!-- Ready Section -->
     <div class="section">
       <h2>We are ready</h2>

       <p>
         PocketOffice provides Team & Inventory Collaboration Coordinate
         teams seamlessly across locations.
       </p>
       <div class="features">
         <div class="feature">
           <h4>Central Operations Workspace</h4>
           <h6>Get one clear view of your operations.</h6>
           <p>
             Inventory data, marketing assets, and reports are accessible
             from a unified cloud desktop.
           </p>
         </div>
         <div class="feature">
           <h4>Real-Time Updates</h4>
           <h6>Keep teams aligned.</h6>
           <p>
             Stock levels and promotions update instantly so everyone stays
             informed.
           </p>
         </div>
         <div class="feature">
           <h4>Multi-Location Support</h4>
           <h6>Connect teams everywhere.</h6>
           <p>
             Stores, warehouses, and headquarters work seamlessly from the
             same system.
           </p>
         </div>
         <div class="feature">
           <h4>Industry Software Integration</h4>
           <h6>Supports modern retail platforms.</h6>
           <p>
             Works with platforms such as Shopify, WooCommerce, and Magento
             to manage product information, reports, and business
             documentation.
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
         Provides innovative retail and e-commerce solutions that enhance
         customer experiences, optimize inventory and supply chain
         operations, and drive sales growth through seamless, secure, and
         data-driven digital commerce platforms.
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