function safeToast(type, msg, title = "") {
    if (typeof toastr !== "undefined") {
        toastr[type](msg, title);
    } else {
        console.warn("Toastr not available:", msg);
        alert(msg); // fallback
    }
}



$(document).ready(function() {
    if (typeof toastr === "undefined") {
        return; // 🚑 prevent crash
    }
    // Configure Toastr
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    // Validation patterns
    const validationRules = {
        email: {
            pattern: /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/,
            message: "Please enter a valid email address"
        },
        password: {
            minLength: 8,
            pattern: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]/,
            message: "Password must contain at least 8 characters with uppercase, lowercase, number and special character"
        }
    };

    // Enhanced Toast Functions
    function showToast(type, title, message) {
        toastr[type](message, title);
    }

    // Validation Functions
    function validateEmail(email) {
        if (!email) {
            return { valid: false, message: "Email is required" };
        }
        if (!validationRules.email.pattern.test(email)) {
            return { valid: false, message: validationRules.email.message };
        }
        return { valid: true, message: "Email is valid" };
    }

    function validatePassword(password) {
        if (!password) {
            return { valid: false, message: "Password is required" };
        }
        if (password.length < validationRules.password.minLength) {
            return { valid: false, message: `Password must be at least ${validationRules.password.minLength} characters long` };
        }
        return { valid: true, message: "Password is valid" };
    }

    function getPasswordStrength(password) {
        let score = 0;
        if (password.length >= 8) score++;
        if (/[a-z]/.test(password)) score++;
        if (/[A-Z]/.test(password)) score++;
        if (/[0-9]/.test(password)) score++;
        if (/[^A-Za-z0-9]/.test(password)) score++;

        const strengths = ['weak', 'weak', 'fair', 'good', 'strong'];
        return { score: score, strength: strengths[score] };
    }

    // Visual validation feedback
    function setFieldValidation(fieldId, isValid, message) {
        const field = $('#' + fieldId);
        const feedbackDiv = field.next('.invalid-feedback, .valid-feedback');
        
        // Remove existing validation classes and feedback
        field.removeClass('is-valid is-invalid');
        feedbackDiv.remove();
        
        if (isValid) {
            field.addClass('is-valid');
            if (message) {
                field.after(`<div class="valid-feedback">${message}</div>`);
            }
        } else {
            field.addClass('is-invalid');
            field.after(`<div class="invalid-feedback">${message}</div>`);
        }
    }

    // Page Navigation
    function showPage(pageId) {
        $('.page').removeClass('active');
        $('#' + pageId).addClass('active');
        // Clear any previous validation
        $('.form-control').removeClass('is-valid is-invalid');
        $('.invalid-feedback, .valid-feedback').remove();
    }

    // Navigate to Forgot Password page
    $('#forgotPasswordLink').on('click', function(e) {
        e.preventDefault();
        showPage('forgotPasswordPage');
    });

    // Navigate back to Login page
    $('.backToLoginLink').on('click', function(e) {
        e.preventDefault();
        showPage('loginPage');
        if($('.success-popup').css("display") === "flex"){
            $('.success-popup').css("display", "none");
        }
    });

    // Password toggle visibility
    $('#togglePassword').on('click', function() {
        const passwordField = $('#password');
        const icon = $(this).find('i');
        
        if (passwordField.attr('type') === 'password') {
            passwordField.attr('type', 'text');
            icon.removeClass('fa-eye').addClass('fa-eye-slash');
        } else {
            passwordField.attr('type', 'password');
            icon.removeClass('fa-eye-slash').addClass('fa-eye');
        }
    });

    // Real-time email validation
    $('#email, #forgotEmail').on('blur keyup', function() {
        const email = $(this).val();
        const validation = validateEmail(email);
        
        if (email) {
            setFieldValidation($(this).attr('id'), validation.valid, validation.message);
        } else {
            $(this).removeClass('is-valid is-invalid');
            $(this).next('.invalid-feedback, .valid-feedback').remove();
        }
    });

    // Real-time password validation and strength indicator
    $('#password, #newPassword, #rePassword').on('input', function() {
        const password = $(this).val();
        const strengthIndicator = $('#passwordStrength');
        const strengthBar = $('#passwordStrengthBar');
        
        if (password.length > 0) {
            strengthIndicator.show();
            const strength = getPasswordStrength(password);
            
            // Update strength bar
            strengthBar.removeClass('strength-weak strength-fair strength-good strength-strong');
            strengthBar.addClass('strength-' + strength.strength);
            
            // Validate password
            const validation = validatePassword(password);
            if (password.length >= 3) { // Start showing feedback after 3 characters
                setFieldValidation('password', validation.valid, validation.message);
            }
        } else {
            strengthIndicator.hide();
            $(this).removeClass('is-valid is-invalid');
            $(this).next('.invalid-feedback, .valid-feedback').remove();
        }
    });

    // Form submission handlers
    $('#loginForm').on('submit', function(e) {
        e.preventDefault();
        
        const email = $('#email').val();
        const password = $('#password').val();
        const rememberMe = $('#rememberMe').is(':checked');
        
        // Validate all fields
        const emailValidation = validateEmail(email);
        const passwordValidation = validatePassword(password);
        
        setFieldValidation('email', emailValidation.valid, emailValidation.message);
        setFieldValidation('password', passwordValidation.valid, passwordValidation.message);
        
        if (!emailValidation.valid || !passwordValidation.valid) {
            showToast('error', 'Validation Error', 'Please fix the errors in the form before submitting.');
            return;
        }
        
        // Show loading
        showLoading();
        
        setTimeout(function() {
            hideLoading();
            
            if (true) {
                showToast('success', 'Login successful');
                console.log('Login successful:', { email, rememberMe });
            }
        }, 1500);
    });

    $('#forgotPasswordForm').on('submit', function(e) {
        e.preventDefault();
        
        const email = $('#forgotEmail').val();
        const emailValidation = validateEmail(email);
        
        setFieldValidation('forgotEmail', emailValidation.valid, emailValidation.message);
        
        if (!emailValidation.valid) {
            showToast('error', 'Validation Error', 'Please enter a valid email address.');
            return;
        }else {
            showToast('success', 'Email Sent');
            showPage('resetPasswordPage');
            // Clear form and redirect to login after success
            setTimeout(() => {
                $('#forgotEmail').val('').removeClass('is-valid is-invalid');
                $('.invalid-feedback, .valid-feedback').remove();
            }, 2000);
        }
    });

    $('#resetPasswordPage').on('submit', function(e) {
        e.preventDefault();
        console.log('Reset Password form submitted');
        
        const newPassword = $('#newPassword').val();
        const newpasswordValidation = validatePassword(newPassword);

        const rePassword = $('#rePassword').val();
        const repasswordValidation = validatePassword(rePassword);
        
        setFieldValidation('newPassword', newpasswordValidation.valid, newpasswordValidation.message);
        setFieldValidation('rePassword', repasswordValidation.valid, repasswordValidation.message);
        
        if (!newpasswordValidation.valid || !repasswordValidation.valid) {
            showToast('error', 'Validation Error', 'Please ensure the new password and confirmation are valid and match.');
            return;
        }else{
            $('.success-popup').css("display", "flex");
        }
    });

    // Enhanced form interactions
    $('.form-control').on('focus', function() {
        $(this).closest('.form-group').addClass('focused');
    }).on('blur', function() {
        $(this).closest('.form-group').removeClass('focused');
    });

    // Clear validation when switching pages
    $('a[href="#"]').on('click', function() {
        setTimeout(() => {
            $('.form-control').removeClass('is-valid is-invalid');
            $('.invalid-feedback, .valid-feedback').remove();
            $('#passwordStrength').hide();
        }, 100);
    });
});

// Add some interactive hover effects
$(document).on('mouseenter', '.btn', function() {
    $(this).addClass('shadow');
}).on('mouseleave', '.btn', function() {
    $(this).removeClass('shadow');
});

// Responsive adjustments
$(window).on('resize', function() {
    if ($(window).width() < 576) {
        $('.login-card').css('margin', '10px');
    } else {
        $('.login-card').css('margin', '0');
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const loginForm = document.querySelector(".signIn-form");

    if (!loginForm) return;

    loginForm.addEventListener("submit", async function (e) {
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