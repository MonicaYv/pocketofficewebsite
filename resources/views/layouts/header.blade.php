<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />

<link rel="icon" href="/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="icon" href="{{ asset('assets/img/logo/favicon.ico') }}" sizes="any">
<link rel="icon" type="image/svg+xml" href="{{ asset('assets/img/logo/fav-icon.svg') }}">
<link rel="apple-touch-icon" href="{{ asset('assets/img/logo/apple-touch-icon.png') }}">

@vite([
    // Main Javascript Entrypoint
    'resources/js/app.js',

    // Core Layout Styles
    'resources/css/bootstrap.min.css',
    // REMOVED: 'resources/css/font-awesome.min.css', <--- This was causing the 404 error
    'resources/css/themify-icons.css',
    'resources/css/line-awesome.min.css',
    'resources/css/flaticon.css',
    
    // Component Plugins
    'resources/css/magnific-popup.css',
    'resources/css/owl.carousel.min.css',
    'resources/css/nice-select.css',
    'resources/css/animate.css',
    'resources/css/animated-slider.css',
    
    // Custom App Layer Stylesheets
    'resources/css/style.css',
    'resources/css/enquiry.css',
    'resources/css/responsive.css'
])

<style>
    .hidden { display: none !important; }
    .custom-error { font-size: 12px; color: red; margin-top: 4px; }
    .is-invalid { border: 1px solid red !important; }
    select.is-invalid, input.is-invalid, textarea.is-invalid { border: 1px solid red !important; }
</style>