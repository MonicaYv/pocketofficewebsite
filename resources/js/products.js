 /* ===============================
   CORE FEATURES TABS FUNCTIONALITY
================================= */
 
 
 const tabs = document.querySelectorAll('.core-features-tab');
        const panels = document.querySelectorAll('.core-features-panel');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {

                tabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');

                const target = tab.getAttribute('data-tab');

                panels.forEach(panel => {
                    panel.classList.remove('active');
                    if (panel.id === target) {
                        panel.classList.add('active');
                    }
                });
            });
        });


        /* ===============================
   COLLABORATION TABS FUNCTIONALITY
================================= */

/* ===============================
   COLLABORATION TABS FUNCTIONALITY
================================= */

const collaborationTabs = document.querySelectorAll('.collaboration-tab');
const collaborationPanels = document.querySelectorAll('.collaboration-panel');

collaborationTabs.forEach(tab => {
    tab.addEventListener('click', () => {

        // Remove active from all tabs
        collaborationTabs.forEach(t => t.classList.remove('active'));

        // Add active to clicked tab
        tab.classList.add('active');

        const target = tab.getAttribute('data-tab');

        // Hide all panels
        collaborationPanels.forEach(panel => {
            panel.classList.remove('active');

            if (panel.getAttribute('data-panel') === target) {
                panel.classList.add('active');
            }
        });

    });
});




const IntegrationTabs = document.querySelectorAll(".integration-tab");
    const IntegrationPanel = document.querySelectorAll(".integration-panel");

    IntegrationTabs.forEach(function (tab) {

        tab.addEventListener("click", function () {

            // Remove active from all tabs
            IntegrationTabs.forEach(function (t) {
                t.classList.remove("active");
            });

            // Add active to clicked tab
            tab.classList.add("active");

            const target = tab.getAttribute("data-tab");

            // Hide all panels
            IntegrationPanel.forEach(function (panel) {
                panel.classList.remove("active");
            });

            // Show correct panel
            const activePanel = document.getElementById(target);
            if (activePanel) {
                activePanel.classList.add("active");
            }

        });

    });





