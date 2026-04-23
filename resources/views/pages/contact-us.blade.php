  @extends('layouts.backendsettings')
  @section('title', 'Contact Us | Get in Touch with Pocket Office')
  @section('content')
  <!-- breadcrumb area start -->
  <div class="breadcrumb-area" style="background-image:url('{{ asset($constants['IMAGEFILEPATH'] . 'hero-images/Contact\ -\ Us.svg') }}');">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <div class="breadcrumb-inner">
                      <h1 class="page-title">Contact Us</h1>


                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- breadcrumb area End -->

  <!-- Contact area start -->
  <!-- =============================================
         MAP SECTION — placed directly below the cards
    ============================================== -->
  <section class="map-section">
      <div class="map-section-inner">
          <div class="map-section-header">
              <h2>Regional Office</h2>
              <p>Visit one of our offices or reach out — we'd love to connect with you in person.</p>
          </div>

          <div class="map-wrapper">
              <!-- Leaflet Map -->
              <div id="office-map"></div>

              <!-- Office Info Cards -->
              <div class="map-info-panel">

                  <div class="map-office-card" data-lat="40.7282" data-lng="-73.7338" data-zoom="12">
                      <h1>Regional Address</h1>
                      <h3>United States</h3>
                      <div class="office-detail">
                          <i class="fa-solid fa-location-dot"></i>
                          <span>218-10, Hillside Ave, Queens Village, New York, USA, 11427.</span>
                      </div>
                      <div class="office-detail">
                          <i class="fa-solid fa-phone"></i>
                          <span>+ 60 146600012</span>
                      </div>
                      <div class="office-detail">
                          <i class="fa-solid fa-envelope"></i>
                          <span>hello@pocketOffice.com</span>
                      </div>
                  </div>

                  <div class="map-office-card" data-lat="3.0942" data-lng="101.6831" data-zoom="12">
                      <h1>Regional Address</h1>
                      <h3>Malaysia</h3>
                      <div class="office-detail">
                          <i class="fa-solid fa-location-dot"></i>
                          <span>M116, Jalan Mega Mendung, Off Jalan Klang Lama, 58200, Kuala Lumpur, Malaysia.</span>
                      </div>
                      <div class="office-detail">
                          <i class="fa-solid fa-phone"></i>
                          <span>+ 60 146600012</span>
                      </div>
                      <div class="office-detail">
                          <i class="fa-solid fa-envelope""></i>
                            <span>hello@pocketOffice.com</span>
                        </div>

                    </div>

                    <div class=" map-office-card" data-lat="19.1874" data-lng="72.8484" data-zoom="12">
                              <h1>Regional Address</h1>
                              <h3>India</h3>
                              <div class="office-detail">
                                  <i class="fa-solid fa-location-dot"></i>
                                  <span>3102, 1st Floor, Rustomjee Eaze Zone, Sundar Nagar, Malad West - Mumbai
                                      400064, MH -
                                      IN</span>
                              </div>
                              <div class="office-detail">
                                  <i class="fa-solid fa-phone"></i>
                                  <span>+ 91 9967940928</span>
                              </div>
                              <div class="office-detail">
                                  <i class="fa-solid fa-envelope""></i>
                            <span>hello@pocketOffice.com</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Map Section End -->
    <div class=" contact-area">
        <div class="contact-container">
            <div class="contact-header">
                <h1 class="heading">How can we help?</h1>
                <span>Get in touch with our sales and support teams for demos,
                    onboarding support, or product
                    questions.</span>
            </div>
            <div class="support-cards">
                <div class="card">
                    <div class="card-head">
                        <div>
                            <span class="card-heading">Sales</span>
                        </div>
                        <p class="card-info">Speak to our sales team about plans,
                            pricing or
                            request a demo.</p>
                    </div>
                    <button class="card-btn open-contact-modal">Talk to sales</button>
                </div>
                <div class="card">
                    <div class="card-head">
                        <div>
                            <span class="card-heading">Help & Support</span>
                        </div>
                        <p class="card-info">Ask product questions, report problems, or
                            leave feedback.</p>
                    </div>
                    <button class="card-btn"
                        onclick="window.open('https:helpdesk.pocketoffice.sizaf.com/submit-ticket', '_blank')">
                        Contact support
                    </button>
                </div>
                <div class="card">
                    <div class="card-head">
                        <div>
                            <span class="card-heading">General Contact</span>
                        </div>
                        <p class="card-info">For other queries, please get in touch with
                            us via email.</p>
                    </div>
                    <button class="mail card-btn">hello@Pocketoffice.com</button>
                </div>
            </div>
            <div class="support-cards">

            </div>
        </div>
    </div>
    <!-- Contact area end -->

    <!-- Modal Overlay -->
    <div class=" modal-overlay">
        <div class="contact-modal">
            <button type="button" class="contact-support">&times;</button>

            <h2 class="modal-title">Tell us how we can help</h2>
            <form id="serviceForm" class="form needs-validation salesEnquiryForm"
                novalidate>
                <div class="form-item">
                    <label for="companyName">Company Name</label>
                    <input type="text" id="companyName" name="companyName"
                        placeholder="Company Name" class="form-control" required />
                    <div class="invalid-feedback">Company name is required.</div>
                </div>
                <div class="enquiry-form-group">
                    <label for="industry">Industry</label>
                    <select id="industry" name="industry" required
                        style="padding:12px 40px 12px 16px;appearance:none;-webkit-appearance:none;-moz-appearance:none;background-image:url('data:image/svg+xml;utf8,<svg fill=\'%23333\' height=\'20\' viewBox=\'0 0 20 20\' width=\'20\' xmlns=\'http://www.w3.org/2000/svg\'><path d=\'M5 7l5 5 5-5z\'/></svg>');background-repeat:no-repeat;background-position:right 12px center;">
                        <option value="" hidden>Select Industry</option>
                        <option value="bpo">BPO Outsourcing</option>
                        <option value="consulting">Consulting</option>
                        <option value="design">Design & Media Studios</option>
                        <option value="education">Education</option>
                        <option value="finance">Finance & Accounting</option>
                        <option value="healthcare">Healthcare</option>
                        <option value="software">IT & Software Development</option>
                        <option value="legal">Legal Services</option>
                        <option value="manufacturing">Manufacturing</option>
                        <option value="media">Media & Publishing</option>
                        <option value="retail">Retail & E-commerce</option>

                    </select>
                </div>
                <div class="form-grid">
                    <div class="form-item">
                        <label for="firstName">First Name</label>
                        <input type="text" id="firstName" name="firstName"
                            placeholder="First name" class="form-control" required />
                        <div class="invalid-feedback">First name is required.</div>
                    </div>
                    <div class="form-item">
                        <label for="lastName">Last Name</label>
                        <input type="text" id="lastName" name="lastName"
                            placeholder="Last name" class="form-control" required />
                        <div class="invalid-feedback">Last name is required.</div>
                    </div>
                </div>
                <div class="form-grid">
                    <div class="form-item">
                        <label for="phoneNumber">Contact Number</label>
                        <div class="phone-input">
                            <select id="countryCodes" name="countryCodes" required></select>
                            <div class="contact-divider"></div>
                            <input type="tel" id="phoneNumber" name="phoneNumber"
                                placeholder="Enter Contact Number" class="form-control"
                                required />
                            <div class="invalid-feedback">Valid contact number is
                                required.</div>
                        </div>
                    </div>
                    <div class="form-item">
                        <label for="email" class="emailLabel">Email</label>
                        <div class="phone-input">
                            <input type="email" id="email" name="email" placeholder="Email"
                                class="form-control" required />
                            <div class="invalid-feedback">Please enter a valid email
                                address.</div>
                        </div>
                    </div>
                </div>
                <div class="form-grid">
                    <div class="form-item">
                        <label for="website">Website</label>
                        <input type="text" id="website" name="website"
                            placeholder="Website URL" class="form-control" required />
                        <div class="invalid-feedback">Please enter a valid website URL.
                        </div>
                    </div>
                    <div class="form-item">
                        <label for="companyAddress">Company Address</label>
                        <input type="text" id="companyAddress" name="companyAddress"
                            placeholder="Company Address" class="form-control" required />
                        <div class="invalid-feedback">Company address is required.</div>
                    </div>
                    <div class="form-item">
                        <label for="country">Country</label>
                        <select id="country" name="country" required>
                            <option value="">Loading countries...</option>
                        </select>
                    </div>
                    <div class="form-item">
                        <label for="city">City</label>
                        <input type="text" id="city" name="city" placeholder="City"
                            class="form-control" required />
                        <div class="invalid-feedback">City is required.</div>
                    </div>
                </div>
                <div class="form-item services-form">
                    <label for="department">Services</label>
                    <div class="accordion" id="accordion">
                        <div class="single-accordion card">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-link" type="button"
                                        data-toggle="collapse" data-target="#collapseOne"
                                        aria-expanded="true" aria-controls="collapseOne">
                                        Core Location & Mapping APIs
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseOne" class="collapse show"
                                aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body-enquiry">
                                    <div class="checkbox-grid">
                                        <div class="form-check"><input
                                                class="form-check-input big-checkbox select-all"
                                                type="checkbox" /><span
                                                class="form-check-label">Select
                                                All</span></div>
                                        <div class="form-check"><input
                                                class="form-check-input big-checkbox"
                                                type="checkbox" name="services[]"
                                                value="Autocomplete" /><span
                                                class="form-check-label">Autocomplete</span>
                                        </div>
                                        <div class="form-check"><input
                                                class="form-check-input big-checkbox"
                                                type="checkbox" name="services[]"
                                                value="Geocoding" /><span
                                                class="form-check-label">Geocoding</span>
                                        </div>
                                        <div class="form-check"><input
                                                class="form-check-input big-checkbox"
                                                type="checkbox" name="services[]"
                                                value="Reverse Geocoding" /><span
                                                class="form-check-label">Reverse
                                                Geocoding</span></div>
                                        <div class="form-check"><input
                                                class="form-check-input big-checkbox"
                                                type="checkbox" name="services[]"
                                                value="Places Nearby Search" /><span
                                                class="form-check-label">Places Nearby
                                                Search</span></div>
                                        <div class="form-check"><input
                                                class="form-check-input big-checkbox"
                                                type="checkbox" name="services[]"
                                                value="Place Details" /><span
                                                class="form-check-label">Place
                                                Details</span></div>
                                        <div class="form-check"><input
                                                class="form-check-input big-checkbox"
                                                type="checkbox" name="services[]"
                                                value="Text Search" /><span
                                                class="form-check-label">Text
                                                Search</span></div>
                                        <div class="form-check"><input
                                                class="form-check-input big-checkbox"
                                                type="checkbox" name="services[]"
                                                value="Custom POI" /><span
                                                class="form-check-label">Custom
                                                POI</span></div>
                                        <div class="form-check"><input
                                                class="form-check-input big-checkbox"
                                                type="checkbox" name="services[]"
                                                value="Address Validation" /><span
                                                class="form-check-label">Address
                                                Validation</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-accordion card">
                            <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button"
                                        data-toggle="collapse" data-target="#collapseTwo"
                                        aria-expanded="false" aria-controls="collapseTwo">
                                        Navigation, Routing & Transport APIs
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse"
                                aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body-enquiry">
                                    <div class="checkbox-grid">
                                        <div class="form-check"><input
                                                class="form-check-input big-checkbox select-all"
                                                type="checkbox" /><span
                                                class="form-check-label">Select
                                                All</span></div>
                                        <div class="form-check"><input
                                                class="form-check-input big-checkbox"
                                                type="checkbox" name="services[]"
                                                value="Route Optimizer" /><span
                                                class="form-check-label">Route
                                                Optimizer</span></div>
                                        <div class="form-check"><input
                                                class="form-check-input big-checkbox"
                                                type="checkbox" name="services[]"
                                                value="Directions Navigation" /><span
                                                class="form-check-label">Directions
                                                Navigation</span></div>
                                        <div class="form-check"><input
                                                class="form-check-input big-checkbox"
                                                type="checkbox" name="services[]"
                                                value="Snap-to-Road" /><span
                                                class="form-check-label">Snap-to-Road</span>
                                        </div>
                                        <div class="form-check"><input
                                                class="form-check-input big-checkbox"
                                                type="checkbox" name="services[]"
                                                value="Speed Limits" /><span
                                                class="form-check-label">Speed
                                                Limits</span></div>
                                        <div class="form-check"><input
                                                class="form-check-input big-checkbox"
                                                type="checkbox" name="services[]"
                                                value="Elevation API" /><span
                                                class="form-check-label">Elevation
                                                API</span></div>
                                        <div class="form-check"><input
                                                class="form-check-input big-checkbox"
                                                type="checkbox" name="services[]"
                                                value="Fleet Planner" /><span
                                                class="form-check-label">Fleet
                                                Planner</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-accordion card">
                            <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button"
                                        data-toggle="collapse" data-target="#collapseThree"
                                        aria-expanded="false" aria-controls="collapseThree">
                                        Map Visualization, Geofencing & Analytics APIs
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseThree" class="collapse"
                                aria-labelledby="headingThree" data-parent="#accordion">
                                <div class="card-body-enquiry">
                                    <div class="checkbox-grid">
                                        <div class="form-check"><input
                                                class="form-check-input big-checkbox select-all"
                                                type="checkbox" /><span
                                                class="form-check-label">Select
                                                All</span></div>
                                        <div class="form-check"><input
                                                class="form-check-input big-checkbox"
                                                type="checkbox" name="services[]"
                                                value="Geofencing CRUD" /><span
                                                class="form-check-label">Geofencing
                                                CRUD</span></div>
                                        <div class="form-check"><input
                                                class="form-check-input big-checkbox"
                                                type="checkbox" name="services[]"
                                                value="Vector Tiles" /><span
                                                class="form-check-label">Vector
                                                Tiles</span></div>
                                        <div class="form-check"><input
                                                class="form-check-input big-checkbox"
                                                type="checkbox" name="services[]"
                                                value="Street View" /><span
                                                class="form-check-label">Street
                                                View</span></div>
                                        <div class="form-check"><input
                                                class="form-check-input big-checkbox"
                                                type="checkbox" name="services[]"
                                                value="Satellite View" /><span
                                                class="form-check-label">Satellite
                                                View</span></div>
                                        <div class="form-check"><input
                                                class="form-check-input big-checkbox"
                                                type="checkbox" name="services[]"
                                                value="Maps Analytics" /><span
                                                class="form-check-label">Maps
                                                Analytics</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-item">
                    <label for="message">Your Message</label>
                    <textarea placeholder="Write a Message..." class="message" id="message"
                        name="message" rows="4"></textarea>
                </div>
                <div class="form-item">
                    <div class="g-recaptcha"
                        data-sitekey="6LftJJ8qAAAAAOGdsVx3yOGqvRXTVc2VUQl8D-tW"></div>
                </div>
                <div class="form-item">
                    <button class="enquiry-btn" type="submit">Submit Request</button>
                </div>
            </form>
        </div>
    </div>

    <div class="support-modal-overlay">
        <div class="support-modal">
            <p class="support-text">Log in to your Linear account so we can help you faster:
            </p>
            <button class="support-login-btn">Log in</button>
            <p class="support-alt">or email us at <a
                    href="mailto:support@linear.app">support@linear.app</a></p>
        </div>
    </div>
    @endsection

    <script>
        $("#serviceForm").on("submit", function(e) {
            e.preventDefault();
            const recaptchaResponse = grecaptcha.getResponse();
            if (!recaptchaResponse) {
                toastr.error("Please complete the reCAPTCHA");
                return;
            }
        });

        document.addEventListener("change", function(e) {
            if (e.target && e.target.classList.contains("select-all")) {
                var grid = e.target.closest(".checkbox-grid");
                if (!grid) return;
                var checked = e.target.checked;
                grid.querySelectorAll(".form-check-input:not(.select-all):not(:disabled)").forEach(function(cb) {
                    cb.checked = checked;
                    cb.dispatchEvent(new Event("change", {
                        bubbles: true
                    }));
                });
                return;
            }
            if (e.target && e.target.matches(".checkbox-grid .form-check-input") && !e.target.classList.contains("select-all")) {
                var grid = e.target.closest(".checkbox-grid");
                if (!grid) return;
                var items = Array.from(grid.querySelectorAll(".form-check-input:not(.select-all):not(:disabled)"));
                var allChecked = items.length > 0 && items.every(function(cb) {
                    return cb.checked;
                });
                var selectAll = grid.querySelector(".select-all");
                if (selectAll) selectAll.checked = allChecked;
            }
        });
    </script>