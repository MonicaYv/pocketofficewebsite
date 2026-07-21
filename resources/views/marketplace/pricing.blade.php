  @extends('layouts.backendsettings')
  @section('title', 'Affordable Cloud Desktop Plans for Teams & Businesses | Pocket Office')
  <style>
    .ul-discount {
      background: #d1fae5;
      color: #065f46;
      font-size: 12px;
      font-weight: 600;
      padding: 6px 12px;
      margin-top: 10px;
      text-align: center;
      width: 100%;
      box-sizing: border-box;
      border-radius: 6px;
    }

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
    .currency-dropdown-wrapper {
      position: relative;
      display: inline-block;
      max-width: 350px;
    }

    .currency-btn {
      display: flex;
      align-items: center;
      gap: 8px;
      border: 1px solid #ddd;
      padding: 10px 14px;
      border-radius: 8px;
      background: #fff;
      cursor: pointer;
    }

    .currency-menu {
      position: absolute;
      top: 110%;
      right: 0;
      width: 260px;
      background: #fff;
      border: 1px solid #ddd;
      border-radius: 10px;
      padding: 8px 0;
      margin: 0;
      list-style: none;
      display: none;
      z-index: 9999;
      max-height: 300px;
      overflow-y: auto;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
    }

    .currency-menu.open {
      display: block;
    }

    .currency-menu li {
      padding: 10px 14px;
      cursor: pointer;
      transition: 0.2s;
    }

    .currency-menu li:hover {
      background: #f5f5f5;
    }

    .currency-search-li {
      padding: 10px;
      border-bottom: 1px solid #eee;
    }

    #currencySearch {
      width: 100%;
      padding: 8px 10px;
      border: 1px solid #ddd;
      border-radius: 6px;
      outline: none;
    }

    .price-wrapper {
      display: flex;
      align-items: center;
      gap: 2px;
    }

    .original-price-wrapper {
      height: 24px;
      /* adjust if needed */
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
  <div
    class="breadcrumb-area pricing-bg"
    style="background-image: url(assets/img/hero-images/Pricing.svg)">
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

      <!-- currency  -->
      <div class="row justify-content-center">

        <div class="col-xl-6">

          <div class="section-title text-center pricing-header">

            <div class="pricing-title-row">

              <h2 class="title">
                Choose your pricing
              </h2>

              <div class="currency-dropdown-wrapper">

                @php
                $selectedCurrencyData =
                $currencies->firstWhere(
                'currency_code',
                $selectedCurrency
                );
                @endphp

                <!-- Button -->
                <button
                  type="button"
                  class="currency-btn"
                  id="currencyBtn">

                  <span
                    class="currency-code"
                    id="currencyCode">

                    {{ $selectedCurrencyData->currency_code ?? '' }}

                    ({{ $selectedCurrencyData->currency_symbol ?? '' }})

                    –

                    {{ $selectedCurrencyData->country_name ?? '' }}

                  </span>

                  <svg
                    class="currency-chevron"
                    viewBox="0 0 10 6"
                    width="10"
                    height="6">

                    <path
                      d="M1 1l4 4 4-4"
                      stroke="currentColor"
                      stroke-width="1.5"
                      fill="none"
                      stroke-linecap="round" />

                  </svg>

                </button>

                <!-- Dropdown -->
                <ul
                  class="currency-menu"
                  id="currencyMenu">

                  <!-- Search -->
                  <li class="currency-search-li">

                    <input
                      id="currencySearch"
                      type="text"
                      placeholder="Search country or code…"
                      autocomplete="off" />

                  </li>

                  <!-- Currency List -->
                  @foreach ($currencies as $currency)

                  <li
                    class="{{ $currency->currency_code == $selectedCurrency ? 'active' : '' }}"

                    data-currency="{{ $currency->currency_code }}"

                    data-symbol="{{ $currency->currency_symbol }}"

                    data-amount="{{ $currency->actual_amount }}"

                    data-country="{{ $currency->country_name }}"

                    data-base="{{ $currency->is_base_currency }}">


                    {{ $currency->currency_code }}

                    ({{ $currency->currency_symbol }})

                    –

                    {{ $currency->country_name }}

                    @if($currency->is_base_currency == 1)
                    - Base Currency
                    @endif

                  </li>

                  @endforeach

                </ul>

              </div>

            </div>

            <p>
              Choose the plan that fits how your team works today — and tomorrow.
            </p>

          </div>

        </div>

      </div>

      <div class="container">

        <!-- for single user  -->
        <div class="personal-section-wrapper">
          <p class="personal-section-label">For Individuals</p>
          @if (!empty($userLicenseData['getPlanList']['planListsSingle']))
          @foreach ($userLicenseData['getPlanList']['planListsSingle'] as $plan)
          @if($plan->is_single_user == 1)
          <div class="card personal-card js-month-card">
            <div class="card-body personal-card__body">
              <div class="personal-card__left">
                <div class="personal-card__title-row">
                  <i class="fa fa-user-circle personal-card__icon" aria-hidden="true"></i>
                  <span class="personal-card__name">Personal</span> ({{ $plan->plans_name }})
                  <span class="personal-card__subtitle">Best for individual users</span>
                </div>
                <div class="personal-features-wrapper">
                  <ul class="personal-card__features">
                    <li>
                      <span class="personal-card__check">&#10003;</span> {{ $plan->plans_license }}
                      User License
                    </li>
                    <li>
                      <span class="personal-card__check">&#10003;</span> {{ $plan->plans_users }} {{ $plan->storage_unit }}
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
                      <span class="personal-card__check">&#10003;</span>Additional Features
                    </li>
                  </ul>
                </div>
              </div>

              <div class="personal-card__right">
                <div class="personal-card__price-cta">
                  <div class="personal-card__price-row">
                    <span
                      class="extra-discount-ul hidden"
                      data-monthly="{{ $plan->single_user_monthly_extra_disc ?? 0 }}"
                      data-yearly="{{ $plan->single_user_yearly_extra_disc ?? 0 }}">
                    </span>
                    <span class="personal-card__symbol personal-card-symbol-ul"></span>
                    <span
                      class="personal-card__amount ul-personal-card-amount"
                      data-monthly-discount="{{ $plan->single_user_monthly_discount ?? 0 }}"
                      data-yearly-discount="{{ $plan->single_user_yearly_discount ?? 0 }}"
                      data-extra-monthly-constant="{{ $additional_disc_month ?? 0 }}"
                      data-extra-yearly-constant="{{ $additional_disc_year ?? 0 }}"
                      data-extra-monthly="{{ $plan->single_user_monthly_extra_disc ?? 0 }}"
                      data-extra-yearly="{{ $plan->single_user_yearly_extra_disc ?? 0 }}">
                    </span>
                    <span
                      class="personal-card__period ul-personal-card-period"
                      id="personalPeriodLabel">/{{ $plan->plans_subscription_type }}</span>
                  </div>
                </div>
                <div class="flex original-price original-price-single">
                  <span class="personal-card-symbol-ul"></span> <span class="ul-original-price"></span>
                  <span class="ul-personal-card-period"></span>
                </div>

                <div class="personal-card__toggle-row">
                  <span
                    class="personal-card__toggle-label"
                    id="personalMonthlyLabel">Monthly
                    @if($additional_disc_month_single > 0)
                    <span class="personal-card__save-badge" id="personalSaveBadge">
                      (Save {{$additional_disc_month_single}}%)
                    </span>
                    @else
                    @endif
                  </span>
                  <label class="toggle-switch">
                    <input
                      type="checkbox"
                      class="billing-toggle js-billing-toggle single-user-toggle" />
                    <span class="toggle-slider"></span>
                  </label>
                  <span
                    class="personal-card__toggle-label personal-card__yearly-label">
                    Yearly
                    @if($additional_disc_year_single > 0)
                    <span class="personal-card__save-badge" id="personalSaveBadge">
                      (Save {{$additional_disc_year_single}}%)
                    </span>
                    @else
                    @endif
                  </span>
                </div>

                <button class="btn btn-primary personal-card__btn js-select-plan"
                  data-plan-type="single"
                  data-name="{{ $plan->plans_name }}"
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

            if($main > 0) {
            $parts[] = $main . '% off Individual  user discount';
            }

            if($extra > 0) {
            $parts[] = $extra . '% special offer for annual billing';
            }
            @endphp

            @if(count($parts))
            <div class="personal-annual-strip show-strip-month">
              🎉 {{ implode(' + ', $parts) }} — You save total {{ $totalDiscount }}% on monthly payment
            </div>
            @endif




            @php
            $main = $additional_disc_year_single ?? 0;
            $extra = $plan->single_user_yearly_extra_disc ?? 0;
            $totalDiscount = $main + $extra;
            @endphp

            @if($main > 0 || $extra > 0)
            <div class="personal-annual-strip show-strip" style="display: block; display: none;">
              🎉

              @if($main > 0)
              {{ $main }}% off Individual  user discount
              @endif

              @if($main > 0 && $extra > 0)
              +
              @endif

              @if($extra > 0)
              {{ $extra }}% special offer for annual billing
              @endif

              — You save total {{ $totalDiscount }}%  on annual payment
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
              @if($additional_disc_month > 0)
              <span class="ul-save-badge save-badge">
                Save Extra {{$additional_disc_month}}%
              </span>
              @else
              @endif

            </button>
            <button class="billing-pill-btn ul-tab-name team-billing-toggle" data-type="yearly">
              Annually
              @if($additional_disc_year > 0)
              <span class="ul-save-badge save-badge">
                Save Extra {{$additional_disc_year}}%
              </span>
              @else
              @endif
            </button>
          </div>

          <p class="teams-section-label">For Teams</p>
          <div class="pricing-cards">
            @if (!empty($userLicenseData['getPlanList']['planLists']))
            @foreach ($userLicenseData['getPlanList']['planLists'] as $plan)
            <div class="monthly-plans" data-is-team="1">
              <div class="card bg-light border-secondary h-100 ul-cards">
                <div class="card-body d-flex flex-column p-4">
                  <h2 class="fw-semibold mb-3" data-plan-name="{{ $plan->plans_name }}">{{ $plan->plans_name }}</h2>
                  <h6 class="display-4 fw-bold mb-2 price">
                    <div class="price-wrapper">
                      <span class="personal-card-symbol-ul"></span><span class="total-price-ul"
                        data-original-price="{{ $plan->plans_amount }}"
                        data-monthly="{{ $plan->plans_amount }}"
                        data-yearly="{{ $plan->plans_amount }}"></span>
                    </div>
                    <span class="user-text">{{ $plan->plans_subscription_type }}</span>
                  </h6>

                  <!-- original price  --> 
                  <div class="original-price-wrapper">
                    <div class="flex original-price original-price-team">
                      <span class="personal-card-symbol-ul-team"></span> &nbsp; <span class="ul-original-price-team"></span>
                      <span class="ul-personal-card-period-team"></span>
                    </div>
                  </div>

                  <span class="user-count-ul hidden">{{ $plan->plans_license }}</span>
                  <span class="discount-ul hidden"
                    data-monthly="{{ $plan->is_team_discount_apply == 1 ? ($plan->monthly_discount ?? 0) : 0 }}"
                    data-yearly="{{ $plan->is_team_discount_apply == 1 ? ($plan->yearly_discount ?? 0) : 0 }}">
                  </span>
                  <span class="price-amount hidden"
                    data-monthly="{{ $plan->plans_amount }}"
                    data-yearly="{{ $plan->plans_amount }}"></span>
                  <span class="extra-discount-ul hidden"
                    data-monthly-constant="{{ $additional_disc_month ?? 0 }}"
                    data-yearly-constant="{{ $additional_disc_year ?? 0 }}"
                    data-monthly="{{ $plan->is_team_extraM_discount_apply == 1 ? ($plan->monthly_extra_disc ?? 0) : 0 }}"
                    data-yearly="{{ $plan->is_team_extraY_discount_apply == 1 ? ($plan->yearly_extra_disc ?? 0) : 0 }}">
                  </span>


                  <span class="incr-currency-data hidden">currency</span>
                  <span class="incr-amount-data hidden">plans_amount</span>
                  <span class="incr-subscription-data hidden">{{ $plan->plans_subscription_type }}</span>
                  <span class="incr-license-count-data hidden">{{ $plan->plans_license }}</span>
                  <span class="incr-poolstorage-count-data hidden">{{ $plan->plans_users }}</span>

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
                      <span class="base-licence-count">
                        {{ $plan->plans_license }}
                      </span>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                      <span>Per User Storage :&nbsp;</span>
                      <span class="base-storage">{{ $plan->plans_users }}</span>&nbsp;{{ $plan->storage_unit }}
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                      <div class="quantity-box ul-quantity-container">
                        <button class="qty-btn  ul-decrement">−</button>
                        <input type="text" class="qty-input ul-quantity-input"
                          value="{{ $plan->default_qty }}"
                          data-default-qty="{{ $plan->default_qty }}"
                          readonly />
                        <button class="qty-btn  ul-increment">+</button>
                      </div>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                      <span>Total Licence Count :&nbsp;</span>
                      <span class="total-licence-count view-total-license-count"></span>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                      <span>Total Pool Storage :&nbsp;</span>
                      <span class="total-pool-storage view-total-poolstorage-count"></span> &nbsp;
                      <span class="view-storage-unit">{{ $plan->storage_unit }}</span>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                      <span>Total Amount :&nbsp;</span>
                      <span class="view-currency" style="gap:3px"></span><span class="total-amount view-total-amount-count"></span>
                    </li>
                    @if($plan->plans_name == "Basic")
                      <li class="" style="color:red; font: bold">Note: Minimum of 2 licenses must be selected</li>
                    @endif 
                  </ul>

                  <!-- discount  -->
                  <div class="ul-discount ul-save-badge"
                    data-discount-apply="{{ $plan->is_team_discount_apply }}"
                    data-extra-monthly-apply="{{ $plan->is_team_extraM_discount_apply }}"
                    data-extra-yearly-apply="{{ $plan->is_team_extraY_discount_apply }}"
                    data-monthly-discount="{{ $plan->monthly_discount ?? 0 }}"
                    data-yearly-discount="{{ $plan->yearly_discount ?? 0 }}"
                    data-monthly-extra="{{ $plan->monthly_extra_disc ?? 0 }}"
                    data-yearly-extra="{{ $plan->yearly_extra_disc ?? 0 }}">
                  </div>

                  

                  <!-- <div class="ul-discount ul-save-badge team-discount-badge" -->
                  <!-- @if($plan->is_team_discount_apply == 1 || $plan->is_team_extra_discount_apply == 1)
                  <div class="ul-discount ul-save-badge "
                    data-is-single="{{ $plan->is_team_discount_apply }}"
                    data-monthly="{{ $plan->is_team_discount_apply == 1 ? 0 : ($plan->monthly_discount ?? 0) }}"
                    data-yearly="{{ $plan->is_team_discount_apply == 1 ? 0 : ($plan->yearly_discount ?? 0) }}">
                    🎉 {{ $plan->monthly_discount }}% off — Enjoy extra savings with monthly billing
                  </div>
                  @endif -->

                  <!-- @php
                  $billing_type = ($plan->plans_subscription_type == 'month') ? 'monthly' : 'yearly';
                  @endphp

                  @if(
                  $plan->is_team_discount_apply == 1 ||
                  ($billing_type == 'monthly' && $plan->is_team_extraM_discount_apply == 1) ||
                  ($billing_type == 'yearly' && $plan->is_team_extraY_discount_apply == 1)
                  )

                  <div class="ul-discount ul-save-badge"
                    data-is-single="{{ $plan->is_team_discount_apply }}"
                    data-monthly="{{ $plan->monthly_discount ?? 0 }}"
                    data-yearly="{{ $plan->yearly_discount ?? 0 }}">

                    @if($billing_type == 'monthly')

                    @if($plan->is_team_discount_apply == 1 && $plan->is_team_extraM_discount_apply == 1)
                    🎉 Enjoy {{ $plan->monthly_discount }}% OFF + Special Offer: Extra {{ $plan->monthly_extra_disc }}% OFF

                    @elseif($plan->is_team_discount_apply == 1)
                    🎉 Enjoy {{ $plan->monthly_discount }}% OFF

                    @elseif($plan->is_team_extraM_discount_apply == 1)
                    🎉 Special Offer: Extra {{ $plan->monthly_extra_disc }}% OFF
                    @endif

                    @else

                    @if($plan->is_team_discount_apply == 1 && $plan->is_team_extraY_discount_apply == 1)
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
                      data-plan-type="team"
                      data-plan-id="{{ $plan->id }}"
                      data-name="{{ $plan->plans_name }}"
                      data-license="{{ $plan->plans_license }}"
                      data-storage="{{ $plan->plans_users }}">
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
                <th data-plan-col="personal" class="ul-pricing-tbl-single" style="min-width:130px;">
                  Personal ({{ $singlePlan->plans_name }})<br>
                  <span class="table-plan-price">
                    <span class="table-plan-symbol">{{ $currencySymbol }}</span>

                    <span
                      class="table-plan-amount"
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
                <th class="ul-pricing-tbl-team" data-team-discount="{{ $plan->is_team_discount_apply }}" style="min-width:130px;">
                  {{ $plan->plans_name }}<br>
                  <span class="table-plan-price">
                    <span class="table-plan-symbol">{{ $currencySymbol }}</span>
                    <span
                      class="table-plan-amount"
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
                <td>Members</td>
                @foreach ($userLicenseData['getPlanList']['planListsSingle'] as $singlePlan)
                <td class="ul-pricing-tbl-single" data-plan-col="personal"> {{ $singlePlan->plans_license }} </td>
                @endforeach

                @foreach ($userLicenseData['getPlanList']['planLists'] as $plan)
                <td> {{ ($plan->plans_license) * ($plan->default_qty) }} </td>
                @endforeach
              </tr>

              <tr>
                <td>Per User Storage</td>
                @foreach ($userLicenseData['getPlanList']['planListsSingle'] as $singlePlan)
                <td class="ul-pricing-tbl-single" data-plan-col="personal"> {{ $singlePlan->plans_users }} {{ $singlePlan->storage_unit }}</td>
                @endforeach

                @foreach ($userLicenseData['getPlanList']['planLists'] as $plan)
                <td> {{ $plan->plans_users }} {{ $plan->storage_unit }}</td>
                @endforeach
              </tr>

              <tr>
                <td>Total Pool Storage</td>
                @foreach ($userLicenseData['getPlanList']['planListsSingle'] as $singlePlan)
                <td class="ul-pricing-tbl-single" data-plan-col="personal"> {{ $singlePlan->pool_storage }} </td>
                @endforeach

                @foreach ($userLicenseData['getPlanList']['planLists'] as $plan)
                <td> {{ $plan->pool_storage }} </td>
                @endforeach
              </tr>

              <tr>
                <td>Teams</td>
                <td class="ul-pricing-tbl-single" data-plan-col="personal">1 Workspace</td>
                <td>1 Workspace</td>
                <td>Multi-Workspace</td>
                <td>Unlimited</td>
                <td>Unlimited</td>
              </tr>

              <tr>
                <td>Data Security</td>
                <td class="ul-pricing-tbl-single" data-plan-col="personal"><i class="bi bi-check-circle-fill check"></i></td>
                <td><i class="bi bi-check-circle-fill check"></i></td>
                <td><i class="bi bi-check-circle-fill check"></i></td>
                <td><i class="bi bi-check-circle-fill check"></i></td>
                <td>Enterprise</td>
              </tr>
              <!-- Core Features Title Row (Fixed - No colspan) -->
              <tr>
                <td>Managed IT</td>
                <td class="ul-pricing-tbl-single" data-plan-col="personal"><i class="bi bi-check-circle-fill check"></i></td>
                <td><i class="bi bi-check-circle-fill check"></i></td>
                <td><i class="bi bi-check-circle-fill check"></i></td>
                <td><i class="bi bi-check-circle-fill check"></i></td>
                <td>Enterprise</td>
              </tr>

              <tr>
                <td>Apps & Software</td>
                <td class="ul-pricing-tbl-single" data-plan-col="personal"><i class="bi bi-check-circle-fill check"></i></td>
                <td><i class="bi bi-check-circle-fill check"></i></td>
                <td><i class="bi bi-check-circle-fill check"></i></td>
                <td><i class="bi bi-check-circle-fill check"></i></td>
                <td>Enterprise</td>
              </tr>

              <tr>
                <td>Device Access Control</td>
                <td class="ul-pricing-tbl-single" data-plan-col="personal"><i class="bi bi-x-circle-fill cross"></i></td>
                <td><i class="bi bi-x-circle-fill check"></i></td>
                <td><i class="bi bi-check-circle-fill check"></i></td>
                <td><i class="bi bi-check-circle-fill check"></i></td>
                <td>Enterprise</td>
              </tr>
              <tr>
                <td>Automatic Backup</td>
                <td class="ul-pricing-tbl-single" data-plan-col="personal"><i class="bi bi-check-circle-fill check"></i></td>
                <td><i class="bi bi-check-circle-fill check"></i></td>
                <td><i class="bi bi-check-circle-fill check"></i></td>
                <td><i class="bi bi-check-circle-fill check"></i></td>
                <td>Enterprise</td>
              </tr>

              <tr>
                <td>Extra Storage</td>
                <td class="ul-pricing-tbl-single" data-plan-col="personal"><i class="bi bi-check-circle-fill check"></i></td>
                <td><i class="bi bi-check-circle-fill check"></i></td>
                <td><i class="bi bi-check-circle-fill check"></i></td>
                <td><i class="bi bi-check-circle-fill check"></i></td>
                <td>Enterprise</td>
              </tr>

              <tr>
                <td>Extra Features</td>
                <td class="ul-pricing-tbl-single" data-plan-col="personal"><i class="bi bi-check-circle-fill check"></i></td>
                <td><i class="bi bi-check-circle-fill check"></i></td>
                <td><i class="bi bi-check-circle-fill check"></i></td>
                <td><i class="bi bi-check-circle-fill check"></i></td>
                <td>Enterprise</td>
              </tr>

              <!-- Buttons Row -->
              <tr>
                <td></td>
                @foreach ($userLicenseData['getPlanList']['planListsSingle'] as $singlePlan)
                <td class="ul-pricing-tbl-single" data-plan-col="personal">
                  <button class="btn btn-outline-secondary js-select-plan-compare"
                    data-plan-type="single"
                    data-name="{{ $singlePlan->plans_name }}"
                    data-license="{{ $singlePlan->plans_license }}"
                    data-storage="{{ $singlePlan->plans_users }}"
                    data-plan-id="{{ $singlePlan->id }}"
                    data-plan-discount="{{ $singlePlan->monthly_discount }}"
                    data-default-qty="{{ $singlePlan->default_qty }}"
                    data-storage-unit="{{ $singlePlan->storage_unit }}">
                    Get Started
                  </button>
                </td>
                @endforeach

                @foreach ($userLicenseData['getPlanList']['planLists'] as $plan)
                <td>
                  <button class="btn btn-outline-secondary team-js-select-plan-compare"
                    data-plan-type="team"
                    data-plan-id="{{ $plan->id }}"
                    data-name="{{ $plan->plans_name }}"
                    data-license="{{ $plan->plans_license }}"
                    data-storage="{{ $plan->plans_users }}"
                    data-default-qty="{{ $plan->default_qty }}">
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