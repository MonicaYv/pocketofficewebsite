document.addEventListener("DOMContentLoaded", function () {
    const newsContainer = document.getElementById("news-container");
    if (!newsContainer) return;

    newsContainer.innerHTML = "<h3>Loading news...</h3>";

    const FALLBACK_IMG =
        "https://pocket-office.ai/assets/img/documentation.webp";

    // Handle image errors without inline event handlers
    newsContainer.addEventListener(
        "error",
        function (event) {
            const img = event.target;

            if (
                img instanceof HTMLImageElement &&
                img.dataset.fallback &&
                !img.dataset.fallbackLoaded
            ) {
                img.dataset.fallbackLoaded = "true";
                img.src = img.dataset.fallback;
            }
        },
        true
    );

    fetch("https://proxy-news-rust.vercel.app/api/proxy-news")
        .then(response => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.json();
        })
        .then(data => {
            newsContainer.innerHTML = "";

            if (!data || !data.articles || data.articles.length === 0) {
                newsContainer.innerHTML = "<p>No news available.</p>";
                return;
            }

            data.articles.forEach(article => {
                const title = article.title || "";
                const description =
                    article.description || "No description available";
                const image = article.urlToImage || FALLBACK_IMG;

                const publishedAt = article.publishedAt
                    ? new Date(article.publishedAt).toDateString()
                    : "";

                const newsItem = document.createElement("div");
                newsItem.className = "news-item";

                newsItem.innerHTML = `
                    <div class="modern-card">
                        <div class="thumb">
                            <img
                                src="${image}"
                                loading="lazy"
                                alt=""
                                data-fallback="${FALLBACK_IMG}"
                            >
                        </div>
                        <div class="single-blog-details">
                            <ul class="post-meta">
                                <li>${publishedAt}</li>
                            </ul>
                            <h5>${title}</h5>
                            <p>${description}</p>
                            <a href="${article.url}" target="_blank"
                               rel="noopener noreferrer">
                                Read More
                            </a>
                        </div>
                    </div>
                `;

                newsContainer.appendChild(newsItem);
            });
        })
        .catch(error => {
            console.error("Fetch Error:", error);
            newsContainer.innerHTML = "<p>Unable to load news.</p>";
        });
});