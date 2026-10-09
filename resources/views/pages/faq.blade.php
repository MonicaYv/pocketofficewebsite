@extends('layouts.backendsettings')
@section('title', 'Frequently Asked Questions About Cloud Desktop | Pocket Office')
@section('meta-title', 'Frequently Asked Questions About Cloud Desktop | Pocket Office')
@section('meta-description', 'Find answers to common questions about Pocket Office cloud desktop, security, features, support, pricing, and AI-ready productivity for teams and individuals.')
@section('meta-keywords', 'faq, cloud desktop faq, pocket office questions, virtual desktop support, ai cloud desktop, team workspace support')
@section('meta-image', 'https://pocket-office.ai/assets/img/Hero-Section.webp')
@section('canonical', 'https://pocket-office.ai/faq')
@section('meta-url', 'https://pocket-office.ai/faq')
@section('structured-data')
@php
    $faqSchema = [
        '@context' => 'https://schema.org',
        '@type' => ['WebPage', 'FAQPage', 'SoftwareApplication'],
        'name' => 'Frequently Asked Questions About Cloud Desktop | Pocket Office',
        'applicationCategory' => 'BusinessApplication',
        'operatingSystem' => 'Web Browser',
        'browserRequirements' => 'Requires modern web browser',
        'url' => 'https://pocket-office.ai/faq',
        'description' => 'Find answers to common questions about Pocket Office cloud desktop, remote work security, support, AI-ready productivity, and team collaboration.',
        'inLanguage' => 'en',
        'image' => 'https://pocket-office.ai/assets/img/Hero-Section.webp',
        'mainEntity' => [
            [
                '@type' => 'Question',
                'name' => 'What exactly is Pocket Office?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => 'Think of Pocket Office as your personal computer that lives in the cloud instead of a physical box under your desk. It is a virtual desktop you access through any web browser, giving you a full, familiar desktop experience complete with apps, files, and folders from any device, anywhere.'
                ]
            ],
            [
                '@type' => 'Question',
                'name' => 'Why should my company switch to a Cloud Desktop (DaaS)?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => 'It saves money and simplifies IT. You do not need expensive high-spec hardware for every employee because the heavy lifting happens in the cloud. It also makes remote work seamless, as your team can log in from a home laptop, tablet, or public computer and find everything exactly where they left it.'
                ]
            ],
            [
                '@type' => 'Question',
                'name' => 'Is my company data safe in the cloud?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => 'Security is built into our core. Your data is isolated in a multi-tenant environment, meaning your information is completely separated from other companies. We also use advanced role-based permissions so employees only see the data they are authorized to access.'
                ]
            ],
            [
                '@type' => 'Question',
                'name' => 'Can we use our existing office software?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => 'Yes. Pocket Office is designed to be an integration hub. We support popular tools like ERPNext, Collabora Office and more. If you use custom apps, we provide API integrations to ensure they run smoothly within your virtual desktop.'
                ]
            ],
            [
                '@type' => 'Question',
                'name' => 'How fast can I set up my team on Pocket Office?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => 'Extremely fast. Because it is cloud-native, you can provision or de-provision users in minutes. Whether you are onboarding a new hire or expanding into a new office, your team can be up and running instantly.'
                ]
            ],
            [
                '@type' => 'Question',
                'name' => 'How much does Pocket Office cost?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => 'We offer simple transparent pricing plans for individuals, teams, and businesses. You can choose monthly or annual billing with flexibility to upgrade, downgrade, or cancel when needed.'
                ]
            ]
        ],
        'publisher' => [
            '@type' => 'Organization',
            'name' => 'Pocket Office',
            'url' => 'https://pocket-office.ai/',
            'logo' => [
                '@type' => 'ImageObject',
                'url' => 'https://pocket-office.ai/assets/img/logo/pocket-office-tm-final-logo.png'
            ]
        ],
        'about' => [
            [
                '@type' => 'Thing',
                'name' => 'Cloud desktop workspace'
            ],
            [
                '@type' => 'Thing',
                'name' => 'AI-ready productivity software'
            ],
            [
                '@type' => 'Thing',
                'name' => 'Remote collaboration tools'
            ]
        ]
    ];
@endphp
<script type="application/ld+json">
{!! json_encode($faqSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>
@endsection
@section('styles')
    @vite(['resources/css/faq.css'])
@endsection
@section('content')

<!-- breadcrumb area start -->
<div class="breadcrumb-area faq-breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner">
                    <h1 class="page-title">FAQ</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb area End -->

<!-- faq area start -->
<div class="faq-area pd-top-30 pd-bottom-60">
    <div class="container">

        <!-- Hero -->
        <div class="faq-hero text-center mb-4">
            <h2 class="faq-main-title mt-3 mb-2"><span class="text-purple">Frequently Asked Questions</h2>
            <p class="faq-sub-text mx-auto mb-4">Find answers to commonly asked questions about our services, support, and company information.</p>
            <div class="faq-search-wrap mx-auto">
                <i class="fa fa-search faq-search-icon"></i>
                <input type="text" id="faqSearch" class="faq-search-input" placeholder="Search for questions or keywords...">
            </div>
        </div>

        <!-- Tabs -->
        <div class="faq-tabs-bar d-flex flex-wrap justify-content-center gap-2 mb-4">
            <button class="faq-tab-btn active" data-tab="all">View All</button>
            <button class="faq-tab-btn" data-tab="group">For Group Users</button>
            <button class="faq-tab-btn" data-tab="individual">Individual Users</button>
        </div>

        <!-- FAQ Grid -->
        <div class="faq-grid" id="faqGrid">
            <!-- rendered by JS -->
        </div>

    </div>
</div>
<!-- faq area End -->

<!-- Contact Info Area -->
<div class="more-question-area pd-top-30">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-9">
                <div class="section-title text-center margin-bottom-90">
                    <h2 class="title">Get In Touch</h2>
                    <p>Our support team will get assistance from AI-powered suggestions, making it quicker than ever to handle support requests.</p>
                </div>
            </div>
        </div>

        <div class="faq-cards">
            <!-- Phone & Email -->
            <div class="faq-card-contact">
                <div class="faq-card-head">
                    <span class="faq-card-heading">Phone Number</span>
                    <p class="faq-card-info">+ 91 9967940928</p>
                    <p class="faq-card-info">+ 60 146600012</p>
                </div>
                <div class="faq-contact-divider"></div>
                <div class="faq-card-head">
                    <span class="faq-card-heading">Email Address</span>
                    <p class="faq-card-info">info@aibuzz.net</p>
                    <p class="faq-card-info">support@aibuzz.net</p>
                </div>
            </div>

            <!-- Address Cards -->
            <div class="faq-cards-row">
                <div class="faq-card">
                    <div class="faq-card-head">
                        <span class="faq-card-heading">Regional Address</span>
                        <span class="region-heading">USA</span>
                        <p class="faq-card-info">218-10, Hillside Ave, Queens Village, New York, USA, 11427.</p>
                    </div>
                </div>
                <div class="faq-card">
                    <div class="faq-card-head">
                        <span class="faq-card-heading">Regional Address</span>
                        <span class="region-heading">Malaysia</span>
                        <p class="faq-card-info">M116, Jalan Mega Mendung, Off Jalan Klang Lama, 58200, Kuala Lumpur, Malaysia.</p>
                    </div>
                </div>
                <div class="faq-card">
                    <div class="faq-card-head">
                        <span class="faq-card-heading pt-3">Regional Address</span>
                        <span class="region-heading">India</span>
                        <p class="faq-card-info">3102, 1st Floor, Rustomjee Eaze Zone, Sundar Nagar, Malad West - Mumbai 400064, MH</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
    @vite(['resources/js/faq.js'])
@endsection
