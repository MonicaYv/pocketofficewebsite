     @extends('layouts.backendsettings')
     @section('title', 'Payment')
     @section('content')

     @php
     $planName = request('plan_name');
     $amount = request('amount');
     $currency = request('currency');
     $subscription = request('subscription');
     $users = request('users');
     $license = request('license');
     $storage = request('storage');
     @endphp
     <style>
         #toast {
             position: fixed;
             top: 20px;
             right: 20px;
             background: #28a745;
             color: #fff;
             padding: 12px 18px;
             border-radius: 6px;
             font-size: 14px;
             display: none;
             z-index: 9999;
             transition: opacity 0.3s ease;
         }
     </style>
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
     <div class="breadcrumb-area pricing-bg" style="background-image: url(assets/img/hero-images/Payment.svg)">
         <div class="container">
             <div class="row">
                 <div class="col-lg-12">
                     <div class="breadcrumb-inner">
                         <h1 class="page-title">Payment</h1>

                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- breadcrumb area End -->




     <div id="toast">✅ Registration submitted successfully!</div>

     <div class="container my-4">
         <div class="row">
             <div class="col-md-8" id="formCol">
                 <form id="registrationForm" novalidate>

                     <!-- ── Section 1: Company Details ── -->
                     <div class="panel panel-default mb-4">
                         <div class="panel-heading">
                             <h4>Company Details</h4>
                         </div>
                         <div class="panel-body">

                             <div class="row mb-3">
                                 <div class="col-sm-6">
                                     <div class="form-group has-feedback">
                                         <label>Company Name <span class="req">*</span></label>
                                         <input type="text" class="form-control" id="companyNameInput"
                                             placeholder="XYZ Company" data-rule="required|minlen:2">
                                         <span class="glyphicon form-control-feedback" id="companyName-icon"></span>
                                         <span class="help-block text-danger" style="display:none" id="companyName-err">
                                             Company name is required (min 2 chars)
                                         </span>
                                     </div>
                                 </div>
                                 <div class="col-sm-6">
                                     <div class="form-group">
                                         <label>Company Type</label>
                                         <div class="select-wrapper">
                                             <select class="form-control" id="companyTypeInput">
                                                 <option value="">Select type</option>
                                                 <option>Startup</option>
                                                 <option>SME</option>
                                                 <option>Enterprise</option>
                                                 <option>Non-profit</option>
                                                 <option>Government</option>
                                             </select>
                                         </div>
                                     </div>
                                 </div>
                             </div>

                             <div class="row mb-3">
                                 <div class="col-sm-6">
                                     <div class="form-group">
                                         <label>Industry Type</label>
                                         <div class="select-wrapper">
                                             <select class="form-control" id="industryTypeInput">
                                                 <option value="">Select type</option>
                                                 <option>Education</option>
                                                 <option>Consulting</option>
                                                 <option>Healthcare</option>
                                                 <option>Finance &amp; Accounting</option>
                                                 <option>Legal Services</option>
                                                 <option>Manufacturing</option>
                                                 <option>IT &amp; Software Development</option>
                                                 <option>Design &amp; Media Studios</option>
                                                 <option>Media &amp; Publishing</option>
                                                 <option>Retail &amp; E-commerce</option>
                                                 <option>BPO &amp; Outsourcing</option>
                                             </select>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-sm-6">
                                     <div class="form-group has-feedback">
                                         <label>Address <span class="req">*</span></label>
                                         <input type="text" class="form-control" id="addressInput"
                                             placeholder="123 Main Street" data-rule="required">
                                         <span class="glyphicon form-control-feedback" id="address-icon"></span>
                                         <span class="help-block text-danger" style="display:none" id="address-err">
                                             Address is required
                                         </span>
                                     </div>
                                 </div>
                             </div>

                             <div class="row mb-3">
                                 <div class="col-sm-6">
                                     <div class="form-group">
                                         <label>Company Contact</label>
                                         <input type="text" class="form-control" id="companyNumberInput"
                                             placeholder="+1 (415) 123-4567">
                                     </div>
                                 </div>
                                 <div class="col-sm-6">
                                     <div class="form-group has-feedback">
                                         <label>Company Email Address</label>
                                         <input type="email" class="form-control" id="companyEmailInput"
                                             placeholder="company@example.com" data-rule="email">
                                         <span class="glyphicon form-control-feedback" id="companyEmail-icon"></span>
                                         <span class="help-block text-danger" style="display:none" id="companyEmail-err">
                                             Enter a valid email
                                         </span>
                                     </div>
                                 </div>
                             </div>

                             <div class="row mb-3">
                                 <div class="col-sm-6">
                                     <div class="form-group has-feedback">
                                         <label>Website</label>
                                         <input type="url" class="form-control" id="websiteInput"
                                             placeholder="https://example.com" data-rule="url">
                                         <span class="glyphicon form-control-feedback" id="website-icon"></span>
                                         <span class="help-block text-danger" style="display:none" id="website-err">
                                             Enter a valid URL
                                         </span>
                                     </div>
                                 </div>
                             </div>

                         </div>
                     </div><!-- /Company Details -->


                     <!-- ── Section 2: Contact Person Details ── -->
                     <div class="panel panel-default mb-4">
                         <div class="panel-heading">
                             <h4>Contact Person Details</h4>
                         </div>
                         <div class="panel-body">

                             <div class="row mb-3">
                                 <div class="col-sm-6">
                                     <div class="form-group has-feedback">
                                         <label>Contact Person <span class="req">*</span></label>
                                         <input type="text" class="form-control" id="contactPersonInput"
                                             placeholder="Full name" data-rule="required|minlen:2">
                                         <span class="glyphicon form-control-feedback" id="contactPerson-icon"></span>
                                         <span class="help-block text-danger" style="display:none"
                                             id="contactPerson-err">
                                             Contact person name is required
                                         </span>
                                     </div>
                                 </div>
                                 <div class="col-sm-6">
                                     <div class="form-group">
                                         <label>Designation / Role</label>
                                         <select class="form-control" id="designationInput">
                                             <option value="">CEO, Supervisor, etc.</option>
                                             <option>CEO</option>
                                             <option>CTO</option>
                                             <option>Manager</option>
                                             <option>Supervisor</option>
                                             <option>Director</option>
                                         </select>
                                     </div>
                                 </div>
                             </div>

                             <div class="row mb-3">
                                 <div class="col-sm-6">
                                     <div class="form-group has-feedback">
                                         <label>Phone Number <span class="req">*</span></label>
                                         <input type="tel" class="form-control" id="phoneInput"
                                             placeholder="+1 (415) 123-4567" data-rule="required|phone">
                                         <span class="glyphicon form-control-feedback" id="phone-icon"></span>
                                         <span class="help-block text-danger" style="display:none" id="phone-err">
                                             Enter a valid phone number
                                         </span>
                                     </div>
                                 </div>
                                 <div class="col-sm-6">
                                     <div class="form-group has-feedback">
                                         <label>Email Address <span class="req">*</span></label>
                                         <input type="email" class="form-control" id="emailInput" placeholder="name@gmail.com"
                                             data-rule="required|email">
                                         <span class="glyphicon form-control-feedback" id="email-icon"></span>
                                         <span class="help-block text-danger" style="display:none" id="email-err">
                                             Enter a valid email
                                         </span>
                                     </div>
                                 </div>
                             </div>

                             <div class="row mb-3">
                                 <div class="col-sm-12">
                                     <div class="form-group has-feedback">
                                         <label>Username <span class="req">*</span>
                                             <small class="text-muted">(Create username for login)</small>
                                         </label>
                                         <input type="text" class="form-control" id="usernameInput"
                                             placeholder="Choose a username" data-rule="required|minlen:4|username">
                                         <span class="glyphicon form-control-feedback" id="username-icon"></span>
                                         <span class="help-block text-danger" style="display:none" id="username-err">
                                             Username must be 4+ chars, letters/numbers/underscore only
                                         </span>
                                     </div>
                                 </div>
                             </div>

                             <!-- <div class="row mb-3">
                                <div class="col-sm-6">
                                    <div class="form-group has-feedback">
                                        <label>Password <span class="req">*</span></label>
                                        <input type="password" class="form-control" id="password"
                                            placeholder="Create a strong password" data-rule="required|minlen:8">
                                        <span class="glyphicon form-control-feedback" id="password-icon"></span>
                                        <span class="help-block text-danger" style="display:none" id="password-err">
                                            Password must be at least 8 characters
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group has-feedback">
                                        <label>Enter Password Again <span class="req">*</span></label>
                                        <input type="password" class="form-control" id="passwordConfirm"
                                            placeholder="Re-enter your password" data-rule="required|match:password">
                                        <span class="glyphicon form-control-feedback" id="passwordConfirm-icon"></span>
                                        <span class="help-block text-danger" style="display:none"
                                            id="passwordConfirm-err">
                                            Passwords do not match
                                        </span>
                                    </div>
                                </div>
                            </div> -->

                             <div class="row mb-3">
                                 <div class="col-sm-6">
                                     <div class="form-group">
                                         <label>Security Question <span class="req">*</span>
                                             <small class="text-muted">(For account recovery)</small>
                                         </label>
                                         <select class="form-control" id="passwordQuestionInput" data-rule="required">
                                             <option value="">Choose a question</option>
                                             <option>What was your first pet's name?</option>
                                             <option>What city were you born in?</option>
                                             <option>What is your mother's maiden name?</option>
                                             <option>What was the name of your first school?</option>
                                         </select>
                                         <span class="help-block text-danger" style="display:none"
                                             id="passwordQuestion-err">
                                             Please select a security question
                                         </span>
                                     </div>
                                 </div>
                                 <div class="col-sm-6">
                                     <div class="form-group has-feedback">
                                         <label>Security Answer <span class="req">*</span></label>
                                         <input type="text" class="form-control" id="securityAnswerInput"
                                             placeholder="Write answer for the question" data-rule="required">
                                         <span class="glyphicon form-control-feedback" id="securityAnswer-icon"></span>
                                         <span class="help-block text-danger" style="display:none"
                                             id="securityAnswer-err">
                                             Please provide your security answer
                                         </span>
                                     </div>
                                 </div>
                             </div>

                             <div class="checkbox">
                                 <label>
                                     <input type="checkbox" id="termsInput">
                                     I accept the <a href="#" style="color:#057A96">terms and conditions</a>
                                 </label>
                                 <span class="help-block text-danger" style="display:none" id="terms-err">
                                     You must accept the terms and conditions
                                 </span>
                             </div>

                         </div>
                     </div><!-- /Contact Person Details -->

                 </form>
             </div><!-- /col-md-8 -->


             <!-- ══════════════════════════════════════════════
         RIGHT COLUMN — Order Summary
    ══════════════════════════════════════════════ -->
             <div class="col-md-4">
                 <div class="sidebar-sticky">
                     <div class="panel panel-default">

                         <div class="panel-heading" style="border-bottom:1px solid #ddd;">
                             <h4 style="color:#333; margin:0; font-size:15px; font-weight:600;">Order Summary</h4>
                         </div>

                         <div class="panel-body">

                             <hr style="margin:12px 0;">

                             <!-- ── Active Plan Box ── -->
                             <div class="plan-box">
                                 <div class="clearfix">

                                     <strong id="summaryPlanName" style="font-size:18px; color:#057A96;">
                                         {{ $planName }}

                                     </strong>

                                     <span class="pull-right plan-price">
                                         <span id="summarySymbol">{{ $currency }}</span>
                                         <span id="summaryUnitPrice">{{ $amount }}</span>
                                         <small class="text-muted" style="font-size:13px;">/month</small>
                                     </span>

                                 </div>

                                 <ul id="planFeatureList">

                                     <li> License: {{ $license }}</li>

                                     <li>Total Storage: {{ $storage }} GB</li>

                                     <li> Unlimited Workspaces</li>

                                     <li> Enterprise Security</li>

                                     <li> All Integrations</li>

                                     <li> Priority Support</li>

                                 </ul>
                             </div>

                             <!-- ── Price Breakdown ── -->
                             <div style="margin-top:14px;">



                                 <div class="summary-total">
                                     <span>Total</span>
                                     <span id="summaryTotal" style="color:#057A96;">
                                         {{ $currency }} {{ $amount }}
                                     </span>
                                 </div>
                             </div>

                             <!-- ── Promo / Coupon Code ── -->
                             <hr style="margin:14px 0;">
                             <label class="text-muted" style="font-size:13px; font-weight:500;">Promo code</label>
                             <div class="input-group">
                                 <input type="text" class="form-control" id="couponInput"
                                     placeholder="Enter code e.g. 1234">
                                 <span class="input-group-btn">
                                     <button class="btn btn-brand" type="button" id="applyPromoBtn">Apply</button>
                                 </span>
                             </div>
                             <div id="couponMsg" style="font-size:12px; margin-top:6px;"></div>

                             <hr style="margin:14px 0;">

                             <!-- ── Primary CTA ── -->
                             <button class="btn btn-brand btn-block" id="sideSubmitBtn" type="button">
                                 Save &amp; Verify
                             </button>


                         </div><!-- /panel-body -->
                     </div><!-- /panel -->
                 </div><!-- /sidebar-sticky -->
             </div><!-- /col-md-4 -->

         </div><!-- /row -->
     </div><!-- /container -->

     <div class="pay-modal-overlay" id="paymentModal">
         <div class="pay-modal-box">
             <button class="pay-modal-close" id="closePayModalBtn">&times;</button>

             <h4 class="pay-modal-title">💳 Secure Payment</h4>
             <p class="pay-modal-subtitle">Enter your card details to complete your order</p>

             <div class="pay-chip-strip">
                 <div class="pay-chip-icon"></div>
                 <div class="pay-chip-track">
                     <span class="pay-chip-dots">•••• •••• ••••</span>
                     <span class="pay-chip-brand">VISA</span>
                 </div>
             </div>

             <div class="form-group">
                 <label>Card Number <span class="req">*</span></label>
                 <input type="text" class="form-control pay-card-input" name="card_number" id="cardNumberInput"
                     placeholder="1234 5678 9012 3456" maxlength="19">
                 <span class="help-block text-danger" style="display:none" id="cardNumberErr">
                     Enter a valid 16-digit card number
                 </span>
             </div>

             <div class="row">
                 <div class="col-sm-6">
                     <div class="form-group">
                         <label>Expiry Date <span class="req">*</span></label>
                         <input type="text" class="form-control" name="card_expiry_date" id="cardExpiryInput"
                             placeholder="MM / YY" maxlength="7">
                         <span class="help-block text-danger" style="display:none" id="cardExpiryErr">
                             Enter valid expiry (MM/YY)
                         </span>
                     </div>
                 </div>
                 <div class="col-sm-6">
                     <div class="form-group">
                         <label>CVV <span class="req">*</span></label>
                         <input type="password" class="form-control" name="card_cvv" id="cardCvvInput"
                             placeholder="•••" maxlength="4">
                         <span class="help-block text-danger" style="display:none" id="cardCvvErr">
                             Enter 3 or 4-digit CVV
                         </span>
                     </div>
                 </div>
             </div>

             <div class="form-group">
                 <label>Cardholder Name <span class="req">*</span></label>
                 <input type="text" class="form-control" name="card_holder_name" id="cardNameInput"
                     placeholder="As printed on card">
                 <span class="help-block text-danger" style="display:none" id="cardNameErr">
                     Cardholder name is required
                 </span>
             </div>

             <span class="help-block text-danger" style="display:none;" id="payErrorBox">
                 Please fix the errors above before proceeding.
             </span>

             <div class="pay-amount-box">
                 <span class="text-muted" style="font-size:13px;">Amount to pay</span>
                 <strong id="modalTotalAmount" style="font-size:18px; color:#057A96;">—</strong>
             </div>

             <button class="btn btn-brand btn-block" id="confirmPayBtn" style="margin-top:14px;">
                 🔒 Confirm Payment
             </button>
         </div>
     </div>
     <input type="hidden" id="selectedPlanId" value="1">
     <input type="hidden" id="selectedQuantity" value="1">



     <!-- back to top area start -->
     <div class="back-to-top">
         <span class="back-top"><i class="fa fa-angle-up"></i></span>
     </div>
     <!-- back to top area end -->

     <script>
         const saveCompanyUrl = "{{ url('/save-company') }}";
         const savePaymentUrl = "{{ url('/save-payment') }}";
         const thankYouUrl = "{{ url('/thank-you') }}";
     </script>
     <script>
         document.addEventListener("DOMContentLoaded", function() {

             let price = {
                 {
                     $amount
                 }
             };
             let currency = "{{ $currency }}";

             document.getElementById("summarySubtotal").innerText =
                 currency + " " + price;

             document.getElementById("summaryTotal").innerText =
                 currency + " " + price;

             document.getElementById("modalTotalAmount").innerText =
                 currency + " " + price;

         });
     </script>
     @endsection