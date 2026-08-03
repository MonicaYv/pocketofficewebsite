@extends('layouts.backendsettings')
@section('title', 'Blog Details')
@section('content')

<style>
  /* Hero Section */
  .bd-hero {
    position: relative;
    height: 550px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    overflow: hidden;
    margin-bottom: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .bd-hero-img {
    position: absolute;
    width: 100%;
    height: 100%;
    object-fit: cover;
    opacity: 0.85;
  }

  .bd-hero-gradient {
    position: absolute;
    width: 100%;
    height: 100%;
    background: linear-gradient(180deg, rgba(0,0,0,0.2) 0%, rgba(0,0,0,0.7) 100%);
    z-index: 2;
  }

  .bd-hero-content {
    position: relative;
    z-index: 3;
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    padding: 60px 40px;
    color: white;
    text-align: left;
  }

  .bd-category-pill {
    display: inline-flex;
    align-items: center;
    background: rgba(23, 195, 178, 0.95);
    padding: 10px 18px;
    border-radius: 24px;
    font-size: 13px;
    font-weight: 700;
    letter-spacing: 0.5px;
    width: fit-content;
    margin-bottom: 24px;
    box-shadow: 0 4px 16px rgba(0,0,0,0.2);
  }

  .bd-hero-title {
    font-size: 52px;
    font-weight: 800;
    line-height: 1.15;
    margin-bottom: 24px;
    text-shadow: 0 2px 12px rgba(0,0,0,0.4);
    max-width: 900px;
  }

  .bd-hero-meta {
    display: flex;
    align-items: center;
    gap: 28px;
    font-size: 15px;
    opacity: 0.95;
    flex-wrap: wrap;
  }

  .bd-hero-meta span {
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .bd-hero-meta .dot {
    width: 4px;
    height: 4px;
    background: white;
    border-radius: 50%;
    opacity: 0.6;
    margin: 0 -14px;
  }

  .bd-page {
    max-width: 800px;
    margin: 0 auto;
    padding: 0 40px 80px;
  }

  .bd-back {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    color: #0694B7;
    text-decoration: none;
    font-weight: 600;
    font-size: 15px;
    margin-bottom: 50px;
    transition: all 0.3s ease;
  }

  .bd-back:hover {
    gap: 14px;
    color: #13a89a;
  }

  .bd-body {
    font-size: 16px;
    line-height: 1.8;
    color: #555;
  }

  .bd-body h2 {
    font-size: 28px;
    font-weight: 800;
    color: #1a1a2e;
    margin: 40px 0 20px;
    line-height: 1.3;
  }

  .bd-body h3 {
    font-size: 22px;
    font-weight: 700;
    color: #1a1a2e;
    margin: 30px 0 15px;
  }

  .bd-body p {
    margin-bottom: 18px;
    line-height: 1.8;
  }

  .bd-body ul, .bd-body ol {
    margin: 24px 0 24px 20px;
    line-height: 1.8;
  }

  .bd-body li {
    margin-bottom: 12px;
    color: #555;
  }

  .bd-body strong {
    color: #1a1a2e;
    font-weight: 700;
  }

  .bd-body blockquote {
    border-left: 4px solid #0694B7;
    padding: 24px 20px;
    margin: 40px 0;
    background: #f7fafc;
    font-size: 17px;
    font-weight: 600;
    color: #1a1a2e;
    font-style: italic;
    line-height: 1.6;
  }

  .bd-body a {
    color: #0694B7;
    text-decoration: none;
    font-weight: 600;
    transition: color 0.3s;
  }

  .bd-body a:hover {
    color: #13a89a;
    text-decoration: underline;
  }

  .bd-body img {
    max-width: 100%;
    height: auto;
    margin: 40px 0;
    border-radius: 8px;
    box-shadow: 0 4px 16px rgba(0,0,0,0.1);
  }

  /* Breadcrumb */
  .breadcrumb-area {
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    padding: 80px 20px;
    text-align: center;
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
    background: linear-gradient(135deg, rgba(6, 148, 183, 0.8), rgba(23, 195, 178, 0.8));
    z-index: 1;
  }

  .breadcrumb-inner {
    position: relative;
    z-index: 2;
  }

  .page-title {
    font-size: 36px;
    font-weight: 800;
    color: white;
    margin: 0;
  }

  /* Read Progress Bar */
  #read-progress {
    position: fixed;
    top: 0;
    left: 0;
    height: 3px;
    background: linear-gradient(90deg, #0694B7, #17c3b2);
    width: 0%;
    z-index: 9999;
    transition: width 0.1s ease;
  }

  @media (max-width: 768px) {
    .bd-hero {
      height: 380px;
      margin-bottom: 40px;
    }

    .bd-hero-title {
      font-size: 32px;
      margin-bottom: 16px;
    }

    .bd-hero-content {
      padding: 40px 20px;
    }

    .bd-page {
      padding: 0 20px 60px;
    }

    .bd-hero-meta {
      gap: 12px;
      font-size: 13px;
    }

    .bd-body h2 {
      font-size: 22px;
      margin: 32px 0 16px;
    }

    .breadcrumb-area {
      padding: 60px 20px;
    }

    .page-title {
      font-size: 28px;
    }
  }
</style>


<div id="read-progress"></div>
<div class="bd-hero" id="bd-hero" style="position: relative; overflow: hidden;">
  <img class="bd-hero-img" id="bd-hero-img" src="" alt="Blog Post Image" loading="lazy" />
  <div class="bd-hero-gradient"></div>
  <div class="bd-hero-content">
    <span class="bd-category-pill">
      <i class="fa-solid fa-tag"></i>&nbsp;
      <span id="bd-category-text">Loading…</span>
    </span>
    <h1 class="bd-hero-title" id="bd-title"></h1>
    <div class="bd-hero-meta">
      <span><i class="fa-regular fa-calendar"></i> <span id="bd-date"></span></span>
      <div class="dot"></div>
      <span><i class="fa-regular fa-user"></i> <span id="bd-author"></span></span>
      <div class="dot"></div>
      <span><i class="fa-regular fa-clock"></i> <span id="bd-read-time"></span></span>
    </div>
  </div>
</div>

<div class="bd-page">
  <a href="{{ url('/blog') }}" class="bd-back">
    <i class="fa-solid fa-arrow-left"></i> Back to Blog
  </a>

  <article class="bd-body" id="bd-body"></article>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const pathSegments = window.location.pathname.split('/');
    const postSlug = pathSegments[pathSegments.length - 1];

    if (!postSlug) {
        console.error("No valid post slug detected.");
        return;
    }

    const API_URL = `/fetch-blog-detail/${postSlug}`;

    fetch(API_URL)
        .then(response => response.json())
        .then(result => {
            if (!result.status || !result.data) {
                document.getElementById("bd-title").innerText = "Post Not Found";
                document.getElementById("bd-body").innerHTML = "<p>The requested blog update could not be located on the server.</p>";
                return;
            }

            const post = result.data;
            const postTitle = post.title.rendered;
            const postExcerpt = post.excerpt.rendered ? post.excerpt.rendered.replace(/<[^>]*>/g, '') : 'Read the latest insights from Pocketoffice';
            
            let postImage = "/assets/img/index/default-blog.webp";
            if (
                post._embedded &&
                post._embedded['wp:featuredmedia'] &&
                post._embedded['wp:featuredmedia'][0]
            ) {
                postImage = post._embedded['wp:featuredmedia'][0].source_url || postImage;
            }

            document.title = `${postTitle} | Pocket Office Blog`;

            // Update or create meta tags dynamically
            const setMetaTag = (name, content, isProperty = false) => {
                let tag = document.querySelector(isProperty ? `meta[property="${name}"]` : `meta[name="${name}"]`);
                if (!tag) {
                    tag = document.createElement('meta');
                    if (isProperty) {
                        tag.setAttribute('property', name);
                    } else {
                        tag.setAttribute('name', name);
                    }
                    document.head.appendChild(tag);
                }
                tag.setAttribute('content', content);
            };

            // Standard meta tags
            setMetaTag('description', postExcerpt);
            setMetaTag('keywords', `blog, ${post.category || 'cloud desktop'}, pocketoffice`);

            // Open Graph meta tags (for social sharing)
            setMetaTag('og:title', postTitle, true);
            setMetaTag('og:description', postExcerpt, true);
            setMetaTag('og:image', postImage, true);
            setMetaTag('og:url', window.location.href, true);
            setMetaTag('og:type', 'article', true);

            // Twitter Card meta tags
            setMetaTag('twitter:title', postTitle);
            setMetaTag('twitter:description', postExcerpt);
            setMetaTag('twitter:image', postImage);
            setMetaTag('twitter:card', 'summary_large_image');

            // Update page content
            document.getElementById("bd-title").innerHTML = postTitle;
            document.getElementById("bd-body").innerHTML = post.content.rendered;

            document.getElementById("bd-date").innerText = post.date
                ? new Date(post.date).toLocaleDateString('en-US', {
                    month: 'short',
                    day: 'numeric',
                    year: 'numeric'
                })
                : 'Recent';

            document.getElementById("bd-category-text").innerText = post.category || "Cloud Desktop";
            document.getElementById("bd-author").innerText = "Pocketoffice Team";
            document.getElementById("bd-read-time").innerText = "5 min read";

            let heroImgElement = document.getElementById("bd-hero-img");
            heroImgElement.src = postImage;
            heroImgElement.alt = postTitle;
        })
        .catch(err => {
            console.error("Blog detail loading error:", err);

            document.getElementById("bd-title").innerText = "Error Loading Content";
            document.getElementById("bd-body").innerHTML = "<p>An unexpected network error occurred while rendering blog detail.</p>";
        });

    // Reading progress bar
    window.addEventListener('scroll', () => {
      const doc = document.documentElement;
      const scrollPercent = (window.scrollY / (doc.scrollHeight - window.innerHeight)) * 100;
      document.getElementById('read-progress').style.width = scrollPercent + '%';
    });
});
</script>

@endsection