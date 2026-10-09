function initUseCase() {
    const allCards = document.querySelectorAll(".usecase-card");
    const allVideos = document.querySelectorAll(".usecase-card video");

    if (allCards.length === 0 && allVideos.length === 0) return;

    // Ensure all videos start with correct playback properties
    allVideos.forEach((video) => {
        video.muted = true;
        video.playsInline = true;
        video.loop = true;
    });

    // Helper: load video source if not loaded yet
    function loadVideoSource(video) {
        const source = video.querySelector("source[data-src]");
        if (source) {
            source.src = source.getAttribute("data-src");
            source.removeAttribute("data-src");
            video.load();
        }
    }

    // Helper: play video safely
    function playSafe(video) {
        loadVideoSource(video);
        const p = video.play();
        if (p !== undefined) {
            p.catch(() => {});
        }
    }

    // Helper: pause video safely
    function pauseSafe(video) {
        if (!video.paused) {
            video.pause();
        }
    }

    // IntersectionObserver: play only visible videos in the active tab; pause off-screen ones
    const videoObserver = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                const video = entry.target;
                const pane = video.closest(".features-tab-pane");
                const isActivePane = pane && pane.classList.contains("active");

                if (entry.isIntersecting && isActivePane) {
                    playSafe(video);
                } else {
                    pauseSafe(video);
                }
            });
        },
        {
            rootMargin: "100px 0px",
            threshold: 0.1,
        }
    );

    allVideos.forEach((v) => videoObserver.observe(v));

    // Card entrance observer on scroll
    const cardObserver = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("is-visible");
                    cardObserver.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.1 }
    );

    allCards.forEach((card) => cardObserver.observe(card));

    // Handle tab switching
    function handleTabSwitch(activeTabId) {
        if (!activeTabId) return;

        // 1. Immediately pause all videos in inactive tabs
        allVideos.forEach((video) => {
            const pane = video.closest(".features-tab-pane");
            if (!pane || pane.id !== activeTabId) {
                pauseSafe(video);
            }
        });

        // 2. Reveal all cards in the newly active tab
        const activePane = document.getElementById(activeTabId);
        if (activePane) {
            activePane.querySelectorAll(".usecase-card").forEach((card) => {
                card.classList.add("is-visible");
            });

            // 3. Play only videos that are currently visible in the viewport
            activePane.querySelectorAll("video").forEach((video) => {
                const rect = video.getBoundingClientRect();
                const inView =
                    rect.top < window.innerHeight + 100 && rect.bottom > -100;
                if (inView) {
                    playSafe(video);
                } else {
                    pauseSafe(video);
                }
            });
        }
    }

    // Hook into tab clicks
    const tabLinks = document.querySelectorAll(".features-tabs .nav-link");
    tabLinks.forEach((link) => {
        link.addEventListener("click", function () {
            const tabId = (this.dataset.tab || "").toString().trim();
            if (tabId) {
                setTimeout(() => {
                    handleTabSwitch(tabId);
                }, 30);
            }
        });
    });

    // Handle initial active tab on page load
    const initialActiveTab = document.querySelector(".features-tab-pane.active");
    if (initialActiveTab) {
        handleTabSwitch(initialActiveTab.id);
    }
}

if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initUseCase);
} else {
    initUseCase();
}
