const analyticsConfig = {
    googleMeasurementId: "G-HQ34D3KCXF",
    metaPixelId: "467144275341276",
};

function initializeGoogleAnalytics(measurementId) {
    window.dataLayer = window.dataLayer || [];
    window.gtag = window.gtag || function () {
        window.dataLayer.push(arguments);
    };

    window.gtag("js", new Date());
    window.gtag("config", measurementId);

    const script = document.createElement("script");
    script.async = true;
    script.src = `https://www.googletagmanager.com/gtag/js?id=${encodeURIComponent(measurementId)}`;
    document.head.appendChild(script);
}

function initializeMetaPixel(pixelId) {
    if (!window.fbq) {
        const fbq = function () {
            if (fbq.callMethod) {
                fbq.callMethod.apply(fbq, arguments);
            } else {
                fbq.queue.push(arguments);
            }
        };

        fbq.push = fbq;
        fbq.loaded = true;
        fbq.version = "2.0";
        fbq.queue = [];
        window.fbq = fbq;
        window._fbq = fbq;

        const script = document.createElement("script");
        script.async = true;
        script.src = "https://connect.facebook.net/en_US/fbevents.js";
        document.head.appendChild(script);
    }

    window.fbq("init", pixelId);
    window.fbq("track", "PageView");
}

initializeGoogleAnalytics(analyticsConfig.googleMeasurementId);
initializeMetaPixel(analyticsConfig.metaPixelId);
