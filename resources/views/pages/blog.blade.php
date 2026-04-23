 @extends('layouts.backendsettings')
 @section('title', 'Cloud Desktop Blog | Insights, Updates & Guides | Pocket Office')
 @section('content')
 <!-- breadcrumb area start -->
 <div
     class="breadcrumb-area"
     style="background-image: url('{{ asset($constants['IMAGEFILEPATH'] . 'hero-images/product-update.svg') }}')">
     <div class="container">
         <div class="row">
             <div class="col-lg-12">
                 <div class="breadcrumb-inner">
                     <h1 class="page-title">Updates</h1>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- breadcrumb area end -->

 <!-- blog grid area start -->
 <div class="blog-page-area pd-default-two">
     <div class="container">
         <div class="row custom-gutters-60">
             <div class="col-lg-12">
                 <div class="news-grid" id="blog-container">
                     <!-- Blog cards injected by blog.js -->
                 </div>
             </div>
         </div>
     </div>
 </div>
 @endsection