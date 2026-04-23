/* ═══════════════════════════════════════════════════════════
   blog-details.js  –  Pocketoffice Blog Detail Renderer
   Reads ?id=blog-001 (or ?slug=blog-what-is-cloud-os)
   from the URL, finds the post in BLOG_DATA, and builds
   the entire page content dynamically.
═══════════════════════════════════════════════════════════ */

(function () {
  'use strict';

  /* ── 1. Parse URL param ──────────────────────────────────── */
  function getParam(key) {
    return new URLSearchParams(window.location.search).get(key);
  }

  function findBlog() {
    var id   = getParam('id');
    var slug = getParam('slug');
    if (!id && !slug) return null;
    return BLOG_DATA.find(function (b) {
      return b.id === id || b.filename === slug;
    }) || null;
  }

  /* ── 2. Escape HTML ──────────────────────────────────────── */
  function esc(str) {
    return String(str)
      .replace(/&/g, '&amp;')
      .replace(/</g, '&lt;')
      .replace(/>/g, '&gt;')
      .replace(/"/g, '&quot;');
  }

  /* ── 3. Build bullet list HTML ───────────────────────────── */
  function buildBullets(bullets) {
    if (!bullets || !bullets.length) return '';
    var items = bullets.map(function (b) {
      return '<li><strong>' + esc(b.label) + '</strong> — ' + esc(b.text) + '</li>';
    });
    return '<ul>' + items.join('') + '</ul>';
  }

  /* ── 4. Build scenario block HTML ────────────────────────── */
  function buildScenario(scenario) {
    if (!scenario) return '';
    var items = scenario.items.map(function (item) {
      return '<li><strong>' + esc(item.time) + '</strong> — ' + esc(item.text) + '</li>';
    });
    return (
      '<div class="bd-scenario">' +
        '<div class="bd-scenario-title">' + esc(scenario.title) + '</div>' +
        '<ul>' + items.join('') + '</ul>' +
      '</div>'
    );
  }

  /* ── 5. Build full article body HTML ─────────────────────── */
  function buildBody(blog) {
    var html = '';
    var pullInserted = false;

    blog.sections.forEach(function (section, idx) {
      if (section.heading) {
        html += '<h4>' + esc(section.heading) + '</h4>';
      }

      if (section.content) {
        html += '<p>' + esc(section.content) + '</p>';
      }

      /* Insert pull quote after first section */
      if (!pullInserted && idx === 0 && blog.pullQuote) {
        html += '<div class="bd-pull-quote"><p>' + esc(blog.pullQuote) + '</p></div>';
        pullInserted = true;
      }

      if (section.bullets) {
        html += buildBullets(section.bullets);
      }

      if (section.afterBullets) {
        html += '<p>' + esc(section.afterBullets) + '</p>';
      }

      if (section.scenario) {
        html += buildScenario(section.scenario);
      }
    });

    /* Verdict box */
    if (blog.verdict) {
      html +=
        '<div class="bd-verdict">' +
          '<strong>' + esc(blog.verdict.label) + '</strong>' +
          '<p>' + esc(blog.verdict.text) + '</p>' +
        '</div>';
    }

    return html;
  }

  /* ── 6. Build share URLs ─────────────────────────────────── */
  function buildShare(blog) {
    var pageUrl     = encodeURIComponent(window.location.href);
    var pageTitle   = encodeURIComponent(blog.title);
    var twitterEl   = document.getElementById('share-twitter');
    var linkedinEl  = document.getElementById('share-linkedin');
    if (twitterEl)  twitterEl.href  = 'https://twitter.com/intent/tweet?url=' + pageUrl + '&text=' + pageTitle;
    if (linkedinEl) linkedinEl.href = 'https://www.linkedin.com/sharing/share-offsite/?url=' + pageUrl;
  }

  /* ── 7. Render empty / not-found state ───────────────────── */
  function renderEmpty() {
    var heroEl = document.getElementById('bd-hero');
    if (heroEl) heroEl.style.minHeight = '30vh';

    var bodyEl = document.getElementById('bd-body');
    if (bodyEl) {
      bodyEl.innerHTML =
        '<div style="text-align:center;padding:60px 0;">' +
          '<div style="font-size:3rem;opacity:0.25;margin-bottom:20px;">📄</div>' +
          '<h3 style="font-family:var(--serif);margin-bottom:12px;">Blog post not found</h3>' +
          '<p style="color:var(--ink-muted);margin-bottom:28px;">The post you\'re looking for doesn\'t exist or the link may be incorrect.</p>' +
          '<a href="blog.html" style="display:inline-block;padding:12px 28px;background:var(--accent);color:#fff;border-radius:8px;text-decoration:none;font-weight:500;">← Back to Blog</a>' +
        '</div>';
    }
  }

  /* ── 8. Main render ──────────────────────────────────────── */
  function render() {
    var blog = findBlog();

    if (!blog) {
      renderEmpty();
      return;
    }

    /* Page <title> */
    document.title = blog.title + ' – Pocketoffice Blog';

    var heroImg = document.getElementById('bd-hero-img');
    if (heroImg) {
        heroImg.src = blog.image;
        heroImg.alt = blog.title;
        heroImg.style.width = "100%";
        heroImg.style.height = "500px";
        heroImg.style.objectFit = "cover";
    }

    /* Category pill */
    var catEl = document.getElementById('bd-category-text');
    if (catEl) catEl.textContent = blog.category;

    /* Title */
    var titleEl = document.getElementById('bd-title');
    if (titleEl) titleEl.textContent = blog.title;

    /* Meta: date / author / read time */
    var dateEl = document.getElementById('bd-date');
    if (dateEl) dateEl.textContent = blog.date;

    var authorEl = document.getElementById('bd-author');
    if (authorEl) authorEl.textContent = blog.author;

    var rtEl = document.getElementById('bd-read-time');
    if (rtEl) rtEl.textContent = blog.readTime + ' min read';

    /* Article body */
    var bodyEl = document.getElementById('bd-body');
    if (bodyEl) bodyEl.innerHTML = buildBody(blog);

    /* Author card */
    var nameEl   = document.getElementById('bd-author-name');
    var roleEl   = document.getElementById('bd-author-role');
    var initEl   = document.getElementById('bd-author-initials');
    if (nameEl)  nameEl.textContent  = blog.author;
    if (roleEl)  roleEl.textContent  = blog.authorRole;
    if (initEl)  initEl.textContent  = blog.author.charAt(0).toUpperCase();

    /* Share buttons */
    buildShare(blog);
  }

  /* ── 9. Reading progress bar ─────────────────────────────── */
  function initProgress() {
    var bar = document.getElementById('read-progress');
    if (!bar) return;
    window.addEventListener('scroll', function () {
      var h   = document.documentElement;
      var pct = (window.scrollY / (h.scrollHeight - h.clientHeight)) * 100;
      bar.style.width = Math.min(pct, 100) + '%';
    }, { passive: true });
  }

  /* ── 10. Copy link button ────────────────────────────────── */
  function initCopy() {
    var btn   = document.getElementById('share-copy');
    var label = document.getElementById('copy-label');
    if (!btn || !label) return;

    btn.addEventListener('click', function () {
      var done = function () {
        label.textContent = 'Copied!';
        btn.classList.add('copied');
        setTimeout(function () {
          label.textContent = 'Copy link';
          btn.classList.remove('copied');
        }, 2000);
      };

      if (navigator.clipboard) {
        navigator.clipboard.writeText(window.location.href).then(done).catch(done);
      } else {
        var tmp = document.createElement('input');
        tmp.value = window.location.href;
        document.body.appendChild(tmp);
        tmp.select();
        document.execCommand('copy');
        document.body.removeChild(tmp);
        done();
      }
    });
  }

  /* ── Boot ────────────────────────────────────────────────── */
  document.addEventListener('DOMContentLoaded', function () {
    render();
    initProgress();
    initCopy();
  });

})();
