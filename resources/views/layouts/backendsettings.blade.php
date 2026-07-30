<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

   

    <title>@yield('title', 'Pocket Office')</title>
    <meta name="description" content="@yield('meta-description', 'Pocket Office is a browser-based cloud desktop workspace that lets teams securely access files, apps and collaboration tools from anywhere.')" />
    <meta name="keywords" content="@yield('meta-keywords', 'cloud desktop, browser workspace, remote collaboration, secure workspace')" />
    <meta name="robots" content="index, follow" />
    <link rel="canonical" href="@yield('canonical', url()->current())" />
    
    <meta property="og:title" content="@yield('meta-title', 'Pocket Office')" />
    <meta property="og:description" content="@yield('meta-description', 'Pocket Office is a browser-based cloud desktop workspace that lets teams securely access files, apps and collaboration tools from anywhere.')" />
    <meta property="og:image" content="@yield('meta-image', asset('assets/img/logo/pocket-office-tm-final-logo.png'))" />
    <meta property="og:url" content="@yield('meta-url', url()->current())" />
    <meta property="og:type" content="@yield('og-type', 'website')" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="@yield('meta-title', 'Pocket Office')" />
    <meta name="twitter:description" content="@yield('meta-description', 'Pocket Office is a browser-based cloud desktop workspace that lets teams securely access files, apps and collaboration tools from anywhere.')" />
    <meta name="twitter:image" content="@yield('meta-image', asset('assets/img/logo/pocket-office-tm-final-logo.png'))" />
    <meta name="google-site-verification" content="bUzgqRdlMmzEuKfBDNRCnwuGJCvahgolXtaqzZ2a9TU" />
    <script type="application/ld+json">
        @yield('structured-data', '{}')
    </script>
 @yield('preload')
    @include('layouts.header')

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-HQ34D3KCXF"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-HQ34D3KCXF');
    </script>
    <head>
    
    <!-- Meta Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;
    n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];
    t=b.createElement(e);t.async=!0;
    t.src='https://connect.facebook.net/en_US/fbevents.js';
    s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s);
    }(window, document, 'script',
    'https://connect.facebook.net/en_US/fbevents.js');

    fbq('init', '467144275341276');
    fbq('track', 'PageView');
    </script>
    <!-- End Meta Pixel Code -->
    
</head>
</head>

<body>
    <noscript>
<img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=467144275341276&ev=PageView&noscript=1"/>
</noscript>

    {{-- Preloader --}}
    {{-- @include('layouts.preloader') --}}

    {{-- Search Popup --}}
    @include('layouts.popup')

    {{-- Navbar --}}
    @include('layouts.navbar')

    {{-- Page Content --}}
    <main>
        @yield('content')
        @unless(request()->is('contact-us') || request()->is('sales-enquiry'))
            @include('layouts.content-script')
        @endunless
    </main>

    {{-- Footer --}}
    @include('layouts.footer')
    
    {{-- Scripts --}}
    @include('layouts.script')

    {{-- Routes Scripts --}}
    @include('layouts.routes-script')

</body>

</html>
