     @extends('layouts.backendsettings')
     @section('title', 'Payment')
     @section('content')
         <style>
             .pay-plan-tile.selected {
                 border: 2px solid #057a96;
                 background: #f0f9ff;
             }

             /* =========================================================
       FINAL BILLING PERIOD - SINGLE ROW
       ========================================================= */

             .os-toggle {
                 display: flex !important;
                 flex-direction: row !important;
                 flex-wrap: nowrap !important;
                 align-items: center !important;

                 width: 100% !important;
                 max-width: 100% !important;

                 gap: 12px !important;

                 box-sizing: border-box !important;
             }

             /* Checkbox hidden */
             .os-toggle__input {
                 position: absolute !important;
                 width: 1px !important;
                 height: 1px !important;
                 opacity: 0 !important;
             }

             /* Billing toggle */
             .os-toggle__track {
                 position: relative !important;

                 display: flex !important;
                 flex-direction: row !important;
                 align-items: center !important;

                 flex: 1 1 auto !important;
                 min-width: 0 !important;
                 width: auto !important;
                 max-width: none !important;

                 height: 48px !important;

                 padding: 4px !important;
                 margin: 0 !important;

                 box-sizing: border-box !important;

                 background: #e5e7eb !important;
                 border-radius: 9px !important;

                 overflow: hidden !important;
             }

             /* Monthly / Yearly */
             .os-toggle__pill {
                 position: relative !important;

                 flex: 1 1 50% !important;
                 min-width: 0 !important;
                 width: 50% !important;

                 height: 40px !important;

                 display: flex !important;
                 align-items: center !important;
                 justify-content: center !important;

                 gap: 4px !important;

                 padding: 0 5px !important;
                 margin: 0 !important;

                 box-sizing: border-box !important;

                 white-space: nowrap !important;

                 font-size: 14px !important;
                 font-weight: 600 !important;

                 line-height: 1 !important;

                 z-index: 3 !important;
             }

             /* Monthly / Yearly name */
             .billing-name {
                 display: inline !important;

                 color: #64748b !important;

                 font-size: 14px !important;
                 font-weight: 600 !important;

                 white-space: nowrap !important;
             }

             /* Discount */
             .os-mini-badge {
                 display: inline !important;

                 margin: 0 !important;
                 padding: 0 !important;

                 background: transparent !important;
                 border: 0 !important;

                 color: #006b57 !important;

                 font-size: 13px !important;
                 font-weight: 700 !important;

                 white-space: nowrap !important;
             }

             /* Selected Monthly / Yearly text */
             .os-toggle__pill.active .billing-name {
                 color: #ffffff !important;
             }

             /* Discount remains green */
             .os-toggle__pill.active .os-mini-badge {
                 color: #4aff24 !important;
             }

             /* Selected background */
             .os-toggle__thumb {
                 position: absolute !important;

                 top: 4px !important;
                 left: 4px !important;

                 width: calc(50% - 4px) !important;
                 height: 40px !important;

                 background: #07839b !important;
                 border-radius: 8px !important;

                 z-index: 2 !important;

                 transform: translateX(0) !important;

                 transition: transform 0.25s ease !important;

                 pointer-events: none !important;
             }

             /* Yearly selected */
             .os-toggle__track.yearly-selected .os-toggle__thumb {
                 transform: translateX(100%) !important;
             }

             /* =========================================================
       SAVE CHIP
       ========================================================= */

             .os-savings-chip {
                 display: inline-flex !important;
                 flex: 0 1 auto !important;

                 min-width: 0 !important;
                 max-width: 300px !important;

                 height: 48px !important;

                 align-items: center !important;
                 justify-content: center !important;

                 gap: 6px !important;

                 padding: 0 14px !important;
                 margin: 0 !important;

                 box-sizing: border-box !important;

                 background: #e4f5fb !important;
                 color: #007a9b !important;

                 border-radius: 8px !important;

                 font-size: 14px !important;
                 font-weight: 600 !important;

                 line-height: 1 !important;

                 white-space: nowrap !important;

                 overflow: hidden !important;
             }

             /* SVG */
             .os-savings-chip svg {
                 flex: 0 0 auto !important;
                 width: 13px !important;
                 height: 13px !important;
             }

             /* =========================================================
       ORDER SUMMARY WIDTH SAFETY
       ========================================================= */

             .os-toggle,
             .os-toggle__track,
             .os-savings-chip {
                 box-sizing: border-box !important;
             }

             /* Small screens */
             @media (max-width: 700px) {
                 .os-toggle {
                     gap: 8px !important;
                 }

                 .os-toggle__pill {
                     font-size: 12px !important;
                 }

                 .billing-name {
                     font-size: 12px !important;
                 }

                 .os-mini-badge {
                     font-size: 11px !important;
                 }

                 .os-savings-chip {
                     font-size: 12px !important;
                     padding: 0 10px !important;
                 }
             }
         </style>
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
                 <!--LEFT COLUMN — Registration Form -->
                 <div class="col-md-7" id="formCol">
                     <form>
                         <!-- company details-->
                         <div class="panel panel-default mb-4 pay-company-form hidden">
                             <div class="panel-heading">
                                 <h4>Company Details </h4>
                             </div>
                             <div class="panel-body">
                                 <div class="row mb-3">
                                     <div class="col-sm-6">
                                         <div class="form-group has-feedback">
                                             <label>Company Name <span class="req">*</span></label>
                                             <input type="text" class="form-control" id="companyNamePlan"
                                                 placeholder="XYZ Company" data-rule="required|minlen:2" />
                                             <span class="glyphicon form-control-feedback" id="companyNamePlan-icon"></span>
                                             <span class="help-block text-danger" style="display: none"
                                                 id="companyNamePlan-err">
                                                 Company name is required (min 2 chars)
                                             </span>
                                         </div>
                                     </div>
                                     <div class="col-sm-6">
                                         <div class="form-group">
                                             <label>Company Type</label>
                                             <div class="select-wrapper">
                                                 <select class="form-control" id="companyType">
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
                                                 <select class="form-control" id="industryType">
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
                                             <input type="text" class="form-control" id="address"
                                                 placeholder="123 Main Street" data-rule="required" />
                                             <span class="glyphicon form-control-feedback" id="address-icon"></span>
                                             <span class="help-block text-danger" style="display: none" id="address-err">
                                                 Address is required
                                             </span>
                                         </div>
                                     </div>
                                 </div>

                                 <div class="row mb-3">
                                     <div class="col-sm-6">
                                         <div class="form-group">
                                             <label>Company Number</label>
                                             <input type="text" class="form-control" id="companyNumber"
                                                 placeholder="98765XXXXX" maxlength="10" inputmode="numeric"
                                                 autocomplete="off" />
                                             <span class=" glyphicon form-control-feedback" id="companyNumber-icon"></span>
                                             <span class="help-block text-danger" style="display: none"
                                                 id="companyNumber-err">
                                                 Enter valid 10 digit mobile number
                                             </span>
                                         </div>
                                     </div>
                                     <div class="col-sm-6">
                                         <div class="form-group has-feedback">
                                             <label>Company Email Address</label>
                                             <input type="email" class="form-control" id="companyEmail"
                                                 placeholder="company@example.com" data-rule="email" />
                                             <span class="glyphicon form-control-feedback" id="companyEmail-icon"></span>
                                             <span class="help-block text-danger" style="display: none"
                                                 id="companyEmail-err">
                                                 Enter a valid email
                                             </span>
                                         </div>
                                     </div>
                                 </div>

                                 <div class="row mb-3">
                                     <div class="col-sm-6">
                                         <div class="form-group has-feedback">
                                             <label>Website</label>
                                             <input type="url" class="form-control" id="website"
                                                 placeholder="https://example.com" data-rule="url" />
                                             <span class="glyphicon form-control-feedback" id="website-icon"></span>
                                             <span class="help-block text-danger" style="display: none" id="website-err">
                                                 Enter a valid URL
                                             </span>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>

                         <!-- contact person -->
                         <div class="panel panel-default mb-4">
                             <div class="panel-heading">
                                 <h4>Contact Person Details </h4>
                             </div>
                             <div class="panel-body">
                                 <div class="row mb-3">
                                     <div class="col-sm-6">
                                         <div class="form-group has-feedback">
                                             <label>Contact Person <span class="req">*</span></label>
                                             <input type="text" class="form-control" id="contactPerson"
                                                 placeholder="Full name" data-rule="required|minlen:2" />
                                             <span class="glyphicon form-control-feedback" id="contactPerson-icon"></span>
                                             <span class="help-block text-danger" style="display: none"
                                                 id="contactPerson-err">
                                                 Contact person name is required
                                             </span>
                                         </div>
                                     </div>
                                     <div class="col-sm-6">
                                         <div class="form-group">
                                             <label>Designation / Role</label>
                                             <select class="form-control" id="designation">
                                                 <option>CEO</option>
                                                 <option>CTO</option>
                                                 <option>Director</option>
                                                 <option>Manager</option>
                                                 <option>Supervisor</option>
                                             </select>
                                         </div>
                                     </div>
                                 </div>

                                 <div class="row mb-3">
                                     <div class="col-sm-6">
                                         <div class="form-group has-feedback">
                                             <label>Phone Number <span class="req">*</span></label>
                                             <input type="tel" class="form-control" id="phone"
                                                 placeholder="98765XXXXX" maxlength="10" inputmode="numeric"
                                                 autocomplete="off" />
                                             <span class=" glyphicon form-control-feedback" id="phone-icon"></span>
                                             <span class="help-block text-danger" style="display: none" id="phone-err">
                                                 Enter valid 10 digit mobile number
                                             </span>
                                         </div>
                                     </div>
                                     <div class="col-sm-6">
                                         <div class="form-group has-feedback">
                                             <label>Email Address <span class="req">*</span></label>
                                             <input type="email" class="form-control" id="userEmail"
                                                 placeholder="name@gmail.com" maxlength="100" autocomplete="off" />
                                             <span class="glyphicon form-control-feedback" id="userEmail-icon"></span>
                                             <span class="help-block text-danger" style="display: none"
                                                 id="userEmail-err">
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
                                             <!-- Existing User Checkbox -->
                                             <div class="form-check existing-user-check-wrap mb-3">
                                                 <input class="form-check-input" type="checkbox" id="existingUserCheck">

                                                 <label class="form-check-label" for="existingUserCheck">
                                                     Are you existing user?
                                                 </label>
                                             </div>
                                             <input type="text" class="form-control" id="username"
                                                 placeholder="Choose a username" maxlength="30" autocomplete="off" />
                                             <span class=" glyphicon form-control-feedback" id="username-icon"></span>
                                             <span class="help-block text-danger" style="display: none"
                                                 id="username-err">
                                                 Username must contain letters, numbers, and underscores only
                                             </span>
                                         </div>
                                     </div>
                                 </div>


                                 <div class="row mb-3">
                                     <div class="col-sm-6">
                                         <div class="form-group">
                                             <label>Security Question <span class="req">*</span>
                                                 <small class="text-muted">(For account recovery)</small>
                                             </label>
                                             <select class="form-control" id="passwordQuestion" data-rule="required">
                                                 <option value="">Choose a question</option>
                                                 <option value="What was your first pet's name?">What was your first pet's
                                                     name?</option>
                                                 <option value="What city were you born in?">What city were you born in?
                                                 </option>
                                                 <option value="What is your mother's maiden name?">What is your mother's
                                                     maiden name?</option>
                                                 <option value="What was the name of your first school?">What was the name
                                                     of your first school?</option>
                                             </select>
                                             <span class="help-block text-danger" style="display: none"
                                                 id="passwordQuestion-err">
                                                 Please select a security question
                                             </span>
                                         </div>
                                     </div>
                                     <div class="col-sm-6">
                                         <div class="form-group has-feedback">
                                             <label>Security Answer <span class="req">*</span></label>
                                             <input type="text" class="form-control" id="securityAnswer"
                                                 placeholder="Write answer for the question" data-rule="required" />
                                             <span class="glyphicon form-control-feedback"
                                                 id="securityAnswer-icon"></span>
                                             <span class="help-block text-danger" style="display: none"
                                                 id="securityAnswer-err">
                                                 Please provide your security answer
                                             </span>
                                         </div>
                                     </div>
                                 </div>

                                 <div class="checkbox">
                                     <label>
                                         <input type="checkbox" id="terms" />
                                         I accept the
                                         <a href="{{ url('terms-condition') }}" style="color: #057a96">terms and
                                             conditions</a>
                                     </label>
                                     <span class="help-block text-danger" style="display: none" id="terms-err">
                                         You must accept the terms and conditions
                                     </span>
                                 </div>
                             </div>
                         </div>
                     </form>
                 </div>

                 <!-- RIGHT COLUMN — Order Summary -->
                 <div class="col-md-5">
                     <div class="sidebar-sticky">
                         <div class="order-summary-card">

                             <!-- Header -->
                             <div class="os-header">
                                 <h4 class="os-title">Order Summary</h4>
                                 <p class="os-subtitle">Review your selected plan before proceeding.</p>
                             </div>

                             <!-- Billing Period -->
                             <div id="payBillingControls" class="os-section">
                                 @php
                                     $singlePlan = collect($planLists)->firstWhere('is_single_user', 1);
                                     $selectedPlanType = request('plan_type', 'single');
                                 @endphp

                                 <div class="">
                                     <p class="os-label os-label--inline">Billing Period</p>

                                     <label class="os-toggle" for="payBillingToggle">

                                         <input type="checkbox" id="payBillingToggle" class="os-toggle__input">

                                         <span class="os-toggle__track" id="payToggleTrack">

                                             <span id="payBillingMonthLabel"
                                                 class="os-toggle__pill os-toggle__pill--left active">
                                                 <span class="billing-name">Monthly</span>
                                                 <span id="monthlyDiscountBadge" class="os-mini-badge"></span>
                                             </span>

                                             <span id="payBillingYearLabel"
                                                 class="os-toggle__pill os-toggle__pill--right">
                                                 <span class="billing-name">Yearly</span>
                                                 <span id="yearlyDiscountBadge" class="os-mini-badge"></span>
                                             </span>

                                             <span class="os-toggle__thumb" id="payToggleThumb"></span>

                                         </span>

                                         <span class="os-savings-chip ten-percent-savings">

                                             <svg width="13" height="13" viewBox="0 0 24 24" fill="none"
                                                 stroke="currentColor" stroke-width="2.2" stroke-linecap="round"
                                                 stroke-linejoin="round">
                                                 <path d="M20.59 13.41 11 22.99 1 13V3h10l9.59 9.41a2 2 0 0 1 0 2.82Z" />
                                                 <circle cx="7.5" cy="7.5" r="1.5" fill="currentColor"
                                                     stroke="none" />
                                             </svg>

                                             Save 10% with Yearly Billing

                                         </span>

                                     </label>
                                 </div>
                             </div>

                             <!-- Change Plan -->
                             <div class="pay-plan-selector os-section">
                                 <p class="pay-plan-selector__label os-label">Change Plan</p>

                                 <div class="pay-plan-selector__grid" id="planOptions">
                                     @foreach ($planLists as $plan)
                                         @php
                                             $icons = ['cloud', 'monitor', 'box', 'shield'];
                                             $iconKey = $icons[$loop->index % count($icons)];
                                             $minimumLicenses =
                                                 $plan->minimum_licenses ??
                                                 match ($plan->plans_name) {
                                                     'Basic' => 2,
                                                     'Standard' => 10,
                                                     'Advanced' => 50,
                                                     'Premium' => 100,
                                                     default => (int) ($plan->default_qty ??
                                                         ($plan->plans_license ?? 1)),
                                                 };
                                             $defaultLicenses = max(
                                                 (int) ($plan->default_qty ?? $minimumLicenses),
                                                 (int) $minimumLicenses,
                                             );
                                         @endphp
                                         <div class="pay-plan-tile selected-plan-option {{ $loop->first ? 'selected' : '' }} payment-tab-{{ $plan->id }}"
                                             data-plan-type="{{ $selectedPlanType }}"
                                             data-apply-discount="{{ $plan->is_team_discount_apply == 1 }}"
                                             data-team-allowed="{{ $plan->is_team_allowed == 1 }}"
                                             data-plan-id="{{ $plan->id }}" data-name="{{ $plan->plans_name }}"
                                             data-subscription="{{ $plan->plans_subscription_type }}"
                                             data-license="{{ $plan->plans_license }}"
                                             data-storage="{{ $plan->plans_users }}"
                                             data-storage-unit="{{ $plan->storage_unit }}"
                                             data-monthly-price="{{ $plan->final_monthly_price }}"
                                             data-yearly-price="{{ $plan->final_yearly_price }}"
                                             data-original-monthly="{{ $plan->original_monthly_price }}"
                                             data-original-yearly="{{ $plan->original_yearly_price }}"
                                             data-monthly-discount="{{ $plan->monthly_discount ?? 0 }}"
                                             data-yearly-discount="{{ $plan->yearly_discount ?? 0 }}"
                                             data-singleuser-monthly-discount="{{ $plan->single_user_monthly_discount ?? 0 }}"
                                             data-singleuser-yearly-discount="{{ $plan->single_user_yearly_discount ?? 0 }}"
                                             data-extra-monthly-discount="{{ $plan->additional_disc_month ?? 0 }}"
                                             data-extra-yearly-discount="{{ $selectedPlanType === 'single' ? $plan->single_user_yearly_discount ?? 0 : $plan->yearly_extra_disc ?? 0 }}"
                                             data-extra-mo-discount="{{ $plan->monthly_extra_disc ?? 0 }}"
                                             data-extra-yr-discount="{{ $plan->yearly_extra_disc ?? 0 }}"
                                             data-singleuser-extra-mo-discount="{{ $plan->single_user_monthly_extra_disc ?? 0 }}"
                                             data-singleuser-extra-yr-discount="{{ $plan->single_user_yearly_discount ?? 0 }}"
                                             data-def-qty="{{ $defaultLicenses }}"
                                             data-symbol="{{ $plan->currency_symbol ?? '' }}">

                                             <span class="pay-plan-tile__check">
                                                 <svg width="10" height="10" viewBox="0 0 24 24" fill="none"
                                                     stroke="#fff" stroke-width="3" stroke-linecap="round"
                                                     stroke-linejoin="round">
                                                     <polyline points="20 6 9 17 4 12" />
                                                 </svg>
                                             </span>

                                             <span class="pay-plan-tile__icon">
                                                 @switch($iconKey)
                                                     @case('cloud')
                                                         <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                                             stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                             stroke-linejoin="round">
                                                             <path d="M17.5 19H9a7 7 0 1 1 6.71-9h.79a4.5 4.5 0 1 1 0 9Z" />
                                                         </svg>
                                                     @break

                                                     @case('monitor')
                                                         <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                                             stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                             stroke-linejoin="round">
                                                             <rect x="2" y="3" width="20" height="14" rx="2" />
                                                             <line x1="8" y1="21" x2="16"
                                                                 y2="21" />
                                                             <line x1="12" y1="17" x2="12"
                                                                 y2="21" />
                                                         </svg>
                                                     @break

                                                     @case('box')
                                                         <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                                             stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                             stroke-linejoin="round">
                                                             <path d="m21 8-9-5-9 5 9 5 9-5Z" />
                                                             <path d="M3 8v8l9 5 9-5V8" />
                                                             <path d="M12 13v8" />
                                                         </svg>
                                                     @break

                                                     @default
                                                         <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                                             stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                             stroke-linejoin="round">
                                                             <path
                                                                 d="M12 2 4 5v6c0 5.25 3.4 9.74 8 11 4.6-1.26 8-5.75 8-11V5l-8-3Z" />
                                                             <polyline points="9 12 11 14 15 10" />
                                                         </svg>
                                                 @endswitch
                                             </span>

                                             <span class="pay-plan-tile__name">{{ $plan->plans_name }}</span>

                                             <span class="pay-plan-tile__price plan_price_details hidden"></span>
                                             <span class="pay-plan-tile__price view_plan_price_details">
                                                 {{ $plan->currency_symbol }}{{ $plan->active_price }}<small
                                                     class="plan-period">{{ request('billing_type') === 'yearly' ? '/year' : '/month' }}</small>
                                             </span>
                                         </div>
                                     @endforeach
                                 </div>
                             </div>

                             <!-- Users -->
                             <!-- Users -->
                             <div id="payQtyControls" class="os-section os-qty-box">
                                 <div class="os-qty-row">
                                     <div class="os-qty-info">
                                         <span class="os-qty-label" id="payQtyLabel">Users</span>
                                         <span class="os-qty-sublabel">Select the number of user licenses</span>
                                     </div>
                                     <div class="os-qty-controls-wrap">
                                         <div id="payQtyBox" class="os-qty-stepper">
                                             <button id="payQtyMinus" type="button" class="os-qty-btn">−</button>
                                             <input type="number" id="payQtyInput" value="1" min="1"
                                                 class="os-qty-input">
                                             <button id="payQtyPlus" type="button" class="os-qty-btn">+</button>
                                         </div>
                                         <span class="os-qty-price-hint" id="payQtyPriceHint"></span>
                                     </div>
                                 </div>
                             </div>

                             <!-- Plan Detail -->
                             <div class="plan-box">
                                 <div class="plan-box__icon" id="summaryPlanIcon">
                                     <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                         stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round">
                                         <path d="M12 2 4 5v6c0 5.25 3.4 9.74 8 11 4.6-1.26 8-5.75 8-11V5l-8-3Z" />
                                     </svg>
                                 </div>
                                 <div class="plan-box__body">
                                     <div class="plan-box__top">
                                         <strong id="summaryPlanName">—</strong>
                                         <span class="plan-box__price">
                                             <span id="summarySymbol"></span><span id="summaryUnitPrice">—</span>
                                             <small
                                                 class="plan-period">{{ request('billing_type') === 'yearly' ? '/year' : '/month' }}</small>
                                         </span>
                                     </div>
                                     <ul id="planFeatureList" class="plan-box__features">
                                         <li>Loading…</li>
                                     </ul>
                                 </div>
                             </div>

                             <!-- Totals -->
                             <div class="sm-qty-box">
                                 <div class="summary-row">
                                     <span>Original Price</span>
                                     <span id="summaryOrgTotal">—</span>
                                 </div>

                                 <div class="summary-row hidden" id="discountRow">
                                     <span></span>
                                     <span id="discountAmt" class="os-discount-amt">—</span>
                                 </div>

                                 <div class="summary-row hidden" id="extradiscountRow">
                                     <span></span>
                                     <span id="extradiscountAmt" class="os-discount-amt">—</span>
                                 </div>

                                 <div class="os-totals">
                                     <div class="summary-row hidden" id="promoDiscountRow">
                                         <span>Promo Code</span>
                                         <span id="promoDiscountAmt" class="os-discount-amt">—</span>
                                     </div>

                                     <div class="summary-row">
                                         <span id="summarySubtotalLabel">You Save</span>
                                         <span id="summarySubtotal">—</span>
                                     </div>

                                     <div class="summary-row hidden">
                                         <span>Estimated tax</span>
                                         <span id="summaryTax">0</span>
                                     </div>

                                     <div class="os-total-divider"></div>

                                     <div class="summary-total">
                                         <span>Final Amount</span>
                                         <span id="summaryTotal">—</span>
                                     </div>
                                 </div>
                             </div>

                             <!-- Savings Notice -->
                             <div id="paySavingsNotice" class="os-savings-notice"></div>

                             <!-- Promo Code -->
                             <label class="os-label" for="couponInput">Promo code</label>
                             <div class="os-promo-row">
                                 <input type="text" class="os-promo-input" id="couponInput" placeholder="1234" />
                                 <button class="os-promo-btn" type="button" id="applyPromoBtn">Apply</button>
                             </div>
                             <div id="couponMsg" class="os-coupon-msg"></div>

                             <button id="removeCouponBtn" class="os-remove-coupon" style="display:none;">
                                 Remove Promo Code
                             </button>

                             <!-- Submit -->
                             <button class="os-submit-btn" id="sideSubmitBtnForTeam" type="button">
                                 Save &amp; Verify
                             </button>

                             <p class="os-footnote">
                                 <svg width="11" height="11" viewBox="0 0 24 24" fill="none"
                                     stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round">
                                     <rect x="3" y="11" width="18" height="10" rx="2" />
                                     <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                                 </svg>
                                 Your payment details are secure and encrypted.
                             </p>

                         </div>
                     </div>
                 </div>


             </div>
         </div>

         <!-- ============================================================
             CARD PAYMENT MODAL
             Shown after "Verify and Checkout" click
             ============================================================ -->
         <div class="pay-modal-overlay hidden" id="paymentModalForTeam">
             <div class="pay-modal-box">
                 <button class="pay-modal-close" id="closePayModal">&times;</button>

                 <h4 class="pay-modal-title">💳 Secure Payment</h4>
                 <p class="pay-modal-subtitle">
                     Enter your card details to complete your order
                 </p>

                 <!-- Decorative card chip strip -->
                 <div class="pay-chip-strip">
                     <div class="pay-chip-icon"></div>
                     <div class="pay-chip-track">
                         <span class="pay-chip-dots">•••• •••• ••••</span>
                         <span class="pay-chip-brand">VISA</span>
                     </div>
                 </div>

                 <div class="form-group">
                     <label>Card Number <span class="req">*</span></label>
                     <input type="text" class="form-control pay-card-input" id="cardNumber"
                         placeholder="1234 5678 9012 3456" maxlength="19" />
                     <span class="help-block text-danger" style="display: none" id="cardNumber-err">
                         Enter a valid 16-digit card number
                     </span>
                 </div>

                 <div class="row">
                     <div class="col-sm-6">
                         <div class="form-group">
                             <label>Expiry Date <span class="req">*</span></label>
                             <input type="text" class="form-control" id="cardExpiry" placeholder="MM / YY"
                                 maxlength="7" />
                             <span class="help-block text-danger" style="display: none" id="cardExpiry-err">
                                 Enter valid expiry (MM/YY)
                             </span>
                         </div>
                     </div>
                     <div class="col-sm-6">
                         <div class="form-group">
                             <label>CVV <span class="req">*</span></label>
                             <input type="password" class="form-control" id="cardCvv" placeholder="•••"
                                 maxlength="4" />
                             <span class="help-block text-danger" style="display: none" id="cardCvv-err">
                                 Enter 3 or 4-digit CVV
                             </span>
                         </div>
                     </div>
                 </div>

                 <div class="form-group">
                     <label>Cardholder Name <span class="req">*</span></label>
                     <input type="text" class="form-control" id="cardName" placeholder="As printed on card" />
                     <span class="help-block text-danger" style="display: none" id="cardName-err">
                         Cardholder name is required
                     </span>
                 </div>

                 <span class="help-block text-danger" style="display: none" id="payError">
                     Please fix the errors above before proceeding.
                 </span>

                 <!-- Amount reminder -->
                 <div class="pay-amount-box">
                     <span class="text-muted" style="font-size: 13px">Amount to pay</span>
                     <strong id="modalTotal" style="font-size: 18px; color: #057a96">—</strong>
                 </div>

                 <button class="btn btn-brand btn-block" id="confirmPayBtn" style="margin-top: 14px">
                     🔒 Confirm Payment
                 </button>
             </div>
         </div>


         <!-- Existing User Modal -->
         <div id="existingUserModal" class="existing-user-modal" aria-hidden="true">
             <div class="existing-user-dialog" role="dialog" aria-modal="true" aria-labelledby="existingUserTitle">
                 <button class="existing-user-close" type="button" data-close-modal aria-label="Close">&times;</button>

                 <h4 id="existingUserTitle">Continue From Marketplace</h4>

                 <p>
                     Existing customers can add or renew subscriptions from the marketplace inside their Pocket Office account.
                 </p>

                 <div class="existing-user-actions">
                     <button class="existing-user-btn existing-user-btn--secondary" type="button" data-close-modal>
                         Cancel
                     </button>

                     <button class="existing-user-btn existing-user-btn--primary" type="button" id="redirectPricingBtn">
                         Continue
                     </button>
                 </div>
             </div>
         </div>
     @endsection
     @section('scripts')
         @vite(['resources/js/payment.js'])
     @endsection
