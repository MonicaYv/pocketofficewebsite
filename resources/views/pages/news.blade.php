    @extends('layouts.backendsettings')
    @section('title', 'Latest News & Announcements | Pocket Office Cloud Desktop')
    @section('meta-title', 'Latest News & Announcements | Pocket Office Cloud Desktop')
    @section('meta-description', 'Stay updated with the latest news and announcements from Pocket Office, including updates on cloud desktop features and industry insights.')
    @section('meta-keywords', 'latest news announcements, pocket office updates, cloud desktop news, industry insights')
    @section('meta-image', 'https://pocketdesk.sizaf.com/assets/img/hero-images/news.svg')
    @section('canonical', 'https://pocketdesk.sizaf.com/news')
    @section('meta-url', 'https://pocketdesk.sizaf.com/news')
    @section('structured-data')
    @verbatim
    {
      "@context": "https://schema.org",
      "@type": "CollectionPage",
      "name": "News | Pocket Office",
      "url": "https://pocketdesk.sizaf.com/news",
      "description": "Stay updated with the latest news and announcements from Pocket Office, including updates on cloud desktop features and industry insights.",
      "inLanguage": "en",
      "image": "https://pocketdesk.sizaf.com/assets/img/hero-images/news.svg",
      "publisher": {
        "@type": "Organization",
        "name": "Pocket Office",
        "url": "https://pocketdesk.sizaf.com",
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
        style="background-image: url(assets/img/hero-images/news.svg)">
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
    @endsection