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
