  @extends('layouts.backendsettings')
  @section('title', 'Secure Cloud Desktop Platform | Data Privacy & Backup Solutions | Pocket
  Office')
  @section('meta-title', 'Secure Cloud Desktop Platform | Data Privacy & Backup Solutions | Pocket Office')
  @section('meta-description', 'Learn about Pocket Office security features including data privacy, backup solutions, and secure infrastructure for your cloud desktop workspace.')
  @section('meta-keywords', 'secure cloud desktop, data privacy, backup solutions, secure infrastructure, cloud security')
  @section('meta-image', 'https://pocket-office.ai/assets/img/hero-images/security.svg')
  @section('canonical', 'https://pocket-office.ai/security')
  @section('meta-url', 'https://pocket-office.ai/security')
  @section('structured-data')
  @verbatim
  {
    "@context": "https://schema.org",
    "@type": "WebPage",
    "name": "Security | Pocket Office",
    "url": "https://pocket-office.ai/security",
    "description": "Learn about Pocket Office security features including data privacy, backup solutions, and secure infrastructure for your cloud desktop workspace.",
    "inLanguage": "en",
    "image": "https://pocket-office.ai/assets/img/hero-images/security.svg",
    "publisher": {
      "@type": "Organization",
      "name": "Pocket Office",
      "url": "https://pocket-office.ai/",
      "logo": {
        "@type": "ImageObject",
        "url": "https://pocket-office.ai/assets/img/logo/pocket-office-tm-final-logo.png"
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
                          Role-based access
                      </button>
                      <button class="collaboration-tab" data-tab="workspace">
                          Backup & Recovery
                      </button>
                      <button class="collaboration-tab" data-tab="permissions">
                          Secure Data Protection
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
                                      Secure Access from Trusted Devices
                                  </h3>
                                  <p>
                                      Decide which devices can access your cloud desktop. Pocketoffice allows only approved computers, laptops, tablets, or mobile devices to sign in, giving you complete control over workspace security. 
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
                                      Trusted Network Access
                                  </h3>
                                  <p>
                                      Allow users to sign in only from approved office networks or selected locations, giving you greater control over who can access your cloud workspace. 
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
                                      Smart Security for Every Workspace
                                  </h3>
                                  <p>
                                      Protect your cloud desktop with flexible access controls, including user permissions, trusted devices, and approved locations—giving your team secure access without slowing down their work. 
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
                                  <h3>Backup Without the Effort</h3>
                                  <p>
                                     Your files and cloud workspace are backed up Pocketoffice automatically, protecting your data from accidental loss and ensuring you can continue working with confidence. 
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
                                     Recover Quickly. Keep Working
                                  </h3>
                                  <p>
                                      If unexpected issues occur, quickly restore your cloud workspace, files, and applications to minimize downtime and help your team get back to work without delay. 
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
                                      Admin Recovery Controls
                                  </h3>
                                  <p>
                                     Give administrators full control over restoring files and workspaces, ensuring secure, reliable recovery while meeting your organization's policies and business needs. 
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
                                     Your Data. Your Ownership
                                  </h3>
                                  <p>
                                     Pocketoffice provides a secure cloud workspace while you retain full ownership and control of your files, documents, and business data. Your information is always yours—never ours.
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
                                     Your Data. Your Storage. Your Choice
                                  </h3>
                                  <p>
                                     Choose where your business data is stored and managed. Pocketoffice gives you the flexibility to use the storage that best meets your organization's security, privacy, and compliance requirements.
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
                                      Keep Control of Your Data
                                  </h3>
                                  <p>
                                      Your data remains portable and under your control. Manage, migrate, or integrate your storage whenever you need Pocketoffice giving your organization the flexibility to grow without limitations
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