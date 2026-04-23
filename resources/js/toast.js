    const toastContainers = document.querySelector("#toast-container-mb");
    const toastContainer = $("#Notice");
    var canPlaySound = '';
    let soundReady = false;
    window.addEventListener('click', () => {
        const sound = document.getElementById('notificationSound');
        if (sound && !soundReady) {
            sound.play().catch(() => {}); // user-initiated unlock
            sound.pause();
            sound.currentTime = 0;
            soundReady = true;
            console.log('🔓 Notification sound unlocked');
        }
    });
    function createToast(title, message, type, time, id) {
        let html = ``;
        // let toast = document.createElement("div");
    
        if (type === 'Strong prompt') {
            // toast.setAttribute("id", "preview-modal");
            // toast.setAttribute("role", "dialog");
            // toast.className = "fixed inset-0 flex items-center z-10 justify-center bg-black bg-opacity-50 previewmodal";
            html = `<div class="fixed inset-0 flex items-center z-10 justify-center bg-black bg-opacity-50 previewmodal" role="dialog" id="preview-modal">
                <div class="w-full max-w-md rounded-2xl bg-white overflow-hidden modal-content" style="height: 400px;">
                    <div class="flex justify-between py-4 border-b-2 items-center relative">
                        <div class="flex mx-auto items-center gap-2">
                            <i class="ri-message-2-line ri-xl"></i>
                            <h2 class="text-base text-c-black font-bold">${title}</h2>
                        </div>
                        <i class="ri-close-circle-fill ri-lg cursor-pointer absolute right-3 top-3 dismissModel"
                            data-id="${id}"></i>
                    </div>
                    <div class="border-b-2 h-72">
                        <div class="flex justify-end pt-1 px-6">
                            <button class="text-c-yellow MarkasRead" data-id="${id}">Mark as read</button>
                        </div>
                        <div class="px-6 pb-2">
                            <div id="message" class="h-48 text-sm overflow-y-scroll mini-scroll leading-normal pr-1">
                                ${message}
                            </div>
                        </div>
                    </div>
                    <div class="footer px-6 py-3">
                        <span class="text-c-black text-sm">${moment(time).format('YYYY-MM-DD')} at ${moment(time).format('H:mm:ss')}</span>
                    </div>
                </div>
                </div>
            `;
        } else {
            // if (type === 'Weak hint') {
            // toast.classList.add("toptoast", "success");
            html = `<div class="toptoast success" id="preview-modal">
                <div id="icon-wrapper">
                    <button id="icon" class="btnSettings">
                        <i class="ri-settings-2-line text-c-black"></i>
                    </button>
                </div>
                <div class="toptoast-message text-c-black">
                    <h4>${title}</h4>
                    <p>${message}</p>
                </div>
                <button class="toptoast-close text-c-black">ok</button>
                <div class="timer"></div>
                </div>
            `;
        }
    
        // toast.innerHTML = html;
        if (type === 'Strong prompt') {
            toastContainer.html(html);
        } else {
            toastContainers.innerHTML = html;
        }
    
        const sound = document.getElementById('notificationSound');
        if (soundReady && sound) sound.play();

        let toast = document.getElementById("preview-modal");
        
        // Auto-remove after timeout
        setTimeout(() => {
            toast.style.animation = "slide-out 0.3s ease-out forwards";
            setTimeout(() => toast.remove(), 300);
        }, 9000);
    
        // Close button handler if it exists
        const closeBtn = toast.querySelector(".toptoast-close");
        if (closeBtn) {
            closeBtn.addEventListener("click", () => {
                toast.style.animation = "slide-out 0.3s ease-out forwards";
                setTimeout(() => toast.remove(), 300);
            });
        }
    }
    

    $(document).on('click', '.btnSettings', function() {
        if (canPlaySound != null) {
            var rdtoast = $(this).closest('.toptoast').css("animation", "slide-out 0.3s ease-out forwards");
            setTimeout(() => rdtoast.remove(), 300);
            const settingApp = $(document).find('#SettingIcon');
            const appkey = settingApp.attr('data-appkey');
            const filekey = settingApp.attr('data-filekey');
            const filetype = settingApp.attr('data-filetype');
            const apptype = settingApp.attr('data-apptype');
            const originalIcon = $(document).find('#SettingIcon');
            const imgicon = $('#iframeheaders #iframeiconimage' + filetype + appkey);
            const iframedata = {
                appkey: appkey,
                filekey: filekey,
                filetype: filetype,
                apptype: apptype
            };
            openiframe(iframedata);
            animateIcon(imgicon, originalIcon);
        }
    });
