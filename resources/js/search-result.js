// Function to extract query string
function getQueryParam(param) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(param) || "";
}

function renderSearchResults(query) {
    const resultDiv = document.getElementById("result-div");
    resultDiv.innerHTML = ""; // clear placeholder

    if (query.trim() === "") {
        resultDiv.innerHTML = "<p>Please enter a search term.</p>";
        return;
    }

    const filteredPages = pages.filter(page =>
        page.name.toLowerCase().includes(query) ||
        (page.keywords && page.keywords.toLowerCase().includes(query))
    );

    if (filteredPages.length > 0) {
        filteredPages.forEach(page => {
            const link = document.createElement("a");
            link.href = page.url;
            link.textContent = page.name;
            link.style.display = "block";

            resultDiv.appendChild(link);
        });
    } else {
        resultDiv.innerHTML = `<p style="color:red">No results found for "${query}".</p>`;
    }
}

// On page load, get query and render results
document.addEventListener("DOMContentLoaded", () => {
    const query = getQueryParam("q").toLowerCase();
    renderSearchResults(query);
});