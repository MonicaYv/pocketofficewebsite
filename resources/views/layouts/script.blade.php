<!-- resources/views/layouts/script.blade.php -->

<!-- 1. Global CDN Dependencies (Safe from require errors) -->
 
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>


<!-- 2. Cleaned Vite Pipeline (Only pass your actual custom frontend files here) -->
@vite([
    'resources/js/home.js',
    'resources/js/search-box.js',
    'resources/js/search-data.js',
    'resources/js/enquiry.js',
    'resources/js/jquery.cssslider.min.js',
    'resources/js/products.js',
    'resources/js/login.js',
    'resources/js/contact-us.js',
    'resources/js/features-tab.js',
    'resources/js/documentation.js',
    'resources/js/owl.carousel.min.js',
    'resources/js/jquery.counterup.min.js',
    'resources/js/jquery.nice-select.min.js',
    'resources/js/worldmap-libs.js',
    'resources/js/mediaelement.min.js',
    'resources/js/blog.js',
    'resources/js/news.js',
    'resources/js/article-details.js',
    'resources/js/worldmap-topojson.js',
    'resources/js/blog-details.js',
    'resources/js/testimonial-slider.js',
    'resources/js/main.js',
    'resources/js/sales-enquiry-form.js',
    'resources/js/countries.js',
    'resources/js/pricing.js',
    'resources/js/payment.js'
])