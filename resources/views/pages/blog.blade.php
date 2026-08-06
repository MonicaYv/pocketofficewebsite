@extends('layouts.backendsettings')
@section('title', 'Cloud Desktop Blog | Insights, Updates & Guides | Pocket Office')
@section('content')

<style>
  /* Breadcrumb */
  .breadcrumb-area {
    background-size: cover;
    background-position: center;
    padding: 194px 0 114px;
    position: relative;
    margin-bottom: 0;
  }

  .breadcrumb-area::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
     z-index: 1;
  }

  .breadcrumb-inner {
    position: relative;
    z-index: 2;
  }

  .page-title {
    font-size: 44px;
    font-weight: 800;
    color: white;
    margin: 0;
    text-shadow: 0 2px 10px rgba(0,0,0,0.25);
    letter-spacing: -0.5px;
  }

  /* Blog Page Area */
  .blog-page-area {
    padding: 80px 20px 60px;
    background: #f9fafb;
    min-height: calc(100vh - 400px);
  }

  .news-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(360px, 1fr));
    gap: 32px;
    margin-bottom: 60px;
  }

  /* Blog Cards */
  .single-blog-item {
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
    display: flex;
    flex-direction: column;
    height: 100%;
    border: 1px solid #f0f0f0;
  }

  .single-blog-item:hover {
    transform: translateY(-12px);
    box-shadow: 0 16px 40px rgba(0,0,0,0.12);
    border-color: #e0f2fe;
  }

  .single-blog-item .thumb {
    width: 100%;
    height: 240px;
    overflow: hidden;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    position: relative;
  }

  .single-blog-item .thumb img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.45s cubic-bezier(0.4, 0, 0.2, 1);
  }

  .single-blog-item:hover .thumb img {
    transform: scale(1.08);
  }

  .single-blog-item .thumb::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
    pointer-events: none;
  }

  .single-blog-item .details {
    padding: 28px;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
  }

  .blog-meta {
    font-size: 11px;
    font-weight: 700;
    color: #17c3b2;
    letter-spacing: 0.8px;
    margin-bottom: 14px;
    text-transform: uppercase;
    display: flex;
    align-items: center;
    gap: 8px;
  }

  .blog-meta span {
    display: inline;
  }

  .blog-meta span:not(:last-child)::after {
    content: '•';
    margin-left: 8px;
    color: #d0d0d0;
  }

  .single-blog-item h4 {
    font-size: 20px;
    font-weight: 700;
    color: #1a1a2e;
    line-height: 1.35;
    margin: 8px 0 12px;
    min-height: 50px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }

  .single-blog-item h4 a {
    color: #1a1a2e;
    text-decoration: none;
    transition: color 0.3s ease;
  }

  .single-blog-item h4 a:hover {
    color: #0694B7;
  }

  .single-blog-item p {
    font-size: 14px;
    line-height: 1.65;
    color: #666;
    margin: 12px 0 16px;
    flex-grow: 1;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }

  .author-info {
    margin: 20px 0 0;
    padding: 16px 0;
    border-top: 1px solid #f0f0f0;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  .author-info strong {
    display: block;
    font-size: 13px;
    color: #1a1a2e;
    font-weight: 600;
  }

  .author-info small {
    display: block;
    font-size: 11px;
    color: #999;
    margin-top: 2px;
  }

  .single-blog-item .btn {
    align-self: end;
    
    border-radius: 6px;
    font-weight: 600;
    font-size: 13px;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
    display: flex;
    align-items: center;
    text-decoration: none;
    height: 36px;
  }

  .btn-primary {
    background: #0694B7;
    color: white;
  }

  .btn-primary:hover {
    background: #0577a0;
    box-shadow: 0 6px 16px rgba(6, 148, 183, 0.35);
    transform: translateY(-2px);
  }

  /* Loading State */
  .text-center.py-5 {
    text-align: center;
    padding: 80px 20px;
  }

  .spinner-border {
    display: inline-block;
    width: 48px;
    height: 48px;
    vertical-align: text-bottom;
    border: 4px solid #f3f3f3;
    border-top: 4px solid #0694B7;
    border-radius: 50%;
    animation: spinner-border 0.75s linear infinite;
  }

  @keyframes spinner-border {
    to { transform: rotate(360deg); }
  }

  .text-center h3 {
    font-size: 24px;
    font-weight: 700;
    color: #1a1a2e;
    margin: 20px 0 12px;
  }

  .text-center p {
    font-size: 15px;
    color: #666;
    margin: 0;
  }

  /* Skeleton Loader */
  .skeleton-loader {
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    display: flex;
    flex-direction: column;
    height: 100%;
    border: 1px solid #f0f0f0;
  }

  .skeleton-thumb {
    width: 100%;
    height: 240px;
    background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
    background-size: 200% 100%;
    animation: skeleton-loading 1.5s infinite;
  }

  .skeleton-details {
    padding: 28px;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
  }

  .skeleton-meta {
    height: 12px;
    background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
    background-size: 200% 100%;
    animation: skeleton-loading 1.5s infinite;
    border-radius: 4px;
    margin-bottom: 14px;
    width: 60%;
  }

  .skeleton-title {
    height: 20px;
    background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
    background-size: 200% 100%;
    animation: skeleton-loading 1.5s infinite;
    border-radius: 4px;
    margin-bottom: 12px;
  }

  .skeleton-title:last-of-type {
    width: 85%;
  }

  .skeleton-text {
    height: 14px;
    background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
    background-size: 200% 100%;
    animation: skeleton-loading 1.5s infinite;
    border-radius: 4px;
    margin-bottom: 8px;
    flex-grow: 1;
  }

  .skeleton-text:nth-child(2) {
    width: 95%;
  }

  .skeleton-text:nth-child(3) {
    width: 88%;
  }

  .skeleton-author {
    margin: 20px 0 0;
    padding: 16px 0;
    border-top: 1px solid #f0f0f0;
    display: flex;
    flex-direction: column;
    gap: 8px;
  }

  .skeleton-author-name {
    height: 13px;
    background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
    background-size: 200% 100%;
    animation: skeleton-loading 1.5s infinite;
    border-radius: 4px;
    width: 50%;
  }

  .skeleton-author-role {
    height: 11px;
    background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
    background-size: 200% 100%;
    animation: skeleton-loading 1.5s infinite;
    border-radius: 4px;
    width: 65%;
  }

  .skeleton-button {
    height: 36px;
    background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
    background-size: 200% 100%;
    animation: skeleton-loading 1.5s infinite;
    border-radius: 6px;
    align-self: flex-end;
    margin-top: 18px;
    width: 120px;
  }

  @keyframes skeleton-loading {
    0% {
      background-position: 200% 0;
    }
    100% {
      background-position: -200% 0;
    }
  }

  /* Responsive */
  @media (max-width: 1024px) {
    .news-grid {
      grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
      gap: 24px;
    }

    .page-title {
      font-size: 36px;
    }
  }

  @media (max-width: 768px) {
    .breadcrumb-area {
      padding: 60px 20px;
    }

    .page-title {
      font-size: 28px;
    }

    .blog-page-area {
      padding: 40px 20px;
    }

    .news-grid {
      grid-template-columns: 1fr;
      gap: 20px;
      margin-bottom: 40px;
    }

    .single-blog-item .thumb {
      height: 200px;
    }

    .single-blog-item .details {
      padding: 20px;
    }

    .single-blog-item h4 {
      font-size: 18px;
      min-height: 45px;
    }

    .single-blog-item p {
      font-size: 13px;
      margin: 10px 0 12px;
    }

    .single-blog-item .btn {
      padding: 10px 18px;
      font-size: 12px;
    }
  }

  @media (max-width: 480px) {
    .page-title {
      font-size: 22px;
    }

    .single-blog-item h4 {
      font-size: 16px;
    }

    .blog-meta {
      font-size: 10px;
    }
  }
</style>

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
<script>
document.addEventListener("DOMContentLoaded", function () {
    const container = document.getElementById("blog-containers");

    // 1. Added ?_embed parameter to pull media, categories, and author details automatically
    const API_URL = "https://pocketoffice-cms.aibuzz.net/wp-json/wp/v2/posts?_embed"; 

    fetch(API_URL)
        .then(response => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.json();
        })
        .then(posts => {
            container.innerHTML = "";

            if (!posts || posts.length === 0) {
                container.innerHTML = `
                    <div class="text-center py-5 w-100">
                        <h3>No blog posts found.</h3>
                        <p>Check back later for updates!</p>
                    </div>`;
                return;
            }

            container.innerHTML = posts.map(post => {
                // 2. Safely parse the native WordPress post date string
                const postDate = post.date 
                    ? new Date(post.date).toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' })
                    : 'Recent';

                // 3. Extract the clean title text string
                const cleanTitle = post.title && post.title.rendered ? post.title.rendered : 'Untitled Post';

                // 4. Extract and sanitize the excerpt content body
                let rawExcerpt = post.excerpt && post.excerpt.rendered ? post.excerpt.rendered : '';
                // Strips raw HTML bracket selectors from excerpt text so it truncates beautifully
                let cleanExcerpt = rawExcerpt.replace(/<\/?[^>]+(>|$)/g, ""); 
                
                const shortDescription = cleanExcerpt.length > 150 
                    ? cleanExcerpt.substring(0, 150) + '...' 
                    : cleanExcerpt;

                // 5. Try to extract the featured image URL from the embedded data stream
                // let imageUrl = '/assets/img/index/default-blog.webp';
                try {
                    if (post._embedded && post._embedded['wp:featuredmedia'] && post._embedded['wp:featuredmedia'][0]) {
                        imageUrl = post._embedded['wp:featuredmedia'][0].source_url || imageUrl;
                    }
                } catch (e) {
                    console.log("No featured media found for post:", post.id);
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
                                <a href="/blog/${post.slug}" style="color: #333; text-decoration: none; font-weight: bold;">
                                    ${cleanTitle}
                                </a>
                            </h4>

                            <p class="text-muted">${shortDescription}</p>

                            <div class="author-info" style="margin-top: 15px; font-size: 0.9em; color: #555;">
                                <strong>Pocketoffice Team</strong><br>
                                 <a href="/blog/${post.slug}" class="btn btn-sm btn-primary">
                                Read More
                            </a>
                            </div>

                           
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