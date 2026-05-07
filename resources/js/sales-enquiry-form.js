(function () {
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

    function showError(message) {
        ensureToastrLoaded()
            .then(function () {
                toastr.error(message);
            })
            .catch(function () {
                console.error(message);
            });
    }

    function showSuccess(message) {
        ensureToastrLoaded()
            .then(function () {
                toastr.success(message);
            })
            .catch(function () {
                console.log(message);
            });
    }

    function initSelectAllBehavior() {
        document.addEventListener("change", function (e) {
            if (e.target && e.target.classList.contains("select-all")) {
                var grid = e.target.closest(".checkbox-grid");
                if (!grid) return;
                var checked = e.target.checked;
                grid.querySelectorAll(
                    ".form-check-input:not(.select-all):not(:disabled)",
                ).forEach(function (cb) {
                    cb.checked = checked;
                    cb.dispatchEvent(new Event("change", { bubbles: true }));
                });
                return;
            }

            if (
                e.target &&
                e.target.matches(".checkbox-grid .form-check-input") &&
                !e.target.classList.contains("select-all")
            ) {
                var grid = e.target.closest(".checkbox-grid");
                if (!grid) return;
                var items = Array.from(
                    grid.querySelectorAll(
                        ".form-check-input:not(.select-all):not(:disabled)",
                    ),
                );
                var allChecked =
                    items.length > 0 &&
                    items.every(function (cb) {
                        return cb.checked;
                    });
                var selectAll = grid.querySelector(".select-all");
                if (selectAll) selectAll.checked = allChecked;
            }
        });
    }

    function closeSalesModal() {
        var closeBtn = document.getElementById("sales-enquiry-close");
        if (!closeBtn) return;
        if (window.jQuery) {
            window.jQuery(closeBtn).trigger("click");
        } else {
            closeBtn.click();
        }
    }

    // function bindSalesEnquiryForms() {
    //   var endpoint = "send_sales_enquiry.php";
    //   var forms = document.querySelectorAll(".salesEnquiryForm");

    //   forms.forEach(function (form) {
    //     if (form.dataset.salesEnquiryBound === "1") return;
    //     form.dataset.salesEnquiryBound = "1";

    //     form.addEventListener("submit", function (e) {
    //       e.preventDefault();

    //       if (window.location.protocol === "file:") {
    //         showError("Please open this page through Apache URL, not file path.");
    //         return;
    //       }

    //       var formData = new FormData(form);
    //       var submitBtn = form.querySelector('button[type="submit"]');
    //       var originalBtnText = submitBtn ? submitBtn.innerHTML : "";

    //       if (submitBtn) {
    //         submitBtn.disabled = true;
    //         submitBtn.innerHTML = '<span class="fa fa-spinner fa-spin"></span> Sending...';
    //       }

    //       fetch(endpoint, {
    //         method: "POST",
    //         body: formData
    //       })
    //         .then(function (res) {
    //           return res.json().then(function (data) {
    //             if (!res.ok) throw new Error(data.msg || "Unable to send enquiry.");
    //             return data;
    //           });
    //         })
    //         .then(function (data) {
    //           if (data.result === "success") {
    //             showSuccess(data.msg || "Enquiry sent successfully.");
    //             form.reset();
    //             closeSalesModal();
    //           } else {
    //             showError(data.msg || "Unable to send enquiry.");
    //           }
    //         })
    //         .catch(function (err) {
    //           showError(err && err.message ? err.message : "Something went wrong. Try again.");
    //         })
    //         .finally(function () {
    //           if (submitBtn) {
    //             submitBtn.disabled = false;
    //             submitBtn.innerHTML = originalBtnText;
    //           }
    //         });
    //     });
    //   });
    // }

    function init() {
        initSelectAllBehavior();
        // bindSalesEnquiryForms();
    }

    if (document.readyState === "loading") {
        document.addEventListener("DOMContentLoaded", init);
    } else {
        init();
    }
})();

//store data
function validateName(name) {
    return /^[A-Za-z\s]+$/.test(name);
}

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

// Show Error
function showError(input, message) {
    input.addClass("is-invalid");

    // remove old error
    input.closest(".form-item").find(".custom-error").remove();

    // if inside phone-input append after phone-input
    if (input.closest(".phone-input").length) {
        input
            .closest(".phone-input")
            .after(
                '<small class="custom-error text-danger d-block mt-1">' +
                    message +
                    "</small>",
            );
    } else {
        input.after(
            '<small class="custom-error text-danger d-block mt-1">' +
                message +
                "</small>",
        );
    }
}

// Remove Error
function removeError(input) {
    input.removeClass("is-invalid");

    input.closest(".form-item").find(".custom-error").remove();
}

// Remove error while typing
$("#serviceForm input, #serviceForm textarea, #serviceForm select").on(
    "input change",
    function () {
        removeError($(this));
    },
);

// Only digits in phone number
$("#phoneNumber").on("input", function () {
    this.value = this.value.replace(/[^0-9]/g, "").slice(0, 10);
});

// Only alphabets in names
$("#companyName, #firstName, #lastName").on("input", function () {
    this.value = this.value.replace(/[^A-Za-z\s]/g, "");
});

$("#serviceForm").on("submit", function (e) {
    e.preventDefault();

    let isValid = true;

    // Inputs
    let companyName = $("#companyName");
    let firstName = $("#firstName");
    let lastName = $("#lastName");
    let phoneNumber = $("#phoneNumber");
    let email = $("#emailid");
    let website = $("#website");
    let companyAddress = $("#companyAddress");
    let city = $("#city");
    let industry = $("#industry");
    let country = $("#country");

    // Remove old errors
    $(".custom-error").remove();

    $(
        "#serviceForm input, #serviceForm textarea, #serviceForm select",
    ).removeClass("is-invalid");

    // Company Name
    if (companyName.val().trim() == "") {
        showError(companyName, "Company name is required");
        isValid = false;
    } else if (!validateName(companyName.val().trim())) {
        showError(companyName, "Only alphabets allowed");
        isValid = false;
    }

    // First Name
    if (firstName.val().trim() == "") {
        showError(firstName, "First name is required");
        isValid = false;
    } else if (!validateName(firstName.val().trim())) {
        showError(firstName, "Only alphabets allowed");
        isValid = false;
    }

    // Last Name
    if (lastName.val().trim() == "") {
        showError(lastName, "Last name is required");
        isValid = false;
    } else if (!validateName(lastName.val().trim())) {
        showError(lastName, "Only alphabets allowed");
        isValid = false;
    }

    // Phone
    if (phoneNumber.val().trim() == "") {
        showError(phoneNumber, "Phone number is required");
        isValid = false;
    } else if (!validatePhone(phoneNumber.val().trim())) {
        showError(phoneNumber, "Enter valid 10 digit number");
        isValid = false;
    }

    // Email
    if (email.val().trim() == "") {
        showError(email, "Email is required");
        isValid = false;
    } else if (!validateEmail(email.val().trim())) {
        showError(email, "Enter valid email address");
        isValid = false;
    }

    // Website
    if (website.val().trim() == "") {
        showError(website, "Website is required");
        isValid = false;
    } else if (!validateWebsite(website.val().trim())) {
        showError(website, "Enter valid website URL");
        isValid = false;
    }

    // Address
    if (companyAddress.val().trim() == "") {
        showError(companyAddress, "Company address is required");
        isValid = false;
    }

    // City
    if (city.val().trim() == "") {
        showError(city, "City is required");
        isValid = false;
    }

    // Industry
    if (industry.val().trim() == "") {
        showError(industry, "Please select industry");
        isValid = false;
    }

    // Country
    if (country.val().trim() == "") {
        showError(country, "Please select country");
        isValid = false;
    }

    // Stop submit
    if (!isValid) {
        return;
    }

    let formData = new FormData(this);

    $.ajax({
        url: enquiryUrl,
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,

        success: function (res) {
            toastr.success(res.message || "Enquiry submitted successfully");

            $("#serviceForm")[0].reset();

            $(".custom-error").remove();

            $(
                "#serviceForm input, #serviceForm textarea, #serviceForm select",
            ).removeClass("is-invalid");

            $("#sales-enquiry-overlay").hide();
        },

        error: function (err) {
            toastr.error("Something went wrong. Please try again.");
        },
    });
});

// $('#serviceForm').on('submit', function(e) {
//     e.preventDefault();
//     let formData = new FormData(this);

//     $.ajax({
//         url: enquiryUrl,
//         type: "POST",
//         data: formData,
//         processData: false,
//         contentType: false,
//         success: function(res) {
//             toastr.success(res.message || "Enquiry submitted successfully");
//             $('#serviceForm')[0].reset();
//             $('#sales-enquiry-overlay').hide();
//         },
//         error: function(err) {
//             toastr.error("Something went wrong. Please try again.");
//         }

//     });

// });
