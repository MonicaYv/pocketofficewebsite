  @extends('layouts.backendsettings')
  @section('title', 'Pricing')
  @section('content')

  <!-- preloader area start -->
  <!-- <div class="preloader" id="preloader">
    <div class="preloader-inner">
      <div class="spinner">
        <div class="dot1"></div>
        <div class="dot2"></div>
      </div>
    </div>
  </div> -->
  <!-- preloader area end -->

  <!-- search Popup -->
  <div class="body-overlay" id="body-overlay"></div>
  <div class="search-popup" id="search-popup">
    <form onsubmit="searchPage(event)" class="search-form">
      <div class="form-group">
        <input type="text" class="form-control" id="search-input" placeholder="Search....." />
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
              <!-- <div class="currency-dropdown-wrapper">
                <button class="currency-btn" id="currencyBtn">
                  <span class="currency-code" id="currencyCode">INR-India</span>

                  <svg class="currency-chevron" viewBox="0 0 10 6" width="10" height="6">
                    <path d="M1 1l4 4 4-4" stroke="currentColor" stroke-width="1.5" fill="none"
                      stroke-linecap="round" />
                  </svg>

                </button>

                <ul class="currency-menu" id="currencyMenu"></ul>
              </div> -->
            </div>
            <p>Choose the plan that fits how your team works today — and tomorrow.</p>
          </div>
        </div>
      </div>
      <div class="flex justify-center">
        <!-- <select name="subscription" class="ul-subscription-type" id="">
                <option value="monthly">monthly</option>
                <option value="yearly">yearly</option>
            </select> -->
        <div class="relative flex items-center px-2 h-10 ul-tab">

          <!-- Sliding yellow highlight -->
          <div id="highlight" class="slider-pill absolute top-1 left-2 h-8">
          </div>

          <!-- MONTHLY -->
          <label class="flex items-center justify-center w-20 z-10 cursor-pointer">
            <input class="ul-subscription-type hidden" type="radio" name="subscription" value="monthly" checked>
            <span class="ul-tab-name font-medium" style="color: #0E0E0E">Monthly</span>
            @if($additional_disc_month > 0)
            <span class="ul-save-badge px-1 py-0.5 z-10">
              Save {{$additional_disc_month}}%
            </span>
            @else
            @endif
          </label>

          <!-- YEARLY -->
          <div class="flex items-center">
            <label class="flex items-center justify-center w-16 ml-4 z-10 cursor-pointer">
              <input class="ul-subscription-type hidden" type="radio" name="subscription" value="yearly">
              <span class="ul-tab-name">Annually</span>
            </label>
            @if($additional_disc_year > 0)
            <span class="ul-save-badge px-1 py-0.5 z-10">
              Save {{$additional_disc_year}}%
            </span>
            @else
            @endif
          </div>
        </div>
      </div>
      <div class="container">

        <div class="pricing-cards">

          <!-- Basic Plan -->
          <div class="">
            <div class="card bg-light border-secondary h-100">
              <div class="card-body d-flex flex-column p-4">
                <h2 class="fw-semibold mb-3">Basic</h2>
                <h6 class="display-4 fw-bold mb-2 price">
                  ₹
                  <span class="price-amount" id="basicPrice" data-monthly="
                   799
               " data-annual="54">
                    799
                  </span>
                  <span class="user-text">per user/month</span>
                </h6>

                <div class="billing-toggle-wrapper">
                  <label class="toggle-switch">
                    <input type="checkbox" class="billing-toggle">
                    <span class="toggle-slider"></span>
                  </label>
                  <span class="toggle-label annual-label">Billed Yearly <span class="discount-text">(Save
                      10%)</span></span>
                </div>
                <p class="mb-4 pricing-subheading text-black">Best for freelancer and small teams getting started</p>

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
                      <input type="text" class="qty-input" value="1" readonly>
                      <button class="qty-btn plus">+</button>
                    </div>
                  </li>
                  <li class="mb-3 d-flex align-items-start">
                    <span>Total Licence Count:&nbsp;</span>
                    <span class="total-licence-count">1</span>
                  </li>
                  <li class="mb-3 d-flex align-items-start">
                    <span>Total Pool Storage :&nbsp;</span>
                    <span class="total-pool-storage">10 GB</span>
                  </li>
                  <li class="mb-3 d-flex align-items-start">
                    <span>Total Amount:&nbsp;</span>
                    <span class="total-amount">₹
                      799
                    </span>
                  </li>
                </ul>

                <div class="pricing-buttons">
                  <a href="/payment.html" class="btn btn-outline-secondary">Get started</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Standard Plan -->
          <div class="">
            <div class="card bg-light border-secondary h-100">
              <div class="card-body d-flex flex-column p-4">
                <h2 class="fw-semibold mb-3">Standard</h2>
                <h6 class="display-4 fw-bold mb-2 price">
                  ₹
                  <span class="price-amount" id="standardPrice" data-monthly="699" data-annual="540">699</span>
                  <span class="user-text">per user/month</span>
                </h6>

                <div class="billing-toggle-wrapper">
                  <label class="toggle-switch">
                    <input type="checkbox" class="billing-toggle">
                    <span class="toggle-slider"></span>
                  </label>
                  <span class="toggle-label annual-label">Billed Yearly <span class="discount-text">(Save
                      10%)</span></span>
                </div>
                <p class="mb-4 pricing-subheading text-black">Best for growing teams and scaling companies</p>

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
                      <input type="text" class="qty-input" value="1" readonly>
                      <button class="qty-btn plus">+</button>
                    </div>
                  </li>
                  <li class="mb-3 d-flex align-items-start">
                    <span>Total Licence Count:&nbsp;</span>
                    <span class="total-licence-count">10</span>
                  </li>
                  <li class="mb-3 d-flex align-items-start">
                    <span>Total Pool Storage :&nbsp;</span>
                    <span class="total-pool-storage">100 GB</span>
                  </li>
                  <li class="mb-3 d-flex align-items-start">
                    <span>Total Amount:&nbsp;</span>
                    <span class="total-amount">₹
                      699</span>
                  </li>
                </ul>

                <div class="pricing-buttons">
                  <a href="/payment.html" class="btn btn-outline-secondary">Get started</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Advanced Plan -->
          <div class="">
            <div class="card bg-light border-secondary h-100">
              <div class="card-body d-flex flex-column p-4">
                <h2 class="fw-semibold mb-3">Advanced</h2>
                <h6 class="display-4 fw-bold mb-2 price">
                  ₹
                  <span class="price-amount" id="advancedPrice" data-monthly="599" data-annual="2430">599</span>
                  <span class="user-text">per user/month</span>
                </h6>

                <div class="billing-toggle-wrapper">
                  <label class="toggle-switch">
                    <input type="checkbox" class="billing-toggle">
                    <span class="toggle-slider"></span>
                  </label>
                  <span class="toggle-label annual-label">Billed Yearly <span class="discount-text">(Save
                      10%)</span></span>
                </div>
                <p class="mb-4 pricing-subheading text-black">Best for scaling businesses and ambitious startups</p>

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
                      <input type="text" class="qty-input" value="1" readonly>
                      <button class="qty-btn plus">+</button>
                    </div>
                  </li>
                  <li class="mb-3 d-flex align-items-start">
                    <span>Total Licence Count:&nbsp;</span>
                    <span class="total-licence-count">50</span>
                  </li>
                  <li class="mb-3 d-flex align-items-start">
                    <span>Total Pool Storage :&nbsp;</span>
                    <span class="total-pool-storage">500 GB</span>
                  </li>
                  <li class="mb-3 d-flex align-items-start">
                    <span>Total Amount:&nbsp;</span>
                    <span class="total-amount">₹
                      599</span>
                  </li>
                </ul>

                <div class="pricing-buttons">
                  <a href="/payment.html" class="btn btn-outline-secondary">Get started</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Premium Plan -->
          <div class="">
            <div class="card bg-light border-secondary h-100">
              <div class="card-body d-flex flex-column p-4">
                <h2 class="fw-semibold mb-3">Premium</h2>
                <h6 class="display-4 fw-bold mb-2 price">
                  ₹
                  <span class="price-amount" id="premiumPrice" data-monthly="499" data-annual="4320">499</span>
                  <span class="user-text">per user/month</span>
                </h6>

                <div class="billing-toggle-wrapper">
                  <label class="toggle-switch">
                    <input type="checkbox" class="billing-toggle">
                    <span class="toggle-slider"></span>
                  </label>
                  <span class="toggle-label annual-label">Billed Yearly <span class="discount-text">(Save
                      10%)</span></span>
                </div>
                <p class="mb-4 pricing-subheading text-black">Best for large enterprises and organizations</p>

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
                      <input type="text" class="qty-input" value="1" readonly>
                      <button class="qty-btn plus">+</button>
                    </div>
                  </li>
                  <li class="mb-3 d-flex align-items-start">
                    <span>Total Licence Count:&nbsp;</span>
                    <span class="total-licence-count">100</span>
                  </li>
                  <li class="mb-3 d-flex align-items-start">
                    <span>Total Pool Storage :&nbsp;</span>
                    <span class="total-pool-storage">1000 GB</span>
                  </li>
                  <li class="mb-3 d-flex align-items-start">
                    <span>Total Amount:&nbsp;</span>
                    <span class="total-amount">₹
                      499</span>
                  </li>
                </ul>

                <div class="pricing-buttons">
                  <a href="/payment.html" class="btn btn-outline-secondary">Get started</a>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>


      <div class="container py-5">
        <div class="table-responsive">
          <table class="table pricing-table text-center align-middle" id="pricingTable">
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
                <td><a href="/payment.html" class="btn btn-outline-secondary">Get
                    started</a></td>
                <td><a href="/payment.html" class="btn btn-outline-secondary">Get
                    started</a></td>
                <td><a href="/payment.html" class="btn btn-outline-secondary">Get
                    started</a></td>
                <td><a href="/payment.html" class="btn btn-outline-secondary">Get
                    started</a></td>
              </tr>

            </tbody>
          </table>
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
  @endsection