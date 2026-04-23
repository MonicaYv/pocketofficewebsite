@extends('layouts.backendsettings')
@section('title', 'Article Details')
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