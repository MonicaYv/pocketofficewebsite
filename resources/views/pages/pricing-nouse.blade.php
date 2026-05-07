  @extends('layouts.backendsettings')
  @section('title', 'Affordable Cloud Desktop Plans for Teams & Businesses | Pocket Office')
  @section('meta-title', 'Affordable Cloud Desktop Plans for Teams & Businesses | Pocket Office')
  @section('meta-description', 'Explore Pocket Office pricing plans for individuals, teams, and businesses, and choose the cloud desktop workspace option that fits your needs.')
  @section('meta-keywords', 'cloud desktop pricing, pocket office plans, remote workspace pricing, virtual desktop pricing, affordable cloud desktop')
  @section('meta-image', 'https://pocketdesk.sizaf.com/assets/img/hero-images/Pricing.svg')
  @section('canonical', 'https://pocketdesk.sizaf.com/pricing')
  @section('meta-url', 'https://pocketdesk.sizaf.com/pricing')
  @section('structured-data')
  @verbatim
  {
    "@context": "https://schema.org",
    "@type": "WebPage",
    "name": "Pricing | Pocket Office",
    "url": "https://pocketdesk.sizaf.com/pricing",
    "description": "Explore Pocket Office pricing plans for individuals, teams, and businesses, and choose the cloud desktop workspace option that fits your needs.",
    "inLanguage": "en",
    "image": "https://pocketdesk.sizaf.com/assets/img/hero-images/Pricing.svg",
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
                <button class="currency-btn" id="currencyBtn">
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
          <!-- Section label -->
          <p class="personal-section-label">For Individuals</p>

          <!-- Personal card -->
          <div class="card personal-card">
            <div class="card-body personal-card__body">
              <!-- LEFT: icon + title + subtitle + feature checkmarks -->
              <div class="personal-card__left">
                <div class="personal-card__title-row">
                  <i
                    class="fa fa-user-circle personal-card__icon"
                    aria-hidden="true"></i>
                  <span class="personal-card__name">Personal</span>
                  <span class="personal-card__subtitle">Best for individual users</span>
                </div>
                <div class="personal-features-wrapper">
                  <ul class="personal-card__features">
                    <li>
                      <span class="personal-card__check">&#10003;</span> 1
                      User License
                    </li>
                    <li>
                      <span class="personal-card__check">&#10003;</span> 5 GB
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
                    <span class="personal-card__symbol">₹</span>
                    <span
                      class="personal-card__amount"
                      id="personalPrice"
                      data-monthly="399">199</span>
                    <span
                      class="personal-card__period"
                      id="personalPeriodLabel">/month</span>
                  </div>
                </div>

                <div class="personal-card__toggle-row">
                  <span
                    class="personal-card__toggle-label"
                    id="personalMonthlyLabel">Monthly</span>
                  <label class="toggle-switch">
                    <input
                      type="checkbox"
                      class="billing-toggle"
                      id="personalBillingToggle" />
                    <span class="toggle-slider"></span>
                  </label>
                  <span
                    class="personal-card__toggle-label personal-card__yearly-label">
                    Yearly
                    <span
                      class="personal-card__save-badge"
                      id="personalSaveBadge">(Save 10%)</span>
                  </span>
                </div>
                <a
                  href="{{ url('personal-user') }}"
                  class="btn btn-primary personal-card__btn"
                  >
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
        </div>

        <div class="teams-section-wrapper">
          <div class="shared-billing-toggle">
            <button class="billing-pill-btn active" id="sharedMonthlyBtn">
              Monthly
            </button>
            <button class="billing-pill-btn" id="sharedYearlyBtn">
              Annually <span class="save-badge">Save 10%</span>
            </button>
          </div>

          <p class="teams-section-label">For Teams</p>

          <div class="pricing-cards">
            <!-- ── Basic ─────────────────────────────── -->
            <div>
              <div class="card bg-light border-secondary h-100">
                <div class="card-body d-flex flex-column p-4">
                  <h2 class="fw-semibold mb-3">Basic</h2>
                  <h6 class="display-4 fw-bold mb-2 price">
                    ₹
                    <span
                      class="price-amount"
                      id="basicPrice"
                      data-monthly="799">799</span>
                    <span class="user-text">per user/month</span>
                  </h6>

                  <p class="mb-4 pricing-subheading text-black">
                    Best for freelancer and small teams getting started
                  </p>

                  <ul class="list-unstyled mb-4 flex-grow-1 feature-list">
                    <li class="mb-3 d-flex align-items-start">
                      <span class="fw-semibold feature-list-subheading">For Small Teams</span>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                      <span>Licence Count :&nbsp;</span>
                      <span class="base-licence-count">1</span>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                      <span>Per User Storage :&nbsp;</span>
                      <span class="base-storage">10</span>&nbsp;GB
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                      <div class="quantity-box">
                        <button class="qty-btn minus">−</button>
                        <input
                          type="text"
                          class="qty-input"
                          value="1"
                          readonly />
                        <button class="qty-btn plus">+</button>
                      </div>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                      <span>Total Licence Count :&nbsp;</span>
                      <span class="total-licence-count">1</span>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                      <span>Total Pool Storage :&nbsp;</span>
                      <span class="total-pool-storage">10 GB</span>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                      <span>Total Amount :&nbsp;</span>
                      <span class="total-amount">₹ 799</span>
                    </li>
                  </ul>

                  <!-- Annual badge lives here, injected by JS -->
                  <div class="pricing-buttons pricingButtons">
                    <a href="{{ url('payment') }}" class="btn btn-outline-secondary">Get started</a>
                  </div>
                </div>
              </div>
            </div>

            <!-- ── Standard ──────────────────────────── -->
            <div>
              <div class="card bg-light border-secondary h-100">
                <div class="card-body d-flex flex-column p-4">
                  <h2 class="fw-semibold mb-3">Standard</h2>
                  <h6 class="display-4 fw-bold mb-2 price">
                    ₹
                    <span
                      class="price-amount"
                      id="standardPrice"
                      data-monthly="699">699</span>
                    <span class="user-text">per user/month</span>
                  </h6>

                  <p class="mb-4 pricing-subheading text-black">
                    Best for growing teams and scaling companies
                  </p>

                  <ul class="list-unstyled mb-4 flex-grow-1 feature-list">
                    <li class="mb-3 d-flex align-items-start">
                      <span class="fw-semibold feature-list-subheading">For Growing Teams</span>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                      <span>Licence Count :&nbsp;</span>
                      <span class="base-licence-count">10</span>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                      <span>Per User Storage :&nbsp;</span>
                      <span class="base-storage">10</span>&nbsp;GB
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                      <div class="quantity-box">
                        <button class="qty-btn minus">−</button>
                        <input
                          type="text"
                          class="qty-input"
                          value="1"
                          readonly />
                        <button class="qty-btn plus">+</button>
                      </div>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                      <span>Total Licence Count :&nbsp;</span>
                      <span class="total-licence-count">10</span>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                      <span>Total Pool Storage :&nbsp;</span>
                      <span class="total-pool-storage">100 GB</span>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                      <span>Total Amount :&nbsp;</span>
                      <span class="total-amount">₹ 699</span>
                    </li>
                  </ul>

                  <div class="pricing-buttons">
                    <a href="{{ url('payment') }}" class="btn btn-outline-secondary">Get started</a>
                  </div>
                </div>
              </div>
            </div>

            <!-- ── Advanced ───────────────────────────── -->
            <div>
              <div class="card bg-light border-secondary h-100">
                <div class="card-body d-flex flex-column p-4">
                  <h2 class="fw-semibold mb-3">Advanced</h2>
                  <h6 class="display-4 fw-bold mb-2 price">
                    ₹
                    <span
                      class="price-amount"
                      id="advancedPrice"
                      data-monthly="599">599</span>
                    <span class="user-text">per user/month</span>
                  </h6>

                  <p class="mb-4 pricing-subheading text-black">
                    Best for scaling businesses and ambitious startups
                  </p>

                  <ul class="list-unstyled mb-4 flex-grow-1 feature-list">
                    <li class="mb-3 d-flex align-items-start">
                      <span class="fw-semibold feature-list-subheading">For Scaling Businesses</span>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                      <span>Licence Count :&nbsp;</span>
                      <span class="base-licence-count">50</span>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                      <span>Per User Storage :&nbsp;</span>
                      <span class="base-storage">10</span>&nbsp;GB
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                      <div class="quantity-box">
                        <button class="qty-btn minus">−</button>
                        <input
                          type="text"
                          class="qty-input"
                          value="1"
                          readonly />
                        <button class="qty-btn plus">+</button>
                      </div>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                      <span>Total Licence Count :&nbsp;</span>
                      <span class="total-licence-count">50</span>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                      <span>Total Pool Storage :&nbsp;</span>
                      <span class="total-pool-storage">500 GB</span>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                      <span>Total Amount :&nbsp;</span>
                      <span class="total-amount">₹ 599</span>
                    </li>
                  </ul>

                  <div class="pricing-buttons">
                    <a href="{{ url('payment') }}" class="btn btn-outline-secondary">Get started</a>
                  </div>
                </div>
              </div>
            </div>

            <!-- ── Premium ────────────────────────────── -->
            <div>
              <div class="card bg-light border-secondary h-100">
                <div class="card-body d-flex flex-column p-4">
                  <h2 class="fw-semibold mb-3">Premium</h2>
                  <h6 class="display-4 fw-bold mb-2 price">
                    ₹
                    <span
                      class="price-amount"
                      id="premiumPrice"
                      data-monthly="499">499</span>
                    <span class="user-text">per user/month</span>
                  </h6>

                  <p class="mb-4 pricing-subheading text-black">
                    Best for large enterprises and organizations
                  </p>

                  <ul class="list-unstyled mb-4 flex-grow-1 feature-list">
                    <li class="mb-3 d-flex align-items-start">
                      <span class="fw-semibold feature-list-subheading">For Large Enterprises</span>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                      <span>Licence Count :&nbsp;</span>
                      <span class="base-licence-count">100</span>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                      <span>Per User Storage :&nbsp;</span>
                      <span class="base-storage">10</span>&nbsp;GB
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                      <div class="quantity-box">
                        <button class="qty-btn minus">−</button>
                        <input
                          type="text"
                          class="qty-input"
                          value="1"
                          readonly />
                        <button class="qty-btn plus">+</button>
                      </div>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                      <span>Total Licence Count :&nbsp;</span>
                      <span class="total-licence-count">100</span>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                      <span>Total Pool Storage :&nbsp;</span>
                      <span class="total-pool-storage">1000 GB</span>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                      <span>Total Amount :&nbsp;</span>
                      <span class="total-amount">₹ 499</span>
                    </li>
                  </ul>

                  <div class="pricing-buttons">
                    <a href="{{ url('payment') }}" class="btn btn-outline-secondary">Get started</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.pricing-cards -->
        </div>
      </div>

      <div class="container py-5">
        <div class="table-responsive">
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