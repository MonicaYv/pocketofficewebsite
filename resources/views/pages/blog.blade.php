@extends('layouts.backendsettings')
@section('title', 'Cloud Desktop Blog | Insights, Updates & Guides | Pocket Office')
@section('body-class', 'blog-page')
@section('content')
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner">
                    <h1 class="page-title">Latest blogs, insights, and updates</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="blog-page-area pd-default-two">
    <div class="container">
        <div class="row custom-gutters-60">
            <div class="col-lg-12">
<div class="news-grid" id="blog-containers">
                    <div id="blog-loading" class="w-100">
                        <div class="skeleton-loader">
                            <div class="skeleton-thumb"></div>
                            <div class="skeleton-details">
                                <div class="skeleton-meta"></div>
                                <div class="skeleton-title"></div>
                                <div class="skeleton-title"></div>
                                <div class="skeleton-text"></div>
                                <div class="skeleton-text"></div>
                                <div class="skeleton-text"></div>
                                <div class="skeleton-author">
                                    <div class="skeleton-author-name"></div>
                                    <div class="skeleton-author-role"></div>
                                </div>
                                <div class="skeleton-button"></div>
                            </div>
                        </div>
                    </div>
                    <div id="blog-loading" class="w-100">
                        <div class="skeleton-loader">
                            <div class="skeleton-thumb"></div>
                            <div class="skeleton-details">
                                <div class="skeleton-meta"></div>
                                <div class="skeleton-title"></div>
                                <div class="skeleton-title"></div>
                                <div class="skeleton-text"></div>
                                <div class="skeleton-text"></div>
                                <div class="skeleton-text"></div>
                                <div class="skeleton-author">
                                    <div class="skeleton-author-name"></div>
                                    <div class="skeleton-author-role"></div>
                                </div>
                                <div class="skeleton-button"></div>
                            </div>
                        </div>
                    </div>
                    <div id="blog-loading" class="w-100">
                        <div class="skeleton-loader">
                            <div class="skeleton-thumb"></div>
                            <div class="skeleton-details">
                                <div class="skeleton-meta"></div>
                                <div class="skeleton-title"></div>
                                <div class="skeleton-title"></div>
                                <div class="skeleton-text"></div>
                                <div class="skeleton-text"></div>
                                <div class="skeleton-text"></div>
                                <div class="skeleton-author">
                                    <div class="skeleton-author-name"></div>
                                    <div class="skeleton-author-role"></div>
                                </div>
                                <div class="skeleton-button"></div>
                            </div>
                        </div>
                    </div>
                    <div id="blog-loading" class="w-100">
                        <div class="skeleton-loader">
                            <div class="skeleton-thumb"></div>
                            <div class="skeleton-details">
                                <div class="skeleton-meta"></div>
                                <div class="skeleton-title"></div>
                                <div class="skeleton-title"></div>
                                <div class="skeleton-text"></div>
                                <div class="skeleton-text"></div>
                                <div class="skeleton-text"></div>
                                <div class="skeleton-author">
                                    <div class="skeleton-author-name"></div>
                                    <div class="skeleton-author-role"></div>
                                </div>
                                <div class="skeleton-button"></div>
                            </div>
                        </div>
                    </div>
                    <div id="blog-loading" class="w-100">
                        <div class="skeleton-loader">
                            <div class="skeleton-thumb"></div>
                            <div class="skeleton-details">
                                <div class="skeleton-meta"></div>
                                <div class="skeleton-title"></div>
                                <div class="skeleton-title"></div>
                                <div class="skeleton-text"></div>
                                <div class="skeleton-text"></div>
                                <div class="skeleton-text"></div>
                                <div class="skeleton-author">
                                    <div class="skeleton-author-name"></div>
                                    <div class="skeleton-author-role"></div>
                                </div>
                                <div class="skeleton-button"></div>
                            </div>
                        </div>
                    </div>
                    <div id="blog-loading" class="w-100">
                        <div class="skeleton-loader">
                            <div class="skeleton-thumb"></div>
                            <div class="skeleton-details">
                                <div class="skeleton-meta"></div>
                                <div class="skeleton-title"></div>
                                <div class="skeleton-title"></div>
                                <div class="skeleton-text"></div>
                                <div class="skeleton-text"></div>
                                <div class="skeleton-text"></div>
                                <div class="skeleton-author">
                                    <div class="skeleton-author-name"></div>
                                    <div class="skeleton-author-role"></div>
                                </div>
                                <div class="skeleton-button"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    @vite(['resources/js/blog.js'])
@endsection
