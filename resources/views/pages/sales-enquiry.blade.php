<div>
    <div id="sales-enquiry-modal">
        <!-- Header Section -->
        <div class="modal-header-section">
            <div class="modal-header-content">
                <h2 class="modal-main-title">Let's talk about your business</h2>
                <p class="modal-sub-title">Our sales team will respond within one business day.</p>
            </div>
            <button id="sales-enquiry-close" aria-label="Close">&times;</button>
        </div>

        <!-- Stepper Tabs -->
        <div class="enquiry-steps-indicator">
            <div class="step-indicator active" data-step="1">
                <div class="step-number">1</div>
                <div class="step-label">COMPANY</div>
            </div>
            <div class="step-indicator" data-step="2">
                <div class="step-number">2</div>
                <div class="step-label">CONTACT</div>
            </div>
            <div class="step-indicator" data-step="3">
                <div class="step-number">3</div>
                <div class="step-label">MESSAGE</div>
            </div>
        </div>

        <div class="contact-modal">
            <form id="serviceForm" class="form needs-validation salesEnquiryForm" novalidate>
                
                <!-- Scrollable step contents -->
                <div class="steps-body-wrapper">
                    <!-- STEP 1: Company Details -->
                    <div class="enquiry-step step-1 active" data-step="1">
                        <div class="step-section-heading">
                            <span>COMPANY INFORMATION</span>
                            <div class="heading-line"></div>
                        </div>

                        <div class="form-item">
                            <label for="companyName">Company Name <span class="required-asterisk">*</span></label>
                            <input type="text" id="companyName" name="companyName" placeholder="e.g. Acme Corporation"
                                class="form-control" required />
                            <div class="invalid-feedback">Company name is required.</div>
                        </div>

                        <div class="form-item mt-3">
                            <label for="industry">Industry <span class="required-asterisk">*</span></label>
                            <div class="enquiry-form-group" style="margin: 0;">
                                <select id="industry" name="industry" required class="form-control"
                                    style="padding:12px 40px 12px 16px;appearance:none;-webkit-appearance:none;-moz-appearance:none;background-image:url('data:image/svg+xml;utf8,<svg fill=\'%23333\' height=\'20\' viewBox=\'0 0 20 20\' width=\'20\' xmlns=\'http://www.w3.org/2000/svg\'><path d=\'M5 7l5 5 5-5z\'/></svg>');background-repeat:no-repeat;background-position:right 12px center;">
                                    <option value="" hidden>Select your industry</option>
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
                                <div class="invalid-feedback">Please select your industry.</div>
                            </div>
                        </div>

                        <div class="form-grid mt-3">
                            <div class="form-item">
                                <label for="website">Website URL</label>
                                <input type="text" id="website" name="website" placeholder="https://yourcompany.com"
                                    class="form-control" />
                                <div class="invalid-feedback">Please enter a valid website URL.</div>
                            </div>
                            <div class="form-item">
                                <label for="companyAddress">Company Address <span class="required-asterisk">*</span></label>
                                <input type="text" id="companyAddress" name="companyAddress" placeholder="123 Business Ave"
                                    class="form-control" required />
                                <div class="invalid-feedback">Company address is required.</div>
                            </div>
                        </div>

                        <div class="form-grid mt-3">
                            <div class="form-item">
                                <label for="country">Country <span class="required-asterisk">*</span></label>
                                <select id="country" name="country" required class="form-control" style="padding: 12px 40px 12px 16px; border-radius: .25rem; height: 48px; appearance:none;-webkit-appearance:none;-moz-appearance:none;background-image:url('data:image/svg+xml;utf8,<svg fill=\'%23333\' height=\'20\' viewBox=\'0 0 20 20\' width=\'20\' xmlns=\'http://www.w3.org/2000/svg\'><path d=\'M5 7l5 5 5-5z\'/></svg>');background-repeat:no-repeat;background-position:right 12px center;">
                                    <option value="">Select a country</option>
                                </select>
                                <div class="invalid-feedback">Please select a country.</div>
                            </div>
                            <div class="form-item">
                                <label for="city">City <span class="required-asterisk">*</span></label>
                                <input type="text" id="city" name="city" placeholder="New York" class="form-control" required />
                                <div class="invalid-feedback">City is required.</div>
                            </div>
                        </div>
                    </div>

                    <!-- STEP 2: Contact Person -->
                    <div class="enquiry-step step-2" data-step="2" style="display: none;">
                        <div class="step-section-heading">
                            <span>CONTACT PERSON DETAILS</span>
                            <div class="heading-line"></div>
                        </div>

                        <div class="form-grid">
                            <div class="form-item">
                                <label for="firstName">First Name <span class="required-asterisk">*</span></label>
                                <input type="text" id="firstName" name="firstName" placeholder="e.g. John"
                                    class="form-control" required />
                                <div class="invalid-feedback">First name is required.</div>
                            </div>
                            <div class="form-item">
                                <label for="lastName">Last Name <span class="required-asterisk">*</span></label>
                                <input type="text" id="lastName" name="lastName" placeholder="e.g. Doe"
                                    class="form-control" required />
                                <div class="invalid-feedback">Last name is required.</div>
                            </div>
                        </div>

                        <div class="form-item">
                            <label for="phoneNumber">Contact Number <span class="required-asterisk">*</span></label>
                            <div class="phone-input">
                                <select id="countryCodes" name="countryCodes" required class="form-control"></select>
                                <div class="contact-divider"></div>
                                <input type="tel" id="phoneNumber" name="phoneNumber" placeholder="Enter Contact Number"
                                    class="form-control" required />
                            </div>
                            <div class="invalid-feedback">Valid contact number is required.</div>
                        </div>
                        <div class="form-item">
                            <label for="email" class="emailLabel">Email <span class="required-asterisk">*</span></label>
                            <input type="email" id="emailid" name="email" placeholder="john.doe@company.com" class="form-control"
                                required />
                            <div class="invalid-feedback">Please enter a valid email address.</div>
                        </div>
                    </div>

                    <!-- STEP 3: Services & Message -->
                    <div class="enquiry-step step-3" data-step="3" style="display: none;">
                        <div class="step-section-heading">
                            <span>YOUR REQUIREMENTS</span>
                            <div class="heading-line"></div>
                        </div>

                        <div class="requirements-info-banner">
                            <i class="fa-solid fa-circle-info"></i>
                            <div class="banner-text">The more detail you share, the better we can tailor our proposal.</div>
                        </div>

                        <div class="form-item">
                            <label for="message">Your Message <span class="required-asterisk">*</span></label>
                            <textarea placeholder="Tell us about your team size, current tools, goals, or any specific feature you need in pOffice..." class="form-control" id="message" name="message"
                                rows="6" required></textarea>
                            <div class="invalid-feedback">Message is required.</div>
                        </div>

                        <div class="form-item my-3">
                            <div class="g-recaptcha" data-sitekey="6LftJJ8qAAAAAOGdsVx3yOGqvRXTVc2VUQl8D-tW"></div>
                        </div>
                    </div>
                </div>

                <!-- Footer Section -->
                <div class="modal-footer-section">
                    <div class="step-indicator-text">
                        Step <span class="active-step-num">1</span> of 3
                    </div>
                    <div class="footer-buttons">
                        <button type="button" class="prev-step-btn btn"><i class="fa fa-arrow-left mr-2"></i> Back</button>
                        <button type="button" class="next-step-btn btn btn-primary">Continue &rarr;</button>
                        <button type="submit" class="submit-step-btn btn btn-primary enquiry-btn" style="display: none;">Submit Request</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>