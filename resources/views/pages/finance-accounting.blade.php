 @extends('layouts.backendsettings')
 @section('title', 'Finance & Accounting Services | Smart Business Solutions')
 @section('meta-title', 'Finance & Accounting Services | Smart Business Solutions')
 @section('meta-description', 'Discover Pocket Office solutions for finance and accounting, providing smart business tools for secure document management and financial workflows.')
 @section('meta-keywords', 'finance accounting services, smart business solutions, financial workflows, secure document management')
 @section('meta-image', 'https://pocketdesk.sizaf.com/assets/img/hero-images/industries/Finance-Accounting/Finance & Accounting 1.svg')
 @section('canonical', 'https://pocketdesk.sizaf.com/finance-accounting')
 @section('meta-url', 'https://pocketdesk.sizaf.com/finance-accounting')
 @section('structured-data')
 @verbatim
 {
   "@context": "https://schema.org",
   "@type": "WebPage",
   "name": "Finance & Accounting | Pocket Office",
   "url": "https://pocketdesk.sizaf.com/finance-accounting",
   "description": "Discover Pocket Office solutions for finance and accounting, providing smart business tools for secure document management and financial workflows.",
   "inLanguage": "en",
   "image": "https://pocketdesk.sizaf.com/assets/img/hero-images/industries/Finance-Accounting/Finance & Accounting 1.svg",
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
        background-image: url(assets/img/hero-images/industries/Finance-Accounting/Finance\ &\ Accounting\ 1.svg);
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
             <h1>Finance & Accounting</h1>
         </div>
         <div class="banner">
             <img
                 src="./assets/img/hero-images/industries/Finance-Accounting/Finance & Accounting 2.svg"
                 alt="governance technology"
                 loading="lazy" />
             <div class="overlay">
                 <div class="overlay-text">
                     <h3>Smart finance for smarter decisions</h3>
                     <p>Accurate reporting, tax expertise & business insight</p>
                 </div>
             </div>
         </div>
         <!-- Overview -->
         <div class="section">
             <h2>An overview</h2>
             <p>
                 PocketOffice enables finance teams to manage reports, invoices, and
                 records within secure workspaces, with strict access controls and
                 comprehensive activity tracking
             </p>
         </div>

         <!-- Ready Section -->
         <div class="section">
             <h2>We are ready</h2>

             <p>
                 PocketOffice provides Secure Financial Document Handling Sensitive
                 documents, handled with care.
             </p>
             <div class="features">
                 <div class="feature">
                     <h4>Central Financial Workspace</h4>
                     <h6>All financial documents in one place.</h6>
                     <p>
                         Reports, invoices, and records are stored in a structured cloud
                         workspace that simplifies access and collaboration.
                     </p>
                 </div>
                 <div class="feature">
                     <h4>Strict Access Control</h4>
                     <h6>Sensitive data stays protected.</h6>
                     <p>
                         Permissions ensure financial information is only accessible to
                         authorized users, reducing risk and exposure.
                     </p>
                 </div>
                 <div class="feature">
                     <h4>Real-Time Collaboration</h4>
                     <h6>Always work on the latest version.</h6>
                     <p>
                         Instant updates prevent errors caused by outdated spreadsheets
                         or duplicated files.
                     </p>
                 </div>
                 <div class="feature">
                     <h4>Industry Software Integration</h4>
                     <h6>Connect with financial management tools.</h6>
                     <p>
                         Works with platforms like QuickBooks, Zoho Books, Xero, and SAP
                         Financials to streamline financial reporting and document
                         management.
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
                 Provides reliable financing and accounting solutions that strengthen
                 financial stability, ensure regulatory compliance, and deliver
                 accurate insights to support smarter business decisions and
                 sustainable growth.
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