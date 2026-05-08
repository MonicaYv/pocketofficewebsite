   @extends('layouts.backendsettings')
   @section('title', 'Disclaimer | Pocket Office Cloud Desktop')
   @section('meta-title', 'Disclaimer | Pocket Office Cloud Desktop')
   @section('meta-description', 'Read the disclaimer for Pocket Office cloud desktop services, policies, and legal notices related to our browser-based workspace platform.')
   @section('meta-keywords', 'disclaimer, pocket office legal, cloud desktop policies, legal notice')
   @section('meta-image', 'https://pocketdesk.sizaf.com/assets/img/hero-images/disclaimer .svg')
   @section('canonical', 'https://pocketdesk.sizaf.com/disclaimer')
   @section('meta-url', 'https://pocketdesk.sizaf.com/disclaimer')
   @section('structured-data')
   @verbatim
   {
     "@context": "https://schema.org",
     "@type": "WebPage",
     "name": "Disclaimer | Pocket Office",
     "url": "https://pocketdesk.sizaf.com/disclaimer",
     "description": "Read the disclaimer for Pocket Office cloud desktop services, policies, and legal notices related to our browser-based workspace platform.",
     "inLanguage": "en",
     "image": "https://pocketdesk.sizaf.com/assets/img/hero-images/disclaimer .svg",
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
     style="background-image: url('{{ asset($constants['IMAGEFILEPATH'] . 'hero-images/disclaimer\ .svg') }}')">
     <div class="container">
       <div class="row">
         <div class="col-lg-12">
           <div class="breadcrumb-inner">
             <h1 class="page-title">Disclaimer</h1>
           </div>
         </div>
       </div>
     </div>
   </div>
   <!-- breadcrumb area End -->

   <!--Terms & Conditions Area Start-->
   <div class="terms-container">
     <!-- Sidebar -->
     <div class="sidebar-section">
       <aside class="sidebar">
         <h2>Table Of Contents</h2>

         <a href="#service-availability">
           <i class="fa fa-clock-o mr-2"></i> Service Availability
         </a>

         <a href="#features">
           <i class="fa fa-th-large mr-2"></i> Features & Functionality
         </a>

         <a href="#user-responsibility">
           <i class="fa fa-user mr-2"></i> User Responsibility
         </a>

         <a href="#security">
           <i class="fa fa-exclamation-triangle mr-2"></i> Security & Risk
         </a>

         <a href="#third-party-services">
           <i class="fa fa-plug mr-2"></i> Third-Party Services & Integrations
         </a>

         <a href="#content-disclaimer">
           <i class="fa fa-info-circle mr-2"></i> Content Disclaimer
         </a>

         <a href="#liability">
           <i class="fa fa-balance-scale mr-2"></i> Limitation of Liability
         </a>

         <a href="#no-professional-advice">
           <i class="fa fa-stethoscope mr-2"></i> No Professional Advice
         </a>

         <a href="#acknowledgement">
           <i class="fa fa-check-circle mr-2"></i> Acknowledgment
         </a>
       </aside>
     </div>

     <div class="content-section">
       <!--Service Availability Section-->
       <section id="service-availability" class="card">
         <div class="card-header">
           <div class="icon-box">
             <i class="fa fa-clock-o"></i>
           </div>
           <div>
             <h3>1. Service Availability</h3>
           </div>
         </div>
         <div class="card-body">
           <ul>
             <li>
               PocketOffice strives to deliver reliable, uninterrupted access,
               but we do not guarantee continuous operation or error-free
               performance.
             </li>
             <li>
               Temporary service disruptions may occur due to maintenance,
               updates, network issues, or other unforeseen circumstances.
             </li>
             <li>
               Users acknowledge that occasional downtime or performance
               variability is inherent to cloud-based services.
             </li>
           </ul>
         </div>
       </section>

       <!--Features & Functionality Section-->
       <section id="features" class="card">
         <div class="card-header">
           <div class="icon-box">
             <i class="fa fa-th-large"></i>
           </div>
           <div>
             <h3>2. Features & Functionality</h3>
           </div>
         </div>
         <div class="card-body">
           <ul>
             <li>
               Platform features, user interfaces, and integrations may evolve,
               improve, or be discontinued over time.
             </li>
             <li>
               We are not obligated to maintain any specific feature, version,
               or backward compatibility.
             </li>
             <li>
               PocketOffice does not guarantee that any feature will meet your
               specific requirements or expectations.
             </li>
           </ul>
         </div>
       </section>

       <!--User Responsibility Section-->
       <section id="user-responsibility" class="card">
         <div class="card-header">
           <div class="icon-box">
             <i class="fa fa-user"></i>
           </div>
           <div>
             <h3>3. User Responsibility</h3>
           </div>
         </div>
         <div class="card-body">
           <p>We use collected information to:</p>
           <ul>
             <li>
               Users are responsible for the content and data stored in their
               workspaces.
             </li>
             <li>
               It is your responsibility to maintain independent backups and
               ensure the accuracy and integrity of your data.
             </li>
             <li>
               PocketOffice is not liable for data loss resulting from user
               errors, misconfigurations, or failure to follow best practices.
             </li>
           </ul>
           <p>PocketOffice does not sell, rent, or trade personal data.</p>
         </div>
       </section>

       <!--Security & Risk Section-->
       <section id="security" class="card">
         <div class="card-header">
           <div class="icon-box">
             <i class="fa fa-exclamation-triangle"></i>
           </div>
           <div>
             <h3>4. Security & Risk</h3>
           </div>
         </div>
         <div class="card-body">
           <ul>
             <li>
               PocketOffice implements reasonable security measures, including
               encryption, access controls, and monitoring.
             </li>
             <li>
               However, no digital system can guarantee complete protection.
             </li>
             <li>
               Users are responsible for securing their devices, credentials,
               and accounts.
             </li>
             <li>
               You acknowledge and accept the inherent risks of cloud
               computing, including potential unauthorized access, data
               breaches, or technical failures.
             </li>
           </ul>
         </div>
       </section>

       <!--Third-Party Services & Integrations Section-->
       <section id="third-party-services" class="card">
         <div class="card-header">
           <div class="icon-box">
             <i class="fa fa-plug"></i>
           </div>
           <div>
             <h3>5. Third-Party Services & Integrations</h3>
           </div>
         </div>
         <div class="card-body">
           <ul>
             <li>
               PocketOffice may provide access to third-party services or
               integrations to enhance functionality.
             </li>
             <li>
               We do not control these third-party services and are not
               responsible for their availability, reliability, performance, or
               data handling practices.
             </li>
             <li>
               Any issues or losses arising from third-party services are
               governed by the terms and policies of those providers.
             </li>
             <li>Activity monitoring and audit logging</li>
           </ul>
         </div>
       </section>

       <!--Content Disclaimer Section-->
       <section id="content-disclaimer" class="card">
         <div class="card-header">
           <div class="icon-box">
             <i class="fa fa-info-circle"></i>
           </div>
           <div>
             <h3>6. Content Disclaimer</h3>
           </div>
         </div>
         <div class="card-body">
           <ul>
             <li>
               PocketOffice does not actively monitor user content except as
               necessary to provide Services, maintain security, or comply with
               law.
             </li>
             <li>
               Users retain full ownership of their content and are solely
               responsible for its legality, accuracy, and appropriateness.
             </li>
             <li>
               PocketOffice is not liable for disputes, claims, or damages
               arising from user-generated content.
             </li>
           </ul>
         </div>
       </section>

       <!--Limitation of Liability Section-->
       <section id="liability" class="card">
         <div class="card-header">
           <div class="icon-box">
             <i class="fa fa-balance-scale"></i>
           </div>
           <div>
             <h3>7. Limitation of Liability</h3>
           </div>
         </div>
         <div class="card-body">
           <p>To the fullest extent permitted by law:</p>
           <ul>
             <li>
               PocketOffice is not liable for indirect, incidental,
               consequential, or special damages resulting from the use or
               inability to use the Services.
             </li>
             <li>
               We are not responsible for lost revenue, business interruption,
               or operational impact caused by service outages, data loss, or
               third-party issues.
             </li>
             <li>Use of PocketOffice is at your own discretion and risk.</li>
           </ul>
         </div>
       </section>

       <!--No Professional Advice Seection-->
       <section id="no-professional-advice" class="card">
         <div class="card-header">
           <div class="icon-box">
             <i class="fa fa-stethoscope"></i>
           </div>
           <div>
             <h3>8. No Professional Advice</h3>
           </div>
         </div>
         <div class="card-body">
           <ul>
             <li>
               Information, tools, and outputs provided through PocketOffice do
               not constitute legal, financial, or professional advice.
             </li>
             <li>
               Users should seek independent advice before relying on any data
               or content for critical decisions.
             </li>
           </ul>
         </div>
       </section>

       <!-- Acknowledgment Section-->
       <section id="acknowledgement" class="card">
         <div class="card-header">
           <div class="icon-box">
             <i class="fa fa-check-circle"></i>
           </div>
           <div>
             <h3>9. Acknowledgment</h3>
           </div>
         </div>
         <div class="card-body">
           <p>
             By using PocketOffice, you acknowledge that you have read,
             understood, and accepted the terms of this Disclaimer. Your use of
             the Services constitutes your agreement to operate within the
             limitations and responsibilities outlined herein.
           </p>
         </div>
       </section>
     </div>
   </div>
   @endsection

   <script>
     const currentPage = window.location.pathname.split("/").pop();
     document.querySelectorAll(".sidebar a").forEach((link) => {
       if (link.getAttribute("href") === currentPage) {
         link.classList.add("active");
       }
     });

     const navLinks = document.querySelectorAll(".sidebar a"); // sidebar links
     const sections = document.querySelectorAll(".content-section > section"); // your sections
     const contentSection = document.querySelector(".content-section"); // scrollable container

     // Highlight first link (Introduction) by default on page load
     window.addEventListener("DOMContentLoaded", () => {
       if (navLinks.length > 0) {
         navLinks.forEach((l) => l.classList.remove("active")); // just in case
         navLinks[0].classList.add("active"); // first link
       }
     });

     navLinks.forEach((link) => {
       link.addEventListener("click", (e) => {
         e.preventDefault(); // prevent default anchor jump

         // Remove 'active' from all links
         navLinks.forEach((l) => l.classList.remove("active"));

         // Add 'active' to the clicked link
         link.classList.add("active");

         // Scroll to the target section
         const targetId = link.getAttribute("href").substring(1); // remove #
         const targetSection = document.getElementById(targetId);

         // Scroll smoothly inside the container
         contentSection.scrollTo({
           top: targetSection.offsetTop - contentSection.offsetTop,
           behavior: "smooth",
         });
       });
     });
   </script>