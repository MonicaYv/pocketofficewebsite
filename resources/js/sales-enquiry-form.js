(function () {
    // ==========================================
    // TOASTR DYNAMIC LOADING
    // ==========================================
    function ensureToastrLoaded() {
        if (window.toastr) return Promise.resolve();

        return new Promise(function (resolve, reject) {
            var existingScript = document.querySelector(
                'script[data-toastr-dynamic="1"]',
            );
            if (existingScript) {
                existingScript.addEventListener("load", function () {
                    resolve();
                });
                existingScript.addEventListener("error", function () {
                    reject(new Error("Toastr load failed"));
                });
                return;
            }

            if (!document.querySelector('link[data-toastr-dynamic="1"]')) {
                var link = document.createElement("link");
                link.rel = "stylesheet";
                link.href =
                    "https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css";
                link.setAttribute("data-toastr-dynamic", "1");
                document.head.appendChild(link);
            }

            var script = document.createElement("script");
            script.src =
                "https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js";
            script.setAttribute("data-toastr-dynamic", "1");
            script.onload = function () {
                resolve();
            };
            script.onerror = function () {
                reject(new Error("Toastr load failed"));
            };
            document.head.appendChild(script);
        });
    }

    function showToastrError(message) {
        ensureToastrLoaded()
            .then(function () {
                toastr.error(message);
            })
            .catch(function () {
                console.error(message);
            });
    }

    function showToastrSuccess(message) {
        ensureToastrLoaded()
            .then(function () {
                toastr.success(message);
            })
            .catch(function () {
                console.log(message);
            });
    }

    // ==========================================
    // VALIDATION HELPERS
    // ==========================================
    function validateName(name) {
        return /^[A-Za-z\s]+$/.test(name);
    }

    // Allow country code formats (starts with + or digits) in select validation, digits for standard phone
    function validatePhone(phone) {
        return /^[0-9]{10}$/.test(phone);
    }

    function validateEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }

    function validateWebsite(url) {
        const pattern =
            /^(https?:\/\/)?([\w\-]+\.)+[\w\-]{2,}(\/[\w\-._~:/?#[\]@!$&'()*+,;=]*)?$/i;
        return pattern.test(url);
    }

    // ==========================================
    // DOM ERROR RENDERING (Bootstrap invalid-feedback version)
    // ==========================================
    function showInputError(input, message) {
        input.addClass("is-invalid");
        // Dynamically update the native .invalid-feedback block next to it
        var feedback = input.closest(".form-item").find(".invalid-feedback");
        if (feedback.length) {
            feedback.text(message).show();
        }
    }

    function removeInputError(input) {
        input.removeClass("is-invalid");
        var feedback = input.closest(".form-item").find(".invalid-feedback");
        if (feedback.length) {
            feedback.hide();
        }
    }

    // ==========================================
    // CUSTOM SELECT DROPDOWNS IMPLEMENTATION
    // ==========================================
    function setupCustomDropdown(selectId) {
        var selects = document.querySelectorAll("#" + selectId);
        selects.forEach(function (select) {
            if (!select) return;

            // Prevent multiple wraps
            if (select.dataset.customDropdownInitialized === "1") return;
            select.dataset.customDropdownInitialized = "1";

            // Hide select element
            select.style.setProperty("display", "none", "important");

            // Create dropdown container wrapper
            var container = document.createElement("div");
            container.className = "custom-dropdown-container";
            container.setAttribute("data-select-id", select.id || selectId);

            // Create trigger button
            var trigger = document.createElement("div");
            trigger.className = "custom-dropdown-trigger";

            var triggerText = document.createElement("span");
            triggerText.className = "custom-dropdown-trigger-text";
            trigger.appendChild(triggerText);

            var arrow = document.createElement("i");
            arrow.className = "fa fa-chevron-down custom-dropdown-arrow";
            trigger.appendChild(arrow);

            container.appendChild(trigger);

            // Create dropdown options menu overlay
            var menu = document.createElement("div");
            menu.className = "custom-dropdown-menu";
            container.appendChild(menu);

            // Insert container right after the select input
            select.parentNode.insertBefore(container, select.nextSibling);

            // Populate options function
            function populateOptions() {
                menu.innerHTML = "";
                var selectedText = "";
                var hasSelected = false;

                Array.from(select.options).forEach(function (opt) {
                    var item = document.createElement("div");
                    item.className = "custom-dropdown-option";
                    item.textContent = opt.textContent;
                    item.dataset.value = opt.value;

                    if (opt.selected) {
                        item.classList.add("is-selected");
                        selectedText = opt.textContent;
                        hasSelected = true;
                    }

                    item.addEventListener("click", function (e) {
                        e.stopPropagation();
                        select.value = opt.value;
                        
                        // Trigger change events
                        select.dispatchEvent(new Event("change", { bubbles: true }));
                        select.dispatchEvent(new Event("input", { bubbles: true }));
                        
                        // Toggle selections
                        container.querySelectorAll(".custom-dropdown-option").forEach(function (el) {
                            el.classList.remove("is-selected");
                        });
                        item.classList.add("is-selected");
                        
                        container.classList.remove("is-open");
                    });

                    menu.appendChild(item);
                });

                // Update trigger text
                if (hasSelected && selectedText !== "") {
                    triggerText.textContent = selectedText;
                } else {
                    // Fallback to placeholder value
                    var placeholderOpt = Array.from(select.options).find(o => o.value === "");
                    triggerText.textContent = placeholderOpt ? placeholderOpt.textContent : "Select option";
                }
            }

            // Toggle open click
            trigger.addEventListener("click", function (e) {
                e.stopPropagation();
                
                // Close all other open custom dropdowns first
                document.querySelectorAll(".custom-dropdown-container").forEach(function (el) {
                    if (el !== container) {
                        el.classList.remove("is-open");
                    }
                });
                
                container.classList.toggle("is-open");
            });

            // Initial populate
            populateOptions();

            // Listen for standard changes on the native select (e.g. from code or resets)
            select.addEventListener("change", function () {
                var val = select.value;
                var selectedText = "";
                var hasSelected = false;

                container.querySelectorAll(".custom-dropdown-option").forEach(function (el) {
                    if (el.dataset.value === val) {
                        el.classList.add("is-selected");
                        selectedText = el.textContent;
                        hasSelected = true;
                    } else {
                        el.classList.remove("is-selected");
                    }
                });

                if (hasSelected && selectedText !== "") {
                    triggerText.textContent = selectedText;
                } else {
                    var placeholderOpt = Array.from(select.options).find(o => o.value === "");
                    triggerText.textContent = placeholderOpt ? placeholderOpt.textContent : "Select option";
                }
            });

            // MutationObserver to sync dynamically loaded items
            var observer = new MutationObserver(function () {
                populateOptions();
            });
            observer.observe(select, { childList: true, characterData: true, subtree: true });
        });
    }

    // ==========================================
    // STEP CONTROLLER & VALIDATOR
    // ==========================================
    function validateStepForForm($form, stepNum) {
        var isValid = true;
        
        $form.find(`.enquiry-step[data-step="${stepNum}"]`).find("input, textarea, select").removeClass("is-invalid");

        if (stepNum === 1) {
            var companyName = $form.find('[name="companyName"]');
            var website = $form.find('[name="website"]');
            var industry = $form.find('[name="industry"]');
            var companyAddress = $form.find('[name="companyAddress"]');
            var city = $form.find('[name="city"]');
            var country = $form.find('[name="country"]');

            if (companyName.val().trim() === "") {
                showInputError(companyName, "Company name is required");
                isValid = false;
            } else if (!validateName(companyName.val().trim())) {
                showInputError(companyName, "Only alphabets allowed");
                isValid = false;
            }

            if (industry.val().trim() === "") {
                showInputError(industry, "Please select industry");
                isValid = false;
            }

            if (website.val().trim() !== "" && !validateWebsite(website.val().trim())) {
                showInputError(website, "Enter valid website URL");
                isValid = false;
            }

            if (companyAddress.val().trim() === "") {
                showInputError(companyAddress, "Company address is required");
                isValid = false;
            }

            if (country.val().trim() === "") {
                showInputError(country, "Please select country");
                isValid = false;
            }

            if (city.val().trim() === "") {
                showInputError(city, "City is required");
                isValid = false;
            }
        } else if (stepNum === 2) {
            var firstName = $form.find('[name="firstName"]');
            var lastName = $form.find('[name="lastName"]');
            var countryCodes = $form.find('[name="countryCodes"]');
            var phoneNumber = $form.find('[name="phoneNumber"]');
            var email = $form.find('[name="email"]');

            if (firstName.val().trim() === "") {
                showInputError(firstName, "First name is required");
                isValid = false;
            } else if (!validateName(firstName.val().trim())) {
                showInputError(firstName, "Only alphabets allowed");
                isValid = false;
            }

            if (lastName.val().trim() === "") {
                showInputError(lastName, "Last name is required");
                isValid = false;
            } else if (!validateName(lastName.val().trim())) {
                showInputError(lastName, "Only alphabets allowed");
                isValid = false;
            }

            if (countryCodes.val().trim() === "") {
                showInputError(countryCodes, "Country code is required");
                isValid = false;
            }

            if (phoneNumber.val().trim() === "") {
                showInputError(phoneNumber, "Phone number is required");
                isValid = false;
            } else if (!validatePhone(phoneNumber.val().trim())) {
                showInputError(phoneNumber, "Enter valid 10 digit number");
                isValid = false;
            }

            if (email.val().trim() === "") {
                showInputError(email, "Email is required");
                isValid = false;
            } else if (!validateEmail(email.val().trim())) {
                showInputError(email, "Enter valid email address");
                isValid = false;
            }
        } else if (stepNum === 3) {
            var message = $form.find('[name="message"]');
            if (message.val().trim() === "") {
                showInputError(message, "Message is required");
                isValid = false;
            }
        }
        return isValid;
    }

    function goToFormStep($form, stepNum) {
        if (stepNum < 1 || stepNum > 3) return;

        // Hide active step, show new step
        $form.find(".enquiry-step").removeClass("active").hide();
        $form.find(`.enquiry-step[data-step="${stepNum}"]`).addClass("active").fadeIn(200);

        // Update active step number text in footer
        $form.find(".active-step-num").text(stepNum);

        // Toggle footer navigation button visibilities
        if (stepNum === 1) {
            $form.find(".prev-step-btn").hide();
            $form.find(".next-step-btn").show();
            $form.find(".submit-step-btn").hide();
        } else if (stepNum === 2) {
            $form.find(".prev-step-btn").show();
            $form.find(".next-step-btn").show();
            $form.find(".submit-step-btn").hide();
        } else if (stepNum === 3) {
            $form.find(".prev-step-btn").show();
            $form.find(".next-step-btn").hide();
            $form.find(".submit-step-btn").show();
        }

        // Update steps indicator styling
        var $modal = $form.closest("#sales-enquiry-modal, #contact-enquiry-modal");
        if (!$modal.length) {
            $modal = $form.parent().parent(); // fallback lookup
        }
        if ($modal.length) {
            $modal.find(".step-indicator").removeClass("active completed");
            $modal.find(".step-indicator").each(function () {
                var step = parseInt($(this).data("step"));
                var numBox = $(this).find(".step-number");
                if (step === stepNum) {
                    $(this).addClass("active");
                    numBox.html(step);
                } else if (step < stepNum) {
                    $(this).addClass("completed");
                    numBox.html('<i class="fa fa-check"></i>');
                } else {
                    $(this).removeClass("active completed");
                    numBox.html(step);
                }
            });
        }
    }

    // ==========================================
    // FORMS BINDING & SUBMISSION
    // ==========================================
    function bindSalesEnquiryForms() {
        var forms = document.querySelectorAll(".salesEnquiryForm");

        forms.forEach(function (form) {
            if (form.dataset.salesEnquiryBound === "1") return;
            form.dataset.salesEnquiryBound = "1";

            form.addEventListener("submit", function (e) {
                e.preventDefault();

                if (window.location.protocol === "file:") {
                    showToastrError("Please open this page through Apache URL, not file path.");
                    return;
                }

                var $form = $(form);
                
                // Final full step validation before sending
                if (!validateStepForForm($form, 1)) {
                    goToFormStep($form, 1);
                    return;
                }
                if (!validateStepForForm($form, 2)) {
                    goToFormStep($form, 2);
                    return;
                }
                if (!validateStepForForm($form, 3)) {
                    goToFormStep($form, 3);
                    return;
                }

                var formData = new FormData(form);
                var submitBtn = form.querySelector('button[type="submit"]');
                var originalBtnText = submitBtn ? submitBtn.innerHTML : "";

                if (submitBtn) {
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = '<span class="fa fa-spinner fa-spin"></span> Submitting...';
                }

                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                });

                $.ajax({
                    url: enquiryUrl,
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (res) {
                        if (res && res.status) {
                            showToastrSuccess(res.message || "Enquiry submitted successfully.");
                            form.reset();
                            $form.find("input, textarea, select").removeClass("is-invalid");
                            goToFormStep($form, 1);
                            
                            // Close modal overlay
                            var closeBtn = $form.closest("#sales-enquiry-overlay, #contact-enquiry-overlay, .modal-overlay").find("#sales-enquiry-close, #contact-enquiry-close, .contact-support")[0];
                            if (closeBtn) {
                                closeBtn.click();
                            } else {
                                var overlay = document.getElementById("sales-enquiry-overlay") || document.getElementById("contact-enquiry-overlay") || document.querySelector(".modal-overlay");
                                if (overlay) {
                                    overlay.style.display = "none";
                                    overlay.classList.remove("active");
                                }
                                if (document.body) {
                                    document.body.style.overflow = "";
                                }
                            }
                            return;
                        }

                        showToastrError((res && res.message) || "Unable to send enquiry.");
                    },
                    error: function (xhr) {
                        var message =
                            (xhr.responseJSON && (xhr.responseJSON.message || xhr.responseJSON.msg)) ||
                            "Something went wrong. Try again.";
                        showToastrError(message);
                    },
                    complete: function () {
                        if (submitBtn) {
                            submitBtn.disabled = false;
                            submitBtn.innerHTML = originalBtnText;
                        }
                    },
                });
            });
        });
    }

    // ==========================================
    // INITIALIZATION & GLOBALS
    // ==========================================
    function init() {
        bindSalesEnquiryForms();

        // Convert selectors to custom dropdown overlays
        setupCustomDropdown("industry");
        setupCustomDropdown("country");
        setupCustomDropdown("countryCodes");

        // Close dropdowns when clicking outside
        document.addEventListener("click", function () {
            document.querySelectorAll(".custom-dropdown-container").forEach(function (el) {
                el.classList.remove("is-open");
            });
        });

        // Remove error on input change
        $(document).on(
            "input change",
            ".salesEnquiryForm input, .salesEnquiryForm textarea, .salesEnquiryForm select",
            function () {
                removeInputError($(this));
            },
        );

        // Only digits in phone number
        $(document).on("input", '.salesEnquiryForm [name="phoneNumber"]', function () {
            this.value = this.value.replace(/[^0-9]/g, "").slice(0, 10);
        });

        // Only alphabets in names
        $(document).on(
            "input",
            '.salesEnquiryForm [name="companyName"], .salesEnquiryForm [name="firstName"], .salesEnquiryForm [name="lastName"]',
            function () {
                this.value = this.value.replace(/[^A-Za-z\s]/g, "");
            },
        );

        // Navigation button click handlers
        $(document).on("click", ".salesEnquiryForm .next-step-btn", function (e) {
            e.preventDefault();
            var $form = $(this).closest(".salesEnquiryForm");
            var currentStep = parseInt($form.find(".enquiry-step.active").data("step")) || 1;
            
            if (validateStepForForm($form, currentStep)) {
                goToFormStep($form, currentStep + 1);
            }
        });

        $(document).on("click", ".salesEnquiryForm .prev-step-btn", function (e) {
            e.preventDefault();
            var $form = $(this).closest(".salesEnquiryForm");
            var currentStep = parseInt($form.find(".enquiry-step.active").data("step")) || 1;
            
            goToFormStep($form, currentStep - 1);
        });

        // Reset steps back to step 1 when opening modal overlay
        $(document).on("click", "#sales-enquiry-trigger, .sales-enquiry-trigger-class", function () {
            var $form = $(".salesEnquiryForm");
            if ($form.length) {
                $form.each(function () {
                    this.reset();
                    $(this).find("input, textarea, select").removeClass("is-invalid");
                    goToFormStep($(this), 1);
                });
            }
        });
    }

    if (document.readyState === "loading") {
        document.addEventListener("DOMContentLoaded", init);
    } else {
        init();
    }
})();
