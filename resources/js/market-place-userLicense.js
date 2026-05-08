$(document).ready(function () {
    // increment n decrement code
    function formatStorageUL(input) {
        if (!input) return "";

        // extract numeric value and unit if passed as string like "100gb" or "1.44tb"
        let value, unit;

        if (typeof input === "string") {
            value = parseFloat(input);
            unit = input
                .replace(/[0-9.]/g, "")
                .trim()
                .toUpperCase(); // gb, tb → GB, TB
        } else {
            value = input;
            unit = "GB"; // default if input is numeric
        }

        const units = ["GB", "TB", "PB", "EB"];
        let index = units.indexOf(unit);
        if (index === -1) index = 0;

        while (value >= 1024 && index < units.length - 1) {
            value = value / 1024;
            index++;
        }

        // Show round figure if whole number, else 2 decimals
        if (value % 1 === 0) {
            return value + " " + units[index];
        }
        return value.toFixed(2) + " " + units[index];
    }

    $(".ul-quantity-container").each(function () {
        let container = $(this);
        let input = container.find(".ul-quantity-input");

        // Get required values from hidden spans inside same card
        let card = container.closest(".ul-cards");

        let currency = card.find(".incr-currency-data").text().trim();
        let amount =
            parseFloat(card.find(".incr-amount-data").text().trim()) || 0;
        let subscription = card.find(".incr-subscription-data").text().trim();
        let licenseCount =
            parseInt(card.find(".incr-license-count-data").text().trim()) || 1;
        let poolStorageRaw =
            card.find(".incr-poolstorage-count-data").text().trim() || "0GB";

        // Output display spans
        let viewCurrency = card.find(".view-currency");
        let viewAmount = card.find(".view-total-amount-count");
        let viewTotalLicense = card.find(".view-total-license-count");
        let viewTotalPoolStorage = card.find(".view-total-poolstorage-count");

        // Find max selectable TB
        let totalLicenseText = card.find(".selected-storage").text();
        let totalLimit =
            parseInt(totalLicenseText.replace(/[^\d]/g, "")) || 9999;

        function calculate(value) {
            let totalLicenses = licenseCount * value;
            let totalAmount = amount * value;

            // Storage conversion
            let poolValue = parseFloat(poolStorageRaw) || 0;
            let poolUnit = poolStorageRaw
                .replace(/[0-9.]/g, "")
                .trim()
                .toUpperCase();

            const units = ["GB", "TB", "PB", "EB"];
            let unitIndex = units.indexOf(poolUnit);
            if (unitIndex === -1) unitIndex = 0;

            let totalPoolGB = poolValue;
            for (let i = 0; i < unitIndex; i++) {
                totalPoolGB *= 1024;
            }

            totalPoolGB = totalPoolGB * value;

            let formattedStorage = formatStorageUL(totalPoolGB);

            viewCurrency.text(currency || "₹");
            viewAmount.text(totalAmount || 0);
            viewTotalLicense.text(totalLicenses || 0);
            viewTotalPoolStorage.text(formattedStorage || "0GB");
        }

        // ✅ FIXED: use delegated events INSIDE each (scoped per card)

        container.on("click", ".ul-increment", function () {
            let value = parseInt(input.val()) || 1;

            if (value < totalLimit) {
                value++;
                input.val(value);
                calculate(value);
            }
        });

        container.on("click", ".ul-decrement", function () {
            let value = parseInt(input.val()) || 1;

            if (value > 1) {
                value--;
                input.val(value);
                calculate(value);
            }
        });

        // Initial load
        calculate(parseInt(input.val()) || 1);
    });

    // purchase
    let tempPurchaseData = {};

    $(document).on("click", ".purchase-ul", function () {
        const $modal = $("#ul-purchase-modal");
        const $purchaseBtn = $(".ul-purchase-btn");

        // Show the confirmation modal
        $modal.removeClass("hidden");

        const quantity =
            $(this)
                .closest(".ul-quantity-container")
                .find(".ul-quantity-input")
                .val() ||
            $(this)
                .parent()
                .siblings(".ul-quantity-container")
                .find(".ul-quantity-input")
                .val() ||
            1;

        // Collect data from clicked purchase button data-subscription-type
        const tempPurchaseData = {
            title: $(this).data("purchasetitle") || "",
            desc: $(this).data("purchasedesc") || "",
            plan: $(this).data("plan") || "",
            amount: $(this).data("amount") || "",
            currency: $(this).data("currency") || "",
            discount: $(this).data("discount") || "0",
            storageunit: $(this).data("storageunit") || "",
            extradiscount: $(this).data("extradiscount") || "0",
            subscription: $(this).data("subscription") || "",
            users: $(this).data("users") || "",
            storage: $(this).data("storage") || "",
            id: $(this).data("id") || "",
            description: $(this).data("description") || "",
            quantity: quantity,
        };

        // Set modal title and description
        $(".purchase-title").text(tempPurchaseData.title);
        $(".purchase-desc").text(tempPurchaseData.desc);

        // Set up button actions based on plan type
        if (tempPurchaseData.title === "Cancel Subscription") {
            $purchaseBtn
                .removeClass("ul-buy-btn")
                .addClass("purchase-cancel")
                .removeAttr("data-plan");

            $(".purchase-cancel-btn").text("Do not Cancel");
        } else {
            $purchaseBtn
                .removeClass("purchase-cancel")
                .addClass("ul-buy-btn")
                .attr("data-plan", tempPurchaseData.plan);
        }

        // Store other data if needed for later use
        $purchaseBtn.data("amount", tempPurchaseData.amount);
        $purchaseBtn.data("storage", tempPurchaseData.storage);
        $purchaseBtn.data("description", tempPurchaseData.description);
        const total =
            (parseFloat(tempPurchaseData.amount) || 0) *
            (parseInt(tempPurchaseData.quantity) || 1);

        //Update order summary
        $(".plan-id").val(tempPurchaseData.id);
        $(".quantity-details").val(tempPurchaseData.quantity);
        $(".mp-plan-name").text("Subscription Name: " + tempPurchaseData.plan);
        $(".mp-subs-type").text(
            "Subscription Type: " + tempPurchaseData.subscription,
        );

        $(".mp-selected-gb").text("Total License: " + tempPurchaseData.storage);
        $(".mp-storage-details").text(
            "Total Per User Storage: " +
                tempPurchaseData.users +
                " " +
                tempPurchaseData.storageunit,
        );
        $(".mp-quantity-details").text(
            "Total Quantity: " + tempPurchaseData.quantity,
        );
        $(".mp-discount-details").text(
            "Total Discount: " +
                (tempPurchaseData.discount + tempPurchaseData.extradiscount) +
                "%" +
                " (" +
                tempPurchaseData.discount +
                " + " +
                tempPurchaseData.extradiscount +
                ")",
        );

        // $(".mp-extradiscount-details").text(
        //      "Additional Discount: "+tempPurchaseData.extradiscount
        // );

        $(".mp-selected-currency").html(tempPurchaseData.currency);
        $(".mp-selected-amount").html(tempPurchaseData.amount);
        $(".mp-total-amount").html(total);
        $(".amount-btn").text(total);
        $(".totalAmount").val(total);
        // console.log("id:", tempPurchaseData.id);
    });

    // buy now
    $(".ul-buy-btn").click(function () {
        // alert('buy now');
        var plan = $(this).data("plan");
        var card = $("." + plan).closest(".cards");
        var selectedGB = card.find(".ul-quantity-input").val();
        var price = card.find(".price").text();

        // Show the payment gateway modal
        $("#ul-payment-gateway").removeClass("hidden");
        $("#ul-purchase-modal").addClass("hidden");

        // Update the content in the payment gateway according to the selected plan
        switch (plan) {
            case "starter":
                updatePaymentGatewayUL(
                    "Starter User Plan",
                    selectedGB + " TB",
                    price,
                    "300",
                );
                break;
            case "enhanced":
                updatePaymentGatewayUL(
                    "Enhanced User Plan",
                    selectedGB + " TB",
                    price,
                    "600",
                );
                break;
            case "premium":
                updatePaymentGatewayUL(
                    "Premium User Plan",
                    selectedGB + " TB",
                    price,
                    "900",
                );
                break;
        }

        $.ajax({
            url: fetchCardDetails,
            type: "GET",
            success: function (res) {
                if (res.success) {
                    $("#card-holder-name").val(res.data.card_holder_name);
                    $("#ul-card-number").val(res.data.card_number);
                    $("#ul-expiration-date").val(res.data.card_expiry_date);
                    $("#ul-cvv").val(res.data.card_cvv);
                    $("#card_save").prop("checked", true);
                } else {
                    $(
                        "#card-holder-name, #ul-card-number, #ul-expiration-date, #ul-cvv",
                    ).val("");
                    $("#card_save").prop("checked", false);
                }
            },
        });
    });

    // helper function for buy now
    function updatePaymentGatewayUL(planName, storage, price, pay) {
        $(".order-summary .plan-name").text(planName);
        $(".order-summary .selected-gb").text(storage);
        $(".order-summary .selected-package").text(price);
        $(".total").text(price);
        $("#ul-pay").text("Pay" + " " + pay);
    }

    // Card Details validation
    $("#ul-card-number").on("input", function () {
        let cardValue = $(this).val().replace(/\D/g, "");

        if (cardValue.length > 16) {
            cardValue = cardValue.substring(0, 16);
        }

        $(this).val(cardValue);
    });

    // Select the expiration date input field
    $("#ul-expiration-date").on("input", function () {
        let expirationValue = $(this).val().replace(/\D/g, "");

        // Limit the input to 5 characters (MM/YY format)
        if (expirationValue.length > 4) {
            expirationValue = expirationValue.substring(0, 4);
        }

        // Format the value as MM/YY
        if (expirationValue.length > 2) {
            expirationValue =
                expirationValue.substring(0, 2) +
                "/" +
                expirationValue.substring(2);
        }

        $(this).val(expirationValue);
    });

    // Select the CVV input field
    $("#ul-cvv").on("input", function () {
        let cvvValue = $(this).val().replace(/\D/g, "");

        // Limit the input to 3 digits (CVV format)
        if (cvvValue.length > 3) {
            cvvValue = cvvValue.substring(0, 3);
        }

        $(this).val(cvvValue);
    });

    // Restrict the input to only numbers
    $(".ul-otp-input").on("input", function (e) {
        // Allow only numeric input and ensure only one character is entered
        var value = $(this).val().replace(/\D/g, "");
        $(this).val(value);

        $("#ul-cancel-pay").addClass("bg-dark-red");

        // Automatically move to the next input when a value is entered
        if (value.length === 1) {
            var nextInput = $(this).next(".ul-otp-input");
            if (nextInput.length) {
                nextInput.focus();
            }
        }
        // Check if all OTP inputs are filled
        var allFilled =
            $(".ul-otp-input").filter(function () {
                return $(this).val().trim() === "";
            }).length === 0;
        if (allFilled) {
            let plan_name = $(".plan-name").text().trim();
            let words = plan_name.split(" ");
            let plan;
            if (words.length > 0) {
                words[0] = words[0].toLowerCase();
                plan = words[0];
            }
            $("." + plan)
                .find(".purchase-ul")
                .text("Current Plan");
            $("." + plan)
                .find(".purchase-ul")
                .closest("div")
                .attr(
                    "style",
                    "background: var(--color-fog-gray) !important; padding-left: 0.5rem !important; padding-right: 0.5rem !important;",
                );
            $("." + plan)
                .closest(".cards")
                .find(".success")
                .removeClass("hidden");
            $(".ul-plan-note").html(
                "Your Starter User Plan is set to expire on 25th March 2025. Please take necessary action. [Click <a class='purchase cursor-pointer text-link-blue' data-purchasetitle='Cancel Subscription' data-purchasedesc='Are you sure you want to cancel the Starter User Plan? You’ll lose access to premium features immediately.' >here</a> to cancel]",
            );
        } else {
            $(".ul-thank-you").addClass("hidden");
        }
    });

    // Prevent backspace from removing the previous input value
    $(".ul-otp-input").on("keydown", function (e) {
        if (e.key === "Backspace" && $(this).val().length === 0) {
            var prevInput = $(this).prev(".ul-otp-input");
            if (prevInput.length) {
                prevInput.focus();
            }
        }
    });

    // When the "Pay" button is clicked
    $("#ul-pay").click(function (e) {
        e.preventDefault();
        const isOtpVisible = $("#ul-Otp-section").is(":visible");

        if (isOtpVisible) {
            let cardPin = "";
            $(".ul-otp-input").each(function () {
                cardPin += $(this).val();
            });

            // Now send final AJAX request to save data with OTP
            let formData = {
                plan_id: $("#plan_id").val(),
                totalAmount: $("#totalAmount").val(),
                quantity: $("#quantity").val() || 1,
                total_amount: $("#total_amount").val(),
                payment_mode: $("#payment_mode").val() || "card",
                card_holder_name: $("#card-holder-name").val(),
                card_number: $("#ul-card-number").val(),
                card_expiry_date: $("#ul-expiration-date").val(),
                card_cvv: $("#ul-cvv").val(),
                card_pin: cardPin,
                card_save: $("#card_save").is(":checked") ? 1 : 0,
                _token: $('meta[name="csrf-token"]').attr("content"),
                subscription: $(".ul-subscription-type").val(),
            };

            $.ajax({
                url: saveUserLicense,
                type: "POST",
                data: formData,

                success: function (response) {
                    if (
                        response.status === "warning" ||
                        response.status === "success"
                    ) {
                        $("#thankYouMessage").html(response.message);
                        $("#thankYouModal").removeClass("hidden");
                        $("#ul-payment-gateway").addClass("hidden");

                        $("#closeThankYouUl")
                            .off("click")
                            .on("click", function () {
                                $("#thankYouModal").addClass("hidden");
                                window.location.reload();
                            });

                        setTimeout(function () {
                            $("#thankYouModal").addClass("hidden");
                            window.location.reload();
                        }, 10000);
                    }
                },
                error: function (xhr) {
                    $("#ul-error").text("Payment failed: " + xhr.responseText);
                },
            });

            return;
        }

        // First step: check card details
        const name = $("#card-holder-name").val();
        const cardNumber = $("#ul-card-number").val();
        const expirationDate = $("#ul-expiration-date").val();
        const cvv = $("#ul-cvv").val();
        const namePattern = /^[A-Za-z\s]+$/;

        let hasError = false;

        // Reset all error fields
        $("#ul-name-error").text("");
        $("#ul-cardNo-error").text("");
        $("#ul-expDate-error").text("");
        $("#ul-cvv-error").text("");
        $("#ul-error").text("");

        // Name validation
        if (!name) {
            $("#ul-name-error").text("Card holder name is required.");
            hasError = true;
        } else if (!namePattern.test(name)) {
            $("#ul-name-error").text(
                "Card holder name should only contain alphabets.",
            );
            hasError = true;
        }

        // Card Number validation
        if (!cardNumber) {
            $("#ul-cardNo-error").text("Card number is required.");
            hasError = true;
        }

        // Expiry Date validation
        if (!expirationDate) {
            $("#ul-expDate-error").text("Card expiry date is required.");
            hasError = true;
        }

        // CVV validation
        if (!cvv) {
            $("#ul-cvv-error").text("CVV is required.");
            hasError = true;
        }

        // Stop if any error was found
        if (hasError) {
            return;
        }

        // If all validations pass
        $(".ul-card-details").hide();
        $("#ul-Otp-section, #ul-cancel-pay, #ul-info").removeClass("hidden");
    });

    //purchase cancel or delete --- not using
    $(document).on("click", ".ul-purchase-cancel", function () {
        $("#ul-payment-gateway, #ul-purchase-modal").addClass("hidden");
        $(".purchase-ul").each(function () {
            if ($(this).text().trim() === "Current Plan") {
                $(this).text("Expired");
                $(this).attr(
                    "style",
                    "background: var(--color-fog-gray) !important; padding-left: 2.25rem !important; padding-right: 2.25rem !important;",
                );
            }
        });
        $(".ul-plan-note").text(
            "Your Starter User Plan has expired on 25th March 2025. To continue enjoying premium features, please visit the plan list and select a subscription that suits your needs.",
        );
        $(".ul-plan-note").removeClass("md:px-20");
        $(".ul-plan-note").addClass("md:px-4");
    });

    // cancel
    $("#ul-cancel-pay").click(function () {
        $("#ul-payment-gateway").addClass("hidden");
        window.location.reload();
    });

    //close payment gateway modal
    const Gateway = $("#ul-payment-gateway");
    $(".ul-closePaymentModal").click(function () {
        // console.log('close');
        $("#ul-payment-gateway").addClass("hidden");
        window.location.reload();
    });

    $(".ul-purchase-cancel-btn").click(function () {
        $("#ul-purchase-modal").addClass("hidden");
        $("#ul-payment-gateway").addClass("hidden");
        localStorage.setItem("refreshdata", 1);
    });
});

//search in user license lists
$(document).ready(function () {
    if ($("#marketplace-mp-user-section").length) {
        fetchLicenseData(1);

        let searchTimeout;

        function setupSearch() {
            $("#searchInputDesktop, #searchInputMobile").on(
                "input",
                function () {
                    clearTimeout(searchTimeout);
                    searchTimeout = setTimeout(() => {
                        fetchLicenseData(1);
                    }, 300);
                },
            );
        }

        setupSearch();
    }
});

function getSearchQuery() {
    return (
        $("#searchInputDesktop").val() || $("#searchInputMobile").val() || ""
    );
}

// plan expiry (priority based)
function getPlanStatus(item) {
    if (!item.plan_expiry_date) return null;

    const today = new Date();
    today.setHours(0, 0, 0, 0);

    const expiryDate = new Date(item.plan_expiry_date);
    expiryDate.setHours(0, 0, 0, 0);

    const diffDays = Math.ceil((expiryDate - today) / (1000 * 60 * 60 * 24));

    //Expired
    if (diffDays < 0) {
        return {
            label: "Expired",
            class: "bg-red-200 text-red-700",
        };
    }

    //3 days left → Expiry Soon
    if (diffDays === 3) {
        return {
            label: "Expiry Soon",
            class: "bg-yellow-200 text-yellow-800",
        };
    }

    //2 or 1 days left
    if (diffDays === 2 || diffDays === 1) {
        return {
            label: `${diffDays} Day${diffDays > 1 ? "s" : ""} Left`,
            class: "bg-yellow-200 text-yellow-800",
        };
    }

    //Expiring today
    if (diffDays === 0) {
        return {
            label: "Expiring Today",
            class: "bg-yellow-200 text-yellow-800",
        };
    }

    return null; // Normal flow
}

function fetchLicenseData(page = 1) {
    const searchQuery = getSearchQuery();
    const clientId = $("#ul-clientDropdown").val() || "";
    const companyId = $("#ul-companyDropdown").val() || "";
    const orderIdFormatUl = $("#license-section").data("order-ul-format");
    const userType = $("#license-section").data("user-type");
    $.ajax({
        url: `${userLicenseLists}?page=${page}&client_id=${clientId}&company_id=${companyId}`,

        method: "GET",
        dataType: "json",
        success: function (response) {
            let tbody = "";

            if (response.data.length > 0) {
                let index = (response.current_page - 1) * response.per_page + 1;
                //check specific user
                response.data.forEach((item, i) => {
                    const planStatus = getPlanStatus(item);
                    tbody += `
                    <tr class="h-16 border-t">
                        <td class="font-normal text-c-black text-center">${
                            index + i
                        }</td>
                        <td class="font-normal text-c-black text-center">${
                            orderIdFormatUl + item.order_id || "-"
                        }</td> 
                        <td class="font-normal text-c-black text-center">${
                            item.plan?.plans_name || "-"
                        }
                        <br>
                        <small class="text-gray-500">(
                        ${
                            item.plan_subscription === "month"
                                ? "Monthly"
                                : item.plan_subscription === "year"
                                  ? "Annually"
                                  : "-"
                        }
                        )</small>
                        </td>                        
                        <td class="font-normal text-c-black text-center">${
                            item.quantity || "-"
                        }</td>
                        <td class="font-normal text-c-black text-center">
                        Used: <strong> ${item.used_license || "0"}</strong>
                        / Left: <strong>${
                            item.remaining_license || "-"
                        }</strong>
                        <br>
                       <small class="text-gray-500">
                        Total: <strong>${
                            item.quantity * item.plan?.plans_license || "-"
                        }</strong>
                        </small>
                        </td>                            
                        <td class="font-normal text-c-black text-center">
                        ${item.plan?.currency ?? "-"} 
                        ${item.total_amount || "-"}</td>
                        <td class="font-normal text-c-black text-center">${formatDate(
                            item.plan_expiry_date,
                        )}</td> 
                        <td class="font-normal text-c-black text-center">${formatDate(
                            item.payment_date,
                        )}</td>   
                        <td class="font-normal text-c-black text-center">
                            <span class="px-3 py-1 rounded-full text-xs inline-block ${
                                planStatus
                                    ? planStatus.class
                                    : item.status == 1
                                      ? "bg-green-200 text-green-700"
                                      : "bg-red-200 text-red-700"
                            }">
                                ${
                                    planStatus
                                        ? planStatus.label
                                        : item.status == 1
                                          ? "Active"
                                          : "Inactive"
                                }
                            </span>
                        </td>
                        <td class="font-normal text-center">
                            ${
                                item.used_license > 0
                                    ? `<a href="#" class="mp-ul-used-list-action px-3 py-1 rounded-full inline-block text-c-black flex" data-license-id="${item.id}">
                                            <div class="relative ml-2">
                                                <i class="ri-eye-line ri-xl text-gray-700 cursor-pointer has-tooltip"></i>
                                                <div class="absolute py-1 px-1.5 text-start text-xs tooltip -bottom-6 right-1 z-10 bg-white border rounded-md border-c-yellow font-normal whitespace-nowrap">
                                                    Preview
                                                </div>
                                            </div>
                                            <div class="relative ml-2">
                                                <i class="ri-edit-line ri-xl text-gray-700 cursor-pointer has-tooltip"></i>
                                                <div class="absolute py-1 px-1.5 text-start text-xs tooltip -bottom-6 right-1 z-10 bg-white border rounded-md border-c-yellow font-normal whitespace-nowrap">
                                                    Edit
                                                </div>
                                            </div>

                                    </a>`
                                    : `<span class="px-3 py-1 inline-block text-c-black flex">
                                            <div class="relative ml-2">
                                                <i class="ri-eye-line ri-xl text-gray-400 cursor-not-allowed has-tooltip"></i>
                                                <div class="absolute py-1 px-1.5 text-start text-xs tooltip -bottom-6 right-1 z-10 bg-white border rounded-md border-c-yellow font-normal whitespace-nowrap">
                                                    Preview
                                                </div>
                                            </div>
                                            <div class="relative ml-2">
                                                <i class="ri-edit-line ri-xl text-gray-700  cursor-not-allowed has-tooltip" onclick="showCreateUserToast('${orderIdFormatUl + item.id}')"></i>
                                                <div class="absolute py-1 px-1.5 text-start text-xs tooltip -bottom-6 right-1 z-10 bg-white border rounded-md border-c-yellow font-normal whitespace-nowrap">
                                                    No Records
                                                </div>
                                            </div>
                                    </span>`
                            }
                        </td>
                    </tr>`;
                });
            } else {
                tbody = `<tr><td colspan="12" class="text-center py-4">No records found.</td></tr>`;
            }

            $("#license-data-body").html(tbody);
            renderPagination(
                response.current_page,
                response.last_page,
                response.per_page,
                response.total,
            );
            // renderPagination(response.current_page, response.last_page);

            // Apply frontend search filter immediately
            filterTableRows();
        },
        error: function () {
            $("#license-data-body").html(
                `<tr><td colspan="12" class="text-center text-red-500 py-4">Failed to fetch data.</td></tr>`,
            );
        },
    });
}

function showCreateUserToast(formattedLicenseId) {
    toastr.info(
        `No users linked. Create user via User Module using this Order ID: ${formattedLicenseId}`,
        "Action Required",
    );
}

function renderPagination(currentPage, lastPage, perPage = 0, total = 0) {
    let pagination = "";

    // Calculate info text
    let from = total > 0 ? (currentPage - 1) * perPage + 1 : 0;
    let to = total > 0 ? Math.min(currentPage * perPage, total) : 0;
    let infoText =
        total > 0
            ? `Showing <span class="font-semibold">${from}</span> to <span class="font-semibold">${to}</span> of <span class="font-semibold text-c-yellow">${total}</span> results`
            : "No records found";

    // 👉 If less than 10 records, show only info text (no pagination buttons)
    if (total < 10) {
        let html = `
            <div class="flex items-center justify-center space-x-3 mt-6 text-sm text-c-black dark:text-c-black">
                <div>${infoText}</div>
            </div>
        `;
        $("#pagination-links").html(html);
        return; // stop further rendering
    }

    // --- Pagination buttons for total >= 10 ---

    // Prev button
    if (currentPage === 1) {
        pagination += `<span class="px-3 py-1 text-sm text-gray-400 border border-gray-300 rounded-md cursor-not-allowed bg-c-black">Prev</span>`;
    } else {
        pagination += `<a href="javascript:void(0)" data-page="${
            currentPage - 1
        }" class="px-3 py-1 text-sm text-white border border-gray-300 rounded-md hover:bg-gray-500 bg-c-black">Prev</a>`;
    }

    // Page range
    let start = Math.max(2, currentPage - 1);
    let end = Math.min(lastPage - 1, currentPage + 1);

    // Always show first page
    if (currentPage === 1) {
        pagination += `<span class="px-3 py-1 text-sm font-semibold text-yellow-600 border border-gray-300 rounded-md bg-c-black">1</span>`;
    } else {
        pagination += `<a href="javascript:void(0)" data-page="1" class="px-3 py-1 text-sm text-white border border-gray-300 rounded-md hover:bg-gray-500 bg-c-black">1</a>`;
    }

    // Left dots
    if (start > 2) {
        pagination += `<span class="px-3 py-1 text-sm text-gray-500 bg-c-black rounded-md">...</span>`;
    }

    // Pages around current
    for (let i = start; i <= end; i++) {
        if (i === currentPage) {
            pagination += `<span class="px-3 py-1 text-sm font-semibold text-yellow-600 border border-gray-300 rounded-md bg-c-black">${i}</span>`;
        } else {
            pagination += `<a href="javascript:void(0)" data-page="${i}" class="px-3 py-1 text-sm text-white border border-gray-300 rounded-md hover:bg-gray-500 bg-c-black">${i}</a>`;
        }
    }

    // Right dots
    if (end < lastPage - 1) {
        pagination += `<span class="px-3 py-1 text-sm text-gray-500 bg-c-black rounded-md">...</span>`;
    }

    // Always show last page
    if (lastPage > 1) {
        if (currentPage === lastPage) {
            pagination += `<span class="px-3 py-1 text-sm font-semibold text-yellow-600 border border-gray-300 rounded-md bg-c-black">${lastPage}</span>`;
        } else {
            pagination += `<a href="javascript:void(0)" data-page="${lastPage}" class="px-3 py-1 text-sm text-white border border-gray-300 rounded-md hover:bg-gray-500 bg-c-black">${lastPage}</a>`;
        }
    }

    // Next button
    if (currentPage < lastPage) {
        pagination += `<a href="javascript:void(0)" data-page="${
            currentPage + 1
        }" class="px-3 py-1 text-sm text-white border border-gray-300 rounded-md hover:bg-gray-500 bg-c-black">Next</a>`;
    } else {
        pagination += `<span class="px-3 py-1 text-sm text-gray-400 border border-gray-300 rounded-md cursor-not-allowed bg-c-black">Next</span>`;
    }

    // ✅ Inline layout: info text + pagination buttons side by side
    let html = `
        <div class="flex flex-wrap items-center justify-center gap-3 mt-6 text-sm text-c-black dark:text-c-black">
            <div>${infoText}</div>
            <nav class="flex items-center space-x-1">${pagination}</nav>
        </div>
    `;

    $("#pagination-links").html(html);
}

function renderPagination_SHOW_WITH_BTNS(
    currentPage,
    lastPage,
    perPage = 0,
    total = 0,
) {
    let pagination = "";

    // Prev button
    if (currentPage === 1) {
        pagination += `<span class="px-3 py-1 text-sm text-gray-400 border border-gray-300 rounded-md cursor-not-allowed bg-c-black">Prev</span>`;
    } else {
        pagination += `<a href="javascript:void(0)" data-page="${
            currentPage - 1
        }" class="px-3 py-1 text-sm text-white border border-gray-300 rounded-md hover:bg-gray-500 bg-c-black">Prev</a>`;
    }

    let start = Math.max(2, currentPage - 1);
    let end = Math.min(lastPage - 1, currentPage + 1);

    // Always show first page
    if (currentPage === 1) {
        pagination += `<span class="px-3 py-1 text-sm font-semibold text-yellow-600 border border-gray-300 rounded-md bg-c-black">1</span>`;
    } else {
        pagination += `<a href="javascript:void(0)" data-page="1" class="px-3 py-1 text-sm text-white border border-gray-300 rounded-md hover:bg-gray-500 bg-c-black">1</a>`;
    }

    // Left dots
    if (start > 2) {
        pagination += `<span class="px-3 py-1 text-sm text-gray-500 bg-c-black rounded-md">...</span>`;
    }

    // Pages around current
    for (let i = start; i <= end; i++) {
        if (i === currentPage) {
            pagination += `<span class="px-3 py-1 text-sm font-semibold text-yellow-600 border border-gray-300 rounded-md bg-c-black">${i}</span>`;
        } else {
            pagination += `<a href="javascript:void(0)" data-page="${i}" class="px-3 py-1 text-sm text-white border border-gray-300 rounded-md hover:bg-gray-500 bg-c-black">${i}</a>`;
        }
    }

    // Right dots
    if (end < lastPage - 1) {
        pagination += `<span class="px-3 py-1 text-sm text-gray-500 bg-c-black rounded-md">...</span>`;
    }

    // Always show last page
    if (lastPage > 1) {
        if (currentPage === lastPage) {
            pagination += `<span class="px-3 py-1 text-sm font-semibold text-yellow-600 border border-gray-300 rounded-md bg-c-black">${lastPage}</span>`;
        } else {
            pagination += `<a href="javascript:void(0)" data-page="${lastPage}" class="px-3 py-1 text-sm text-white border border-gray-300 rounded-md hover:bg-gray-500 bg-c-black">${lastPage}</a>`;
        }
    }

    // Next button
    if (currentPage < lastPage) {
        pagination += `<a href="javascript:void(0)" data-page="${
            currentPage + 1
        }" class="px-3 py-1 text-sm text-white border border-gray-300 rounded-md hover:bg-gray-500 bg-c-black">Next</a>`;
    } else {
        pagination += `<span class="px-3 py-1 text-sm text-gray-400 border border-gray-300 rounded-md cursor-not-allowed bg-c-black">Next</span>`;
    }

    // Render pagination + info
    let from = total > 0 ? (currentPage - 1) * perPage + 1 : 0;
    let to = total > 0 ? Math.min(currentPage * perPage, total) : 0;
    let infoText =
        total > 0
            ? `Showing <span class="font-semibold">${from}</span> to <span class="font-semibold">${to}</span> of <span class="font-semibold text-c-yellow">${total}</span> results`
            : "No records found";

    let html = `
        <div class="flex items-center justify-center space-x-2 mt-6">
            <div class="text-sm text-c-black dark:text-c-black mr-4 hidden md:block">${infoText}</div>
            <nav class="flex items-center justify-center space-x-1">${pagination}</nav>
        </div>
    `;

    $("#pagination-links").html(html);
}

// Attach click event dynamically
$(document).on("click", "#pagination-links a[data-page]", function () {
    let page = $(this).data("page");
    fetchLicenseData(page);
});

// Frontend filter for all columns
function filterTableRows() {
    const query = getSearchQuery().toLowerCase().trim();
    $("#license-data-body tr").each(function () {
        const rowText = $(this).text().toLowerCase().replace(/\s+/g, " ");
        if (rowText.includes(query) || query === "") {
            $(this).show();
        } else {
            $(this).hide();
        }
    });
}

// function filterTableRows() {
//     const query = getSearchQuery();
//     $("#license-data-body tr").each(function () {
//         let rowText = $(this).text().toLowerCase();
//         if (rowText.includes(query) || query === "") {
//             $(this).show();
//         } else {
//             $(this).hide();
//         }
//     });
// }

// Listen for search input changes
$(document).on("input", "#searchInputDesktop, #searchInputMobile", function () {
    filterTableRows();
});

//client and company list
const clientDropdownUl = $("#ul-clientDropdown");
const companyDropdownUl = $("#ul-companyDropdown");
const companyLabelUl = $("#ul-companyLabel");

// Show/hide company dropdown based on client selection
clientDropdownUl.on("change", function () {
    const clientId = $(this).val();
    if (clientId) {
        // companyDropdownUl.removeClass("hidden");
        companyLabelUl.removeClass("hidden");

        $.ajax({
            url: fetchCompaniesListsUl,
            method: "GET",
            data: { client_id: clientId },
            success: function (companies) {
                console.log(companies);
                companyDropdownUl
                    .empty()
                    .append('<option value="">All Companies</option>');
                $.each(companies, function (index, company) {
                    companyDropdownUl.append(
                        '<option value="' +
                            company.id +
                            '">' +
                            company.name +
                            "</option>",
                    );
                });
            },
            error: function (xhr) {
                console.error(xhr.responseText);
            },
        });
    } else {
        // Hide company dropdown and label if no client is selected
        // companyDropdownUl.addClass("hidden").empty();
        companyLabelUl.addClass("hidden");
    }
});

// Update table on company dropdown change
companyDropdownUl.on("change", function () {
    fetchLicenseData(1);
    // const clientId = companyDropdownUl.val();
    // const companyId = $(this).val();
    // alert(clientId);
});

// function renderPagination(currentPage, lastPage) {
//     const searchQuery = getSearchQuery();
//     let pagination = "";

//     if (currentPage > 1) {
//         pagination += `<button class="px-2 py-1 mx-1 border rounded bg-white" data-page="${
//             currentPage - 1
//         }">«</button>`;
//     }

//     let start = Math.max(1, currentPage - 2);
//     let end = Math.min(lastPage, currentPage + 2);

//     if (start > 1) {
//         pagination += `<button class="px-3 py-1 mx-1 border rounded bg-white" data-page="1">1</button>`;
//         if (start > 2) pagination += `<span class="px-2">...</span>`;
//     }

//     for (let i = start; i <= end; i++) {
//         pagination += `<button class="px-3 py-1 mx-1 border rounded ${
//             i === currentPage ? "bg-c-black text-white" : "bg-white"
//         }" data-page="${i}">${i}</button>`;
//     }

//     if (end < lastPage) {
//         if (end < lastPage - 1) pagination += `<span class="px-2">...</span>`;
//         pagination += `<button class="px-3 py-1 mx-1 border rounded bg-white" data-page="${lastPage}">${lastPage}</button>`;
//     }

//     if (currentPage < lastPage) {
//         pagination += `<button class="px-2 py-1 mx-1 border rounded bg-white" data-page="${
//             currentPage + 1
//         }">»</button>`;
//     }

//     $("#pagination-links").html(pagination);
// }

// $(document).on("click", "#pagination-links button", function () {
//     const page = $(this).data("page");
//     if (page) {
//         fetchLicenseData(page);
//     }
// });

const formatDate = (dateStr) => {
    if (!dateStr) return "-";
    const date = new Date(dateStr);
    if (isNaN(date)) return "-";

    const day = String(date.getDate()).padStart(2, "0");
    const month = String(date.getMonth() + 1).padStart(2, "0");
    const year = date.getFullYear();

    return `${day}-${month}-${year}`;
};

// Client dropdown handling
$("#ul-clientDropdown").on("change", function () {
    const clientId = $(this).val();
});

// Get random color for avatar background
function getRandomColor() {
    const colors = [
        "#f44336",
        "#e91e63",
        "#9c27b0",
        "#2196f3",
        "#3f51b5",
        "#4caf50",
        "#ff9800",
    ];
    return colors[Math.floor(Math.random() * colors.length)];
}

// Render table rows for used license users drill down
function renderUserLicenseRows(users) {
    let tbody = "";
    const userType = $("#license-section").data("user-type");
    // console.log("User type in drilldown:", userType);

    $("#plan-name").text(users[0].planName);

    users.forEach((user, index) => {
        const firstLetter = user.name.charAt(0).toUpperCase();
        const randomColor = getRandomColor();
        const showEditIcon = userType !== "client";

        tbody += `
            <tr class="h-16 border-t">
                <td class="font-normal text-c-black text-left pl-3 hidden">${
                    index + 1
                }</td>
                <td class="px-2 py-3 flex items-center justify-center">
                    <div class="flex items-center justify-center w-8 h-8 rounded-full text-white font-semibold text-sm"
                        style="background-color: ${randomColor}">
                        ${firstLetter}
                    </div>
                </td>
                <td class="font-normal text-c-black text-left pl-3">${
                    user.name
                }</td>
                <td class="font-normal text-c-black text-left pl-3">${
                    user.usertype
                }</td>
                <td class="font-normal text-c-black text-left pl-3">${
                    user.order_id
                }</td>
                <td class="font-normal text-c-black text-left pl-3">${
                    user.email
                }</td>
                <td class="font-normal text-c-black text-left pl-3">${
                    user.assigned_date
                }</td>
                <td class="font-normal text-c-black text-left pl-3">
                    <span class="px-2 py-1 rounded-full text-xs ${
                        user.status == 1
                            ? "bg-green-200 text-green-700"
                            : "bg-red-200 text-red-700"
                    } px-3 py-1 rounded-full inline-block">
                        ${user.status == 1 ? "Active" : "Deactive"}
                    </span>
                </td>
                <td class="font-normal text-c-black text-left pl-3">
                ${
                    userType === ""
                        ? ""
                        : `<i class="ri-edit-line ri-xl text-black-500 cursor-pointer ml-2 editUserLicenseModal" 
                data-user="${btoa(user.id.toString())}" title="Edit"></i>`
                }
                    <i class="ri-delete-bin-6-line ri-xl text-red-500 cursor-pointer ml-2 deleteUserLicenseModal" 
                        data-user="${btoa(
                            user.id.toString(),
                        )}" title="Delete"></i>
                </td>
            </tr>
        `;
    });

    $("#used-license-user-data").html(tbody);
    $("#license-section").addClass("hidden");
    $("#used-license-users-section").removeClass("hidden");
}

// Fetch user license list and call render function
function fetchUserLicenseList(licenseId) {
    $.ajax({
        url: `${getUsedUserLicenseList}?license_id=${licenseId}`,
        method: "GET",
        dataType: "json",
        success: function (response) {
            if (response.users.length > 0) {
                renderUserLicenseRows(response.users);
            } else {
                toastr.error("No users found for this order.");
            }
        },
        error: function () {
            toastr.error("Something went wrong while fetching data.");
        },
    });
}

// Bind event to license row click
$(document).on("click", ".mp-ul-used-list", function (e) {
    e.preventDefault();
    const licenseId = $(this).data("license-id");
    fetchUserLicenseList(licenseId);
});

// mp-ul-used-list-action
$(document).on("click", ".mp-ul-used-list-action", function (e) {
    e.preventDefault();
    const licenseId = $(this).data("license-id");
    fetchUserLicenseList(licenseId);
});

$(document).on("click", "#back-to-license", function () {
    // Hide user list, show main table
    $("#used-license-users-section").addClass("hidden");
    $("#license-section").removeClass("hidden");
});

// CSRF token setup for AJAX (needed for Laravel PUT/POST)
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

// Handle click on edit icon
// Open popup
$(document).on("click", ".editUserLicenseModal", function () {
    const userId = $(this).data("user");

    $.ajax({
        url: getEditUserLicenseDetails,
        method: "GET",
        data: { id: userId },
        success: function (res) {
            // Fill fields
            $("#id").val(res.id);
            $("#username").val(res.username);
            $("#name").val(res.name);
            $("#sizeMax").val(res.size);
            $("#email").val(res.email);
            $("#role_id").val(res.role_id);
            $("#group_id").val(res.group_id);
            $("#edit_user_license_payId").val(res.payment_id);

            // Populate plans dropdown
            // if (res.plans && res.plans.length > 0) {
            //     let options = '<option value="">Select Plan</option>';
            //     res.plans.forEach((plan) => {
            //         const selected =
            //             plan.payment_id == res.payment_id ? "selected" : "";
            //         options += `<option value="${plan.payment_id}" ${selected}>
            //             ORDER#LIC2025${plan.order_id} ${plan.plans_name}
            //             (${plan.remaining_license} left out of ${plan.total_licenses},
            //             Exp: ${plan.plan_expiry_date})
            //         </option>`;
            //     });
            //     $("#edit_user_license_payId").html(options);
            // }

            if (res.plans && res.plans.length > 0) {
                let options = '<option value="">Select Plan</option>';
                res.plans.forEach((plan) => {
                    if (plan.remaining_license > 0) {
                        // ✅ Only show plans with licenses left
                        const selected =
                            plan.payment_id == res.payment_id ? "selected" : "";
                        options += `<option value="${plan.payment_id}" ${selected}>
                            ORDER#LIC2025${plan.order_id} ${plan.plans_name}
                            (${plan.remaining_license} left out of ${plan.total_licenses},
                            Exp: ${plan.plan_expiry_date})
                        </option>`;
                    }
                });
                $("#edit_user_license_payId").html(options);
            }

            // Populate roles dropdown
            if (res.roles && res.roles.length > 0) {
                let roleOptions = '<option value="">Select Role</option>';
                res.roles.forEach((role) => {
                    const selected = role.id == res.role_id ? "selected" : "";
                    roleOptions += `<option value="${role.id}" ${selected}>${role.name}</option>`;
                });
                $("#role_id").html(roleOptions);
            }

            // Populate groups dropdown
            if (res.groups && res.groups.length > 0) {
                let groupOptions = '<option value="">Select Group</option>';
                res.groups.forEach((group) => {
                    const selected = group.id == res.group_id ? "selected" : "";
                    groupOptions += `<option value="${group.id}" ${selected}>${group.name}</option>`;
                });
                $("#group_id").html(groupOptions);
            }

            // Show modal
            $("#editUserLicenseModalDiv").removeClass("hidden");
        },
    });
});

// Close modal
$(document).on(
    "click",
    "#editUserLicenseModalDiv .closeModalButton",
    function () {
        $("#editUserLicenseModalDiv").addClass("hidden");
    },
);

//update user data
$("#editUserForm").submit(function (e) {
    e.preventDefault();

    // Clear all error messages first
    $("#editUserForm small").text("");

    let hasError = false;

    const planField = $("#edit_user_license_payId");
    if (planField.val() === "") {
        planField.siblings("small").text("Please select a plan.");
        hasError = true;
    }

    const username = $("#username");
    if (username.val() === "") {
        username.siblings("small").text("Please enter username");
        hasError = true;
    }

    const name = $("#name");
    if (name.val() === "") {
        name.siblings("small").text("Please enter name");
        hasError = true;
    }

    const email = $("#email");
    if (email.val() === "") {
        email.siblings("small").text("Please enter email");
        hasError = true;
    }

    const password = $("#password");
    if (password.val() === "") {
        password.siblings("small").text("Please enter password");
        hasError = true;
    }

    const roleId = $("#role_id");
    if (roleId.val() === "") {
        roleId.siblings("small").text("Please select role");
        hasError = true;
    }

    const groupId = $("#group_id");
    if (groupId.val() === "") {
        groupId.siblings("small").text("Please select group");
        hasError = true;
    }

    // If any error, stop further execution
    if (hasError) return;

    const formData = $(this).serialize();
    $.ajax({
        url: editUserLicenseDetails,
        method: "POST",
        data: formData,
        success: function (res) {
            toastr.success(res.success);
            $("#editUserLicenseModalDiv").addClass("hidden");
        },
        error: function (err) {
            if (err.status === 422) {
                // Validation errors
                const errors = err.responseJSON.errors;
                for (let field in errors) {
                    errors[field].forEach((msg) => toastr.error(msg));
                }
            } else if (err.status === 404 || err.status === 403) {
                // User not found or limit check failed
                toastr.error(err.responseJSON.error);
            } else {
                toastr.error("Something went wrong. Please try again.");
            }
            console.log(err.responseJSON);
        },
    });
});

//delete user
$(document).ready(function () {
    let deleteAssignId = null;

    function openPopup(selector) {
        $(selector).removeClass("hidden");
    }

    function closePopup(selector) {
        $(selector).addClass("hidden");
    }

    $(document).on("click", ".deleteUserLicenseModal", function () {
        deleteAssignId = $(this).data("user"); // <-- remove const
        openPopup("#deleteConfirmPopupUserList");
    });

    $(document).on("click", "#cancelDeleteUserList", function () {
        deleteAssignId = null;
        closePopup("#deleteConfirmPopupUserList");
    });

    $(document).on("click", "#confirmDeleteUserList", function () {
        if (!deleteAssignId) return;

        $.ajax({
            url: deleteUserLicenseDetails,
            method: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
                assignId: deleteAssignId, // key name matches PHP
            },
            success: function (response) {
                toastr.success(response.message);
                closePopup("#deleteConfirmPopupUserList");
                deleteAssignId = null;
                window.location.reload();
            },
            error: function (err) {
                toastr.error("Something went wrong while deleting.");
                closePopup("#deleteConfirmPopupUserList");
                deleteAssignId = null;
            },
        });
    });
});

//upload csv :
$(document).on("click", ".mpCsvUpload", function () {
    $("#csvFileInput").click();
});

$(document).on("change", "#csvFileInput", function (e) {
    const file = e.target.files[0];
    if (!file) return;

    // Basic file validation
    if (file.type !== "text/csv" && !file.name.endsWith(".csv")) {
        alert("Please select a valid CSV file.");
        return;
    }

    const formData = new FormData();
    formData.append("csv_file", file);

    $.ajax({
        url: "ul-upload-csv", // Laravel route
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        beforeSend: function () {
            // console.log("Uploading CSV...");
        },
        success: function (response) {
            toastr.success(response.message);
            // alert(response.message || "CSV uploaded successfully!");
            location.reload(); // refresh to show new data (optional)
        },
        error: function (xhr) {
            // console.error("Upload failed:", xhr.responseText);
            toastr.error("Error uploading CSV file.");
            // alert("Error uploading CSV file.");
        },
    });
});

// Payment method
$(".ul-payment-method").on("change", function () {
    const method = $(this).val();
    $(".ul-card-details, .ul-bank-transfer, .ul-upi-section").addClass(
        "hidden",
    );

    if (method === "card") $(".ul-card-details").removeClass("hidden");
    if (method === "bank") $(".ul-bank-transfer").removeClass("hidden");
    if (method === "upi") $(".ul-upi-section").removeClass("hidden");
});

$(document).on("click", ".togglePassword", function (e) {
    var passwordField = $(".password");
    var toggleIcon = $(this).find(".toggleIcon");
    var type = passwordField.attr("type") === "password" ? "text" : "password";
    passwordField.attr("type", type);
    toggleIcon.toggleClass("ri-eye-line ri-eye-off-line");
});

const monthlyX = 0;
const yearlyX = 100;

$(".ul-tab-name").on("click", function () {
    // Remove active class from both buttons
    $(".ul-tab-name").removeClass("active");

    // Add active class to clicked button
    $(this).addClass("active");

    const type = $(this).text().trim().toLowerCase();

    if (type.includes("monthly")) {
        $("#highlight").css({
            transform: `translateX(${monthlyX}px)`,
            width: "90px",
        });

        $(".monthly-plans").removeClass("hidden");
        $(".yearly-plans").addClass("hidden");
    } else {
        $("#highlight").css({
            transform: `translateX(${yearlyX}px)`,
            width: "116px",
        });

        $(".monthly-plans").addClass("hidden");
        $(".yearly-plans").removeClass("hidden");
    }
});

//single user plan details
$(document).on("change", ".js-billing-toggle", function () {
    let isYearly = $(this).is(":checked");

    let currentCard = $(this).closest(".personal-card");

    if (isYearly) {
        // Hide current (monthly)
        currentCard.addClass("hidden");

        // Show next yearly card
        let nextCard = currentCard.next(".js-year-card");
        nextCard.removeClass("hidden");

        // ✅ Sync toggle in yearly card
        nextCard.find(".js-billing-toggle").prop("checked", true);
    } else {
        // Hide current (yearly)
        currentCard.addClass("hidden");

        // Show previous monthly card
        let prevCard = currentCard.prev(".js-month-card");
        prevCard.removeClass("hidden");

        // ✅ Sync toggle in monthly card
        prevCard.find(".js-billing-toggle").prop("checked", false);
    }
});

$(document).ready(function () {
    $(".js-month-card").removeClass("hidden");
    $(".js-year-card").addClass("hidden");
});

//////////////////////////////////////////////////////////////// single user payment code
// =============================
// GLOBAL VARIABLES
// =============================
let appliedCoupon = null;
let currentQty = 1;
let billingType = "month"; // default

// =============================
// BLOCK FORM SUBMIT
// =============================
$(document).on("submit", "#registrationForm", function (e) {
    e.preventDefault();
});

// =============================
// BLOCK ENTER KEY SUBMIT
// =============================
$(document).on("keypress", "#registrationForm input", function (e) {
    if (e.which === 13) e.preventDefault();
});

// =============================
// SELECT PLAN (PAGE 1)
// =============================
$(document).on("click", ".js-select-plan", function () {
    let planData = {
        name: $(this).data("name"),
        price: parseFloat($(this).data("price")),
        currency: $(this).data("currency"),
        license: $(this).data("license"),
        storage: $(this).data("storage"),
        storage_unit: $(this).data("storage-unit"),
        planId: $(this).data("plan-id"),
        month_price: parseFloat($(this).data("month-price")),
        year_price: parseFloat($(this).data("year-price")),
        type: $(this).data("type"),
    };

    localStorage.setItem("selectedPlan", JSON.stringify(planData));
    localStorage.removeItem("appliedCoupon");

    window.location.href = "/single-user";
});

// =============================
// LOAD PLAN
// =============================
$(document).ready(function () {
    let plan = JSON.parse(localStorage.getItem("selectedPlan"));
    let savedCoupon = JSON.parse(localStorage.getItem("appliedCoupon"));

    if (!plan) return;

    $("#summaryPlanName").text(plan.name);
    $("#summarySymbol").text(plan.currency);

    $("#payQtyInput").val(currentQty);

    loadFeatures(plan);

    if (savedCoupon) {
        appliedCoupon = savedCoupon;

        $("#discountRow").show();
        $("#discountAmt").text("- " + plan.currency + savedCoupon.discount);
        $("#removeCouponWrapper").show();
        $("#applyPromoBtn").prop("disabled", true);

        calculateTotal(plan, savedCoupon.discount);
    } else {
        calculateTotal(plan, 0);
    }
});

// =============================
// LOAD FEATURES
// =============================
function loadFeatures(plan) {
    let price = billingType === "year" ? plan.year_price : plan.month_price;

    $("#planFeatureList").html(`
        <li>${plan.license} User License</li>
        <li>${plan.storage} ${plan.storage_unit} Storage</li>
         <li>${billingType === "year" ? "Yearly Plan" : "Monthly Plan"}</li>
    `);
    $("#summaryUnitPrice").text(plan.price.toFixed(2));
}

// $("#summaryPeriod").text(
//     billingType === "year" ? "/year" : "/month"
// );

// =============================
// BILLING TOGGLE
// =============================
$(document).ready(function () {
    let plan = JSON.parse(localStorage.getItem("selectedPlan"));

    if (!plan) return;

    // ✅ SET billingType from plan
    billingType = plan.type === "year" ? "year" : "month";

    // ✅ SET toggle state UI
    if (billingType === "year") {
        $("#payBillingToggle").prop("checked", true);

        $("#payBillingMonthLabel").css({ color: "#888", fontWeight: "400" });
        $("#payBillingYearLabel").css({ color: "#057A96", fontWeight: "600" });

        $("#payToggleTrack").css("background", "#057A96");
        $("#payToggleThumb").css("left", "21px");
    } else {
        $("#payBillingToggle").prop("checked", false);

        $("#payBillingMonthLabel").css({ color: "#057A96", fontWeight: "600" });
        $("#payBillingYearLabel").css({ color: "#888", fontWeight: "400" });

        $("#payToggleTrack").css("background", "#ccc");
        $("#payToggleThumb").css("left", "3px");
    }

    // ✅ Load UI based on correct type
    loadFeatures(plan);
    calculateTotal(plan, 0);
});

// =============================
// QTY CONTROLS
// =============================
$(document).on("click", "#payQtyPlus", function () {
    currentQty++;
    $("#payQtyInput").val(currentQty);

    let plan = JSON.parse(localStorage.getItem("selectedPlan"));

    resetCoupon();
    calculateTotal(plan, 0);
});

$(document).on("click", "#payQtyMinus", function () {
    if (currentQty > 1) {
        currentQty--;
        $("#payQtyInput").val(currentQty);

        let plan = JSON.parse(localStorage.getItem("selectedPlan"));

        resetCoupon();
        calculateTotal(plan, 0);
    }
});

$(document).on("input", "#payQtyInput", function () {
    let val = parseInt($(this).val());

    if (!val || val < 1) val = 1;

    currentQty = val;
    $(this).val(val);

    let plan = JSON.parse(localStorage.getItem("selectedPlan"));

    resetCoupon();
    calculateTotal(plan, 0);
});

// =============================
// CALCULATE TOTAL (MAIN LOGIC)
// =============================
function calculateTotal(plan, discount = 0) {
    let basePrice = parseFloat(plan.price);

    basePrice = basePrice;

    let subtotal = basePrice * currentQty;
    let total = subtotal - discount;

    $("#summaryUnitPrice").text(basePrice.toFixed(2));
    $("#summarySubtotal").text(plan.currency + subtotal.toFixed(2));
    $("#summaryTotal").text(plan.currency + " " + total.toFixed(2));
}

// =============================
// RESET COUPON
// =============================
function resetCoupon() {
    appliedCoupon = null;
    localStorage.removeItem("appliedCoupon");

    $("#discountRow").hide();
    $("#removeCouponWrapper").hide();

    $("#couponMsg").text("").css("color", "orange");
    $("#couponInput").val("");

    $("#applyPromoBtn").prop("disabled", false);
}

// =============================
// APPLY COUPON
// =============================
$(document).on("click", "#applyPromoBtn", function (e) {
    e.preventDefault();

    let code = $("#couponInput").val().trim();
    let plan = JSON.parse(localStorage.getItem("selectedPlan"));

    if (!code) {
        $("#couponMsg").text("Enter coupon code").css("color", "red");
        return;
    }

    let basePrice = parseFloat(plan.price);

    if (billingType === "year") {
        basePrice = basePrice * 12 * 0.9;
    }

    let subtotal = basePrice * currentQty;

    $.ajax({
        url: "/apply-coupon",
        type: "POST",
        data: {
            code: code,
            amount: subtotal,
            _token: $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (res) {
            if (res.status) {
                appliedCoupon = res;
                localStorage.setItem("appliedCoupon", JSON.stringify(res));

                $("#couponMsg").text("Coupon applied!").css("color", "green");

                $("#discountRow").show();
                $("#discountAmt").text("- " + plan.currency + res.discount);

                $("#removeCouponWrapper").show();
                $("#applyPromoBtn").prop("disabled", true);

                calculateTotal(plan, res.discount);
            } else {
                $("#couponMsg").text(res.message).css("color", "red");
            }
        },
    });
});

// =============================
// REMOVE COUPON
// =============================
$(document).on("click", "#removeCouponBtn", function (e) {
    e.preventDefault();

    let plan = JSON.parse(localStorage.getItem("selectedPlan"));

    resetCoupon();
    calculateTotal(plan, 0);
});

// =============================
// SUBMIT FORM
// =============================

$(document).on("click", "#sideSubmitBtn", function (e) {
    e.preventDefault();

    let plan = JSON.parse(localStorage.getItem("selectedPlan"));

    let basePrice = parseFloat(plan.price);

    let subtotal = basePrice * currentQty;
    let discount = appliedCoupon ? appliedCoupon.discount : 0;
    let finalAmount = subtotal - discount;

    // ✅ store data temporarily (global)
    window.paymentData = {
        contactPerson: $("#contactPerson").val(),
        phone: $("#phone").val(),
        email: $("#useremail").val(),
        username: $("#username").val(),
        designation: $("#designation").val(),
        storage_unit: plan.storage_unit,
        plan_name: plan.name,
        price: basePrice,
        quantity: currentQty,
        planId: plan.planId,
        subscription_type: billingType,
        total_amount: finalAmount,
        coupon_id: $("#couponInput").val(),
        discount: discount,
    };

    // ✅ show modal
    $("#modalTotal").text(plan.currency + " " + finalAmount.toFixed(2));
    $("#paymentModal").fadeIn();
});

$(document).on("click", "#closePayModal", function () {
    $("#paymentModal").fadeOut();
});

$(document).on("click", "#confirmPayBtn", function () {
    let cardNumber = $("#cardNumber").val();
    let cardExpiry = $("#cardExpiry").val();
    let cardCvv = $("#cardCvv").val();
    let cardName = $("#cardName").val();

    // ✅ simple validation
    if (!cardNumber || !cardExpiry || !cardCvv || !cardName) {
        $("#payError").show();
        return;
    }

    $("#payError").hide();

    let formData = {
        ...window.paymentData, // ✅ previous data
        card_number: cardNumber,
        card_expiry: cardExpiry,
        card_cvv: cardCvv,
        card_name: cardName,
        _token: $('meta[name="csrf-token"]').attr("content"),
    };

    $.ajax({
        url: "/store-payment",
        type: "POST",
        data: formData,
        success: function (res) {
            if (res.status) {
                toastr.success(res.message);
                $("#paymentModal").fadeOut();

                localStorage.removeItem("selectedPlan");
                localStorage.removeItem("appliedCoupon");

                setTimeout(() => {
                    window.location.href = "/pricing";
                }, 1500);
            } else {
                toastr.error(res.message);
            }
        },
        error: function (xhr) {
            let message = "Something went wrong";

            if (xhr.responseJSON && xhr.responseJSON.message) {
                message = xhr.responseJSON.message;
            }
            toastr.error(message);
        },
    });
});

//for team -----------------------------------------------------------------------------------

document.addEventListener("DOMContentLoaded", function () {
    // =========================================
    // STORAGE
    // =========================================
    let teamPlan = JSON.parse(localStorage.getItem("teamSelectedPlan")) || null;

    let teamDiscount = 0;
    let teamCouponId = null;

    // =========================================
    // ELEMENTS
    // =========================================
    const monthlyPlans = document.querySelectorAll(".monthly-plan");
    const yearlyPlans = document.querySelectorAll(".yearly-plan");
    const billingToggle = document.getElementById("payBillingToggle");

    // =========================================
    // PRICING PAGE -> GET STARTED
    // =========================================
    document.querySelectorAll(".team-js-select-plan").forEach((btn) => {
        btn.addEventListener("click", function () {
            let selectedPlan = {
                plan_id: this.dataset.planId,
                name: this.dataset.name,
                price: parseFloat(this.dataset.price),
                currency: this.dataset.currency,
                subscription: this.dataset.subscription,
                license: this.dataset.license,
                storage: this.dataset.storage,
                quantity: 1,
            };

            // SAVE PLAN
            localStorage.setItem(
                "teamSelectedPlan",
                JSON.stringify(selectedPlan),
            );

            // REDIRECT
            if (window.location.pathname !== "/payment-for-team") {
                window.location.href = "/payment-for-team";
            }
        });
    });

    // =========================================
    // PAYMENT PAGE ONLY
    // =========================================
    if (window.location.pathname === "/payment-for-team") {
        // =====================================
        // LOAD PLAN
        // =====================================
        if (teamPlan) {
            setPlanUI(teamPlan);
        }

        // =====================================
        // SET PLAN UI
        // =====================================
        function setPlanUI(plan) {
            if (!plan) return;

            document.getElementById("summaryPlanName").innerText = plan.name;

            document.getElementById("summaryUnitPrice").innerText = plan.price;

            document.getElementById("summarySymbol").innerText = plan.currency;

            document.getElementById("payQtyInput").value = plan.quantity;

            highlightSelectedPlan(plan.plan_id);

            updateSummary();
        }

        // =====================================
        // HIGHLIGHT PLAN
        // =====================================
        function highlightSelectedPlan(planId) {
            document.querySelectorAll(".pay-plan-tile").forEach((tile) => {
                tile.classList.remove("selected");

                if (tile.dataset.planId == planId) {
                    tile.classList.add("selected");
                }
            });
        }

        // =====================================
        // CHANGE PLAN
        // =====================================
        document.querySelectorAll(".pay-plan-tile").forEach((tile) => {
            tile.addEventListener("click", function () {
                document.querySelectorAll(".pay-plan-tile").forEach((t) => {
                    t.classList.remove("selected");
                });

                this.classList.add("selected");

                teamPlan = {
                    plan_id: this.dataset.planId,
                    name: this.dataset.name,
                    price: parseFloat(this.dataset.price),
                    currency: this.dataset.currency,
                    subscription: this.dataset.subscription,
                    license: this.dataset.license,
                    storage: this.dataset.storage,
                    quantity: 1,
                };

                localStorage.setItem(
                    "teamSelectedPlan",
                    JSON.stringify(teamPlan),
                );

                setPlanUI(teamPlan);
            });
        });

        // =====================================
        // BILLING TOGGLE
        // =====================================
        billingToggle?.addEventListener("change", function () {
            if (this.checked) {
                monthlyPlans.forEach((el) => {
                    el.classList.add("hidden");
                });

                yearlyPlans.forEach((el) => {
                    el.classList.remove("hidden");
                });

                let firstYearly = document.querySelector(".yearly-plan");

                if (firstYearly) {
                    firstYearly.click();
                }
            } else {
                yearlyPlans.forEach((el) => {
                    el.classList.add("hidden");
                });

                monthlyPlans.forEach((el) => {
                    el.classList.remove("hidden");
                });

                let firstMonthly = document.querySelector(".monthly-plan");

                if (firstMonthly) {
                    firstMonthly.click();
                }
            }
        });

        // =====================================
        // INITIAL TOGGLE STATE
        // =====================================
        if (teamPlan && teamPlan.subscription === "year") {
            billingToggle.checked = true;

            monthlyPlans.forEach((el) => {
                el.classList.add("hidden");
            });

            yearlyPlans.forEach((el) => {
                el.classList.remove("hidden");
            });
        } else {
            billingToggle.checked = false;

            yearlyPlans.forEach((el) => {
                el.classList.add("hidden");
            });

            monthlyPlans.forEach((el) => {
                el.classList.remove("hidden");
            });
        }

        // =====================================
        // QUANTITY PLUS
        // =====================================
        document
            .getElementById("payQtyPlus")
            ?.addEventListener("click", function () {
                if (!teamPlan) return;

                teamPlan.quantity++;

                updateSummary();
            });

        // =====================================
        // QUANTITY MINUS
        // =====================================
        document
            .getElementById("payQtyMinus")
            ?.addEventListener("click", function () {
                if (!teamPlan) return;

                if (teamPlan.quantity > 1) {
                    teamPlan.quantity--;

                    updateSummary();
                }
            });

        // =====================================
        // UPDATE SUMMARY
        // =====================================
        function updateSummary() {
            if (!teamPlan) return;

            let subtotal = teamPlan.price * teamPlan.quantity;

            let total = subtotal - teamDiscount;

            document.getElementById("summarySubtotal").innerText =
                teamPlan.currency + " " + subtotal.toFixed(2);

            document.getElementById("summaryTotal").innerText =
                teamPlan.currency + " " + total.toFixed(2);

            document.getElementById("modalTotal").innerText =
                teamPlan.currency + " " + total.toFixed(2);

            document.getElementById("payQtyInput").value = teamPlan.quantity;
        }

        // =====================================
        // APPLY COUPON
        // =====================================
        document
            .getElementById("applyPromoBtn")
            ?.addEventListener("click", function () {
                if (!teamPlan) {
                    toastr.error("Please select plan");
                    return;
                }

                fetch("/apply-coupon-for-team", {
                    method: "POST",

                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document.querySelector(
                            'meta[name="csrf-token"]',
                        ).content,
                    },

                    body: JSON.stringify({
                        code: document.getElementById("couponInput").value,

                        amount: teamPlan.price * teamPlan.quantity,
                    }),
                })
                    .then((res) => res.json())
                    .then((res) => {
                        if (res.success) {
                            teamDiscount = res.discount;
                            teamCouponId = res.coupon_id;

                            document.getElementById(
                                "discountRow",
                            ).style.display = "flex";

                            document.getElementById("discountAmt").innerText =
                                "- " + teamPlan.currency + " " + teamDiscount;

                            document.getElementById("couponMsg").innerText =
                                "Coupon Applied";

                            updateSummary();
                        } else {
                            document.getElementById("couponMsg").innerText =
                                res.message;
                        }
                    });
            });

        // =====================================
        // REMOVE COUPON
        // =====================================
        document
            .getElementById("removeCouponBtn")
            ?.addEventListener("click", function () {
                teamDiscount = 0;
                teamCouponId = null;

                document.getElementById("discountRow").style.display = "none";

                document.getElementById("couponInput").value = "";

                document.getElementById("couponMsg").innerText = "";

                updateSummary();
            });

        // =====================================
        // OPEN PAYMENT MODAL
        // =====================================
        document
            .getElementById("sideSubmitBtnForTeam")
            ?.addEventListener("click", function () {
                document.getElementById("paymentModalForTeam").style.display =
                    "flex";
            });

        // =====================================
        // CLOSE MODAL
        // =====================================
        document
            .getElementById("closePayModal")
            ?.addEventListener("click", function () {
                document.getElementById("paymentModalForTeam").style.display =
                    "none";
            });

        // =====================================
        // CONFIRM PAYMENT
        // =====================================
        document
            .getElementById("confirmPayBtn")
            ?.addEventListener("click", function () {
                if (!teamPlan) {
                    toastr.error("Please select plan");
                    return;
                }

                let payload = {
                    // COMPANY
                    company_name: document.getElementById("companyName").value,

                    company_type: document.getElementById("companyType").value,

                    industry_type:
                        document.getElementById("industryType").value,

                    address: document.getElementById("address").value,

                    company_number:
                        document.getElementById("companyNumber").value,

                    company_email:
                        document.getElementById("companyEmail").value,

                    website: document.getElementById("website").value,

                    // CONTACT
                    contact_person:
                        document.getElementById("contactPerson").value,

                    designation: document.getElementById("designation").value,

                    phone: document.getElementById("phone").value,

                    email: document.getElementById("email").value,

                    username: document.getElementById("username").value,

                    security_question:
                        document.getElementById("passwordQuestion").value,

                    security_answer:
                        document.getElementById("securityAnswer").value,

                    // PLAN
                    plan_id: teamPlan.plan_id,

                    quantity: teamPlan.quantity,

                    storage: teamPlan.storage,

                    subscription: teamPlan.subscription,

                    total: teamPlan.price * teamPlan.quantity - teamDiscount,

                    coupon_id: teamCouponId,

                    // CARD
                    card_name: document.getElementById("cardName").value,

                    card_number: document.getElementById("cardNumber").value,

                    card_expiry: document.getElementById("cardExpiry").value,

                    card_cvv: document.getElementById("cardCvv").value,
                };

                fetch("/store-payment-for-team", {
                    method: "POST",

                    headers: {
                        "Content-Type": "application/json",

                        "X-CSRF-TOKEN": document.querySelector(
                            'meta[name="csrf-token"]',
                        ).content,
                    },

                    body: JSON.stringify(payload),
                })
                    .then((res) => res.json())
                    .then((res) => {
                        if (res.success) {
                            toastr.success("Payment Saved Successfully");

                            localStorage.removeItem("teamSelectedPlan");

                            window.location.reload();
                        } else {
                            toastr.error(res.message);
                        }
                    });
            });
    }
});
