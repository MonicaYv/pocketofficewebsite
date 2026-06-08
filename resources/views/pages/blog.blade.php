@extends('layouts.backendsettings')
@section('title', 'Cloud Desktop Blog | Insights, Updates & Guides | Pocket Office')
@section('content')

<div
    class="breadcrumb-area"
    style="background-image: url('{{ asset($constants['IMAGEFILEPATH'] . 'hero-images/product-update.svg') }}')">
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
                    <div class="text-center py-5 w-100" id="blog-loading">
                        <div class="spinner-border text-primary" role="status"></div>
                        <p class="mt-2">Loading latest insights...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const container = document.getElementById("blog-containers");

    const API_URL = "/fetch-blogs";

    fetch(API_URL)
        .then(response => response.json())
        .then(result => {
            container.innerHTML = "";

            const posts = result.data || [];

            if (!result.status || posts.length === 0) {
                container.innerHTML = `
                    <div class="text-center py-5 w-100">
                        <h3>No blog posts found.</h3>
                        <p>Check back later for updates!</p>
                    </div>`;
                return;
            }

            container.innerHTML = posts.map(post => {
                const postDate = post.date
                    ? new Date(post.date).toLocaleDateString('en-US', {
                        month: 'short',
                        day: 'numeric',
                        year: 'numeric'
                    })
                    : 'Recent';

                const cleanTitle = post.title?.rendered || 'Untitled Post';

                let rawExcerpt = post.excerpt?.rendered || '';
                let cleanExcerpt = rawExcerpt.replace(/<\/?[^>]+(>|$)/g, "");

                const shortDescription = cleanExcerpt.length > 150
                    ? cleanExcerpt.substring(0, 150) + '...'
                    : cleanExcerpt;

                let imageUrl = '/assets/img/index/default-blog.webp';

                if (
                    post._embedded &&
                    post._embedded['wp:featuredmedia'] &&
                    post._embedded['wp:featuredmedia'][0]
                ) {
                    imageUrl = post._embedded['wp:featuredmedia'][0].source_url || imageUrl;
                }

                return `
                    <div class="single-blog-item">
                        <div class="thumb">
                            <a href="/blog/${post.slug}">
                                <img src="${imageUrl}" alt="${cleanTitle}" loading="lazy" style="width:100%; height:auto; object-fit:cover;">
                            </a>
                        </div>

                        <div class="details">
                            <div class="blog-meta">
                                <span>Cloud Desktop</span> |
                                <span>${postDate}</span> |
                                <span>5 min read</span>
                            </div>

                            <h4>
                                <a href="/blog/${post.slug}" style="color:#333; text-decoration:none; font-weight:bold;">
                                    ${cleanTitle}
                                </a>
                            </h4>

                            <p class="text-muted">${shortDescription}</p>

                            <div class="author-info" style="margin-top:15px; font-size:0.9em; color:#555;">
                                <strong>Pocketoffice Team</strong><br>
                                <small class="text-zinc-400">Cloud Workspace Insights</small>
                            </div>

                            <a href="/blog/${post.slug}" class="btn btn-sm btn-primary mt-3">
                                Read More
                            </a>
                        </div>
                    </div>
                `;
            }).join('');
        })
        .catch(error => {
            console.error("Error fetching blog data:", error);

            container.innerHTML = `
                <div class="text-center py-5 w-100">
                    <h3>Oops! Something went wrong.</h3>
                    <p>We couldn't load the blogs right now. Please try again later.</p>
                </div>`;
        });
});
</script>

@endsection