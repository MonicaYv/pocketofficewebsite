<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- CSRF  -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Pocket Office')</title>
    <meta name="description" content="@yield('meta-description', 'Pocket Office is a browser-based cloud desktop workspace that lets teams securely access files, apps and collaboration tools from anywhere.')" />
    <meta name="keywords" content="@yield('meta-keywords', 'cloud desktop, browser workspace, remote collaboration, secure workspace')" />
    <meta name="robots" content="index, follow" />
    <link rel="canonical" href="@yield('canonical', url()->current())" />
    <!-- Social Media Tags -->
    <meta property="og:title" content="@yield('meta-title', 'Pocket Office')" />
    <meta property="og:description" content="@yield('meta-description', 'Pocket Office is a browser-based cloud desktop workspace that lets teams securely access files, apps and collaboration tools from anywhere.')" />
    <meta property="og:image" content="@yield('meta-image', asset('assets/img/logo/pocket-office-tm-final-logo.png'))" />
    <meta property="og:url" content="@yield('meta-url', url()->current())" />
    <meta property="og:type" content="@yield('og-type', 'website')" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="@yield('meta-title', 'Pocket Office')" />
    <meta name="twitter:description" content="@yield('meta-description', 'Pocket Office is a browser-based cloud desktop workspace that lets teams securely access files, apps and collaboration tools from anywhere.')" />
    <meta name="twitter:image" content="@yield('meta-image', asset('assets/img/logo/pocket-office-tm-final-logo.png'))" />

    <script type="application/ld+json">
        @yield('structured-data', '{}')
    </script>

    @yield('preload')

    @include('layouts.header')
</head>

<body>
    {{-- Preloader --}}
    @include('layouts.preloader')

    {{-- Search Popup --}}
    @include('layouts.popup')

    {{-- Navbar --}}
    @include('layouts.navbar')

    {{-- Page Content --}}
    <main>
        @yield('content')
        @include('layouts.content-script')
    </main>

    {{-- Footer --}}
    @include('layouts.footer')

    {{-- Scripts --}}
    @include('layouts.script')

    {{-- Routes Scripts --}}
    @include('layouts.routes-script')

</body>

</html>