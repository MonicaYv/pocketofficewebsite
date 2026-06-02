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
    @php
        $selectedTab = old('selected_tab', 'user');
    @endphp
    <div class="card">
        <div class="left">
            <img class="left-img" src="/assets/img/Illustration.png" alt="login-img">
        </div>
        <div class="right">
            <div class="logo">
                <a href="index.html">
                    <img class="logo-img" src="/assets/img/logo/pocket-office-final-logo.png" alt="Logo" width="80" height="40">
                    <h5>PocketOffice</h5>
                </a>
                 
            </div>
            
            <div class="login-section">
               <h1 class="heading">Nice to see you again</h1>
                <form method="POST" action="{{ route('docs.login.submit') }}" id="docs-login-form">
                    @csrf
                    <input type="hidden" name="selected_tab" id="selected_tab" value="{{ $selectedTab }}">

                    <div class="tab-container active-user" id="tabs">
                        <div class="tab-slider"></div>

                        <div class="tab {{ $selectedTab === 'user' ? 'active' : '' }}" data-tab="user" onclick="setTab('user')">User</div>
                        <div class="tab {{ $selectedTab === 'company' ? 'active' : '' }}" data-tab="company" onclick="setTab('company')">Company</div>
                        <div class="tab {{ $selectedTab === 'partner' ? 'active' : '' }}" data-tab="partner" onclick="setTab('partner')">Partner</div>
                    </div>

                    <div class="field">
                        <label>Login</label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter Email address" autocomplete="username" required />
                    </div>

                    <div class="field">
                        <label>Password</label>
                        <div class="pwd-wrap">
                            <input type="password" id="pwd" name="password" placeholder="Enter password" autocomplete="current-password" required />
                            <button class="eye-btn" type="button" onclick="togglePwd(this)" aria-label="Show/hide password">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    <div class="g-recaptcha" data-sitekey="6LfPdbgsAAAAAALuLXA3n-tadrbTTuHNCHEKJZz2"></div>

                    <button class="btn-signin" type="submit">Sign in</button>
                </form>

                <div class="underline">

                </div>

                <button class="btn-google" type="button" onclick="window.location.href='index.html'">
                    <i class="fa-solid fa-arrow-left"></i>
                    Back to Home
                </button>
            </div>
            
        </div>


    </div>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        function setTab(tabName) {
            const container = document.getElementById("tabs");
            const tabs = container.querySelectorAll(".tab");
            const selectedTab = document.getElementById("selected_tab");
            const tabClasses = {
                user: "active-user",
                company: "active-admin",
                partner: "active-master",
            };

            tabs.forEach((tab) => tab.classList.remove("active"));
            tabs.forEach((tab) => {
                if (tab.dataset.tab === tabName) {
                    tab.classList.add("active");
                }
            });

            // Reset all role classes
            container.classList.remove("active-user", "active-admin", "active-master");
            container.classList.add(tabClasses[tabName] || "active-user");

            if (selectedTab) {
                selectedTab.value = tabName;
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

        @if(session('error'))
            toastr.error(@json(session('error')));
        @endif

        $(document).ready(function () {
            $("#docs-login-form").on("submit", function () {
                if (!$("#selected_tab").val()) {
                    $("#selected_tab").val("user");
                }
            });
        });

        document.addEventListener("DOMContentLoaded", function () {
            const selectedTab = document.getElementById("selected_tab");
            setTab((selectedTab && selectedTab.value) ? selectedTab.value : "user");
        });
    </script>
</body>

</html>
