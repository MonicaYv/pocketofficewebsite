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
      <div class="row justify-content-center">
        <div class="col-xl-6">
          <div class="section-title text-center pricing-header">
            <div class="pricing-title-row">
              <h2 class="title">Choose your pricing</h2>
              <div class="currency-dropdown-wrapper">
                <button class="currency-btn hidden" id="currencyBtn">
                  <span class="currency-code" id="currencyCode">INR-India</span>

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

                <ul class="currency-menu" id="currencyMenu"></ul>
              </div>
            </div>
            <p>
              Choose the plan that fits how your team works today — and
              tomorrow.
            </p>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="personal-section-wrapper">
          <p class="personal-section-label">For Individuals</p>
          @if (!empty($userLicenseData['userLicenseDetails']['monthPlansForSingleUser']))
          @foreach ($userLicenseData['userLicenseDetails']['monthPlansForSingleUser'] as $plan)
          <div class="card personal-card js-month-card">
            <div class="card-body personal-card__body">
              <div class="personal-card__left">
                <div class="personal-card__title-row">
                  <span class="personal-card__name">{{ $plan->plans_name }}</span>
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
                      Personal Workspace
                    </li>
                  </ul>

                  <ul class="personal-card__features">
                    <li>
                      <span class="personal-card__check">&#10003;</span>
                      Security Controls
                    </li>
                    <li>
                      <span class="personal-card__check">&#10003;</span>
                      Manage Infra
                    </li>
                    <li>
                      <span class="personal-card__check">&#10003;</span> App
                      Integration
                    </li>
                  </ul>

                  <ul class="personal-card__features">
                    <li>
                      <span class="personal-card__check">&#10003;</span>
                      Backup & Recovery
                    </li>
                    <li>
                      <span class="personal-card__check">&#10003;</span>
                      Storage Add-ons
                    </li>
                    <li>
                      <span class="personal-card__check">&#10003;</span>Feature Add-ons
                    </li>
                  </ul>
                </div>
              </div>

              <div class="personal-card__right">
                <div class="personal-card__price-cta">
                  <div class="personal-card__price-row">
                    <span class="personal-card__symbol">
                      {{ $plan->currency }}
                    </span>
                    <span
                      class="personal-card__amount"
                      id=""
                      data-monthly="">{{ $plan->plans_amount }}</span>
                    <span
                      class="personal-card__period"
                      id="personalPeriodLabel">/{{ $plan->plans_subscription_type }}</span>
                  </div>
                </div>

                <div class="personal-card__toggle-row">
                  <span
                    class="personal-card__toggle-label"
                    id="personalMonthlyLabel">Monthly</span>
                  <label class="toggle-switch">
                    <input
                      type="checkbox"
                      class="billing-toggle js-billing-toggle" />
                    <span class="toggle-slider"></span>
                  </label>
                  <span
                    class="personal-card__toggle-label personal-card__yearly-label">
                    Yearly
                    <span
                      class="personal-card__save-badge"
                      id="personalSaveBadge">
                      @if($plan->discount != null || $plan->discount != '')
                      (Save {{ $plan->discount }}%)
                      @endif

                    </span>
                  </span>
                </div>

                <a href="javascript:void(0)"
                  class="btn btn-primary personal-card__btn js-select-plan"
                  data-name="{{ $plan->plans_name }}"
                  data-price="{{ $plan->plans_amount }}"
                  data-currency="{{ $plan->currency }}"
                  data-license="{{ $plan->plans_license }}"
                  data-storage="{{ $plan->plans_users }}"
                  data-plan-id="{{ $plan->id }}"
                  data-plan-discount="{{ $plan->discount }}"
                  data-storage-unit="{{ $plan->storage_unit }}"
                  data-type="{{ $plan->plans_subscription_type }}">
                  Get Started
                </a>
              </div>
            </div>

            <div
              class="personal-annual-strip"
              id="personalAnnualStrip"
              style="display: none"></div>
          </div>
          @endforeach

          @foreach ($userLicenseData['userLicenseDetails']['yearPlansForSingleUser'] as $plan)
          <div class="card personal-card  js-year-card hidden">
            <div class="card-body personal-card__body">
              <!-- LEFT: icon + title + subtitle + feature checkmarks -->
              <div class="personal-card__left">
                <div class="personal-card__title-row">
                  <!-- <i
                    class="fa fa-user-circle personal-card__icon"
                    aria-hidden="true"></i> -->
                  <span class="personal-card__name">{{ $plan->plans_name }}</span>
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
                      Personal Workspace
                    </li>
                  </ul>

                  <ul class="personal-card__features">
                    <li>
                      <span class="personal-card__check">&#10003;</span>
                      Security Controls
                    </li>
                    <li>
                      <span class="personal-card__check">&#10003;</span>
                      Manage Infra
                    </li>
                    <li>
                      <span class="personal-card__check">&#10003;</span> App
                      Integration
                    </li>
                  </ul>

                  <ul class="personal-card__features">
                    <li>
                      <span class="personal-card__check">&#10003;</span>
                      Backup & Recovery
                    </li>
                    <li>
                      <span class="personal-card__check">&#10003;</span>
                      Storage Add-ons
                    </li>
                    <li>
                      <span class="personal-card__check">&#10003;</span>Feature Add-ons
                    </li>
                  </ul>
                </div>
              </div>

              <!-- RIGHT: price + CTA + billing toggle -->
              <div class="personal-card__right">
                <div class="personal-card__price-cta">
                  <div class="personal-card__price-row">
                    <span class="personal-card__symbol">
                      {{ $plan->currency }}
                    </span>
                    <span
                      class="personal-card__amount"
                      id=""
                      data-monthly="">{{ $plan->plans_amount }}</span>
                    <span
                      class="personal-card__period"
                      id="personalPeriodLabel">/{{ $plan->plans_subscription_type }}</span>
                  </div>
                </div>

                <div class="personal-card__toggle-row">
                  <span
                    class="personal-card__toggle-label"
                    id="personalMonthlyLabel">Monthly</span>
                  <label class="toggle-switch">
                    <input
                      type="checkbox"
                      class="billing-toggle js-billing-toggle" />
                    <span class="toggle-slider"></span>
                  </label>
                  <span
                    class="personal-card__toggle-label personal-card__yearly-label">
                    Yearly
                    <span
                      class="personal-card__save-badge"
                      id="personalSaveBadge">(Save {{ $plan->discount }}%)</span>
                  </span>
                </div>
                <a href="javascript:void(0)"
                  class="btn btn-primary personal-card__btn js-select-plan"
                  data-name="{{ $plan->plans_name }}"
                  data-price="{{ $plan->plans_amount }}"
                  data-currency="{{ $plan->currency }}"
                  data-license="{{ $plan->plans_license }}"
                  data-storage="{{ $plan->plans_users }}"
                  data-plan-id="{{ $plan->id }}"
                  data-plan-discount="{{ $plan->discount }}"
                  data-storage-unit="{{ $plan->storage_unit }}"
                  data-type="{{ $plan->plans_subscription_type }}">
                  Get Started
                </a>
              </div>
            </div>

            <!-- Annual savings strip — inside card, below the two columns -->
            <div
              class="personal-annual-strip"
              id="personalAnnualStrip"
              style="display: none"></div>
          </div>
          @endforeach
          @endif
        </div>

        <!-- For Team -->
        <div class="teams-section-wrapper">
          <div class="shared-billing-toggle">
            <button class="billing-pill-btn active ul-tab-name" data-type="monthly">
              Monthly
              @if($additional_disc_month > 0)
              <span class="ul-save-badge px-1 py-0.5 z-10">
                Save {{$additional_disc_month}}%
              </span>
              @else
              @endif
            </button>
            <button class="billing-pill-btn ul-tab-name" data-type="yearly">
              Annually
              @if($additional_disc_year > 0)
              <span class="ul-save-badge save-badge">
                Save {{$additional_disc_year}}%
              </span>
              @else
              @endif
            </button>
          </div>

          <p class="teams-section-label">For Teams</p>

          <div class="pricing-cards">
            @if (!empty($userLicenseData['userLicenseDetails']['planLists']))
            @foreach ($userLicenseData['userLicenseDetails']['planLists'] as $plan)
            <div class="monthly-plans">
              <div class="card bg-light border-secondary h-100 ul-cards">
                <div class="card-body d-flex flex-column p-4">
                  <h2 class="fw-semibold mb-3">{{ $plan->plans_name }}</h2>
                  <h6 class="display-4 fw-bold mb-2 price">
                    {{ $plan->currency }}
                    <span
                      class="price-amount"
                      data-monthly="">{{ $plan->plans_amount }}</span>
                    <span class="user-text">per user/{{ $plan->plans_subscription_type }}</span>
                  </h6>

                  <span class="incr-currency-data hidden">{{ $plan->currency }}</span>
                  <span class="incr-amount-data hidden">{{ $plan->plans_amount }}</span>
                  <span class="incr-subscription-data hidden">{{ $plan->plans_subscription_type }}</span>
                  <span class="incr-license-count-data hidden">{{ $plan->plans_license }}</span>
                  <span class="incr-poolstorage-count-data hidden">{{ $plan->pool_storage }}</span>

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
                        <input type="text" class="qty-input ul-quantity-input" value="1" readonly />
                        <button class="qty-btn  ul-increment">+</button>
                      </div>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                      <span>Total Licence Count :&nbsp;</span>
                      <span class="total-licence-count view-total-license-count"></span>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                      <span>Total Pool Storage :&nbsp;</span>
                      <span class="total-pool-storage view-total-poolstorage-count"></span>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                      <span>Total Amount :&nbsp;</span>
                      <span class="view-currency"></span> &nbsp; <span class="total-amount view-total-amount-count"></span>
                    </li>
                  </ul>

                  <!-- discount  -->
                  @if(!empty($plan->discount) && $plan->discount > 0)
                  <div class="ul-discount ul-save-badge">🎉 {{ $plan->discount }}% off — Enjoy extra savings with monthly billing</div>
                  @endif

                  <!-- Annual badge lives here, injected by JS -->
                  <div class="pricing-buttons pricingButtons">
                    <!-- <button class="btn btn-outline-secondary get-started-btn">Get started</button> -->
                    <button class="btn btn-outline-secondary team-js-select-plan"
                      data-plan-id="{{ $plan->id }}"
                      data-name="{{ $plan->plans_name }}"
                      data-price="{{ $plan->plans_amount }}"
                      data-currency="{{ $plan->currency }}"
                      data-subscription="month"
                      data-license="{{ $plan->plans_license }}"
                      data-storage="{{ $plan->pool_storage }}">
                      Get Started
                    </button>
                  </div>
                </div>
              </div>
            </div>
            @endforeach

            @foreach ($userLicenseData['userLicenseDetails']['planListsYear'] as $plan)
            <div class="yearly-plans hidden">
              <div class="card bg-light border-secondary h-100 ul-cards">
                <div class="card-body d-flex flex-column p-4">
                  <h2 class="fw-semibold mb-3">{{ $plan->plans_name }}</h2>
                  <h6 class="display-4 fw-bold mb-2 price">
                    {{ $plan->currency }}
                    <span
                      class="price-amount"
                      data-monthly="">{{ $plan->plans_amount }}</span>
                    <span class="user-text">per user/{{ $plan->plans_subscription_type }}</span>
                  </h6>

                  <span class="incr-currency-data hidden">{{ $plan->currency }}</span>
                  <span class="incr-amount-data hidden">{{ $plan->plans_amount }}</span>
                  <span class="incr-subscription-data hidden">{{ $plan->plans_subscription_type }}</span>
                  <span class="incr-license-count-data hidden">{{ $plan->plans_license }}</span>
                  <span class="incr-poolstorage-count-data hidden">{{ $plan->pool_storage }}</span>

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
                        <input type="text" class="qty-input ul-quantity-input" value="1" readonly />
                        <button class="qty-btn  ul-increment">+</button>
                      </div>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                      <span>Total Licence Count :&nbsp;</span>
                      <span class="total-licence-count view-total-license-count"></span>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                      <span>Total Pool Storage :&nbsp;</span>
                      <span class="total-pool-storage view-total-poolstorage-count"></span>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                      <span>Total Amount :&nbsp;</span>
                      <span class="view-currency"></span> &nbsp; <span class="total-amount view-total-amount-count"></span>
                    </li>
                  </ul>

                  @if(!empty($plan->discount) && $plan->discount > 0)
                  <div class="ul-discount ul-save-badge">🎉 {{ $plan->discount }}% off — Enjoy extra savings with annual billing</div>
                  @endif

                  <!-- Annual badge lives here, injected by JS -->
                  <div class="pricing-buttons pricingButtons">
                    <button class="btn btn-outline-secondary team-js-select-plan"
                      data-plan-id="{{ $plan->id }}"
                      data-name="{{ $plan->plans_name }}"
                      data-price="{{ $plan->plans_amount }}"
                      data-currency="{{ $plan->currency }}"
                      data-subscription="year"
                      data-license="{{ $plan->plans_license }}"
                      data-storage="{{ $plan->pool_storage }}">
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

      <div class="container py-5">
        <div class="table-responsive hidden">
          <table
            class="table pricing-table text-center align-middle"
            id="pricingTable">
            <thead>
              <tr>
                <th></th>
                <th>Basic</th>
                <th>Standard</th>
                <th>Advanced</th>
                <th>Premium</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Members</td>
                <td>1</td>
                <td>10</td>
                <td>50</td>
                <td>100</td>
              </tr>
              <tr>
                <td>Per User Storage</td>
                <td>10 GB</td>
                <td>10 GB</td>
                <td>10 GB</td>
                <td>10 GB</td>
              </tr>
              <tr>
                <td>Total Pool Storage</td>
                <td>10 GB</td>
                <td>100 GB</td>
                <td>500 GB</td>
                <td>1000 GB</td>
              </tr>
              <tr>
                <td>Teams</td>
                <td>1 Workspace</td>
                <td>Multi-Workspace</td>
                <td>Unlimited</td>
                <td>Unlimited</td>
              </tr>

              <tr>
                <td>Security Controls</td>
                <td><i class="bi bi-check-circle-fill check"></i></td>
                <td><i class="bi bi-check-circle-fill check"></i></td>
                <td><i class="bi bi-check-circle-fill check"></i></td>
                <td>Enterprise</td>
              </tr>
              <!-- Core Features Title Row (Fixed - No colspan) -->
              <tr>
                <td>Manage Infra</td>
                <td><i class="bi bi-check-circle-fill check"></i></td>
                <td><i class="bi bi-check-circle-fill check"></i></td>
                <td><i class="bi bi-check-circle-fill check"></i></td>
                <td>Enterprise</td>
              </tr>

              <tr>
                <td>App Integration</td>
                <td><i class="bi bi-check-circle-fill check"></i></td>
                <td><i class="bi bi-check-circle-fill check"></i></td>
                <td><i class="bi bi-check-circle-fill check"></i></td>
                <td>Enterprise</td>
              </tr>

              <tr>
                <td>Device & IP Control</td>
                <td><i class="bi bi-x-circle-fill cross"></i></td>
                <td><i class="bi bi-check-circle-fill check"></i></td>
                <td><i class="bi bi-check-circle-fill check"></i></td>
                <td>Enterprise</td>
              </tr>
              <tr>
                <td>Backup & Recovery</td>
                <td><i class="bi bi-check-circle-fill check"></i></td>
                <td><i class="bi bi-check-circle-fill check"></i></td>
                <td><i class="bi bi-check-circle-fill check"></i></td>
                <td>Enterprise</td>
              </tr>

              <tr>
                <td>Storage Add-ons</td>
                <td><i class="bi bi-check-circle-fill check"></i></td>
                <td><i class="bi bi-check-circle-fill check"></i></td>
                <td><i class="bi bi-check-circle-fill check"></i></td>
                <td>Enterprise</td>
              </tr>

              <tr>
                <td>Feature Add-ons</td>
                <td><i class="bi bi-check-circle-fill check"></i></td>
                <td><i class="bi bi-check-circle-fill check"></i></td>
                <td><i class="bi bi-check-circle-fill check"></i></td>
                <td>Enterprise</td>
              </tr>

              <!-- Buttons Row -->
              <tr>
                <td></td>
                <td>
                  <a href="{{ url('payment') }}" class="btn btn-outline-secondary">Get started</a>
                </td>
                <td>
                  <a href="{{ url('payment') }}" class="btn btn-outline-secondary">Get started</a>
                </td>
                <td>
                  <a href="{{ url('payment') }}" class="btn btn-outline-secondary">Get started</a>
                </td>
                <td>
                  <a href="{{ url('payment') }}" class="btn btn-outline-secondary">Get started</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- pricing area End -->
  @endsection