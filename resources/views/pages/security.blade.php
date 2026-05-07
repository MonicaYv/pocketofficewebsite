  @extends('layouts.backendsettings')
  @section('title', 'Secure Cloud Desktop Platform | Data Privacy & Backup Solutions | Pocket
  Office')
  @section('meta-title', 'Secure Cloud Desktop Platform | Data Privacy & Backup Solutions | Pocket Office')
  @section('meta-description', 'Learn about Pocket Office security features including data privacy, backup solutions, and secure infrastructure for your cloud desktop workspace.')
  @section('meta-keywords', 'secure cloud desktop, data privacy, backup solutions, secure infrastructure, cloud security')
  @section('meta-image', 'https://pocketdesk.sizaf.com/assets/img/hero-images/security.svg')
  @section('canonical', 'https://pocketdesk.sizaf.com/security')
  @section('meta-url', 'https://pocketdesk.sizaf.com/security')
  @section('structured-data')
  @verbatim
  {
    "@context": "https://schema.org",
    "@type": "WebPage",
    "name": "Security | Pocket Office",
    "url": "https://pocketdesk.sizaf.com/security",
    "description": "Learn about Pocket Office security features including data privacy, backup solutions, and secure infrastructure for your cloud desktop workspace.",
    "inLanguage": "en",
    "image": "https://pocketdesk.sizaf.com/assets/img/hero-images/security.svg",
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
  <div
      class="breadcrumb-area"
      style="background-image: url(assets/img/hero-images/security.svg)">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <div class="breadcrumb-inner">
                      <h1 class="page-title">Secure Product Infrastructure</h1>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- breadcrumb area End -->

  <section class="collaboration-section">
      <div class="security-features-wrapper">
          <div class="collaboration-wrapper">
              <!-- Main Heading -->
              <h2 class="collaboration-main-heading">Security</h2>

              <p class="collaboration-main-subtext">
                  Advanced security features designed to protect your data, safeguard
                  access, and ensure complete control across your workspace.
              </p>

              <!-- Tabs -->
              <div class="collaboration-tabs-wrapper">
                  <div class="collaboration-tabs">
                      <button class="collaboration-tab active" data-tab="realtime">
                          Role-based Access
                      </button>
                      <button class="collaboration-tab" data-tab="workspace">
                          Backup & Recovery
                      </button>
                      <button class="collaboration-tab" data-tab="permissions">
                          Data Privacy Compliance
                      </button>
                  </div>
              </div>

              <!-- Tab Content -->
              <div class="collaboration-content-wrapper">
                  <!-- REAL TIME SHARING -->
                  <div class="collaboration-panel active" data-panel="realtime">
                      <div class="core-features-grid">
                          <!-- Card 1 -->
                          <div class="core-features-card">
                              <div class="core-features-card-img">
                                  <img
                                      src="/assets/img/security/device-based-access.svg"
                                      alt="PocketOffice device-based access security feature for desktop and laptop"
                                      title="Device-Based Access Control - PocketOffice"
                                      loading="lazy"
                                      width="600"
                                      height="400" />
                              </div>

                              <div class="core-features-card-content">
                                  <h3>
                                      Device-Based Access : Decide which devices can access your
                                      workspace.
                                  </h3>
                                  <p>
                                      Pocketoffice allows admins to restrict access based on
                                      device type, ensuring only trusted devices can log in to
                                      the cloud desktop.
                                  </p>
                              </div>
                          </div>

                          <!-- Card 2 -->
                          <div class="core-features-card">
                              <div class="core-features-card-img">
                                  <img
                                      src="/assets/img/security/ip-location-restrictions.svg"
                                      alt="PocketOffice IP location restricted access security feature"
                                      title="IP Location Restricted Access - PocketOffice Security"
                                      loading="lazy"
                                      width="600"
                                      height="400" />
                              </div>

                              <div class="core-features-card-content">
                                  <h3>
                                      IP & Location Restrictions: Limit access by network or
                                      geography.
                                  </h3>
                                  <p>
                                      Restrict login access using IP ranges or geographic rules
                                      to prevent unauthorized access from unapproved locations.
                                  </p>
                              </div>
                          </div>

                          <!-- Card 3 -->
                          <div class="core-features-card">
                              <div class="core-features-card-img">
                                  <img
                                      src="/assets/img/security/stronger-security-by-design.svg"
                                      alt="PocketOffice stronger security architecture and secure system design"
                                      title="Stronger Security Design - PocketOffice"
                                      loading="lazy"
                                      width="600"
                                      height="400" />
                              </div>

                              <div class="core-features-card-content">
                                  <h3>
                                      Stronger Security by Design: Security policies that adapt
                                      to your organization.
                                  </h3>
                                  <p>
                                      By combining role-based permissions with device and IP
                                      restrictions, Pocketoffice helps organizations enforce
                                      advanced security policies without slowing teams down.
                                  </p>
                              </div>
                          </div>
                      </div>
                  </div>

                  <!-- SHARED WORKSPACE -->
                  <div class="collaboration-panel" data-panel="workspace">
                      <div class="core-features-grid">
                          <!-- Card 1 -->
                          <div class="core-features-card">
                              <div class="core-features-card-img">
                                  <img
                                      src="/assets/img/security/automated-backups.svg"
                                      alt="PocketOffice automated cloud backups and secure data recovery feature"
                                      title="Automated Cloud Backups - PocketOffice Security"
                                      loading="lazy"
                                      width="600"
                                      height="400" />
                              </div>

                              <div class="core-features-card-content">
                                  <h3>Automated Backups: Your data is always protected.</h3>
                                  <p>
                                      Pocketoffice automatically backs up files and workspace
                                      data, reducing the risk of accidental loss or system
                                      failure.
                                  </p>
                              </div>
                          </div>

                          <!-- Card 2 -->
                          <div class="core-features-card">
                              <div class="core-features-card-img">
                                  <img
                                      src="/assets/img/security/disaster-recovery-readiness-.svg"
                                      alt="PocketOffice disaster recovery readiness and business continuity protection"
                                      title="Disaster Recovery Readiness - PocketOffice Security"
                                      loading="lazy"
                                      width="600"
                                      height="400" />
                              </div>

                              <div class="core-features-card-content">
                                  <h3>
                                      Disaster Recovery Readiness: Recover quickly. Resume work
                                      faster.
                                  </h3>
                                  <p>
                                      In the event of data loss or disruption, Pocketoffice
                                      enables fast recovery so teams can restore access and
                                      continue working with minimal downtime.
                                  </p>
                              </div>
                          </div>

                          <!-- Card 3 -->
                          <div class="core-features-card">
                              <div class="core-features-card-img">
                                  <img
                                      src="/assets/img/security/admin-controlled-restore.svg"
                                      alt="PocketOffice admin-controlled restore feature for secure data recovery and backup management"
                                      title="Admin-Controlled Restore - PocketOffice Security"
                                      loading="lazy"
                                      width="600"
                                      height="400" />
                              </div>

                              <div class="core-features-card-content">
                                  <h3>
                                      Admin-Controlled Restore: Recovery with full control.
                                  </h3>
                                  <p>
                                      Admins can manage restore actions, ensuring data recovery
                                      follows organizational policies and compliance
                                      requirements.
                                  </p>
                              </div>
                          </div>
                      </div>
                  </div>

                  <!-- TEAM PERMISSIONS -->
                  <div class="collaboration-panel" data-panel="permissions">
                      <div class="core-features-grid">
                          <!-- Card 1 -->
                          <div class="core-features-card">
                              <div class="core-features-card-img">
                                  <img
                                      src="/assets/img/security/full-ownership.svg"
                                      alt="PocketOffice full data ownership guaranteed with complete administrative control"
                                      title="Full Ownership Guaranteed - PocketOffice Security"
                                      loading="lazy"
                                      width="600"
                                      height="400" />
                              </div>

                              <div class="core-features-card-content">
                                  <h3>
                                      Full Ownership, Guaranteed : Pocketoffice never claims
                                      ownership of your data.
                                  </h3>
                                  <p>
                                      All files, documents, and information stored or accessed
                                      through Pocketoffice remain fully owned by you. We provide
                                      the workspace — you keep complete control over your data.
                                  </p>
                              </div>
                          </div>

                          <!-- Card 2 -->
                          <div class="core-features-card">
                              <div class="core-features-card-img">
                                  <img
                                      src="/assets/img/security/customer-controlled-storage.svg"
                                      alt="PocketOffice customer-controlled storage with secure data management and full ownership"
                                      title="Customer-Controlled Storage - PocketOffice Security"
                                      loading="lazy"
                                      width="600"
                                      height="400" />
                              </div>

                              <div class="core-features-card-content">
                                  <h3>
                                      Customer-Controlled Storage: You decide where your data
                                      lives.
                                  </h3>
                                  <p>
                                      Pocketoffice is designed so organizations retain authority
                                      over how and where data is stored, accessed, and
                                      managed—supporting internal policies and regulatory needs.
                                  </p>
                              </div>
                          </div>

                          <!-- Card 3 -->
                          <div class="core-features-card">
                              <div class="core-features-card-img">
                                  <img
                                      src="/assets/img/security/no-vendor-lock-in.svg"
                                      alt="PocketOffice no vendor lock-in policy with full data portability and customer control"
                                      title="No Vendor Lock-In - PocketOffice Security"
                                      loading="lazy"
                                      width="600"
                                      height="400" />
                              </div>

                              <div class="core-features-card-content">
                                  <h3>
                                      No Vendor Lock-In: Freedom to choose, freedom to move.
                                  </h3>
                                  <p>
                                      With Pocketoffice, your data is never locked into a
                                      proprietary system. You can manage, migrate, or integrate
                                      storage without restrictions or hidden dependencies.
                                  </p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <section class="security-section">
      <div class="security-wrapper">
          <!-- Main Header -->
          <h2 class="security-heading">
              Built-In Security That Protects Every Layer
          </h2>

          <p class="security-subheading">
              Advanced controls and protection mechanisms designed to safeguard
              data, enforce access policies, and maintain full visibility across
              your workspace.
          </p>

          <div class="security-grid">
              <!-- 1 -->
              <div class="security-card">
                  <div class="security-icon">🔒</div>
                  <h3 class="security-title">End-to-End Data Encryption</h3>
                  <p class="security-text">
                      Data is encrypted in transit and at rest using modern
                      cryptographic standards, ensuring confidentiality and integrity at
                      every stage.
                  </p>
              </div>

              <!-- 2 -->
              <div class="security-card">
                  <div class="security-icon">👤</div>
                  <h3 class="security-title">Advanced Administrative Controls</h3>
                  <p class="security-text">
                      Gain complete oversight with centralized user management, access
                      configuration, and activity supervision across your workspace.
                  </p>
              </div>

              <!-- 3 -->
              <div class="security-card">
                  <div class="security-icon">🛡️</div>
                  <h3 class="security-title">Role-Based Access Control</h3>
                  <p class="security-text">
                      Enforce structured permissions that define who can view, edit, or
                      share content — reducing risk and preventing unauthorized actions.
                  </p>
              </div>

              <!-- 4 -->
              <div class="security-card">
                  <div class="security-icon">🔑</div>
                  <h3 class="security-title">Secure Authentication & SSO</h3>
                  <p class="security-text">
                      Integrate with enterprise identity providers and enable
                      multi-factor authentication for an additional layer of account
                      protection.
                  </p>
              </div>

              <!-- 5 -->
              <div class="security-card">
                  <div class="security-icon">⚙️</div>
                  <h3 class="security-title">Infrastructure-Level Protection</h3>
                  <p class="security-text">
                      Continuous monitoring and hardened system architecture safeguard
                      your environment against evolving threats.
                  </p>
              </div>

              <!-- 6 -->
              <div class="security-card">
                  <div class="security-icon">📊</div>
                  <h3 class="security-title">Comprehensive Audit Logging</h3>
                  <p class="security-text">
                      Maintain full visibility with detailed logs that track activity,
                      support compliance requirements, and strengthen accountability.
                  </p>
              </div>
          </div>
      </div>
  </section>
  @endsection