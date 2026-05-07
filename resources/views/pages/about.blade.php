@extends('layouts.backendsettings')
@section('title', 'About Pocket Office | Cloud Desktop Platform for Modern Work')
@section('meta-title', 'About Pocket Office | Cloud Desktop Platform for Modern Work')
@section('meta-description', 'Learn about Pocket Office, the browser-based cloud desktop workspace designed to help teams securely access files, apps and collaboration tools from anywhere.')
@section('meta-keywords', 'about pocket office, cloud desktop platform, browser workspace, remote collaboration, secure cloud workspace')
@section('meta-image', 'https://pocketdesk.sizaf.com/assets/img/hero-images/about-us-hero.svg')
@section('canonical', 'https://pocketdesk.sizaf.com/about')
@section('meta-url', 'https://pocketdesk.sizaf.com/about')
@section('structured-data')
@verbatim
{
  "@context": "https://schema.org",
  "@type": "AboutPage",
  "name": "About Pocket Office",
  "url": "https://pocketdesk.sizaf.com/about",
  "description": "Learn about Pocket Office, the browser-based cloud desktop workspace designed to help teams securely access files, apps and collaboration tools from anywhere.",
  "inLanguage": "en",
  "image": "https://pocketdesk.sizaf.com/assets/img/hero-images/about-us-hero.svg",

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

<div
  class="breadcrumb-area"
  style="background-image: url('{{ asset($constants['IMAGEFILEPATH'] . 'hero-images/about-us-hero.svg') }}')">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="breadcrumb-inner">
          <h1 class="page-title">Advancing Your Workspace Experience</h1>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- breadcrumb area End -->

<section class="about-section">
  <div class="about-container">
    <!-- Section 1 -->
    <div class="about-row">
      <div class="about-image">
        <video autoplay muted loop playsinline preload="auto">
          <source
            src="{{ asset($constants['IMAGEFILEPATH'] . 'animated-videos/about/our-vision.mp4') }}"
            type="video/mp4" />
        </video>
      </div>

      <div class="about-content">
        <h2 class="about-main-title">Our Vision</h2>
        <h3 class="about-subtitle">
          To design a simpler, more connected way of working.
        </h3>
        <p>
          Pocketoffice reimagines work in a cloud-first world. Work
          shouldn’t be tied to a single device, location, or system—your
          workspace should move with you, securely and effortlessly.
        </p>
        <p>
          We aim to create a cloud desktop OS that unifies files, apps,
          collaboration, and security into one intuitive experience
          accessible from anywhere.
        </p>
      </div>
    </div>

    <!-- Section 2 (Reverse) -->
    <div class="about-row reverse">
      <div class="about-image">
        <video autoplay muted loop playsinline preload="auto">
          <source
            src="{{ asset($constants['IMAGEFILEPATH'] . 'animated-videos/about/our-misson.mp4') }}"
            type="video/mp4" />
        </video>
      </div>

      <div class="about-content">
        <h2 class="about-main-title">Our Mission</h2>
        <h3 class="about-subtitle">
          Build a cloud workspace that works for everyone.
        </h3>
        <p>
          Pocketoffice reduces friction, eliminates complexity, and empowers
          people to control how and where they work.
        </p>
        <p>
          From individuals to global teams, our mission is to make digital
          workspaces simpler, safer, and more human.
        </p>
      </div>
    </div>

    <!-- Section 3 -->
    <div class="about-row">
      <div class="about-image">
        <video autoplay muted loop playsinline preload="auto">
          <source
            src="{{ asset($constants['IMAGEFILEPATH'] . 'animated-videos/about/our-story.mp4') }}"
            type="video/mp4" />
        </video>
      </div>

      <div class="about-content">
        <h2 class="about-main-title">Our Story</h2>
        <h3 class="about-subtitle">
          A story of innovation, passion, and a commitment to making work
          better.
        </h3>
        <p>
          What began as a need to simplify file access and remote work
          evolved into a bigger idea: work should adapt to people—not the
          other way around.
        </p>
        <p>
          As teams became distributed, they struggled with juggling tools,
          managing access manually, and compromising on security or
          flexibility. Pocketoffice brings the familiarity of a desktop OS
          into the cloud, so teams can work anywhere without losing control
          or clarity.
        </p>
      </div>
    </div>
  </div>
</section>

<section class="security-section">
  <div class="security-wrapper">
    <!-- Main Header -->
    <h2 class="security-heading">Our Values</h2>

    <p class="security-subheading">
      The principles that guide how we build, innovate, and serve modern
      teams — shaping every experience within PocketOffice.
    </p>

    <div class="security-grid">
      <!-- 1 -->
      <div class="security-card">
        <div class="security-icon">✨</div>
        <h3 class="security-title">Simplicity by Design</h3>
        <p class="security-text">
          Powerful software should feel simple. Every feature is
          thoughtfully crafted to reduce complexity and help teams focus on
          what truly matters.
        </p>
      </div>

      <!-- 2 -->
      <div class="security-card">
        <div class="security-icon">🔐</div>
        <h3 class="security-title">Privacy & Ownership First</h3>
        <p class="security-text">
          Your data belongs to you — always. PocketOffice is built with
          transparency, control, and respect for user ownership at its core.
        </p>
      </div>

      <!-- 3 -->
      <div class="security-card">
        <div class="security-icon">🌍</div>
        <h3 class="security-title">Work Without Boundaries</h3>
        <p class="security-text">
          Flexibility, mobility, and continuity empower teams to collaborate
          seamlessly — wherever work takes them.
        </p>
      </div>

      <!-- 4 -->
      <div class="security-card">
        <div class="security-icon">🛡️</div>
        <h3 class="security-title">Security Without Friction</h3>
        <p class="security-text">
          Strong protections operate quietly in the background, ensuring
          safety without interrupting productivity or workflow.
        </p>
      </div>

      <!-- 5 -->
      <div class="security-card">
        <div class="security-icon">📈</div>
        <h3 class="security-title">Built for the Long Term</h3>
        <p class="security-text">
          Reliable, scalable systems designed to grow alongside our users —
          prioritizing stability and sustainability over short-term trends.
        </p>
      </div>

      <!-- 6 -->
      <div class="security-card">
        <div class="security-icon">🤝</div>
        <h3 class="security-title">Partnership & Trust</h3>
        <p class="security-text">
          We build lasting relationships through integrity, accountability,
          and a commitment to supporting the success of every team we serve.
        </p>
      </div>
    </div>
  </div>
</section>
@endsection