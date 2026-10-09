@php
    $heroClassMap = [
        'hero-images/industries/Finance-Accounting/Finance & Accounting 1.svg' => 'industry-hero-finance-accounting',
        'hero-images/industries/Consulting/Consulting 2.svg' => 'industry-hero-consulting',
        'hero-images/industries/Education/Education 1.svg' => 'industry-hero-education',
        'hero-images/industries/Healthcare/Healthcare 1.svg' => 'industry-hero-healthcare',
        'hero-images/industries/BPO-Outsourcing/BPO & Outsourcing 1.svg' => 'industry-hero-bpo',
        'hero-images/industries/IT-Software/Software-1.svg' => 'industry-hero-it-software',
        'hero-images/industries/LegalServices/Legal Services 1.svg' => 'industry-hero-legal-services',
        'hero-images/industries/Manufacturing/Manufacturing 1.svg' => 'industry-hero-manufacturing',
        'hero-images/industries/Media-Publishing/Media & Publishing 1.svg' => 'industry-hero-media-publishing',
        'hero-images/industries/Retail-E-commerce/Retail & E-commerce 1.svg' => 'industry-hero-retail-ecommerce',
        'hero-images/industries/Design/Design 1.svg' => 'industry-hero-design',
    ];
    $heroClass = $heroClass ?? ($heroClassMap[$bgImage ?? ''] ?? '');
@endphp

<!-- breadcrumb area start -->
<div class="breadcrumb-area industry-hero-bg {{ $heroClass }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner">
                    <h1 class="page-title">Industry Solutions</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb area End -->