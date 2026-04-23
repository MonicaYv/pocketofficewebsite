  @extends('layouts.backendsettings')
  @section('title', 'Error')
  @section('content')
  <!-- preloader area start -->
  <!-- <div class="preloader" id="preloader">
      <div class="preloader-inner">
          <div class="spinner">
              <div class="dot1"></div>
              <div class="dot2"></div>
          </div>
      </div>
  </div> -->
  <!-- preloader area end -->

  <!-- error area start -->
  <div class="error-area text-center">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-md-4 col-7">
                  <div class="error-page-left-img">
                      <div class="top-image">
                          <img class="error-img-1" src="{{ asset($constants['IMAGEFILEPATH'] . 'others/3.png') }}" alt="404">
                          <span>Oops !</span>
                      </div>
                      <img src="{{ asset($constants['IMAGEFILEPATH'] . 'others/2.png') }}" alt="404">
                  </div>
              </div>
              <div class="col-md-8 text-center">
                  <img src="{{ asset($constants['IMAGEFILEPATH'] . 'others/1.png') }}" alt="404">
                  <div class="error-back-to-home">
                      <a class="btn" href="index.html">Go to Home</a>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- error area end -->

  <!-- back to top area start -->
  <div class="back-to-top">
      <span class="back-top"><i class="fa fa-angle-up"></i></span>
  </div>
  <!-- back to top area end -->
  @endsection