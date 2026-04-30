  @extends('layouts.backendsettings')
  @section('title', 'Search Result')
  <style>
    /* Search Results */

    #search-results {
      max-width: 700px;
      margin: auto;
    }

    .search-result-item {
      padding: 18px;
      border-bottom: 1px solid #eee;
      transition: 0.3s;
      cursor: pointer;
    }

    .search-result-item:hover {
      background: #f7f7f7;
    }

    .search-result-item h5 {
      margin: 0;
      font-weight: 600;
      color: #222;
    }

    .search-result-item span {
      font-size: 14px;
      color: #888;
    }
  </style>
  @section('content')
  <!-- breadcrumb area start -->
  <div class="breadcrumb-area" style="background-image: url(assets/img/page-title-bg.png)">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="breadcrumb-inner">
            <h1 class="page-title">Search Result</h1>
            <ul class="page-list">
              <li><a href="index.html">Home&nbsp;</a></li>
              <li>&nbsp;Search Result</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- SEARCH SECTION -->
  <section class="container" style="padding:60px 0">

    <div class="text-center mb-4">
      <h2>Search the Website</h2>

      <input type="text" id="search-input" placeholder="Search pages, industries, features..."
        class="form-control" style="max-width:600px;margin:auto;padding:15px;font-size:18px" />

    </div>

    <!-- RESULTS -->
    <div id="search-results"></div>

  </section>

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
            <img src="/assets/img/acronis-logo.png" alt="Acronis" loading="lazy" />
            <img src="/assets/img/kaspersky-logo.png" alt="Kaspersky" loading="lazy" />
            <img src="/assets/img/microsoft-logo.png" alt="Microsoft" loading="lazy" />
            <img src="/assets/img/dell-logo.png" alt="Dell" loading="lazy" />
            <img src="/assets/img/amazon-logo.png" alt="Amazon" loading="lazy" />
            <img src="/assets/img/quick-heal-logo.png" alt="Quick Heal" loading="lazy" />
            <img src="/assets/img/escan-logo.png" alt="Escan" loading="lazy" />
            <img src="/assets/img/sonic-wall-logo.png" alt="SonicWall" loading="lazy" />
            <img src="/assets/img/hp-logo.png" alt="HP" loading="lazy" />
            <img src="/assets/img/fortinet-logo.png" alt="Fortinet" loading="lazy" />
            <img src="/assets/img/eset-logo.png" alt="ESET" loading="lazy" />
            <img src="/assets/img/cisco-logo.png" alt="Cisco" loading="lazy" />
            <img src="/assets/img/alibaba-cloud-logo.png" alt="Alibaba Cloud" loading="lazy" />
            <img src="/assets/img/sophos-logo.png" alt="Sophos" loading="lazy" />
            <img src="/assets/img/symantec-logo.png" alt="Symantec" loading="lazy" />
            <img src="/assets/img/trend-micro-logo.png" alt="Trend Micro" loading="lazy" />
            <img src="/assets/img/veeam-logo.png" alt="Veeam" loading="lazy" />
            <img src="/assets/img/watchguard-logo.png" alt="Watchguard" loading="lazy" />
          </div>

          <!-- Duplicate strip for seamless loop -->
          <div class="partners-logo-strip">
            <img src="/assets/img/acronis-logo.png" alt="Acronis" loading="lazy" />
            <img src="/assets/img/kaspersky-logo.png" alt="Kaspersky" loading="lazy" />
            <img src="/assets/img/microsoft-logo.png" alt="Microsoft" loading="lazy" />
            <img src="/assets/img/dell-logo.png" alt="Dell" loading="lazy" />
            <img src="/assets/img/amazon-logo.png" alt="Amazon" loading="lazy" />
            <img src="/assets/img/quick-heal-logo.png" alt="Quick Heal" loading="lazy" />
            <img src="/assets/img/escan-logo.png" alt="Escan" loading="lazy" />
            <img src="/assets/img/sonic-wall-logo.png" alt="SonicWall" loading="lazy" />
            <img src="/assets/img/hp-logo.png" alt="HP" loading="lazy" />
            <img src="/assets/img/fortinet-logo.png" alt="Fortinet" loading="lazy" />
            <img src="/assets/img/eset-logo.png" alt="ESET" loading="lazy" />
            <img src="/assets/img/cisco-logo.png" alt="Cisco" loading="lazy" />
            <img src="/assets/img/alibaba-cloud-logo.png" alt="Alibaba Cloud" loading="lazy" />
            <img src="/assets/img/sophos-logo.png" alt="Sophos" loading="lazy" />
            <img src="/assets/img/symantec-logo.png" alt="Symantec" loading="lazy" />
            <img src="/assets/img/trend-micro-logo.png" alt="Trend Micro" loading="lazy" />
            <img src="/assets/img/veeam-logo.png" alt="Veeam" loading="lazy" />
            <img src="/assets/img/watchguard-logo.png" alt="Watchguard" loading="lazy" />
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection