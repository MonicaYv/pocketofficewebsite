     @extends('layouts.backendsettings')
     @section('title', 'Payment')
     @section('content')
     <style>
         .pay-plan-tile.selected {
             border: 2px solid #057a96;
             background: #f0f9ff;
         }
     </style>
     <!-- breadcrumb area start -->
     <div
         class="breadcrumb-area pricing-bg"
         style="background-image: url(assets/img/hero-images/Payment.svg)">
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
             <div class="col-md-8" id="formCol">
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
                                         <input
                                             type="text"
                                             class="form-control"
                                             id="companyName"
                                             placeholder="XYZ Company"
                                             data-rule="required|minlen:2" />
                                         <span
                                             class="glyphicon form-control-feedback"
                                             id="companyName-icon"></span>
                                         <span
                                             class="help-block text-danger"
                                             style="display: none"
                                             id="companyName-err">
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
                                         <input
                                             type="text"
                                             class="form-control"
                                             id="address"
                                             placeholder="123 Main Street"
                                             data-rule="required" />
                                         <span
                                             class="glyphicon form-control-feedback"
                                             id="address-icon"></span>
                                         <span
                                             class="help-block text-danger"
                                             style="display: none"
                                             id="address-err">
                                             Address is required
                                         </span>
                                     </div>
                                 </div>
                             </div>

                             <div class="row mb-3">
                                 <div class="col-sm-6">
                                     <div class="form-group">
                                         <label>Company Number</label>
                                         <input
                                             type="text"
                                             class="form-control"
                                             id="companyNumber"
                                             placeholder="98765XXXXX"
                                             maxlength="10"
                                             inputmode="numeric"
                                             autocomplete="off" />
                                         <span
                                             class=" glyphicon form-control-feedback"
                                             id="companyNumber-icon"></span>
                                         <span
                                             class="help-block text-danger"
                                             style="display: none"
                                             id="companyNumber-err">
                                             Enter valid 10 digit mobile number
                                         </span>
                                     </div>
                                 </div>
                                 <div class="col-sm-6">
                                     <div class="form-group has-feedback">
                                         <label>Company Email Address</label>
                                         <input
                                             type="email"
                                             class="form-control"
                                             id="companyEmail"
                                             placeholder="company@example.com"
                                             data-rule="email" />
                                         <span
                                             class="glyphicon form-control-feedback"
                                             id="companyEmail-icon"></span>
                                         <span
                                             class="help-block text-danger"
                                             style="display: none"
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
                                         <input
                                             type="url"
                                             class="form-control"
                                             id="website"
                                             placeholder="https://example.com"
                                             data-rule="url" />
                                         <span
                                             class="glyphicon form-control-feedback"
                                             id="website-icon"></span>
                                         <span
                                             class="help-block text-danger"
                                             style="display: none"
                                             id="website-err">
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
                                         <input
                                             type="text"
                                             class="form-control"
                                             id="contactPerson"
                                             placeholder="Full name"
                                             data-rule="required|minlen:2" />
                                         <span
                                             class="glyphicon form-control-feedback"
                                             id="contactPerson-icon"></span>
                                         <span
                                             class="help-block text-danger"
                                             style="display: none"
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
                                         <input
                                             type="tel"
                                             class="form-control"
                                             id="phone"
                                             placeholder="98765XXXXX"
                                             maxlength="10"
                                             inputmode="numeric"
                                             autocomplete="off" />
                                         <span
                                             class=" glyphicon form-control-feedback"
                                             id="phone-icon"></span>
                                         <span
                                             class="help-block text-danger"
                                             style="display: none"
                                             id="phone-err">
                                             Enter valid 10 digit mobile number
                                         </span>
                                     </div>
                                 </div>
                                 <div class="col-sm-6">
                                     <div class="form-group has-feedback">
                                         <label>Email Address <span class="req">*</span></label>
                                         <input
                                             type="email"
                                             class="form-control"
                                             id="userEmail"
                                             placeholder="name@gmail.com"
                                             maxlength="100"
                                             autocomplete="off" />
                                         <span
                                             class="glyphicon form-control-feedback"
                                             id="userEmail-icon"></span>
                                         <span
                                             class="help-block text-danger"
                                             style="display: none"
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
                                         <div class="form-check mb-3">
                                             <input
                                                 class="form-check-input"
                                                 type="checkbox"
                                                 id="existingUserCheck">

                                             <label class="form-check-label" for="existingUserCheck">
                                                 Are you existing user?
                                             </label>
                                         </div>
                                         <input
                                             type="text"
                                             class="form-control"
                                             id="username"
                                             placeholder="Choose a username"
                                             maxlength="30"
                                             autocomplete="off" />
                                         <span
                                             class=" glyphicon form-control-feedback"
                                             id="username-icon"></span>
                                         <span
                                             class="help-block text-danger"
                                             style="display: none"
                                             id="username-err">
                                             Username must contain 1 capital letter, letters and underscore only
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
                                         <select
                                             class="form-control"
                                             id="passwordQuestion"
                                             data-rule="required">
                                             <option value="">Choose a question</option>
                                             <option value="What was your first pet's name?">What was your first pet's name?</option>
                                             <option value="What city were you born in?">What city were you born in?</option>
                                             <option value="What is your mother's maiden name?">What is your mother's maiden name?</option>
                                             <option value="What was the name of your first school?">What was the name of your first school?</option>
                                         </select>
                                         <span
                                             class="help-block text-danger"
                                             style="display: none"
                                             id="passwordQuestion-err">
                                             Please select a security question
                                         </span>
                                     </div>
                                 </div>
                                 <div class="col-sm-6">
                                     <div class="form-group has-feedback">
                                         <label>Security Answer <span class="req">*</span></label>
                                         <input
                                             type="text"
                                             class="form-control"
                                             id="securityAnswer"
                                             placeholder="Write answer for the question"
                                             data-rule="required" />
                                         <span
                                             class="glyphicon form-control-feedback"
                                             id="securityAnswer-icon"></span>
                                         <span
                                             class="help-block text-danger"
                                             style="display: none"
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
                                     <a href="#" style="color: #057a96">terms and conditions</a>
                                 </label>
                                 <span
                                     class="help-block text-danger"
                                     style="display: none"
                                     id="terms-err">
                                     You must accept the terms and conditions
                                 </span>
                             </div>
                         </div>
                     </div>
                 </form>
             </div>

             <!-- RIGHT COLUMN — Order Summary -->
             <div class="col-md-4">
                 <div class="sidebar-sticky">
                     <div class="panel panel-default">
                         <div class="panel-heading" style="border-bottom: 1px solid #ddd">
                             <h4 style="color: #333; margin: 0; font-size: 15px; font-weight: 600; ">
                                 Order Summary
                             </h4>
                         </div>

                         <div class="panel-body">
                             <div id="payBillingControls" style="margin-bottom: 10px;">
                                 @php
                                 $singlePlan = collect($planLists)->firstWhere('is_single_user', 1);
                                 @endphp
                                 <div style="display:flex;align-items:center;justify-content:space-between;">
                                     <span style="font-size:13px;font-weight:600;color:#333;">Billing Period</span>
                                     <label style="display:flex;align-items:center;gap:8px;cursor:pointer;margin:0;">
                                         <span id="payBillingMonthLabel" style="font-size:12px;font-weight:600;color:#057A96;">
                                             Monthly <span
                                                 id="monthlyDiscountBadge"
                                                 style="display:none;background:#d1fae5;color:#065f46;border-radius:999px;font-size:10px;font-weight:700;padding:1px 6px;margin-left:2px;">
                                             </span>
                                         </span>
                                         <span style="position:relative;display:inline-block;width:40px;height:22px;">
                                             <input type="checkbox" id="payBillingToggle" style="opacity:0;width:0;height:0;position:absolute;">
                                             <span id="payToggleTrack" style="position:absolute;inset:0;border-radius:999px;cursor:pointer;background:#ccc;transition:background .2s;">
                                                 <span id="payToggleThumb" style="position:absolute;top:3px;width:16px;height:16px;border-radius:50%;background:#fff;box-shadow:0 1px 4px rgba(0,0,0,.2);transition:left .2s;left:3px;"></span>
                                             </span>
                                         </span>
                                         <span id="payBillingYearLabel" style="font-size:12px;font-weight:400;color:#888;">
                                             Yearly <span
                                                 id="yearlyDiscountBadge"
                                                 style="display:none;background:#d1fae5;color:#065f46;border-radius:999px;font-size:10px;font-weight:700;padding:1px 6px;margin-left:2px;">
                                             </span>
                                         </span>
                                     </label>
                                 </div>
                                 <hr style="margin:10px 0 0 0;">
                             </div>

                             <div class="pay-plan-selector">
                                 <p class="pay-plan-selector__label">Change Plan</p>

                                 <div
                                     class="pay-plan-selector__grid"
                                     id="planOptions"
                                     style="display:grid;grid-template-columns:1fr 1fr;gap:6px;">

                                     @foreach ($planLists as $plan)
                                     <div
                                         class="pay-plan-tile selected-plan-option {{ $loop->first ? 'selected' : '' }}"

                                         data-plan-type="{{ $plan->is_single_user == 1 ? 'single' : 'team' }}"
                                         data-apply-discount="{{ $plan->is_team_discount_apply == 1 }}"
                                         data-plan-id="{{ $plan->id }}"
                                         data-name="{{ $plan->plans_name }}"
                                         data-subscription="{{ $plan->plans_subscription_type }}"
                                         data-license="{{ $plan->plans_license }}"
                                         data-storage="{{ $plan->plans_users }}"
                                         data-storage-unit="{{ $plan->storage_unit }}"
                                         data-monthly-price="{{ $plan->final_monthly_price }}"
                                         data-yearly-price="{{ $plan->final_yearly_price }}"
                                         data-monthly-discount="{{ $plan->monthly_discount ?? 0 }}"
                                         data-yearly-discount="{{ $plan->yearly_discount ?? 0 }}"
                                         data-extra-monthly-discount="{{ $plan->additional_disc_month ?? 0 }}"
                                         data-extra-yearly-discount="{{ $plan->additional_disc_year ?? 0 }}"
                                         data-symbol="{{ $plan->currency_symbol ?? '₹' }}">

                                         {{ $plan->plans_name }}

                                         <!-- <span class="pay-plan-tile__price plan_price_details"></span> -->
                                         <span class="pay-plan-tile__price plan_price_details hidden"></span>
                                         <span class="pay-plan-tile__price view_plan_price_details">
                                             {{ $plan->currency_symbol }}{{ $plan->final_monthly_price }}
                                         </span>
                                     </div>
                                     @endforeach
                                 </div>
                             </div>

                             <div id="payQtyControls" style="margin-top: 10px;">
                                 <hr style="margin:0 0 10px 0;">
                                 <div style="display:flex;align-items:center;justify-content:space-between;">
                                     <span style="font-size:13px;font-weight:600;color:#333;" id="payQtyLabel">Users</span>
                                     <div id="payQtyBox" style="display: flex; align-items: center; border: 1px solid rgb(221, 221, 221); border-radius: 8px; overflow: hidden; opacity: 1; pointer-events: auto;">
                                         <button id="payQtyMinus" type="button" style="width:32px;height:32px;border:none;background:#f5f5f5;font-size:18px;font-weight:600;cursor:pointer;color:#333;display:flex;align-items:center;justify-content:center;">−</button>
                                         <input type="number" id="payQtyInput" value="1" min="1" style="width:42px;height:32px;text-align:center;border:none;border-left:1px solid #ddd;border-right:1px solid #ddd;font-size:13px;font-weight:600;color:#333-moz-appearance:textfield;outline:none;background:#fff;">
                                         <button id="payQtyPlus" type="button" style="width:32px;height:32px;border:none;background:#f5f5f5;font-size:18px;font-weight:600;cursor:pointer;color:#333; display:flex;align-items:center;justify-content:center;">+</button>
                                     </div>
                                 </div>
                             </div>

                             <hr style="margin: 12px 0">

                             <div class="plan-box">
                                 <div class="clearfix">
                                     <strong
                                         id="summaryPlanName"
                                         style="font-size: 18px; color: #057a96">—</strong>
                                     <span class="pull-right plan-price">
                                         <span id="summarySymbol"></span><span id="summaryUnitPrice">—</span>
                                         <small class="text-muted" style="font-size: 13px; font-weight: 400"></small>
                                     </span>
                                 </div>
                                 <ul id="planFeatureList">
                                     <li>Loading…</li>
                                 </ul>
                             </div>

                             <div style="margin-top: 14px">
                                 <div class="summary-row">
                                     <span>Subtotal</span>
                                     <span id="summarySubtotal">—</span>
                                 </div>
                                 <div
                                     class="summary-row hidden"
                                     id="discountRow"
                                     style="color: #16a34a">
                                     <span>Coupon Discount (10%)</span>
                                     <span id="discountAmt">—</span>
                                 </div>

                                 <div class="summary-row hidden">
                                     <span>Estimated tax</span>
                                     <span id="summaryTax">0</span>
                                 </div>
                                 <div class="summary-total">
                                     <span>Total</span>
                                     <span id="summaryTotal" style="color: #057a96">—</span>
                                 </div>
                             </div>

                             <hr style="margin: 14px 0" />

                             <div id="paySavingsNotice"
                                 class=""
                                 style="background: rgb(209, 250, 229);
                                color: rgb(6, 95, 70);
                                border-radius: 8px;
                                font-size: 12px;
                                font-weight: 600;
                                padding: 6px 12px;
                                margin-bottom: 10px;
                                text-align: center;
                                width: 100%;
                                box-sizing: border-box;">
                                 <!-- 🎉 10% off — you save ₹ 719 by paying annually -->
                             </div>

                             <label
                                 class="text-muted"
                                 style="font-size: 13px; font-weight: 500">Promo code</label>
                             <div class="input-group">
                                 <input
                                     type="text"
                                     class="form-control"
                                     id="couponInput"
                                     placeholder="1234" />
                                 <span class="input-group-btn">
                                     <button
                                         class="btn btn-brand"
                                         type="button"
                                         id="applyPromoBtn">
                                         Apply
                                     </button>
                                 </span>
                             </div>
                             <div
                                 id="couponMsg"
                                 style="font-size: 12px; margin-top: 6px"></div>

                             <button id="removeCouponBtn"
                                 style="display:none; margin-top:6px; background:none; border:none; color:red; cursor:pointer;">
                                 ❌ Remove Coupon
                             </button>

                             <hr style="margin: 14px 0" />

                             <button
                                 class="btn btn-brand btn-block"
                                 id="sideSubmitBtnForTeam"
                                 type="button">
                                 Save &amp; Verify
                             </button>
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
                 <input
                     type="text"
                     class="form-control pay-card-input"
                     id="cardNumber"
                     placeholder="1234 5678 9012 3456"
                     maxlength="19" />
                 <span
                     class="help-block text-danger"
                     style="display: none"
                     id="cardNumber-err">
                     Enter a valid 16-digit card number
                 </span>
             </div>

             <div class="row">
                 <div class="col-sm-6">
                     <div class="form-group">
                         <label>Expiry Date <span class="req">*</span></label>
                         <input
                             type="text"
                             class="form-control"
                             id="cardExpiry"
                             placeholder="MM / YY"
                             maxlength="7" />
                         <span
                             class="help-block text-danger"
                             style="display: none"
                             id="cardExpiry-err">
                             Enter valid expiry (MM/YY)
                         </span>
                     </div>
                 </div>
                 <div class="col-sm-6">
                     <div class="form-group">
                         <label>CVV <span class="req">*</span></label>
                         <input
                             type="password"
                             class="form-control"
                             id="cardCvv"
                             placeholder="•••"
                             maxlength="4" />
                         <span
                             class="help-block text-danger"
                             style="display: none"
                             id="cardCvv-err">
                             Enter 3 or 4-digit CVV
                         </span>
                     </div>
                 </div>
             </div>

             <div class="form-group">
                 <label>Cardholder Name <span class="req">*</span></label>
                 <input
                     type="text"
                     class="form-control"
                     id="cardName"
                     placeholder="As printed on card" />
                 <span
                     class="help-block text-danger"
                     style="display: none"
                     id="cardName-err">
                     Cardholder name is required
                 </span>
             </div>

             <span
                 class="help-block text-danger"
                 style="display: none"
                 id="payError">
                 Please fix the errors above before proceeding.
             </span>

             <!-- Amount reminder -->
             <div class="pay-amount-box">
                 <span class="text-muted" style="font-size: 13px">Amount to pay</span>
                 <strong id="modalTotal" style="font-size: 18px; color: #057a96">—</strong>
             </div>

             <button
                 class="btn btn-brand btn-block"
                 id="confirmPayBtn"
                 style="margin-top: 14px">
                 🔒 Confirm Payment
             </button>
         </div>
     </div>


     <!-- Existing User Modal -->
     <div
         id="existingUserModal"
         style="
            display:none;
            position:fixed;
            top:0;
            left:0;
            width:100%;
            height:100%;
            background:rgba(0,0,0,0.5);
            z-index:99999;
        ">

         <div
             style="
            background:#fff;
            width:400px;
            max-width:90%;
            margin:120px auto;
            padding:20px;
            border-radius:10px;
            position:relative;
        ">

             <h4>Existing User</h4>

             <p>
                 You can purchase from marketplace inside the system.
             </p>

             <div style="text-align:right;">

                 <button
                     class="hidden"
                     type="button"
                     data-close-modal
                     style="
                    padding:8px 15px;
                    border:none;
                    background:#ccc;
                    margin-right:10px;
                    border-radius:5px;
                ">
                     Close
                 </button>

                 <button
                     type="button"
                     id="redirectPricingBtn"
                     style="
                    padding:8px 15px;
                    border:none;
                    background:#057A96;
                    color:#fff;
                    border-radius:5px;
                ">
                     OK
                 </button>
             </div>
         </div>
     </div>
     @endsection