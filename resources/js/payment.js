document.addEventListener("DOMContentLoaded", function () {
    function formatIndianNumber(value) {
        const number = Math.round(Number(value) || 0);
        return number.toLocaleString("en-IN");
    }

    function formatCurrencyAmount(symbol, value) {
        return (symbol || "") + formatIndianNumber(value);
    }

    const allPlans = JSON.parse(localStorage.getItem("allPlans")) || [];

    const selectedPlan = JSON.parse(localStorage.getItem("selectedPlan"));

    // console.log("selectedPlan", selectedPlan);

    // const selectedCurrency = JSON.parse(
    //     localStorage.getItem("selectedCurrency"),
    // );

    const urlParams = new URLSearchParams(window.location.search);

    const selectedCurrency = {
        currency_code: urlParams.get("currency_code"),
    };

    const urlPlanType = (urlParams.get("plan_type") || "").toLowerCase();
    const urlBillingType = (urlParams.get("billing_type") || "").toLowerCase();

    if (!selectedPlan) {
        return;
    }

    const qty = selectedPlan.quantity || 1;
    const input = document.getElementById("payQtyInput");
    if (input) {
        input.value = qty;
    }

    const summaryPlanName = document.getElementById("summaryPlanName");
    const summarySubtitle = document.querySelector(".os-subtitle");
    const summarySymbol = document.getElementById("summarySymbol");
    const summaryUnitPrice = document.getElementById("summaryUnitPrice");
    const summaryOrgTotal = document.getElementById("summaryOrgTotal");
    const summarySubtotalLabel = document.getElementById("summarySubtotalLabel");
    const summarySubtotal = document.getElementById("summarySubtotal");
    const summaryTotal = document.getElementById("summaryTotal");
    const summaryTax = document.getElementById("summaryTax");
    const summaryOriginalRow = summaryOrgTotal?.closest(".summary-row");
    const summarySubtotalRow = summarySubtotal?.closest(".summary-row");

    const planFeatureList = document.getElementById("planFeatureList");
    const summaryPlanIcon = document.getElementById("summaryPlanIcon");

    const payBillingToggle = document.getElementById("payBillingToggle");
    const payBillingControls = document.getElementById("payBillingControls");

    const payBillingMonthLabel = document.getElementById(
        "payBillingMonthLabel",
    );

    const payBillingYearLabel = document.getElementById("payBillingYearLabel");

    const monthlyDiscountBadge = document.getElementById(
        "monthlyDiscountBadge",
    );

    const yearlyDiscountBadge = document.getElementById("yearlyDiscountBadge");

    const payToggleTrack = document.getElementById("payToggleTrack");
    const payToggleThumb = document.getElementById("payToggleThumb");

    const payQtyInput = document.getElementById("payQtyInput");
    const payQtyPlus = document.getElementById("payQtyPlus");
    const payQtyMinus = document.getElementById("payQtyMinus");

    const payQtyControls = document.getElementById("payQtyControls");

    const paySavingsNotice = document.getElementById("paySavingsNotice");

    const modalTotal = document.getElementById("modalTotal");

    const discountRow = document.getElementById("discountRow");
    const discountAmt = document.getElementById("discountAmt");

    const extradiscountRow = document.getElementById("extradiscountRow");
    const extradiscountAmt = document.getElementById("extradiscountAmt");

    const promoDiscountRow = document.getElementById("promoDiscountRow");
    const promoDiscountAmt = document.getElementById("promoDiscountAmt");

    const planTiles = document.querySelectorAll(".selected-plan-option");
    const planSelector = document.querySelector(".pay-plan-selector");

    const companyForm = document.querySelector(".pay-company-form");

    let currentPlan = {
        ...selectedPlan,

        // map localStorage values
        extra_monthly_discount: selectedPlan.extra_monthly || 0,
        extra_yearly_discount: selectedPlan.extra_yearly || 0,

        extra_mo_discount: selectedPlan.extra_monthly || 0,
        extra_yr_discount: selectedPlan.extra_yearly || 0,
    };

    if (urlPlanType) {
        currentPlan.plan_type = urlPlanType;
    }

    let quantity = Math.max(
        parseInt(selectedPlan.quantity || 1),
        parseInt(selectedPlan.default_qty || 1),
        1,
    );
    let currentPayableSubtotal = 0;
    let currentFinalPayableTotal = 0;
    let currentUnitPayablePrice = 0;
    let currentOriginalTotal = 0;
    let currentPlanSavingsAmount = 0;
    let currentMainDiscountPercent = 0;
    let currentExtraDiscountPercent = 0;

    function getPlanIconSvg(planName = "") {
        const normalizedName = planName.toLowerCase();

        if (
            normalizedName.includes("personal") ||
            normalizedName.includes("basic")
        ) {
            return `<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21a8 8 0 0 0-16 0"/><path d="M12 13a5 5 0 1 0 0-10 5 5 0 0 0 0 10Z"/></svg>`;
        }

        if (normalizedName.includes("standard")) {
            return `<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3v18h18"/><path d="m7 15 4-4 3 3 5-7"/></svg>`;
        }

        if (normalizedName.includes("advanced")) {
            return `<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linejoin="round"><path d="m3 8 5 4 4-7 4 7 5-4-2 11H5L3 8Z"/><path d="M5 19h14"/></svg>`;
        }

        return `<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10Z"/><path d="m9 12 2 2 4-5"/></svg>`;
    }

    function getPlanMinimumQuantity(plan = currentPlan) {
        if (plan.plan_type !== "team") {
            return 1;
        }

        const defaultQuantity = parseInt(plan.default_qty || 0);

        if (defaultQuantity > 0) {
            return Math.max(defaultQuantity, 1);
        }

        return Math.max(parseInt(plan.quantity || 0), 1);
    }

    function getPlanQuantityStep(plan = currentPlan) {
        if (plan.plan_type !== "team") {
            return 1;
        }

        return Math.max(parseInt(plan.license || 1), 1);
    }

    function normalizeTeamQuantity(value, plan = currentPlan) {
        const minQuantity = getPlanMinimumQuantity(plan);
        const step = getPlanQuantityStep(plan);

        let normalized = Math.max(parseInt(value || minQuantity), minQuantity);

        if (step > 1 && normalized > minQuantity) {
            const offset = normalized - minQuantity;
            normalized = minQuantity + Math.ceil(offset / step) * step;
        }

        return normalized;
    }

    function syncPlanFromTile(tile, preserveQuantity = false) {
        if (!tile) {
            return;
        }

        const nextPlan = {
            ...currentPlan,
            plan_type: tile.dataset.planType,
            plan_id: tile.dataset.planId,
            name: tile.dataset.name,
            display_name: tile.dataset.name,
            default_qty: parseInt(tile.dataset.defQty || 1),
            price: tile.dataset.pricemonth || 0,
            priceM: parseFloat(tile.dataset.monthlyPrice) || 0,
            priceY: parseFloat(tile.dataset.yearlyPrice) || 0,
            originalPriceM: parseFloat(tile.dataset.originalMonthly) || 0,
            originalPriceY: parseFloat(tile.dataset.originalYearly) || 0,
            unit_rate:
                parseFloat(tile.dataset.unitRate) ||
                parseFloat(currentPlan.unit_rate || currentPlan.base_amount || 0),
            symbol: tile.dataset.symbol || " ",
            subscription: tile.dataset.subscription || "monthly",
            license: tile.dataset.license,
            storage: tile.dataset.storage,
            storage_unit: tile.dataset.storageUnit,
            monthly_discount:
                tile.dataset.planType === "single"
                    ? parseFloat(tile.dataset.singleuserMonthlyDiscount) || 0
                    : parseFloat(tile.dataset.monthlyDiscount) || 0,
            yearly_discount:
                tile.dataset.planType === "single"
                    ? parseFloat(tile.dataset.singleuserYearlyDiscount) || 0
                    : parseFloat(tile.dataset.yearlyDiscount) || 0,
            extra_monthly_discount:
                parseFloat(tile.dataset.extraMonthlyDiscount) || 0,
            extra_yearly_discount:
                parseFloat(tile.dataset.extraYearlyDiscount) || 0,
            extra_mo_discount:
                tile.dataset.planType === "single"
                    ? parseFloat(tile.dataset.singleuserExtraMoDiscount) || 0
                    : parseFloat(tile.dataset.extraMoDiscount) || 0,
            extra_yr_discount:
                tile.dataset.planType === "single"
                    ? 0
                    : parseFloat(tile.dataset.extraYrDiscount) || 0,
        };

        const minQuantity = getPlanMinimumQuantity(nextPlan);
        const nextQuantity = preserveQuantity
            ? normalizeTeamQuantity(payQtyInput?.value || minQuantity, nextPlan)
            : minQuantity;

        currentPlan = nextPlan;
        quantity = nextQuantity;
        currentPlan.quantity = nextQuantity;

        if (payQtyInput) {
            payQtyInput.value = nextQuantity;
            payQtyInput.min = minQuantity;
            payQtyInput.step = getPlanQuantityStep(nextPlan);
        }
    }

    planTiles.forEach((tile) => {
        const icon = tile.querySelector(".pay-plan-tile__icon");

        if (icon) {
            icon.innerHTML = getPlanIconSvg(tile.dataset.name || "");
        }
    });

    const selectedTile =
        Array.from(planTiles).find(
            (tile) =>
                tile.dataset.planId == currentPlan.plan_id &&
                tile.dataset.planType == currentPlan.plan_type,
        ) || document.querySelector(".selected-plan-option.selected");

    if (selectedTile) {
        planTiles.forEach((tile) => tile.classList.remove("selected"));
        selectedTile.classList.add("selected");
        syncPlanFromTile(selectedTile, true);
    }

    currentPlan.currencyid = selectedCurrency?.currency_code || null;
    currentPlan.symbol = selectedCurrency?.symbol || currentPlan.symbol;
    currentPlan.base_amount = selectedCurrency?.base_amount || 0;

    const initialBillingType =
        urlBillingType ||
        currentPlan.billing_type ||
        currentPlan.subscription ||
        "monthly";

    if (payBillingToggle) {
        payBillingToggle.checked =
            initialBillingType.toLowerCase() === "yearly";
    }

    // Keep the plan selector available for both Personal and Team purchases.
    // This allows Personal -> Team and Team -> Personal changes on the payment page.
    payBillingControls?.classList.remove("hidden");
    planSelector?.classList.remove("hidden");

    planTiles.forEach((tile) => {
        tile.style.display = "inline-flex";
    });

    //toggle change for monthly or yearly
    function updateToggleUI() {
        if (!payBillingToggle) {
            return;
        }

        const yearly = payBillingToggle.checked;

        payToggleTrack?.classList.toggle("yearly-selected", yearly);
        payBillingMonthLabel?.classList.toggle("active", !yearly);
        payBillingYearLabel?.classList.toggle("active", yearly);
    }

    // Refresh selected plan, billing, quantity and summary values.
    function renderPlanData() {
        if (!payBillingToggle) {
            return;
        }

        const isYearly = payBillingToggle.checked;
        const billingType = isYearly ? "yearly" : "monthly";
        const minQuantity = getPlanMinimumQuantity();
        const quantityStep = getPlanQuantityStep();

        let quantityValue = 1;

        if (currentPlan.plan_type === "team") {
            quantityValue = normalizeTeamQuantity(
                payQtyInput?.value || minQuantity,
                currentPlan,
            );

            quantity = quantityValue;
            currentPlan.quantity = quantityValue;

            if (payQtyInput) {
                payQtyInput.value = quantityValue;
                payQtyInput.min = minQuantity;
                payQtyInput.step = quantityStep;
            }
        } else {
            quantityValue = 1;
            quantity = 1;
            currentPlan.quantity = 1;

            if (payQtyInput) {
                payQtyInput.value = 1;
                payQtyInput.min = 1;
                payQtyInput.step = 1;
            }
        }

        // Match pricing.js: currency rate is the per-user monthly base price.
        const monthlyUnitRate =
            parseFloat(currentPlan.unit_rate || 0) ||
            parseFloat(currentPlan.originalPriceM || 0) ||
            parseFloat(currentPlan.base_amount || 0) ||
            parseFloat(currentPlan.priceM || currentPlan.price || 0);

        const originalUnitPrice = isYearly
            ? monthlyUnitRate * 12
            : monthlyUnitRate;

        const activeDiscount = Math.max(
            0,
            isYearly
                ? parseFloat(currentPlan.yearly_discount || 0)
                : parseFloat(currentPlan.monthly_discount || 0),
        );

        const extraDiscount = Math.max(
            0,
            isYearly
                ? parseFloat(currentPlan.extra_yr_discount || 0)
                : parseFloat(currentPlan.extra_mo_discount || 0),
        );

        const totalDiscountPercent = Math.min(
            activeDiscount + extraDiscount,
            100,
        );

        const discountedUnitPrice =
            originalUnitPrice * (1 - totalDiscountPercent / 100);

        const originalTotal = originalUnitPrice * quantityValue;
        const subtotalAmount = discountedUnitPrice * quantityValue;

        const activeDiscountAmount = Math.round(
            (originalTotal * activeDiscount) / 100,
        );

        const extraDiscountAmount = Math.round(
            (originalTotal * extraDiscount) / 100,
        );

        const planSavingsAmount = Math.min(
            Math.round(originalTotal),
            activeDiscountAmount + extraDiscountAmount,
        );

        currentOriginalTotal = Math.round(originalTotal);
        currentPayableSubtotal = Math.max(0, Math.round(subtotalAmount));
        currentUnitPayablePrice = Math.max(0, Math.round(discountedUnitPrice));
        currentPlanSavingsAmount = planSavingsAmount;
        currentMainDiscountPercent = activeDiscount;
        currentExtraDiscountPercent = extraDiscount;

        currentPlan.billing_type = billingType;
        currentPlan.quantity = quantityValue;

        const displayPlanName =
            currentPlan.name ||
            currentPlan.display_name ||
            (currentPlan.plan_type === "single" ? "Personal" : "Premium");

        if (summaryPlanName) {
            summaryPlanName.innerText = displayPlanName;
        }

        const continuePlanName = document.getElementById("poContinuePlanName");
        if (continuePlanName) {
            continuePlanName.innerText = displayPlanName;
        }

        if (summarySubtitle) {
            summarySubtitle.innerText =
                currentPlan.plan_type === "single"
                    ? "Personal plan selected. You can switch to a Team plan anytime."
                    : "Select a plan that fits your team's needs. You can switch plans anytime.";
        }

        if (summaryPlanIcon) {
            summaryPlanIcon.innerHTML = getPlanIconSvg(displayPlanName);
        }

        const poSymbol = document.getElementById("poSymbol");
        const poUnitPrice = document.getElementById("poUnitPrice");
        const poSumBaseUser = document.getElementById("poSumBaseUser");
        const poSumUsers = document.getElementById("poSumUsers");
        const poMinQtyText = document.getElementById("poMinQtyText");
        const payQtyHint = document.getElementById("payQtyHint");
        const poTotalPeriodLabel = document.getElementById("poTotalPeriodLabel");

        const monthlyEquivalent = isYearly
            ? discountedUnitPrice / 12
            : discountedUnitPrice;

        if (poSymbol) {
            poSymbol.innerText = currentPlan.symbol || "";
        }

        if (poUnitPrice) {
            poUnitPrice.innerText = formatIndianNumber(monthlyEquivalent);
        }

        if (poSumBaseUser) {
            poSumBaseUser.innerText = formatCurrencyAmount(
                currentPlan.symbol,
                monthlyUnitRate,
            );
        }

        if (poSumUsers) {
            poSumUsers.innerText = quantityValue;
        }

        if (poMinQtyText) {
            poMinQtyText.innerText = minQuantity;
        }

        if (payQtyHint) {
            payQtyHint.style.display =
                currentPlan.plan_type === "team" ? "block" : "none";
        }

        if (poTotalPeriodLabel) {
            poTotalPeriodLabel.innerText = isYearly
                ? "(Total Per Year)"
                : "(Total Per Month)";
        }

        if (summarySymbol) {
            summarySymbol.innerText = currentPlan.symbol || "";
        }

        if (summaryUnitPrice) {
            summaryUnitPrice.innerText = formatIndianNumber(monthlyEquivalent);
        }

        if (summaryOrgTotal) {
            summaryOrgTotal.innerText = formatCurrencyAmount(
                currentPlan.symbol,
                currentOriginalTotal,
            );
        }

        if (summaryTax) {
            summaryTax.innerText = formatCurrencyAmount(currentPlan.symbol, 0);
        }

        // Monthly/Yearly badges update from the current selected plan.
        const monthlyTotalDiscount =
            Math.max(parseFloat(currentPlan.monthly_discount || 0), 0) +
            Math.max(parseFloat(currentPlan.extra_mo_discount || 0), 0);

        const yearlyTotalDiscount =
            Math.max(parseFloat(currentPlan.yearly_discount || 0), 0) +
            Math.max(parseFloat(currentPlan.extra_yr_discount || 0), 0);

        if (monthlyDiscountBadge) {
            if (monthlyTotalDiscount > 0) {
                monthlyDiscountBadge.style.display = "inline-block";
                monthlyDiscountBadge.textContent =
                    `(${monthlyTotalDiscount}% Discount)`;
            } else {
                monthlyDiscountBadge.style.display = "none";
                monthlyDiscountBadge.textContent = "";
            }
        }

        if (yearlyDiscountBadge) {
            if (yearlyTotalDiscount > 0) {
                yearlyDiscountBadge.style.display = "inline-block";
                yearlyDiscountBadge.textContent =
                    `(${yearlyTotalDiscount}% Discount)`;
            } else {
                yearlyDiscountBadge.style.display = "none";
                yearlyDiscountBadge.textContent = "";
            }
        }

        if (discountRow && discountAmt) {
            if (activeDiscount > 0) {
                discountRow.classList.remove("hidden");
                discountRow.style.display = "flex";

                const label = discountRow.querySelector("span:first-child");
                if (label) {
                    label.innerHTML =
                        `Plan Discount (<span style="color:red;">${activeDiscount}%</span>)`;
                }

                discountAmt.innerText =
                    `-${formatCurrencyAmount(
                        currentPlan.symbol,
                        activeDiscountAmount,
                    )}`;
            } else {
                discountRow.classList.add("hidden");
                discountRow.style.display = "none";
            }
        }

        if (extradiscountRow && extradiscountAmt) {
            if (extraDiscount > 0) {
                extradiscountRow.classList.remove("hidden");
                extradiscountRow.style.display = "flex";

                const label =
                    extradiscountRow.querySelector("span:first-child");

                if (label) {
                    label.innerHTML =
                        `${isYearly ? "Annual Billing" : "Monthly Extra"} Discount ` +
                        `(<span style="color:red;">${extraDiscount}%</span>)`;
                }

                extradiscountAmt.innerText =
                    `-${formatCurrencyAmount(
                        currentPlan.symbol,
                        extraDiscountAmount,
                    )}`;
            } else {
                extradiscountRow.classList.add("hidden");
                extradiscountRow.style.display = "none";
            }
        }

        const poRowPlanDiscount = document.getElementById("poRowPlanDiscount");
        const poPlanDiscountVal = document.getElementById("poPlanDiscountVal");
        const poRowAnnualDiscount =
            document.getElementById("poRowAnnualDiscount");
        const poAnnualDiscountVal =
            document.getElementById("poAnnualDiscountVal");

        if (poRowPlanDiscount && poPlanDiscountVal) {
            poRowPlanDiscount.style.display =
                activeDiscount > 0 ? "flex" : "none";
            poPlanDiscountVal.innerText = `${activeDiscount}%`;
        }

        if (poRowAnnualDiscount && poAnnualDiscountVal) {
            poRowAnnualDiscount.style.display =
                extraDiscount > 0 ? "flex" : "none";

            const label = poRowAnnualDiscount.querySelector(
                ".po-summary-label",
            );
            if (label) {
                label.innerText = isYearly
                    ? "Annual Billing Discount"
                    : "Monthly Extra Discount";
            }

            poAnnualDiscountVal.innerText = `${extraDiscount}%`;
        }

        if (summaryOriginalRow) {
            summaryOriginalRow.style.display =
                totalDiscountPercent > 0 ? "flex" : "none";
        }

        if (summarySubtotalLabel) {
            summarySubtotalLabel.innerText = "You Save";
        }

        if (currentPlan.plan_type === "team") {
            if (payQtyControls) {
                payQtyControls.style.display = "block";
            }
            companyForm?.classList.remove("hidden");
        } else {
            if (payQtyControls) {
                payQtyControls.style.display = "none";
            }
            companyForm?.classList.add("hidden");
        }

        const selectedFeatures = Array.isArray(currentPlan.features)
            ? currentPlan.features
                  .map((feature) =>
                      String(feature || "")
                          .replace(/^[\s✓✔]+/u, "")
                          .replace(/\s+/g, " ")
                          .trim(),
                  )
                  .filter(Boolean)
            : [];

        if (planFeatureList) {
            if (selectedFeatures.length > 0) {
                planFeatureList.innerHTML = selectedFeatures
                    .map((feature) => `<li>${feature}</li>`)
                    .join("");
            } else {
                const displayedLicense =
                    currentPlan.plan_type === "team" ? quantityValue : 1;

                const totalStorage =
                    parseFloat(currentPlan.storage || 0) * quantityValue;

                planFeatureList.innerHTML = `
                    <li>${displayedLicense} User License</li>
                    <li>${currentPlan.storage} ${currentPlan.storage_unit} Per User</li>
                    <li>Total Storage : ${totalStorage} ${currentPlan.storage_unit}</li>
                `;
            }
        }

        planTiles.forEach((tile) => {
            tile.classList.toggle(
                "selected",
                tile.dataset.planId == currentPlan.plan_id &&
                    tile.dataset.planType == currentPlan.plan_type,
            );

            tile.style.display = "inline-flex";

            const tilePrice = tile.querySelector(".view_plan_price_details");
            if (tilePrice) {
                const tileMonthlyRate =
                    parseFloat(tile.dataset.unitRate || 0) || monthlyUnitRate;

                const tileMainDiscount = isYearly
                    ? parseFloat(
                          tile.dataset.planType === "single"
                              ? tile.dataset.singleuserYearlyDiscount
                              : tile.dataset.yearlyDiscount,
                      ) || 0
                    : parseFloat(
                          tile.dataset.planType === "single"
                              ? tile.dataset.singleuserMonthlyDiscount
                              : tile.dataset.monthlyDiscount,
                      ) || 0;

                const tileExtraDiscount =
                    tile.dataset.planType === "single"
                        ? isYearly
                            ? 0
                            : parseFloat(
                                  tile.dataset.singleuserExtraMoDiscount,
                              ) || 0
                        : isYearly
                          ? parseFloat(tile.dataset.extraYrDiscount) || 0
                          : parseFloat(tile.dataset.extraMoDiscount) || 0;

                const tileDiscountTotal = Math.min(
                    tileMainDiscount + tileExtraDiscount,
                    100,
                );

                const tileDisplayMonthly =
                    tileMonthlyRate * (1 - tileDiscountTotal / 100);

                tilePrice.innerHTML =
                    (tile.dataset.symbol || currentPlan.symbol || "") +
                    formatIndianNumber(tileDisplayMonthly);
            }
        });

        try {
            localStorage.setItem(
                "selectedPlan",
                JSON.stringify({
                    ...currentPlan,
                    quantity: quantityValue,
                    billing_type: billingType,
                }),
            );
        } catch (error) {
            // localStorage is optional.
        }

        schedulePromoRefresh();
    }

    //show err or hide err
    function showError(id, message = "") {
        const input = document.getElementById(id);

        const err = document.getElementById(id + "-err");

        if (input) {
            input.style.borderColor = "red";
        }

        if (err) {
            err.style.display = "block";

            if (message !== "") {
                err.innerText = message;
            }
        }
    }

    function hideError(id) {
        const input = document.getElementById(id);

        const err = document.getElementById(id + "-err");

        if (input) {
            input.style.borderColor = "#ced4da";
        }

        if (err) {
            err.style.display = "none";
        }
    }

    // VALIDATIONS
    function validateEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }

    function validatePhone(phone) {
        return /^[0-9]{10,15}$/.test(phone);
    }

    function validateCompanyNumber(companyNumber) {
        return /^[0-9]{10,15}$/.test(companyNumber);
    }

    function validateUsername(username) {
        return /^[A-Za-z0-9_]+$/.test(username);
    }

    function validateContactPerson(name) {
        // return /^[A-Za-z]+$/.test(name);
        return /^[A-Za-z ]+$/.test(name);
        // return /^[A-Za-z0-9 ]+$/.test(name);
    }

    function validatecompanyNamePlan(name) {
        return /^[A-Za-z0-9 ]+$/.test(name);
    }

    // FORM VALIDATION
    function validateForm() {
        let valid = true;

        // =========================
        // TEAM ONLY VALIDATION
        // =========================
        if (currentPlan.plan_type === "team") {
            const companyNamePlan =
                document.getElementById("companyNamePlan")?.value.trim() || "";

            const address =
                document.getElementById("address")?.value.trim() || "";

            const companyEmail =
                document.getElementById("companyEmail")?.value.trim() || "";

            const companyNumber =
                document.getElementById("companyNumber")?.value.trim() || "";

            if (!validateCompanyNumber(companyNumber)) {
                showError("companyNumber", "Enter valid phone number");
                valid = false;
            } else {
                hideError("companyNumber");
            }

            // if (companyNamePlan.length < 2) {
            //     showError("companyNamePlan", "Company name is required");
            //     valid = false;
            // } else {
            //     hideError("companyNamePlan");
            // }

            if (companyNamePlan.length < 2) {
                showError("companyNamePlan", "Company name is required");
                valid = false;
            } else if (!validatecompanyNamePlan(companyNamePlan)) {
                showError(
                    "companyNamePlan",
                    "Only letters, numbers, and spaces are allowed",
                );
                valid = false;
            } else {
                hideError("companyNamePlan");
            }

            if (address === "") {
                showError("address", "Address is required");
                valid = false;
            } else {
                hideError("address");
            }

            if (companyEmail !== "" && !validateEmail(companyEmail)) {
                showError("companyEmail", "Enter valid company email");
                valid = false;
            } else {
                hideError("companyEmail");
            }
        }

        // =========================
        // COMMON CONTACT DETAILS
        // SINGLE + TEAM
        // =========================

        // const contactPerson =
        //     document.getElementById("contactPerson")?.value.trim() || "";

        // if (contactPerson.length < 2) {
        //     showError("contactPerson", "Enter contact person");
        //     valid = false;
        // } else {
        //     hideError("contactPerson");
        // }

        // const contactPerson =
        //     document.getElementById("contactPerson")?.value.trim() || "";

        // if (contactPerson.length < 2) {
        //     showError("contactPerson", "Contact person is required");
        //     valid = false;
        // } else if (!validateContactPerson(contactPerson)) {
        //     showError("contactPerson", "Only letters are allowed");
        //     valid = false;
        // } else {
        //     hideError("contactPerson");
        // }

        const contactPerson =
            document.getElementById("contactPerson")?.value.trim() || "";

        if (contactPerson.length < 2) {
            showError("contactPerson", "Contact person is required");
            valid = false;
        } else if (!validateContactPerson(contactPerson)) {
            showError(
                "contactPerson",
                "Only letters, numbers, and spaces are allowed",
            );
            valid = false;
        } else {
            hideError("contactPerson");
        }

        const phone = document.getElementById("phone")?.value.trim() || "";

        if (!validatePhone(phone)) {
            showError("phone", "Enter valid phone number");
            valid = false;
        } else {
            hideError("phone");
        }

        // const companyNumber = document.getElementById("companyNumber")?.value.trim() || "";

        // if (!validateCompanyNumber(companyNumber)) {
        //     showError("companyNumber", "Enter valid 10 digit phone");
        //     valid = false;
        // } else {
        //     hideError("companyNumber");
        // }

        const email = document.getElementById("userEmail")?.value.trim() || "";

        if (!validateEmail(email)) {
            showError("userEmail", "Enter valid email");
            valid = false;
        } else {
            hideError("userEmail");
        }

        const username =
            document.getElementById("username")?.value.trim() || "";

        if (!validateUsername(username)) {
            showError(
                "username",
                "Username must contain letters, numbers, and underscores only",
            );

            valid = false;
        } else {
            hideError("username");
        }

        const securityQuestion =
            document.getElementById("passwordQuestion")?.value || "";

        if (securityQuestion === "") {
            showError("passwordQuestion", "Select security question");
            valid = false;
        } else {
            hideError("passwordQuestion");
        }

        const securityAnswer =
            document.getElementById("securityAnswer")?.value.trim() || "";

        if (securityAnswer === "") {
            showError("securityAnswer", "Security answer required");
            valid = false;
        } else {
            hideError("securityAnswer");
        }

        const termsChecked = document.getElementById("terms")?.checked || false;

        if (!termsChecked) {
            showError("terms", "Please accept terms");
            valid = false;
        } else {
            hideError("terms");
        }

        return valid;
    }

    // MODAL
    const paymentModalForTeam = document.getElementById("paymentModalForTeam");

    const sideSubmitBtnForTeam = document.getElementById(
        "sideSubmitBtnForTeam",
    );

    const closePayModal = document.getElementById("closePayModal");

    // OPEN MODAL
    sideSubmitBtnForTeam?.addEventListener("click", function () {
        const valid = validateForm();

        if (!valid) {
            return;
        }

        paymentModalForTeam?.classList.remove("hidden");
    });

    // CLOSE MODAL
    closePayModal?.addEventListener("click", function () {
        paymentModalForTeam?.classList.add("hidden");
    });

    // PROMOCODE VARIABLES
    let appliedPromocodeId = null;
    let appliedPromocodeCode = "";
    let appliedDiscountAmount = 0;
    let appliedPromoValue = 0;
    let appliedPromoType = "";
    let promoRequestSequence = 0;
    let promoRefreshTimer = null;

    function formatPromoLabel(value, type) {
        const numericValue = Number(value || 0);

        if (type === "flat") {
            return formatCurrencyAmount(currentPlan.symbol, numericValue);
        }

        return `${Math.round(numericValue)}%`;
    }

    function setPromoSuccessState(isSuccess, message = "") {
        const successBox = document.getElementById("poPromoSuccessMsg");

        if (successBox) {
            successBox.style.display = isSuccess ? "flex" : "none";
        }

        if (message !== "") {
            $("#couponMsg")
                .html(message)
                .css("color", isSuccess ? "green" : "red");
        }
    }

    function clearPromoState({ clearInput = false, message = "" } = {}) {
        appliedPromocodeId = null;
        appliedPromocodeCode = "";
        appliedDiscountAmount = 0;
        appliedPromoValue = 0;
        appliedPromoType = "";

        if (clearInput) {
            $("#couponInput").val("");
        }

        $("#removeCouponBtn").hide();
        setPromoSuccessState(false, message);
        updateFinalAmounts();
    }

    function updateFinalAmounts() {
        const subtotal = Math.max(
            0,
            parseFloat(currentPayableSubtotal || 0),
        );

        const promoDiscount = Math.min(
            Math.max(parseFloat(appliedDiscountAmount || 0), 0),
            subtotal,
        );

        currentFinalPayableTotal = Math.max(
            0,
            Math.round(subtotal - promoDiscount),
        );

        const totalSavings = Math.min(
            currentOriginalTotal,
            currentPlanSavingsAmount + promoDiscount,
        );

        if (promoDiscountRow && promoDiscountAmt) {
            if (promoDiscount > 0) {
                promoDiscountRow.classList.remove("hidden");
                promoDiscountRow.style.display = "flex";

                const promoLabel =
                    promoDiscountRow.querySelector("span:first-child");

                if (promoLabel) {
                    promoLabel.innerText =
                        appliedPromoType === "flat"
                            ? "Promo Code"
                            : `Promo Code (${formatPromoLabel(
                                  appliedPromoValue,
                                  appliedPromoType,
                              )})`;
                }

                promoDiscountAmt.innerText =
                    `-${formatCurrencyAmount(
                        currentPlan.symbol,
                        promoDiscount,
                    )}`;
            } else {
                promoDiscountRow.classList.add("hidden");
                promoDiscountRow.style.display = "none";
            }
        }

        const poRowPromoDiscount =
            document.getElementById("poRowPromoDiscount");
        const poPromoDiscountVal =
            document.getElementById("poPromoDiscountVal");

        if (poRowPromoDiscount && poPromoDiscountVal) {
            poRowPromoDiscount.style.display =
                promoDiscount > 0 ? "flex" : "none";

            poPromoDiscountVal.innerText =
                promoDiscount > 0
                    ? formatPromoLabel(
                          appliedPromoValue,
                          appliedPromoType,
                      )
                    : "";
        }

        if (summaryTotal) {
            summaryTotal.innerText = formatCurrencyAmount(
                currentPlan.symbol,
                currentFinalPayableTotal,
            );
        }

        if (modalTotal) {
            modalTotal.innerText = formatCurrencyAmount(
                currentPlan.symbol,
                currentFinalPayableTotal,
            );
        }

        if (summarySubtotal) {
            summarySubtotal.innerText = formatCurrencyAmount(
                currentPlan.symbol,
                totalSavings,
            );
        }

        if (summarySubtotalRow) {
            summarySubtotalRow.style.display =
                totalSavings > 0 ? "flex" : "none";
        }

        const poTotalDiscountVal =
            document.getElementById("poTotalDiscountVal");

        if (poTotalDiscountVal) {
            const effectiveDiscount =
                currentOriginalTotal > 0
                    ? (totalSavings / currentOriginalTotal) * 100
                    : 0;

            poTotalDiscountVal.innerText =
                `${Math.round(effectiveDiscount * 100) / 100}%`;
        }

        const banner = document.getElementById("poSavingsBanner");
        const bannerText =
            document.getElementById("poSavingsBannerText");

        const bannerParts = [];

        if (currentMainDiscountPercent > 0) {
            bannerParts.push(
                `${currentMainDiscountPercent}% Plan Discount`,
            );
        }

        if (currentExtraDiscountPercent > 0) {
            bannerParts.push(
                `${currentExtraDiscountPercent}% ${
                    payBillingToggle?.checked
                        ? "Annual Billing Discount"
                        : "Monthly Extra Discount"
                }`,
            );
        }

        if (promoDiscount > 0) {
            bannerParts.push(
                `${formatPromoLabel(
                    appliedPromoValue,
                    appliedPromoType,
                )} Promo Code Discount`,
            );
        }

        if (banner && bannerText) {
            if (bannerParts.length > 0) {
                banner.style.display = "flex";
                bannerText.innerText =
                    `${bannerParts.join(" + ")} — You save ` +
                    `${formatCurrencyAmount(
                        currentPlan.symbol,
                        totalSavings,
                    )}`;
            } else {
                banner.style.display = "none";
                bannerText.innerText = "";
            }
        }

        if (paySavingsNotice) {
            if (bannerParts.length > 0) {
                paySavingsNotice.classList.remove("hidden");
                paySavingsNotice.innerText = `🎉 ${bannerParts.join(" + ")}`;
            } else {
                paySavingsNotice.classList.add("hidden");
                paySavingsNotice.innerText = "";
            }
        }
    }

    function requestPromocode(code, { silent = false } = {}) {
        const normalizedCode = String(code || "").trim();

        if (normalizedCode === "") {
            clearPromoState({
                message: silent ? "" : "Enter promocode",
            });
            return;
        }

        const requestNumber = ++promoRequestSequence;

        $.ajax({
            url: "/apply-promocode",
            type: "POST",
            data: {
                code: normalizedCode,
                amount: currentPayableSubtotal,
            },
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                if (requestNumber !== promoRequestSequence) {
                    return;
                }

                if (response.status === true) {
                    appliedPromocodeId = response.promocode_id;
                    appliedPromocodeCode = normalizedCode;
                    appliedDiscountAmount = parseFloat(
                        response.discount || 0,
                    );
                    appliedPromoValue = parseFloat(
                        response.discount_value ||
                            response.promodiscount ||
                            0,
                    );
                    appliedPromoType =
                        response.discount_type ||
                        response.type ||
                        "";

                    $("#removeCouponBtn").show();
                    setPromoSuccessState(
                        true,
                        silent
                            ? ""
                            : "✅ Promo code applied successfully",
                    );

                    updateFinalAmounts();
                } else {
                    clearPromoState({
                        message:
                            response.message || "Invalid promo code",
                    });
                }
            },
            error: function (xhr) {
                if (requestNumber !== promoRequestSequence) {
                    return;
                }

                clearPromoState({
                    message:
                        xhr?.responseJSON?.message ||
                        "Unable to apply promo code",
                });
            },
        });
    }

    function schedulePromoRefresh() {
        clearTimeout(promoRefreshTimer);

        if (!appliedPromocodeCode) {
            updateFinalAmounts();
            return;
        }

        promoRefreshTimer = setTimeout(function () {
            requestPromocode(appliedPromocodeCode, {
                silent: true,
            });
        }, 100);
    }

    $(document).on("click", "#applyPromoBtn", function (e) {
        e.preventDefault();
        e.stopPropagation();

        requestPromocode($("#couponInput").val());
    });

    $(document).on("click", "#removeCouponBtn", function (e) {
        e.preventDefault();

        ++promoRequestSequence;
        clearTimeout(promoRefreshTimer);

        clearPromoState({
            clearInput: true,
            message: "Promo code removed",
        });
    });

    let paymentSubmissionInFlight = false;

    //confirm payment
    $(document).on("click", "#confirmPayBtn", function () {
        if (paymentSubmissionInFlight) {
            return;
        }

        let btn = $(this);

        btn.prop("disabled", true).text("Processing...");
        paymentSubmissionInFlight = true;

        // PLAN DISCOUNT
        // let planDiscount = 0;

        // EXTRA / PROMO DISCOUNT
        // let extraDiscount = appliedDiscountAmount || 0;

        // console.log(currentPlan);

        let planDiscount = payBillingToggle.checked
            ? parseFloat(currentPlan.yearly_discount || 0)
            : parseFloat(currentPlan.monthly_discount || 0);

        let extraDiscount = payBillingToggle.checked
            ? parseFloat(currentPlan.extra_yr_discount || 0)
            : parseFloat(currentPlan.extra_mo_discount || 0);

        // if (currentPlan.plan_type === "single") {
        //     planDiscount = payBillingToggle.checked
        //         ? parseFloat(currentPlan.yearly_discount || 0)
        //         : parseFloat(currentPlan.monthly_discount || 0);
        // } else {
        //     planDiscount = payBillingToggle.checked
        //         ? parseFloat(currentPlan.extra_yearly_discount || 0)
        //         : parseFloat(currentPlan.extra_monthly_discount || 0);
        // }

        // =========================
        // CARD VALIDATION
        // =========================
        let valid = true;

        // CARD NUMBER
        let cardNumber = $("#cardNumber").val().replace(/\s/g, "");

        if (!/^\d{16}$/.test(cardNumber)) {
            $("#cardNumber-err").show();
            $("#cardNumber").css("border-color", "red");
            valid = false;
        } else {
            $("#cardNumber-err").hide();
            $("#cardNumber").css("border-color", "#ced4da");
        }

        // EXPIRY DATE
        let cardExpiry = $("#cardExpiry").val().trim();

        if (!/^(0[1-9]|1[0-2])\/\d{2}$/.test(cardExpiry)) {
            $("#cardExpiry-err").show();
            $("#cardExpiry").css("border-color", "red");
            valid = false;
        } else {
            $("#cardExpiry-err").hide();
            $("#cardExpiry").css("border-color", "#ced4da");
        }

        // CVV
        let cardCvv = $("#cardCvv").val().trim();

        if (!/^\d{3,4}$/.test(cardCvv)) {
            $("#cardCvv-err").show();
            $("#cardCvv").css("border-color", "red");
            valid = false;
        } else {
            $("#cardCvv-err").hide();
            $("#cardCvv").css("border-color", "#ced4da");
        }

        // CARD HOLDER NAME
        let cardName = $("#cardName").val().trim();

        if (cardName === "") {
            $("#cardName-err").show().text("Cardholder name is required");
            $("#cardName").css("border-color", "red");
            valid = false;
        } else {
            $("#cardName-err").hide();
            $("#cardName").css("border-color", "#ced4da");
        }

        // STOP IF INVALID
        if (!valid) {
            $("#payError").show();

            btn.prop("disabled", false).text("🔒 Confirm Payment");
            paymentSubmissionInFlight = false;

            return;
        } else {
            $("#payError").hide();
        }

        // =========================
        // PAYMENT DATA
        // =========================
        let paymentData = {
            // PLAN
            plan_id: currentPlan.plan_id,
            plan_name: currentPlan.name,
            plan_type: currentPlan.plan_type,

            promocode_id: appliedPromocodeId,
            promocode_code: appliedPromocodeCode,

            discount: planDiscount,

            extraDiscount: extraDiscount,

            price: currentUnitPayablePrice,

            quantity:
                currentPlan.plan_type === "team" ? $("#payQtyInput").val() : 1,

            total_amount: currentFinalPayableTotal,

            // CONTACT
            contactPerson: $("#contactPerson").val(),
            designation: $("#designation").val(),
            phone: $("#phone").val(),
            email: $("#userEmail").val(),
            username: $("#username").val(),
            term_condition: $("#terms").is(":checked") ? 1 : 0,

            subscription_type: payBillingToggle.checked ? "year" : "month",

            currencyid:
                selectedCurrency?.currency_code || currentPlan.currencyid,
            symbol: currentPlan.symbol,
            base_amount:
                parseFloat(currentPlan.unit_rate || 0) ||
                parseFloat(currentPlan.base_amount || 0),
            country: currentPlan.country || "",

            storage: currentPlan.storage,
            storage_unit: currentPlan.storage_unit,

            license: currentPlan.license,

            security_question: $("#passwordQuestion").val(),
            security_answer: $("#securityAnswer").val(),

            // COMPANY (TEAM ONLY)
            company_name:
                currentPlan.plan_type === "team"
                    ? $("#companyNamePlan").val()
                    : "",

            company_type:
                currentPlan.plan_type === "team" ? $("#companyType").val() : "",

            industry_type:
                currentPlan.plan_type === "team"
                    ? $("#industryType").val()
                    : "",

            address:
                currentPlan.plan_type === "team" ? $("#address").val() : "",

            company_number:
                currentPlan.plan_type === "team"
                    ? $("#companyNumber").val()
                    : "",

            company_email:
                currentPlan.plan_type === "team"
                    ? $("#companyEmail").val()
                    : "",

            website:
                currentPlan.plan_type === "team" ? $("#website").val() : "",

            // CARD
            card_number: $("#cardNumber").val(),
            card_expiry: $("#cardExpiry").val(),
            card_cvv: $("#cardCvv").val(),
            card_name: $("#cardName").val(),
        };

        // console.log(paymentData);
        // =========================
        // SAVE URL
        // =========================

        let saveUrl = "/store-user-payment";

        $.ajax({
            url: saveUrl,

            type: "POST",

            data: paymentData,

            dataType: "json",

            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },

            success: function (response) {
                if (response.status === true || response.success === true) {
                    toastr.success(response.message);
                    window.location.href = "/thankyou";
                } else {
                    // toastr.error("Payment failed");
                    toastr.error(response.message);
                }
            },

            error: function (xhr) {
                toastr.error(
                    xhr?.responseJSON?.message || "Something went wrong",
                );
            },

            complete: function () {
                btn.prop("disabled", false).text("🔒 Confirm Payment");
                paymentSubmissionInFlight = false;
            },
        });
    });

    // LIVE VALIDATION
    // PHONE
    document.getElementById("phone")?.addEventListener("input", function () {
        this.value = this.value.replace(/\D/g, "").slice(0, 15);

        if (validatePhone(this.value)) {
            hideError("phone");
        }
    });

    // EMAIL
    document
        .getElementById("userEmail")
        ?.addEventListener("input", function () {
            if (validateEmail(this.value.trim())) {
                hideError("userEmail");
            }
        });

    // USERNAME
    document.getElementById("username")?.addEventListener("input", function () {
        this.value = this.value.replace(/[^A-Za-z0-9_]/g, "");

        if (validateUsername(this.value.trim())) {
            hideError("username");
        }
    });

    // CONTACT PERSON
    // document
    //     .getElementById("contactPerson")
    //     ?.addEventListener("input", function () {
    //         if (this.value.trim().length >= 2) {
    //             hideError("contactPerson");
    //         }
    //     });

    // document
    //     .getElementById("contactPerson")
    //     ?.addEventListener("input", function () {
    //         // Allow only A-Z and a-z
    //         this.value = this.value.replace(/[^A-Za-z]/g, "");

    //         if (
    //             validateContactPerson(this.value.trim()) &&
    //             this.value.trim().length >= 2
    //         ) {
    //             hideError("contactPerson");
    //         }
    //     });

    document
        .getElementById("contactPerson")
        ?.addEventListener("input", function () {
            // Allow letters, numbers and spaces
            // this.value = this.value.replace(/[^A-Za-z0-9 ]/g, "");
            this.value = this.value.replace(/[^A-Za-z ]/g, "");

            if (
                validateContactPerson(this.value.trim()) &&
                this.value.trim().length >= 2
            ) {
                hideError("contactPerson");
            }
        });

    // COMPANY NAME
    // document
    //     .getElementById("companyNamePlan")
    //     ?.addEventListener("input", function () {
    //         if (this.value.trim().length >= 2) {
    //             hideError("companyNamePlan");
    //         }
    //     });
    document
        .getElementById("companyNamePlan")
        ?.addEventListener("input", function () {
            this.value = this.value.replace(/[^A-Za-z0-9 ]/g, "");

            if (
                validatecompanyNamePlan(this.value.trim()) &&
                this.value.trim().length >= 2
            ) {
                hideError("companyNamePlan");
            }
        });

    // ADDRESS
    document.getElementById("address")?.addEventListener("input", function () {
        if (this.value.trim() !== "") {
            hideError("address");
        }
    });

    // COMPANY EMAIL
    document
        .getElementById("companyEmail")
        ?.addEventListener("input", function () {
            if (this.value.trim() === "" || validateEmail(this.value.trim())) {
                hideError("companyEmail");
            }
        });

    // COMPANY PHONE
    document
        .getElementById("companyNumber")
        ?.addEventListener("input", function () {
            this.value = this.value.replace(/\D/g, "").slice(0, 15);

            if (validatePhone(this.value)) {
                hideError("companyNumber");
            }
        });

    // SECURITY ANSWER
    document
        .getElementById("securityAnswer")
        ?.addEventListener("input", function () {
            if (this.value.trim() !== "") {
                hideError("securityAnswer");
            }
        });

    // SECURITY QUESTION
    document
        .getElementById("passwordQuestion")
        ?.addEventListener("change", function () {
            if (this.value !== "") {
                hideError("passwordQuestion");
            }
        });

    // TERMS
    document.getElementById("terms")?.addEventListener("change", function () {
        if (this.checked) {
            hideError("terms");
        }
    });

    // CARD EXPIRY FORMAT MM/YY
    document
        .getElementById("cardExpiry")
        ?.addEventListener("input", function () {
            let value = this.value.replace(/\D/g, "");

            // LIMIT 4 DIGITS
            value = value.substring(0, 4);

            // AUTO ADD /
            if (value.length >= 3) {
                value = value.substring(0, 2) + "/" + value.substring(2);
            }

            this.value = value;

            // VALIDATION
            let regex = /^(0[1-9]|1[0-2])\/\d{2}$/;

            if (regex.test(this.value)) {
                $("#cardExpiry-err").hide();

                $("#cardExpiry").css("border-color", "#ced4da");
            } else {
                $("#cardExpiry-err").show();

                $("#cardExpiry").css("border-color", "red");
            }
        });

    // CARD NUMBER FORMAT
    document
        .getElementById("cardNumber")
        ?.addEventListener("input", function () {
            let value = this.value.replace(/\D/g, "");

            value = value.substring(0, 16);

            value = value.replace(/(.{4})/g, "$1 ").trim();

            this.value = value;

            if (/^\d{16}$/.test(value.replace(/\s/g, ""))) {
                $("#cardNumber-err").hide();
                $("#cardNumber").css("border-color", "#ced4da");
            }
        });

    // CVV ONLY NUMBER
    document.getElementById("cardCvv")?.addEventListener("input", function () {
        this.value = this.value.replace(/\D/g, "").substring(0, 4);

        if (/^\d{3,4}$/.test(this.value)) {
            $("#cardCvv-err").hide();
            $("#cardCvv").css("border-color", "#ced4da");
        }
    });

    // CARD HOLDER NAME
    document.getElementById("cardName")?.addEventListener("input", function () {
        // ONLY ALPHABETS + SPACE
        this.value = this.value.replace(/[^A-Za-z\s]/g, "").substring(0, 30);

        // REMOVE MULTIPLE SPACES
        this.value = this.value.replace(/\s+/g, " ");

        if (this.value.trim() !== "") {
            $("#cardName-err").hide().text("");

            $("#cardName").css("border-color", "#ced4da");
        } else {
            $("#cardName-err").show().text("Cardholder name is required");

            $("#cardName").css("border-color", "red");
        }
    });

    //on change toggle
    if (payBillingToggle) {
        payBillingToggle.addEventListener("change", function () {
            updateToggleUI();
            renderPlanData();
        });
    }

    // Quantity increase: use the same licence step as pricing cards.
    if (payQtyPlus && payQtyInput) {
        payQtyPlus.addEventListener("click", function (e) {
            e.preventDefault();

            const minQuantity = getPlanMinimumQuantity();
            const step = getPlanQuantityStep();

            quantity = normalizeTeamQuantity(
                payQtyInput.value || minQuantity,
            );

            quantity += step;
            payQtyInput.value = quantity;

            renderPlanData();
        });

        payQtyPlus.addEventListener("mousedown", function (e) {
            e.preventDefault();
        });
    }

    // Quantity decrease: never go below the selected plan minimum.
    if (payQtyMinus && payQtyInput) {
        payQtyMinus.addEventListener("click", function (e) {
            e.preventDefault();

            const minQuantity = getPlanMinimumQuantity();
            const step = getPlanQuantityStep();

            quantity = normalizeTeamQuantity(
                payQtyInput.value || minQuantity,
            );

            quantity = Math.max(minQuantity, quantity - step);
            payQtyInput.value = quantity;

            renderPlanData();
        });

        payQtyMinus.addEventListener("mousedown", function (e) {
            e.preventDefault();
        });
    }

    if (payQtyInput) {
        payQtyInput.addEventListener("input", function () {
            if (currentPlan.plan_type !== "team") {
                this.value = 1;
                return;
            }

            const value = parseInt(this.value);
            const minQuantity = getPlanMinimumQuantity();

            if (isNaN(value) || value < minQuantity) {
                return;
            }

            quantity = value;
            renderPlanData();
        });

        payQtyInput.addEventListener("change", function () {
            if (currentPlan.plan_type !== "team") {
                quantity = 1;
                this.value = 1;
                renderPlanData();
                return;
            }

            quantity = normalizeTeamQuantity(
                this.value || getPlanMinimumQuantity(),
            );

            this.value = quantity;
            renderPlanData();
        });
    }

    //selected plans from pricing page
    planTiles.forEach((tile) => {
        tile.addEventListener("click", function () {
            planTiles.forEach((t) => t.classList.remove("selected"));

            this.classList.add("selected");

            syncPlanFromTile(this);

            renderPlanData();
        });
    });

    updateToggleUI();

    renderPlanData();

    //check box for existing username
    $("#username").on("change keyup", function () {
        let username = $(this).val().trim();

        if (username == "") {
            $("#username-err").hide().text("");
            return;
        }

        $.ajax({
            url: "/check-username",
            type: "POST",
            data: {
                username: username,
                _token: $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                if (response.exists) {
                    $("#username-err").show().text("Username already exists.");
                } else {
                    $("#username-err").hide().text("");
                }
            },
        });
    });

    //check box for existing username
    $("#userEmail").on("change keyup", function () {
        let userEmail = $(this).val().trim();

        if (userEmail == "") {
            $("#userEmail-err").hide().text("");
            return;
        }

        $.ajax({
            url: "/check-userEmail",
            type: "POST",
            data: {
                userEmail: userEmail,
                _token: $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                if (response.exists) {
                    $("#userEmail-err").show().text("Email already exists.");
                } else {
                    $("#userEmail-err").hide().text("");
                }
            },
        });
    });

    // Existing User Checkbox
    const existingUserCheck = document.getElementById("existingUserCheck");

    if (existingUserCheck) {
        existingUserCheck.addEventListener("change", function () {
            const existingUserModal = document.getElementById("existingUserModal");
            if (this.checked) {
                existingUserModal?.classList.add("is-open");
                existingUserModal?.setAttribute("aria-hidden", "false");
            } else {
                existingUserModal?.classList.remove("is-open");
                existingUserModal?.setAttribute("aria-hidden", "true");
            }
        });
    }
    const redirectBtn = document.getElementById("redirectPricingBtn");

    if (redirectBtn) {
        redirectBtn.addEventListener("click", function () {
            window.location.href = "/pricing";
        });
    }

    document.querySelectorAll("[data-close-modal]").forEach(function (btn) {
        btn.addEventListener("click", function () {
            const existingUserModal = document.getElementById("existingUserModal");
            existingUserModal?.classList.remove("is-open");
            existingUserModal?.setAttribute("aria-hidden", "true");

            document.getElementById("existingUserCheck").checked = false;
        });
    });
});
