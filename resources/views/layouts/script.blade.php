<!-- resources/views/layouts/script.blade.php -->

<!-- 1. Global CDN Dependencies loaded after initial paint -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@if(request()->is('contact-us'))
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
@endif

@php
    $viteInputs = [
        'resources/js/main.js',
        'resources/js/search-box.js',
        'resources/js/search-data.js',
    ];

    $isHome = request()->path() === '/' || request()->is('/');

    if ($isHome) {
        $viteInputs[] = 'resources/js/home.js';
    }

    if (request()->is('contact-us')) {
        $viteInputs[] = 'resources/js/contact-us.js';
        $viteInputs[] = 'resources/js/enquiry.js';
        $viteInputs[] = 'resources/js/countries.js';
        $viteInputs[] = 'resources/js/sales-enquiry-form.js';
    }

    if (request()->is('sales-enquiry')) {
        $viteInputs[] = 'resources/js/enquiry.js';
        $viteInputs[] = 'resources/js/countries.js';
        $viteInputs[] = 'resources/js/sales-enquiry-form.js';
    }

    if (request()->is('ticket-details')) {
        $viteInputs[] = 'resources/js/enquiry.js';
    }

    if (
        request()->is('core-features') ||
        request()->is('collaboration') ||
        request()->is('integrations')
    ) {
        $viteInputs[] = 'resources/js/products.js';
    }

    if (request()->is('team-type') || request()->is('use-case')) {
        $viteInputs[] = 'resources/js/features-tab.js';
    }

    if (request()->is('documentation')) {
        $viteInputs[] = 'resources/js/documentation.js';
    }

    if (request()->is('blog')) {
        $viteInputs[] = 'resources/js/blog-data.js';
        $viteInputs[] = 'resources/js/blog.js';
    }

    if (request()->is('blog/*')) {
        $viteInputs[] = 'resources/js/blog-data.js';
        $viteInputs[] = 'resources/js/blog-details.js';
    }

    if (request()->is('news')) {
        $viteInputs[] = 'resources/js/news.js';
    }

    if (request()->is('article-details')) {
        $viteInputs[] = 'resources/js/article-details.js';
    }

    if (request()->is('search-result')) {
        $viteInputs[] = 'resources/js/search-result.js';
    }

    if (request()->is('pricing')) {
        $viteInputs[] = 'resources/js/pricing.js';
    }

    if (request()->is('payment')) {
        $viteInputs[] = 'resources/js/payment.js';
    }

    if (request()->is('thank-you')) {
        $viteInputs[] = 'resources/js/pricing.js';
    }
@endphp

@foreach ($viteInputs as $viteInput)
<script type="module" src="{{ Vite::asset($viteInput) }}"></script>
@endforeach
