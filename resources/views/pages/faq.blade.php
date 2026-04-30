 @extends('layouts.backendsettings')
 @section('title', 'Frequently Asked Questions About Cloud Desktop | Pocket Office')
 @section('content')
 <!-- breadcrumb area start -->
 <div class="breadcrumb-area" style="background-image:url(assets/img/hero-images/faq.svg);">
     <div class="container">
         <div class="row">
             <div class="col-lg-12">
                 <div class="breadcrumb-inner">
                     <h1 class="page-title">FAQ</h1>


                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- breadcrumb area End -->

 <!-- faq area start -->
 <div class="faq-area pd-top-30">
     <div class="container">
         <div class="row custom-gutters-60 justify-content-center">
             <div class="col-xl-9 col-lg-11">
                 <div class="section-title text-center">
                     <h2 class="title">Frequently Asked Questions</h2>
                 </div>
                 <div class="accordion" id="accordion">
                     <!-- single accordion -->
                     <div class="single-accordion card">
                         <div class="card-header" id="headingOne">
                             <h2 class="mb-0">
                                 <button class="btn btn-link" type="button" data-toggle="collapse"
                                     data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">How
                                     do I get started with Pocketoffice?</button>
                             </h2>
                         </div>
                         <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                             data-parent="#accordion">
                             <div class="card-body">
                                 Getting started is simple. Sign up, log in from any modern browser, and your cloud
                                 desktop is ready instantly—no software installation or device setup required.
                             </div>
                         </div>
                     </div>
                     <!-- single accordion -->
                     <div class="single-accordion card">
                         <div class="card-header" id="headingTwo">
                             <h2 class="mb-0">
                                 <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                     data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">Do I
                                     need to install anything to use Pocketoffice?</button>
                             </h2>
                         </div>
                         <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                             data-parent="#accordion">
                             <div class="card-body">
                                 No. Pocketoffice runs entirely in your browser. Access your desktop, files, and apps
                                 from any device without installing software.
                             </div>
                         </div>
                     </div>
                     <!-- single accordion -->
                     <div class="single-accordion card">
                         <div class="card-header" id="headingThree">
                             <h2 class="mb-0">
                                 <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                     data-target="#collapseThree" aria-expanded="true"
                                     aria-controls="collapseOne">How do I invite team members?</button>
                             </h2>
                         </div>
                         <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                             data-parent="#accordion">
                             <div class="card-body">
                                 Invite users from the admin or workspace settings and assign roles/permissions to
                                 control access to files and workspaces.
                             </div>
                         </div>
                     </div>
                     <!-- single accordion -->
                     <div class="single-accordion card">
                         <div class="card-header" id="headingFour">
                             <h2 class="mb-0">
                                 <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                     data-target="#collapseFour" aria-expanded="true" aria-controls="collapseOne">Can
                                     I upgrade or downgrade my plan later?</button>
                             </h2>
                         </div>
                         <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                             data-parent="#accordion">
                             <div class="card-body">
                                 Yes. Upgrades take effect immediately; downgrades apply at the next billing cycle.
                             </div>
                         </div>
                     </div>
                     <!-- single accordion -->
                     <div class="single-accordion card">
                         <div class="card-header" id="headingFive">
                             <h2 class="mb-0">
                                 <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                     data-target="#collapseFive" aria-expanded="true" aria-controls="collapseOne">How
                                     does billing work?</button>
                             </h2>
                         </div>
                         <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                             data-parent="#accordion">
                             <div class="card-body">
                                 Choose monthly or annual billing, with discounts available for annual subscriptions.
                             </div>
                         </div>
                     </div>
                     <!-- single accordion -->
                     <div class="single-accordion card">
                         <div class="card-header" id="headingSix">
                             <h2 class="mb-0">
                                 <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                     data-target="#collapseSix" aria-expanded="true" aria-controls="collapseOne">How
                                     do I update my billing information?</button>
                             </h2>
                         </div>
                         <div id="collapseSix" class="collapse" aria-labelledby="headingSix"
                             data-parent="#accordion">
                             <div class="card-body">
                                 Update billing details from your account or admin settings—changes apply
                                 automatically to future invoices.
                             </div>
                         </div>
                     </div>
                     <!-- single accordion -->
                     <div class="single-accordion card ">
                         <div class="card-header" id="headingSeven">
                             <h2 class="mb-0">
                                 <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                     data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseOne">
                                     What happens if my payment fails?</button>
                             </h2>
                         </div>
                         <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven"
                             data-parent="#accordion">
                             <div class="card-body">
                                 You’ll be notified and given time to update billing information. Workspace access
                                 continues during this period.
                             </div>
                         </div>
                     </div>

                     <div class="single-accordion card ">
                         <div class="card-header" id="headingEight">
                             <h2 class="mb-0">
                                 <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                     data-target="#collapseEight" aria-expanded="true" aria-controls="collapseOne">
                                     Can I cancel my subscription anytime?</button>
                             </h2>
                         </div>
                         <div id="collapseEight" class="collapse" aria-labelledby="headingEight"
                             data-parent="#accordion">
                             <div class="card-body">
                                 Yes. Access continues until the end of the current billing period.
                             </div>
                         </div>
                     </div>

                     <div class="single-accordion card">
                         <div class="card-header" id="headingNine">
                             <h2 class="mb-0">
                                 <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                     data-target="#collapseNine" aria-expanded="true" aria-controls="collapseOne">
                                     Do you offer invoices for billing?</button>
                             </h2>
                         </div>
                         <div id="collapseNine" class="collapse" aria-labelledby="headingNine"
                             data-parent="#accordion">
                             <div class="card-body">
                                 Invoices are available for Business and Enterprise plans and can be downloaded from
                                 the billing section of your account.
                             </div>
                         </div>
                     </div>
                     <!-- single accordion end -->

                 </div>
             </div>
         </div>
     </div>
     <!-- faq area End -->

     <!-- service area start -->
     <div class="more-question-area pd-top-30">
         <div class="container">
             <div class="row justify-content-center">
                 <div class="col-xl-7 col-lg-9">
                     <div class="section-title text-center margin-bottom-90">
                         <h2 class="title">Get In Touch</h2>
                         <p>Our support team will get assistance from AI-powered suggestions, making it quicker than
                             ever to handle support requests. support team will get assistance from AI-powered
                             suggestions.</p>
                     </div>
                 </div>
             </div>


             <div class="faq-cards">

                 <!-- Phone & Email (use faq-card-contact class) -->
                 <div class="faq-card-contact">
                     <div class="faq-card-head">
                         <span class="faq-card-heading">Phone Number</span>
                         <p class="faq-card-info">+ 91 9967940928</p>
                         <p class="faq-card-info">+ 60 146600012</p>
                     </div>
                     <div class="faq-contact-divider"></div>
                     <div class="faq-card-head">
                         <span class="faq-card-heading">Email Address</span>
                         <p class="faq-card-info">info@aibuzz.net</p>
                         <p class="faq-card-info">support@aibuzz.net</p>
                     </div>
                 </div>

                 <!-- 3 Address Cards -->
                 <div class="faq-cards-row">
                     <div class="faq-card">
                         <div class="faq-card-head">
                             <span class="faq-card-heading">Regional Address</span>
                             <span class="region-heading">USA</span>
                             <p class="faq-card-info">218-10, Hillside Ave, Queens Village, New York, USA, 11427.</p>
                         </div>
                     </div>
                     <div class="faq-card">
                         <div class="faq-card-head">
                             <span class="faq-card-heading">Regional Address </span>
                             <span class="region-heading">Malaysia</span>
                             <p class="faq-card-info">M116, Jalan Mega Mendung, Off Jalan Klang Lama, 58200, Kuala
                                 Lumpur, Malaysia.</p>
                         </div>
                     </div>
                     <div class="faq-card">
                         <div class="faq-card-head">
                             <span class="faq-card-heading pt-3">Regional Address</span>
                             <span class="region-heading">India</span>
                             <p class="faq-card-info">3102, 1st Floor, Rustomjee Eaze Zone, Sundar Nagar, Malad West
                                 - Mumbai
                                 400064, MH -</p>
                         </div>
                     </div>
                 </div>

             </div>
         </div>
     </div>
     @endsection