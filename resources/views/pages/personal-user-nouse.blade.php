@extends('layouts.backendsettings')
@section('title', 'Affordable Cloud Desktop Plans for Teams & Businesses | Pocket Office')
@section('meta-title', 'Payment | Pocket Office')
@section('meta-description', 'Complete your payment for Pocket Office cloud desktop plans and get secure access to your selected workspace subscription.')
@section('meta-keywords', 'payment, cloud desktop plans, pocket office subscription, buy workspace')
@section('meta-image', 'https://pocketdesk.sizaf.com/assets/img/hero-images/Payment.svg')
@section('canonical', 'https://pocketdesk.sizaf.com/personal-user-nouse')
@section('meta-url', 'https://pocketdesk.sizaf.com/personal-user-nouse')
@section('structured-data')
@verbatim
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "Payment | Pocket Office",
  "url": "https://pocketdesk.sizaf.com/personal-user-nouse",
  "description": "Complete your payment for Pocket Office cloud desktop plans and get secure access to your selected workspace subscription.",
  "inLanguage": "en",
  "image": "https://pocketdesk.sizaf.com/assets/img/hero-images/Payment.svg",
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
    <!-- ══════════════════════════════════════════════
         LEFT COLUMN — Registration Form
    ══════════════════════════════════════════════ -->
    <div class="col-md-8" id="formCol">
      <form id="registrationForm" novalidate>
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
                    class="help-block text-danger"
                    style="display: none"
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
                    id="email"
                    placeholder="name@gmail.com"
                    data-rule="required|email" />
                  <span
                    class="glyphicon form-control-feedback"
                    id="email-icon"></span>
                  <span
                    class="help-block text-danger"
                    style="display: none"
                    id="email-err">
                    Enter a valid email
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
        <!-- /Contact Person Details -->
      </form>
    </div>
    <!-- /col-md-8 -->

    <!-- ══════════════════════════════════════════════
         RIGHT COLUMN — Order Summary
    ══════════════════════════════════════════════ -->
    <div class="col-md-4">
      <div class="sidebar-sticky">
        <div class="panel panel-default">
          <div class="panel-heading" style="border-bottom: 1px solid #ddd">
            <h4
              style="
                    color: #333;
                    margin: 0;
                    font-size: 15px;
                    font-weight: 600;
                  ">
              Order Summary
            </h4>
          </div>

          <div class="panel-body">
            <!-- ── Active Plan Box ── -->
            <div class="plan-box">
              <div class="clearfix">
                <strong
                  id="summaryPlanName"
                  style="font-size: 18px; color: #057a96">—</strong>
                <span class="pull-right plan-price">
                  <span id="summarySymbol">₹</span><span id="summaryUnitPrice">—</span>
                  <small
                    class="text-muted"
                    style="font-size: 13px; font-weight: 400">
                    /month</small>
                </span>
              </div>
              <ul id="planFeatureList">
                <li>Loading…</li>
              </ul>
            </div>

            <!-- ── Price Breakdown ── -->
            <div style="margin-top: 14px">
              <div class="summary-row">
                <span>Subtotal</span>
                <span id="summarySubtotal">—</span>
              </div>
              <div
                class="summary-row"
                id="discountRow"
                style="display: none; color: #16a34a">
                <span>Coupon Discount (10%)</span>
                <span id="discountAmt">—</span>
              </div>

              <div class="summary-row">
                <span>Estimated tax</span><span id="summaryTax">₹0</span>
              </div>
              <div class="summary-total">
                <span>Total</span>
                <span id="summaryTotal" style="color: #057a96">—</span>
              </div>
            </div>

            <!-- ── Promo / Coupon Code ── -->
            <hr style="margin: 14px 0" />
            <label
              class="text-muted"
              style="font-size: 13px; font-weight: 500">Promo code</label>
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
              style="font-size: 12px; margin-top: 6px"></div>

            <hr style="margin: 14px 0" />

            <!-- ── Primary CTA ── -->
            <button
              class="btn btn-brand btn-block"
              id="sideSubmitBtn"
              type="button">
              Save &amp; Verify
            </button>
          </div>
          <!-- /panel-body -->
        </div>
        <!-- /panel -->
      </div>
      <!-- /sidebar-sticky -->
    </div>
    <!-- /col-md-4 -->
  </div>
  <!-- /row -->
</div>
<!-- /container -->

<!-- ============================================================
     CARD PAYMENT MODAL
     Shown after "Verify and Checkout" click
     ============================================================ -->
<div class="pay-modal-overlay" id="paymentModal">
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
@endsection