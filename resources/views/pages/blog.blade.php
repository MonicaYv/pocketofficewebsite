 @extends('layouts.backendsettings')
 @section('title', 'Cloud Desktop Blog | Insights, Updates & Guides | Pocket Office')
 @section('content')
 <!-- breadcrumb area start -->
 <div
     class="breadcrumb-area"
     style="background-image: url('{{ asset($constants['IMAGEFILEPATH'] . 'hero-images/product-update.svg') }}')">
     <div class="container">
         <div class="row">
             <div class="col-lg-12">
                 <div class="breadcrumb-inner">
                     <h1 class="page-title">Latest blogs, insights, and updates</h1>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- breadcrumb area end -->

 <!-- blog grid area start -->
 <div class="blog-page-area pd-default-two">
     <div class="container">
         <div class="row custom-gutters-60">
             <div class="col-lg-12">
                 <div class="news-grid" id="blog-containers">
                     <!-- Blog cards injected by blog.js -->
                 </div>
             </div>
         </div>
     </div>
 </div>
 <script>
const BLOG_DATA = [
    {
        id: "blog-001",
        filename: "blog-what-is-cloud-os",
        title: "What Is a Cloud OS? Everything You Need to Know",
        description: "A Cloud OS brings your entire desktop experience into the browser — no installations, no hardware limits, just seamless productivity from any device.",
        category: "Cloud Desktop",
        image: "/assets/img/index/pocket-office-work1.webp",
        date: "Feb 19, 2026",
        readTime: "5",
        author: "Pocketoffice Team",
        authorRole: "Cloud Workspace Insights"
    },
    {
        id: "blog-002",
        filename: "blog-cloud-vs-traditional-desktop",
        title: "Cloud Desktop vs Traditional Desktop: Which One Wins?",
        description: "Comparing cloud desktops and traditional setups across cost, security, flexibility, and performance.",
        category: "Cloud Desktop",
        image: "/assets/img/index/teams.webp",
        date: "Feb 17, 2026",
        readTime: "4",
        author: "Pocketoffice Team",
        authorRole: "Cloud Workspace Insights"
    },
   
    {
        id: "blog-004",
        filename: "blog-cloud-security",
        title: "Why Cloud Storage Security Is Better Than You Think",
        description: "Data breaches, compliance risks, and lost files are real concerns. Here's why cloud security matters.",
        category: "Security",
        image: "/assets/img/index/pocket-office-work3.webp",
        date: "Feb 12, 2026",
        readTime: "5",
        author: "Pocketoffice Team",
        authorRole: "Cloud Workspace Insights"
    },

];

document.addEventListener("DOMContentLoaded", function () {
    const container = document.getElementById("blog-containers");

    if (!container) return;

    container.innerHTML = BLOG_DATA.map(blog => `
        <div class="single-blog-item">
            <div class="thumb">
                <a href="/blog/${blog.filename}">
                    <img src="${blog.image}" alt="${blog.title}" loading="lazy">
                </a>
            </div>

            <div class="details">
                <div class="blog-meta">
                    <span>${blog.category}</span> |
                    <span>${blog.date}</span> |
                    <span>${blog.readTime} min read</span>
                </div>

                <h4>
                    <a href="/blog/${blog.filename}" style="color: #333; text-decoration: none;">
                        ${blog.title}
                    </a>
                </h4>

                <p>${blog.description}</p>

                <div class="author-info">
                    <strong>${blog.author}</strong><br>
                    <small>${blog.authorRole}</small>
                </div>

                <a href="/blog/${blog.filename}" class="btn btn-sm btn-primary mt-3">
                    Read More
                </a>
            </div>
        </div>
    `).join('');
});
</script>
 @endsection