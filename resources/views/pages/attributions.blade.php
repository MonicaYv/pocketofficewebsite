@extends('layouts.backendsettings')
@section('title', 'Attributions')
@section('meta-title', 'Attributions | Pocket Office')
@section('meta-description', 'View the open source libraries, assets, and resources credited by Pocket Office in our cloud desktop platform and website.')
@section('meta-keywords', 'attributions, open source credits, pocket office resources, software credits')
@section('meta-image', 'https://pocketdesk.sizaf.com/assets/img/hero-images/page-title-bg.png')
@section('canonical', 'https://pocketdesk.sizaf.com/attributions')
@section('meta-url', 'https://pocketdesk.sizaf.com/attributions')
@section('structured-data')
@verbatim
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "Attributions | Pocket Office",
  "url": "https://pocketdesk.sizaf.com/attributions",
  "description": "View the open source libraries, assets, and resources credited by Pocket Office in our cloud desktop platform and website.",
  "inLanguage": "en",
  "image": "https://pocketdesk.sizaf.com/assets/img/hero-images/page-title-bg.png",
  "publisher": {
    "@type": "Organization",
    "name": "Pocket Office",
    "url": "https://pocketdesk.sizaf.com",
    "logo": {
      "@type": "ImageObject",
      "url": "https://pocketdesk.sizaf.com/assets/img/logo/pocket-office-tm-final-logo.png"
    }
  }
}
@endverbatim
@endsection
@section('content')
<!-- breadcrumb area start -->
<div class="breadcrumb-area" style="background-image: url('{{ asset($constants['IMAGEFILEPATH'] . 'page-title-bg.png') }}')">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="breadcrumb-inner">
          <h1 class="page-title">Attributions</h1>

        </div>
      </div>
    </div>
  </div>
</div>
<!-- breadcrumb area End -->

<!-- Ui element start -->
<div class="work-processing-area pd-top-120">
  <div class="container">
    <div class="row justify-content-center custom-gutters-16 ">
      <div class="row justify-content-center custom-gutters-16">
        <div class="">
          <div class="work-processing-details">
            <div class="section-title style-four">
              <h2 class="title">
                All the open source libraries and resources used in this project
              </h2>
              <p>
                This project utilizes a variety of open source libraries and resources to enhance functionality and
                streamline development. Below is a list of key libraries and their purposes:
              </p>
              <ul>
                <li>images and videos by <a href="https://www.pexels.com/">Freepik</a></li>
                <li>jQuery: A fast, small, and feature-rich JavaScript library that simplifies HTML document traversal
                  and manipulation.</li>
                <li>Bootstrap: A popular front-end framework for building responsive and mobile-first websites.</li>
                <li>Font Awesome: A toolkit for icons and social logos that provides scalable vector icons.</li>
                <li>Animate.css: A library of ready-to-use, cross-browser animations for use in web projects.</li>
                <li>Owl Carousel: A touch-enabled jQuery plugin that allows you to create responsive carousel sliders.
                </li>
                <li>Magnific Popup: A responsive lightbox & dialog script with focus on performance and providing best
                  experience for user with any device.</li>
                <li>Waypoints: A library that makes it easy to execute a function whenever you scroll to an element.
                </li>
                <li>Isotope: A JavaScript library for filtering, sorting, and laying out a group of items.</li>
                <li>Nice Select: A jQuery plugin that replaces the default select box with a customizable one.</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Ui element End -->

    <!-- Products & Partners Section -->
    <section class="partners-section">
      <div class="partners-container">
        <!-- Header -->
        <div class="partners-header">

          <h2 class="partners-title">
            <!-- Handshake Icon SVG -->
            <svg class="partners-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M18 15l3-3a2.828 2.828 0 00-4-4l-1 1m-2 2l-1 1m-2 2l-2 2m5-5L9 9l-6 6m0 0l3 3m3-3l3 3m3-3l2 2" />
            </svg>
            PRODUCTS & PARTNERS
          </h2>

          <p class="partners-description">
            MapUI collaborates with leading technology providers to deliver
            reliable, scalable, and future-ready location intelligence. Our
            strategic partnerships ensure seamless integration, advanced
            security, and enterprise-grade performance.
          </p>
        </div>
      </div>

      <!-- Logos Marquee -->
      <div class="partners-logos-wrapper">
        <div class="partners-marquee-container">
          <div class="partners-marquee-track">
            <!-- Strip 1 -->
            <div class="partners-logo-strip">
              <img loading="lazy" src="{{ asset($constants['IMAGEFILEPATH'] . 'acronis-logo.png') }}" alt="Acronis" />
              <img loading="lazy" src="{{ asset($constants['IMAGEFILEPATH'] . 'kaspersky-logo.png') }}" alt="Kaspersky" />
              <img loading="lazy" src="{{ asset($constants['IMAGEFILEPATH'] . 'microsoft-logo.png') }}" alt="Microsoft" />
              <img loading="lazy" src="{{ asset($constants['IMAGEFILEPATH'] . 'dell-logo.png') }}" alt="Dell" />
              <img loading="lazy" src="{{ asset($constants['IMAGEFILEPATH'] . 'amazon-logo.png') }}" alt="Amazon" />
              <img loading="lazy" src="{{ asset($constants['IMAGEFILEPATH'] . 'quick-heal-logo.png') }}" alt="Quick Heal" />
              <img loading="lazy" src="{{ asset($constants['IMAGEFILEPATH'] . 'escan-logo.png') }}" alt="Escan" />
              <img loading="lazy" src="{{ asset($constants['IMAGEFILEPATH'] . 'sonic-wall-logo.png') }}" alt="SonicWall" />
              <img loading="lazy" src="{{ asset($constants['IMAGEFILEPATH'] . 'hp-logo.png') }}" alt="HP" />
              <img loading="lazy" src="{{ asset($constants['IMAGEFILEPATH'] . 'fortinet-logo.png') }}" alt="Fortinet" />
              <img loading="lazy" src="{{ asset($constants['IMAGEFILEPATH'] . 'eset-logo.png') }}" alt="ESET" />
              <img loading="lazy" src="{{ asset($constants['IMAGEFILEPATH'] . 'cisco-logo.png') }}" alt="Cisco" />
              <img loading="lazy" src="{{ asset($constants['IMAGEFILEPATH'] . 'alibaba-cloud-logo.png') }}" alt="Alibaba Cloud" />
              <img loading="lazy" src="{{ asset($constants['IMAGEFILEPATH'] . 'sophos-logo.png') }}" alt="Sophos" />
              <img loading="lazy" src="{{ asset($constants['IMAGEFILEPATH'] . 'symantec-logo.png') }}" alt="Symantec" />
              <img loading="lazy" src="{{ asset($constants['IMAGEFILEPATH'] . 'trend-micro-logo.png') }}" alt="Trend Micro" />
              <img loading="lazy" src="{{ asset($constants['IMAGEFILEPATH'] . 'veeam-logo.png') }}" alt="Veeam" />
              <img loading="lazy" src="{{ asset($constants['IMAGEFILEPATH'] . 'watchguard-logo.png') }}" alt="Watchguard" />              
            </div>

            <!-- Duplicate strip for seamless loop -->
            <div class="partners-logo-strip">
              <img loading="lazy" src="{{ asset($constants['IMAGEFILEPATH'] . 'acronis-logo.png') }}" alt="Acronis" />
              <img loading="lazy" src="{{ asset($constants['IMAGEFILEPATH'] . 'kaspersky-logo.png') }}" alt="Kaspersky" />
              <img loading="lazy" src="{{ asset($constants['IMAGEFILEPATH'] . 'microsoft-logo.png') }}" alt="Microsoft" />
              <img loading="lazy" src="{{ asset($constants['IMAGEFILEPATH'] . 'dell-logo.png') }}" alt="Dell" />
              <img loading="lazy" src="{{ asset($constants['IMAGEFILEPATH'] . 'amazon-logo.png') }}" alt="Amazon" />
              <img loading="lazy" src="{{ asset($constants['IMAGEFILEPATH'] . 'quick-heal-logo.png') }}" alt="Quick Heal" />
              <img loading="lazy" src="{{ asset($constants['IMAGEFILEPATH'] . 'escan-logo.png') }}" alt="Escan" />
              <img loading="lazy" src="{{ asset($constants['IMAGEFILEPATH'] . 'sonic-wall-logo.png') }}" alt="SonicWall" />
              <img loading="lazy" src="{{ asset($constants['IMAGEFILEPATH'] . 'hp-logo.png') }}" alt="HP" />
              <img loading="lazy" src="{{ asset($constants['IMAGEFILEPATH'] . 'fortinet-logo.png') }}" alt="Fortinet" />
              <img loading="lazy" src="{{ asset($constants['IMAGEFILEPATH'] . 'eset-logo.png') }}" alt="ESET" />
              <img loading="lazy" src="{{ asset($constants['IMAGEFILEPATH'] . 'cisco-logo.png') }}" alt="Cisco" />
              <img loading="lazy" src="{{ asset($constants['IMAGEFILEPATH'] . 'alibaba-cloud-logo.png') }}" alt="Alibaba Cloud" />
              <img loading="lazy" src="{{ asset($constants['IMAGEFILEPATH'] . 'sophos-logo.png') }}" alt="Sophos" />
              <img loading="lazy" src="{{ asset($constants['IMAGEFILEPATH'] . 'symantec-logo.png') }}" alt="Symantec" />
              <img loading="lazy" src="{{ asset($constants['IMAGEFILEPATH'] . 'trend-micro-logo.png') }}" alt="Trend Micro" />
              <img loading="lazy" src="{{ asset($constants['IMAGEFILEPATH'] . 'veeam-logo.png') }}" alt="Veeam" />
              <img loading="lazy" src="{{ asset($constants['IMAGEFILEPATH'] . 'watchguard-logo.png') }}" alt="Watchguard" />
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
@endsection