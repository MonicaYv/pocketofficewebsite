<a href="{{ url('bpo') }}"> <i class="fa fa-phone mr-2"></i>BPO Outsourcing </a>

<a href="{{ url('consulting') }}">
    <i class="fa fa-briefcase mr-2"></i>Consulting
</a>

<a href="{{ url('design') }}">
    <i class="fa fa-paint-brush mr-2"></i>Design & Media Studios
</a>

<a href="{{ url('education') }}">
    <i class="fa fa-graduation-cap mr-2"></i>Education
</a>

<a href="{{ url('finance-accounting') }}">
    <i class="fa fa-line-chart mr-2"></i>Finance & Accounting
</a>

<a href="{{ url('healthcare') }}">
    <i class="fa fa-heartbeat mr-2"></i>Healthcare
</a>

<a href="{{ url('it-software') }}">
    <i class="fa fa-desktop mr-2"></i>IT & Software Development
</a>

<a href="{{ url('legal-services') }}">
    <i class="fa fa-balance-scale mr-2"></i>Legal Services
</a>

<a href="{{ url('manufacturing') }}">
    <i class="fa fa-industry mr-2"></i>Manufacturing
</a>

<a href="{{ url('media-publishing') }}">
    <i class="fa fa-newspaper mr-2"></i>Media & Publishing
</a>

<a href="{{ url('retail-ecommerce') }}">
    <i class="fa fa-shopping-cart mr-2"></i>Retail & E-commerce
</a>
<script>
    (function () {
        const savedPageScroll = sessionStorage.getItem("industry_sidebar_page_scroll");
        const savedSidebarScroll = sessionStorage.getItem("industry_sidebar_scroll");

        if (savedPageScroll !== null) {
            if ('scrollRestoration' in history) {
                history.scrollRestoration = 'manual';
            }

            const restorePageScroll = () => {
                window.scrollTo({
                    top: parseInt(savedPageScroll, 10),
                    behavior: 'instant'
                });
            };

            restorePageScroll();
            document.addEventListener("DOMContentLoaded", restorePageScroll);
            window.addEventListener("load", restorePageScroll);

            sessionStorage.removeItem("industry_sidebar_page_scroll");
        }

        const initSidebar = () => {
            const currentUrl = window.location.href.split('?')[0].split('#')[0];
            const sidebarLinks = document.querySelectorAll(".sidebar a");

            sidebarLinks.forEach((link) => {
                const linkUrl = link.href.split('?')[0].split('#')[0];
                if (linkUrl === currentUrl) {
                    link.classList.add("active");
                }

                link.addEventListener("click", () => {
                    sessionStorage.setItem(
                        "industry_sidebar_page_scroll",
                        window.scrollY || window.pageYOffset || document.documentElement.scrollTop || 0
                    );
                    const sidebar = link.closest(".sidebar");
                    if (sidebar) {
                        sessionStorage.setItem("industry_sidebar_scroll", sidebar.scrollTop);
                    }
                });
            });

            if (savedSidebarScroll !== null) {
                const sidebar = document.querySelector(".sidebar");
                if (sidebar) {
                    sidebar.scrollTop = parseInt(savedSidebarScroll, 10);
                }
                sessionStorage.removeItem("industry_sidebar_scroll");
            }
        };

        if (document.readyState === "loading") {
            document.addEventListener("DOMContentLoaded", initSidebar);
        } else {
            initSidebar();
        }
    })();
</script>