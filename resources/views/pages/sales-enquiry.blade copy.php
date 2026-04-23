   @section('content')
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




  <section class="mil-login mil-p-120-0">
    <div class="form-box">
      <h2 class="form-heading">Sales enquiry form</h2>
      <form id="serviceForm" class="form needs-validation salesEnquiryForm" novalidate>
        <!-- Company Name -->
        <div class="form-item">
          <label for="companyName">Company Name</label>
          <input type="text" id="companyName" name="companyName" placeholder="Company Name" class="form-control"
            required />
          <div class="invalid-feedback">Company name is required.</div>
        </div>
        <div class="enquiry-form-group">
          <label for="industry">Industry</label>
          <select id="industry" name="industry" required style="
    padding: 12px 40px 12px 16px;
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background-image: url('data:image/svg+xml;utf8,<svg fill=\'%23333\' height=\'20\' viewBox=\'0 0 20 20\' width=\'20\' xmlns=\'http://www.w3.org/2000/svg\'><path d=\'M5 7l5 5 5-5z\'/></svg>');
    background-repeat: no-repeat;
    background-position: right 12px center;
  ">
            <option value="" hidden>Select Industry</option>
            <option value="education">
              Education
            </option>
            <option value="consulting">
              Consulting
            </option>
            <option value="healthcare">
              Healthcare
            </option>
            <option value="finance">Finance & Accounting</option>
            <option value="software">IT & Software Development</option>
            <option value="design">Design & Media Studios</option>
            <option value="legal">Legal Services</option>
            <option value="manufacturing">Manufacturing</option>
            <option value="media">Media & Publishing</option>
            <option value="retail">Retail & E-commerce</option>
            <option value="bpo">BPO Outsourcing</option>
          </select>
        </div>
        <!-- First Name and Last Name -->
        <div class="form-grid">
          <div class="form-item">
            <label for="firstName">First Name</label>
            <input type="text" id="firstName" name="firstName" placeholder="First name" class="form-control" required />
            <div class="invalid-feedback">First name is required.</div>
          </div>
          <div class="form-item">
            <label for="lastName">Last Name</label>
            <input type="text" id="lastName" name="lastName" placeholder="Last name" class="form-control" required />
            <div class="invalid-feedback">Last name is required.</div>
          </div>
        </div>

        <div class="form-grid">
          <!-- Contact Number -->
          <div class="form-item">
            <label for="phoneNumber">Contact Number</label>
            <div class="phone-input">
              <!-- Country Code Dropdown -->
              <select id="countryCodes" name="countryCodes" required>
                <!-- Options will be populated dynamically -->
              </select>

              <!-- Divider Line -->
              <div class="contact-divider"></div>

              <!-- Phone Number Input -->
              <input type="tel" id="phoneNumber" name="phoneNumber" placeholder="Enter Contact Number"
                title="Please enter a 10-digit phone number" class="form-control" required />
              <div class="invalid-feedback">Valid contact number is required.</div>
            </div>
          </div>

          <div class="form-item">
            <label for="email" class="emailLabel">Email</label>
            <div class="phone-input">
              <input type="email" id="email" name="email" placeholder="Email" class="form-control" required />
              <div class="invalid-feedback">Please enter a valid email address.</div>
            </div>
          </div>
        </div>
        <div class="form-grid">
          <div class="form-item">
            <label for="website">Website</label>
            <input type="text" id="website" name="website" placeholder="Website URL" class="form-control" required />
            <div class="invalid-feedback">Please enter a valid website URL.</div>
          </div>
          <div class="form-item">
            <label for="companyAddress">Company Address</label>
            <input type="text" id="companyAddress" name="companyAddress" placeholder="Company Address"
              class="form-control" required />
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
            <input type="text" id="city" name="city" placeholder="City" class="form-control" required />
            <div class="invalid-feedback">City is required.</div>
          </div>

        </div>

        <!-- Services -->
        <div class="form-item services-form">
          <label for="department">Services</label>


          <div class="accordion" id="accordion">
            <!--Core Location & Mapping APIs-->
            <div class="single-accordion card">
              <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                  <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    Core Location & Mapping APIs
                  </button>
                </h2>
              </div>
              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body-enquiry">
                  <div class="checkbox-grid">
                    <div class="form-check">
                      <input class="form-check-input big-checkbox select-all" type="checkbox" />
                      <span class="form-check-label">Select All</span>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input big-checkbox" type="checkbox" name="services[]"
                        value="Autocomplete" />
                      <span class="form-check-label">Autocomplete</span>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input big-checkbox" type="checkbox" name="services[]"
                        value="Geocoding" />
                      <span class="form-check-label">Geocoding</span>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input big-checkbox" type="checkbox" name="services[]"
                        value="Reverse Geocoding" />
                      <span class="form-check-label">Reverse Geocoding</span>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input big-checkbox" type="checkbox" name="services[]"
                        value="Places Nearby Search" />
                      <span class="form-check-label">Places Nearby Search</span>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input big-checkbox" type="checkbox" name="services[]"
                        value="Places Nearby Search Advance" />
                      <span class="form-check-label">Places Nearby Search Advance</span>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input big-checkbox" type="checkbox" name="services[]"
                        value="Place Details" />
                      <span class="form-check-label">Place Details</span>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input big-checkbox" type="checkbox" name="services[]"
                        value="Place Details Advance" />
                      <span class="form-check-label">Place Details Advance</span>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input big-checkbox" type="checkbox" name="services[]"
                        value="Text Search" />
                      <span class="form-check-label">Text Search</span>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input big-checkbox" type="checkbox" name="services[]"
                        value="Place Photo" />
                      <span class="form-check-label">Place Photo</span>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input big-checkbox" type="checkbox" name="services[]"
                        value="Custom POI" />
                      <span class="form-check-label">Custom POI</span>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input big-checkbox" type="checkbox" name="services[]"
                        value="Address Validation" />
                      <span class="form-check-label">Address Validation</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Navigation, Routing & Transport APIs -->
            <div class="single-accordion card">
              <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="false" aria-controls="collapseTwo">
                    Navigation, Routing & Transport APIs
                  </button>
                </h2>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body-enquiry">
                  <div class="checkbox-grid">
                    <div class="form-check">
                      <input class="form-check-input big-checkbox select-all" type="checkbox" />
                      <span class="form-check-label">Select All</span>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input big-checkbox" type="checkbox" name="services[]"
                        value="Route Optimizer" />
                      <span class="form-check-label">Route Optimizer</span>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input big-checkbox" type="checkbox" name="services[]"
                        value="Pure Maps Distance Matrix Basic" />
                      <span class="form-check-label">Pure Maps Distance Matrix Basic</span>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input big-checkbox" type="checkbox" name="services[]"
                        value="Pure Maps Distance Matrix" />
                      <span class="form-check-label">Pure Maps Distance Matrix</span>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input big-checkbox" type="checkbox" name="services[]"
                        value="Directions Basic Navigation" />
                      <span class="form-check-label">Directions Basic Navigation</span>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input big-checkbox" type="checkbox" name="services[]"
                        value="Directions Navigation" />
                      <span class="form-check-label">Directions Navigation</span>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input big-checkbox" type="checkbox" name="services[]"
                        value="Snap-to-Road" />
                      <span class="form-check-label">Snap-to-Road</span>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input big-checkbox" type="checkbox" name="services[]"
                        value="Nearest Road" />
                      <span class="form-check-label">Nearest Road</span>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input big-checkbox" type="checkbox" name="services[]"
                        value="Speed Limits" />
                      <span class="form-check-label">Speed Limits</span>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input big-checkbox" type="checkbox" name="services[]"
                        value="Elevation API" />
                      <span class="form-check-label">Elevation API</span>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input big-checkbox" type="checkbox" name="services[]"
                        value="Fleet Planner" />
                      <span class="form-check-label">Fleet Planner</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!--Map Visualization, Geofencing & Analytics APIs-->
            <div class="single-accordion card">
              <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                    data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Map Visualization, Geofencing & Analytics APIs
                  </button>
                </h2>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-body-enquiry">
                  <div class="checkbox-grid">
                    <div class="form-check">
                      <input class="form-check-input big-checkbox select-all" type="checkbox" />
                      <span class="form-check-label">Select All</span>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input big-checkbox" type="checkbox" name="services[]"
                        value="Geofencing CRUD" />
                      <span class="form-check-label">Geofencing CRUD</span>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input big-checkbox" type="checkbox" name="services[]"
                        value="Geofencing List" />
                      <span class="form-check-label">Geofencing List</span>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input big-checkbox" type="checkbox" name="services[]"
                        value="Geofencing Status" />
                      <span class="form-check-label">Geofencing Status</span>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input big-checkbox" type="checkbox" name="services[]"
                        value="Vector Tiles" />
                      <span class="form-check-label">Vector Tiles</span>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input big-checkbox" type="checkbox" name="services[]"
                        value="Static Tiles" />
                      <span class="form-check-label">Static Tiles</span>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input big-checkbox" type="checkbox" name="services[]" value="3D Tiles" />
                      <span class="form-check-label">3D Tiles</span>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input big-checkbox" type="checkbox" name="services[]"
                        value="Street View" />
                      <span class="form-check-label">Street View</span>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input big-checkbox" type="checkbox" name="services[]"
                        value="Satellite View" />
                      <span class="form-check-label">Satellite View</span>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input big-checkbox" type="checkbox" name="services[]"
                        value="Maps Analytics" />
                      <span class="form-check-label">Maps Analytics</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Your Message -->
        <div class="form-item">
          <label for="message">Your Message</label>
          <textarea placeholder="Write a Message..." class="message" id="message" name="message" rows="4"></textarea>
        </div>

        <!-- Captcha -->
        <div class="form-item">
          <div class="g-recaptcha" data-sitekey="6LftJJ8qAAAAAOGdsVx3yOGqvRXTVc2VUQl8D-tW"></div>
        </div>
        <!-- Submit Button -->
        <div class="form-item">
          <button class="enquiry-btn" type="submit">Submit Request</button>
        </div>
      </form>
    </div>
  </section>



  <!-- back to top area start -->
  <div class="back-to-top">
    <span class="back-top"><i class="fa fa-angle-up"></i></span>
  </div>
  <!-- back to top area end -->
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
      // Select All toggled
      if (e.target && e.target.classList.contains("select-all")) {
        var grid = e.target.closest(".checkbox-grid");
        if (!grid) return;
        var checked = e.target.checked;
        grid
          .querySelectorAll(
            ".form-check-input:not(.select-all):not(:disabled)"
          )
          .forEach(function(cb) {
            cb.checked = checked;
            // dispatch change so any listeners update
            cb.dispatchEvent(new Event("change", {
              bubbles: true
            }));
          });
        return;
      }

      // Individual checkbox changed -> update select all
      if (
        e.target &&
        e.target.matches(".checkbox-grid .form-check-input") &&
        !e.target.classList.contains("select-all")
      ) {
        var grid = e.target.closest(".checkbox-grid");
        if (!grid) return;
        var items = Array.from(
          grid.querySelectorAll(
            ".form-check-input:not(.select-all):not(:disabled)"
          )
        );
        var allChecked =
          items.length > 0 &&
          items.every(function(cb) {
            return cb.checked;
          });
        var selectAll = grid.querySelector(".select-all");
        if (selectAll) selectAll.checked = allChecked;
      }
    });
  </script>

  <script>
    document.getElementById("serviceForm").addEventListener("submit", function(e) {
      e.preventDefault();

      let formData = new FormData(this);

      fetch("https://mapui1.aibuzz.net/send_enquiry", {
          method: "POST",
          body: formData
        })
        .then(res => res.json())
        .then(data => {
          console.log("🔎 Sales enquiry response:", data);
          if (data.result === "success") {
            toastr.success(data.msg);
            this.reset();
          } else {
            toastr.error(data.msg);
          }
        })
        .catch(err => {
          console.error("Fetch error:", err);
          toastr.error("Something went wrong. Try again.");
        });
    });
  </script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const loginForm = document.querySelector(".signIn-form");

      if (!loginForm) return;

      loginForm.addEventListener("submit", async function(e) {
        e.preventDefault();

        // Grab form inputs
        const email = this.querySelector('input[type="text"]').value.trim();
        const password = this.querySelector('input[type="password"]').value;

        // Basic validation
        if (!email || !password) {
          toastr.error("Please enter both email and password");
          return;
        }

        try {
          // Prepare form data
          const formData = new FormData();
          formData.append("email", email);
          formData.append("password", password);

          // Send POST request
          const response = await fetch("https://mapui1.aibuzz.net/login", {
            method: "POST",
            body: formData
          });

          const data = await response.json();
          console.log("Login response:", data);

          if (data.status === "success") {
            toastr.success(data.msg);

            // Redirect to dashboard after a short delay
            setTimeout(() => {
              window.location.href = data.redirect_url;
            }, 1000); // 1 second delay to show toast
          } else {
            toastr.error(data.msg);
          }
        } catch (err) {
          console.error("Login fetch error:", err);
          toastr.error("Something went wrong. Please try again.");
        }
      });
    });
  </script>
  @endsection