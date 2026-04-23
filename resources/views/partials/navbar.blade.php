<!-- navbar area start -->
<nav class="navbar navbar-area navbar-expand-lg nav-style-01">
    <div class="top-nav">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-9">
                    <a href="#" id="sales-enquiry-trigger">Sales Enquiry</a>
                    <span class="divider">|</span>
                    <a href="https://helpdesk.pocketoffice.sizaf.com/submit-ticket">Submit a
                        Ticket</a>
                    <span class="divider">|</span>
                    <a href="  {{ url('contact-us') }}
                                ">Contact us</a>
                </div>
                <div class="col-md-3 text-md-end">
                    <div class="nav-right">
                        <a href="  {{ url('pricing') }}" class="order-now-btn btn-radius btn-green s-animate-3">Order now</a>
                        <a href="https://pocketoffice.sizaf.com/" target="_blank"
                            class="order-now-btn btn-radius btn-green s-animate-3">Customer Login</a>
                        <a href="https://helpdesk.pocketoffice.sizaf.com/staff/login" target="_blank"
                            class="order-now-btn btn-radius btn-green s-animate-3">NOC Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container nav-container">
        <div class="responsive-mobile-menu">
            <div class="logo-wrapper mobile-logo">
                <a href="index.html" class="logo custom-width"></a>
            </div>
            <div class="nav-right-content default-blue">
                <ul>
                    <li class="search">
                        <i class="ti-search"></i>
                    </li>
                </ul>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#MapUI_main_menu"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggle-icon default-blue">
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                </span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="MapUI_main_menu">
            <div class="logo-wrapper desktop-logo">
                <a href="index.html" class="logo custom-width"></a>
            </div>
            <ul class="navbar-nav default-blue">

                <!-- Products Mega Menu -->
                <li class="mega-menu-item">
                    <a href="#" class="mega-menu-trigger">Products</a>
                    <div class="mega-menu-dropdown">
                        <div class="mega-menu-container products-mega-menu">
                            <div class="mega-menu-content">
                                <!-- Core Features Section -->
                                <div class="mega-menu-section">
                                    <h3 class="mega-section-heading">Core Features</h3>
                                    <ul class="mega-section-list">
                                        <li class="mega-section-item">
                                            <a href="{{ url('core-features') }}" class="mega-item-link">
                                                <strong class="mega-item-title">Cloud Desktop Environment</strong>
                                            </a>
                                        </li>
                                        <li class="mega-section-item">
                                            <a href="{{ url('core-features') }}?tab=file" class="mega-item-link">
                                                <strong class="mega-item-title">File Manager & Storage</strong>
                                            </a>
                                        </li>
                                        <li class="mega-section-item">
                                            <a href="{{ url('core-features') }}?tab=window" class="mega-item-link">
                                                <strong class="mega-item-title">Window-based Multitasking</strong>
                                            </a>
                                        </li>
                                        <li class="mega-section-item">
                                            <a href="{{ url('core-features') }}?tab=launcher" class="mega-item-link">
                                                <strong class="mega-item-title">App Launcher</strong>
                                            </a>
                                        </li>
                                        <li class="mega-section-item">
                                            <a href="{{ url('core-features') }}?tab=drag" class="mega-item-link">
                                                <strong class="mega-item-title">Drag & Drop UI</strong>
                                            </a>
                                        </li>
                                        <li class="mega-section-item">
                                            <a href="{{ url('core-features') }}?tab=keyboard" class="mega-item-link">
                                                <strong class="mega-item-title">Keyboard Shortcuts</strong>
                                            </a>
                                        </li>
                                        <li class="mega-section-item">
                                            <a href="{{ url('core-features') }}?tab=sync" class="mega-item-link">
                                                <strong class="mega-item-title">Multi-device Sync</strong>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <!-- Collaboration Section -->
                                <div class="mega-menu-section">
                                    <h3 class="mega-section-heading">Collaboration</h3>
                                    <ul class="mega-section-list">
                                        <li class="mega-section-item">
                                            <a href="{{ url('collaboration') }}?tab=realtime" class="mega-item-link">
                                                <strong class="mega-item-title whitespace-nowrap">Real-time File
                                                    Sharing</strong>
                                            </a>
                                        </li>
                                        <li class="mega-section-item">
                                            <a href="{{ url('collaboration') }}?tab=workspace" class="mega-item-link">
                                                <strong class="mega-item-title">Shared Workspaces</strong>
                                            </a>
                                        </li>
                                        <li class="mega-section-item">
                                            <a href="{{ url('collaboration') }}?tab=permissions" class="mega-item-link">
                                                <strong class="mega-item-title">Team Permissions</strong>
                                            </a>
                                        </li>
                                        <li class="mega-section-item">
                                            <a href="{{ url('collaboration') }}?tab=activity" class="mega-item-link">
                                                <strong class="mega-item-title">Activity Tracking</strong>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <!-- Security Section -->
                                <div class="mega-menu-section">
                                    <h3 class="mega-section-heading">Security</h3>
                                    <ul class="mega-section-list">
                                        <li class="mega-section-item">
                                            <a href="{{ url('security') }}?tab=realtime" class="mega-item-link">
                                                <strong class="mega-item-title">Role-based Access</strong>
                                            </a>
                                        </li>
                                        <li class="mega-section-item">
                                            <a href="{{ url('security') }}?tab=workspace" class="mega-item-link">
                                                <strong class="mega-item-title">Backup & Recovery</strong>
                                            </a>
                                        </li>
                                        <li class="mega-section-item">
                                            <a href="{{ url('security') }}?tab=permissions" class="mega-item-link">
                                                <strong class="mega-item-title">Data Privacy Compliance</strong>
                                            </a>
                                        </li>
                                    </ul>
                                </div>


                            </div>
                        </div>
                    </div>
                </li>
                <li class="mega-menu-item">
                    <a href="#" class="mega-menu-trigger">Solutions</a>
                    <div class="mega-menu-dropdown">
                        <div class="mega-menu-container solutions-mega-menu">
                            <div class="mega-menu-content">
                                <!-- Core Features Section -->
                                <div class="mega-menu-section">
                                    <h3 class="mega-section-heading">By Team Type</h3>
                                    <ul class="mega-section-list">
                                        <li class="mega-section-item">
                                            <a href="{{ url('team-type') }}?tab=remote" class="mega-item-link">
                                                <strong class="mega-item-title">Remote Teams</strong>
                                            </a>
                                        </li>
                                        <li class="mega-section-item">
                                            <a href="{{ url('team-type') }}?tab=startups" class="mega-item-link">
                                                <strong class="mega-item-title">Startups</strong>
                                            </a>
                                        </li>
                                        <li class="mega-section-item">
                                            <a href="{{ url('team-type') }}?tab=enterprises" class="mega-item-link">
                                                <strong class="mega-item-title">Enterprises</strong>
                                            </a>
                                        </li>
                                        <li class="mega-section-item">
                                            <a href="{{ url('team-type') }}?tab=freelancers" class="mega-item-link">
                                                <strong class="mega-item-title">Freelancers</strong>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Security Section -->
                                <div class="mega-menu-section">
                                    <h3 class="mega-section-heading">By Use Case</h3>
                                    <ul class="mega-section-list">
                                        <li class="mega-section-item">
                                            <a href="{{ url('use-case') }}?tab=file-sharing" class="mega-item-link">
                                                <strong class="mega-item-title">File Sharing</strong>
                                            </a>
                                        </li>
                                        <li class="mega-section-item">
                                            <a href="{{ url('use-case') }}?tab=virtual-desktop" class="mega-item-link">
                                                <strong class="mega-item-title">Virtual Desktop</strong>
                                            </a>
                                        </li>
                                        <li class="mega-section-item">
                                            <a href="{{ url('use-case') }}?tab=team-workspaces" class="mega-item-link">
                                                <strong class="mega-item-title">Team Workspaces</strong>
                                            </a>
                                        </li>
                                        <li class="mega-section-item">
                                            <a href="{{ url('use-case') }}?tab=cloud-storage" class="mega-item-link">
                                                <strong class="mega-item-title">Cloud Storage</strong>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="mega-menu-section ">
                                    <h3 class="mega-section-heading">Integration</h3>
                                    <div class="integration-menu">
                                        <ul class="mega-section-list">
                                            <li class="mega-section-item">
                                                <a href="{{ url('integrations') }}?tab=alibaba" class="mega-item-link">
                                                    <strong class="mega-item-title">Alibaba OSS</strong>
                                                </a>
                                            </li>


                                            <li class="mega-section-item">
                                                <a href="{{ url('integrations') }}?tab=tencent-ios" class="mega-item-link">
                                                    <strong class="mega-item-title">Tencent COS</strong>
                                                </a>
                                            </li>

                                            <li class="mega-section-item">
                                                <a href="{{ url('integrations') }}?tab=qiniucloud" class="mega-item-link">
                                                    <strong class="mega-item-title">Qiniu Cloud</strong>
                                                </a>
                                            </li>
                                            <li class="mega-section-item">
                                                <a href="{{ url('integrations') }}?tab=amazon-s3" class="mega-item-link">
                                                    <strong class="mega-item-title">Amazon S3</strong>
                                                </a>
                                            </li>

                                            <li class="mega-section-item">
                                                <a href="{{ url('integrations') }}?tab=tianyi-cloud" class="mega-item-link">
                                                    <strong class="mega-item-title">Tianyi Cloud</strong>
                                                </a>
                                            </li>

                                            <li class="mega-section-item">
                                                <a href="{{ url('integrations') }}?tab=sds" class="mega-item-link">
                                                    <strong class="mega-item-title">XSKY SDS</strong>
                                                </a>
                                            </li>
                                        </ul>
                                        <ul class="mega-section-list">
                                            <li class="mega-section-item">
                                                <a href="{{ url('integrations') }}?tab=sangfor-eds" class="mega-item-link">
                                                    <strong class="mega-item-title">Sangfor EDS</strong>
                                                </a>
                                            </li>

                                            <li class="mega-section-item">
                                                <a href="{{ url('integrations') }}?tab=min-io" class="mega-item-link">
                                                    <strong class="mega-item-title">MinIO</strong>
                                                </a>
                                            </li>

                                            <li class="mega-section-item">
                                                <a href="{{ url('integrations') }}?tab=ftp" class="mega-item-link">
                                                    <strong class="mega-item-title">FTP</strong>
                                                </a>
                                            </li>

                                            <li class="mega-section-item">
                                                <a href="{{ url('integrations') }}?tab=web-dav" class="mega-item-link">
                                                    <strong class="mega-item-title">WebDAV</strong>
                                                </a>
                                            </li>



                                            <li class="mega-section-item">
                                                <a href="{{ url('integrations') }}?tab=one-drive" class="mega-item-link">
                                                    <strong class="mega-item-title">OneDrive</strong>
                                                </a>
                                            </li>

                                            <li class="mega-section-item">
                                                <a href="{{ url('integrations') }}?tab=google-drive" class="mega-item-link">
                                                    <strong class="mega-item-title">Google Drive</strong>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="mega-menu-item">
                    <a href="#" class="mega-menu-trigger">Industries</a>
                    <div class="mega-menu-dropdown">
                        <div class="mega-menu-container">
                            <div class="mega-menu-content">
                                <!-- Core Features Section -->
                                <div class="mega-menu-section">
                                    <h3 class="mega-section-heading">Industries</h3>
                                    <div class="industry-menu">
                                        <ul class="mega-section-list ">
                                            <li class="mega-section-item">
                                                <a href="{{ url('bpo') }}" class="mega-item-link">
                                                    <strong class="mega-item-title">BPO Outsourcing</strong>
                                                </a>
                                            </li>

                                            <li class="mega-section-item">
                                                <a href="{{ url('consulting') }}" class="mega-item-link">
                                                    <strong class="mega-item-title">Consulting</strong>
                                                </a>
                                            </li>

                                            <li class="mega-section-item">
                                                <a href="{{ url('design') }}" class="mega-item-link">
                                                    <strong class="mega-item-title">Design & Media
                                                        Studios</strong>
                                                </a>
                                            </li>

                                            <li class="mega-section-item">
                                                <a href="{{ url('education') }}" class="mega-item-link">
                                                    <strong class="mega-item-title">Education</strong>
                                                </a>
                                            </li>

                                            <li class="mega-section-item">
                                                <a href="{{ url('finance-accounting') }}" class="mega-item-link">
                                                    <strong class="mega-item-title">Finance & Accounting</strong>
                                                </a>
                                            </li>

                                            <li class="mega-section-item">
                                                <a href="{{ url('healthcare') }}" class="mega-item-link">
                                                    <strong class="mega-item-title">Healthcare</strong>
                                                </a>
                                            </li>

                                        </ul>
                                        <ul class="mega-section-list industry-list">

                                            <li class="mega-section-item">
                                                <a href=" {{ url('it-software') }}" class="mega-item-link">
                                                    <strong class="mega-item-title">IT & Software
                                                        Development</strong>
                                                </a>
                                            </li>

                                            <li class="mega-section-item">
                                                <a href="{{ url('legal-services') }}" class="mega-item-link">
                                                    <strong class="mega-item-title">Legal Services</strong>
                                                </a>
                                            </li>

                                            <li class="mega-section-item">
                                                <a href="{{ url('manufacturing') }}" class="mega-item-link">
                                                    <strong class="mega-item-title">Manufacturing</strong>
                                                </a>
                                            </li>


                                            <li class="mega-section-item">
                                                <a href="  {{ url('media-publishing') }}
                                                    " class="mega-item-link">
                                                    <strong class="mega-item-title">Media & Publishing</strong>
                                                </a>
                                            </li>
                                            <li class="mega-section-item">
                                                <a href="  {{ url('retail-ecommerce') }}
                                                        " class="mega-item-link">
                                                    <strong class="mega-item-title">Retail & E-commerce</strong>
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="{{ route('market-place.main') }}">Pricing</a>

                </li>
                <li class="mega-menu-item">
                    <a href="#" class="mega-menu-trigger">Resources</a>
                    <div class="mega-menu-dropdown">
                        <div class="mega-menu-container">
                            <div class="mega-menu-content">
                                <div class="mega-menu-section">
                                    <h3 class="mega-section-heading">Resources</h3>
                                    <ul class="mega-section-list">
                                        <li class="mega-section-item">
                                            <a href="  {{ url('documentation') }}
                                                    " class="mega-item-link">
                                                <strong class="mega-item-title">Documentation</strong>
                                            </a>
                                        </li>
                                        <li class="mega-section-item">
                                            <a href="  {{ url('faq') }}
                                                        " class="mega-item-link">
                                                <strong class="mega-item-title">FAQs</strong>
                                            </a>
                                        </li>
                                        <li class="mega-section-item">
                                            <a href="  {{ url('blog') }}
                                                " class="mega-item-link">
                                                <strong class="mega-item-title whitespace-nowrap">
                                                    Updates</strong>
                                            </a>
                                        </li>
                                        <li class="mega-section-item">
                                            <a href="  {{ url('news') }}
                                                " class="mega-item-link">
                                                <strong class="mega-item-title whitespace-nowrap">Latest
                                                    News</strong>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="mega-menu-section">
                                    <h3 class="mega-section-heading">Company</h3>
                                    <ul class="mega-section-list">
                                        <li class="mega-section-item">
                                            <a href="{{ url('about') }}" class="mega-item-link">
                                                <strong class="mega-item-title">About Us</strong>
                                            </a>
                                        </li>
                                        <li class="mega-section-item">
                                            <a href="{{ url('careers') }}" class="mega-item-link">
                                                <strong class="mega-item-title">Careers</strong>
                                            </a>
                                        </li>
                                        <li class="mega-section-item">
                                            <a href="{{ url('contact-us') }}" class="mega-item-link">
                                                <strong class="mega-item-title">Contact</strong>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="mega-menu-section">
                                    <h3 class="mega-section-heading">Legal</h3>
                                    <ul class="mega-section-list">
                                        <li class="mega-section-item">
                                            <a href=" {{ url('terms-condition') }}" class="mega-item-link">
                                                <strong class="mega-item-title whitespace-nowrap">Terms &
                                                    Conditions</strong>
                                            </a>
                                        </li>
                                        <li class="mega-section-item">
                                            <a href="  {{ url('privacy') }}
                                                        " class="mega-item-link">
                                                <strong class="mega-item-title">Privacy Policy</strong>
                                            </a>
                                        </li>
                                        <li class="mega-section-item">
                                            <a href="  {{ url('disclaimer') }}
                                                " class="mega-item-link">
                                                <strong class="mega-item-title">Disclaimer</strong>
                                            </a>
                                        </li>
                                    </ul>
                                </div>






                            </div>
                        </div>
                    </div>
                </li>
                <li class="menu-item-has-children d-lg-none">
                    <a href="#">More</a>
                    <ul class="sub-menu">
                        <li><a href="sales-enquiry.html">Sales Enquiry</a></li>
                        <li> <a href="submit-ticket.html" target="_blank">Submit
                                a Ticket</a></li>
                        <li><a href="contact-us.html">Contact Us</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="nav-right-content default-blue">
            <ul>
                <li class="search">
                    <i class="ti-search" id="search-btn"></i>
                </li>
            </ul>
        </div>
    </div>
    <div id="sales-enquiry-overlay" style="display:none;">
        <div id="sales-enquiry-modal">
            <button id="sales-enquiry-close" aria-label="Close">&times;</button>

            <!-- Paste your existing modal content here -->
            <div class="contact-modal">
                <h2 class="modal-title">Tell us how we can help</h2>
                <form id="serviceForm"
                    method="POST"
                    action="{{ route('sales.enquiry.submit') }}"
                    class="form needs-validation salesEnquiryForm">

                    @csrf
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
                                <select id="countryCodes" name="countryCodes" class="form-control" required>

                                    <option value="">Code</option>

                                    @foreach($countries as $country)

                                    <option value="{{ $country->phonecode }}">
                                        {{ $country->phonecode }}
                                    </option>

                                    @endforeach

                                </select>
                                <div class="contact-divider"></div>
                                <input type="tel" id="phoneNumber" name="phoneNumber" placeholder="Enter Contact Number"
                                    class="form-control" required />
                                <div class="invalid-feedback">Valid contact number is required.</div>
                            </div>
                        </div>
                        <div class="form-item">
                            <label for="email" class="emailLabel">Email</label>
                            <div class="phone-input">
                                <input type="email" id="email" name="email" placeholder="Email" class="form-control"
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

                            <select id="country" name="country" class="form-control" required>

                                <option value="">Select Country</option>

                                @foreach($countries as $country)

                                <option value="{{ $country->name }}">
                                    {{ $country->name }}
                                </option>

                                @endforeach

                            </select>

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
</nav>
<!-- navbar area end -->