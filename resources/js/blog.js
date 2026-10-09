document.addEventListener("DOMContentLoaded", function () {
    const container = document.getElementById("blog-containers");
    if (!container) return;

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
                let imageUrl = "";
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
                                <img src="${imageUrl}" alt="${cleanTitle}" loading="lazy" class="blog-card-image">
                            </a>
                        </div>

                        <div class="details">
                            <div class="blog-meta">
                                <span>Cloud Desktop</span> |
                                <span>${postDate}</span> |
                                <span>5 min read</span>
                            </div>

                            <h4>
                                <a href="/blog/${post.slug}" class="blog-card-title">
                                    ${cleanTitle}
                                </a>
                            </h4>

                            <p class="text-muted">${shortDescription}</p>

                            <div class="author-info blog-card-author">
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
