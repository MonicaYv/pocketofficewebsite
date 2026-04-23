    @extends('layouts.backendsettings')
    @section('title', 'News')
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

    <!-- search Popup -->
    <div class="body-overlay" id="body-overlay"></div>
    <div class="search-popup" id="search-popup">
        <form onsubmit="searchPage(event)" class="search-form">
            <div class="form-group">
                <input type="text" class="form-control" id="search-input" placeholder="Search....." />
            </div>
            <button type="submit" class="submit-btn">
                <i class="fa fa-search"></i>
            </button>
            <div id="search-results" class="search-results"></div>
        </form>
    </div>
    <!-- //. search Popup -->




    <!-- breadcrumb area start -->
    <div class="breadcrumb-area" style="background-image: url(assets/img/hero-images/news.svg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner">
                        <h1 class="page-title">Latest News</h1>



                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area End (NEWS)-->

    <div class="blog-page-area pd-default-two">
        <div class="container">
            <div class="row custom-gutters-60">
                <div class="col-lg-12">
                    <div class="news-grid" id="news-container">
                        <!-- <div class="col-12">
                        <div class="riyaqas-pagination mg-top-45">
                            <ul>
                                <li><a class="prev page-numbers" href="#"><i class="ti-angle-left"></i></a></li>
                                <li><span class="page-numbers">1</span></li>
                                <li><span class="page-numbers current">2</span></li>
                                <li><a class="page-numbers" href="#">3</a></li>
                                <li><a class="page-numbers" href="#">4</a></li>
                                <li><a class="next page-numbers" href="#"><i class="ti-angle-right"></i></a></li>
                            </ul>                          
                        </div>
                    </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <!-- back to top area start -->
    <div class="back-to-top">
        <span class="back-top"><i class="fa fa-angle-up"></i></span>
    </div>
    <!-- back to top area end -->
    @endsection