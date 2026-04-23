document.addEventListener("DOMContentLoaded", () => {
    const raw = sessionStorage.getItem("selectedArticle");
    if (!raw) return;

    const article = JSON.parse(raw);
    const container = document.getElementById("article-container");
    console.log("Loaded article:", article);

    if (!container) return;

    container.innerHTML = `
        <div class="article-wrapper">

            <div class="article-header">
                <h1 class="article-title">
                    ${article.title}
                </h1>

                <div class="article-meta">
                    <span>
                        <i class="fa fa-calendar"></i>
                        ${new Date(article.publishedAt).toDateString()}
                    </span>
                    <span>
                        <i class="fa fa-globe"></i>
                        ${article.source || "Unknown Source"}
                    </span>
                </div>
            </div>

            <div class="article-image">
                <img src="${article.image}" 
                    alt="article image"
                    onerror="this.style.display='none'">
            </div>

            <div class="article-content">
                <p>
                    ${article.description || "No description available."}
                </p>
            </div>
            <a href="${article.url}" class="article-link">
                Read Full Article
            </a>
        </div>`;
});
