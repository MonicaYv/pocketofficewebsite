  @extends('layouts.backendsettings')
  @section('title', 'Cloud Integrations for S3, OSS, COS, FTP & WebDAV | Pocket Office')
  @section('meta-title', 'Cloud Integrations for S3, OSS, COS, FTP & WebDAV | Pocket Office')
  @section('meta-description', 'Discover Pocket Office integrations with Alibaba OSS, Tencent COS, Amazon S3, FTP, WebDAV, and more to unify your cloud storage and enterprise tools.')
  @section('meta-keywords', 'cloud integrations, S3 integration, OSS integration, COS integration, FTP integration, WebDAV integration, enterprise storage')
  @section('meta-image', 'https://pocket-office.ai/assets/img/hero-images/integrations.svg')
  @section('canonical', 'https://pocket-office.ai/integrations')
  @section('meta-url', 'https://pocket-office.ai/integrations')
  @section('structured-data')
  @verbatim
    {
        "@context": "https://schema.org",
        "@type": "WebPage",
        "name": "Integrations | Pocket Office",
        "url": "https://pocket-office.ai/integrations",
        "description": "Discover Pocket Office integrations with Alibaba OSS, Tencent COS, Amazon S3, FTP, WebDAV, and more to unify your cloud storage and enterprise tools.",
        "publisher": {
        "@type": "Organization",
        "name": "Pocket Office",
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
                  
                  <button class="integration-tab active" data-tab="blackblaze">
                      <div class="integration-left">
                          <img
                              src="/assets/img/integration-icons/blackblaze.png"
                              alt="alibaba-cloud-logo"
                              width="20"
                              height="20"
                              class="integration-sidebar-icon"
                              loading="lazy" />
                          Blackblaze
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
                  <button class="integration-tab" data-tab="cloudFare-r2">
                      <div class="integration-left">
                          <img
                              src="/assets/img/integration-icons/cloudflare.png"
                              alt="qiniu-cloud-logo"
                              width="20"
                              height="20"
                              class="integration-sidebar-icon"
                              loading="lazy" />
                            CloudFare R2
                      </div>
                      <i class="fa fa-angle-right integration-arrow"></i>
                  </button>
                  <button class="integration-tab" data-tab="storj">
                      <div class="integration-left">
                          <img
                              src="/assets/img/integration-icons/storj.png"
                              alt="tencent-logo"
                              width="20"
                              height="20"
                              class="integration-sidebar-icon"
                              loading="lazy" />
                          Storj
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
                  <button class="integration-tab" data-tab="smll-io">
                      <div class="integration-left">
                          <img
                              src="/assets/img/integration-icons/smll.png"
                              alt="qiniu-cloud-logo"
                              width="20"
                              height="20"
                              class="integration-sidebar-icon"
                              loading="lazy" />
                          Smll.io
                      </div>
                      <i class="fa fa-angle-right integration-arrow"></i>
                  </button>
                  <button class="integration-tab" data-tab="dropbox">
                      <div class="integration-left">
                          <img
                              src="/assets/img/integration-icons/drop-box.png"
                              alt="qiniu-cloud-logo"
                              width="20"
                              height="20"
                              class="integration-sidebar-icon"
                              loading="lazy" />
                            Dropbox
                      </div>
                      <i class="fa fa-angle-right integration-arrow"></i>
                  </button>
                  <button class="integration-tab" data-tab="edge-network">
                      <div class="integration-left">
                          <img
                              src="/assets/img/integration-icons/qiniucloud.svg"
                              alt="qiniu-cloud-logo"
                              width="20"
                              height="20"
                              class="integration-sidebar-icon"
                              loading="lazy" />
                            Edge Network
                      </div>
                      <i class="fa fa-angle-right integration-arrow"></i>
                  </button>
                 
              </aside>

              <!-- CONTENT -->
              <div class="integration-content">
                  <!-- ALIBABA -->
                  <div class="integration-panel active" id="blackblaze">
                      <h2 class="integration-heading">
                          <img
                              src="/assets/img/integration-icons/blackblaze.png"
                              alt="alibaba-cloud-logo"
                              width="40px"
                              height="40px"
                              class="integration-sidebar-icon"
                              loading="lazy" />
                          Blackblaze
                      </h2>

                      <p class="integration-subheading">
                          Secure Cloud Storage
                      </p>

                      <div class="integration-cards">
                          <!-- Card 1 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-cloud"></i>
                              </div>
                              <h3>
                                  Store and access files with enterprise-grade reliability.
                              </h3>

                              <p>
                                  Backblaze B2 provides secure, durable cloud storage for documents, media, backups, and business data, ensuring fast and reliable access whenever you need it.
                              </p>
                          </div>

                          <!-- Card 2 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-shield"></i>
                              </div>
                              <h3>Connect your storage directly to PocketOffice.</h3>
                              <p>
                                  Easily link your Backblaze B2 buckets with PocketOffice to manage files, collaborate across teams, and access cloud-stored content without switching platforms.
                              </p>
                          </div>

                          <!-- Card 3 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-refresh"></i>
                              </div>
                              <h3>
                                  Keep files updated across your workspace.
                              </h3>
                              <p>
                                 Changes made in Backblaze B2 are reflected within PocketOffice, helping teams stay aligned with the latest file versions and reducing manual file management.
                              </p>
                          </div>

                          <!-- Card 4 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-database"></i>
                              </div>
                              <h3>
                                  Grow storage capacity without growing complexity.
                              </h3>
                              <p>
                                  Backblaze B2 offers scalable cloud storage that adapts to your business needs, allowing you to manage increasing volumes of data while maintaining predictable costs.
                              </p>
                          </div>
                      </div>
                  </div>

                  <div class="integration-panel" id="storj">
                      <h2 class="integration-heading">
                          <img
                              src="/assets/img/integration-icons/storj.png"
                              alt="tencent-logo"
                              width="40px"
                              height="40px"
                              class="integration-sidebar-icon"
                              loading="lazy" />
                          Storj Integration
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
                              <h3>Protect data with decentralized cloud architecture.</h3>
                              <p>
                                  Storj encrypts and distributes files across a global network, reducing single points of failure while enhancing privacy and security.
                              </p>
                          </div>

                          <!-- Card 2 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-building"></i>
                              </div>
                              <h3>
                                  Connect existing applications with minimal changes.
                              </h3>
                              <p>
                                  Storj provides S3-compatible object storage, allowing seamless integration with PocketOffice and existing storage workflows.
                              </p>
                          </div>

                          <!-- Card 3 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-folder-open"></i>
                              </div>
                              <h3>
                                  Access files quickly from anywhere.
                              </h3>
                              <p>
                                 Distributed storage nodes help deliver fast uploads and downloads while maintaining high availability and durability.
                              </p>
                          </div>

                          <!-- Card 4 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-shield"></i>
                              </div>
                              <h3>
                                 Built for reliable business operations.
                              </h3>
                              <p>
                                  Advanced encryption, redundancy, and distributed architecture ensure data remains accessible even during infrastructure disruptions.
                              </p>
                          </div>
                      </div>
                  </div>

                  <div class="integration-panel" id="smll-io">
                      <h2 class="integration-heading">
                          <img
                              src="/assets/img/integration-icons/smll.png"
                              alt="qiniu-cloud-logo"
                              width="40px"
                              height="40px"
                              class="integration-sidebar-icon"
                              loading="lazy" />
                          Smll.io Integration
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
                              <h3>Manage files across multiple storage providers.</h3>
                              <p>
                                  Connect and organize cloud-based content from a single workspace, simplifying file access and administration.
                              </p>
                          </div>

                          <!-- Card 2 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-check-circle"></i>
                              </div>
                              <h3>
                                  Access business data whenever you need it.
                              </h3>
                              <p>
                                  Enable teams to retrieve, share, and manage files efficiently without switching between platforms.
                              </p>
                          </div>

                          <!-- Card 3 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-exchange"></i>
                              </div>
                              <h3>
                                  Keep teams connected and productive.
                              </h3>
                              <p>
                                  Ensure documents and assets remain synchronized, helping teams collaborate with the latest file versions.
                              </p>
                          </div>

                          <!-- Card 4 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-lock"></i>
                              </div>
                              <h3>
                                  Adapt storage resources as your business grows.
                              </h3>
                              <p>
                                  Support growing workloads and file volumes while maintaining performance and accessibility.
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

                  <div class="integration-panel" id="dropbox">
                      <h2 class="integration-heading">
                          <img
                              src="/assets/img/integration-icons/drop-box.png"
                              alt="Tianyi cloud logo"
                              width="40px"
                              height="40px"
                              class="integration-sidebar-icon"
                              loading="lazy" />
                          Dropbox Integration
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
                                  Store, organize, and protect business data.
                              </h3>
                              <p>
                                  Keep documents, media, and project files securely stored and accessible from any device.
                              </p>
                          </div>

                          <!-- Card 2 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-server"></i>
                              </div>
                              <h3>
                                  Work together without file-sharing complexity.
                              </h3>
                              <p>
                                  Share files, folders, and documents across teams while maintaining centralized control and visibility.
                              </p>
                          </div>

                          <!-- Card 3 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-shield"></i>
                              </div>
                              <h3>Keep files updated across devices.</h3>
                              <p>
                                  Changes are synced automatically, ensuring everyone works with the latest version of every file.
                              </p>
                          </div>

                          <!-- Card 4 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-sitemap"></i>
                              </div>
                              <h3>
                                  Support growing teams and data needs.
                              </h3>
                              <p>
                                  Expand storage capacity and collaboration capabilities as your organization evolves.
                              </p>
                          </div>
                      </div>
                  </div>

                  <div class="integration-panel" id="cloudFare-r2">
                      <h2 class="integration-heading">
                          <img
                              src="/assets/img/integration-icons/cloudflare.png"
                              alt="Xsky Sds logo"
                              width="40px"
                              height="40px"
                              class="integration-sidebar-icon"
                              loading="lazy" />
                          CloudFare R2 Integration
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
                                  Store and deliver files without bandwidth charges.
                              </h3>
                              <p>
                                  Cloudflare R2 eliminates egress fees, helping businesses store and serve documents, media, backups, and application data without unexpected transfer costs.
                              </p>
                          </div>

                          <!-- Card 2 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-database"></i>
                              </div>
                              <h3>
                                  Connect existing storage workflows with ease.
                              </h3>
                              <p>
                                  R2 supports the S3 API, allowing PocketOffice to integrate seamlessly with existing tools, applications, and storage workflows without major changes.
                              </p>
                          </div>

                          <!-- Card 3 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-shield"></i>
                              </div>
                              <h3>
                                 Access files faster through Cloudflare's network.
                              </h3>
                              <p>
                                  Built on Cloudflare's global infrastructure, R2 helps deliver files efficiently while maintaining strong consistency and high durability for business-critical data.
                              </p>
                          </div>

                          <!-- Card 4 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-sitemap"></i>
                              </div>
                              <h3>
                                  Grow your storage capacity as your business expands.
                              </h3>
                              <p>
                                  R2 provides virtually unlimited object storage, making it ideal for growing teams, large file repositories, backups, media assets, and enterprise applications.
                              </p>
                          </div>
                      </div>
                  </div>

                  <div class="integration-panel" id="edge-network">
                      <h2 class="integration-heading">
                          <img
                              src="/assets/img/integration-icons/sangfor-eds.svg"
                              alt="Sangfor EDS logo"
                              width="40px"
                              height="40px"
                              class="integration-sidebar-icon"
                              loading="lazy" />
                          Edge Network Integration
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
                                  Deliver files and applications closer to users.
                              </h3>
                              <p>
                                  Leverage a worldwide edge network to reduce latency and improve application responsiveness for teams and customers.
                              </p>
                          </div>

                          <!-- Card 2 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-users"></i>
                              </div>
                              <h3>
                                  Protect traffic before it reaches your infrastructure.
                              </h3>
                              <p>
                                  Built-in security layers help defend against threats while maintaining secure access to business resources.
                              </p>
                          </div>

                          <!-- Card 3 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-shield"></i>
                              </div>
                              <h3>
                                  Optimize traffic routing automatically.
                              </h3>
                              <p>
                                  Intelligent routing and edge processing improve loading times and ensure a smoother user experience.
                              </p>
                          </div>

                          <!-- Card 4 -->
                          <div class="integration-card">
                              <div class="integration-icon">
                                  <i class="fa fa-history"></i>
                              </div>
                              <h3>
                                  Support growth without performance bottlenecks.
                              </h3>
                              <p>
                                  Expand globally with an edge platform designed to handle increasing workloads, users, and traffic demands.
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
  @section('scripts')
@vite(['resources/js/products.js'])
@endsection