<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
    integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer" />

<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

<!-- Leaflet CSS contact us page -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<!-- team type -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />

<link rel="canonical" href="https://pofwebsite.sizaf.com/about.html" />

<link rel="icon" type="image/svg+xml" href="assets/img/logo/fav-icon.svg" />


@vite([
'resources/css/bootstrap.min.css',
'resources/css/font-awesome.min.css',
'resources/css/themify-icons.css',
'resources/css/magnific-popup.css',
'resources/css/style.css',
'resources/css/enquiry.css',
'resources/css/responsive.css',
'resources/css/animate.css',
'resources/css/owl.carousel.min.css',
'resources/css/line-awesome.min.css',
'resources/css/flaticon.css',
'resources/css/nice-select.css',
'resources/css/animated-slider.css',

])


<style>
    #sales-enquiry-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
        z-index: 9999;
        display: none;
    }

    #sales-enquiry-modal {
        background: #fff;
        width: 90%;
        max-width: 600px;
        margin: 60px auto;
        padding: 20px;
        border-radius: 8px;
        position: relative;
    }

    #sales-enquiry-close {
        position: absolute;
        top: 10px;
        right: 15px;
        font-size: 20px;
        cursor: pointer;
    }

    .hidden {
        display: none !important;
    }
</style>