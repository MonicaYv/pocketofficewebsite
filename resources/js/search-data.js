// ===============================
// ALL WEBSITE SEARCHABLE PAGES
// ===============================

const pages = [

/* ================= HOME ================= */

{ name: "Home", url: "index.html" },


/* ================= COMPANY ================= */

{ name: "About Us", url: "about.html" },
{ name: "Careers", url: "careers.html" },
{ name: "Contact Us", url: "contact-us.html" },


/* ================= RESOURCES ================= */

{ name: "Documentation", url: "documentation.html" },
{ name: "FAQ", url: "faq.html" },
{ name: "Blog Updates", url: "blog.html" },
{ name: "Latest News", url: "news.html" },


/* ================= LEGAL ================= */

{ name: "Terms & Conditions", url: "terms-condition.html" },
{ name: "Privacy Policy", url: "privacy.html" },
{ name: "Disclaimer", url: "disclaimer.html" },


/* ================= PRODUCTS ================= */

{ name: "Core Features", url: "core-features.html" },

{ name: "Cloud Desktop Environment", url: "core-features.html?tab=cloud" },
{ name: "File Manager & Storage", url: "core-features.html?tab=file" },
{ name: "Window Based Multitasking", url: "core-features.html?tab=window" },
{ name: "App Launcher", url: "core-features.html?tab=launcher" },
{ name: "Drag and Drop UI", url: "core-features.html?tab=drag" },
{ name: "Keyboard Shortcuts", url: "core-features.html?tab=keyboard" },
{ name: "Multi Device Sync", url: "core-features.html?tab=sync" },

{ name: "Collaboration", url: "collaboration.html" },
{ name: "Real Time File Sharing", url: "collaboration.html?tab=realtime" },
{ name: "Shared Workspaces", url: "collaboration.html?tab=workspace" },
{ name: "Team Permissions", url: "collaboration.html?tab=permissions" },
{ name: "Activity Tracking", url: "collaboration.html?tab=activity" },

{ name: "Security", url: "security.html" },
{ name: "Role Based Access", url: "security.html?tab=realtime" },
{ name: "Backup and Recovery", url: "security.html?tab=workspace" },
{ name: "Data Privacy Compliance", url: "security.html?tab=permissions" },


/* ================= SOLUTIONS ================= */

{ name: "Solutions", url: "team-type.html" },

{ name: "Remote Teams", url: "team-type.html?tab=remote" },
{ name: "Startups", url: "team-type.html?tab=startups" },
{ name: "Enterprises", url: "team-type.html?tab=enterprises" },
{ name: "Freelancers", url: "team-type.html?tab=freelancers" },

{ name: "File Sharing Solution", url: "use-case.html?tab=file-sharing" },
{ name: "Virtual Desktop Solution", url: "use-case.html?tab=virtual-desktop" },
{ name: "Team Workspaces Solution", url: "use-case.html?tab=team-workspaces" },
{ name: "Cloud Storage Solution", url: "use-case.html?tab=cloud-storage" },


/* ================= INTEGRATIONS ================= */

{ name: "Integrations", url: "integrations.html" },

{ name: "Alibaba OSS", url: "integrations.html?tab=alibaba" },
{ name: "Tencent COS", url: "integrations.html?tab=tencent-ios" },
{ name: "Qiniu Cloud", url: "integrations.html?tab=qiniucloud" },
{ name: "Amazon S3", url: "integrations.html?tab=amazon-s3" },
{ name: "Tianyi Cloud", url: "integrations.html?tab=tianyi-cloud" },
{ name: "XSKY SDS", url: "integrations.html?tab=sds" },
{ name: "Sangfor EDS", url: "integrations.html?tab=sangfor-eds" },
{ name: "MinIO", url: "integrations.html?tab=min-io" },
{ name: "FTP Storage", url: "integrations.html?tab=ftp" },
{ name: "WebDAV", url: "integrations.html?tab=web-dav" },
{ name: "Microsoft OneDrive", url: "integrations.html?tab=one-drive" },
{ name: "Google Drive", url: "integrations.html?tab=google-drive" },


/* ================= INDUSTRIES ================= */

{ name: "BPO Outsourcing", url: "bpo.html" },
{ name: "Consulting", url: "consulting.html" },
{ name: "Design and Media Studios", url: "design.html" },
{ name: "Education", url: "education.html" },
{ name: "Finance and Accounting", url: "finance-accounting.html" },
{ name: "Healthcare", url: "healthcare.html" },
{ name: "IT and Software Development", url: "it-software.html" },
{ name: "Legal Services", url: "legal-services.html" },
{ name: "Manufacturing", url: "manufacturing.html" },
{ name: "Media and Publishing", url: "media-publishing.html" },
{ name: "Retail and Ecommerce", url: "retail-ecommerce.html" },


/* ================= OTHER ================= */

{ name: "Pricing", url: "pricing.html" },

{ name: "Submit a Ticket", url: "https://helpdesk.pocketoffice.sizaf.com/submit-ticket" },
{ name: "Sales Enquiry", url: "contact-us.html" }

];



/* ================= DESCRIPTIONS ================= */

const descriptionMap = {

"Home":"Explore PocketOffice cloud workspace platform for teams and businesses.",

"About Us":"Learn about PocketOffice, our vision, mission, and global team.",

"Careers":"Join PocketOffice and build the future of cloud workspace technology.",

"Contact Us":"Contact our support or sales team for assistance.",

"Documentation":"Guides and technical documentation for using PocketOffice.",

"FAQ":"Frequently asked questions about PocketOffice services.",

"Blog Updates":"Product updates, tutorials, and announcements.",

"Latest News":"Latest company announcements and technology news.",

"Terms & Conditions":"Terms governing the use of PocketOffice platform.",

"Privacy Policy":"Information on how we collect and protect user data.",

"Disclaimer":"Legal disclaimer related to information on the website.",

"Core Features":"Explore core capabilities of the PocketOffice platform.",

"Collaboration":"Team collaboration tools and shared workspace features.",

"Security":"Enterprise security and access management.",

"Solutions":"Industry solutions for businesses and teams.",

"Integrations":"Connect PocketOffice with popular cloud storage providers.",

"Pricing":"Compare pricing plans and subscription options.",

"Submit a Ticket":"Create a support ticket for technical assistance.",

"Sales Enquiry":"Talk to our sales team about enterprise solutions."

};



/* ================= EXTRA KEYWORDS ================= */

const extraKeywordsMap = {

Home:["cloud","workspace","digital office","platform"],

Pricing:["plans","subscription","packages","cost"],

Security:["cybersecurity","data protection","encryption"],

Collaboration:["teamwork","file sharing","workspace"],

Integrations:["cloud storage","api","connectors"],

Careers:["jobs","hiring","employment"],

News:["updates","announcements","blog"]

};



/* ================= FINALIZE DATA ================= */

pages.forEach(page => {

const baseKeywords = page.name.toLowerCase().split(/\s+|&|,/);

const extraKeywords = extraKeywordsMap[page.name] || [];

page.keywords = [...new Set([...baseKeywords,...extraKeywords])].join(",");

page.description = descriptionMap[page.name] || "";

});