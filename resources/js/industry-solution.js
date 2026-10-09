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
