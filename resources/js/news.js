document.addEventListener("DOMContentLoaded", function () {

    const newsContainer = document.getElementById("news-container");
    if (!newsContainer) return;

    newsContainer.innerHTML = "<h3>Loading news...</h3>";

    fetch("https://proxy-news-rust.vercel.app/api/proxy-news?q=Apple")
        .then(response => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.json();
        })
        .then(data => {

            console.log("API Response:", data);

            newsContainer.innerHTML = "";

            if (!data || !data.articles || data.articles.length === 0) {
                newsContainer.innerHTML = "<p>No news available.</p>";
                return;
            }

            data.articles.forEach(article => {

                const title = article.title || "";
                const description = article.description || "No description available";
                const image = article.urlToImage || "";
                const publishedAt = article.publishedAt
                    ? new Date(article.publishedAt).toDateString()
                    : "";

                const newsItem = document.createElement("div");
                newsItem.className = "news-item";

                newsItem.innerHTML = `
                    <div class="modern-card">
                        <div class="thumb">
                            ${image ? `<img src="${image}" loading="lazy">` : ""}
                        </div>
                        <div class="single-blog-details">
                            <ul class="post-meta">
                                <li>${publishedAt}</li>
                            </ul>
                            <h5>${title}</h5>
                            <p>${description}</p>
                            <a href="${article.url}" target="_blank">
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