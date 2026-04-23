  @extends('layouts.backendsettings')
  @section('title', 'Search Result')
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

          <!-- Sign In Form -->
          <form class="MapUI-form-wrap signIn-form needs-validation" id="signInForm" novalidate>
            <h4 class="widget-title">Sign In</h4>

            <div class="single-input-wrap">
              <input type="email" class="single-input form-control" name="email" id="email" required />
              <label>E-mail</label>
              <div class="invalid-feedback">
                Please enter a valid email address.
              </div>
            </div>

            <div class="single-input-wrap">
              <input type="password" class="single-input form-control" name="password" id="password" required
                minlength="6" />
              <label>Password</label>
              <div class="invalid-feedback">
                Please enter your password (minimum 6 characters).
              </div>
            </div>

            <div class="remember-text">
              <div class="checkbox-area-popup">
                <input id="1checkbox" type="checkbox" class="float-left checkbox" />
                <span>Remember me</span>
              </div>
              <span class="float-right forgot-password-text" id="forgotPasswordBtn">
                Forgot your password?
              </span>
            </div>

            <div class="btn-wrap">
              <button type="submit" class="btn btn-green">Sign In</button>
              <div class="dont-have-account-text">
                <span>You don't have account?</span>
                <a class="signup" href="registration.html">Sign Up</a>
              </div>
            </div>
          </form>

          <!-- Forgot Password Form -->
          <form class="MapUI-form-wrap forgot-form needs-validation" id="forgotForm" style="display:none;" novalidate>
            <div class="popup-widget-title">
              <span class="forgot-heading">Forgot Password</span>
              <span class="forgot-text">Please Enter Your Email Address To Receive a Link</span>
            </div>

            <div class="single-input-wrap">
              <input type="email" class="single-input form-control" id="forgotEmail" required />
              <label>Enter your email address</label>
              <div class="invalid-feedback">
                Please enter a valid email address.
              </div>
            </div>

            <div class="btn-wrap">
              <button type="submit" class="btn btn-green" id="sendEmailBtn">Send Email</button>
              <div class="back-to-login" id="backToLoginBtn">
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

          <!-- Sign In Form with Bootstrap Validation -->
          <form class="MapUI-form-wrap signIn-form needs-validation" novalidate>
            <h4 class="widget-title">Sign In</h4>

            <div class="single-input-wrap">
              <input type="email" class="single-input form-control" name="email" required />
              <label>E-mail</label>
              <div class="invalid-feedback">
                Please enter a valid email address.
              </div>
            </div>

            <div class="single-input-wrap">
              <input type="password" class="single-input form-control" name="password" required minlength="6" />
              <label>Password</label>
              <div class="invalid-feedback">
                Please enter your password (minimum 6 characters).
              </div>
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
                <span>You don't have an account?</span>
                <a class="signup" href="registration.html">Sign Up</a>
              </div>
            </div>
          </form>

          <!--Forgot Password Form-->
          <form class="MapUI-form-wrap forgot-form needs-validation" novalidate style="display:none;">
            <div class="popup-widget-title">
              <span class="forgot-heading">Forgot Password</span>
              <span class="forgot-text">Please Enter Your Email Address To Receive a Link</span>
            </div>

            <div class="single-input-wrap">
              <input type="email" class="single-input form-control" required />
              <label>Enter your email address</label>
              <div class="invalid-feedback">
                Please enter a valid email address.
              </div>
            </div>

            <div class="btn-wrap">
              <button type="submit" class="btn btn-green">Send Email</button>
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


  <!-- breadcrumb area start -->
  <div class="breadcrumb-area" style="background-image: url(assets/img/page-title-bg.png)">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="breadcrumb-inner">
            <h1 class="page-title">Search Result</h1>
            <ul class="page-list">
              <li><a href="index.html">Home&nbsp;</a></li>
              <li>&nbsp;Search Result</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="result-div">
    result
  </div>

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
          MapUI collaborates with leading technology providers to deliver
          reliable, scalable, and future-ready location intelligence. Our
          strategic partnerships ensure seamless integration, advanced
          security, and enterprise-grade performance.
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



  <!-- back to top area start -->
  <div class="back-to-top">
    <span class="back-top"><i class="fa fa-angle-up"></i></span>
  </div>
  <!-- back to top area end -->
  @endsection