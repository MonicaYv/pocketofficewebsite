<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | PocketOffice Documentation</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}?v=2" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}?v=2" type="image/x-icon">
    <link rel="icon" href="{{ asset('assets/img/logo/favicon.ico') }}?v=2" sizes="any">
    <link rel="icon" type="image/svg+xml" href="{{ asset('assets/img/logo/fav-icon.svg') }}?v=2">
    <link rel="apple-touch-icon" href="{{ asset('assets/img/logo/apple-touch-icon.png') }}?v=2">
    @vite([
        "resources/css/customer-login.css",
        "resources/css/docs-login.css"
    ])
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="https://googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    @php
        $selectedTab = old('selected_tab', 'user')
    @endphp
    <div class="card">
        <div class="left">
            <img class="left-img" src="/assets/img/Illustration.png" alt="login-img">
        </div>
        <div class="right docs-login-right">
            
            <div class="docs-header-bar">
                <div class="logo">
                    <a href="/index">
                        <img class="logo-img" src="/assets/img/logo/pocket-office-tm-final-logo.png" alt="Logo" width="150" height="auto">
                    </a>                  
                </div>
                <a href="/index" class="back-home docs-back-home"> Home</a>
            </div>
            <div class="docs-pre-header">
                <span class="docs-pre-header-bullet">●</span> PocketOffice Documentation
            </div>
            
            <div class="login-section">
               <h1 class="heading docs-heading">Welcome Back to PocketOffice Learning Hub</h1>
                <form method="POST" action="{{ route('docs.login.submit') }}" id="docs-login-form" @if(session('error')) data-error="{{ session('error') }}" @endif>
                    @csrf
                    <input type="hidden" name="selected_tab" id="selected_tab" value="{{ $selectedTab }}">

                    <div class="tab-container active-user" id="tabs">
                        <div class="tab-slider"></div>

                        <div class="tab {{ $selectedTab === 'user' ? 'active' : '' }}" data-tab="user">User</div>
                        <div class="tab {{ $selectedTab === 'company' ? 'active' : '' }}" data-tab="company">Company</div>
                        <div class="tab {{ $selectedTab === 'partner' ? 'active' : '' }}" data-tab="partner">Partner</div>
                    </div>

                    <div class="field">
                        <label>Login</label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Username" autocomplete="username" required />
                    </div>

                    <div class="field">
                        <label>Password</label>
                        <div class="pwd-wrap">
                            <input type="password" id="pwd" name="password" placeholder="Password" autocomplete="current-password" required />
                            <button class="eye-btn" type="button" aria-label="Show/hide password">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    <div class="g-recaptcha" data-sitekey="6LfPdbgsAAAAAALuLXA3n-tadrbTTuHNCHEKJZz2"></div>

                    <button class="btn-signin" type="submit">Sign in</button>
                </form>

                {{-- <div class="underline"> --}}

                </div>

                
            </div>
            
        </div>


    </div>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    @vite(["resources/js/docs-login.js"])
</body>

</html>
