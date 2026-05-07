  <div>
      <div id="sales-enquiry-modal">
          <button id="sales-enquiry-close" aria-label="Close">&times;</button>

          <!-- Paste your existing modal content here -->
          <div class="contact-modal">
              <h2 class="modal-title">Tell us how we can help</h2>
              <form id="serviceForm" class="form needs-validation salesEnquiryForm" novalidate>
                  <div class="form-item">
                      <label for="companyName">Company Name</label>
                      <input type="text" id="companyName" name="companyName" placeholder="Company Name"
                          class="form-control" required />
                      <div class="invalid-feedback">Company name is required.</div>
                  </div>
                  <div class="enquiry-form-group">
                      <label for="industry">Industry</label>
                      <select id="industry" name="industry" required
                          style="padding:12px 40px 12px 16px;appearance:none;-webkit-appearance:none;-moz-appearance:none;background-image:url('data:image/svg+xml;utf8,<svg fill=\'%23333\' height=\'20\' viewBox=\'0 0 20 20\' width=\'20\' xmlns=\'http://www.w3.org/2000/svg\'><path d=\'M5 7l5 5 5-5z\'/></svg>');background-repeat:no-repeat;background-position:right 12px center;">
                          <option value="" hidden>Select Industry</option>
                          <option value="education">Education</option>
                          <option value="consulting">Consulting</option>
                          <option value="healthcare">Healthcare</option>
                          <option value="finance">Finance & Accounting</option>
                          <option value="software">IT & Software Development</option>
                          <option value="design">Design & Creative Studios</option>
                          <option value="legal">Legal Services</option>
                          <option value="manufacturing">Manufacturing</option>
                          <option value="media">Media & Publishing</option>
                          <option value="retail">Retail & E-commerce</option>
                          <option value="bpo">BPO Outsourcing</option>
                      </select>
                      <div class="invalid-feedback"></div>
                  </div>
                  <div class="form-grid">
                      <div class="form-item">
                          <label for="firstName">First Name</label>
                          <input type="text" id="firstName" name="firstName" placeholder="First name"
                              class="form-control" required />
                          <div class="invalid-feedback">First name is required.</div>
                      </div>
                      <div class="form-item">
                          <label for="lastName">Last Name</label>
                          <input type="text" id="lastName" name="lastName" placeholder="Last name"
                              class="form-control" required />
                          <div class="invalid-feedback">Last name is required.</div>
                      </div>
                  </div>
                  <div class="form-grid">
                      <div class="form-item">
                          <label for="phoneNumber">Contact Number</label>
                          <div class="phone-input">
                              <select id="countryCodes" name="countryCodes" required></select>
                              <div class="contact-divider"></div>
                              <input type="tel" id="phoneNumber" name="phoneNumber" placeholder="Enter Contact Number"
                                  class="form-control" required />
                              <div class="invalid-feedback">Valid contact number is required.</div>
                          </div>
                      </div>
                      <div class="form-item">
                          <label for="email" class="emailLabel">Email</label>
                          <div class="phone-input">
                              <input type="email" id="emailid" name="email" placeholder="Email" class="form-control"
                                  required />
                              <div class="invalid-feedback">Please enter a valid email address.</div>
                          </div>
                      </div>
                  </div>
                  <div class="form-grid">
                      <div class="form-item">
                          <label for="website">Website</label>
                          <input type="text" id="website" name="website" placeholder="Website URL"
                              class="form-control" required />
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
                          <div class="invalid-feedback"></div>
                      </div>
                      <div class="form-item">
                          <label for="city">City</label>
                          <input type="text" id="city" name="city" placeholder="City" class="form-control" required />
                          <div class="invalid-feedback">City is required.</div>
                      </div>
                  </div>
                  <div class="form-item services-form">
                      <label>Services</label>
                      <div class="accordion" id="accordion">
                          <div class="single-accordion card">
                              <div class="card-header" id="headingOne">
                                  <h2 class="mb-0">
                                      <button class="btn btn-link" type="button" data-toggle="collapse"
                                          data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                          Core Location & Mapping APIs
                                      </button>
                                  </h2>
                              </div>
                              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                  data-parent="#accordion">
                                  <div class="card-body-enquiry">
                                      <div class="checkbox-grid">
                                          <div class="form-check"><input
                                                  class="form-check-input big-checkbox select-all"
                                                  type="checkbox" /><span class="form-check-label">Select All</span>
                                          </div>
                                          <div class="form-check"><input class="form-check-input big-checkbox"
                                                  type="checkbox" name="services[]" value="Autocomplete" /><span
                                                  class="form-check-label">Autocomplete</span>
                                          </div>
                                          <div class="form-check"><input class="form-check-input big-checkbox"
                                                  type="checkbox" name="services[]" value="Geocoding" /><span
                                                  class="form-check-label">Geocoding</span></div>
                                          <div class="form-check"><input class="form-check-input big-checkbox"
                                                  type="checkbox" name="services[]" value="Reverse Geocoding" /><span
                                                  class="form-check-label">Reverse
                                                  Geocoding</span></div>
                                          <div class="form-check"><input class="form-check-input big-checkbox"
                                                  type="checkbox" name="services[]"
                                                  value="Places Nearby Search" /><span class="form-check-label">Places
                                                  Nearby
                                                  Search</span></div>
                                          <div class="form-check"><input class="form-check-input big-checkbox"
                                                  type="checkbox" name="services[]" value="Place Details" /><span
                                                  class="form-check-label">Place Details</span>
                                          </div>
                                          <div class="form-check"><input class="form-check-input big-checkbox"
                                                  type="checkbox" name="services[]" value="Text Search" /><span
                                                  class="form-check-label">Text Search</span>
                                          </div>
                                          <div class="form-check"><input class="form-check-input big-checkbox"
                                                  type="checkbox" name="services[]" value="Custom POI" /><span
                                                  class="form-check-label">Custom POI</span></div>
                                          <div class="form-check"><input class="form-check-input big-checkbox"
                                                  type="checkbox" name="services[]" value="Address Validation" /><span
                                                  class="form-check-label">Address
                                                  Validation</span></div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="single-accordion card">
                              <div class="card-header" id="headingTwo">
                                  <h2 class="mb-0">
                                      <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                          data-target="#collapseTwo" aria-expanded="false"
                                          aria-controls="collapseTwo">
                                          Navigation, Routing & Transport APIs
                                      </button>
                                  </h2>
                              </div>
                              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                  data-parent="#accordion">
                                  <div class="card-body-enquiry">
                                      <div class="checkbox-grid">
                                          <div class="form-check"><input
                                                  class="form-check-input big-checkbox select-all"
                                                  type="checkbox" /><span class="form-check-label">Select All</span>
                                          </div>
                                          <div class="form-check"><input class="form-check-input big-checkbox"
                                                  type="checkbox" name="services[]" value="Route Optimizer" /><span
                                                  class="form-check-label">Route
                                                  Optimizer</span></div>
                                          <div class="form-check"><input class="form-check-input big-checkbox"
                                                  type="checkbox" name="services[]"
                                                  value="Directions Navigation" /><span
                                                  class="form-check-label">Directions
                                                  Navigation</span></div>
                                          <div class="form-check"><input class="form-check-input big-checkbox"
                                                  type="checkbox" name="services[]" value="Snap-to-Road" /><span
                                                  class="form-check-label">Snap-to-Road</span>
                                          </div>
                                          <div class="form-check"><input class="form-check-input big-checkbox"
                                                  type="checkbox" name="services[]" value="Speed Limits" /><span
                                                  class="form-check-label">Speed Limits</span>
                                          </div>
                                          <div class="form-check"><input class="form-check-input big-checkbox"
                                                  type="checkbox" name="services[]" value="Elevation API" /><span
                                                  class="form-check-label">Elevation API</span>
                                          </div>
                                          <div class="form-check"><input class="form-check-input big-checkbox"
                                                  type="checkbox" name="services[]" value="Fleet Planner" /><span
                                                  class="form-check-label">Fleet Planner</span>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="single-accordion card">
                              <div class="card-header" id="headingThree">
                                  <h2 class="mb-0">
                                      <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                          data-target="#collapseThree" aria-expanded="false"
                                          aria-controls="collapseThree">
                                          Map Visualization, Geofencing & Analytics APIs
                                      </button>
                                  </h2>
                              </div>
                              <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                  data-parent="#accordion">
                                  <div class="card-body-enquiry">
                                      <div class="checkbox-grid">
                                          <div class="form-check"><input
                                                  class="form-check-input big-checkbox select-all"
                                                  type="checkbox" /><span class="form-check-label">Select All</span>
                                          </div>
                                          <div class="form-check"><input class="form-check-input big-checkbox"
                                                  type="checkbox" name="services[]" value="Geofencing CRUD" /><span
                                                  class="form-check-label">Geofencing
                                                  CRUD</span></div>
                                          <div class="form-check"><input class="form-check-input big-checkbox"
                                                  type="checkbox" name="services[]" value="Vector Tiles" /><span
                                                  class="form-check-label">Vector Tiles</span>
                                          </div>
                                          <div class="form-check"><input class="form-check-input big-checkbox"
                                                  type="checkbox" name="services[]" value="Street View" /><span
                                                  class="form-check-label">Street View</span>
                                          </div>
                                          <div class="form-check"><input class="form-check-input big-checkbox"
                                                  type="checkbox" name="services[]" value="Satellite View" /><span
                                                  class="form-check-label">Satellite
                                                  View</span></div>
                                          <div class="form-check"><input class="form-check-input big-checkbox"
                                                  type="checkbox" name="services[]" value="Maps Analytics" /><span
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
                      <textarea placeholder="Write a Message..." class="message" id="message" name="message"
                          rows="4"></textarea>
                  </div>
                  <div class="form-item">
                      <div class="g-recaptcha" data-sitekey="6LftJJ8qAAAAAOGdsVx3yOGqvRXTVc2VUQl8D-tW"></div>
                  </div>
                  <div class="form-item">
                      <button class="enquiry-btn" type="submit">Submit Request</button>
                  </div>
              </form>
          </div>
      </div>
  </div>

  