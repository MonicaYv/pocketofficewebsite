@extends('layouts.frontendsettings')
@section('title', 'Login')
@section('content')
@vite([
'resources/css/slick.css',
])

<link rel="icon" type="image/svg+xml" href="{{ asset($constants['IMAGEFILEPATH'] . 'logo/fav-icon.svg') }}">
<!-- favicon -->
<link rel=icon href="{{ asset($constants['IMAGEFILEPATH'] . 'favicon.png') }}" sizes="20x20" type="image/png">
<style>
    .form-container {
        padding: 25px;
        max-width: 1200px;
        margin: auto;
    }


    h2 {
        font-weight: 700;
        font-size: 24px;
        margin-bottom: 15px;
        margin-top: 25px;
    }

    .form-group {
        display: flex;
        gap: 20px;
        margin-bottom: 15px;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 10px;
        border: 1px solid #C3C6D4;
        border-radius: 5px;
        font-size: 14px;
    }

    label {
        font-weight: 400;
        font-size: 16px;
        margin-bottom: 5px;
        display: block;
        color: #323338;
    }

    .form-col {
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .checkbox-group {
        margin-top: 15px;
    }

    .checkbox-group input {
        margin-right: 8px;
    }

    button {
        margin-top: 20px;
        padding: 12px 25px;
        border: none;
        background: #007BFF;
        color: white;
        font-size: 15px;
        border-radius: 6px;
        cursor: pointer;
    }

    button:hover {
        background: #0056b3;
    }

    .custom-dropdown {
        position: relative;
        width: 100%;
    }

    .custom-dropdown-toggle {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
        cursor: pointer;
        background: #fff;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .custom-dropdown-toggle i {
        transition: transform 0.2s;
    }

    .custom-dropdown.active .custom-dropdown-toggle i {
        transform: rotate(180deg);
    }


    .custom-dropdown-menu {
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        border: 1px solid #ccc;
        border-radius: 6px;
        background: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        max-height: 180px;
        overflow-y: auto;
        display: none;
        z-index: 10;
        scrollbar-width: none;
        -ms-overflow-style: none;
    }

    .custom-dropdown-menu div {
        padding: 10px;
        cursor: pointer;
    }

    .custom-dropdown-menu div:hover {
        background: #f3f3f3;
    }

    .custom-dropdown.active .custom-dropdown-menu {
        display: block;
    }

    .submit-btn {
        display: flex;
        justify-content: end;
    }
</style>

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

<!-- //. sign in Popup -->
<div class="signIn-popup login-register-popup">
    <div class="login-register-popup-wrap">
        <div class="row no-gutters">
            <div class="col-md-6">
                <div class="thumb">
                    <img src="{{ asset($constants['IMAGEFILEPATH'] . 'others/admin-login.png') }}" alt="img" />
                </div>
            </div>
            <div class="col-md-6 desktop-center-item">
                <form class="MapUI-form-wrap signIn-form">
                    <h4 class="widget-title">Sign In</h4>
                    <div class="single-input-wrap">
                        <input type="text" class="single-input" name="email" />
                        <label class="">E-mail</label>
                    </div>
                    <div class="single-input-wrap">
                        <input type="password" class="single-input" name="password" />
                        <label class="">Password</label>
                    </div>
                    <div class="remember-text">
                        <div class="checkbox-area-popup">
                            <input id="1checkbox" type="checkbox" class="float-left checkbox" />
                            <span>Remember me</span>
                        </div>

                        <span class="float-right forgot-password-text">Forgot your password?</span>
                    </div>
                    <div class="btn-wrap">
                        <button type="submit" class="btn btn-green">Sign In</button>
                        <div class="dont-have-account-text">
                            <span>You don't have account?</span>
                            <a class="signup" href="registration.html">Sign Up</a>
                        </div>

                    </div>
                </form>

                <!--Forgot Password Form-->
                <form class="MapUI-form-wrap forgot-form" style="display:none;">
                    <div class="popup-widget-title">
                        <span class="forgot-heading">Forgot Password</span>
                        <span class="forgot-text">Please Enter Your Email Address To Receive a Link</span>
                    </div>

                    <div class="single-input-wrap">
                        <input type="email" class="single-input" />
                        <label>Enter your email address</label>
                    </div>
                    <div class="btn-wrap">
                        <a class="btn btn-green" href="#">Send Email</a>
                        <div class="back-to-login">
                            <i class="fa-solid fa-chevron-left"></i>
                            <span class="back-to-login-text">Back to Login</span>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- //. sign in Popup End -->
<!-- //. client in Popup -->
<div class="client-popup login-register-popup">
    <div class="login-register-popup-wrap">
        <div class="row no-gutters">
            <div class="col-md-6">
                <div class="thumb">
                    <img src="{{ asset($constants['IMAGEFILEPATH'] . 'client-login.png') }}" alt="img" />
                </div>
            </div>
            <div class="col-md-6 desktop-center-item">
                <form class="MapUI-form-wrap signIn-form">
                    <h4 class="widget-title">Sign In</h4>
                    <div class="single-input-wrap">
                        <input type="text" class="single-input" name="email" />
                        <label class="">E-mail</label>
                    </div>
                    <div class="single-input-wrap">
                        <input type="password" class="single-input" name="password" />
                        <label class="">Password</label>
                    </div>
                    <div class="remember-text">
                        <div class="checkbox-area-popup">
                            <input id="1checkbox" type="checkbox" class="float-left checkbox" />
                            <span>Remember me</span>
                        </div>

                        <span class="float-right forgot-password-text">Forgot your password?</span>
                    </div>
                    <div class="btn-wrap">
                        <button type="submit" class="btn btn-green">Sign In</button>
                        <div class="dont-have-account-text">
                            <span>You don't have account?</span>
                            <a class="signup" href="registration.html">Sign Up</a>
                        </div>

                    </div>
                </form>

                <!--Forgot Password Form-->
                <form class="MapUI-form-wrap forgot-form" style="display:none;">
                    <div class="popup-widget-title">
                        <span class="forgot-heading">Forgot Password</span>
                        <span class="forgot-text">Please Enter Your Email Address To Receive a Link</span>
                    </div>

                    <div class="single-input-wrap">
                        <input type="email" class="single-input" />
                        <label>Enter your email address</label>
                    </div>
                    <div class="btn-wrap">
                        <a class="btn btn-green" href="#">Send Email</a>
                        <div class="back-to-login">
                            <i class="fa-solid fa-chevron-left"></i>
                            <span class="back-to-login-text">Back to Login</span>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- //. client Popup End -->
<!-- navbar area start -->
<nav class="navbar navbar-area navbar-expand-lg nav-style-01">
    <div class="top-nav">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-9">
                    <a href="sales-enquiry.html">Sales Enquiry</a>
                    <span class="divider">|</span>
                    <a href="submit-ticket.html">Submit a Ticket</a>
                    <span class="divider">|</span>
                    <a class="signIn-btn">Admin Login</a>
                    <span class="divider">|</span>
                    <a class="client-btn">Client Login</a>
                    <span class="divider">|</span>
                    <a href="contact.html">Contact us</a>
                </div>
                <div class="col-md-3 text-md-end">
                    <div class="nav-right">
                        <a href="checkout.html" class="order-now-btn btn-radius btn-green s-animate-3"><i
                                class="la la-shopping-cart"></i>Order Now</a>
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
            <div class="nav-right-content">
                <ul>
                    <li class="search">
                        <i class="ti-search"></i>
                    </li>
                </ul>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#MapUI_main_menu"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggle-icon">
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                </span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="MapUI_main_menu">
            <div class="logo-wrapper desktop-logo">
                <a href="index.html" class="logo custom-width">
                </a>
            </div>
            <ul class="navbar-nav">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">Products</a>
                    <ul class="sub-menu">
                        <li><a href="what-we-offer.html">What we offer</a></li>
                        <li><a href="map-features.html">Map features</a></li>
                        <li><a href="map-analytics.html">Map Analytics</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">Use Case</a>
                    <ul class="sub-menu">
                        <li><a href="logistics-supply-chain.html">Logistics & Supply Chain</a></li>
                        <li><a href="retail-ecommerce.html"> E-Commerce & Retail</a></li>
                        <li><a href="transport-logistics.html">Transportation & Ride Hailing</a></li>
                        <li><a href="travel-leisure.html">Travel & Tourism</a></li>
                        <li><a href="health-education.html">Healthcare & Pharma</a></li>
                        <li><a href="construction-real-estate.html">Real Estate & PropTech</a></li>
                        <li><a href="smart-cities.html">Smart Cities & Governance</a></li>
                        <li><a href="telecom-utilities.html">Telecom & utilities</a></li>
                        <li><a href="agri-climate.html">Agriculture & Farming</a></li>
                        <li><a href="media-advertising.html"> Advertising & Marketing</a></li>
                    </ul>
                </li>
                <li>
                    <a href="./pricing.html">Pricing</a>
                </li>
                <li>
                    <a href="documentation.html">Documents</a>
                </li>

                <li class="menu-item-has-children">
                    <a href="#">Company</a>
                    <ul class="sub-menu">
                        <li><a href="about.html">About</a></li>
                        <li><a href="news.html">News</a></li>
                        <li><a href="faq.html">Faq</a></li>
                        <li><a href="job-listing.html">Career</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children d-lg-none">
                    <a href="#">More</a>
                    <ul class="sub-menu">
                        <li><a href="sales-enquiry.html">Sales Enquiry</a></li>
                        <li><a href="submit-ticket.html">Submit a Ticket</a></li>
                        <li><a class="signIn-btn">Admin Login</a></li>
                        <li><a class="client-btn">Client Login</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                        <div class="col-md-3 text-md-end">
                            <div class="nav-right">
                                <a href="checkout.html" class="order-now-btn btn-radius btn-green s-animate-3"><i
                                        class="la la-shopping-cart"></i>Order Now</a>
                            </div>
                        </div>
                    </ul>

                </li>

            </ul>
        </div>
        <div class="nav-right-content">
            <ul>
                <li class="search">
                    <i class="ti-search" id="search-btn"></i>
                </li>

            </ul>
        </div>
    </div>
</nav>
<!-- navbar area end -->

<!-- breadcrumb area start -->
<div class="breadcrumb-area" style="background-image: url(assets/img/page-title-bg.png)">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner">
                    <h1 class="page-title">Registration</h1>
                    <ul class="page-list">
                        <li><a href="index.html">Home&nbsp;</a></li>
                        <li>&nbsp;Registration</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb area End -->
<form id="registerForm" class="needs-validation" novalidate>
    <div class="form-container">

        <!-- Company Details -->
        <h2>Company details</h2>
        <div class="form-group">
            <div class="form-col">
                <label>Company Name*</label>
                <input type="text" name="company_name" placeholder="XYZ Company" class="form-control" required>
                <div class="invalid-feedback">
                    Please enter a valid email address.
                </div>
            </div>
            <div class="form-col">
                <div class="enquiry-form-group">
                    <label for="industry">Industry</label>
                    <select id="industry" name="industry" class="form-control" required>
                        <option value="" hidden>Select Industry</option>
                        <option value="ittech">IT Industry</option>
                        <option value="telecomt">
                            Telecom
                        </option>
                        <option value="logistics">
                            Logistics
                        </option>
                        <option value="banking">
                            Banking & Finance
                        </option>
                        <option value="agri-farm">Agriculture & Farming</option>
                        <option value="other">Other</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="form-col">
                <label>Registration Number*</label>
                <input type="text" name="registration_number" placeholder="123456" class="form-control" required>
                <div class="invalid-feedback">
                    Please enter a valid registration number.
                </div>
            </div>
            <div class="form-col">
                <label>Phone Number*</label>
                <input type="tel" name="phone_number" placeholder="123456" class="form-control" required>
                <div class="invalid-feedback">
                    Please enter a valid phone number.
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="form-col">
                <label>Website</label>
                <input type="url" name="website" placeholder="Website URL" class="form-control" required>
                <div class="invalid-feedback">
                    Please enter a valid website URL.
                </div>
            </div>
            <div class="form-col">
                <label>Email Address*</label>
                <input type="email" name="email" placeholder="Enter email address" class="form-control" required>
                <div class="invalid-feedback">
                    Please enter a valid email address.
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="form-col">
                <label>Address*</label>
                <input type="text" name="address" placeholder="Enter address" class="form-control" required>
                <div class="invalid-feedback">
                    Please enter a valid address.
                </div>
            </div>
        </div>

        <!-- Contact Person Details -->
        <h2>Contact person details</h2>
        <div class="form-group">
            <div class="form-col">
                <label>Contact Person*</label>
                <input type="text" name="contact_person" placeholder="Enter Name" class="form-control" required>
                <div class="invalid-feedback">
                    Please enter a valid name.
                </div>
            </div>
            <div class="form-col">
                <label>Designation/Role</label>
                <div class="custom-dropdown" data-name="designation">
                    <div class="custom-dropdown-toggle">
                        <span>Select Designation/Role</span>
                        <i class="fa-solid fa-chevron-down"></i>
                    </div>
                    <div class="custom-dropdown-menu">
                        <div>CEO</div>
                        <div>Supervisor</div>
                        <div>Manager</div>
                        <div>Developer</div>
                        <div>Designer</div>
                    </div>
                    <input type="hidden" name="designation">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="form-col">
                <label>Phone Number</label>
                <input type="tel" name="contact_phone" placeholder="+15522526526" class="form-control" required>
                <div class="invalid-feedback">
                    Please enter a valid phone number.
                </div>
            </div>
            <div class="form-col">
                <label>Email Address</label>
                <input type="email" name="contact_email" placeholder="Enter Email Address" class="form-control"
                    required>
                <div class="invalid-feedback">
                    Please enter a valid email address.
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="form-col">
                <label>Username* <small>(Create Username for log in)</small></label>
                <input type="text" name="username" placeholder="Enter Username" class="form-control" required>
                <div class="invalid-feedback">
                    Please enter a valid username.
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="form-col">
                <label>Set Password*</label>
                <input type="password" name="password" class="form-control" required>
                <div class="invalid-feedback">
                    Please enter a valid password.
                </div>
            </div>
            <div class="form-col">
                <label>Enter password again*</label>
                <input type="password" name="confirm_password" class="form-control" required>
                <div class="invalid-feedback">
                    Please enter a valid password.
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="form-col">
                <label>Security Question* <small>(Choose one question for account recovery or to reset
                        password)</small></label>
                <div class="custom-dropdown" data-name="security-question">
                    <div class="custom-dropdown-toggle">
                        <span>Select Security Question</span>
                        <i class="fa-solid fa-chevron-down"></i>
                    </div>
                    <div class="custom-dropdown-menu">
                        <div>What is Your Favorite Color?</div>
                        <div>Which is Your Favorite Sport?</div>
                        <div>What is Your First Vehicle Number?</div>
                    </div>
                    <input type="hidden" name="security_question">
                </div>
            </div>
            <div class="form-col">
                <label>&nbsp;</label>
                <input type="text" name="security_answer" placeholder="Write answer for the question"
                    class="form-control" required>
                <div class="invalid-feedback">
                    Please enter a valid answer.
                </div>
            </div>
        </div>

        <div class="checkbox-group">
            <input type="checkbox"> I accept terms and conditions
        </div>
        <div class="submit-btn">
            <button type="submit" class="btn btn-green ">Submit</button>
        </div>

    </div>
</form>

<!-- Products & Partners Section -->
<section class="partners-section">
    <div class="partners-container">
        <!-- Header -->
        <div class="partners-header">


            <h2 class="partners-title">
                <!-- Handshake Icon SVG -->
                <svg class="partners-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M18 15l3-3a2.828 2.828 0 00-4-4l-1 1m-2 2l-1 1m-2 2l-2 2m5-5L9 9l-6 6m0 0l3 3m3-3l3 3m3-3l2 2" />
                </svg>
                PRODUCTS & PARTNERS
            </h2>

            <p class="partners-description">
                MapUI collaborates with leading technology providers to deliver reliable, scalable, and future-ready
                location intelligence. Our strategic partnerships ensure seamless integration, advanced security,
                and enterprise-grade performance.
            </p>
        </div>
    </div>

    <!-- Logos Marquee -->
    <div class="partners-logos-wrapper">
        <div class="partners-marquee-container">
            <div class="partners-marquee-track">
                <!-- Strip 1 -->
                <div class="partners-logo-strip">
                    <img src="{{ asset($constants['IMAGEFILEPATH'] . 'acronis-logo.png') }}" alt="Acronis" />
                    <img src="{{ asset($constants['IMAGEFILEPATH'] . 'kaspersky-logo.png') }}" alt="Kaspersky" />
                    <img src="{{ asset($constants['IMAGEFILEPATH'] . 'microsoft-logo.png') }}" alt="Microsoft" />
                    <img src="{{ asset($constants['IMAGEFILEPATH'] . 'dell-logo.png') }}" alt="Dell" />
                    <img src="{{ asset($constants['IMAGEFILEPATH'] . 'amazon-logo.png') }}" alt="Amazon" />
                    <img src="{{ asset($constants['IMAGEFILEPATH'] . 'quick-heal-logo.png') }}" alt="Quick Heal" />
                    <img src="{{ asset($constants['IMAGEFILEPATH'] . 'escan-logo.png') }}" alt="Escan" />
                    <img src="{{ asset($constants['IMAGEFILEPATH'] . 'sonic-wall-logo.png') }}" alt="SonicWall" />
                    <img src="{{ asset($constants['IMAGEFILEPATH'] . 'hp-logo.png') }}" alt="HP" />
                    <img src="{{ asset($constants['IMAGEFILEPATH'] . 'fortinet-logo.png') }}" alt="Fortinet" />
                    <img src="{{ asset($constants['IMAGEFILEPATH'] . 'eset-logo.png') }}" alt="ESET" />
                    <img src="{{ asset($constants['IMAGEFILEPATH'] . 'cisco-logo.png') }}" alt="Cisco" />
                    <img src="{{ asset($constants['IMAGEFILEPATH'] . 'alibaba-cloud-logo.png') }}" alt="Alibaba Cloud" />
                    <img src="{{ asset($constants['IMAGEFILEPATH'] . 'sophos-logo.png') }}" alt="Sophos" />
                    <img src="{{ asset($constants['IMAGEFILEPATH'] . 'symantec-logo.png') }}" alt="Symantec" />
                    <img src="{{ asset($constants['IMAGEFILEPATH'] . 'trend-micro-logo.png') }}" alt="Trend Micro" />
                    <img src="{{ asset($constants['IMAGEFILEPATH'] . 'veeam-logo.png') }}" alt="Veeam" />
                    <img src="{{ asset($constants['IMAGEFILEPATH'] . 'watchguard-logo.png') }}" alt="Watchguard" />
                </div>

                <!-- Duplicate strip for seamless loop -->
                <div class="partners-logo-strip">
                    <img src="{{ asset($constants['IMAGEFILEPATH'] . 'acronis-logo.png') }}" alt="Acronis" />
                    <img src="{{ asset($constants['IMAGEFILEPATH'] . 'kaspersky-logo.png') }}" alt="Kaspersky" />
                    <img src="{{ asset($constants['IMAGEFILEPATH'] . 'microsoft-logo.png') }}" alt="Microsoft" />
                    <img src="{{ asset($constants['IMAGEFILEPATH'] . 'dell-logo.png') }}" alt="Dell" />
                    <img src="{{ asset($constants['IMAGEFILEPATH'] . 'amazon-logo.png') }}" alt="Amazon" />
                    <img src="{{ asset($constants['IMAGEFILEPATH'] . 'quick-heal-logo.png') }}" alt="Quick Heal" />
                    <img src="{{ asset($constants['IMAGEFILEPATH'] . 'escan-logo.png') }}" alt="Escan" />
                    <img src="{{ asset($constants['IMAGEFILEPATH'] . 'sonic-wall-logo.png') }}" alt="SonicWall" />
                    <img src="{{ asset($constants['IMAGEFILEPATH'] . 'hp-logo.png') }}" alt="HP" />
                    <img src="{{ asset($constants['IMAGEFILEPATH'] . 'fortinet-logo.png') }}" alt="Fortinet" />
                    <img src="{{ asset($constants['IMAGEFILEPATH'] . 'eset-logo.png') }}" alt="ESET" />
                    <img src="{{ asset($constants['IMAGEFILEPATH'] . 'cisco-logo.png') }}" alt="Cisco" />
                    <img src="{{ asset($constants['IMAGEFILEPATH'] . 'alibaba-cloud-logo.png') }}" alt="Alibaba Cloud" />
                    <img src="{{ asset($constants['IMAGEFILEPATH'] . 'sophos-logo.png') }}" alt="Sophos" />
                    <img src="{{ asset($constants['IMAGEFILEPATH'] . 'symantec-logo.png') }}" alt="Symantec" />
                    <img src="{{ asset($constants['IMAGEFILEPATH'] . 'trend-micro-logo.png') }}" alt="Trend Micro" />
                    <img src="{{ asset($constants['IMAGEFILEPATH'] . 'veeam-logo.png') }}" alt="Veeam" />
                    <img src="{{ asset($constants['IMAGEFILEPATH'] . 'watchguard-logo.png') }}" alt="Watchguard" />
                </div>
            </div>
        </div>
    </div>
</section>
<!-- footer area start -->
<footer class="footer-area footer-area-2 style-two mg-top-100">
    <div class="container">
        <div class="footer-widget-area">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget widget">
                        <div class="about_us_widget">
                            <a href="index.html" class="footer-logo">
                                <img src="{{ asset($constants['IMAGEFILEPATH'] . 'logo.png') }}" alt="footer logo">
                            </a>
                            <p>Our support team receives AI-powered suggestions, making it faster than ever to
                                handle support requests.</p>
                            <ul class="social-icon">
                                <li>
                                    <a class="facebook" href="https://www.facebook.com/aibuzztech/"
                                        target="_blank"><i class="fa-brands fa-facebook-f  "></i></a>
                                </li>
                                <li>
                                    <a class="twitter" href="https://x.com/aibuzz_tech" target="_blank"><i
                                            class="fa-brands fa-twitter  "></i></a>
                                </li>
                                <li>
                                    <a class="linkedin" href="https://www.linkedin.com/company/aibuzz-techno/"
                                        target="_blank"><i class="fa-brands fa-linkedin"></i></a>
                                </li>
                                <li>
                                    <a class="pinterest" href="https://www.instagram.com/aibuzz_technoventures/"
                                        target="_blank"><i class="fa-brands fa-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="footer-widget widget ">
                        <h4 class="widget-title">Contact</h4>
                        <div class="contact_info_list">
                            <p class="contact-content">3102, 1st Floor, Rustomjee Eaze Zone, Sundar Nagar, Malad
                                West - Mumbai 400064, MH - IN
                            </p>
                            <p><span>Contact:</span> + 91 9967940928</p>
                            <p> + 60 146600012</p>
                            <p><span>E-mail:</span>info&#64;aibuzz.net</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="footer-widget widget widget_nav_menu">
                        <h4 class="widget-title">Quick Link</h4>
                        <ul>
                            <li><a href="./index.html">Home</a></li>
                            <li><a href="./what-we-offer.html">What we offer</a></li>
                            <li><a href="./logistics-supply-chain.html">Use case</a></li>
                            <li><a href="./pricing.html">Pricing</a></li>
                            <li><a href="./documentation.html">Document</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="footer-widget widget widget_nav_menu">
                        <h4 class="widget-title">Need Help?</h4>
                        <ul>
                            <li><a href="contact.html">Contact</a></li>
                            <li><a href="job-listing.html">Career</a></li>
                            <li><a href="terms-condition.html">Terms & Conditions</a></li>
                            <li><a href="privacy.html">Privacy Policy</a></li>
                            <li><a href="disclaimer.html">Disclaimer</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="footer-widget widget">
                        <h4 class="widget-title">Latest News</h4>
                        <div class="about_recent_post">
                            <div class="media">
                                <img src="{{ asset($constants['IMAGEFILEPATH'] . 'footer-news2.png') }}" alt="post">
                                <div class="media-body">
                                    <h6><a href="news.html">MapUI Unlocks Advanced Location-Based Features</a></h6>
                                    <span><!-- Date will be inserted here automatically --></span>
                                </div>
                            </div>
                            <div class="media">
                                <img src="{{ asset($constants['IMAGEFILEPATH'] . 'footer-news1.png') }}" alt="post">
                                <div class="media-body">
                                    <h6><a href="news.html">Major Improvements Roll Out for Leading Map API</a></h6>
                                    <span><!-- Date will be inserted here automatically --></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-inner">
        <div class="copyright-text">
            &copy; MAPUI 2025 All rights reserved, Launched by <a href="https://aibuzz.net" target="_blank">Aibuzz
                Net</a>
        </div>
    </div>
</footer>
<!-- footer area end -->


<script>
    document.querySelectorAll('.custom-dropdown').forEach(dropdown => {
        const toggle = dropdown.querySelector('.custom-dropdown-toggle');
        const menu = dropdown.querySelector('.custom-dropdown-menu');
        const hiddenInput = dropdown.querySelector('input[type="hidden"]');
        const arrow = toggle.querySelector('i');

        toggle.addEventListener('click', () => {
            dropdown.classList.toggle('active');
        });

        menu.querySelectorAll('div').forEach(option => {
            option.addEventListener('click', () => {
                toggle.querySelector("span").textContent = option.textContent;
                hiddenInput.value = option.textContent;
                dropdown.classList.remove('active');
            });
        });

        document.addEventListener('click', (e) => {
            if (!dropdown.contains(e.target)) {
                dropdown.classList.remove('active');
            }
        });
    });
</script>
<script>
    document.getElementById("registerForm").addEventListener("submit", function(e) {
        e.preventDefault();

        let formData = new FormData(this);

        // Optional: simple password confirmation check before sending
        if (formData.get("password") !== formData.get("confirm_password")) {
            toastr.error("Passwords do not match!");
            return;
        }

        fetch("https://mapui1.aibuzz.net/register", {
                method: "POST",
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                console.log("🔎 Registration response:", data);
                if (data.status === "success") {
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
    document.querySelector(".signIn-form").addEventListener("submit", function(e) {
        e.preventDefault();

        // Grab form inputs
        const email = this.querySelector('input[type="text"]').value.trim();
        const password = this.querySelector('input[type="password"]').value;

        if (!email || !password) {
            toastr.error("Please enter both email and password");
            return;
        }

        // Prepare FormData
        const formData = new FormData();
        formData.append("email", email);
        formData.append("password", password);

        fetch("https://mapui1.aibuzz.net/login", {
                method: "POST",
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                console.log("Login response:", data);
                if (data.status === "success") {
                    toastr.success(data.msg);
                    // Redirect after successful login
                    window.location.href = data.redirect_url || "dashboard.html";
                } else {
                    toastr.error(data.msg);
                }
            })
            .catch(err => {
                console.error("Login fetch error:", err);
                toastr.error("Something went wrong. Try again.");
            });
    });
</script>
</body>

</html>

@endsection