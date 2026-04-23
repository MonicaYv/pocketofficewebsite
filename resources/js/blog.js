/* ═══════════════════════════════════════════════════════════
   blog.js  –  Renders blog card grid from BLOG_DATA
   Links each card to: blog-details.html?id=blog-001 etc.
   Requires: blog-data.js loaded before this file.
═══════════════════════════════════════════════════════════ */

$(document).ready(function () {

    var blogContainer = $('#blog-container');
    if (!blogContainer.length) return;

    if (typeof BLOG_DATA === 'undefined' || !BLOG_DATA.length) {
        blogContainer.html('<p>No blog posts available.</p>');
        return;
    }

    BLOG_DATA.forEach(function (blog) {

        var html =
            '<div class="news-item">' +
                '<div class="modern-card">' +
                    '<div class="thumb">' +
                        '<img src="' + blog.image + '"' +
                             ' alt="' + blog.title + '"' +
                             ' width="400"' +
                             ' height="220"' + 
                             ' class="img-fluid"' +
                             ' loading="lazy"' +
                             ' onerror="this.parentElement.style.display=\'none\'">' +
                    '</div>' +
                    '<div class="single-blog-details">' +
                        '<ul class="post-meta">' +
                            '<li>' + blog.date + '</li>' +
                            '<li>' + blog.category + '</li>' +
                        '</ul>' +
                        '<h5 class="clamp-2">' + blog.title + '</h5>' +
                        '<p class="clamp-2">' + blog.description + '</p>' +
                        '<a href="blog-details.html?id=' + blog.id + '" class="article-link">' +
                            'Read More' +
                        '</a>' +
                    '</div>' +
                '</div>' +
            '</div>';

        blogContainer.append(html);
    });

});
