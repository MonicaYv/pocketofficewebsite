<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    @vite(["resources/css/customer-login.css"]);
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body>
    <div class="card">
        <div class="left">
            <img class="left-img" src="/assets/img/Illustration.png" alt="login-img">
        </div>
        <div class="right">
            <div class="logo">
                <a href="/">
                    <span>PocketOffice</span>
                </a>
            </div>
            <form method="POST" action="{{ route('docs.login.submit') }}">
                @csrf
            <div class="login-section">
                <div class="tab-container active-user" id="tabs">
                    <div class="tab-slider"></div>

                    <div class="tab active" onclick="setTab(0)">User</div>
                    <div class="tab" onclick="setTab(1)">Company</div>
                    <div class="tab" onclick="setTab(2)">Partner</div>
                </div>
                <h1 class="heading">Nice to see you again</h1>
                @if(session('error'))
                    <p style="color:red">{{ session('error') }}</p>
                @endif
                <div class="field">
                    <label>Login</label>
                    <input type="text" placeholder="Enter Email address" autocomplete="email" name="email" />
                </div>

                <div class="field">
                    <label>Password</label>
                    <div class="pwd-wrap">
                        <input name="password" type="password" id="pwd" placeholder="Enter password" autocomplete="current-password" />
                        <button class="eye-btn" type="button" onclick="togglePwd(this)" aria-label="Show/hide password">
                            <i class="fa-solid fa-eye"></i>
                        </button>
                    </div>
                </div>

                <button class="btn-signin" type="submit">Sign in</button>

                <div class="underline">

                </div>

                <button class="btn-google" type="button" onclick="window.location.href='/'">
                    <i class="fa-solid fa-arrow-left"></i>
                    Back to Home
                </button>
            </div>
            </form>
        </div>


    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        function setTab(index) {
            const container = document.getElementById("tabs");
            const tabs = container.querySelectorAll(".tab");

            tabs.forEach((tab) => tab.classList.remove("active"));
            tabs[index].classList.add("active");

            // Reset all role classes
            container.classList.remove("active-user", "active-admin", "active-master");

            // Add class based on index
                if (index === 0) {
                    container.classList.add("active-user");
                } else if (index === 1) {
                    container.classList.add("active-admin");
                } else if (index === 2) {
                    container.classList.add("active-master");
                }
        }

        function handleLogin() {
            const email = document
                .querySelector('input[placeholder="Email or phone number"]')
                .value.trim();
            const password = document.getElementById("pwd").value.trim();
            const container = document.getElementById("tabs");
            const btn = document.querySelector(".btn-signin");

            // Validation
            if (!email || !password) {
                btn.innerText = "Fill all fields!";
                btn.style.backgroundColor = "red";
                return;
            }

            btn.innerText = "Sign in";
            btn.style.backgroundColor = "";

            // Role-based redirect
            // Role-based redirect
            if (container.classList.contains("active-admin")) {
                window.location.href = "https://documentation.pocketoffice.sizaf.com/company/books";
            } else if (container.classList.contains("active-master")) {
                window.location.href = "https://documentation.pocketoffice.sizaf.com/partner/books";
            } else {
                window.location.href = "https://documentation.pocketoffice.sizaf.com/user/books";
            }
        
        }

        function togglePwd(btn) {
            const input = document.getElementById("pwd");
            const icon = btn.querySelector("i");

            if (input.type === "password") {
                input.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                input.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        }

        $(".forgot-password-section").hide();

        $(".forgot").on("click", function () {
            $(".login-section").hide();
            $(".forgot-password-section").show();
        });

        $(".back-to-login").on("click", function () {
            $(".login-section").show();
            $(".forgot-password-section").hide();
        });

        // Toastr options
        toastr.options = {
            closeButton: true,
            progressBar: true,
            positionClass: "toast-top-right",
            timeOut: "4000",
        };

        $(document).ready(function () {
            $(".submit-btn").on("click", function () {
                const email = $("input[type='email']").val().trim();

                if (email === "") {
                toastr.error("Please enter your email address.");
                } else if (!isValidEmail(email)) {
                toastr.warning("Please enter a valid email address.");
                } else {
                toastr.success("A password reset link has been sent to your email address");
                $("input[type='email']").val("");
                setTimeout(() => {
                    $(".login-section").show();
                    $(".forgot-password-section").hide();
                }, 4000);
                }
            });
        });

        function isValidEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }
    </script>
</body>

</html>