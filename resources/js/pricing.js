// Global Variables
let CURRENT_AMOUNT = 0;
let CURRENT_SYMBOL = "";
let CURRENT_TEAM_AMOUNT = 0;
// let CURRENT_ORIGINAL_AMOUNT = 0;

// Separate Billing Types
let SINGLE_USER_BILLING = "monthly";
let TEAM_BILLING = "monthly";

function formatIndianNumber(value) {
    const number = Math.round(Number(value) || 0);
    return number.toLocaleString("en-IN");
}

function formatOfferMessage(message, totalDiscount) {
    const cleanMessage = (message || "").trim();

    if (!cleanMessage && totalDiscount <= 0) {
        return "";
    }

    const fallbackMessage =
        cleanMessage || `🎉 ${totalDiscount}% Team Discount Total Savings ${totalDiscount}%`;

    return fallbackMessage.replace(/\s+(Total Savings\s+\d+(?:\.\d+)?%)/i, "<br>$1");
}

function getCurrencyAdjustedPlanAmount(planBox, convertedAmount) {
    return Math.round(convertedAmount);
}

function alignPricingHeaders() {
    if (window.innerWidth > 640) {
        let descriptions = document.querySelectorAll(".po-plan-description");
        descriptions.forEach(el => el.style.minHeight = "auto");
        let maxHeight = 0;
        descriptions.forEach(el => {
            let h = el.offsetHeight;
            if (h > maxHeight) {
                maxHeight = h;
            }
        });
        descriptions.forEach(el => el.style.minHeight = maxHeight + "px");
    } else {
        document.querySelectorAll(".po-plan-description").forEach(el => el.style.minHeight = "auto");
    }
}

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
        let quantityInput = planBox.querySelector(".ul-quantity-input");
        let quantity =
            parseInt(quantityInput?.value) ||
            parseInt(quantityInput?.dataset.defaultQty) ||
            1;
        let unitAmount = getCurrencyAdjustedPlanAmount(planBox, convertedAmount);

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
            priceAmountEl.textContent = formatIndianNumber(unitAmount);
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
        // TOTAL PRICE CALCULATION (ADDITIVE)
        // =========================
        let baseTotal =
            billingType === "yearly"
                ? unitAmount * 12 * quantity
                : unitAmount * quantity;

        // Apply discount only for TEAM
        // totalDiscount = plan discount + annual billing discount (yearly only)
        let planDiscount = isTeam === 1 ? discount : 0;
        let annualDiscount =
            isTeam === 1 && billingType === "yearly" ? extraDiscount : 0;

        let totalDiscount = planDiscount + annualDiscount;

        let discountAmount = (baseTotal * totalDiscount) / 100;

        let finalTotal = baseTotal - discountAmount;
        let displayUnitPrice = unitAmount - (unitAmount * totalDiscount) / 100;

        finalTotal = Math.round(finalTotal);
        discountAmount = Math.round(discountAmount);
        displayUnitPrice = Math.round(displayUnitPrice);

        // =========================
        // ORIGINAL PRICE (TEAM)
        // =========================
const originalPriceRow = planBox.querySelector(".original-price-team");

        if (originalPriceRow) {
            // Show only if any discount is applied
            if (totalDiscount > 0) {
                originalPriceRow.style.display = "flex";

                originalPriceRow.querySelector(
                    ".personal-card-symbol-ul-team",
                ).textContent = currencySymbol;

                originalPriceRow.querySelector(
                    ".ul-original-price-team",
                ).textContent = formatIndianNumber(baseTotal);

                originalPriceRow.querySelector(
                    ".ul-personal-card-period-team",
                ).textContent = "/month";
            } else {
                originalPriceRow.style.display = "none";
            }
        }

        // =========================
        // UPDATE UI
        // =========================
        let totalPriceEl = planBox.querySelector(".total-price-ul");
        if (totalPriceEl) {
            totalPriceEl.textContent = formatIndianNumber(displayUnitPrice);
        }

        planBox
            .querySelectorAll(".view-currency")
            .forEach((viewCurrency) => {
                viewCurrency.textContent = currencySymbol;
            });

        // Base Total (per licence block, before discount)
        let baseTotalView = planBox.querySelector(".view-total-amount-count");
        if (baseTotalView) {
            baseTotalView.textContent = formatIndianNumber(baseTotal);
        }

        // Total Amount (per licence block, after discount)
        let baseTotalRow = planBox.querySelector(".base-price");
        if (baseTotalRow) {
            baseTotalRow.textContent = formatIndianNumber(unitAmount);
        }

        // Discount row (Base Total - show/hide)
        let discountRow = planBox.querySelector("[discount-apply]");
        if (discountRow) {
            if (totalDiscount > 0) {
                discountRow.style.visibility = "visible";
            } else {
                discountRow.style.visibility = "hidden";
            }
        }

// Discount Amount Display
        planBox
            .querySelectorAll(".view-total-discount-count")
            .forEach((totalDiscountView) => {
                totalDiscountView.textContent = formatIndianNumber(discountAmount);
            });

        // Discount % Badge (e.g. "(5% off)")
        let discountPercentBadge = planBox.querySelector(
            ".discount-percent-badge",
        );
        if (discountPercentBadge) {
            if (totalDiscount > 0) {
                discountPercentBadge.textContent = `(${totalDiscount}% off)`;
            } else {
                discountPercentBadge.textContent = "";
            }
        }

        // Total (Per Month / Per Year) label
        let totalPeriodLabel = planBox.querySelector(".total-period-label");
        if (totalPeriodLabel) {
            totalPeriodLabel.textContent =
                billingType === "yearly"
                    ? "(Total Per Year)"
                    : "(Total Per Month)";
        }

        // Final Total Amount Display
        let totalAmountDisplay = planBox.querySelector(
            ".total-amt-sty .view-total-amount-count",
        );
        if (totalAmountDisplay) {
            totalAmountDisplay.textContent = formatIndianNumber(finalTotal);
        }

        // You Save Display
        let totalSavingsView = planBox.querySelector(
            ".view-total-savings-count",
        );
        if (totalSavingsView) {
            totalSavingsView.textContent = formatIndianNumber(discountAmount);

            const savingsRow = totalSavingsView.closest(".po-save-line");
            if (savingsRow) {
                savingsRow.style.visibility = "visible";
            }
        }

// =========================
        // LICENSE COUNT
        // =========================

        let totalLicenceCount = quantity;

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

        //strip
        // =========================
        // UPDATE DISCOUNT STRIP
        // =========================
        let discountBadge = planBox.querySelector(".ul-discount");

        if (discountBadge) {
            const message =
                billingType === "yearly"
                    ? discountBadge.dataset.yearlyText || ""
                    : discountBadge.dataset.monthlyText || "";
            const discountCard = discountBadge.closest(".discount-cards");
            const formattedMessage = formatOfferMessage(message, totalDiscount);

            if (formattedMessage) {
                if (discountCard) {
                    discountCard.style.setProperty(
                        "display",
                        "flex",
                        "important",
                    );
                }

                discountBadge.style.display = "flex";
                discountBadge.style.visibility = "visible";
                discountBadge.innerHTML = formattedMessage;
            } else {
                if (discountCard) {
                    discountCard.style.setProperty(
                        "display",
                        "flex",
                        "important",
                    );
                    discountCard.style.visibility = "hidden";
                }

                discountBadge.style.display = "none";
                discountBadge.style.visibility = "hidden";
                discountBadge.innerHTML = "";
            }

            if (formattedMessage && discountCard) {
                discountCard.style.visibility = "visible";
            }
        }

        // Period text
        let userText = planBox.querySelector(".user-text");
        if (userText) {
            userText.textContent = "month";
        }

        planBox
            .querySelectorAll(".base-user-label")
            .forEach((el) => {
                el.textContent = "Base User / Month";
            });

        planBox
            .querySelectorAll(".billing-months-row")
            .forEach((el) => {
                el.style.display = billingType === "yearly" ? "flex" : "none";
            });

        planBox
            .querySelectorAll(".billing-yearly-calculation")
            .forEach((el) => {
                el.innerHTML = `<span>(${formatIndianNumber(unitAmount)} * 12 * ${quantity} users)</span><strong>${currencySymbol}${formatIndianNumber(baseTotal)}</strong>`;
            });

        planBox.classList.toggle("is-yearly", billingType === "yearly");

        const planDiscountPercent = planBox.querySelector(
            ".plan-discount-percent",
        );
        if (planDiscountPercent) {
            planDiscountPercent.textContent = `${planDiscount}%`;
        }

        const annualDiscountPercent = planBox.querySelector(
            ".annual-discount-percent",
        );
        if (annualDiscountPercent) {
            annualDiscountPercent.textContent = `${annualDiscount}%`;
        }

        const annualTotalDiscountPercent = planBox.querySelector(
            ".annual-total-discount-percent",
        );
        if (annualTotalDiscountPercent) {
            annualTotalDiscountPercent.textContent = `${totalDiscount}%`;
        }
    });

    alignPricingHeaders();
}

// =========================
// Update Single User Plans
// =========================
function updateSingleUserPlans(amount, symbol, billingType = "monthly") {
    // amount = Math.round(amount);

    $(".ul-personal-card-amount").each(function () {
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

        // ADDITIVE DISCOUNT
        let totalDiscount = discount + extraDiscount;

        total = total - (total * totalDiscount) / 100;

        // Final Round
        total = Math.round(total);

        // Update Amount
        el.text(formatIndianNumber(total));
    });

    // $(".ul-original-price").each(function () {
    //     let el = $(this);

    //     // Base Amount
    //     let total = billingType === "yearly" ? amount * 12 : amount;

    //     // Final Round
    //     total = Math.round(total);

    //     // Update Amount
    //     el.text(total);
    // });

    $(".ul-personal-card-amount").each(function () {
        let el = $(this);

        let monthlyDiscount = parseFloat(el.attr("data-monthly-discount")) || 0;
        let yearlyDiscount = parseFloat(el.attr("data-yearly-discount")) || 0;

        let extraMonthly = parseFloat(el.attr("data-extra-monthly")) || 0;
        let extraYearly = parseFloat(el.attr("data-extra-yearly")) || 0;

        let discount =
            billingType === "yearly" ? yearlyDiscount : monthlyDiscount;

        let extraDiscount =
            billingType === "yearly" ? extraYearly : extraMonthly;

let originalPrice = billingType === "yearly" ? amount * 12 : amount;

        // CURRENT_ORIGINAL_AMOUNT = Math.round(originalPrice);

        // ADDITIVE DISCOUNT
        let totalDiscount = discount + extraDiscount;

        let finalPrice = originalPrice - (originalPrice * totalDiscount) / 100;

        el.text(formatIndianNumber(finalPrice));

        const originalPriceRow = el
            .closest(".personal-card")
            .find(".original-price-single");

        if (totalDiscount > 0) {
            originalPriceRow.show();
            originalPriceRow
                .find(".ul-original-price")
                .text(formatIndianNumber(originalPrice));
        } else {
            originalPriceRow.hide();
        }
    });

    // Currency Symbol
    $(".personal-card-symbol-ul").text(symbol);

    // Period
    $(".ul-personal-card-period").text(
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

        // ADDITIVE DISCOUNT
        let totalDiscount = discount + extraDiscount;

        total = total - (total * totalDiscount) / 100;

        amountEl.text(formatIndianNumber(total));

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

// Apply Discount ONLY if
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

        // ADDITIVE DISCOUNT
        let totalDiscount = discount + extraDiscount;

        // Apply Discounts
        total = total - (total * totalDiscount) / 100;

        amountEl.text(formatIndianNumber(total));

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

        alignPricingHeaders();
    }, 100);
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

    alignPricingHeaders();
    $(window).on("resize", alignPricingHeaders);

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
            $(".show-strip-month").slideUp();
        } else {
            $(".show-strip").slideUp();
            $(".show-strip-month").slideDown();
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

        let currentQty = parseInt(qtyInput.val());

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
        let currentQty = parseInt(qtyInput.val());
        let defaultQty = parseInt(qtyInput.data("default-qty")) || 1;

        if (currentQty > defaultQty) {
            currentQty--;

            qtyInput.val(currentQty);

            updateTeamCardCalculation(planBox, currentQty);
        } else {
            toastr.error(`Minimum quantity is ${defaultQty}.`);
        }

        // let currentQty = parseInt(qtyInput.val());

        // if (currentQty > 1) {
        //     currentQty--;

        //     qtyInput.val(currentQty);

        //     updateTeamCardCalculation(planBox, currentQty);
        // }
    });

    // =========================
    // Team Card Calculation
    // =========================
    function updateTeamCardCalculation(planBox, quantity = 1) {
        // Base Values
        let baseAmount = getCurrencyAdjustedPlanAmount(
            planBox.get(0),
            CURRENT_AMOUNT || 0,
        );

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
        let totalLicenceCount = quantity;

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
        let baseTotalAmount = baseAmount * totalLicenceCount;

        // Yearly
        if (TEAM_BILLING === "yearly") {
            baseTotalAmount = baseTotalAmount * 12;
        }

        // ADDITIVE DISCOUNT
        // totalDiscount = plan discount + annual billing discount (yearly only)
        let planDiscount = discount;
        let annualDiscount = TEAM_BILLING === "yearly" ? extraDiscount : 0;

        let totalDiscountPct = planDiscount + annualDiscount;

        let discountAmount = (baseTotalAmount * totalDiscountPct) / 100;

        let finalTotal = baseTotalAmount - discountAmount;

        // Round
        let baseTotalRounded = Math.round(baseTotalAmount);
        let finalTotalRounded = Math.round(finalTotal);
        discountAmount = Math.round(discountAmount);

        // Base Total (before discount) - first .view-total-amount-count
        planBox.find(".view-total-amount-count").first()
            .text(formatIndianNumber(baseTotalRounded));

        // Total (Per Month / Per Year) after discount - inside .total-amt-sty
        planBox.find(".total-amt-sty .view-total-amount-count")
            .text(formatIndianNumber(finalTotalRounded));

        // Discount Display
        if (totalDiscountPct > 0) {
            planBox.find("[discount-apply]").css("visibility", "visible");
        } else {
            planBox.find("[discount-apply]").css("visibility", "hidden");
        }
        planBox
            .find(".view-total-discount-count")
            .text(formatIndianNumber(discountAmount));

        // Discount % badge
        let pctBadge = planBox.find(".discount-percent-badge");
        if (pctBadge.length) {
            pctBadge.text(
                totalDiscountPct > 0 ? `(${totalDiscountPct}% off)` : "",
            );
        }

        // You Save
        planBox.find(".view-total-savings-count").text(formatIndianNumber(discountAmount));
        planBox
            .find(".po-save-line")
            .each(function () {
                this.style.visibility = "visible";
            });

        // Total period label
        let periodLabel = planBox.find(".total-period-label");
        if (periodLabel.length) {
            periodLabel.text(
                TEAM_BILLING === "yearly"
                    ? "(Total Per Year)"
                    : "(Total Per Month)",
            );
        }

        planBox.toggleClass("is-yearly", TEAM_BILLING === "yearly");
        planBox.find(".base-user-label").text(
            "Base User / Month",
        );
        planBox
            .find(".billing-months-row")
            .css("display", TEAM_BILLING === "yearly" ? "flex" : "none");
        planBox
            .find(".billing-yearly-calculation")
            .html(
                `<span>(${formatIndianNumber(baseAmount)} * 12 * ${totalLicenceCount} users)</span><strong>${CURRENT_SYMBOL}${formatIndianNumber(baseTotalAmount)}</strong>`,
            );
        planBox.find(".plan-discount-percent").text(`${planDiscount}%`);
        planBox.find(".annual-discount-percent").text(`${annualDiscount}%`);
        planBox.find(".annual-total-discount-percent").text(`${totalDiscountPct}%`);

        alignPricingHeaders();
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
                // Update Pricing
                updateCurrency(response.amount, response.symbol);

                //RECALCULATE TEAM CARDS
                $(".monthly-plans").each(function () {
                    const qty =
                        parseInt($(this).find(".ul-quantity-input").val()) ||
                        parseInt(
                            $(this)
                                .find(".ul-quantity-input")
                                .data("default-qty"),
                        ) ||
                        1;
                    updateTeamCardCalculation($(this), qty);
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
        container
            .find(".total-amt-sty .view-total-amount-count")
            .first()
            .text()
            .trim() ||
        container.find(".total-price-ul").first().text().trim() ||
        container.find(".table-plan-amount").first().text().trim() ||
        $(".table-plan-amount").first().text().trim();

    amount = amount.replace(/,/g, "");

    let qty = container.find(".ul-quantity-input").length
        ? parseInt(container.find(".ul-quantity-input").val())
        : parseInt(btn.data("default-qty")) || 1;

    let discountEl = container.find(".discount-ul");
    let extraDiscountEl = container.find(".extra-discount-ul");
    let tableAmountEl = container.find(".table-plan-amount");
    let singleAmountEl = container.find(".ul-personal-card-amount");

    let billingType = "monthly";

    if (forcedType === "team") {
        billingType =
            $(".team-billing-toggle.active").data("type") || "monthly";
    } else {
        billingType = container.find(".billing-toggle").is(":checked")
            ? "yearly"
            : "monthly";
    }

    let originalPrice = 0;

    if (forcedType === "team") {
        // Team plans
        const teamPlanBox = btn.closest(".monthly-plans").get(0);
        const users = qty;
        const unitAmount = teamPlanBox
            ? getCurrencyAdjustedPlanAmount(teamPlanBox, CURRENT_AMOUNT)
            : CURRENT_AMOUNT;

        originalPrice =
            billingType === "yearly"
                ? unitAmount * 12 * users
                : unitAmount * users;
    } else {
        // Single user plans
        originalPrice =
            billingType === "yearly" ? CURRENT_AMOUNT * 12 : CURRENT_AMOUNT;
    }

    originalPrice = Math.round(originalPrice);

    const planData = {
        plan_type: forcedType,
        billing_type: billingType,

        plan_id: btn.data("plan-id"),
        name: btn.data("name"),

        // license: qty,
        license: btn.data("license"),
        quantity: qty,
        default_qty: parseInt(btn.data("default-qty")) || qty || 1,
        storage: parseInt(btn.data("storage")) || 10,
        storage_unit: btn.data("storage-unit") || "GB",

        symbol: symbol,
        price: parseFloat(amount) || 0,
        original_price: originalPrice,
        // original_price: CURRENT_ORIGINAL_AMOUNT,

        monthly_discount:
            parseFloat(singleAmountEl.data("monthly-discount")) ||
            parseFloat(discountEl.data("monthly")) ||
            parseFloat(tableAmountEl.data("monthly-discount")) ||
            0,

        yearly_discount:
            parseFloat(singleAmountEl.data("yearly-discount")) ||
            parseFloat(discountEl.data("yearly")) ||
            parseFloat(tableAmountEl.data("yearly-discount")) ||
            0,

        extra_monthly:
            parseFloat(singleAmountEl.data("extra-monthly")) ||
            parseFloat(extraDiscountEl.data("monthly")) ||
            parseFloat(tableAmountEl.data("extra-monthly")) ||
            0,

        extra_yearly:
            parseFloat(singleAmountEl.data("extra-yearly")) ||
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
        planData.plan_type +
        "&billing_type=" +
        planData.billing_type;
}
