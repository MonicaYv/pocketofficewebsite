const pages = [
  { name: "Home", url: "index.html" },
  { name: "About Us", url: "about.html" },
  { name: "Careers", url: "careers.html" },
  { name: "FAQ", url: "faq.html" },
  { name: "Getting Started", url: "documentation.html" },
  { name: "Pricing", url: "pricing.html" },
  { name: "News", url: "news.html" },
  { name: "Contact Us", url: "contact.html" },
  { name: "Submit a Ticket", url: "submit-ticket.html" },
  { name: "Sales Enquiry", url: "sales-enquiry.html" },
  { name: "Disclaimer", url: "disclaimer.html" },
  { name: "Privacy Policy", url: "privacy.html" },
  { name: "Terms & Conditions", url: "terms-condition.html" },
  { name: "Education", url: "education.html" },
  { name: "Consulting", url: "consulting.html" },
  { name: "IT & Software Development", url: "it-software.html" },
  { name: "Design & Media Studios", url: "design.html" },
  { name: "Healthcare", url: "healthcare.html" },
  { name: "Finance & Accounting", url: "finance-accounting.html" },
  { name: "Legal Services", url: "legal-services.html" },
  { name: "Manufacturing", url: "manufacturing.html" },
  { name: "Media & Publishing", url: "media-publishing.html" },
  { name: "Retail & Ecommerce", url: "retail-ecommerce.html" },
  { name: "BPO & Outsourcing", url: "bpo.html" },
  { name: "Core Features", url: "core-features.html" },
  { name: "Collaboration", url: "collaboration.html" },
  { name: "Security", url: "security.html" },
  { name: "Integrations", url: "integrations.html" },
  { name: "Solutions", url: "team-type.html" },
];

// Define extra keywords for each page (you can extend this as needed)
const extraKeywordsMap = {
  Home: [
    "location intelligence",
    "business solutions",
    "enterprise platform",
    "technology services",
    "navigation system",
    "business growth",
    "analytics dashboard",
    "enterprise tools",
  ],

  "About Us": [
    "company overview",
    "our team",
    "our mission",
    "our vision",
    "core values",
    "innovation",
    "technology partner",
    "business growth",
  ],

  Careers: [
    "jobs",
    "hiring",
    "careers opportunity",
    "employment",
    "join our team",
    "open positions",
    "work with us",
    "job application",
  ],

  FAQ: [
    "frequently asked questions",
    "help center",
    "customer support",
    "common issues",
    "troubleshooting",
    "technical support",
    "billing help",
  ],

  "Getting Started": [
    "documentation",
    "user guide",
    "integration guide",
    "setup instructions",
    "authentication",
    "quick start",
    "tutorials",
  ],

  Pricing: [
    "pricing plans",
    "subscription plans",
    "cost details",
    "packages",
    "enterprise plan",
    "business pricing",
    "compare plans",
  ],

  News: [
    "latest updates",
    "company news",
    "announcements",
    "press release",
    "blog articles",
  ],

  "Contact Us": [
    "contact information",
    "support email",
    "phone number",
    "customer care",
    "business inquiry",
    "office address",
  ],

  "Submit a Ticket": [
    "support ticket",
    "technical issue",
    "customer request",
    "report problem",
    "help desk",
    "submit request",
  ],

  "Sales Enquiry": [
    "sales contact",
    "request quote",
    "pricing inquiry",
    "business proposal",
    "enterprise sales",
  ],

  Disclaimer: [
    "legal notice",
    "terms disclaimer",
    "liability limitation",
    "no warranty",
    "third party links",
  ],

  "Privacy Policy": [
    "data protection",
    "user privacy",
    "data security",
    "cookies policy",
    "information usage",
    "gdpr compliance",
  ],

  "Terms & Conditions": [
    "terms of service",
    "user agreement",
    "legal agreement",
    "service terms",
    "usage policy",
  ],

  Education: [
    "education solutions",
    "campus solutions",
    "student management",
    "school administration",
    "university services",
    "smart campus",
  ],

  Consulting: [
    "business consulting",
    "strategy planning",
    "digital transformation",
    "enterprise advisory",
    "process optimization",
  ],

  "IT & Software Development": [
    "software solutions",
    "application development",
    "cloud platform",
    "system architecture",
    "custom software",
  ],

  "Design & Media Studios": [
    "creative studios",
    "media production",
    "interactive design",
    "ui ux design",
    "digital branding",
  ],

  Healthcare: [
    "hospital solutions",
    "clinic management",
    "emergency services",
    "healthcare systems",
    "pharmacy services",
  ],

  "Finance & Accounting": [
    "financial services",
    "banking solutions",
    "risk management",
    "fraud prevention",
    "accounting systems",
  ],

  "Legal Services": [
    "law firm solutions",
    "case management",
    "legal compliance",
    "document services",
    "regulatory services",
  ],

  Manufacturing: [
    "supply chain management",
    "factory operations",
    "asset management",
    "industrial solutions",
    "logistics management",
  ],

  "Media & Publishing": [
    "media distribution",
    "content management",
    "audience engagement",
    "digital publishing",
    "content strategy",
  ],

  "Retail & Ecommerce": [
    "online store solutions",
    "customer experience",
    "order management",
    "ecommerce platform",
    "retail growth",
  ],

  "BPO & Outsourcing": [
    "business process outsourcing",
    "remote operations",
    "call center solutions",
    "workflow optimization",
  ],

  "Core Features": [
    "enterprise tools",
    "automation",
    "performance optimization",
    "real time updates",
    "advanced capabilities",
  ],

  Collaboration: [
    "team collaboration",
    "shared workspace",
    "project coordination",
    "real time communication",
    "workflow tools",
  ],

  Security: [
    "data security",
    "encryption",
    "access control",
    "compliance standards",
    "cybersecurity",
  ],

  Integrations: [
    "third party services",
    "crm connection",
    "erp connection",
    "web platforms",
    "system connectivity",
  ],

  Solutions: [
    "industry solutions",
    "enterprise solutions",
    "business applications",
    "custom services",
    "use cases",
  ],
};

// Attach keywords to each page
pages.forEach((page) => {
  const baseKeywords = page.name
    .toLowerCase()
    .split(/\s+|&|,/)
    .filter(Boolean);
  const extraKeywords = extraKeywordsMap[page.name] || [];
  page.keywords = [
    ...new Set([...baseKeywords, ...extraKeywords.map((k) => k.toLowerCase())]),
  ].join(", ");
});

// 🔹 Search function
function smartSearch(query) {
  const resultsContainer = document.getElementById("search-results");
  resultsContainer.innerHTML = "";

  if (query.trim() === "") return;

  // Filter pages based on name OR keywords
  const filteredPages = pages.filter(
    (page) =>
      page.name.toLowerCase().includes(query) ||
      (page.keywords && page.keywords.toLowerCase().includes(query)),
  );

  if (filteredPages.length > 0) {
    filteredPages.forEach((page) => {
      const resultDiv = document.createElement("div");
      resultDiv.textContent = page.name;
      resultDiv.style.cursor = "pointer";
      resultDiv.style.padding = "10px 30px";
      resultDiv.style.backgroundColor = "#f9f9f9";
      resultDiv.addEventListener("click", () => {
        window.location.href = page.url; // Redirect
      });
      resultsContainer.appendChild(resultDiv);
    });
  } else {
    const noResultsDiv = document.createElement("div");
    noResultsDiv.textContent = `No results found for "${query}".`;
    noResultsDiv.style.color = "red";
    noResultsDiv.style.marginTop = "10px";
    resultsContainer.appendChild(noResultsDiv);
  }
}

document.getElementById("search-input").addEventListener("input", (e) => {
  smartSearch(e.target.value.toLowerCase());
});

document
  .getElementById("search-input")
  .addEventListener("keypress", function (e) {
    if (e.key === "Enter") {
      e.preventDefault();
      const query = this.value.trim();
      if (query !== "") {
        // Show search results before redirecting
        smartSearch(query.toLowerCase());

        // Delay redirect slightly so results are visible
        setTimeout(() => {
          window.location.href =
            "search-result.html?q=" + encodeURIComponent(query);
        }, 500); // 0.5s delay so results render
      }
    }
  });
