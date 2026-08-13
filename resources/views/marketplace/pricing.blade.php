  @extends('layouts.backendsettings')
  @section('title', 'Affordable Cloud Desktop Plans for Teams & Businesses | Pocket Office')
  <style>
      .currency-select {
          padding: 10px 14px;
          border: 1px solid #ddd;
          border-radius: 8px;
          min-width: 220px;
          font-size: 14px;
          cursor: pointer;
          outline: none;
      }
  </style>

  <style>
      /* Responsive Currency Dropdown overrides */
      /* Responsive Currency Dropdown overrides */
      .currency-header-container {
          position: relative !important;
          z-index: 4 !important;
      }

      .pricing-title-row .currency-dropdown-wrapper {
          position: relative !important;
          display: inline-block !important;
          left: auto !important;
          right: auto !important;
          top: auto !important;
          margin-top: 12px !important;
          max-width: 100% !important;
          width: auto !important;
          vertical-align: middle;
      }

      @media (min-width: 992px) {
          .currency-header-container {
              display: flex !important;
              align-items: center;
              justify-content: center;
          }

          .pricing-header {
              margin-bottom: 0 !important;
              flex-grow: 1;
              text-align: center;
          }

          .pricing-title-row {
              position: absolute !important;
              right: 15px !important;
              top: 50% !important;
              transform: translateY(-50%) !important;
              margin-top: 0 !important;
          }

          .pricing-title-row .currency-dropdown-wrapper {
              margin-top: 0 !important;
          }
      }

      .currency-btn {
          display: inline-flex;
          align-items: center;
          justify-content: space-between;
          gap: 10px;
          border: 1px solid #ddd;
          padding: 6px 16px;
          border-radius: 8px;
          background: #fff;
          cursor: pointer;
          max-width: 100%;
          box-sizing: border-box;
          transition: all 0.2s ease-in-out;
      }

      .currency-btn:hover {
          border-color: #057A96;
          box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
      }

      .currency-code {
          white-space: nowrap;
          overflow: hidden;
          text-overflow: ellipsis;
          font-weight: 400;
          font-size: 14px;
          color: #5b6880;
          flex: 1;
          min-width: 0;
      }

      .currency-menu {
          position: absolute;
          top: 115%;
          left: 50%;
          right: auto;
          transform: translateX(-50%);
          width: 280px;
          max-width: calc(100vw - 32px);
          background: #fff;
          border: 1px solid #ddd;
          border-radius: 10px;
          padding: 8px 0;
          margin: 0;
          list-style: none;
          display: none;
          z-index: 9999;
          max-height: 250px;
          overflow-y: auto;
          box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      }

      .currency-menu.open {
          display: block;
      }

      .currency-menu li {
          padding: 10px 14px;
          cursor: pointer;
          transition: 0.2s;
          font-size: 14px;
          text-align: left;
      }

      .currency-menu li:hover {
          background: #f5f5f5;
      }

      .currency-search-li {
          padding: 8px 10px;
          border-bottom: 1px solid #eee;
      }

      #currencySearch {
          width: 100%;
          padding: 8px 10px;
          border: 1px solid #ddd;
          border-radius: 6px;
          outline: none;
          font-size: 14px;
      }

      .price-wrapper {
          display: flex;
          align-items: center;
          gap: 2px;
      }

      .original-price {
          margin-top: 1px;
          font-size: 16px;
          color: #8a8a8a;
          text-decoration: line-through;
          text-decoration-color: #b5b5b5;
          opacity: 0.8;
      }
  </style>

  @section('content')
      <!-- breadcrumb area start -->
      <div class="breadcrumb-area pricing-bg" style="background-image: url(assets/img/hero-images/Pricing.svg)">
          <div class="content-wrapper">
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
          <div class="content-wrapper">

              <!-- currency  -->
              <div class="row justify-content-center text-center">
                  <div class="col-xl-12 currency-header-container">
                      <div class="section-title text-center pricing-header">
                          <p>
                              Choose the plan that fits how your team works today — and tomorrow.
                          </p>
                      </div>
                      <div class="pricing-title-row">
                          <div class="currency-dropdown-wrapper">
                              @php
                                  $selectedCurrencyData = $currencies->firstWhere('currency_code', $selectedCurrency);
                              @endphp

                              <!-- Button -->
                              <button type="button" class="currency-btn" id="currencyBtn">

                                  <span class="currency-code" id="currencyCode">

                                      {{ $selectedCurrencyData->currency_code ?? '' }}

                                      ({{ $selectedCurrencyData->currency_symbol ?? '' }})

                                      –

                                      {{ $selectedCurrencyData->country_name ?? '' }}

                                  </span>

                                  <svg class="currency-chevron" viewBox="0 0 10 6" width="10" height="6">

                                      <path d="M1 1l4 4 4-4" stroke="currentColor" stroke-width="1.5" fill="none"
                                          stroke-linecap="round" />

                                  </svg>

                              </button>

                              <!-- Dropdown -->
                              <ul class="currency-menu" id="currencyMenu">

                                  <!-- Search -->
                                  <li class="currency-search-li">

                                      <input id="currencySearch" type="text" placeholder="Search country or code…"
                                          autocomplete="off" />

                                  </li>

                                  <!-- Currency List -->
                                  @foreach ($currencies as $currency)
                                      <li class="{{ $currency->currency_code == $selectedCurrency ? 'active' : '' }}"
                                          data-currency="{{ $currency->currency_code }}"
                                          data-symbol="{{ $currency->currency_symbol }}"
                                          data-amount="{{ $currency->actual_amount }}"
                                          data-country="{{ $currency->country_name }}"
                                          data-base="{{ $currency->is_base_currency }}">


                                          {{ $currency->currency_code }}

                                          ({{ $currency->currency_symbol }})
                                          –

                                          {{ $currency->country_name }}

                                          @if ($currency->is_base_currency == 1)
                                              - Base Currency
                                          @endif

                                      </li>
                                  @endforeach

                              </ul>

                          </div>

                      </div>
                  </div>
              </div>

              <div class="container">

                  <!-- for single user  -->
                  <div class="personal-section-wrapper">
                      <p class="personal-section-label">For Individuals</p>
                      @if (!empty($userLicenseData['getPlanList']['planListsSingle']))
                          @foreach ($userLicenseData['getPlanList']['planListsSingle'] as $plan)
                              @if ($plan->is_single_user == 1)
                                  <div class="card personal-card js-month-card">
                                      <div class="card-body personal-card__body">
                                          <div class="personal-card__left">
                                              <div class="personal-card__title-row">
                                                  <div class="po-plan-icon" aria-hidden="true">
                                                        <svg viewBox="0 0 24 24" fill="none">
                                                              <path d="M20 21a8 8 0 0 0-16 0" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"></path>
                                                              <path d="M12 13a5 5 0 1 0 0-10 5 5 0 0 0 0 10Z" stroke="currentColor" stroke-width="1.8"></path>
                                                          </svg>
                                                    </div>
                                                  <span class="personal-card__name">Personal</span>
                                                  ({{ $plan->plans_name }})
                                                  <span class="personal-card__subtitle">Best for individual users</span>
                                              </div>
                                              <div class="personal-features-wrapper">
                                                  <ul class="personal-card__features">
                                                      <li>
                                                          <span class="personal-card__check">&#10003;</span>
                                                          {{ $plan->plans_license }}
                                                          User License
                                                      </li>
                                                      <li>
                                                          <span class="personal-card__check">&#10003;</span>
                                                          {{ $plan->plans_users }} {{ $plan->storage_unit }}
                                                          Storage
                                                      </li>
                                                      <li>
                                                          <span class="personal-card__check">&#10003;</span>
                                                          Personal Cloud Desktop
                                                      </li>
                                                  </ul>

                                                  <ul class="personal-card__features">
                                                      <li>
                                                          <span class="personal-card__check">&#10003;</span>
                                                          Data Security
                                                      </li>
                                                      <li>
                                                          <span class="personal-card__check">&#10003;</span>
                                                          Managed IT Services
                                                      </li>
                                                      <li>
                                                          <span class="personal-card__check">&#10003;</span> Apps & Software
                                                      </li>
                                                  </ul>

                                                  <ul class="personal-card__features">
                                                      <li>
                                                          <span class="personal-card__check">&#10003;</span>
                                                          Automatic Backup
                                                      </li>
                                                      <li>
                                                          <span class="personal-card__check">&#10003;</span>
                                                          Extra Storage
                                                      </li>
                                                      <li>
                                                          <span class="personal-card__check">&#10003;</span>Additional
                                                          Features
                                                      </li>
                                                  </ul>
                                              </div>
                                          </div>

                                          <div class="personal-card__right">
                                              <div class="personal-card__price-cta">
                                                  <div class="personal-card__price-row">
                                                      <span class="extra-discount-ul hidden"
                                                          data-monthly="{{ $plan->single_user_monthly_extra_disc ?? 0 }}"
                                                          data-yearly="{{ $plan->single_user_yearly_extra_disc ?? 0 }}">
                                                      </span>
                                                      <span class="personal-card__symbol personal-card-symbol-ul"></span>
                                                      <span class="personal-card__amount ul-personal-card-amount"
                                                          data-monthly-discount="{{ $plan->single_user_monthly_discount ?? 0 }}"
                                                          data-yearly-discount="{{ $plan->single_user_yearly_discount ?? 0 }}"
                                                          data-extra-monthly-constant="{{ $additional_disc_month ?? 0 }}"
                                                          data-extra-yearly-constant="{{ $additional_disc_year ?? 0 }}"
                                                          data-extra-monthly="{{ $plan->single_user_monthly_extra_disc ?? 0 }}"
                                                          data-extra-yearly="{{ $plan->single_user_yearly_extra_disc ?? 0 }}">
                                                      </span>
                                                      <span class="personal-card__period ul-personal-card-period"
                                                          id="personalPeriodLabel">/{{ $plan->plans_subscription_type }}</span>
                                                  </div>
                                              </div>
                                              <div class="flex original-price original-price-single">
                                                  <span class="personal-card-symbol-ul"></span> <span
                                                      class="ul-original-price"></span>
                                                  <span class="ul-personal-card-period"></span>
                                              </div>

                                              <div class="personal-card__toggle-row">
                                                  <span class="personal-card__toggle-label"
                                                      id="personalMonthlyLabel">Monthly
                                                      @if ($additional_disc_month_single > 0)
                                                          <span class="personal-card__save-badge" id="personalSaveBadge">
                                                              (Save {{ $additional_disc_month_single }}%)
                                                          </span>
                                                      @else
                                                      @endif
                                                  </span>
                                                  <label class="toggle-switch">
                                                      <input type="checkbox"
                                                          class="billing-toggle js-billing-toggle single-user-toggle" />
                                                      <span class="toggle-slider"></span>
                                                  </label>
                                                  <span class="personal-card__toggle-label personal-card__yearly-label">
                                                      Yearly
                                                      @if ($additional_disc_year_single > 0)
                                                          <span class="personal-card__save-badge" id="personalSaveBadge">
                                                              (Save {{ $additional_disc_year_single }}%)
                                                          </span>
                                                      @else
                                                      @endif
                                                  </span>
                                              </div>

                                              <button class="btn btn-primary personal-card__btn js-select-plan"
                                                  data-plan-type="single" data-name="{{ $plan->plans_name }}"
                                                  data-license="{{ $plan->plans_license }}"
                                                  data-storage="{{ $plan->plans_users }}"
                                                  data-plan-id="{{ $plan->id }}"
                                                  data-plan-discount="{{ $plan->single_user_monthly_discount }}"
                                                  data-storage-unit="{{ $plan->storage_unit }}">
                                                  Get Started
                                              </button>
                                          </div>
                                      </div>

                                      @php
                                          $main = $plan->single_user_monthly_discount ?? 0;
                                          $extra = $plan->single_user_monthly_extra_disc ?? 0;

                                          $totalDiscount = $main + $extra;

                                          $parts = [];

                                          if ($main > 0) {
                                              $parts[] = $main . '% off Individual  user discount';
                                          }

                                          if ($extra > 0) {
                                              $parts[] = $extra . '% special offer for annual billing';
                                          }
                                      @endphp

                                      @if (count($parts))
                                          <div class="personal-annual-strip show-strip-month">
                                              <img class="party-popover" src="/assets/img/party-popover.png" alt="popover"> {{ implode(' + ', $parts) }} — You save total {{ $totalDiscount }}% on
                                              monthly payment
                                          </div>
                                      @endif




                                      @php
                                          $main = $additional_disc_year_single ?? 0;
                                          $extra = $plan->single_user_yearly_extra_disc ?? 0;
                                          $totalDiscount = $main + $extra;
                                      @endphp

                                      @if ($main > 0 || $extra > 0)
                                          <div class="personal-annual-strip show-strip"
                                              style="display: block; display: none;">
                                              <img class="party-popover" src="/assets/img/party-popover.png" alt="popover">

                                              @if ($main > 0)
                                                  {{ $main }}% off Individual user discount
                                              @endif

                                              @if ($main > 0 && $extra > 0)
                                                  +
                                              @endif

                                              @if ($extra > 0)
                                                  {{ $extra }}% special offer for annual billing
                                              @endif

                                              — You save total {{ $totalDiscount }}% on annual payment
                                          </div>
                                      @endif

                                  </div>
                              @endif
                          @endforeach
                      @endif
                  </div>

                  <!-- For Team -->
                  <div class="teams-section-wrapper">
                      <div class="shared-billing-toggle">
                          <button class="billing-pill-btn active ul-tab-name team-billing-toggle" data-type="monthly">
                              Monthly
                              @if ($additional_disc_month > 0)
                                  <span class="ul-save-badge save-badge">
                                      Save Extra {{ $additional_disc_month }}%
                                  </span>
                              @else
                              @endif

                          </button>
                          <button class="billing-pill-btn ul-tab-name team-billing-toggle" data-type="yearly">
                              Annually
                              @if ($additional_disc_year > 0)
                                  <span class="ul-save-badge save-badge">
                                      ({{ $additional_disc_year }}% Discount)
                                  </span>
                              @else
                              @endif
                          </button>
                      </div>

                      <p class="teams-section-label">For Teams</p>
                      <div class="pricing-cards">
                          @if (!empty($userLicenseData['getPlanList']['planLists']))
                              @foreach ($userLicenseData['getPlanList']['planLists'] as $plan)
                                  @php
                                      $planName = $plan->plans_name;
                                      $features = json_decode($plan->features ?? '[]', true);
                                      $features = is_array($features) ? $features : [];
                                      $promotionText = json_decode($plan->promotion_text ?? '[]', true);
                                      $promotionText = is_array($promotionText) ? $promotionText : [];
                                      $minimumLicenses =
                                          $plan->minimum_licenses ??
                                          match ($planName) {
                                              'Basic' => 2,
                                              'Standard' => 10,
                                              'Advanced' => 50,
                                              'Premium' => 100,
                                              default => (int) ($plan->default_qty ?? ($plan->plans_license ?? 1)),
                                          };
                                      $defaultLicenses = max(
                                          (int) ($plan->default_qty ?? $minimumLicenses),
                                          (int) $minimumLicenses,
                                      );
                                      $isPopular = $planName === 'Advanced';
                                  @endphp
                                  <div class="monthly-plans" data-is-team="1">

                                      <div
                                          class="card h-100 ul-cards po-pricing-card {{ $isPopular ? 'po-pricing-card--popular' : '' }}">
                                          @if ($isPopular)
                                              <div class="po-popular-ribbon"><i class="fa-solid fa-star"></i> MOST POPULAR</div>
                                          @endif
                                          <div class="card-body d-flex flex-column po-pricing-card__body">
                                              <div class="po-pricing-card__header d-flex">
                                                  <div class="po-plan-icon" aria-hidden="true">
                                                      @if ($planName === 'Basic')
                                                          <svg viewBox="0 0 24 24" fill="none">
                                                              <path d="M20 21a8 8 0 0 0-16 0" stroke="currentColor"
                                                                  stroke-width="1.8" stroke-linecap="round" />
                                                              <path d="M12 13a5 5 0 1 0 0-10 5 5 0 0 0 0 10Z"
                                                                  stroke="currentColor" stroke-width="1.8" />
                                                          </svg>
                                                      @elseif($planName === 'Standard')
                                                          <svg viewBox="0 0 24 24" fill="none">
                                                              <path d="M3 3v18h18" stroke="currentColor"
                                                                  stroke-width="1.8" stroke-linecap="round" />
                                                              <path d="m7 15 4-4 3 3 5-7" stroke="currentColor"
                                                                  stroke-width="1.8" stroke-linecap="round"
                                                                  stroke-linejoin="round" />
                                                          </svg>
                                                      @elseif($planName === 'Advanced')
                                                          <svg viewBox="0 0 24 24" fill="none">
                                                              <path d="m3 8 5 4 4-7 4 7 5-4-2 11H5L3 8Z"
                                                                  stroke="currentColor" stroke-width="1.8"
                                                                  stroke-linejoin="round" />
                                                              <path d="M5 19h14" stroke="currentColor" stroke-width="1.8"
                                                                  stroke-linecap="round" />
                                                          </svg>
                                                      @else
                                                          <svg viewBox="0 0 24 24" fill="none">
                                                              <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10Z"
                                                                  stroke="currentColor" stroke-width="1.8"
                                                                  stroke-linejoin="round" />
                                                              <path d="m9 12 2 2 4-5" stroke="currentColor"
                                                                  stroke-width="1.8" stroke-linecap="round"
                                                                  stroke-linejoin="round" />
                                                          </svg>
                                                      @endif
                                                  </div>
                                                  <div>
                                                     <h2 class="po-plan-name" data-plan-name="{{ $planName }}">
                                                      {{ $planName }}</h2>
                                                     <p class="pricing-subheading po-plan-description">
                                                      {{ $plan->plans_content }}
                                                      </p>
                                                  </div>
                                                  
                                              </div>

                                              <span class="user-count-ul hidden">{{ $plan->plans_license }}</span>
                                              <span class="discount-ul hidden"
                                                  data-monthly="{{ $plan->is_team_discount_apply == 1 ? $plan->monthly_discount ?? 0 : 0 }}"
                                                  data-yearly="{{ $plan->is_team_discount_apply == 1 ? $plan->yearly_discount ?? 0 : 0 }}">
                                              </span>
                                              <span class="price-amount hidden"
                                                  data-base-amount="{{ $plan->plans_amount }}"
                                                  data-monthly="{{ $plan->plans_amount }}"
                                                  data-yearly="{{ $plan->plans_amount }}"></span>
                                              <span class="extra-discount-ul hidden"
                                                  data-monthly-constant="{{ $additional_disc_month ?? 0 }}"
                                                  data-yearly-constant="{{ $additional_disc_year ?? 0 }}"
                                                  data-monthly="{{ $plan->is_team_extraM_discount_apply == 1 ? $plan->monthly_extra_disc ?? 0 : 0 }}"
                                                  data-yearly="{{ $plan->is_team_extraY_discount_apply == 1 ? $plan->yearly_extra_disc ?? 0 : 0 }}">
                                              </span>


                                              <span class="incr-currency-data hidden">currency</span>
                                              <span class="incr-amount-data hidden">plans_amount</span>
                                              <span
                                                  class="incr-subscription-data hidden">{{ $plan->plans_subscription_type }}</span>
                                              <span
                                                  class="incr-license-count-data hidden">{{ $plan->plans_license }}</span>
                                              <span
                                                  class="incr-poolstorage-count-data hidden">{{ $plan->plans_users }}</span>


                                              <div class="po-price-block">
                                                  <div class="po-price-line">
                                                      <span class="personal-card-symbol-ul"></span><span
                                                          class="total-price-ul"
                                                          data-original-price="{{ $plan->plans_amount }}"
                                                          data-monthly="{{ $plan->plans_amount }}"
                                                          data-yearly="{{ $plan->plans_amount }}"></span>
                                                      <span class="po-price-unit">/ user / <span
                                                              class="user-text">month</span></span>
                                                  </div>
                                              </div>

                                              <div class="po-license-block">
                                                  <div class="po-license-label">License Count</div>
                                                  <div class="quantity-box ul-quantity-container">
                                                      <button class="qty-btn ul-decrement" type="button">−</button>
                                                      <input type="text" class="qty-input ul-quantity-input"
                                                          value="{{ $defaultLicenses }}"
                                                          data-default-qty="{{ $minimumLicenses }}" readonly />
                                                      <button class="qty-btn ul-increment" type="button">+</button>
                                                  </div>
                                                   @if($planName === 'Basic')
                                                   <p class="po-minimum-note">Note: Minimum of {{ $minimumLicenses }} licenses
                                                       must be selected.</p>
                                                   @else
                                                   <p class="po-minimum-note" style="visibility: hidden; pointer-events: none; user-select: none;">Note: Minimum of 2 licenses
                                                       must be selected.</p>
                                                   @endif
                                              </div>

                                              <div class="po-summary feature-list">
                                                  <h3 class="feature-list-subheading po-summary-title">Price Summary</h3>
                                                  <div class="po-summary-row">
                                                      <span class="base-user-label">Base User / Month</span>
                                                      <div>
                                                          <span class="view-currency" style="gap:3px">-</span>
                                                          <span class="base-price">{{ $plan->plans_amount }}</span>
                                                      </div>
                                                  </div>
                                                  <div class="po-summary-row">
                                                      <span>Users</span>
                                                      <span class="total-licence-count view-total-license-count"></span>
                                                  </div>
                                                  <div class="po-summary-row billing-months-row">
                                                      <span>Yearly</span>
                                                      <span class="billing-yearly-calculation"></span>
                                                  </div>
                                                  <hr>
                                                  <div class="po-summary-row">
                                                      <span>Base Total</span>
                                                      <div>
                                                          <span class="view-currency" style="gap:3px"></span>
                                                          <span class="total-amount view-total-amount-count"></span>
                                                      </div>
                                                  </div>
                                                  <div discount-apply="{{ $plan->is_team_discount_apply }}"
                                                      class="po-summary-row po-summary-row--discount monthly-discount-row">
                                                      <span>Discount <span class="discount-percent-badge"></span></span>
                                                      <div>
                                                          <span>-</span><span class="view-currency" style="gap:3px"></span>
                                                          <span class="total-discount view-total-discount-count"></span>
                                                      </div>
                                                  </div>
                                                  <div
                                                      class="po-summary-row po-summary-row--discount annual-plan-discount-row">
                                                      <span>Plan Discount</span>
                                                      <strong><span class="plan-discount-percent"></span></strong>
                                                  </div>
                                                  <div
                                                      class="po-summary-row po-summary-row--discount annual-billing-discount-row">
                                                      <span>Annual Billing Discount</span>
                                                      <strong><span class="annual-discount-percent"></span></strong>
                                                  </div>
                                                  <div
                                                      class="po-summary-row po-summary-row--discount annual-total-discount-row">
                                                      <span>Total Discount</span>
                                                      <strong><span class="annual-total-discount-percent"></span></strong>
                                                  </div>
                                                  <div class="total-amt-sty">
                                                      <div>
                                                          <p class="total-period-label">(Total Per Month)</p>
                                                          <div class="po-total-amount">
                                                              <span class="view-currency" style="gap:3px">-</span>
                                                              <span class="total-amount view-total-amount-count">999</span>
                                                          </div>
                                                      </div>
                                                      <hr>
                                                      <div
                                                          class="po-save-line d-flex align-items-center justify-content-between">
                                                          <div><i class="fa-solid fa-tag"></i> You Save</div>
                                                          <div class="view-status"><span class="view-currency">-</span><span
                                                                  class="total-savings view-total-savings-count">0</span>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                              <!-- discount  -->
                                             <div class="discount-cards">  
                                              <div class="ul-discount ul-save-badge"
                                                  data-discount-apply="{{ $plan->is_team_discount_apply }}"
                                                  data-extra-monthly-apply="{{ $plan->is_team_extraM_discount_apply }}"
                                                  data-extra-yearly-apply="{{ $plan->is_team_extraY_discount_apply }}"
                                                  data-monthly-discount="{{ $plan->monthly_discount ?? 0 }}"
                                                  data-yearly-discount="{{ $plan->yearly_discount ?? 0 }}"
                                                  data-monthly-extra="{{ $plan->monthly_extra_disc ?? 0 }}"
                                                  data-yearly-extra="{{ $plan->yearly_extra_disc ?? 0 }}"
                                                  data-monthly-text="{{ $promotionText['monthly'] ?? '' }}"
                                                  data-yearly-text="{{ $promotionText['yearly'] ?? '' }}">
                                              </div>
                                              </div>
                                              <ul class="list-unstyled po-feature-list flex-grow-1">
                                                  @foreach ($features as $feature)
                                                      <li><i
                                                              class="fa-solid fa-check fa-check-green"></i>{{ $feature }}
                                                      </li>
                                                  @endforeach
                                              </ul>





                                              <!-- <div class="ul-discount ul-save-badge team-discount-badge" -->
                                              <!-- @if ($plan->is_team_discount_apply == 1 || $plan->is_team_extra_discount_apply == 1)
    <div class="ul-discount ul-save-badge "
                        data-is-single="{{ $plan->is_team_discount_apply }}"
                        data-monthly="{{ $plan->is_team_discount_apply == 1 ? 0 : $plan->monthly_discount ?? 0 }}"
                        data-yearly="{{ $plan->is_team_discount_apply == 1 ? 0 : $plan->yearly_discount ?? 0 }}">
                        🎉 {{ $plan->monthly_discount }}% off — Enjoy extra savings with monthly billing
                      </div>
    @endif -->

                                              <!-- @php
                                                  $billing_type =
                                                      $plan->plans_subscription_type == 'month' ? 'monthly' : 'yearly';
                                              @endphp

                      @if (
                          $plan->is_team_discount_apply == 1 ||
                              ($billing_type == 'monthly' && $plan->is_team_extraM_discount_apply == 1) ||
                              ($billing_type == 'yearly' && $plan->is_team_extraY_discount_apply == 1))
    <div class="ul-discount ul-save-badge"
                        data-is-single="{{ $plan->is_team_discount_apply }}"
                        data-monthly="{{ $plan->monthly_discount ?? 0 }}"
                        data-yearly="{{ $plan->yearly_discount ?? 0 }}">

                        @if ($billing_type == 'monthly')
    @if ($plan->is_team_discount_apply == 1 && $plan->is_team_extraM_discount_apply == 1)
    🎉 Enjoy {{ $plan->monthly_discount }}% OFF + Special Offer: Extra {{ $plan->monthly_extra_disc }}% OFF
@elseif($plan->is_team_discount_apply == 1)
    🎉 Enjoy {{ $plan->monthly_discount }}% OFF
@elseif($plan->is_team_extraM_discount_apply == 1)
    🎉 Special Offer: Extra {{ $plan->monthly_extra_disc }}% OFF
    @endif
@else
    @if ($plan->is_team_discount_apply == 1 && $plan->is_team_extraY_discount_apply == 1)
    🎉 {{ $plan->yearly_discount }}% Yearly OFF + Special Offer: Extra {{ $plan->yearly_extra_disc }}% OFF
@elseif($plan->is_team_discount_apply == 1)
    🎉 {{ $plan->yearly_discount }}% Yearly OFF
@elseif($plan->is_team_extraY_discount_apply == 1)
    🎉 Special Offer: Extra {{ $plan->yearly_extra_disc }}% OFF
    @endif
    @endif

                      </div>
    @endif -->


                                              <!-- Annual badge lives here, injected by JS -->
                                              <div class="pricing-buttons pricingButtons">
                                                  <button class="btn btn-outline-secondary team-js-select-plan"
                                                      data-plan-type="team" data-plan-id="{{ $plan->id }}"
                                                      data-name="{{ $plan->plans_name }}"
                                                      data-license="{{ $plan->plans_license }}"
                                                      data-storage="{{ $plan->plans_users }}"
                                                      data-default-qty="{{ $minimumLicenses }}"
                                                      data-storage-unit="{{ $plan->storage_unit }}">
                                                      Get Started
                                                  </button>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              @endforeach
                          @endif
                      </div>
                      <!-- /.pricing-cards -->
                  </div>
              </div>

              <!-- for compare  -->
              <div class="container py-5">
                  <div class="table-responsive">
                      <table class="table pricing-table text-center align-middle" id="pricingTable">
                          <thead>
                              <tr>
                                  <th></th>

                                  {{-- Single User Plan --}}
                                  @foreach ($userLicenseData['getPlanList']['planListsSingle'] as $singlePlan)
                                      <th data-plan-col="personal" class="ul-pricing-tbl-single"
                                          style="min-width:130px;">
                                          (Personal)<br>{{ $singlePlan->plans_name }}<br>
                                          <span class="table-plan-price">
                                              <span class="table-plan-symbol">{{ $currencySymbol }}</span>

                                              <span class="table-plan-amount"
                                                  data-monthly-discount="{{ $singlePlan->single_user_monthly_discount ?? 0 }}"
                                                  data-yearly-discount="{{ $singlePlan->single_user_yearly_discount ?? 0 }}"
                                                  data-extra-monthly="{{ $singlePlan->single_user_monthly_extra_disc ?? 0 }}"
                                                  data-extra-yearly="{{ $singlePlan->single_user_yearly_extra_disc ?? 0 }}">
                                              </span>

                                              <small class="table-plan-period">
                                                  user/{{ $singlePlan->plans_subscription_type }}
                                              </small>
                                          </span>
                                      </th>
                                  @endforeach

                                  {{-- Team Plans --}}
                                  @foreach ($userLicenseData['getPlanList']['planLists'] as $plan)
                                      <th class="ul-pricing-tbl-team"
                                          data-team-discount="{{ $plan->is_team_discount_apply }}"
                                          style="min-width:130px;">
                                          (Team)<br>{{ $plan->plans_name }}<br>
                                          <span class="table-plan-price">
                                              <span class="table-plan-symbol">{{ $currencySymbol }}</span>
                                              <span class="table-plan-amount"
                                                  data-monthly-discount="{{ $plan->monthly_discount ?? 0 }}"
                                                  data-yearly-discount="{{ $plan->yearly_discount ?? 0 }}"
                                                  data-extra-monthly="{{ $plan->monthly_extra_disc ?? 0 }}"
                                                  data-extra-yearly="{{ $plan->yearly_extra_disc ?? 0 }}">
                                              </span>

                                              <small class="table-plan-period">
                                                  user/{{ $plan->plans_subscription_type }}
                                              </small>
                                          </span>
                                      </th>
                                  @endforeach
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <td class="table-td">Members</td>
                                  @foreach ($userLicenseData['getPlanList']['planListsSingle'] as $singlePlan)
                                      <td class="ul-pricing-tbl-single" data-plan-col="personal">
                                          {{ $singlePlan->plans_license }} </td>
                                  @endforeach

                                  @foreach ($userLicenseData['getPlanList']['planLists'] as $plan)
                                      <td> {{ $plan->plans_license * $plan->default_qty }} </td>
                                  @endforeach
                              </tr>

                              <tr>
                                  <td class="table-td">Per User Storage</td>
                                  @foreach ($userLicenseData['getPlanList']['planListsSingle'] as $singlePlan)
                                      <td class="ul-pricing-tbl-single" data-plan-col="personal">
                                          {{ $singlePlan->plans_users }} {{ $singlePlan->storage_unit }}</td>
                                  @endforeach

                                  @foreach ($userLicenseData['getPlanList']['planLists'] as $plan)
                                      <td> {{ $plan->plans_users }} {{ $plan->storage_unit }}</td>
                                  @endforeach
                              </tr>

                              <tr>
                                  <td class="table-td">Total Pool Storage</td>
                                  @foreach ($userLicenseData['getPlanList']['planListsSingle'] as $singlePlan)
                                      <td class="ul-pricing-tbl-single" data-plan-col="personal">
                                          {{ $singlePlan->pool_storage }} </td>
                                  @endforeach

                                  @foreach ($userLicenseData['getPlanList']['planLists'] as $plan)
                                      <td> {{ $plan->pool_storage }} </td>
                                  @endforeach
                              </tr>

                              <tr>
                                  <td class="table-td">Teams</td>
                                  <td class="ul-pricing-tbl-single" data-plan-col="personal">1 Workspace</td>
                                  <td>1 Workspace</td>
                                  <td>Multi-Workspace</td>
                                  <td>Unlimited</td>
                                  <td>Unlimited</td>
                              </tr>
                              @foreach ($featuresplan as $featureitemplan)
                              <tr>
                                  <td class="table-td">{{ $featureitemplan->title }}</td>
                                  @foreach (['single_user', 'basic', 'standard', 'advance'] as $plan)
                                        <td>
                                            @if ($featureitemplan->{$plan})
                                                <i class="bi bi-check-circle-fill check"></i>
                                            @else
                                                <i class="bi bi-x-circle-fill cross"></i>
                                            @endif
                                        </td>
                                    @endforeach
                                  <td>Enterprise</td>
                              </tr>
                              @endforeach

                              <!-- Buttons Row -->
                              <tr>
                                  <td></td>
                                  @foreach ($userLicenseData['getPlanList']['planListsSingle'] as $singlePlan)
                                      <td class="ul-pricing-tbl-single text-center" data-plan-col="personal">
                                          <button class="btn btn-outline-secondary js-select-plan-compare"
                                              data-plan-type="single" data-name="{{ $singlePlan->plans_name }}"
                                              data-license="{{ $singlePlan->plans_license }}"
                                              data-storage="{{ $singlePlan->plans_users }}"
                                              data-plan-id="{{ $singlePlan->id }}"
                                              data-plan-discount="{{ $singlePlan->monthly_discount }}"
                                              data-default-qty="{{ $singlePlan->default_qty }}"
                                              data-storage-unit="{{ $singlePlan->storage_unit }}"
                                              style="width: 100% !important; max-width: 115px !important; height: 36px !important; display: inline-flex; align-items: center; justify-content: center; margin: 0 auto; padding: 0 !important;">
                                              Get Started
                                          </button>
                                      </td>
                                  @endforeach

                                  @foreach ($userLicenseData['getPlanList']['planLists'] as $plan)
                                      <td class="text-center">
                                          @php
                                              $minimumLicenses = $plan->minimum_licenses ??
                                                  match ($plan->plans_name) {
                                                      'Basic' => 2,
                                                      'Standard' => 10,
                                                      'Advanced' => 50,
                                                      'Premium' => 100,
                                                      default => (int) ($plan->default_qty ?? ($plan->plans_license ?? 1)),
                                                  };
                                          @endphp
                                          <button class="btn btn-outline-secondary team-js-select-plan-compare"
                                              data-plan-type="team" data-plan-id="{{ $plan->id }}"
                                              data-name="{{ $plan->plans_name }}"
                                              data-license="{{ $plan->plans_license }}"
                                              data-storage="{{ $plan->plans_users }}"
                                              data-default-qty="{{ $minimumLicenses }}"
                                              data-storage-unit="{{ $plan->storage_unit }}"
                                              style="width: 100% !important; max-width: 115px !important; height: 36px !important; display: inline-flex; align-items: center; justify-content: center; margin: 0 auto; padding: 0 !important;">
                                              Get Started
                                          </button>
                                      </td>
                                  @endforeach


                              </tr>
                          </tbody>
                      </table>
                  </div>
              </div>


          </div>
      </div>
      <!-- pricing area End -->
  @endsection
  @section('scripts')
      @vite(['resources/js/pricing.js'])
  @endsection
