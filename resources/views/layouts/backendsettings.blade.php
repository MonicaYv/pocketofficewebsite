<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <!-- CSRF  -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    {{-- GLOBAL CSS --}}

    <meta
      name="description"
      content="Learn about Pocket Office, a cloud desktop platform designed for modern teams. Discover our mission, vision, and how we enable secure work from anywhere."
    />
    <!-- Social Media Tags -->
    <meta
      property="og:title"
      content="About Pocket Office | Cloud Desktop Platform for Modern Work"
    />
    <meta
      property="og:description"
      content="Learn about Pocket Office, a cloud desktop platform designed for modern teams. Discover our mission, vision, and how we enable secure work from anywhere."
    />
    <meta
      property="og:image"
      content="https://pofwebsite.sizaf.com/assets/img/logo/pocket-office-tm-final-logo.png"
    />
    <meta property="og:url" content="https://pofwebsite.sizaf.com/about.html" />
    <meta property="og:type" content="website" />

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