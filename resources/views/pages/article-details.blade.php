@extends('layouts.backendsettings')
@section('title', 'Article Details ')
@section('meta-title', 'Article Details | Pocket Office Insights on Cloud Desktop and Remote Collaboration')
@section('meta-description', 'Read detailed insights on Pocket Office features, cloud desktop workflows, and secure browser-based collaboration tools.')
@section('meta-keywords', 'article details, pocket office blog, cloud desktop insights, browser workspace, remote collaboration')
@section('meta-image', 'https://pocket-office.ai/assets/img/logo/pocket-office-tm-final-logo.png')
@section('canonical', 'https://pocket-office.ai/article-details')
@section('meta-url', 'https://pocket-office.ai/article-details')
@section('structured-data')
@verbatim
{
  "@context": "https://schema.org",
  "@type": "Article",
  "headline": "Article Details | Pocket Office Insights on Cloud Desktop and Remote Collaboration",
  "url": "https://pocket-office.ai/article-details",
  "description": "Read detailed insights on Pocket Office features, cloud desktop workflows, and secure browser-based collaboration tools.",
  "inLanguage": "en",
  "image": "https://pocket-office.ai/assets/img/logo/pocket-office-tm-final-logo.png",
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
      style="background-image: url('{{ asset($constants['IMAGEFILEPATH'] . 'page-title-bg.png') }}')"
    >
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="breadcrumb-inner">
              <h1 class="page-title">Article Details</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- breadcrumb area End -->

    <div class="blog-details-page pd-top-120">
      <div class="container">
        <div
          class="row custom-gutters-60 justify-content-center"
          id="article-container"
        >
          <!-- Article content will be injected here by JavaScript -->
        </div>
      </div>
    </div>
@endsection