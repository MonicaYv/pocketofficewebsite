<!-- search Popup -->
<div class="body-overlay" id="body-overlay"></div>
<div class="search-popup" id="search-popup">
    <form class="search-form" onsubmit="return false;">
        <div class="form-group">
            <input
                type="text"
                id="search-input"
                class="form-control"
                placeholder="Search..."
                autocomplete="off" />
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
                    <img src="assets/img/others/admin-login.png" alt="img" loading="lazy" />
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
                    <img src="assets/img/client-login.png" alt="img" loading="lazy" />
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