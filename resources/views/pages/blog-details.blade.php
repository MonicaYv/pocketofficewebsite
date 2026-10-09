@extends('layouts.backendsettings')
@section('title', 'Blog Details')
@section('body-class', 'blog-details-page')
@section('content')




<div id="read-progress"></div>
<div class="bd-hero" id="bd-hero">
  <img class="bd-hero-img" id="bd-hero-img" src="" alt="Blog Post Image" loading="lazy" />
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

<div class="bd-page">
  <a href="{{ url('/blog') }}" class="bd-back">
    <i class="fa-solid fa-arrow-left"></i> Back to Blog
  </a>

  <article class="bd-body" id="bd-body"></article>
</div>



@endsection
@section('scripts')
    @vite(['resources/js/blog-details.js'])
@endsection
