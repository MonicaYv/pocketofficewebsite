     @extends('layouts.backendsettings')
     @section('title', 'Payment')
     @section('content')
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
                                                 placeholder="98765XXXXX" maxlength="15" inputmode="numeric"
                                                 autocomplete="off" />
                                             <span class=" glyphicon form-control-feedback" id="companyNumber-icon"></span>
                                             <span class="help-block text-danger" style="display: none"
                                                 id="companyNumber-err">
                                                 Enter valid 10-15 digit mobile number
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
                                                 placeholder="98765XXXXX" maxlength="15" inputmode="numeric"
                                                 autocomplete="off" />
                                             <span class=" glyphicon form-control-feedback" id="phone-icon"></span>
                                             <span class="help-block text-danger" style="display: none" id="phone-err">
                                                 Enter valid 10-15 digit mobile number
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
                                 <h4 class="os-title">Review & Choose Plan</h4>
                                 <p class="os-subtitle">Select a plan that fits your team's needs. You can switch plans anytime.</p>
                             </div>

                             <!-- Billing Period -->
                             <div id="payBillingControls" class="os-section">
                                 @php
                                     $singlePlan = collect($planLists)->firstWhere('is_single_user', 1);
                                     $selectedPlanType = request('plan_type', 'single');
                                 @endphp

                                 <div class="">
                                     <!-- <p class="os-label os-label--inline">Billing Period</p> -->

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

                                         <!-- <span class="os-savings-chip ten-percent-savings">

                                             <svg width="13" height="13" viewBox="0 0 24 24" fill="none"
                                                 stroke="currentColor" stroke-width="2.2" stroke-linecap="round"
                                                 stroke-linejoin="round">
                                                 <path d="M20.59 13.41 11 22.99 1 13V3h10l9.59 9.41a2 2 0 0 1 0 2.82Z" />
                                                 <circle cx="7.5" cy="7.5" r="1.5" fill="currentColor"
                                                     stroke="none" />
                                             </svg>

                                             Save 10% with Yearly Billing

                                         </span> -->

                                     </label>
                                 </div>
                             </div>

                              <!-- Change Plan -->
                              @php
                                  $currencyCode = request('currency_code') ?? 'USD';
                                  $currencyData = \App\Models\CurrencyRate::where('currency_code', $currencyCode)->first();
                                  $rate = $currencyData ? round($currencyData->actual_amount) : 15;
                                  $currSymbol = $currencyData->currency_symbol ?? '$';
                                  $curBillingType = request('billing_type') ?? ($billing_type ?? 'monthly');

                                  $allDbPlans = \App\Models\UsersLicensePlan::where('pof_plan_status', 1)->get()->keyBy('id');
                                  $allFivePlans = [];

                                  // 1. Personal (Single User, based on Plan ID 1)
                                  if (isset($allDbPlans[1])) {
                                      $raw = $allDbPlans[1];
                                      $p = clone $raw;
                                      $base = $rate * 1;
                                      $monthly = $base;
                                      $yearly = $base * 12;

                                      $p->original_monthly_price = $monthly;
                                      $p->original_yearly_price = $yearly;

                                      $monthlyTotalDisc = ($p->single_user_monthly_discount ?? 0) + ($p->single_user_monthly_extra_disc ?? 0);
                                      $singleYearlyDiscount = $p->single_user_yearly_discount ?? 0;
                                      $yearlyTotalDisc = ($p->single_user_yearly_discount ?? 0) + $singleYearlyDiscount;

                                      $p->final_monthly_price = $monthly * (1 - $monthlyTotalDisc / 100);
                                      $p->final_yearly_price = $yearly * (1 - $yearlyTotalDisc / 100);
                                      $p->active_price = ($curBillingType === 'yearly') ? round($p->final_yearly_price) : round($p->final_monthly_price);
                                      $p->currency_symbol = $currSymbol;

                                      $p->ui_name = 'Personal';
                                      $p->ui_plan_type = 'single';
                                      $p->ui_default_qty = 1;
                                      $p->ui_license = 1;
                                      $p->ui_extra_yr_discount = $p->single_user_yearly_discount ?? 0;
                                      $p->ui_extra_monthly_discount = 0;
                                      $p->ui_monthly_discount = $p->single_user_monthly_discount ?? 0;
                                      $p->ui_yearly_discount = $p->single_user_yearly_discount ?? 0;
                                      $allFivePlans[] = $p;
                                  }

                                  // 2. Team Plans: Basic (1), Standard (2), Advanced (3), Premium (13)
                                  $teamSpecs = [
                                      1 => ['name' => 'Basic', 'def_qty' => 2],
                                      2 => ['name' => 'Standard', 'def_qty' => 10],
                                      3 => ['name' => 'Advanced', 'def_qty' => 50],
                                      13 => ['name' => 'Premium', 'def_qty' => 100],
                                  ];

                                  foreach ($teamSpecs as $id => $spec) {
                                      if (isset($allDbPlans[$id])) {
                                          $raw = $allDbPlans[$id];
                                          $p = clone $raw;
                                          $base = $rate * ($p->plans_license ?? 1);
                                          $monthly = $base;
                                          $yearly = $base * 12;

                                          $p->original_monthly_price = $monthly;
                                          $p->original_yearly_price = $yearly;

                                          $monthlyDiscount = ($p->is_team_discount_apply == 1) ? ($p->monthly_discount ?? 0) : 0;
                                          $yearlyDiscount = ($p->is_team_discount_apply == 1) ? ($p->yearly_discount ?? 0) : 0;
                                          $monthlyExtraDiscount = ($p->is_team_extraM_discount_apply == 1) ? ($p->monthly_extra_disc ?? 0) : 0;
                                          $yearlyExtraDiscount = ($p->is_team_extraY_discount_apply == 1) ? ($p->yearly_extra_disc ?? 0) : 0;

                                          $p->monthly_discount = $monthlyDiscount;
                                          $p->yearly_discount = $yearlyDiscount;
                                          $p->monthly_extra_disc = $monthlyExtraDiscount;
                                          $p->yearly_extra_disc = $yearlyExtraDiscount;

                                          $monthlyTotalDisc = $monthlyDiscount + $monthlyExtraDiscount;
                                          $yearlyTotalDisc = $yearlyDiscount + $yearlyExtraDiscount;

                                          $p->final_monthly_price = $monthly * (1 - $monthlyTotalDisc / 100);
                                          $p->final_yearly_price = $yearly * (1 - $yearlyTotalDisc / 100);
                                          $p->active_price = ($curBillingType === 'yearly') ? round($p->final_yearly_price) : round($p->final_monthly_price);
                                          $p->currency_symbol = $currSymbol;

                                          $p->ui_name = $spec['name'];
                                          $p->ui_plan_type = 'team';
                                          $p->ui_default_qty = $spec['def_qty'];
                                          $p->ui_license = $p->plans_license ?? 1;
                                          $p->ui_extra_yr_discount = $p->yearly_extra_disc ?? 0;
                                          $p->ui_extra_monthly_discount = $p->additional_disc_month ?? 0;
                                          $p->ui_monthly_discount = $monthlyDiscount;
                                          $p->ui_yearly_discount = $yearlyDiscount;
                                          $allFivePlans[] = $p;
                                      }
                                  }
                              @endphp

                              <div class="pay-plan-selector os-section">
                                  <!-- <p class="pay-plan-selector__label os-label">Change Plan</p> -->

                                  <div class="pay-plan-scroll-wrapper" id="planOptions">
                                      <button type="button" class="pay-plan-scroll-btn" id="planScrollLeft" aria-label="Previous plans">
                                          <svg viewBox="0 0 24 24">
                                              <polyline points="15 18 9 12 15 6"></polyline>
                                          </svg>
                                      </button>

                                      <div class="pay-plan-scroll-track" id="planScrollTrack">
                                          @foreach ($allFivePlans as $plan)
                                              @php
                                                  $isInitSelected = ($selectedPlanType === 'single')
                                                      ? ($plan->ui_plan_type === 'single')
                                                      : ($plan->ui_plan_type === 'team' && $loop->iteration === 2);
                                              @endphp
                                              <div class="pay-plan-tile selected-plan-option pay-plan-scroll-pill {{ $isInitSelected ? 'selected' : '' }} payment-tab-{{ $plan->id }} payment-tab-{{ $plan->ui_plan_type }}-{{ $plan->id }}"
                                                  data-plan-type="{{ $plan->ui_plan_type }}"
                                                  data-apply-discount="{{ $plan->is_team_discount_apply == 1 }}"
                                                  data-team-allowed="{{ $plan->is_team_allowed == 1 }}"
                                                  data-plan-id="{{ $plan->id }}"
                                                  data-name="{{ $plan->ui_name }}"
                                                  data-subscription="{{ $plan->plans_subscription_type }}"
                                                  data-license="{{ $plan->ui_license }}"
                                                  data-storage="{{ $plan->plans_users }}"
                                                  data-storage-unit="{{ $plan->storage_unit }}"
                                                  data-monthly-price="{{ $plan->final_monthly_price }}"
                                                  data-yearly-price="{{ $plan->final_yearly_price }}"
                                                  data-pricemonth="{{ $plan->final_monthly_price }}"
                                                  data-original-monthly="{{ $plan->original_monthly_price }}"
                                                  data-original-yearly="{{ $plan->original_yearly_price }}"
                                                  data-monthly-discount="{{ $plan->ui_monthly_discount }}"
                                                  data-yearly-discount="{{ $plan->ui_yearly_discount }}"
                                                  data-singleuser-monthly-discount="{{ $plan->single_user_monthly_discount ?? 0 }}"
                                                  data-singleuser-yearly-discount="{{ $plan->single_user_yearly_discount ?? 0 }}"
                                                  data-extra-monthly-discount="{{ $plan->ui_extra_monthly_discount }}"
                                                  data-extra-yearly-discount="{{ $plan->ui_extra_yr_discount }}"
                                                  data-extra-mo-discount="{{ $plan->monthly_extra_disc ?? 0 }}"
                                                  data-extra-yr-discount="{{ $plan->yearly_extra_disc ?? 0 }}"
                                                  data-singleuser-extra-mo-discount="{{ $plan->single_user_monthly_extra_disc ?? 0 }}"
                                                  data-singleuser-extra-yr-discount="{{ $plan->single_user_yearly_discount ?? 0 }}"
                                                  data-def-qty="{{ $plan->ui_default_qty }}"
                                                  data-symbol="{{ $plan->currency_symbol ?? '' }}"
                                                  data-features="{{ json_encode(json_decode($plan->features) ?? []) }}"
                                                  data-unit-rate="{{ $rate }}"
                                                  data-desc="{{ $plan->plans_content ?? '' }}">

                                                  <span class="pay-plan-tile__name">{{ $plan->ui_name }}</span>
                                                  <span class="view_plan_price_details hidden" style="display: none !important;"></span>
                                              </div>
                                          @endforeach
                                      </div>

                                      <button type="button" class="pay-plan-scroll-btn" id="planScrollRight" aria-label="Next plans">
                                          <svg viewBox="0 0 24 24">
                                              <polyline points="9 18 15 12 9 6"></polyline>
                                          </svg>
                                      </button>
                                  </div>
                              </div>

                              <!-- Plan Checkout Card (Exact UI Matching Screenshot) -->
                              <div class="po-checkout-card">
                                  <!-- Plan Header -->
                                  <div class="po-plan-header">
                                      <div class="po-plan-icon" id="summaryPlanIcon">
                                          <svg viewBox="0 0 24 24" fill="none">
                                              <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                              <path d="m9 12 2 2 4-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                          </svg>
                                      </div>
                                      <div class="po-plan-header-info">
                                          <h3 class="po-plan-name" id="summaryPlanName">Premium</h3>
                                          <p class="po-plan-desc" id="summaryPlanDesc">Built for large organizations with advanced control and flexibility.</p>
                                      </div>
                                  </div>

                                  <!-- Unit Price Headline -->
                                  <div class="po-unit-price-row">
                                      <span class="po-price-val"><span id="poSymbol">{{ $currSymbol }}</span><span id="poUnitPrice">999</span></span>
                                      <span class="po-price-period">/ user / month</span>
                                  </div>

                                  <!-- License Count -->
                                  <div class="po-license-section" id="payQtyControls">
                                      <label class="po-section-subheading" for="payQtyInput">License Count</label>
                                      <div class="po-stepper-wrap">
                                          <button type="button" class="po-stepper-btn" id="payQtyMinus">−</button>
                                          <input type="number" id="payQtyInput" class="po-stepper-input" value="100" min="1" />
                                          <button type="button" class="po-stepper-btn" id="payQtyPlus">+</button>
                                      </div>
                                      <p class="po-license-hint" id="payQtyHint">
                                          Note: Minimum of <span id="poMinQtyText">100</span> licenses must be selected.
                                      </p>
                                  </div>

                                  <!-- Price Summary -->
                                  <div class="po-price-summary">
                                      <h4 class="po-summary-title">Price Summary</h4>
                                      
                                      <div class="po-summary-row">
                                          <span class="po-summary-label">Base User / Month</span>
                                          <span class="po-summary-val" id="poSumBaseUser">{{ $currSymbol }}999</span>
                                      </div>
                                      
                                      <div class="po-summary-row">
                                          <span class="po-summary-label">Users</span>
                                          <span class="po-summary-val" id="poSumUsers">100</span>
                                      </div>

                                      <div class="po-divider"></div>

                                      <div class="po-summary-row">
                                          <span class="po-summary-label">Base Total</span>
                                          <span class="po-summary-val" id="summaryOrgTotal">—</span>
                                      </div>

                                      <div class="po-summary-row" id="poRowPlanDiscount">
                                          <span class="po-summary-label">Plan Discount</span>
                                          <span class="po-summary-val text-success" id="poPlanDiscountVal">15%</span>
                                      </div>

                                      <div class="po-summary-row" id="poRowAnnualDiscount">
                                          <span class="po-summary-label">Annual Billing Discount</span>
                                          <span class="po-summary-val text-success" id="poAnnualDiscountVal">10%</span>
                                      </div>

                                      <div class="po-summary-row" id="poRowPromoDiscount">
                                          <span class="po-summary-label">Promo Code Discount</span>
                                          <span class="po-summary-val text-success" id="poPromoDiscountVal">5%</span>
                                      </div>

                                      <div class="po-summary-row po-summary-row--bold">
                                          <span class="po-summary-label font-weight-bold">Total Discount</span>
                                          <span class="po-summary-val text-success font-weight-bold" id="poTotalDiscountVal">30%</span>
                                      </div>
                                  </div>

                                  <!-- Cyan Highlight Box -->
                                  <div class="po-total-card">
                                      <div class="po-total-period-label" id="poTotalPeriodLabel">(Total Per Year)</div>
                                      <div class="po-total-amount" id="summaryTotal">—</div>
                                      <div class="po-total-dashed-divider"></div>
                                      <div class="po-total-save-row">
                                          <div class="po-save-tag">
                                              <svg width="15" height="15" viewBox="0 0 24 24" fill="#00a0b8" stroke="none">
                                                  <path d="M21.41 11.58l-9-9C12.05 2.22 11.55 2 11 2H4c-1.1 0-2 .9-2 2v7c0 .55.22 1.05.59 1.42l9 9c.36.36.86.58 1.41.58.55 0 1.05-.22 1.41-.59l7-7c.37-.36.59-.86.59-1.41 0-.55-.23-1.06-.59-1.42zM5.5 7C4.67 7 4 6.33 4 5.5S4.67 4 5.5 4 7 4.67 7 5.5 6.33 7 5.5 7z"/>
                                              </svg>
                                              <span id="summarySubtotalLabel">You Save</span>
                                          </div>
                                          <div class="po-save-val" id="summarySubtotal">—</div>
                                      </div>
                                  </div>

                                  <!-- Celebration / Savings Banner -->
                                  <div class="po-savings-banner" id="poSavingsBanner">
                                      <span class="po-party-icon">🎉</span>
                                      <span class="po-savings-text" id="poSavingsBannerText">
                                          15% Premium Team Discount + 10% Annual Billing Discount + 5% Promo Code Discount Total Savings 30%
                                      </span>
                                  </div>

                                  <!-- Promo Code Section -->
                                  <div class="po-promo-section">
                                      <label class="po-section-subheading" for="couponInput">Promo code</label>
                                      <div class="po-promo-input-group">
                                          <input type="text" class="po-promo-input" id="couponInput" value="SAVE10" placeholder="SAVE10" />
                                          <button type="button" class="po-promo-btn" id="applyPromoBtn">Apply</button>
                                      </div>
                                      <div class="po-promo-success-msg" id="poPromoSuccessMsg">
                                          <svg width="14" height="14" viewBox="0 0 24 24" fill="#16a34a">
                                              <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                          </svg>
                                          <span>Promo code applied successfully!</span>
                                      </div>
                                  </div>

                                  <!-- Continue CTA Button -->
                                  <button type="button" class="po-continue-btn" id="sideSubmitBtnForTeam">
                                      <span>Continue with</span> <span id="poContinuePlanName">Premium</span>
                                  </button>

                                  <!-- Security Note -->
                                  <p class="po-security-note">
                                      <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                          <rect x="3" y="11" width="18" height="10" rx="2"/>
                                          <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                                      </svg>
                                      Your payment details are secure and encrypted.
                                  </p>

                                  <!-- Hidden compatibility elements for payment.js -->
                                  <div style="display:none !important;" aria-hidden="true">
                                      <span id="summarySymbol"></span>
                                      <span id="summaryUnitPrice"></span>
                                      <span id="summaryTax">0</span>
                                      <div id="discountRow"></div>
                                      <div id="discountAmt"></div>
                                      <div id="extradiscountRow"></div>
                                      <div id="extradiscountAmt"></div>
                                      <div id="promoDiscountRow"></div>
                                      <div id="promoDiscountAmt"></div>
                                      <div id="paySavingsNotice"></div>
                                      <ul id="planFeatureList"></ul>
                                      <div id="couponMsg"></div>
                                      <button id="removeCouponBtn"></button>
                                      <span id="payQtyPriceHint"></span>
                                  </div>
                              </div>

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
          <script>
              document.addEventListener('DOMContentLoaded', function () {
                  // Ensure plan selector is visible
                  const planSelector = document.querySelector('.pay-plan-selector');
                  if (planSelector) {
                      planSelector.classList.remove('hidden');
                      planSelector.style.display = 'block';
                  }

                  // Ensure all 5 pills remain displayed
                  document.querySelectorAll('.pay-plan-scroll-pill').forEach(function (pill) {
                      pill.style.display = 'inline-flex';
                  });

                  const track = document.getElementById('planScrollTrack');
                  const btnLeft = document.getElementById('planScrollLeft');
                  const btnRight = document.getElementById('planScrollRight');

                  if (btnLeft && track) {
                      btnLeft.addEventListener('click', function (e) {
                          e.preventDefault();
                          track.scrollBy({ left: -140, behavior: 'smooth' });
                      });
                  }

                  if (btnRight && track) {
                      btnRight.addEventListener('click', function (e) {
                          e.preventDefault();
                          track.scrollBy({ left: 140, behavior: 'smooth' });
                      });
                  }

                  function scrollToActivePill() {
                      const activePill = track ? track.querySelector('.pay-plan-scroll-pill.selected') : null;
                      if (activePill && track) {
                          const trackRect = track.getBoundingClientRect();
                          const pillRect = activePill.getBoundingClientRect();
                          if (pillRect.left < trackRect.left || pillRect.right > trackRect.right) {
                              const scrollDiff = (pillRect.left - trackRect.left) - (track.clientWidth / 2) + (activePill.clientWidth / 2);
                              track.scrollBy({ left: scrollDiff, behavior: 'smooth' });
                          }
                      }
                  }

                  // Exact SVGs from pricing.blade.php
                  const iconMap = {
                      'Personal': `<svg viewBox="0 0 24 24" fill="none"><path d="M20 21a8 8 0 0 0-16 0" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/><path d="M12 13a5 5 0 1 0 0-10 5 5 0 0 0 0 10Z" stroke="currentColor" stroke-width="1.8"/></svg>`,
                      'Basic': `<svg viewBox="0 0 24 24" fill="none"><path d="M20 21a8 8 0 0 0-16 0" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/><path d="M12 13a5 5 0 1 0 0-10 5 5 0 0 0 0 10Z" stroke="currentColor" stroke-width="1.8"/></svg>`,
                      'Standard': `<svg viewBox="0 0 24 24" fill="none"><path d="M3 3v18h18" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/><path d="m7 15 4-4 3 3 5-7" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>`,
                      'Advanced': `<svg viewBox="0 0 24 24" fill="none"><path d="m3 8 5 4 4-7 4 7 5-4-2 11H5L3 8Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/><path d="M5 19h14" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>`,
                      'Premium': `<svg viewBox="0 0 24 24" fill="none"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/><path d="m9 12 2 2 4-5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>`
                  };

                  const descMap = {
                      'Personal': 'Best for individual users',
                      'Basic': 'Essential cloud desktop features for individuals & small teams.',
                      'Standard': 'Collaborative cloud workspace with scalable storage for growing businesses.',
                      'Advanced': 'Comprehensive cloud desktop with enhanced security & multi-admin controls.',
                      'Premium': 'Built for large organizations with advanced control and flexibility.'
                  };

                  const minQtyMap = {
                      'Personal': 1,
                      'Basic': 2,
                      'Standard': 10,
                      'Advanced': 50,
                      'Premium': 100
                  };

                  const planDiscountMap = {
                      'Personal': 10,
                      'Basic': 0,
                      'Standard': 5,
                      'Advanced': 10,
                      'Premium': 15
                  };

                  function formatIndianNum(num) {
                      return Math.round(Number(num) || 0).toLocaleString('en-IN');
                  }

                  let isUpdatingUI = false;

                  function updateCustomCardUI(explicitPlanName) {
                      if (isUpdatingUI) return;
                      isUpdatingUI = true;

                      try {
                          // Ensure all pills remain displayed
                          document.querySelectorAll('.pay-plan-scroll-pill').forEach(function (pill) {
                              pill.style.display = 'inline-flex';
                          });

                          let selectedPill = null;
                          if (explicitPlanName) {
                              selectedPill = Array.from(document.querySelectorAll('.pay-plan-scroll-pill')).find(function (p) {
                                  return p.dataset.name === explicitPlanName;
                              });
                          }
                          if (!selectedPill) {
                              selectedPill = document.querySelector('.pay-plan-scroll-pill.selected') || 
                                             document.querySelector('.pay-plan-scroll-pill');
                          }
                          if (!selectedPill) {
                              return;
                          }

                          const planName = explicitPlanName || selectedPill.dataset.name || 'Premium';
                          const planType = selectedPill.dataset.planType || 'team';
                          const symbol = selectedPill.dataset.symbol || '₹';
                          const unitRate = parseFloat(selectedPill.dataset.unitRate) || 999;
                          const toggle = document.getElementById('payBillingToggle');
                          const isYearly = toggle ? toggle.checked : false;

                          const minQty = minQtyMap[planName] || parseInt(selectedPill.dataset.defQty || 1);
                          const planDesc = selectedPill.dataset.desc || descMap[planName] || 'Select a plan that fits your team\'s needs.';
                          const planDiscountPercent = (planDiscountMap[planName] !== undefined)
                              ? planDiscountMap[planName]
                              : (parseFloat(selectedPill.dataset.monthlyDiscount) || 0);

                          const qtyInput = document.getElementById('payQtyInput');
                          let qty = minQty;

                          if (planType === 'team') {
                              qty = parseInt(qtyInput?.value || minQty);
                              if (isNaN(qty) || qty < minQty) {
                                  qty = minQty;
                              }
                              if (qtyInput && qtyInput.value != qty) {
                                  qtyInput.min = minQty;
                                  qtyInput.value = qty;
                              }
                              if (payQtyControls && payQtyControls.style.display !== 'block') {
                                  payQtyControls.style.display = 'block';
                              }
                              if (companyForm && companyForm.classList.contains('hidden')) {
                                  companyForm.classList.remove('hidden');
                              }
                          } else {
                              qty = 1;
                              if (qtyInput && qtyInput.value != 1) {
                                  qtyInput.min = 1;
                                  qtyInput.value = 1;
                              }
                              if (payQtyControls && payQtyControls.style.display !== 'none') {
                                  payQtyControls.style.display = 'none';
                              }
                              if (companyForm && !companyForm.classList.contains('hidden')) {
                                  companyForm.classList.add('hidden');
                              }
                          }

                          // Math calculations
                          const baseUserPrice = unitRate;
                          const months = isYearly ? 12 : 1;
                          const baseTotal = baseUserPrice * qty * months;

                          const annualDiscountPercent = isYearly ? 10 : 0;
                          const promoDiscountPercent = 5; // Static promo code as requested
                          const totalDiscountPercent = planDiscountPercent + annualDiscountPercent + promoDiscountPercent;

                          const youSave = Math.round(baseTotal * (totalDiscountPercent / 100));
                          const finalTotal = baseTotal - youSave;

                          // 1. Header
                          const iconEl = document.getElementById('summaryPlanIcon');
                          if (iconEl) iconEl.innerHTML = iconMap[planName] || iconMap['Premium'];

                          const nameEl = document.getElementById('summaryPlanName');
                          if (nameEl) nameEl.innerText = planName;

                          const descEl = document.getElementById('summaryPlanDesc');
                          if (descEl) descEl.innerText = planDesc;

                          // 2. Unit Price
                          const symEl = document.getElementById('poSymbol');
                          if (symEl) symEl.innerText = symbol;

                          const unitPriceEl = document.getElementById('poUnitPrice');
                          if (unitPriceEl) unitPriceEl.innerText = formatIndianNum(baseUserPrice);

                          // 3. License Section
                          const minQtyEl = document.getElementById('poMinQtyText');
                          if (minQtyEl) minQtyEl.innerText = minQty;

                          // 4. Price Summary Rows
                          const sumBaseUserEl = document.getElementById('poSumBaseUser');
                          if (sumBaseUserEl) sumBaseUserEl.innerText = symbol + formatIndianNum(baseUserPrice);

                          const sumUsersEl = document.getElementById('poSumUsers');
                          if (sumUsersEl) sumUsersEl.innerText = qty;

                          const orgTotalEl = document.getElementById('summaryOrgTotal');
                          if (orgTotalEl) orgTotalEl.innerText = symbol + formatIndianNum(baseTotal);

                          // Plan Discount
                          const rowPlanDiscount = document.getElementById('poRowPlanDiscount');
                          const valPlanDiscount = document.getElementById('poPlanDiscountVal');
                          if (rowPlanDiscount && valPlanDiscount) {
                              if (planDiscountPercent > 0) {
                                  rowPlanDiscount.style.display = 'flex';
                                  valPlanDiscount.innerText = planDiscountPercent + '%';
                              } else {
                                  rowPlanDiscount.style.display = 'none';
                              }
                          }

                          // Annual Billing Discount (show only when annually tab is active)
                          const rowAnnualDiscount = document.getElementById('poRowAnnualDiscount');
                          const valAnnualDiscount = document.getElementById('poAnnualDiscountVal');
                          if (rowAnnualDiscount && valAnnualDiscount) {
                              if (isYearly) {
                                  rowAnnualDiscount.style.display = 'flex';
                                  valAnnualDiscount.innerText = '10%';
                              } else {
                                  rowAnnualDiscount.style.display = 'none';
                              }
                          }

                          // Promo Discount (static 5%)
                          const rowPromoDiscount = document.getElementById('poRowPromoDiscount');
                          const valPromoDiscount = document.getElementById('poPromoDiscountVal');
                          if (rowPromoDiscount && valPromoDiscount) {
                              rowPromoDiscount.style.display = 'flex';
                              valPromoDiscount.innerText = promoDiscountPercent + '%';
                          }

                          // Total Discount
                          const valTotalDiscount = document.getElementById('poTotalDiscountVal');
                          if (valTotalDiscount) valTotalDiscount.innerText = totalDiscountPercent + '%';

                          // 5. Highlight Total Box (Cyan)
                          const periodLabelEl = document.getElementById('poTotalPeriodLabel');
                          if (periodLabelEl) {
                              periodLabelEl.innerText = isYearly ? '(Total Per Year)' : '(Total Per Month)';
                          }

                          const totalEl = document.getElementById('summaryTotal');
                          if (totalEl) totalEl.innerText = symbol + ' ' + formatIndianNum(finalTotal);

                          const subtotalEl = document.getElementById('summarySubtotal');
                          if (subtotalEl) subtotalEl.innerText = symbol + formatIndianNum(youSave);

                          const modalTotalEl = document.getElementById('modalTotal');
                          if (modalTotalEl) modalTotalEl.innerText = symbol + ' ' + formatIndianNum(finalTotal);

                          // 6. Celebration Banner
                          const bannerParts = [];
                          if (planDiscountPercent > 0) {
                              const discountTypeLabel = (planName === 'Personal') ? 'Personal Discount' : (planName + ' Team Discount');
                              bannerParts.push(`${planDiscountPercent}% ${discountTypeLabel}`);
                          }
                          if (isYearly && annualDiscountPercent > 0) {
                              bannerParts.push(`${annualDiscountPercent}% Annual Billing Discount`);
                          }
                          if (promoDiscountPercent > 0) {
                              bannerParts.push(`${promoDiscountPercent}% Promo Code Discount`);
                          }
                          const bannerText = bannerParts.length > 0 
                              ? `${bannerParts.join(' + ')} Total Savings ${totalDiscountPercent}%`
                              : `Total Savings ${totalDiscountPercent}%`;

                          const bannerTextEl = document.getElementById('poSavingsBannerText');
                          if (bannerTextEl) bannerTextEl.innerText = bannerText;

                          // 7. CTA Button
                          const continuePlanNameEl = document.getElementById('poContinuePlanName');
                          if (continuePlanNameEl) continuePlanNameEl.innerText = planName;

                      } finally {
                          isUpdatingUI = false;
                      }
                  }

                  // Expose globally for seamless synchronization with payment.js
                  window.updateCustomCardUI = updateCustomCardUI;

                  // Stepper buttons
                  const payQtyPlus = document.getElementById('payQtyPlus');
                  const payQtyMinus = document.getElementById('payQtyMinus');
                  const payQtyInput = document.getElementById('payQtyInput');

                  if (payQtyPlus) {
                      payQtyPlus.addEventListener('click', function (e) {
                          e.preventDefault();
                          updateCustomCardUI();
                      });
                      payQtyPlus.addEventListener('mousedown', function (e) {
                          e.preventDefault();
                      });
                  }

                  if (payQtyMinus) {
                      payQtyMinus.addEventListener('click', function (e) {
                          e.preventDefault();
                          updateCustomCardUI();
                      });
                      payQtyMinus.addEventListener('mousedown', function (e) {
                          e.preventDefault();
                      });
                  }

                  if (payQtyInput) {
                      payQtyInput.addEventListener('input', function () {
                          updateCustomCardUI();
                      });
                      payQtyInput.addEventListener('change', function () {
                          updateCustomCardUI();
                      });
                  }

                  // Billing toggle
                  const toggle = document.getElementById('payBillingToggle');
                  if (toggle) {
                      toggle.addEventListener('change', function () {
                          updateCustomCardUI();
                      });
                  }

                  const monthLabel = document.getElementById('payBillingMonthLabel');
                  const yearLabel = document.getElementById('payBillingYearLabel');

                  if (monthLabel && toggle) {
                      monthLabel.addEventListener('click', function (e) {
                          e.preventDefault();
                          e.stopPropagation();
                          if (toggle.checked) {
                              toggle.checked = false;
                              toggle.dispatchEvent(new Event('change'));
                          }
                      });
                  }

                  if (yearLabel && toggle) {
                      yearLabel.addEventListener('click', function (e) {
                          e.preventDefault();
                          e.stopPropagation();
                          if (!toggle.checked) {
                              toggle.checked = true;
                              toggle.dispatchEvent(new Event('change'));
                          }
                      });
                  }

                  // Promo apply button (static)
                  const applyPromoBtn = document.getElementById('applyPromoBtn');
                  if (applyPromoBtn) {
                      applyPromoBtn.addEventListener('click', function (e) {
                          e.preventDefault();
                          e.stopPropagation();
                          const msg = document.getElementById('poPromoSuccessMsg');
                          if (msg) msg.style.display = 'flex';
                          updateCustomCardUI();
                      });
                  }

                  // Plan pills click
                  document.querySelectorAll('.pay-plan-scroll-pill').forEach(function (pill) {
                      pill.addEventListener('click', function (e) {
                          e.preventDefault();
                          document.querySelectorAll('.pay-plan-scroll-pill').forEach(function (p) {
                              p.classList.remove('selected');
                          });
                          this.classList.add('selected');

                          const name = this.dataset.name;
                          const type = this.dataset.planType;
                          const minMap = { 'Personal': 1, 'Basic': 2, 'Standard': 10, 'Advanced': 50, 'Premium': 100 };
                          const minQ = minMap[name] || parseInt(this.dataset.defQty || 1);

                          if (payQtyInput) {
                              payQtyInput.min = minQ;
                              payQtyInput.value = minQ;
                          }

                          try {
                              const sp = JSON.parse(localStorage.getItem('selectedPlan')) || {};
                              sp.plan_id = this.dataset.planId;
                              sp.plan_type = type;
                              sp.name = name;
                              delete sp.display_name;
                              if (this.dataset.features) {
                                  sp.features = JSON.parse(this.dataset.features);
                              }
                              localStorage.setItem('selectedPlan', JSON.stringify(sp));
                          } catch (e) {}

                          scrollToActivePill();
                          updateCustomCardUI(name);
                      });
                  });

                  // Initial setup - match pill from localStorage if available
                  try {
                      const sp = JSON.parse(localStorage.getItem('selectedPlan'));
                      if (sp && (sp.name || sp.plan_id)) {
                          const matchingPill = Array.from(document.querySelectorAll('.pay-plan-scroll-pill')).find(function (p) {
                              return (sp.name && p.dataset.name === sp.name) || 
                                     (p.dataset.planId == sp.plan_id && p.dataset.planType == sp.plan_type);
                          });
                          if (matchingPill) {
                              document.querySelectorAll('.pay-plan-scroll-pill').forEach(function (p) {
                                  p.classList.remove('selected');
                              });
                              matchingPill.classList.add('selected');
                          }
                      }
                  } catch (e) {}

                  scrollToActivePill();
                  updateCustomCardUI();
              });
          </script>
      @endsection
