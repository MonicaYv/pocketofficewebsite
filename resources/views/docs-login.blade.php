<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    @vite(["resources/css/customer-login.css"]);
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
                    <input type="text" placeholder="Enter Email" autocomplete="email" name="email" />
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
    @vite(['resources/js/jquery-2.2.4.min.js', 'resources/js/docs-login.js']);
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</body>

</html>