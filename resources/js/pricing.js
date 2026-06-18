// Global Variables
let CURRENT_AMOUNT = 0;
let CURRENT_SYMBOL = "";
let CURRENT_TEAM_AMOUNT = 0;

// Separate Billing Types
let SINGLE_USER_BILLING = "monthly";
let TEAM_BILLING = "monthly";

// =========================
// Calculate Team Plan Total
// =========================
function updateTeamPlans(
    currencySymbol,
    convertedAmount,
    billingType = "monthly",
) {
    convertedAmount = Math.round(convertedAmount);

    CURRENT_TEAM_AMOUNT = convertedAmount;

    document.querySelectorAll(".monthly-plans").forEach(function (planBox) {
        // =========================
        // CHECK TEAM FLAG (NEW)
        // =========================
        let isTeam = parseInt(planBox.dataset.isTeam) || 0;

        // Currency Symbol
        planBox
            .querySelectorAll(".personal-card-symbol-ul")
            .forEach(function (el) {
                el.textContent = currencySymbol;
            });

        // Base Price
        let priceAmountEl = planBox.querySelector(".price-amount");

        if (priceAmountEl) {
            priceAmountEl.textContent = convertedAmount;
        }

        // User Count
        let userCount =
            parseInt(
                planBox.querySelector(".user-count-ul")?.textContent.trim(),
            ) || 0;

        // =========================
        // DISCOUNT (ONLY FOR TEAM)
        // =========================
        let discount = 0;
        let extraDiscount = 0;

        if (isTeam === 1) {
            let discountEl = planBox.querySelector(".discount-ul");

            if (discountEl) {
                discount =
                    billingType === "yearly"
                        ? parseFloat(discountEl.getAttribute("data-yearly")) ||
                          0
                        : parseFloat(discountEl.getAttribute("data-monthly")) ||
                          0;
            }

            let extraDiscountEl = planBox.querySelector(".extra-discount-ul");

            if (extraDiscountEl) {
                extraDiscount =
                    billingType === "yearly"
                        ? parseFloat(
                              extraDiscountEl.getAttribute("data-yearly"),
                          ) || 0
                        : parseFloat(
                              extraDiscountEl.getAttribute("data-monthly"),
                          ) || 0;
            }
        }

        // =========================
        // TOTAL PRICE CALCULATION
        // =========================
        let total =
            billingType === "yearly"
                ? convertedAmount * 12 * userCount
                : convertedAmount * userCount;

        // Apply discount only for TEAM
        let afterFirstDiscount =
            isTeam === 1 ? total - (total * discount) / 100 : total;

        let finalTotal =
            isTeam === 1
                ? afterFirstDiscount -
                  (afterFirstDiscount * extraDiscount) / 100
                : afterFirstDiscount;

        finalTotal = Math.round(finalTotal);

        // =========================
        // UPDATE UI
        // =========================
        let totalPriceEl = planBox.querySelector(".total-price-ul");
        if (totalPriceEl) {
            totalPriceEl.textContent = finalTotal;
        }

        let viewCurrency = planBox.querySelector(".view-currency");
        if (viewCurrency) {
            viewCurrency.textContent = currencySymbol;
        }

        let totalAmountView = planBox.querySelector(".view-total-amount-count");
        if (totalAmountView) {
            totalAmountView.textContent = finalTotal;
        }

        // =========================
        // LICENSE COUNT
        // =========================
        let quantityInput = planBox.querySelector(".ul-quantity-input");
        let quantity = parseInt(quantityInput?.value) || 1;

        let baseLicenceCount =
            parseInt(
                planBox
                    .querySelector(".base-licence-count")
                    ?.textContent.trim(),
            ) || 0;

        let totalLicenceCount = baseLicenceCount * quantity;

        let totalLicenceView = planBox.querySelector(
            ".view-total-license-count",
        );
        if (totalLicenceView) {
            totalLicenceView.textContent = totalLicenceCount;
        }

        // =========================
        // STORAGE
        // =========================
        let perUserStorage =
            parseInt(
                planBox.querySelector(".base-storage")?.textContent.trim(),
            ) || 0;

        let totalPoolStorage = perUserStorage * totalLicenceCount;

        let totalPoolStorageView = planBox.querySelector(
            ".view-total-poolstorage-count",
        );

        if (totalPoolStorageView) {
            totalPoolStorageView.textContent = totalPoolStorage;
        }

        // Period text
        let userText = planBox.querySelector(".user-text");
        if (userText) {
            userText.textContent =
                billingType === "yearly" ? "user/year" : "user/month";
        }
    });
}

function updateTeamPlans7788(
    currencySymbol,
    convertedAmount,
    billingType = "monthly",
) {
    convertedAmount = Math.round(convertedAmount);

    CURRENT_TEAM_AMOUNT = convertedAmount;

    document.querySelectorAll(".monthly-plans").forEach(function (planBox) {
        // Currency Symbol
        planBox
            .querySelectorAll(".personal-card-symbol-ul")
            .forEach(function (el) {
                el.textContent = currencySymbol;
            });

        // Base Price
        let priceAmountEl = planBox.querySelector(".price-amount");

        if (priceAmountEl) {
            priceAmountEl.textContent = convertedAmount;
        }

        // User Count
        let userCount =
            parseInt(
                planBox.querySelector(".user-count-ul")?.textContent.trim(),
            ) || 0;

        // Discount
        let discountEl = planBox.querySelector(".discount-ul");

        let discount = 0;

        if (discountEl) {
            discount =
                billingType === "yearly"
                    ? parseFloat(discountEl.getAttribute("data-yearly")) || 0
                    : parseFloat(discountEl.getAttribute("data-monthly")) || 0;
        }

        // Extra Discount
        let extraDiscountEl = planBox.querySelector(".extra-discount-ul");

        let extraDiscount = 0;

        if (extraDiscountEl) {
            extraDiscount =
                billingType === "yearly"
                    ? parseFloat(extraDiscountEl.getAttribute("data-yearly")) ||
                      0
                    : parseFloat(
                          extraDiscountEl.getAttribute("data-monthly"),
                      ) || 0;
        }

        // Total
        let total =
            billingType === "yearly"
                ? convertedAmount * 12 * userCount
                : convertedAmount * userCount;

        // First Discount
        let afterFirstDiscount = total - (total * discount) / 100;

        // Extra Discount
        let finalTotal =
            afterFirstDiscount - (afterFirstDiscount * extraDiscount) / 100;

        // Round
        finalTotal = Math.round(finalTotal);

        // Update Final Amount
        let totalPriceEl = planBox.querySelector(".total-price-ul");

        if (totalPriceEl) {
            totalPriceEl.textContent = finalTotal;
        }

        // Update Currency
        let viewCurrency = planBox.querySelector(".view-currency");

        if (viewCurrency) {
            viewCurrency.textContent = currencySymbol;
        }

        // =========================
        // Update Amount View
        // =========================
        let totalAmountView = planBox.querySelector(".view-total-amount-count");

        if (totalAmountView) {
            totalAmountView.textContent = finalTotal;
        }

        // =========================
        // Total Licence Count
        // =========================
        let quantityInput = planBox.querySelector(".ul-quantity-input");

        let quantity = parseInt(quantityInput?.value) || 1;

        // Base Licence Count
        let baseLicenceCount =
            parseInt(
                planBox
                    .querySelector(".base-licence-count")
                    ?.textContent.trim(),
            ) || 0;

        // Total Licence Count
        let totalLicenceCount = baseLicenceCount * quantity;

        // Update Total Licence Count
        let totalLicenceView = planBox.querySelector(
            ".view-total-license-count",
        );

        if (totalLicenceView) {
            totalLicenceView.textContent = totalLicenceCount;
        }

        // =========================
        // Per User Storage
        // =========================
        let perUserStorage =
            parseInt(
                planBox.querySelector(".base-storage")?.textContent.trim(),
            ) || 0;

        // Total Pool Storage
        let totalPoolStorage = perUserStorage * totalLicenceCount;

        // Update Pool Storage
        let totalPoolStorageView = planBox.querySelector(
            ".view-total-poolstorage-count",
        );

        if (totalPoolStorageView) {
            totalPoolStorageView.textContent = totalPoolStorage;
        }

        // Period Text
        let userText = planBox.querySelector(".user-text");

        if (userText) {
            userText.textContent =
                billingType === "yearly" ? "user/year" : "user/month";
        }
    });
}

// =========================
// Update Team Discount Badge
// =========================
// function updateTeamDiscountBadges(billingType = "monthly") {
//     $(".team-discount-badge").each(function () {
//         let monthlyDiscount = parseFloat($(this).attr("data-monthly")) || 0;

//         let yearlyDiscount = parseFloat($(this).attr("data-yearly")) || 0;

//         // Monthly
//         if (billingType === "monthly") {
//             if (monthlyDiscount > 0) {
//                 $(this)
//                     .html(
//                         `🎉 ${monthlyDiscount}% off — Enjoy extra savings with monthly billing`,
//                     )
//                     .show();
//             } else {
//                 $(this).hide();
//             }
//         }

//         // Yearly
//         else {
//             if (yearlyDiscount > 0) {
//                 $(this)
//                     .html(
//                         `🎉 ${yearlyDiscount}% off — Enjoy extra savings with annual billing`,
//                     )
//                     .show();
//             } else {
//                 $(this).hide();
//             }
//         }
//     });
// }

// =========================
// Update Single User Plans
// =========================
function updateSingleUserPlans(amount, symbol, billingType = "monthly") {
    // amount = Math.round(amount);

    $(".personal-card__amount").each(function () {
        let el = $(this);

        // Discounts
        let monthlyDiscount = parseFloat(el.attr("data-monthly-discount")) || 0;

        let yearlyDiscount = parseFloat(el.attr("data-yearly-discount")) || 0;

        let extraMonthly = parseFloat(el.attr("data-extra-monthly")) || 0;

        let extraYearly = parseFloat(el.attr("data-extra-yearly")) || 0;

        // Current Discount
        let discount =
            billingType === "yearly" ? yearlyDiscount : monthlyDiscount;

        // Current Extra Discount
        let extraDiscount =
            billingType === "yearly" ? extraYearly : extraMonthly;

        // Base Amount
        let total = billingType === "yearly" ? amount * 12 : amount;

        // Main Discount
        total = total - (total * discount) / 100;

        // Extra Discount
        total = total - (total * extraDiscount) / 100;

        // Final Round
        total = Math.round(total);

        // Update Amount
        el.text(total);
    });

    // Currency Symbol
    $(".personal-card-symbol-ul").text(symbol);

    // Period
    $(".personal-card__period").text(
        billingType === "yearly" ? "/year" : "/month",
    );
}

// =========================
// Update Table Pricing
// =========================

function updateTablePricing(amount, symbol) {
    amount = Math.round(amount);

    $(".table-plan-symbol").text(symbol);

    // =========================
    // PERSONAL TABLE
    // =========================
    $("th[data-plan-col='personal']").each(function () {
        let th = $(this);

        let amountEl = th.find(".table-plan-amount");

        let billingType = SINGLE_USER_BILLING;

        let total = billingType === "yearly" ? amount * 12 : amount;

        let discount =
            billingType === "yearly"
                ? parseFloat(amountEl.attr("data-yearly-discount")) || 0
                : parseFloat(amountEl.attr("data-monthly-discount")) || 0;

        let extraDiscount =
            billingType === "yearly"
                ? parseFloat(amountEl.attr("data-extra-yearly")) || 0
                : parseFloat(amountEl.attr("data-extra-monthly")) || 0;

        total = total - (total * discount) / 100;
        total = total - (total * extraDiscount) / 100;

        amountEl.text(Math.round(total));

        th.find(".table-plan-period").text(
            billingType === "yearly" ? "user/year" : "user/month",
        );
    });

    // =========================
    // TEAM TABLE (🔥 FIXED)
    // =========================
    $("#pricingTable thead th.ul-pricing-tbl-team").each(function () {
        let th = $(this);

        let amountEl = th.find(".table-plan-amount");

        // Team Discount Flag
        let isTeamDiscount = parseInt(th.attr("data-team-discount")) || 0;

        // Team Base Amount
        let baseAmount = CURRENT_TEAM_AMOUNT || amount;

        // User Count
        let users =
            parseInt(
                th
                    .closest("table")
                    .find("tbody tr:eq(0) td")
                    .eq(th.index())
                    .text(),
            ) || 1;

        let billingType = TEAM_BILLING;

        let total =
            billingType === "yearly"
                ? baseAmount * 12 * users
                : baseAmount * users;

        // Default No Discount
        let discount = 0;
        let extraDiscount = 0;

        // Apply Discount ONLY if is_team_discount_apply = 1
        if (isTeamDiscount === 1) {
            discount =
                billingType === "yearly"
                    ? parseFloat(amountEl.attr("data-yearly-discount")) || 0
                    : parseFloat(amountEl.attr("data-monthly-discount")) || 0;

            extraDiscount =
                billingType === "yearly"
                    ? parseFloat(amountEl.attr("data-extra-yearly")) || 0
                    : parseFloat(amountEl.attr("data-extra-monthly")) || 0;
        }

        // Apply Discounts
        total = total - (total * discount) / 100;
        total = total - (total * extraDiscount) / 100;

        amountEl.text(Math.round(total));

        th.find(".table-plan-period").text(
            billingType === "yearly" ? "user/year" : "user/month",
        );
    });
}

function updateTablePricing9990(amount, symbol) {
    amount = Math.round(amount);

    // =========================
    // Update Symbols
    // =========================
    $(".table-plan-symbol").text(symbol);

    // =========================
    // PERSONAL TABLE
    // =========================
    $(".ul-pricing-tbl-single").each(function () {
        let th = $(this);

        let amountEl = th.find(".table-plan-amount");

        let monthlyDiscount =
            parseFloat(amountEl.attr("data-monthly-discount")) || 0;

        let yearlyDiscount =
            parseFloat(amountEl.attr("data-yearly-discount")) || 0;

        let extraMonthly = parseFloat(amountEl.attr("data-extra-monthly")) || 0;

        let extraYearly = parseFloat(amountEl.attr("data-extra-yearly")) || 0;

        let billingType = SINGLE_USER_BILLING;

        let discount =
            billingType === "yearly" ? yearlyDiscount : monthlyDiscount;

        let extraDiscount =
            billingType === "yearly" ? extraYearly : extraMonthly;

        // Single User Price
        let total = billingType === "yearly" ? amount * 12 : amount;

        // Apply Discounts
        total = total - (total * discount) / 100;

        total = total - (total * extraDiscount) / 100;

        total = Math.round(total);

        amountEl.text(total);

        // Period
        th.find(".table-plan-period").text(
            billingType === "yearly" ? "user/year" : "user/month",
        );
    });

    // =========================
    // TEAM TABLE
    // =========================
    $("#pricingTable thead th")
        .not("[data-plan-col='personal']")
        .each(function () {
            let th = $(this);

            let amountEl = th.find(".table-plan-amount");

            // Users Count
            let users =
                parseInt(
                    th
                        .closest("table")
                        .find("tbody tr:eq(0) td")
                        .eq(th.index())
                        .text(),
                ) || 1;

            let monthlyDiscount =
                parseFloat(amountEl.attr("data-monthly-discount")) || 0;

            let yearlyDiscount =
                parseFloat(amountEl.attr("data-yearly-discount")) || 0;

            let extraMonthly =
                parseFloat(amountEl.attr("data-extra-monthly")) || 0;

            let extraYearly =
                parseFloat(amountEl.attr("data-extra-yearly")) || 0;

            let billingType = TEAM_BILLING;

            let discount =
                billingType === "yearly" ? yearlyDiscount : monthlyDiscount;

            let extraDiscount =
                billingType === "yearly" ? extraYearly : extraMonthly;

            // IMPORTANT
            // Multiply by user count
            let total =
                billingType === "yearly" ? amount * 12 * users : amount * users;

            // Discount
            total = total - (total * discount) / 100;

            // Extra Discount
            total = total - (total * extraDiscount) / 100;

            total = Math.round(total);

            amountEl.text(total);

            // Period
            th.find(".table-plan-period").text(
                billingType === "yearly" ? "user/year" : "user/month",
            );
        });
}

// =========================
// Update All Pricing
// =========================

function updateAllPricing() {
    // Single User
    updateSingleUserPlans(CURRENT_AMOUNT, CURRENT_SYMBOL, SINGLE_USER_BILLING);

    // Team
    updateTeamPlans(CURRENT_SYMBOL, CURRENT_AMOUNT, TEAM_BILLING);

    // Table
    updateTablePricing(CURRENT_AMOUNT, CURRENT_SYMBOL);

    // Discount Badge
    // updateTeamDiscountBadges(TEAM_BILLING);
}

// =========================
// Update Currency
// =========================
function updateCurrency(amount, symbol) {
    CURRENT_AMOUNT = Math.round(amount);
    CURRENT_SYMBOL = symbol;

    // Update Symbols
    $(".personal-card-symbol-ul").text(symbol);

    $(".view-currency").text(symbol);

    $(".incr-currency-data").text(symbol);

    // Update Pricing
    updateAllPricing();
}

// =========================
// Window Load
// =========================
window.onload = function () {
    setTimeout(function () {
        let selectedCurrency = $("#currencyMenu li[data-currency].active");

        if (!selectedCurrency.length) {
            selectedCurrency = $("#currencyMenu li[data-currency]").first();
        }

        let amount = parseFloat(selectedCurrency.data("amount")) || 0;

        let symbol = selectedCurrency.data("symbol");

        updateCurrency(amount, symbol);
    }, 10);
};

// =========================
// Document Ready
// =========================
$(document).ready(function () {
    // =========================
    // Initial Load
    // =========================
    let selectedCurrency = $("#currencyMenu li[data-currency].active");

    if (!selectedCurrency.length) {
        selectedCurrency = $("#currencyMenu li[data-currency]").first();
    }

    updateCurrency(
        selectedCurrency.data("amount"),
        selectedCurrency.data("symbol"),
    );

    // =========================
    // Team Toggle
    // =========================

    $(".team-billing-toggle").on("click", function () {
        $(".team-billing-toggle").removeClass("active");

        $(this).addClass("active");

        TEAM_BILLING = $(this).data("type");

        // Update Team Cards
        updateTeamPlans(CURRENT_SYMBOL, CURRENT_AMOUNT, TEAM_BILLING);

        // Update Table
        updateTablePricing(CURRENT_AMOUNT, CURRENT_SYMBOL);

        // Update Discount Badge
        // updateTeamDiscountBadges(TEAM_BILLING);

        localStorage.setItem("teamBilling", $(this).data("type"));
    });

    // =========================
    // Single User Toggle
    // =========================

    $(".single-user-toggle").on("change", function () {
        SINGLE_USER_BILLING = $(this).is(":checked") ? "yearly" : "monthly";

        updateSingleUserPlans(
            CURRENT_AMOUNT,
            CURRENT_SYMBOL,
            SINGLE_USER_BILLING,
        );

        // Show / Hide Annual Strip
        if (SINGLE_USER_BILLING === "yearly") {
            $(".show-strip").slideDown();
        } else {
            $(".show-strip").slideUp();
        }

        // Update Combined Table
        updateTablePricing(CURRENT_AMOUNT, CURRENT_SYMBOL);

        localStorage.setItem(
            "singleUserBilling",
            $(this).is(":checked") ? "yearly" : "monthly",
        );
    });

    // =========================
    // Increment Quantity
    // =========================
    $(document).on("click", ".ul-increment", function () {
        let planBox = $(this).closest(".monthly-plans");

        let qtyInput = planBox.find(".ul-quantity-input");

        let currentQty = parseInt(qtyInput.val()) || 1;

        currentQty++;

        qtyInput.val(currentQty);

        updateTeamCardCalculation(planBox, currentQty);
    });

    // =========================
    // Decrement Quantity
    // =========================
    $(document).on("click", ".ul-decrement", function () {
        let planBox = $(this).closest(".monthly-plans");

        let qtyInput = planBox.find(".ul-quantity-input");

        let currentQty = parseInt(qtyInput.val()) || 1;

        if (currentQty > 1) {
            currentQty--;

            qtyInput.val(currentQty);

            updateTeamCardCalculation(planBox, currentQty);
        }
    });

    // =========================
    // Team Card Calculation
    // =========================
    function updateTeamCardCalculation(planBox, quantity = 1) {
        // Base Values
        let baseAmount = CURRENT_AMOUNT || 0;

        let userCount =
            parseInt(planBox.find(".user-count-ul").text().trim()) || 0;

        let storagePerUser =
            parseInt(planBox.find(".base-storage").text().trim()) || 0;

        // Discount
        let discount = 0;

        if (TEAM_BILLING === "yearly") {
            discount =
                parseFloat(planBox.find(".discount-ul").attr("data-yearly")) ||
                0;
        } else {
            discount =
                parseFloat(planBox.find(".discount-ul").attr("data-monthly")) ||
                0;
        }

        // Extra Discount
        let extraDiscount = 0;

        if (TEAM_BILLING === "yearly") {
            extraDiscount =
                parseFloat(
                    planBox.find(".extra-discount-ul").attr("data-yearly"),
                ) || 0;
        } else {
            extraDiscount =
                parseFloat(
                    planBox.find(".extra-discount-ul").attr("data-monthly"),
                ) || 0;
        }

        // Total Licence Count
        let totalLicenceCount = userCount * quantity;

        planBox.find(".view-total-license-count").text(totalLicenceCount);

        // =========================
        // Total Pool Storage
        // =========================
        let totalPoolStorage = totalLicenceCount * storagePerUser;

        let storageUnit = "GB";

        if (totalPoolStorage >= 1024) {
            totalPoolStorage = totalPoolStorage / 1024;

            totalPoolStorage = totalPoolStorage.toFixed(2);

            storageUnit = "TB";
        } else {
            totalPoolStorage = Math.round(totalPoolStorage);
        }

        // Update Storage
        planBox.find(".view-total-poolstorage-count").text(totalPoolStorage);

        planBox.find(".view-storage-unit").text(storageUnit);

        // =========================
        // Total Amount
        // =========================
        let totalAmount = baseAmount * totalLicenceCount;

        // Yearly
        if (TEAM_BILLING === "yearly") {
            totalAmount = totalAmount * 12;
        }

        // Main Discount
        totalAmount = totalAmount - (totalAmount * discount) / 100;

        // Extra Discount
        totalAmount = totalAmount - (totalAmount * extraDiscount) / 100;

        // Round
        totalAmount = Math.round(totalAmount);

        // Update Amount
        // planBox.find(".total-price-ul").text(totalAmount);

        planBox.find(".view-total-amount-count").text(totalAmount);
    }

    // =========================
    // Currency Dropdown
    // =========================
    const $currencyBtn = $("#currencyBtn");
    const $currencyMenu = $("#currencyMenu");
    const $currencyCode = $("#currencyCode");

    // =========================
    // Open / Close Dropdown
    // =========================
    $currencyBtn.on("click", function (e) {
        e.stopPropagation();

        const open = $currencyMenu.toggleClass("open").hasClass("open");

        $currencyBtn.toggleClass("open", open);

        if (open) {
            setTimeout(() => {
                $("#currencySearch").focus();
            }, 50);
        }
    });

    // =========================
    // Close Outside Click
    // =========================
    $(document).on("click", function () {
        $currencyMenu.removeClass("open");

        $currencyBtn.removeClass("open");
    });

    // =========================
    // Prevent Close Inside
    // =========================
    $currencyMenu.on("click", function (e) {
        e.stopPropagation();
    });

    // =========================
    // Select Currency
    // =========================
    $currencyMenu.on("click", "li[data-currency]", function () {
        let currencyCode = $(this).data("currency");

        let currencySymbol = $(this).data("symbol");

        let amount = $(this).data("amount");

        let country = $(this).data("country");

        // Active
        $("#currencyMenu li[data-currency]").removeClass("active");

        $(this).addClass("active");

        // Button Text
        $currencyCode.text(
            currencyCode + " (" + currencySymbol + ") – " + country,
        );

        // Close Dropdown
        $currencyMenu.removeClass("open");

        $currencyBtn.removeClass("open");

        // AJAX
        $.ajax({
            url: "/change-currency",

            type: "POST",

            data: {
                currency: currencyCode,
                _token: $('meta[name="csrf-token"]').attr("content"),
            },

            success: function (response) {
                //RESET ALL QUANTITY INPUTS
                $(".ul-quantity-input").val(1);

                // Update Pricing
                updateCurrency(response.amount, response.symbol);

                //RECALCULATE TEAM CARDS
                $(".monthly-plans").each(function () {
                    updateTeamCardCalculation($(this), 1);
                });

                // Update Button Text
                $currencyCode.text(
                    currencyCode + " (" + response.symbol + ") – " + country,
                );
            },
        });
    });

    // =========================
    // Search Filter
    // =========================
    $("#currencySearch").on("keyup", function () {
        let value = $(this).val().toLowerCase();

        $("#currencyMenu li[data-currency]").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });
});

//send data to payment page==================================================
$(document).on("click", ".js-select-plan", function () {
    handlePlanSelection($(this), "single");
});

$(document).on("click", ".team-js-select-plan", function () {
    handlePlanSelection($(this), "team");
});

$(document).on("click", ".js-select-plan-compare", function () {
    handlePlanSelection($(this), "single");
});

$(document).on("click", ".team-js-select-plan-compare", function () {
    handlePlanSelection($(this), "team");
});

function handlePlanSelection(btn, forcedType) {
    let container;

    if (btn.closest(".personal-card").length) {
        container = btn.closest(".personal-card");
    } else if (btn.closest(".ul-cards").length) {
        container = btn.closest(".ul-cards");
    } else if (btn.closest("td").length) {
        let td = btn.closest("td");
        let columnIndex = td.index();
        let table = td.closest("table");
        let matchingTh = table.find("thead th").eq(columnIndex);

        container = $("<div>");
        container.append(td.clone());
        container.append(matchingTh.clone());
    }

    let symbol =
        container.find(".personal-card-symbol-ul").first().text().trim() ||
        container.find(".table-plan-symbol").first().text().trim() ||
        $(".table-plan-symbol").first().text().trim();

    let amount =
        container.find(".total-price-ul").first().text().trim() ||
        container.find(".table-plan-amount").first().text().trim() ||
        $(".table-plan-amount").first().text().trim();

    amount = amount.replace(/,/g, "");

    let qty = container.find(".ul-quantity-input").length
        ? parseInt(container.find(".ul-quantity-input").val()) || 1
        : 1;

    let discountEl = container.find(".discount-ul");
    let extraDiscountEl = container.find(".extra-discount-ul");
    let tableAmountEl = container.find(".table-plan-amount");

    const planData = {
        plan_type: forcedType, // 🔥 IMPORTANT FIX

        plan_id: btn.data("plan-id"),
        name: btn.data("name"),

        license: qty,
        storage: parseInt(btn.data("storage")) || 10,
        storage_unit: btn.data("storage-unit") || "GB",

        symbol: symbol,
        price: parseFloat(amount) || 0,

        monthly_discount:
            parseFloat(discountEl.data("monthly")) ||
            parseFloat(tableAmountEl.data("monthly-discount")) ||
            0,

        yearly_discount:
            parseFloat(discountEl.data("yearly")) ||
            parseFloat(tableAmountEl.data("yearly-discount")) ||
            0,

        extra_monthly:
            parseFloat(extraDiscountEl.data("monthly")) ||
            parseFloat(tableAmountEl.data("extra-monthly")) ||
            0,

        extra_yearly:
            parseFloat(extraDiscountEl.data("yearly")) ||
            parseFloat(tableAmountEl.data("extra-yearly")) ||
            0,
    };

    // console.log("FINAL PLAN:", planData);

    localStorage.setItem("selectedPlan", JSON.stringify(planData));

    window.location.href =
        "/payment?currency_code=" +
        (document.querySelector("#currencyMenu li.active")?.dataset.currency ||
            "") +
        "&plan_type=" +
        planData.plan_type;
}



// $(document).on(
//     "click",
//     ".js-select-plan, .team-js-select-plan, .js-select-plan-compare, .team-js-select-plan-compare",
//     function () {
//         const btn = $(this);

//         const isPersonal = btn.hasClass("js-select-plan");
//         const isTeam = btn.hasClass("team-js-select-plan");

//         //comapare
//         const isPersonalCompare = btn.hasClass("js-select-plan-compare");
//         const isTeamCompare = btn.hasClass("team-js-select-plan-compare");

//         let container;

//         // Personal Card
//         if (btn.closest(".personal-card").length) {
//             container = btn.closest(".personal-card");
//         }

//         // Team Card
//         else if (btn.closest(".ul-cards").length) {
//             container = btn.closest(".ul-cards");
//         }

//         // Compare Table
//         else if (btn.closest("td").length) {
//             let td = btn.closest("td");

//             let columnIndex = td.index();

//             let table = td.closest("table");

//             let matchingTh = table.find("thead th").eq(columnIndex);

//             container = $("<div>");

//             // Add current td
//             container.append(td.clone());

//             // Add matching header
//             container.append(matchingTh.clone());
//         }

//         let symbol = "";

//         // From cards
//         symbol = container
//             .find(".personal-card-symbol-ul")
//             .first()
//             .text()
//             .trim();

//         // From compare table
//         if (!symbol) {
//             symbol = container.find(".table-plan-symbol").first().text().trim();
//         }

//         // fallback
//         if (!symbol) {
//             symbol = $(".table-plan-symbol").first().text().trim();
//         }

//         let amount = "";

//         // Personal / Team card
//         amount = container.find(".total-price-ul").first().text().trim();

//         // Compare table
//         if (!amount) {
//             amount = container.find(".table-plan-amount").first().text().trim();
//         }

//         // fallback
//         if (!amount) {
//             amount = $(".table-plan-amount").first().text().trim();
//         }

//         amount = amount.replace(/,/g, "");

//         let discountEl = container.find(".discount-ul");

//         let extraDiscountEl = container.find(".extra-discount-ul");

//         let tableAmountEl = container.find(".table-plan-amount");

//         let qty = 1;

//         if (container.find(".ul-quantity-input").length) {
//             qty = parseInt(container.find(".ul-quantity-input").val()) || 1;
//         }

//         let billingType = "monthly";

//         // SINGLE USER
//         if (btn.data("plan-type") === "single") {
//             billingType = SINGLE_USER_BILLING;
//         }

//         // TEAM
//         if (btn.data("plan-type") === "team") {
//             billingType = TEAM_BILLING;
//         }

//         const planData = {
//             plan_type: btn.data("plan-type"),

//             billing_type: billingType,

//             plan_id: btn.data("plan-id"),

//             name: btn.data("name"),

//             license: qty,

//             storage: parseInt(btn.data("storage")) || 10,

//             storage_unit: btn.data("storage-unit") || "GB",

//             symbol: symbol,

//             price: parseFloat(amount) || 0,

//             monthly_discount:
//                 parseFloat(discountEl.data("monthly")) ||
//                 parseFloat(tableAmountEl.data("monthly-discount")) ||
//                 0,

//             yearly_discount:
//                 parseFloat(discountEl.data("yearly")) ||
//                 parseFloat(tableAmountEl.data("yearly-discount")) ||
//                 0,

//             extra_monthly:
//                 parseFloat(extraDiscountEl.data("monthly")) ||
//                 parseFloat(tableAmountEl.data("extra-monthly")) ||
//                 0,

//             extra_yearly:
//                 parseFloat(extraDiscountEl.data("yearly")) ||
//                 parseFloat(tableAmountEl.data("extra-yearly")) ||
//                 0,
//         };

//         // SELECTED CURRENCY
//         const activeCurrency = document.querySelector(
//             "#currencyMenu li.active",
//         );

//         const currencyData = activeCurrency
//             ? {
//                   currency_code: activeCurrency.dataset.currency,
//                   symbol: activeCurrency.dataset.symbol,
//                   base_amount: activeCurrency.dataset.amount,
//                   country: activeCurrency.dataset.country,
//                   is_base_currency: activeCurrency.dataset.base,
//               }
//             : null;

//         // Save Currency
//         localStorage.setItem("selectedCurrency", JSON.stringify(currencyData));

//         const allPlans = [];

//         $(
//             ".js-select-plan, .team-js-select-plan, .js-select-plan-compare, .team-js-select-plan-compare",
//         ).each(function () {
//             const btn = $(this);

//             allPlans.push({
//                 plan_id: btn.data("plan-id"),
//                 plan_type: btn.data("plan-type"),
//                 name: btn.data("name"),
//                 storage: btn.data("storage"),
//                 storage_unit: btn.data("storage-unit"),
//                 license: btn.data("license"),

//                 price:
//                     parseFloat(
//                         btn
//                             .closest(".personal-card, .ul-cards")
//                             .find(".total-price-ul")
//                             .first()
//                             .text()
//                             .replace(/,/g, ""),
//                     ) || 0,

//                 monthly_discount: btn.data("monthly-discount") || 0,
//                 yearly_discount: btn.data("yearly-discount") || 0,

//                 extra_monthly_discount: btn.data("extra-monthly-discount") || 0,

//                 extra_yearly_discount: btn.data("extra-yearly-discount") || 0,
//             });
//         });

//         localStorage.setItem("allPlans", JSON.stringify(allPlans));

//         localStorage.setItem("selectedPlan", JSON.stringify(planData));

//         window.location.href =
//             "/payment?currency_code=" + currencyData.currency_code;
//     },
// );
