<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
<link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
<link rel="preconnect" href="https://unpkg.com" crossorigin>

@php
    $deferredCss = [
        'https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css' => null,
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css' => null,
        'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined' => null,
        'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css' => null,
        Vite::asset('resources/css/bootstrap.min.css') => null,
        Vite::asset('resources/css/themify-icons.css') => null,
        Vite::asset('resources/css/line-awesome.min.css') => null,
        Vite::asset('resources/css/flaticon.css') => null,
        Vite::asset('resources/css/style.css') => null,
        Vite::asset('resources/css/responsive.css') => null,
    ];

    if (request()->is('contact-us')) {
        $deferredCss['https://unpkg.com/leaflet@1.9.4/dist/leaflet.css'] = null;
    }

    if (request()->is('contact-us') || request()->is('sales-enquiry') || request()->is('ticket-details')) {
        $deferredCss[Vite::asset('resources/css/enquiry.css')] = null;
    }
@endphp

@foreach(array_keys($deferredCss) as $cssHref)
    <link rel="preload" as="style" href="{{ $cssHref }}" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="{{ $cssHref }}"></noscript>
@endforeach

<link rel="icon" href="{{ asset('favicon.ico') }}?v=2" type="image/x-icon">
<link rel="shortcut icon" href="{{ asset('favicon.ico') }}?v=2" type="image/x-icon">
<link rel="icon" href="{{ asset('assets/img/logo/favicon.ico') }}?v=2" sizes="any">
<link rel="icon" type="image/svg+xml" href="{{ asset('assets/img/logo/fav-icon.svg') }}?v=2">
<link rel="apple-touch-icon" href="{{ asset('assets/img/logo/apple-touch-icon.png') }}?v=2">

<style>
    .hidden { display: none !important; }
    .custom-error { font-size: 12px; color: red; margin-top: 4px; }
    .is-invalid { border: 1px solid red !important; }
    select.is-invalid, input.is-invalid, textarea.is-invalid { border: 1px solid red !important; }
</style>
