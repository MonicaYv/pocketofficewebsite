@extends('layouts.backendsettings')
@section('title', 'Frequently Asked Questions About Cloud Desktop | Pocket Office')
@section('content')

<!-- breadcrumb area start -->
<div class="breadcrumb-area" style="background-image:url({{ asset('assets/img/hero-images/faq.svg') }});">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner">
                    <h1 class="page-title">FAQ</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb area End -->

<!-- faq area start -->
<div class="faq-area pd-top-30 pd-bottom-60">
    <div class="container">

        <!-- Hero -->
        <div class="faq-hero text-center mb-4">
            <h2 class="faq-main-title mt-3 mb-2"><span class="text-purple">Frequently Asked Questions</h2>
            <p class="faq-sub-text mx-auto mb-4">Find answers to commonly asked questions about our services, support, and company information.</p>
            <div class="faq-search-wrap mx-auto">
                <i class="ti ti-search faq-search-icon"></i>
                <input type="text" id="faqSearch" class="faq-search-input" placeholder="Search for questions or keywords..." oninput="filterFAQ()">
            </div>
        </div>

        <!-- Tabs -->
        <div class="faq-tabs-bar d-flex flex-wrap justify-content-center gap-2 mb-4">
            <button class="faq-tab-btn active" onclick="switchTab('all', this)">View All</button>
            <button class="faq-tab-btn" onclick="switchTab('group', this)">For Group Users</button>
            <button class="faq-tab-btn" onclick="switchTab('individual', this)">Individual Users</button>
        </div>

        <!-- FAQ Grid -->
        <div class="faq-grid" id="faqGrid">
            <!-- rendered by JS -->
        </div>

    </div>
</div>
<!-- faq area End -->

<!-- Contact Info Area -->
<div class="more-question-area pd-top-30">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-9">
                <div class="section-title text-center margin-bottom-90">
                    <h2 class="title">Get In Touch</h2>
                    <p>Our support team will get assistance from AI-powered suggestions, making it quicker than ever to handle support requests.</p>
                </div>
            </div>
        </div>

        <div class="faq-cards">
            <!-- Phone & Email -->
            <div class="faq-card-contact">
                <div class="faq-card-head">
                    <span class="faq-card-heading">Phone Number</span>
                    <p class="faq-card-info">+ 91 9967940928</p>
                    <p class="faq-card-info">+ 60 146600012</p>
                </div>
                <div class="faq-contact-divider"></div>
                <div class="faq-card-head">
                    <span class="faq-card-heading">Email Address</span>
                    <p class="faq-card-info">info@aibuzz.net</p>
                    <p class="faq-card-info">support@aibuzz.net</p>
                </div>
            </div>

            <!-- Address Cards -->
            <div class="faq-cards-row">
                <div class="faq-card">
                    <div class="faq-card-head">
                        <span class="faq-card-heading">Regional Address</span>
                        <span class="region-heading">USA</span>
                        <p class="faq-card-info">218-10, Hillside Ave, Queens Village, New York, USA, 11427.</p>
                    </div>
                </div>
                <div class="faq-card">
                    <div class="faq-card-head">
                        <span class="faq-card-heading">Regional Address</span>
                        <span class="region-heading">Malaysia</span>
                        <p class="faq-card-info">M116, Jalan Mega Mendung, Off Jalan Klang Lama, 58200, Kuala Lumpur, Malaysia.</p>
                    </div>
                </div>
                <div class="faq-card">
                    <div class="faq-card-head">
                        <span class="faq-card-heading pt-3">Regional Address</span>
                        <span class="region-heading">India</span>
                        <p class="faq-card-info">3102, 1st Floor, Rustomjee Eaze Zone, Sundar Nagar, Malad West - Mumbai 400064, MH</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* ── Hero ── */
.faq-badge {
    display: inline-block;
    background: #7F77DD;
    color: #fff;
    font-size: 12px;
    padding: 5px 18px;
    border-radius: 20px;
    font-weight: 500;
}
.faq-main-title {
    font-size: 28px;
    font-weight: 700;
    color: #1a1a2e;
}
.text-purple { color: #7F77DD; }
.faq-sub-text {
    font-size: 15px;
    color: #6b7280;
    max-width: 560px;
    line-height: 1.6;
}

/* ── Search ── */
.faq-search-wrap {
    position: relative;
    max-width: 540px;
}
.faq-search-icon {
    position: absolute;
    left: 14px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 16px;
    color: #9ca3af;
}
.faq-search-input {
    width: 100%;
    padding: 11px 16px 11px 42px;
    border: 1px solid #e5e7eb;
    border-radius: 10px;
    font-size: 14px;
    color: #1a1a2e;
    background: #fff;
    outline: none;
    transition: border-color .2s;
}
.faq-search-input:focus { border-color: #7F77DD; }

/* ── Tabs ── */
.faq-tab-btn {
    padding: 7px 20px;
    border: 1px solid #e5e7eb;
    border-radius: 20px;
    background: #fff;
    color: #6b7280;
    font-size: 13px;
    cursor: pointer;
    transition: all .15s;
}
.faq-tab-btn:hover {
    border-color: rgb(6, 148, 183);
    color: #7F77DD;
}
.faq-tab-btn.active {
    background: rgb(6, 148, 183);
    border-color: rgb(6, 148, 183);
    color: #fff;
}

/* ── Grid ── */
.faq-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 14px;
    max-width: 920px;
    margin: 0 auto;
}
@media (max-width: 640px) {
    .faq-grid { grid-template-columns: 1fr; }
}

/* ── Accordion card ── */
.faq-acc-item {
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    overflow: hidden;
    transition: border-color .15s;
}
.faq-acc-item.open { border-color: #c4b9f7; }
.faq-acc-head {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    padding: 14px 16px;
    cursor: pointer;
    user-select: none;
}
.faq-acc-icon {
    width: 30px;
    height: 30px;
    border-radius: 7px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    margin-top: 1px;
    font-size: 15px;
}
.faq-acc-q {
    flex: 1;
    font-size: 13.5px;
    font-weight: 600;
    color: #1a1a2e;
    line-height: 1.4;
}
.faq-acc-chevron {
    font-size: 16px;
    color: #9ca3af;
    flex-shrink: 0;
    transition: transform .2s;
}
.faq-acc-item.open .faq-acc-chevron { transform: rotate(180deg); }
.faq-acc-body {
    display: none;
    padding: 0 16px 14px 15px;
    font-size: 13px;
    color: #6b7280;
    line-height: 1.6;
}
.faq-acc-item.open .faq-acc-body { display: block; }
.faq-no-results {
    grid-column: 1 / -1;
    text-align: center;
    padding: 2.5rem;
    color: #9ca3af;
    font-size: 14px;
}
.faq-grid {
    align-items: start !important;
}

.faq-grid > * {
    height: auto !important;
}
</style>
<script>
const faqData = [
    // Group Users - General
    {
        q: "What exactly is Pocket Office?",
        a: "Think of Pocket Office as your personal computer that lives in the cloud instead of a physical box under your desk. It's a virtual desktop you access through any web browser, giving you a full, familiar desktop experience—complete with icons, folders, and apps—from any device, anywhere.",
        icon: "fa-angle-desktop", bg: "#E1F5EE", color: "#0F6E56", tab: "group"
    },
    {
        q: "Why should my company switch to a Cloud Desktop (DaaS)?",
        a: "It saves money and simplifies IT. You don't need expensive, high-spec hardware for every employee because the heavy lifting happens in the cloud. It also makes remote work seamless, as your team can log in from a home laptop, a tablet, or a public computer and find everything exactly where they left it.",
        icon: "ti-building", bg: "#EEEDFE", color: "#534AB7", tab: "group"
    },
    {
        q: "Do I need to be tech-savvy to use it?",
        a: "Not at all. If you can use a standard Windows or Mac desktop, you can use Pocket Office. The interface is designed to be intuitive—just log in, and you're ready to work.",
        icon: "ti-mood-smile", bg: "#E1F5EE", color: "#0F6E56", tab: "group"
    },
    // ROI & Scalability
    {
        q: "How does Pocket Office help us save on IT costs?",
        a: "You can stop buying expensive new computers every few years. Since the desktop runs in our cloud, you can extend the life of your existing hardware. Our tiered pricing lets you scale up or down based on your exact user count, so you never pay for licenses you aren't using.",
        icon: "ti-coin", bg: "#FAEEDA", color: "#854F0B", tab: "group"
    },
    {
        q: "How fast can I set up my team on Pocket Office?",
        a: "Extremely fast. Because it's a cloud-native platform, you can provision or de-provision users in minutes. Whether you are onboarding a new hire or expanding into a new office, your team can be up and running instantly.",
        icon: "ti-rocket", bg: "#E1F5EE", color: "#0F6E56", tab: "group"
    },
    {
        q: "Can we use our existing office software?",
        a: "Yes. Pocket Office is designed to be an integration hub. We support popular tools like ERPNext, Collabora Office, and more. If you use custom apps, we provide API integrations to ensure they run smoothly within your virtual desktop.",
        icon: "ti-plug", bg: "#EEEDFE", color: "#534AB7", tab: "group"
    },
    {
        q: "Can we customize the desktop to match our company branding?",
        a: "Absolutely. You can brand the login screen and the desktop interface with your company logo and colors. It creates a professional, unified look for all employees, no matter where they are located.",
        icon: "ti-palette", bg: "#EEEDFE", color: "#534AB7", tab: "group"
    },
    // Security & Compliance
    {
        q: "Is my company's data safe in the cloud?",
        a: "Security is built into our core. Your data is isolated in a multi-tenant environment, meaning your information is completely separated from other companies. We also use advanced role-based permissions, so employees only see the data they are authorized to access.",
        icon: "ti-lock", bg: "#EEEDFE", color: "#534AB7", tab: "group"
    },
    {
        q: "Can we restrict access based on geography?",
        a: "Yes. For security purposes, you can enable geo-based restrictions. This ensures that your company data can only be accessed from approved locations, giving you total control over your digital perimeter.",
        icon: "ti-map-pin", bg: "#FAECE7", color: "#993C1D", tab: "group"
    },
    {
        q: "What happens if an employee leaves the company?",
        a: "Admin control is simple. You can immediately revoke access and de-provision the user. Because the data lives in the cloud and not on their personal hard drive, you don't have to worry about sensitive company files remaining on a local device.",
        icon: "ti-user-off", bg: "#FCEBEB", color: "#A32D2D", tab: "group"
    },
    {
        q: "Is Pocket Office compliant with local regulations (like PDPA or GDPR)?",
        a: "Yes, we designed Pocket Office to meet strict regulatory standards. We provide full audit logs and activity tracking, so you always know who accessed what data and when, helping you stay compliant with local data privacy laws.",
        icon: "ti-certificate", bg: "#E1F5EE", color: "#0F6E56", tab: "group"
    },
    // Collaboration
    {
        q: "Can my team share files easily?",
        a: "Yes. Pocket Office features a centralized file management system. You can share files with specific team members, set folder permissions, and even create time-limited links for external sharing—all within the secure environment.",
        icon: "ti-share", bg: "#E6F1FB", color: "#185FA5", tab: "group"
    },
    {
        q: "Does it work if I have employees in different countries?",
        a: "Definitely. Pocket Office is a global-first solution. Your team in the USA, India, or Malaysia can all work on the same virtual desktop, using the same apps, regardless of their local internet speed or hardware quality.",
        icon: "ti-world", bg: "#E1F5EE", color: "#0F6E56", tab: "group"
    },
    {
        q: "What if we have a lot of files?",
        a: "We offer flexible storage. You can start with a standard quota per user or pool storage at the company level. If your needs grow, you can simply expand your storage with our add-on plans.",
        icon: "ti-database", bg: "#EEEDFE", color: "#534AB7", tab: "group"
    },
    {
        q: "Is there a dashboard to see how our team is using the system?",
        a: "Yes. Our analytics dashboard gives you a clear view of storage usage, application performance, and team activity. It helps you track costs and productivity at a glance, making it easy to manage your resources.",
        icon: "ti-layout-dashboard", bg: "#E6F1FB", color: "#185FA5", tab: "group"
    },
    {
        q: "Can I upgrade or downgrade my plan later?",
        a: "Yes. Upgrades take effect immediately; downgrades apply at the next billing cycle.",
        icon: "ti-refresh", bg: "#E6F1FB", color: "#185FA5", tab: "individual"
    },
    {
        q: "How does billing work?",
        a: "Choose monthly or annual billing, with discounts available for annual subscriptions.",
        icon: "ti-credit-card", bg: "#FAEEDA", color: "#854F0B", tab: "individual"
    },
    {
        q: "How do I update my billing information?",
        a: "Update billing details from your account or admin settings—changes apply automatically to future invoices.",
        icon: "ti-edit", bg: "#FAEEDA", color: "#854F0B", tab: "individual"
    },
    {
        q: "What happens if my payment fails?",
        a: "You'll be notified and given time to update billing information. Workspace access continues during this period.",
        icon: "ti-alert-triangle", bg: "#FAECE7", color: "#993C1D", tab: "individual"
    },
    {
        q: "Can I cancel my subscription anytime?",
        a: "Yes. Access continues until the end of the current billing period.",
        icon: "ti-x", bg: "#FCEBEB", color: "#A32D2D", tab: "individual"
    },
    {
        q: "Do you offer invoices for billing?",
        a: "Invoices are available for Business and Enterprise plans and can be downloaded from the billing section of your account.",
        icon: "ti-file-invoice", bg: "#E1F5EE", color: "#0F6E56", tab: "all"
    },
 
    // ── Individual Users ──
    {
        q: "What is Pocket Office, and how does it benefit me?",
        a: "Pocket Office is a cloud-based desktop that runs entirely in your web browser. Instead of carrying a heavy laptop or worrying about software updates, you get a clean, personal computer environment accessible from any device—even a cheap tablet or a public computer—while keeping all your files and apps in one secure place.",
        icon: "ti-device-laptop", bg: "#E1F5EE", color: "#0F6E56", tab: "individual"
    },
    {
        q: "Can I really replace my physical laptop with this?",
        a: "Yes! Because Pocket Office handles the computing power in the cloud, you can perform most daily tasks—writing documents, managing spreadsheets, browsing, and messaging—right inside the browser. It's perfect for freelancers, students, and remote workers who want to stay productive without being tied to one machine.",
        icon: "ti-laptop", bg: "#EEEDFE", color: "#534AB7", tab: "individual"
    },
    {
        q: "Do I need to install any software on my computer?",
        a: "Not at all. Pocket Office is browser-based, meaning there is zero installation required. Just open your favorite browser, log in, and your desktop is ready. It works on Windows, Mac, Linux, and even Chromebooks.",
        icon: "ti-download-off", bg: "#E1F5EE", color: "#0F6E56", tab: "individual"
    },
    {
        q: "Where are my files saved, and can I access them offline?",
        a: "Your files are stored securely in the cloud and backed up automatically. While you need an internet connection to access the Pocket Office desktop, if your physical device is lost or stolen, your files remain safe, accessible, and recoverable.",
        icon: "ti-cloud", bg: "#E6F1FB", color: "#185FA5", tab: "individual"
    },
    {
        q: "How secure is my personal data?",
        a: "We use high-level encryption to protect your data. Pocket Office provides a dedicated, private space for your work. You control your permissions, and your data is completely isolated from other users.",
        icon: "ti-lock", bg: "#EEEDFE", color: "#534AB7", tab: "individual"
    },
    {
        q: "Can I add my own apps to the desktop?",
        a: "Absolutely. We offer a marketplace where you can easily add tools for productivity, messaging, and office work. If you have a favorite web-based tool, you can link it to your desktop for quick, one-click access.",
        icon: "ti-apps", bg: "#E1F5EE", color: "#0F6E56", tab: "individual"
    },
    {
        q: "Does Pocket Office slow down my old computer?",
        a: "Actually, it does the opposite! Since Pocket Office does all the processing in the cloud, your local computer doesn't need to work hard. It's a great way to keep using an older or slower laptop without the performance lag you'd usually feel.",
        icon: "ti-bolt", bg: "#FAEEDA", color: "#854F0B", tab: "individual"
    },
    {
        q: "Is my privacy protected?",
        a: "Yes. We are committed to strict privacy policies. Unlike some free software that monetizes your data, Pocket Office is a subscription-based service where your information is used solely to provide your desktop environment—we do not sell your personal data to advertisers.",
        icon: "ti-shield", bg: "#EEEDFE", color: "#534AB7", tab: "individual"
    },
    {
        q: "What happens if I forget my password?",
        a: "Just like any modern online service, you can reset your password using your verified email address. Because your desktop is in the cloud, your access is restored immediately, no matter where you are or what device you are using.",
        icon: "ti-key", bg: "#FAECE7", color: "#993C1D", tab: "individual"
    },
    {
        q: "How much does it cost, and can I cancel anytime?",
        a: "We offer simple, transparent pricing plans. You can choose a monthly subscription that fits your needs, and you are free to cancel whenever you like. There are no long-term hardware contracts or hidden fees.",
        icon: "ti-cash", bg: "#E1F5EE", color: "#0F6E56", tab: "individual"
    },
];
let currentTab = 'all';

function switchTab(tab, btn) {
    currentTab = tab;
    document.querySelectorAll('.faq-tab-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    document.getElementById('faqSearch').value = '';
    renderFAQ(getFiltered(''));
}

function filterFAQ() {
    const q = document.getElementById('faqSearch').value.toLowerCase().trim();
    renderFAQ(getFiltered(q));
}

function getFiltered(query) {
    return faqData.filter(f => {
        const matchTab = currentTab === 'all' || f.tab === currentTab || f.tab === 'all';
        const matchQ   = !query || f.q.toLowerCase().includes(query) || f.a.toLowerCase().includes(query);
        return matchTab && matchQ;
    });
}

function renderFAQ(list) {
    const grid = document.getElementById('faqGrid');
    if (!list.length) {
        grid.innerHTML = '<div class="faq-no-results"><i class="ti ti-mood-sad" style="font-size:24px;display:block;margin-bottom:8px"></i>No questions found.</div>';
        return;
    }
    grid.innerHTML = list.map((f, i) => `
        <div class="faq-acc-item" id="faqAcc${i}">
            <div class="faq-acc-head" onclick="toggleAcc(${i})">
                
                <span class="faq-acc-q">${f.q}</span>
                <i class="fa fa-angle-down"></i>
            </div>
            <div class="faq-acc-body">${f.a}</div>
        </div>
    `).join('');
}

function toggleAcc(i) {
    const el = document.getElementById('faqAcc' + i);
    const wasOpen = el.classList.contains('open');
    document.querySelectorAll('.faq-acc-item.open').forEach(e => e.classList.remove('open'));
    if (!wasOpen) el.classList.add('open');
}

renderFAQ(getFiltered(''));
</script>

@endsection