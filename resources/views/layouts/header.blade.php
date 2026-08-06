<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
<link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
<link rel="preconnect" href="https://unpkg.com" crossorigin>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<link rel="stylesheet" href="{{ Vite::asset('resources/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ Vite::asset('resources/css/themify-icons.css') }}">
<link rel="stylesheet" href="{{ Vite::asset('resources/css/line-awesome.min.css') }}">
<link rel="stylesheet" href="{{ Vite::asset('resources/css/flaticon.css') }}">
<link rel="stylesheet" href="{{ Vite::asset('resources/css/style.css') }}">
<link rel="stylesheet" href="{{ Vite::asset('resources/css/responsive.css') }}">
<link rel="stylesheet" href="{{ Vite::asset('resources/css/enquiry.css') }}">

@if(request()->is('contact-us'))
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
@endif

<link rel="icon" href="{{ asset('favicon.ico') }}?v=2" type="image/x-icon">
<link rel="shortcut icon" href="{{ asset('favicon.ico') }}?v=2" type="image/x-icon">
<link rel="icon" href="{{ asset('assets/img/logo/favicon.ico') }}?v=2" sizes="any">
<link rel="icon" type="image/svg+xml" href="{{ asset('assets/img/logo/fav-icon.svg') }}?v=2">
<link rel="apple-touch-icon" href="{{ asset('assets/img/logo/apple-touch-icon.png') }}?v=2">

<style>
    .hidden { display: none !important; }
    .custom-error { font-size: 12px; color: red; margin-top: 4px; }
    .is-invalid { border: 1px solid red !important; }
    select.is-invalid,
    input.is-invalid,
    textarea.is-invalid {
        border: 1px solid red !important;
    }
</style>