@extends('layouts.backendsettings')
@section('title', 'Affordable Cloud Desktop Plans for Teams & Businesses | Pocket Office')
@section('styles')
    @vite(['resources/css/payment.css'])
@endsection
@section('content')
<!-- breadcrumb area start -->
<div class="breadcrumb-area pricing-bg pay-breadcrumb-bg">
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

<!-- FORM SECTION -->
<div class="container my-4">
  <div class="row">
    <!--Registration Form -->
    <div class="col-md-8" id="formCol">
      <form id="registrationForm" novalidate>
        <div class="panel panel-default mb-4">
          <div class="panel-heading">
            <h4>Contact Person Details</h4>
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
                    class="help-block text-danger pay-err-text"
                    id="contactPerson-err">
                    Contact person name is required
                  </span>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Designation / Role</label>
                  <select class="form-control" id="designation">
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
                  <input
                    type="tel"
                    class="form-control"
                    id="phone"
                    placeholder="+1 (415) 123-4567"
                    data-rule="required|phone" />
                  <span
                    class="glyphicon form-control-feedback"
                    id="phone-icon"></span>
                  <span
                    class="help-block text-danger pay-err-text"
                    id="phone-err">
                    Enter a valid phone number
                  </span>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group has-feedback">
                  <label>Email Address <span class="req">*</span></label>
                  <input
                    type="email"
                    class="form-control"
                    id="useremail"
                    placeholder="name@gmail.com"
                    data-rule="required|email" />
                  <span
                    class="glyphicon form-control-feedback"
                    id="email-icon"></span>
                  <span
                    class="help-block text-danger pay-err-text"
                    id="email-err">
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
                  <input
                    type="text"
                    class="form-control"
                    id="username"
                    placeholder="Choose a username"
                    data-rule="required|minlen:4|username" />
                  <span
                    class="glyphicon form-control-feedback"
                    id="username-icon"></span>
                  <span
                    class="help-block text-danger pay-err-text"
                    id="username-err">
                    Username must be 4+ chars, letters/numbers/underscore
                    only
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
                    <option>What was your first pet's name?</option>
                    <option>What city were you born in?</option>
                    <option>What is your mother's maiden name?</option>
                    <option>What was the name of your first school?</option>
                  </select>
                  <span
                    class="help-block text-danger pay-err-text"
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
                    class="help-block text-danger pay-err-text"
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
                <a href="#" class="pay-terms-link">terms and conditions</a>
              </label>
              <span
                class="help-block text-danger pay-err-text"
                id="terms-err">
                You must accept the terms and conditions
              </span>
            </div>
          </div>
        </div>
      </form>
    </div>

    <!-- Order Summary-->
    <div class="col-md-4">
      <div class="sidebar-sticky">
        <div class="panel panel-default">
          <div class="panel-heading pay-order-summary-heading">
            <h4 class="pay-order-summary-title">
              Order Summary
            </h4>
          </div>

          <div class="panel-body">

            <div id="payBillingControls" class="pay-billing-controls">
              <div class="pay-row-between">
                <span class="pay-control-label">Billing Period</span>
                <label class="pay-toggle-label">
                  <span id="payBillingMonthLabel" class="pay-month-label">
                    Monthly
                  </span>
                  <span class="pay-switch-wrap">
                    <input type="checkbox" id="payBillingToggle" class="pay-switch-input">
                    <span id="payToggleTrack" class="pay-switch-track">
                      <span id="payToggleThumb" class="pay-switch-thumb"></span>
                    </span>
                  </span>
                  <span id="payBillingYearLabel" class="pay-year-label">
                    Yearly <span class="pay-discount-badge-inline">10% off</span>
                  </span>
                </label>
              </div>
              <hr class="pay-hr-top">
            </div>

            <div id="payQtyControls" class="pay-qty-controls">
              <div class="pay-row-between">
                <span class="pay-control-label" id="">Users</span>
                <div id="payQtyBox" class="pay-qty-box">
                  <button id="payQtyMinus" type="button" class="pay-qty-btn">−</button>
                  <input type="number" id="payQtyInput" value="1" min="1" class="pay-qty-input">
                  <button id="payQtyPlus" type="button" class="pay-qty-btn">+</button>
                </div>
              </div>
            </div>

            <hr class="pay-hr-12">

            <!-- ── Active Plan Box ── -->
            <div class="plan-box">
              <div class="clearfix">
                <strong
                  id="summaryPlanName"
                  class="pay-summary-plan-name">—</strong>
                <span class="pull-right plan-price">
                  <span id="summarySymbol"></span>&nbsp;<span id="summaryUnitPrice">—</span>
                  <small id="summaryPeriod"
                    class="text-muted pay-summary-period">
                   </small>
                </span>
              </div>
              <ul id="planFeatureList">
                <li>Loading…</li>
              </ul>
            </div>

            <div class="pay-mt-14">
              <div class="summary-row">
                <span>Subtotal</span>
                <span id="summarySubtotal">—</span>
              </div>
              <div
                class="summary-row pay-discount-row"
                id="discountRow">
                <span>Coupon Discount (10%)</span>
                <span id="discountAmt">—</span>
              </div>

              <!-- <div class="summary-row">
                <span>Estimated tax</span><span id="summaryTax"></span>
              </div> -->
              <div class="summary-total">
                <span>Total</span>
                <span id="summaryTotal" class="pay-summary-total-val">—</span>
              </div>
            </div>

            <hr class="pay-hr-14" />
            <label
              class="text-muted pay-promo-label">Promo code</label>
            <div class="input-group">
              <input
                type="text"
                class="form-control"
                id="couponInput"
                placeholder="Enter code e.g. 1234" />
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
              class="pay-coupon-msg"></div>

            <div id="removeCouponWrapper" class="pay-remove-coupon-wrapper">
              <button type="button" id="removeCouponBtn" class="pay-remove-coupon-btn">
                Remove coupon
              </button>
            </div>

            <hr class="pay-hr-14" />

            <button
              class="btn btn-brand btn-block"
              id="sideSubmitBtn"
              type="button">
              Save &amp; Verify
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--PAYMENT MODAL -->
<div class="pay-modal-overlay hidden" id="paymentModal">
  <div class="pay-modal-box">
    <button class="pay-modal-close" id="closePayModal">&times;</button>

    <h4 class="pay-modal-title">💳 Secure Payment</h4>
    <p class="pay-modal-subtitle">
      Enter your card details to complete your order
    </p>

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
        class="help-block text-danger pay-err-text"
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
            class="help-block text-danger pay-err-text"
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
            class="help-block text-danger pay-err-text"
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
        class="help-block text-danger pay-err-text"
        id="cardName-err">
        Cardholder name is required
      </span>
    </div>

    <span
      class="help-block text-danger pay-err-text"
      id="payError">
      Please fix the errors above before proceeding.
    </span>

    <div class="pay-amount-box">
      <span class="text-muted pay-amount-label">Amount to pay</span>
      <strong id="modalTotal" class="pay-amount-total">—</strong>
    </div>

    <button
      class="btn btn-brand btn-block pay-confirm-btn"
      id="confirmPayBtn">
      🔒 Confirm Payment
    </button>
  </div>
</div>
@endsection
@section('scripts')
    @vite(['resources/js/payment.js'])
@endsection