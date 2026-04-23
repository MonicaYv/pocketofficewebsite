  @include('partials.header')
  <style>
      .hidden {
          display: none !important;
      }
  </style>
  <!-- preloader area start -->
  <div class="preloader" id="preloader">
      <div class="preloader-inner">
          <div class="spinner">
              <div class="dot1"></div>
              <div class="dot2"></div>
          </div>
      </div>
  </div>
  <!-- preloader area end -->

  <!-- search Popup -->
  <div class="body-overlay" id="body-overlay"></div>
  <div class="search-popup" id="search-popup">
      <form class="search-form" onsubmit="return false;">
          <div class="form-group">
              <input type="text" id="search-input" class="form-control" placeholder="Search..." autocomplete="off">
          </div>
          <button type="submit" class="submit-btn">
              <i class="fa fa-search"></i>
          </button>
          <div id="search-results" class="search-results"></div>
      </form>
  </div>
  <!-- //. search Popup -->



  <!-- breadcrumb area start -->
  <div class="breadcrumb-area pricing-bg" style="background-image: url(assets/img/hero-images/Pricing.svg)">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <div class="breadcrumb-inner">
                      <h1 class="page-title">Pricing</h1>

                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- breadcrumb area End -->

  <!-- pricing area start -->
  <div class="pricing-page-area pd-top-30">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-xl-6">
                  <div class="section-title text-center pricing-header">
                      <div class="pricing-title-row">
                          <h2 class="title">Choose your pricing</h2>
                          <div class="currency-dropdown-wrapper">
                              <button class="currency-btn" id="currencyBtn">
                                  <span class="currency-code" id="currencyCode">INR-India</span>

                                  <svg class="currency-chevron" viewBox="0 0 10 6" width="10" height="6">
                                      <path d="M1 1l4 4 4-4" stroke="currentColor" stroke-width="1.5" fill="none"
                                          stroke-linecap="round" />
                                  </svg>

                              </button>

                              <ul class="currency-menu" id="currencyMenu"></ul>
                          </div>
                      </div>
                      <p>Choose the plan that fits how your team works today — and tomorrow.</p>
                  </div>
              </div>
          </div>



          <div class="container">


              <div class="personal-section-wrapper">

                  <!-- Section label -->
                  <p class="personal-section-label">For Individuals</p>

                  <!-- Personal card -->
                  <div class="card personal-card">
                      <div class="card-body personal-card__body">

                          <!-- LEFT: icon + title + subtitle + feature checkmarks -->
                          <div class="personal-card__left">
                              <div class="personal-card__title-row">
                                  <i class="fa fa-user-circle personal-card__icon" aria-hidden="true"></i>
                                  <span class="personal-card__name">Personal</span>
                                  <span class="personal-card__subtitle">Best for individual users</span>
                              </div>
                              <div class="personal-features-wrapper">
                                  <ul class="personal-card__features">
                                      <li><span class="personal-card__check">&#10003;</span> 1 User License</li>
                                      <li> <span class="personal-card__check">&#10003;</span> 5 GB Storage </li>
                                      <li><span class="personal-card__check">&#10003;</span> Personal Workspace</li>


                                  </ul>

                                  <ul class="personal-card__features">
                                      <li><span class="personal-card__check">&#10003;</span> Security Controls</li>
                                      <li> <span class="personal-card__check">&#10003;</span> Manage Infra </li>
                                      <li><span class="personal-card__check">&#10003;</span> App Integration </li>


                                  </ul>

                                  <ul class="personal-card__features">
                                      <li><span class="personal-card__check">&#10003;</span> Backup & Recovery </li>
                                      <li> <span class="personal-card__check">&#10003;</span> Storage Add-ons </li>
                                      <li><span class="personal-card__check">&#10003;</span>Feature Add-ons </li>


                                  </ul>
                              </div>

                          </div>

                          <!-- RIGHT: price + CTA + billing toggle -->
                          <div class="personal-card__right">
                              <div class="personal-card__price-cta">
                                  <div class="personal-card__price-row">
                                      <span class="personal-card__symbol">₹</span>
                                      <span class="personal-card__amount" id="personalPrice" data-monthly="399">199</span>
                                      <span class="personal-card__period" id="personalPeriodLabel">/month</span>
                                  </div>

                              </div>

                              <div class="personal-card__toggle-row">
                                  <span class="personal-card__toggle-label" id="personalMonthlyLabel">Monthly</span>
                                  <label class="toggle-switch">
                                      <input type="checkbox" class="billing-toggle" id="personalBillingToggle">
                                      <span class="toggle-slider"></span>
                                  </label>
                                  <span class="personal-card__toggle-label personal-card__yearly-label">
                                      Yearly <span class="personal-card__save-badge" id="personalSaveBadge">(Save 10%)</span>
                                  </span>
                              </div>
                              <a href="/payment.html" class="btn btn-primary personal-card__btn" id="personalGetStarted">
                                  Get Started
                              </a>
                          </div>

                      </div>

                      <!-- Annual savings strip — inside card, below the two columns -->
                      <div class="personal-annual-strip" id="personalAnnualStrip" style="display:none;"></div>
                  </div>

              </div>




              <div class="teams-section-wrapper">
                  <div class="shared-billing-toggle">

                      <!-- MONTHLY -->
                      <label class="billing-pill-btn active" id="sharedMonthlyBtn">
                          <input
                              type="radio"
                              name="subscription"
                              value="monthly"
                              class="ul-subscription-type"
                              checked
                              hidden>

                          Monthly
                          @if($additional_disc_month > 0)
                          <span class="save-badge">Save {{$additional_disc_month}}%</span>
                          @endif
                      </label>

                      <!-- YEARLY -->
                      <label class="billing-pill-btn" id="sharedYearlyBtn">
                          <input
                              type="radio"
                              name="subscription"
                              value="yearly"
                              class="ul-subscription-type"
                              hidden>

                          Annually
                          @if($additional_disc_year > 0)
                          <span class="save-badge">Save {{$additional_disc_year}}%</span>
                          @endif
                      </label>

                  </div>

                  <p class="teams-section-label">For Teams</p>

                  <div class="pricing-cards monthly-plans">

                      @if (!empty($userLicenseData['userLicenseDetails']['planLists']))
                      @foreach ($userLicenseData['userLicenseDetails']['planLists'] as $plan)

                      <div class="cards {{ strtolower($plan->plans_name) }}">
                          <div class="card bg-light border-secondary h-100">
                              <div class="card-body d-flex flex-column p-4">

                                  <h2 class="fw-semibold mb-3">{{ $plan->plans_name }}</h2>

                                  <!-- Hidden backend values -->
                                  <span class="incr-currency-data hidden" style="display:none;">{{ $plan->currency }}</span>
                                  <span class="incr-amount-data hidden" style="display:none;">{{ $plan->plans_amount }}</span>
                                  <span class="incr-subscription-data hidden" style="display:none;">{{ $plan->plans_subscription_type }}</span>
                                  <span class="incr-license-count-data hidden" style="display:none;">{{ $plan->plans_license }}</span>
                                  <span class="incr-poolstorage-count-data hidden" style="display:none;">{{ $plan->pool_storage }}</span>
                                  <span class="selected-storage hidden">
                                      {{ $plan->plans_license }}
                                  </span>
                                  <h6 class="display-4 fw-bold mb-2 price">
                                      {{ $plan->currency }}
                                      <span class="price-amount"
                                          data-monthly="{{ $plan->plans_amount }}">
                                          {{ $plan->plans_amount }}
                                      </span>
                                      <span class="user-text">
                                          per user/{{ $plan->plans_subscription_type }}

                                          @if(!empty($plan->discount) && $plan->discount > 0)
                                          <span class="save-badge">Save {{ $plan->discount }}%</span>
                                          @endif
                                      </span>
                                  </h6>

                                  <p class="mb-4 pricing-subheading text-black">
                                      {{ $plan->plans_content }}
                                  </p>

                                  <ul class="list-unstyled mb-4 flex-grow-1 feature-list">

                                      <li class="mb-3 d-flex align-items-start">
                                          <span class="fw-semibold feature-list-subheading">
                                              {{ $plan->plans_headings }}
                                          </span>
                                      </li>

                                      <li class="mb-3 d-flex align-items-start">
                                          <span>Licence Count :&nbsp;</span>
                                          <span class="base-licence-count">{{ $plan->plans_license }}</span>
                                      </li>

                                      <li class="mb-3 d-flex align-items-start">
                                          <span>Per User Storage :&nbsp;</span>
                                          <span class="base-storage">{{ $plan->plans_users }}</span>&nbsp;{{ $plan->storage_unit }}
                                      </li>

                                      <li class="mb-3 d-flex align-items-start">
                                          <div class="quantity-box ul-quantity-container">
                                              <button type="button" class="qty-btn minus ul-decrement">−</button>
                                              <input type="text" class="qty-input ul-quantity-input" value="1" readonly>
                                              <button type="button" class="qty-btn plus ul-increment">+</button>
                                          </div>
                                      </li>

                                      <li class="mb-3 d-flex align-items-start">
                                          <span>Total Licence Count :&nbsp;</span>
                                          <span class="view-total-license-count"></span>
                                      </li>

                                      <li class="mb-3 d-flex align-items-start">
                                          <span>Total Pool Storage :&nbsp;</span>
                                          <span class="view-total-poolstorage-count"></span>
                                      </li>

                                      <li class="mb-3 d-flex align-items-start">
                                          <span>Total Amount :&nbsp;</span>
                                          <span class="view-currency"></span>
                                          <span class="view-total-amount-count"></span>
                                      </li>

                                  </ul>

                                  <div class="pricing-buttons ul-buy-btn">
                                      <form action="{{ url('payment/') }}" method="GET">
                                          <button class="btn btn-outline-secondary purchase purchase-ul"
                                              data-id="{{ $plan->id }}"
                                              data-plan="{{ $plan->plans_name }}"
                                              data-purchasetitle="Confirm Your Purchase"
                                              data-purchasedesc="Are you sure you want to purchase the {{ $plan->plans_name }} Subscription ?"
                                              data-amount="{{ $plan->plans_amount }}"
                                              data-currency="{{ $plan->currency }}"
                                              data-discount="{{ $plan->discount }}"
                                              data-extradiscount="{{ $plan->extra_disc }}"
                                              data-subscription="{{ $plan->plans_subscription_type }}"
                                              data-users="{{ $plan->plans_users }}"
                                              data-storage="{{ $plan->plans_license }}"
                                              data-storageunit="{{ $plan->storage_unit }}"
                                              data-description="{{ $plan->plans_content }}">
                                              Get started
                                          </button>
                                      </form>
                                  </div>

                              </div>
                          </div>
                      </div>

                      @endforeach

                      @endif

                  </div>
                  <div class="pricing-cards yearly-plans hidden">

                      @if (!empty($userLicenseData['userLicenseDetails']['planListsYear']))
                      @foreach ($userLicenseData['userLicenseDetails']['planListsYear'] as $plan)

                      <div class="cards {{ strtolower($plan->plans_name) }}">
                          <div class="card bg-light border-secondary h-100">
                              <div class="card-body d-flex flex-column p-4">

                                  <h2 class="fw-semibold mb-3">{{ $plan->plans_name }}</h2>

                                  <!-- Hidden backend values -->
                                  <span class="incr-currency-data hidden" style="display:none;">{{ $plan->currency }}</span>
                                  <span class="incr-amount-data hidden" style="display:none;">{{ $plan->plans_amount }}</span>
                                  <span class="incr-subscription-data hidden" style="display:none;">{{ $plan->plans_subscription_type }}</span>
                                  <span class="incr-license-count-data hidden" style="display:none;">{{ $plan->plans_license }}</span>
                                  <span class="incr-poolstorage-count-data hidden" style="display:none;">{{ $plan->pool_storage }}</span>
                                  <span class="selected-storage hidden">
                                      {{ $plan->plans_license }}
                                  </span>
                                  <h6 class="display-4 fw-bold mb-2 price">
                                      {{ $plan->currency }}
                                      <span class="price-amount">
                                          {{ $plan->plans_amount }}
                                      </span>
                                      <span class="user-text">
                                          per user/{{ $plan->plans_subscription_type }}

                                          @if(!empty($plan->discount) && $plan->discount > 0)
                                          <span class="save-badge">Save {{ $plan->discount }}%</span>
                                          @endif
                                      </span>
                                  </h6>

                                  <p class="mb-4 pricing-subheading text-black">
                                      {{ $plan->plans_content }}
                                  </p>

                                  <ul class="list-unstyled mb-4 flex-grow-1 feature-list">

                                      <li class="mb-3 d-flex align-items-start">
                                          <span class="fw-semibold feature-list-subheading">
                                              {{ $plan->plans_headings }}
                                          </span>
                                      </li>

                                      <li class="mb-3 d-flex align-items-start">
                                          <span>Licence Count :&nbsp;</span>
                                          <span class="base-licence-count">{{ $plan->plans_license }}</span>
                                      </li>

                                      <li class="mb-3 d-flex align-items-start">
                                          <span>Per User Storage :&nbsp;</span>
                                          <span class="base-storage">{{ $plan->plans_users }}</span>&nbsp;{{ $plan->storage_unit }}
                                      </li>

                                      <li class="mb-3 d-flex align-items-start">
                                          <div class="quantity-box ul-quantity-container">
                                              <button type="button" class="qty-btn minus ul-decrement">−</button>
                                              <input type="text" class="qty-input ul-quantity-input" value="1" readonly>
                                              <button type="button" class="qty-btn plus ul-increment">+</button>
                                          </div>
                                      </li>

                                      <li class="mb-3 d-flex align-items-start">
                                          <span>Total Licence Count :&nbsp;</span>
                                          <span class="view-total-license-count"></span>
                                      </li>

                                      <li class="mb-3 d-flex align-items-start">
                                          <span>Total Pool Storage :&nbsp;</span>
                                          <span class="view-total-poolstorage-count"></span>
                                      </li>

                                      <li class="mb-3 d-flex align-items-start">
                                          <span>Total Amount :&nbsp;</span>
                                          <span class="view-currency"></span>
                                          <span class="view-total-amount-count"></span>
                                      </li>

                                  </ul>

                                  <div class="pricing-buttons ul-buy-btn">
                                      <form action="{{ url('payment') }}" method="GET">
                                          <button type="button"
                                              class="btn btn-outline-secondary purchase-ul"
                                              data-id="{{ $plan->id }}"
                                              data-plan="{{ $plan->plans_name }}"
                                              data-amount="{{ $plan->plans_amount }}"
                                              data-currency="{{ $plan->currency }}"
                                              data-license="{{ $plan->plans_license }}"
                                              data-storage="{{ $plan->pool_storage }}">
                                              Get Started
                                          </button>
                                      </form>
                                  </div>

                              </div>
                          </div>
                      </div>

                      @endforeach
                      @endif

                  </div>
              </div>

          </div>

      </div>
  </div>
  <!-- pricing area End -->




  <!-- back to top area start -->
  <div class="back-to-top">
      <span class="back-top"><i class="fa fa-angle-up"></i></span>
  </div>
  <!-- back to top area end -->
  <script>

document.querySelectorAll(".purchase-ul").forEach(function(btn){

btn.addEventListener("click", function(e){

e.preventDefault();

let card = this.closest(".card");
let planId = this.dataset.id;
let planName = this.dataset.plan;
let currency = card.querySelector(".view-currency").innerText.trim();
let totalAmount = card.querySelector(".view-total-amount-count").innerText.trim();
let totalLicense = card.querySelector(".view-total-license-count").innerText.trim();
let totalStorage = card.querySelector(".view-total-poolstorage-count").innerText.trim();

let url = "/pocketoffice/payment?"
+ "plan_id=" + planId  
+ "&plan_name=" + encodeURIComponent(planName)
+ "&amount=" + totalAmount
+ "&currency=" + currency
+ "&license=" + totalLicense
+ "&storage=" + totalStorage;

window.location.href = url;

});

});

</script>
  @include('partials.footer')