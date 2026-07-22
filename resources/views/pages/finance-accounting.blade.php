 @extends('layouts.backendsettings')
 @section('title', 'Accounting Software & Finance and Accounting Software | Pocket Office')
 @section('meta-title', 'Accounting Software & Finance and Accounting Software | Pocket Office')
 @section('meta-description', 'Discover accounting software and finance and accounting software with business accounting software solutions designed to simplify financial management, streamline operations, and improve business efficiency.')
 @section('meta-keywords', 'finance accounting services, smart business solutions, financial workflows, secure document management')
 @section('meta-image', 'https://pocket-office.ai/assets/img/hero-images/industries/Finance-Accounting/Finance & Accounting 1.svg')
 @section('canonical', 'https://pocket-office.ai/finance-accounting')
 @section('meta-url', 'https://pocket-office.ai/finance-accounting')
 @section('structured-data')
 @verbatim
 {
   "@context": "https://schema.org",
   "@type": "WebPage",
   "name": "Finance & Accounting | Pocket Office",
   "url": "https://pocket-office.ai/finance-accounting",
   "description": "Discover accounting software and finance and accounting software with business accounting software solutions designed to simplify financial management, streamline operations, and improve business efficiency.",
   "inLanguage": "en",
   "image": "https://pocket-office.ai/assets/img/hero-images/industries/Finance-Accounting/Finance & Accounting 1.svg",
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
@include('layouts.industry_hero', ['bgImage' => 'hero-images/industries/Finance-Accounting/Finance & Accounting 1.svg'])
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
             <h1>Finance & Accounting</h1>
         </div>
         <div class="banner">
             <img
                 src="./assets/img/hero-images/industries/Finance-Accounting/Finance & Accounting 2.svg"
                 alt="governance technology"
                 loading="lazy" />
             <div class="overlay">
                 <div class="overlay-text">
                     <h3>Smart Finance with Accounting Software for Smarter Decisions</h3>
                     <p>Accurate reporting, tax expertise & business insight</p>
                 </div>
             </div>
         </div>
         <!-- Overview -->
         <div class="section">
             <h2>An overview</h2>
             <p>
                 PocketOffice enables finance teams to manage reports, invoices, and records with secure accounting software, providing strict access controls and comprehensive activity tracking to support efficient financial operations.
             </p>
         </div>

         <!-- Ready Section -->
         <div class="section">
             <h2>We are ready</h2>

             <p>
                 PocketOffice provides finance and accounting software solutions with secure financial document handling, helping businesses manage sensitive financial information with care while maintaining control and security.
             </p>
             <div class="features">
                 <div class="feature">
                     <h4>Central Financial Workspace</h4>
                     <h6>All financial documents in one place.</h6>
                     <p>
                          Business accounting software helps teams organize reports, invoices, and records in a structured cloud workspace that simplifies access, collaboration, and financial document management.
                     </p>
                 </div>
                 <div class="feature">
                     <h4>Strict Access Control</h4>
                     <h6>Sensitive data stays protected.</h6>
                     <p>
                         Permissions within finance and accounting software ensure financial information is only accessible to authorized users, helping reduce risk and exposure.
                     </p>
                 </div>
                 <div class="feature">
                     <h4>Real-Time Collaboration</h4>
                     <h6>Always work on the latest version.</h6>
                     <p>
                         With accounting software, instant updates help prevent errors caused by outdated spreadsheets or duplicated files, allowing finance teams to collaborate more efficiently.
                     </p>
                 </div>
                 <div class="feature">
                     <h4>Industry Software Integration</h4>
                     <h6>Connect with financial management tools.</h6>
                     <p>
                         PocketOffice's business accounting software solutions work with platforms like QuickBooks, Zoho Books, Xero, and SAP Financials to streamline financial reporting and document management.
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
                 Provides reliable accounting software and finance and accounting software solutions that help businesses strengthen financial management, support regulatory compliance, and deliver accurate insights for smarter business decisions. With business accounting software, organizations can streamline financial processes, improve collaboration, protect sensitive records, and support sustainable business growth.
             </p>
         </div>
     </main>
 </div>
 @endsection