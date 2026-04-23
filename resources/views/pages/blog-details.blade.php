  @extends('layouts.backendsettings')
  @section('title', 'Blog Details')
  @section('content')

  <div id="read-progress"></div>
  <!-- ══════════════════════════════════════════════════════
       HERO — all inner text populated by blog-details.js
  ══════════════════════════════════════════════════════ -->
  <div class="bd-hero" id="bd-hero">
    <img class="bd-hero-img" id="bd-hero-img" src="" alt="" loading="lazy" />
    <div class="bd-hero-gradient"></div>
    <div class="bd-hero-content">
      <span class="bd-category-pill">
        <i class="fa-solid fa-tag"></i>&nbsp;
        <span id="bd-category-text">Loading…</span>
      </span>
      <h1 class="bd-hero-title" id="bd-title"></h1>
      <div class="bd-hero-meta">
        <span><i class="fa-regular fa-calendar"></i> <span id="bd-date"></span></span>
        <div class="dot"></div>
        <span><i class="fa-regular fa-user"></i> <span id="bd-author"></span></span>
        <div class="dot"></div>
        <span><i class="fa-regular fa-clock"></i> <span id="bd-read-time"></span></span>
      </div>
    </div>
  </div>

  <!-- ══════════════════════════════════════════════════════
       ARTICLE — body rendered by blog-details.js
  ══════════════════════════════════════════════════════ -->
  <div class="bd-page">
    <a href="blog.html" class="bd-back">
      <i class="fa-solid fa-arrow-left"></i> Back to Blog
    </a>

    <!-- Article body: injected by JS -->
    <article class="bd-body" id="bd-body"></article>
  </div>
  <!-- bd-page end -->
  @endsection