  @extends('layouts.backendsettings')
  @section('title', 'Cloud Integrations for S3, OSS, COS, FTP & WebDAV | Pocket Office')
  @section('meta-title', 'Cloud Integrations for S3, OSS, COS, FTP & WebDAV | Pocket Office')
  @section('meta-description', 'Discover Pocket Office integrations with Alibaba OSS, Tencent COS, Amazon S3, FTP, WebDAV, and more to unify your cloud storage and enterprise tools.')
  @section('meta-keywords', 'cloud integrations, S3 integration, OSS integration, COS integration, FTP integration, WebDAV integration, enterprise storage')
  @section('meta-image', 'https://pocketdesk.sizaf.com/assets/img/hero-images/integrations.svg')
  @section('canonical', 'https://pocketdesk.sizaf.com/integrations')
  @section('meta-url', 'https://pocketdesk.sizaf.com/integrations')
  @section('structured-data')
  @verbatim
    {
        "@context": "https://schema.org",
        "@type": "WebPage",
        "name": "Integrations | Pocket Office",
        "url": "https://pocketdesk.sizaf.com/integrations",
        "description": "Discover Pocket Office integrations with Alibaba OSS, Tencent COS, Amazon S3, FTP, WebDAV, and more to unify your cloud storage and enterprise tools.",
        "publisher": {
        "@type": "Organization",
        "name": "Pocket Office",
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
      style="background-image: url(assets/img/hero-images/integrations.svg)">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <div class="breadcrumb-inner">
                      <h1 class="page-title">Built for Effortless Integrations</h1>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- breadcrumb area End -->

  <section class="integration-section">
      <div class="integration-wrapper">
          <!-- MAIN HEADER -->
          <div class="integration-header">
              <h1 class="integration-main-heading">Integrations</h1>
              <p class="integration-main-subheading">
                  Connect your workspace with enterprise tools and cloud services.
              </p>
          </div>

          <div class="integration-body">
              <!-- SIDEBAR TABS -->
              <aside class="integration-sidebar">
                  <button class="integration-tab active" data-tab="alibaba">
                      <div class="integration-left">
                          <img
                              src="/assets/img/integration-icons/alibaba.svg"
                              alt="alibaba-cloud-logo"
                              width="20"
                              height="20"
                              class="integration-sidebar-icon"
                              loading="lazy" />
                          Alibaba OSS
                      </div>
                      <i class="fa fa-angle-right integration-arrow"></i>
                  </button>

                  <button class="integration-tab" data-tab="tencent-ios">
                      <div class="integration-left">
                          <img
                              src="/assets/img/integration-icons/tencent.svg"
                              alt="tencent-logo"
                              width="20"
                              height="20"
                              class="integration-sidebar-icon"
                              loading="lazy" />
                          Tencent COS
                      </div>
                      <i class="fa fa-angle-right integration-arrow"></i>
                  </button>

                  <button class="integration-tab" data-tab="qiniucloud">
                      <div class="integration-left">
                          <img
                              src="/assets/img/integration-icons/qiniucloud.svg"
                              alt="qiniu-cloud-logo"
                              width="20"
                              height="20"
                              class="integration-sidebar-icon"
                              loading="lazy" />
                          Qiniu Cloud
                      </div>
                      <i class="fa fa-angle-right integration-arrow"></i>
                  </button>

                  <button class="integration-tab" data-tab="amazon-s3">
                      <div class="integration-left">
                          <img
                              src="/assets/img/integration-icons/amazon-s3.svg"
                              alt="Amazon S3 Logo"
                              width="20"
                              height="20"
                              class="integration-sidebar-icon"
                              loading="lazy" />
                          Amazon S3
                      </div>
                      <i class="fa fa-angle-right integration-arrow"></i>
                  </button>

                  <button class="integration-tab" data-tab="tianyi-cloud">
                      <div class="integration-left">
                          <img
                              src="/assets/img/integration-icons/tianyicloud.svg"
                              alt="Tianyi cloud logo"
                              width="20"
                              height="20"
                              class="integration-sidebar-icon"
                              loading="lazy" />
                          Tianyi Cloud
                      </div>
                      <i class="fa fa-angle-right integration-arrow"></i>
                  </button>

                  <button class="integration-tab" data-tab="sds">
                      <div class="integration-left">
                          <img
                              src="/assets/img/integration-icons/xsky.svg"
                              alt="Xsky Sds logo"
                              width="20"
                              height="20"
                              class="integration-sidebar-icon"
                              loading="lazy" />
                          XSKY SDS
                      </div>
                      <i class="fa fa-angle-right integration-arrow"></i>
                  </button>

                  <button class="integration-tab" data-tab="sangfor-eds">
                      <div class="integration-left">
                          <img
                              src="/assets/img/integration-icons/sangfor-eds.svg"
                              alt="Sangfor EDS logo"
                              width="20"
                              height="20"
                              class="integration-sidebar-icon"
                              loading="lazy" />
                          Sangfor EDS
                      </div>
                      <i class="fa fa-angle-right integration-arrow"></i>
                  </button>

                  <button class="integration-tab" data-tab="min-io">
                      <div class="integration-left">
                          <img
                              src="/assets/img/integration-icons/mini-io.svg"
                              alt="MiniIO Logo"
                              width="20"
                              height="20"
                              class="integration-sidebar-icon"
                              loading="lazy" />
                          MinIO
                      </div>
                      <i class="fa fa-angle-right integration-arrow"></i>
                  </button>

                  <button class="integration-tab" data-tab="ftp">
                      <div class="integration-left">
                          <img
                              src="/assets/img/integration-icons/ftp.svg"
                              alt="FTP"
                              width="20"
                              height="20"
                              class="integration-sidebar-icon"
                              loading="lazy" />
                          FTP
                      </div>
                      <i class="fa fa-angle-right integration-arrow"></i>
                  </button>

                  <button class="integration-tab" data-tab="web-dav">
                      <div class="integration-left">
                          <img
                              src="/assets/img/integration-icons/webdav.svg"
                              alt="WebDav"
                              width="20"
                              height="20"
                              class="integration-sidebar-icon"
                              loading="lazy" />
                          WebDAV
                      </div>
                      <i class="fa fa-angle-right integration-arrow"></i>
                  </button>

                  <button class="integration-tab" data-tab="one-drive">
                      <div class="integration-left">
                          <img
                              src="/assets/img/integration-icons/onedrive.svg"
                              alt="OneDrive"
                              width="20"
                              height="20"
                              class="integration-sidebar-icon"
                              loading="lazy" />
                          OneDrive
                      </div>
                      <i class="fa fa-angle-right integration-arrow"></i>
                  </button>

                  <button class="integration-tab" data-tab="google-drive">
                      <div class="integration-left">
                          <img
                              src="/assets/img/integration-icons/google-drive.svg"
                              alt="Google Drive"
                              width="20"
                              height="20"
                              class="integration-sidebar-icon"
                              loading="lazy" />
                          Google Drive
                      </div>
                      <i class="fa fa-angle-right integration-arrow"></i>
                  </button>
              </aside>

              <!-- CONTENT -->
              <div class="integration-content">
                  <!-- ALIBABA -->
                  <div class="integration-panel active" id="alibaba">
                      <h2 class="integration-heading">
                          <img
                              src="/assets/img/integration-icons/alibaba.svg"
                              alt="alibaba-cloud-logo"
                              width="40px"
                              height="40px"
                              class="integration-sidebar-icon"
                              loading="lazy" />
                          Alibaba OSS Integration
                      </h2>

                      <p class="integration-subheading">
                          Enterprise Cloud Storage, Directly Accessible.
                      </p>

                      <div class="integration-cards">
                          <!-- Card 1 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-cloud"></i>
                              </div>
                              <h3>
                                  OSS Bucket Access: Access and manage OSS files directly from
                                  your desktop.
                              </h3>

                              <p>
                                  Alibaba OSS buckets connect seamlessly to PocketOffice for
                                  fast, organized access.
                              </p>
                          </div>

                          <!-- Card 2 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-shield"></i>
                              </div>
                              <h3>Secure Access : Permissions stay intact.</h3>
                              <p>
                                  OSS access policies are fully enforced within PocketOffice,
                                  ensuring secure data access without bypassing enterprise
                                  security controls.
                              </p>
                          </div>

                          <!-- Card 3 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-refresh"></i>
                              </div>
                              <h3>
                                  Real-Time Synchronization: Stay updated without manual
                                  syncing.
                              </h3>
                              <p>
                                  File changes within Alibaba OSS are reflected instantly in
                                  PocketOffice, maintaining accurate and up-to-date file
                                  states across your workspace.
                              </p>
                          </div>

                          <!-- Card 4 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-database"></i>
                              </div>
                              <h3>
                                  Scalable Storage Architecture: Built to support enterprise
                                  growth.
                              </h3>
                              <p>
                                  Leverage Alibaba’s scalable cloud infrastructure to manage
                                  large datasets, multi-user access, and expanding storage
                                  requirements efficiently.
                              </p>
                          </div>
                      </div>
                  </div>

                  <div class="integration-panel" id="tencent-ios">
                      <h2 class="integration-heading">
                          <img
                              src="/assets/img/integration-icons/tencent.svg"
                              alt="tencent-logo"
                              width="40px"
                              height="40px"
                              class="integration-sidebar-icon"
                              loading="lazy" />
                          Tencent COS Integration
                      </h2>

                      <p class="integration-subheading">
                          Fast, reliable cloud object syncing.
                      </p>

                      <div class="integration-cards">
                          <!-- Card 1 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-refresh"></i>
                              </div>
                              <h3>Real-Time COS Sync: Always up to date.</h3>
                              <p>
                                  Changes made through PocketOffice are reflected immediately
                                  in Tencent COS, ensuring synchronized file states across
                                  environments.
                              </p>
                          </div>

                          <!-- Card 2 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-building"></i>
                              </div>
                              <h3>
                                  Enterprise-Friendly Architecture: Designed for large-scale
                                  cloud workloads.
                              </h3>
                              <p>
                                  Perfect for teams operating within Tencent Cloud ecosystems,
                                  supporting structured storage, scalability, and performance
                                  at scale.
                              </p>
                          </div>

                          <!-- Card 3 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-folder-open"></i>
                              </div>
                              <h3>
                                  Desktop-Level Object Access: Work with COS like a file
                                  system.
                              </h3>
                              <p>
                                  Browse, organize, and manage Tencent COS objects through a
                                  familiar desktop-style interface without switching
                                  platforms.
                              </p>
                          </div>

                          <!-- Card 4 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-shield"></i>
                              </div>
                              <h3>
                                  Policy-Based Security Enforcement: Maintain cloud-level
                                  protection.
                              </h3>
                              <p>
                                  Tencent COS permission rules and identity policies remain
                                  fully enforced within PocketOffice, ensuring secure and
                                  compliant access.
                              </p>
                          </div>
                      </div>
                  </div>

                  <div class="integration-panel" id="qiniucloud">
                      <h2 class="integration-heading">
                          <img
                              src="/assets/img/integration-icons/qiniucloud.svg"
                              alt="qiniu-cloud-logo"
                              width="40px"
                              height="40px"
                              class="integration-sidebar-icon"
                              loading="lazy" />
                          Qiniu Cloud Integration
                      </h2>

                      <p class="integration-subheading">
                          Object storage made human-friendly.
                      </p>

                      <div class="integration-cards">
                          <!-- Card 1 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-folder-open"></i>
                              </div>
                              <h3>Desktop-Style Access: Browse objects just like files.</h3>
                              <p>
                                  PocketOffice converts Qiniu object storage into a familiar
                                  file-system view, making cloud objects behave like standard
                                  files.
                              </p>
                          </div>

                          <!-- Card 2 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-check-circle"></i>
                              </div>
                              <h3>
                                  No Workflow Changes: Continue working the way you already
                                  do.
                              </h3>
                              <p>
                                  Teams can manage Qiniu storage without retraining,
                                  maintaining existing workflows and productivity habits.
                              </p>
                          </div>

                          <!-- Card 3 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-exchange"></i>
                              </div>
                              <h3>
                                  Seamless Object Operations: Upload, move, and organize
                                  effortlessly.
                              </h3>
                              <p>
                                  Perform common file operations such as uploading, renaming,
                                  and reorganizing objects directly from your desktop
                                  interface.
                              </p>
                          </div>

                          <!-- Card 4 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-lock"></i>
                              </div>
                              <h3>
                                  Secure Access Control: Maintain policy-level protection.
                              </h3>
                              <p>
                                  Qiniu access permissions and security rules remain fully
                                  enforced within PocketOffice to ensure compliant data
                                  handling.
                              </p>
                          </div>
                      </div>
                  </div>

                  <div class="integration-panel" id="amazon-s3">
                      <h2 class="integration-heading">
                          <img
                              src="/assets/img/integration-icons/amazon-s3.svg"
                              alt="Amazon S3 Logo"
                              width="40px"
                              height="40px"
                              class="integration-sidebar-icon"
                              loading="lazy" />
                          Amazon S3 Integration
                      </h2>

                      <p class="integration-subheading">
                          Work with S3 like a traditional file system.
                      </p>

                      <div class="integration-cards">
                          <!-- Card 1 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-folder"></i>
                              </div>
                              <h3>Bucket-to-Folder Mapping: Buckets appear as folders.</h3>
                              <p>
                                  Amazon S3 buckets are mapped directly into PocketOffice,
                                  allowing users to browse and manage objects visually through
                                  a structured desktop interface.
                              </p>
                          </div>

                          <!-- Card 2 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-map-marker"></i>
                              </div>
                              <h3>No Data Movement: Data stays exactly where it is.</h3>
                              <p>
                                  Files remain securely stored within Amazon S3 while
                                  PocketOffice provides a user-friendly interface for seamless
                                  access and management.
                              </p>
                          </div>

                          <!-- Card 3 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-shield"></i>
                              </div>
                              <h3>
                                  Enterprise-Grade Security: AWS policies remain enforced.
                              </h3>
                              <p>
                                  IAM permissions and S3 security rules are fully preserved,
                                  ensuring secure and compliant access across your
                                  organization.
                              </p>
                          </div>

                          <!-- Card 4 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-bolt"></i>
                              </div>
                              <h3>
                                  High-Performance Object Access: Optimized for speed and
                                  scale.
                              </h3>
                              <p>
                                  Designed to handle large datasets and high-volume
                                  operations, enabling fast object retrieval and efficient
                                  cloud workflows.
                              </p>
                          </div>
                      </div>
                  </div>

                  <div class="integration-panel" id="tianyi-cloud">
                      <h2 class="integration-heading">
                          <img
                              src="/assets/img/integration-icons/tianyicloud.svg"
                              alt="Tianyi cloud logo"
                              width="40px"
                              height="40px"
                              class="integration-sidebar-icon"
                              loading="lazy" />
                          Tianyi Cloud Integration
                      </h2>

                      <p class="integration-subheading">
                          Enterprise cloud storage built for secure and scalable
                          operations.
                      </p>

                      <div class="integration-cards">
                          <!-- Card 1 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-folder-open"></i>
                              </div>
                              <h3>
                                  Object-to-File Mapping: Cloud storage behaves like local
                                  files.
                              </h3>
                              <p>
                                  Tianyi Cloud object storage is presented in a structured
                                  file-system view, allowing intuitive browsing and management
                                  directly within PocketOffice.
                              </p>
                          </div>

                          <!-- Card 2 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-server"></i>
                              </div>
                              <h3>
                                  Local Access Without Migration: No data relocation required.
                              </h3>
                              <p>
                                  Files remain securely stored within Tianyi Cloud
                                  infrastructure while PocketOffice provides a streamlined
                                  access interface.
                              </p>
                          </div>

                          <!-- Card 3 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-shield"></i>
                              </div>
                              <h3>Policy-Aware Security: Access rules remain enforced.</h3>
                              <p>
                                  Tianyi Cloud permissions and security policies are fully
                                  preserved, ensuring controlled and compliant access across
                                  teams.
                              </p>
                          </div>

                          <!-- Card 4 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-sitemap"></i>
                              </div>
                              <h3>
                                  Telecom-Grade Reliability: Built for high availability.
                              </h3>
                              <p>
                                  Designed to operate within China Telecom’s enterprise
                                  ecosystem, delivering stable performance and scalable cloud
                                  operations.
                              </p>
                          </div>
                      </div>
                  </div>

                  <div class="integration-panel" id="sds">
                      <h2 class="integration-heading">
                          <img
                              src="/assets/img/integration-icons/xsky.svg"
                              alt="Xsky Sds logo"
                              width="40px"
                              height="40px"
                              class="integration-sidebar-icon"
                              loading="lazy" />
                          XSKY SDS Integration
                      </h2>

                      <p class="integration-subheading">
                          On-Premises Storage, Modernized for Cloud Work
                      </p>

                      <div class="integration-cards">
                          <!-- Card 1 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-exchange"></i>
                              </div>
                              <h3>
                                  Hybrid Cloud Access: Local storage meets cloud usability.
                              </h3>
                              <p>
                                  PocketOffice connects XSKY SDS on-premises storage systems
                                  to a browser-based cloud desktop, allowing teams to access
                                  and work with local data remotely and securely.
                              </p>
                          </div>

                          <!-- Card 2 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-database"></i>
                              </div>
                              <h3>
                                  No Data Migration Required: Your data stays on-premises.
                              </h3>
                              <p>
                                  Files remain within the XSKY SDS infrastructure.
                                  PocketOffice enables access without copying or moving data
                                  to external cloud platforms.
                              </p>
                          </div>

                          <!-- Card 3 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-shield"></i>
                              </div>
                              <h3>
                                  Enterprise Security Preserved: Control remains within your
                                  environment.
                              </h3>
                              <p>
                                  Existing security policies, access controls, and compliance
                                  requirements continue to apply when accessing data through
                                  PocketOffice.
                              </p>
                          </div>

                          <!-- Card 4 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-sitemap"></i>
                              </div>
                              <h3>
                                  Centralized Infrastructure Visibility: Unified management
                                  across systems.
                              </h3>
                              <p>
                                  Monitor and manage distributed storage resources from a
                                  single interface, simplifying operations across hybrid and
                                  on-premises environments.
                              </p>
                          </div>
                      </div>
                  </div>

                  <div class="integration-panel" id="sangfor-eds">
                      <h2 class="integration-heading">
                          <img
                              src="/assets/img/integration-icons/sangfor-eds.svg"
                              alt="Sangfor EDS logo"
                              width="40px"
                              height="40px"
                              class="integration-sidebar-icon"
                              loading="lazy" />
                          Sangfor EDS Integration
                      </h2>

                      <p class="integration-subheading">
                          Enterprise File Systems, Simplified for Everyday Work
                      </p>

                      <div class="integration-cards">
                          <!-- Card 1 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-folder-open"></i>
                              </div>
                              <h3>
                                  Unified File Management: Manage enterprise files from one
                                  workspace.
                              </h3>
                              <p>
                                  PocketOffice integrates Sangfor EDS into the cloud desktop,
                                  providing teams with a structured, centralized workspace to
                                  access and manage enterprise files efficiently.
                              </p>
                          </div>

                          <!-- Card 2 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-users"></i>
                              </div>
                              <h3>
                                  Collaboration Without Chaos: Secure collaboration across
                                  teams.
                              </h3>
                              <p>
                                  Teams can collaborate on files stored in Sangfor EDS while
                                  preserving permissions, version control, and complete access
                                  visibility.
                              </p>
                          </div>

                          <!-- Card 3 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-shield"></i>
                              </div>
                              <h3>
                                  Policy-Driven Access: Enterprise governance stays intact.
                              </h3>
                              <p>
                                  PocketOffice enforces existing Sangfor EDS permissions and
                                  policies, ensuring users can access only what they are
                                  authorized to see.
                              </p>
                          </div>

                          <!-- Card 4 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-history"></i>
                              </div>
                              <h3>
                                  Version & Activity Control: Full visibility over file
                                  changes.
                              </h3>
                              <p>
                                  Track file activity, maintain version history, and monitor
                                  document updates to ensure transparency and accountability
                                  across enterprise teams.
                              </p>
                          </div>
                      </div>
                  </div>

                  <div class="integration-panel" id="min-io">
                      <h2 class="integration-heading">
                          <img
                              src="/assets/img/integration-icons/mini-io.svg"
                              alt="MiniIO Logo"
                              width="40px"
                              height="40px"
                              class="integration-sidebar-icon"
                              loading="lazy" />
                          MinIO Integration
                      </h2>

                      <p class="integration-subheading">
                          Private Object Storage, Fully Supported
                      </p>

                      <div class="integration-cards">
                          <!-- Card 1 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-plug"></i>
                              </div>
                              <h3>S3-Compatible Integration: Works like Amazon S3.</h3>
                              <p>
                                  PocketOffice connects to MinIO using S3-compatible APIs,
                                  providing seamless access to private object storage without
                                  vendor lock-in.
                              </p>
                          </div>

                          <!-- Card 2 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-cloud"></i>
                              </div>
                              <h3>Ideal for Private Clouds: Control without compromise.</h3>
                              <p>
                                  Designed for enterprises running private or hybrid cloud
                                  environments where full control over data and infrastructure
                                  is essential.
                              </p>
                          </div>

                          <!-- Card 3 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-database"></i>
                              </div>
                              <h3>High-Performance Object Storage: Optimized for scale.</h3>
                              <p>
                                  Built to handle large datasets and high-throughput
                                  workloads, enabling fast object retrieval and reliable
                                  storage performance.
                              </p>
                          </div>

                          <!-- Card 4 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-lock"></i>
                              </div>
                              <h3>
                                  Enterprise Security Control: Governance remains in your
                                  hands.
                              </h3>
                              <p>
                                  Access policies, encryption settings, and identity controls
                                  remain fully enforced within your MinIO infrastructure.
                              </p>
                          </div>
                      </div>
                  </div>

                  <div class="integration-panel" id="ftp">
                      <h2 class="integration-heading">
                          <img
                              src="/assets/img/integration-icons/ftp.svg"
                              alt="FTP"
                              class="integration-sidebar-icon"
                              width="40px"
                              height="40px"
                              loading="lazy" />
                          FTP Integration
                      </h2>

                      <p class="integration-subheading">
                          Modern access for legacy systems.
                      </p>

                      <div class="integration-cards">
                          <!-- Card 1 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-exchange"></i>
                              </div>
                              <h3>FTP Connectivity: Access old systems in a new way.</h3>
                              <p>
                                  PocketOffice connects directly to FTP servers, allowing
                                  legacy environments to integrate into modern browser-based
                                  workflows.
                              </p>
                          </div>

                          <!-- Card 2 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-shield"></i>
                              </div>
                              <h3>Safer File Handling: Reduce risk from outdated tools.</h3>
                              <p>
                                  Replace standalone FTP clients with centralized access
                                  controls, session monitoring, and structured file handling.
                              </p>
                          </div>

                          <!-- Card 3 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-clock-o"></i>
                              </div>
                              <h3>
                                  Automated Transfers: Schedule and streamline workflows.
                              </h3>
                              <p>
                                  Configure recurring uploads and downloads to minimize manual
                                  intervention and improve operational efficiency.
                              </p>
                          </div>

                          <!-- Card 4 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-line-chart"></i>
                              </div>
                              <h3>Activity Monitoring: Track file movement and access.</h3>
                              <p>
                                  Gain visibility into file transfers and user actions,
                                  helping teams maintain accountability and compliance.
                              </p>
                          </div>
                      </div>
                  </div>

                  <div class="integration-panel" id="web-dav">
                      <h2 class="integration-heading">
                          <img
                              src="/assets/img/integration-icons/webdav.svg"
                              alt="WebDav"
                              width="40px"
                              height="40px"
                              class="integration-sidebar-icon"
                              loading="lazy" />
                          WebDAV Integration
                      </h2>

                      <p class="integration-subheading">One protocol. Many systems.</p>

                      <div class="integration-cards">
                          <!-- Card 1 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-plug"></i>
                              </div>
                              <h3>
                                  Broad Compatibility: Works with WebDAV-enabled platforms.
                              </h3>
                              <p>
                                  PocketOffice connects to any WebDAV server, enabling
                                  standardized access to distributed storage systems across
                                  environments.
                              </p>
                          </div>

                          <!-- Card 2 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-desktop"></i>
                              </div>
                              <h3>Unified Workspace: All files, one desktop.</h3>
                              <p>
                                  WebDAV storage appears alongside other connected drives
                                  within the PocketOffice cloud desktop for seamless
                                  navigation.
                              </p>
                          </div>

                          <!-- Card 3 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-random"></i>
                              </div>
                              <h3>
                                  Flexible Deployment: Connect across diverse environments.
                              </h3>
                              <p>
                                  Integrate WebDAV storage from private servers, enterprise
                                  systems, or third-party services without infrastructure
                                  changes.
                              </p>
                          </div>

                          <!-- Card 4 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-refresh"></i>
                              </div>
                              <h3>
                                  Consistent Access Experience: Same workflow everywhere.
                              </h3>
                              <p>
                                  Maintain familiar navigation and file interaction patterns,
                                  regardless of where WebDAV storage is hosted.
                              </p>
                          </div>
                      </div>
                  </div>

                  <div class="integration-panel" id="one-drive">
                      <h2 class="integration-heading">
                          <img
                              src="/assets/img/integration-icons/onedrive.svg"
                              alt="OneDrive"
                              width="40px"
                              height="40px"
                              class="integration-sidebar-icon"
                              loading="lazy" />
                          OneDrive Integration
                      </h2>

                      <p class="integration-subheading">
                          Access that mirrors Microsoft’s security model.
                      </p>

                      <div class="integration-cards">
                          <!-- Card 1 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-eye"></i>
                              </div>
                              <h3>
                                  Native Permission Enforcement: What you see is what you’re
                                  allowed to see.
                              </h3>
                              <p>
                                  PocketOffice enforces OneDrive’s existing permissions,
                                  including view-only and edit access, without modification or
                                  overrides.
                              </p>
                          </div>

                          <!-- Card 2 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-share-alt"></i>
                              </div>
                              <h3>Safe Collaboration: Share without oversharing.</h3>
                              <p>
                                  Files shared via OneDrive remain protected inside
                                  PocketOffice, preventing accidental access escalation across
                                  teams.
                              </p>
                          </div>

                          <!-- Card 3 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-building"></i>
                              </div>
                              <h3>Enterprise-Ready: Built for compliance-focused teams.</h3>
                              <p>
                                  Permission handling aligns with Microsoft-based workflows,
                                  supporting structured governance and enterprise standards.
                              </p>
                          </div>

                          <!-- Card 4 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-desktop"></i>
                              </div>
                              <h3>
                                  Seamless Desktop Experience: Access OneDrive like a local
                                  drive.
                              </h3>
                              <p>
                                  Browse, organize, and work with OneDrive files directly
                                  within the PocketOffice desktop interface—without switching
                                  platforms.
                              </p>
                          </div>
                      </div>
                  </div>

                  <div class="integration-panel" id="google-drive">
                      <h2 class="integration-heading">
                          <img
                              src="/assets/img/integration-icons/google-drive.svg"
                              alt="Google Drive"
                              width="40px"
                              height="40px"
                              class="integration-sidebar-icon"
                              loading="lazy" />
                          Google Drive Integration
                      </h2>

                      <p class="integration-subheading">
                          Work with Google Drive files as if they live on your desktop.
                      </p>

                      <div class="integration-cards">
                          <!-- Card 1 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-refresh"></i>
                              </div>
                              <h3>
                                  Bi-Directional Sync: Changes update
                                  everywhere—automatically.
                              </h3>
                              <p>
                                  PocketOffice syncs Google Drive files in real time. Any
                                  edit, rename, or move made inside the PocketOffice desktop
                                  is reflected instantly in Google Drive—and vice versa.
                              </p>
                          </div>

                          <!-- Card 2 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-folder-open"></i>
                              </div>
                              <h3>
                                  Folder Structure Preserved: No reorganization required.
                              </h3>
                              <p>
                                  Your existing Google Drive folder hierarchy remains
                                  unchanged, allowing teams to continue working without
                                  retraining or migration.
                              </p>
                          </div>

                          <!-- Card 3 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-shield"></i>
                              </div>
                              <h3>Secure by Design: Access follows Google permissions.</h3>
                              <p>
                                  PocketOffice respects Google Drive access controls, ensuring
                                  users only see and interact with files they are authorized
                                  to access.
                              </p>
                          </div>

                          <!-- Card 4 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-users"></i>
                              </div>
                              <h3>
                                  Collaboration-Ready Workspace: Work together without
                                  switching tools.
                              </h3>
                              <p>
                                  Access shared drives and team folders directly within
                                  PocketOffice, reducing context switching while keeping
                                  collaboration seamless.
                              </p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  @endsection