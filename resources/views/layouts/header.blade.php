<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
<link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
<link rel="preconnect" href="https://unpkg.com" crossorigin>

@if (request()->is('/'))
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"></noscript>
@else
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
@endif

<link rel="preload"
    href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
    as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"></noscript>

@if (!request()->is('/'))
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
@vite(["resources/css/bootstrap.min.css", "resources/css/themify-icons.css", "resources/css/line-awesome.min.css", "resources/css/flaticon.css", "resources/css/style.css", "resources/css/responsive.css", "resources/css/enquiry.css" ])
@else
    @vite(["resources/css/bootstrap.min.css", "resources/css/themify-icons.css", "resources/css/style.css", "resources/css/responsive.css"])
@endif


<link rel="icon" href="{{ asset('favicon.ico') }}?v=2" type="image/x-icon">
<link rel="shortcut icon" href="{{ asset('favicon.ico') }}?v=2" type="image/x-icon">
<link rel="icon" href="{{ asset('assets/img/logo/favicon.ico') }}?v=2" sizes="any">
<link rel="icon" type="image/svg+xml" href="{{ asset('assets/img/logo/fav-icon.svg') }}?v=2">
<link rel="apple-touch-icon" href="{{ asset('assets/img/logo/apple-touch-icon.png') }}?v=2">
