<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pocketoffice</title>
    <!-- favicon -->
    <link rel="icon" type="image/svg+xml" href="assets/img/logo/fav-icon.svg">

    @vite([
    'resources/css/responsive.css',
    'resources/css/style.css',
    'resources/css/animated-slider.css',
    'resources/css/nice-select.css',
    'resources/css/flaticon.css',
    'resources/css/themify-icons.css',
    'resources/css/line-awesome.min.css',
    'resources/css/font-awesome.min.css',
    'resources/css/slick.css',
    'resources/css/owl.carousel.min.css',
    'resources/css/magnific-popup.css',
    'resources/css/bootstrap.min.css',
    'resources/css/animate.css',
    'resources/css/animated-slider.css',
    'resources/css/login.css',
    ])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .image-section {
            background:
                linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
                url("https://images.unsplash.com/photo-1525547719571-a2d4ac8945e2?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60");
            background-size: cover;
            background-position: center;
            color: white;
            padding: 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 100vh;
            margin-right: 20px;
            color: #fff;
        }
    </style>
</head>

<body>

    <!-- Login Page -->
    <div id="loginPage" class="page active">
        <div class="login-container">
            <div class="col-md-6 image-section">
                <div class="image-content">
                    <h2 style="color: #fff;">Secure Login Portal</h2>
                    <p style="color:#fff">Access your account with confidence knowing your data is protected with industry-standard security measures.</p>
                </div>
            </div>
            <div class="login-card col-md-4">
                <h1 class="login-title">Sign in</h1>
                <p class="login-subtitle">Sign in to your account to continue</p>
                <hr>

                <form id="loginForm">
                    <div class="form-group single-input-wrap">
                        <label class="">E-mail</label>
                        <input type="email" class="form-control single-input" id="email" placeholder="">
                    </div>
                    <div class="form-group single-input-wrap">
                        <label class="">Password</label>
                        <input type="password" class="form-control single-input" id="password" placeholder="">
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">
                                Remember me
                            </label>
                        </div>
                        <a href="#" class="forgot-link" id="forgotPasswordLink">Forgot Password?</a>
                    </div>

                    <button type="submit" class="btn btn-primary">Sign in</button>
                </form>

                <div class="create-account">
                    Don't have an account? <a href="sign-up.html" id="createAccountLink">Sign up</a>
                </div>

                <div class="divider">
                    <span>Or log in with</span>
                </div>

                <div class="social-login">
                    <div class="row">
                        <div class="col-6">
                            <button class="btn btn-outline-secondary w-100">
                                <img src="{{ asset($constants['IMAGEFILEPATH'] . 'login/google.svg') }}" alt="google" loading="lazy" /> Google
                            </button>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-outline-secondary w-100">
                                <img src="{{ asset($constants['IMAGEFILEPATH'] . 'login/facebook.svg') }}" alt="facebook" loading="lazy" /> Facebook
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Forgot Password Page -->
    <div id="forgotPasswordPage" class="page">
        <div class="login-container">
            <div class="login-card">
                <h1 class="login-title">Forgot Password</h1>
                <p class="login-subtitle">Please enter your Email address to receive a link</p>
                <hr>

                <form id="forgotPasswordForm">
                    <div class="form-group">
                        <label for="forgotEmail">Email address</label>
                        <input type="email" class="form-control" id="forgotEmail" placeholder="Enter email address">
                    </div>

                    <button type="submit" class="btn btn-primary">Send Email</button>
                </form>

                <div class="back-to-login">
                    <a href="#" class="backToLoginLink">
                        <i class="fa fa-angle-left font-weight-bold"></i> Back to login
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Forgot Password Page -->
    <div id="resetPasswordPage" class="page">
        <div class="login-container">
            <div class="login-card">
                <h1 class="login-title">Reset Password</h1>

                <form id="forgotPasswordForm">
                    <div class="form-group">
                        <label for="newPassword">New Password</label>
                        <input type="newPassword" class="form-control" id="newPassword"
                            placeholder="Enter your password">
                    </div>

                    <div class="form-group">
                        <label for="rePassword">Re-enter Password</label>
                        <input type="rePassword" class="form-control" id="rePassword" placeholder="Enter your password">
                    </div>

                    <button type="submit" class="btn btn-primary">Verify Code</button>
                </form>

                <div class="back-to-login">
                    <a href="#" class="backToLoginLink">
                        <i class="fa fa-angle-left font-weight-bold"></i> Back to login
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="success-popup">
        <div class="popup-card shadow">
            <img src="{{ asset($constants['IMAGEFILEPATH'] . 'login/success.png') }}" height="100" width="100" alt="success" loading="lazy">
            <h6 class="m-3">Password Changed<br>Successfully</h6>
            <a href="#" class="btn btn-custom btn-block backToLoginLink">Go back to login page</a>
        </div>
    </div>
    <!-- jquery -->

    @vite([
    'resources/js/login.js',
    'resources/js/main.js',
    'resources/js/worldmap-libs.js',
    'resources/js/jquery.cssslider.min.js',
    'resources/js/wow.min.js',
    'resources/js/jquery.magnific-popup.js',
    'resources/js/bootstrap.min.js',
    'resources/js/jquery-2.2.4.min.js',
    ])
    <!-- toaster js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>



</body>

</html>