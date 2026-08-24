<!-- navbar area start -->
<nav class="navbar navbar-area navbar-expand-lg nav-style-01">
    <div class="top-nav">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-9">
                    <a href="#" id="sales-enquiry-trigger">Sales Enquiry</a>
                    <span class="divider">|</span>
                    <!-- <a href="https://helpdesk.pocket-office.ai/submit-ticket">Submit a
                        Ticket</a> -->
                    <a href="https://helpdesk.pocket-office.ai/submit-ticket">Submit a
                        Ticket</a>
                    <span class="divider">|</span>
                    <a href="{{ url('contact-us') }}">Contact us</a>
                </div>
                <div class="col-md-3 text-md-end">
                    <div class="nav-right">
                        <a href="{{ route('marketplace.pricing') }}" class="order-now-btn btn-radius btn-green s-animate-3"><i class="fa-solid fa-cart-shopping"></i> Order</a>
                        <a href="https://customerlogin.pocket-office.ai/" target="_blank" rel="noopener noreferrer"
                            class="order-now-btn btn-radius btn-green s-animate-3"><i class="fa-solid fa-user"></i> Customer Login</a>
                            {{-- <a href="https://customerlogin.pocket-office.ai/login" target="_blank" rel="noopener noreferrer"
                            class="order-now-btn btn-radius btn-green s-animate-3"><i class="fa-solid fa-user"></i> Customer Login</a> --}}
                        <a href="https://helpdesk.pocket-office.ai/staff/login" target="_blank" rel="noopener noreferrer"
                            class="order-now-btn btn-radius btn-green s-animate-3"><i class="fa-solid fa-headset"></i> Support Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container nav-container">
        <div class="responsive-mobile-menu">
            <div class="logo-wrapper mobile-logo">
                <a href="{{ url('index') }}" class="logo custom-width"></a>
            </div>
            <div class="nav-right-content default-blue">
                <ul>
                    <li class="order-icon">
                        <a href="{{ url('pricing') }}">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </a>
                    </li>
                    <!-- <li class="search">
                        <i class="ti-search"></i>
                    </li> -->
                </ul>
            </div>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#MapUI_main_menu"
                aria-controls="MapUI_main_menu"
                aria-expanded="false">
                <span class="navbar-toggle-icon default-blue">
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                </span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="MapUI_main_menu">
            <div class="logo-wrapper desktop-logo">
                <a href="{{ url('/') }}" class="logo custom-width"></a>
            </div>
            <ul class="navbar-nav default-blue">
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
                                            <a href="{{ url('core-features') }}?tab=cloud" class="mega-item-link">
                                                <strong class="mega-item-title">Cloud Desktop</strong>
                                            </a>
                                        </li>
                                        <li class="mega-section-item">
                                            <a href="{{ url('core-features') }}?tab=file" class="mega-item-link">
                                                <strong class="mega-item-title">Files & Storage</strong>
                                            </a>
                                        </li>
                                        <li class="mega-section-item">
                                            <a href="{{ url('core-features') }}?tab=window" class="mega-item-link">
                                                <strong class="mega-item-title">Multiple-Window Support </strong>
                                            </a>
                                        </li>
                                        <li class="mega-section-item">
                                            <a href="{{ url('core-features') }}?tab=launcher" class="mega-item-link">
                                                <strong class="mega-item-title">My Apps</strong>
                                            </a>
                                        </li>
                                        <li class="mega-section-item">
                                            <a href="{{ url('core-features') }}?tab=drag" class="mega-item-link">
                                                <strong class="mega-item-title">One-Click Drag & Drop</strong>
                                            </a>
                                        </li>
                                        <li class="mega-section-item">
                                            <a href="{{ url('core-features') }}?tab=keyboard" class="mega-item-link">
                                                <strong class="mega-item-title">Keyboard Shortcuts</strong>
                                            </a>
                                        </li>
                                        <li class="mega-section-item">
                                            <a href="{{ url('core-features') }}?tab=sync" class="mega-item-link">
                                                <strong class="mega-item-title">Sync Across Devices</strong>
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
                                                <strong class="mega-item-title">Secure Data Protection</strong>
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
                                                <a href="{{ url('integrations') }}?tab=google-drive" class="mega-item-link">
                                                    <strong class="mega-item-title">Google Drive</strong>
                                                </a>
                                            </li>
                                            
                                           <li class="mega-section-item">
                                                <a href="{{ url('integrations') }}?tab=amazon-s3" class="mega-item-link">
                                                    <strong class="mega-item-title">Amazon S3</strong>
                                                </a>
                                            </li>
                
                                            
                                            <li class="mega-section-item">
                                                <a href="{{ url('integrations') }}?tab=min-io" class="mega-item-link">
                                                    <strong class="mega-item-title">MinIO</strong>
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
                                                <a href="{{ url('integrations') }}?tab=tianyi-cloud" class="mega-item-link">
                                                    <strong class="mega-item-title">Tianyi Cloud</strong>
                                                </a>
                                            </li>

                                        </ul>
                                        <ul class="mega-section-list">
                                            <li class="mega-section-item">
                                                <a href="{{ url('integrations') }}?tab=one-drive" class="mega-item-link">
                                                    <strong class="mega-item-title">OneDrive</strong>
                                                </a>
                                            </li>
                                             <li class="mega-section-item">
                                                <a href="{{ url('integrations') }}?tab=alibaba" class="mega-item-link">
                                                    <strong class="mega-item-title">Alibaba OSS</strong>
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
                                                <a href="{{ url('integrations') }}?tab=sangfor-eds" class="mega-item-link">
                                                    <strong class="mega-item-title">Sangfor EDS</strong>
                                                </a>
                                            </li>
                                            
                                            <li class="mega-section-item">
                                                <a href="{{ url('integrations') }}?tab=sds" class="mega-item-link">
                                                    <strong class="mega-item-title">XSKY SDS</strong>
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
                                                <a href="{{ url('business-process-outsourcing') }}" class="mega-item-link">
                                                    <strong class="mega-item-title">BPO Outsourcing</strong>
                                                </a>
                                            </li>

                                            <li class="mega-section-item">
                                                <a href="{{ url('ai-business-consulting') }}" class="mega-item-link">
                                                    <strong class="mega-item-title">Consulting</strong>
                                                </a>
                                            </li>

                                            <li class="mega-section-item">
                                                <a href="{{ url('web-design-services') }}" class="mega-item-link">
                                                    <strong class="mega-item-title">Design & Media
                                                        Studios</strong>
                                                </a>
                                            </li>

                                            <li class="mega-section-item">
                                                <a href="{{ url('ai-in-education') }}" class="mega-item-link">
                                                    <strong class="mega-item-title">Education</strong>
                                                </a>
                                            </li>

                                            <li class="mega-section-item">
                                                <a href="{{ url('accounting-software') }}" class="mega-item-link">
                                                    <strong class="mega-item-title">Finance & Accounting</strong>
                                                </a>
                                            </li>

                                            <li class="mega-section-item">
                                                <a href="{{ url('ai-in-healthcare') }}" class="mega-item-link">
                                                    <strong class="mega-item-title">Healthcare</strong>
                                                </a>
                                            </li>

                                        </ul>
                                        <ul class="mega-section-list industry-list">

                                            <li class="mega-section-item">
                                                <a href="{{ url('it-software-solutions') }}" class="mega-item-link">
                                                    <strong class="mega-item-title">IT & Software
                                                        Development</strong>
                                                </a>
                                            </li>

                                            <li class="mega-section-item">
                                                <a href="{{ url('legal-case-management-software') }}" class="mega-item-link">
                                                    <strong class="mega-item-title">Legal Services</strong>
                                                </a>
                                            </li>

                                            <li class="mega-section-item">
                                                <a href="{{ url('manufacturing-management-software') }}" class="mega-item-link">
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
                                                <a href="  {{ url('retail-management-software') }}
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
                    <a href="{{ route('marketplace.pricing') }}">Pricing</a>

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
                        <li><a id="sales-enquiry-trigger">Sales Enquiry</a></li>
                        <li> <a href="https://helpdesk.pocket-office.ai/submit-ticket" target="_blank" rel="noopener noreferrer">Submit
                                a Ticket</a></li>
                        <li><a href="{{ url('contact-us') }}">Contact Us</a></li>
                    </ul>
                </li>
                <div class="col-md-2 text-md-end pb-2">
                    <div class="mobile-buttons">
                        <a
                            href="https://customerlogin.pocket-office.ai/login"
                            class="order-now-btn btn-radius btn-green s-animate-3"><i class="fa-solid fa-user"></i> Customer Login</a>
                        <a
                            href="https://helpdesk.pocket-office.ai/staff/login"
                            target="_blank" rel="noopener noreferrer"
                            class="order-now-btn btn-radius btn-green s-animate-3"><i class="fa-solid fa-headset"></i> Support Login</a>
                    </div>
                </div>
            </ul>
        </div>
        <!-- <div class="nav-right-content default-blue">
            <ul>
                <li class="search">
                    <i class="ti-search" id="search-btn"></i>
                </li>
            </ul>
        </div> -->
    </div>   
</nav>
<!-- navbar area end -->