// Function to extract query string
function getQueryParam(param) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(param) || "";
}

function renderSearchResults(query) {
    const resultDiv = document.getElementById("result-div");

    if (!resultDiv) {
        return;
    }

    // Clear existing results
    resultDiv.replaceChildren();

    if (query.trim() === "") {
        const message = document.createElement("p");
        message.textContent = "Please enter a search term.";
        resultDiv.appendChild(message);
        return;
    }

    const normalizedQuery = query.trim().toLowerCase();

    const filteredPages = pages.filter(page =>
        page.name.toLowerCase().includes(normalizedQuery) ||
        (
            page.keywords &&
            page.keywords.toLowerCase().includes(normalizedQuery)
        )
    );

    if (filteredPages.length > 0) {
        filteredPages.forEach(page => {
            const link = document.createElement("a");

            link.href = page.url;
            link.textContent = page.name;
            link.classList.add("search-result-link");

            resultDiv.appendChild(link);
        });
    } else {
        const message = document.createElement("p");

        message.classList.add("no-results-message");
        message.textContent = `No results found for "${query}".`;

        resultDiv.appendChild(message);
    }
}

// On page load, get query and render results
document.addEventListener("DOMContentLoaded", () => {
    const query = getQueryParam("q");
    renderSearchResults(query);
});