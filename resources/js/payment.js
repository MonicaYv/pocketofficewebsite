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

    // Visible elements from the new payment summary UI.
    const summaryPlanDesc = document.getElementById("summaryPlanDesc");
    const poSymbol = document.getElementById("poSymbol");
    const poUnitPrice = document.getElementById("poUnitPrice");
    const poSumBaseUser = document.getElementById("poSumBaseUser");
    const poSumUsers = document.getElementById("poSumUsers");
    const poRowPlanDiscount = document.getElementById("poRowPlanDiscount");
    const poPlanDiscountVal = document.getElementById("poPlanDiscountVal");
    const poRowAnnualDiscount = document.getElementById("poRowAnnualDiscount");
    const poAnnualDiscountVal = document.getElementById("poAnnualDiscountVal");
    const poRowPromoDiscount = document.getElementById("poRowPromoDiscount");
    const poPromoDiscountVal = document.getElementById("poPromoDiscountVal");
    const poTotalDiscountVal = document.getElementById("poTotalDiscountVal");
    const poTotalPeriodLabel = document.getElementById("poTotalPeriodLabel");
    const poSavingsBanner = document.getElementById("poSavingsBanner");
    const poSavingsBannerText = document.getElementById("poSavingsBannerText");
    const poPromoSuccessMsg = document.getElementById("poPromoSuccessMsg");
    const payQtyHint = document.getElementById("payQtyHint");
    const poMinQtyText = document.getElementById("poMinQtyText");
    const teamPlanIndicator = document.getElementById("teamPlanIndicator");
    const planScrollTrack = document.getElementById("planScrollTrack");
    const planScrollLeft = document.getElementById("planScrollLeft");
    const planScrollRight = document.getElementById("planScrollRight");

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
    let currentBaseTotal = 0;
    let currentPlanSavings = 0;
    let currentPlanDiscountPercent = 0;
    let currentExtraDiscountPercent = 0;
    let currentFinalTotal = 0;

    function getPlanIconSvg(planName = "") {
        const normalizedName = planName.toLowerCase();

        if (normalizedName.includes("basic")) {
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

    function getPlanLicenseStep(plan = currentPlan) {
        if (plan.plan_type !== "team") {
            return 1;
        }
        return Math.max(parseInt(plan.license_step || plan.license || 1), 1);
    }

    function getBillingDiscounts(plan = currentPlan, isYearly = false) {
        const planDiscount = Math.max(
            0,
            parseFloat(isYearly ? plan.yearly_discount : plan.monthly_discount) || 0,
        );
        const extraDiscount = Math.max(
            0,
            parseFloat(isYearly ? plan.extra_yr_discount : plan.extra_mo_discount) || 0,
        );

        return {
            planDiscount,
            extraDiscount,
            totalDiscount: Math.min(100, planDiscount + extraDiscount),
        };
    }

    function updateBillingDiscountBadges() {
        const monthly = getBillingDiscounts(currentPlan, false).totalDiscount;
        const yearly = getBillingDiscounts(currentPlan, true).totalDiscount;

        if (monthlyDiscountBadge) {
            monthlyDiscountBadge.textContent = monthly > 0 ? `Save ${monthly}%` : "";
            monthlyDiscountBadge.style.display = monthly > 0 ? "inline-flex" : "none";
        }
        if (yearlyDiscountBadge) {
            yearlyDiscountBadge.textContent = yearly > 0 ? `Save ${yearly}%` : "";
            yearlyDiscountBadge.style.display = yearly > 0 ? "inline-flex" : "none";
        }
    }

    function updateTeamPlanIndicator() {
        if (!teamPlanIndicator || !planSelector) {
            return;
        }
        if (currentPlan.plan_type !== "team") {
            teamPlanIndicator.hidden = true;
            return;
        }

        const activeTile = Array.from(planTiles).find(
            (tile) => tile.classList.contains("selected") && tile.dataset.planType === "team",
        );
        if (!activeTile) {
            teamPlanIndicator.hidden = true;
            return;
        }

        teamPlanIndicator.hidden = false;
        requestAnimationFrame(() => {
            const selectorRect = planSelector.getBoundingClientRect();
            const tileRect = activeTile.getBoundingClientRect();
            const center = tileRect.left - selectorRect.left + tileRect.width / 2;
            planSelector.style.setProperty("--team-indicator-left", `${center}px`);
        });
    }

    function scrollPlanIntoView(tile) {
        tile?.scrollIntoView({ behavior: "smooth", block: "nearest", inline: "center" });
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
            license_step: parseInt(tile.dataset.licenseStep || tile.dataset.license || 1),
            unit_rate: parseFloat(tile.dataset.unitRate || 0),
            price: parseFloat(tile.dataset.pricemonth || 0),
            priceM: parseFloat(tile.dataset.monthlyPrice) || 0,
            priceY: parseFloat(tile.dataset.yearlyPrice) || 0,
            originalPriceM: parseFloat(tile.dataset.originalMonthly) || 0,
            originalPriceY: parseFloat(tile.dataset.originalYearly) || 0,
            symbol: tile.dataset.symbol || currentPlan.symbol || "",
            subscription: tile.dataset.subscription || "monthly",
            license: parseInt(tile.dataset.license || 1),
            storage: tile.dataset.storage,
            storage_unit: tile.dataset.storageUnit,
            description: tile.dataset.desc || "",
            features: (() => {
                try {
                    return JSON.parse(tile.dataset.features || "[]");
                } catch (e) {
                    return [];
                }
            })(),
            monthly_discount:
                tile.dataset.planType === "single"
                    ? parseFloat(tile.dataset.singleuserMonthlyDiscount) || 0
                    : parseFloat(tile.dataset.monthlyDiscount) || 0,
            yearly_discount:
                tile.dataset.planType === "single"
                    ? parseFloat(tile.dataset.singleuserYearlyDiscount) || 0
                    : parseFloat(tile.dataset.yearlyDiscount) || 0,
            extra_monthly_discount: parseFloat(tile.dataset.extraMonthlyDiscount) || 0,
            extra_yearly_discount: parseFloat(tile.dataset.extraYearlyDiscount) || 0,
            extra_mo_discount:
                tile.dataset.planType === "single"
                    ? parseFloat(tile.dataset.singleuserExtraMoDiscount) || 0
                    : parseFloat(tile.dataset.extraMoDiscount) || 0,
            extra_yr_discount:
                tile.dataset.planType === "single"
                    ? parseFloat(tile.dataset.singleuserExtraYrDiscount) || 0
                    : parseFloat(tile.dataset.extraYrDiscount) || 0,
        };

        const minQuantity = getPlanMinimumQuantity(nextPlan);
        const nextQuantity = preserveQuantity && nextPlan.plan_type === "team"
            ? Math.max(parseInt(payQtyInput?.value || minQuantity), minQuantity)
            : minQuantity;

        currentPlan = nextPlan;
        quantity = nextPlan.plan_type === "team" ? nextQuantity : 1;
        currentPlan.quantity = quantity;

        if (payQtyInput) {
            payQtyInput.value = quantity;
            payQtyInput.min = minQuantity;
            payQtyInput.step = getPlanLicenseStep(nextPlan);
        }
    }

    planTiles.forEach((tile) => {
        const icon = tile.querySelector(".pay-plan-tile__icon");

        if (icon) {
            icon.innerHTML = getPlanIconSvg(tile.dataset.name || "");
        }
    });

    planScrollLeft?.addEventListener("click", function (e) {
        e.preventDefault();
        planScrollTrack?.scrollBy({ left: -180, behavior: "smooth" });
    });
    planScrollRight?.addEventListener("click", function (e) {
        e.preventDefault();
        planScrollTrack?.scrollBy({ left: 180, behavior: "smooth" });
    });
    planScrollTrack?.addEventListener("scroll", updateTeamPlanIndicator, { passive: true });
    window.addEventListener("resize", updateTeamPlanIndicator);

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

    // Keep all plans directly selectable. There is no separate Personal/Team switch.
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

    //refresh data
    function renderPlanData() {
        if (!payBillingToggle) {
            return;
        }

        const isYearly = payBillingToggle.checked;
        const billingType = isYearly ? "yearly" : "monthly";
        const months = isYearly ? 12 : 1;
        const minQuantity = getPlanMinimumQuantity();
        const step = getPlanLicenseStep();

        let quantityValue = 1;
        if (currentPlan.plan_type === "team") {
            quantityValue = Math.max(parseInt(payQtyInput?.value || minQuantity), minQuantity);
        }

        quantity = currentPlan.plan_type === "team" ? quantityValue : 1;
        currentPlan.quantity = quantity;
        currentPlan.billing_type = billingType;

        if (payQtyInput) {
            payQtyInput.value = quantity;
            payQtyInput.min = minQuantity;
            payQtyInput.step = step;
        }

        let unitRate = parseFloat(currentPlan.unit_rate || 0);
        if (!unitRate) {
            unitRate = parseFloat(currentPlan.originalPriceM || currentPlan.base_amount || 0) || 0;
        }

        const discounts = getBillingDiscounts(currentPlan, isYearly);
        const activeDiscount = discounts.planDiscount;
        const extraDiscount = discounts.extraDiscount;
        const totalDiscountPercent = discounts.totalDiscount;

        currentPlanDiscountPercent = activeDiscount;
        currentExtraDiscountPercent = extraDiscount;

        const baseTotal = Math.round(unitRate * quantity * months);
        const discountAmount = Math.round((baseTotal * activeDiscount) / 100);
        const extraDiscountAmount = Math.round((baseTotal * extraDiscount) / 100);
        const totalPlanSavings = Math.min(baseTotal, discountAmount + extraDiscountAmount);
        const payableSubtotal = Math.max(0, baseTotal - totalPlanSavings);
        const discountedMonthlyUnit = Math.round(unitRate * (1 - totalDiscountPercent / 100));

        currentBaseTotal = baseTotal;
        currentPlanSavings = totalPlanSavings;
        currentPayableSubtotal = payableSubtotal;

        const displayPlanName =
            currentPlan.name || currentPlan.display_name ||
            (currentPlan.plan_type === "single" ? "Personal" : "Basic");

        if (summaryPlanName) summaryPlanName.innerText = displayPlanName;
        if (summaryPlanDesc) {
            summaryPlanDesc.innerText = currentPlan.description ||
                (currentPlan.plan_type === "single"
                    ? "Best for individual users"
                    : "Team plan with shared workspace and scalable licenses.");
        }

        const continuePlanName = document.getElementById("poContinuePlanName");
        if (continuePlanName) continuePlanName.innerText = displayPlanName;
        if (summaryPlanIcon) summaryPlanIcon.innerHTML = getPlanIconSvg(displayPlanName);

        if (summarySymbol) summarySymbol.innerText = currentPlan.symbol || "";
        if (summaryUnitPrice) summaryUnitPrice.innerText = formatIndianNumber(discountedMonthlyUnit);
        if (poSymbol) poSymbol.innerText = currentPlan.symbol || "";
        if (poUnitPrice) poUnitPrice.innerText = formatIndianNumber(discountedMonthlyUnit);
        if (poSumBaseUser) poSumBaseUser.innerText = formatCurrencyAmount(currentPlan.symbol, unitRate);
        if (poSumUsers) poSumUsers.innerText = quantity;
        if (summaryOrgTotal) summaryOrgTotal.innerText = formatCurrencyAmount(currentPlan.symbol, baseTotal);
        if (summaryTax) summaryTax.innerText = formatCurrencyAmount(currentPlan.symbol, 0);

        if (poRowPlanDiscount && poPlanDiscountVal) {
            poRowPlanDiscount.style.display = activeDiscount > 0 ? "flex" : "none";
            poPlanDiscountVal.innerText = activeDiscount > 0 ? `${activeDiscount}%` : "—";
        }
        if (poRowAnnualDiscount && poAnnualDiscountVal) {
            poRowAnnualDiscount.style.display = extraDiscount > 0 ? "flex" : "none";
            const extraLabel = poRowAnnualDiscount.querySelector(".po-summary-label");
            if (extraLabel) {
                extraLabel.innerText = isYearly ? "Annual Billing Discount" : "Monthly Extra Discount";
            }
            poAnnualDiscountVal.innerText = extraDiscount > 0 ? `${extraDiscount}%` : "—";
        }
        if (poTotalPeriodLabel) {
            poTotalPeriodLabel.innerText = isYearly ? "(Total Per Year)" : "(Total Per Month)";
        }

        if (discountRow && discountAmt) {
            discountRow.style.display = activeDiscount > 0 ? "flex" : "none";
            if (activeDiscount > 0) {
                const label = discountRow.querySelector("span:first-child");
                if (label) label.innerHTML = `Plan Discount (<span style="color:red;">${activeDiscount}%</span>)`;
                discountAmt.innerText = `-${formatCurrencyAmount(currentPlan.symbol, discountAmount)}`;
            }
        }
        if (extradiscountRow && extradiscountAmt) {
            extradiscountRow.style.display = extraDiscount > 0 ? "flex" : "none";
            if (extraDiscount > 0) {
                const label = extradiscountRow.querySelector("span:first-child");
                if (label) label.innerHTML = `${isYearly ? "Annual Billing" : "Monthly Extra"} Discount (<span style="color:red;">${extraDiscount}%</span>)`;
                extradiscountAmt.innerText = `-${formatCurrencyAmount(currentPlan.symbol, extraDiscountAmount)}`;
            }
        }

        if (currentPlan.plan_type === "team") {
            if (payQtyControls) payQtyControls.style.display = "block";
            companyForm?.classList.remove("hidden");
            if (payQtyHint) payQtyHint.style.display = "block";
            if (poMinQtyText) poMinQtyText.innerText = minQuantity;
        } else {
            if (payQtyControls) payQtyControls.style.display = "none";
            companyForm?.classList.add("hidden");
            if (payQtyHint) payQtyHint.style.display = "none";
            quantity = 1;
            currentPlan.quantity = 1;
        }

        const selectedFeatures = Array.isArray(currentPlan.features)
            ? currentPlan.features
                .map((feature) => String(feature || "").replace(/^[\\s✓✔]+/u, "").replace(/\\s+/g, " ").trim())
                .filter(Boolean)
            : [];

        if (planFeatureList) {
            if (selectedFeatures.length > 0) {
                planFeatureList.innerHTML = selectedFeatures.map((feature) => `<li>${feature}</li>`).join("");
            } else {
                const totalStorage = (parseFloat(currentPlan.storage || 0) || 0) * quantity;
                planFeatureList.innerHTML = `
                    <li>${quantity} User License${quantity === 1 ? "" : "s"}</li>
                    <li>${currentPlan.storage || 0} ${currentPlan.storage_unit || "GB"} Per User</li>
                    <li>Total Storage: ${totalStorage} ${currentPlan.storage_unit || "GB"}</li>
                `;
            }
        }

        planTiles.forEach((tile) => {
            const selected = tile.dataset.planId == currentPlan.plan_id && tile.dataset.planType == currentPlan.plan_type;
            tile.classList.toggle("selected", selected);
        });

        updateBillingDiscountBadges();
        updateTeamPlanIndicator();

        try {
            localStorage.setItem("selectedPlan", JSON.stringify({
                ...currentPlan,
                quantity,
                billing_type: billingType,
                extra_monthly: currentPlan.extra_mo_discount || 0,
                extra_yearly: currentPlan.extra_yr_discount || 0,
            }));
        } catch (e) {}

        schedulePromoRevalidation();
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
    let promoRevalidateTimer = null;
    let promoRequestSerial = 0;

    function formatPromoLabel(value, type) {
        const numericValue = Number(value || 0);
        if (type === "flat") {
            return formatCurrencyAmount(currentPlan.symbol, numericValue);
        }

        return Math.round(numericValue) + "%";
    }

    // CALCULATE FINAL TOTAL
    function updateFinalAmounts() {
        const subtotal = Math.max(0, parseFloat(currentPayableSubtotal || 0));
        const promoAmount = Math.min(subtotal, Math.max(0, parseFloat(appliedDiscountAmount || 0)));
        const finalTotal = Math.max(0, Math.round(subtotal - promoAmount));
        currentFinalTotal = finalTotal;

        if (promoDiscountRow && promoDiscountAmt) {
            if (promoAmount > 0) {
                promoDiscountRow.classList.remove("hidden");
                promoDiscountRow.style.display = "flex";
                const promoLabel = promoDiscountRow.querySelector("span:first-child");
                if (promoLabel) {
                    promoLabel.innerText = appliedPromoType === "flat"
                        ? "Promo Code Discount"
                        : `Promo Code Discount (${Math.round(appliedPromoValue)}%)`;
                }
                promoDiscountAmt.innerText = "-" + formatCurrencyAmount(currentPlan.symbol, promoAmount);
            } else {
                promoDiscountRow.classList.add("hidden");
                promoDiscountRow.style.display = "none";
            }
        }

        if (poRowPromoDiscount && poPromoDiscountVal) {
            poRowPromoDiscount.style.display = promoAmount > 0 ? "flex" : "none";
            poPromoDiscountVal.innerText = promoAmount > 0
                ? (appliedPromoType === "flat"
                    ? formatCurrencyAmount(currentPlan.symbol, promoAmount)
                    : `${Math.round(appliedPromoValue)}%`)
                : "—";
        }

        const totalSavings = Math.min(currentBaseTotal, currentPlanSavings + promoAmount);
        const effectiveDiscountPct = currentBaseTotal > 0
            ? Math.round((totalSavings / currentBaseTotal) * 100)
            : 0;

        if (summaryTotal) summaryTotal.innerText = formatCurrencyAmount(currentPlan.symbol, finalTotal);
        if (modalTotal) modalTotal.innerText = formatCurrencyAmount(currentPlan.symbol, finalTotal);
        if (summarySubtotalLabel) summarySubtotalLabel.innerText = "You Save";
        if (summarySubtotal) summarySubtotal.innerText = formatCurrencyAmount(currentPlan.symbol, totalSavings);
        if (summarySubtotalRow) summarySubtotalRow.style.display = totalSavings > 0 ? "flex" : "none";
        if (poTotalDiscountVal) poTotalDiscountVal.innerText = effectiveDiscountPct > 0 ? `${effectiveDiscountPct}%` : "0%";

        const bannerParts = [];
        if (currentPlanDiscountPercent > 0) {
            bannerParts.push(`${currentPlanDiscountPercent}% ${currentPlan.plan_type === "team" ? currentPlan.name + " Team" : "Personal"} Discount`);
        }
        if (currentExtraDiscountPercent > 0) {
            bannerParts.push(`${currentExtraDiscountPercent}% ${payBillingToggle?.checked ? "Annual Billing" : "Monthly Extra"} Discount`);
        }
        if (promoAmount > 0) {
            bannerParts.push(appliedPromoType === "flat"
                ? `${formatCurrencyAmount(currentPlan.symbol, promoAmount)} Promo Code Discount`
                : `${Math.round(appliedPromoValue)}% Promo Code Discount`);
        }

        if (poSavingsBanner && poSavingsBannerText) {
            if (bannerParts.length > 0) {
                poSavingsBanner.style.display = "flex";
                poSavingsBannerText.innerText = `${bannerParts.join(" + ")} · Total Savings ${formatCurrencyAmount(currentPlan.symbol, totalSavings)}`;
            } else {
                poSavingsBanner.style.display = "none";
                poSavingsBannerText.innerText = "";
            }
        }
    }

    function clearAppliedPromo(message = "") {
        appliedPromocodeId = null;
        appliedPromocodeCode = "";
        appliedDiscountAmount = 0;
        appliedPromoValue = 0;
        appliedPromoType = "";
        $("#removeCouponBtn").hide();
        if (poPromoSuccessMsg) poPromoSuccessMsg.style.display = "none";
        if (message) $("#couponMsg").html(message).css("color", "red");
        updateFinalAmounts();
    }

    function validatePromocodeForCurrentSubtotal(code, silent = false) {
        const cleanCode = String(code || "").trim();
        if (!cleanCode) {
            if (!silent) $("#couponMsg").html("Enter promocode").css("color", "red");
            return;
        }
        const requestId = ++promoRequestSerial;
        $.ajax({
            url: "/apply-promocode",
            type: "POST",
            data: { code: cleanCode, amount: currentPayableSubtotal },
            headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
            success: function (response) {
                if (requestId !== promoRequestSerial) return;
                if (response.status === true) {
                    appliedPromocodeId = response.promocode_id;
                    appliedPromocodeCode = cleanCode;
                    appliedDiscountAmount = parseFloat(response.discount || 0);
                    appliedPromoValue = parseFloat(response.discount_value || response.promodiscount || 0);
                    appliedPromoType = response.discount_type || response.type || "";
                    $("#removeCouponBtn").show();
                    if (poPromoSuccessMsg) poPromoSuccessMsg.style.display = "flex";
                    if (!silent) $("#couponMsg").html("✅ Promo code applied successfully").css("color", "green");
                    updateFinalAmounts();
                } else {
                    clearAppliedPromo(response.message || "Invalid promo code");
                }
            },
            error: function (xhr) {
                if (requestId !== promoRequestSerial) return;
                clearAppliedPromo(xhr?.responseJSON?.message || "Unable to apply promo code");
            },
        });
    }

    function schedulePromoRevalidation() {
        if (promoRevalidateTimer) clearTimeout(promoRevalidateTimer);
        if (!appliedPromocodeCode) {
            updateFinalAmounts();
            return;
        }
        promoRevalidateTimer = setTimeout(() => {
            validatePromocodeForCurrentSubtotal(appliedPromocodeCode, true);
        }, 120);
    }

    // APPLY PROMOCODE
    $(document).on("click", "#applyPromoBtn", function () {
        validatePromocodeForCurrentSubtotal($("#couponInput").val(), false);
    });

    // REMOVE PROMOCODE
    $(document).on("click", "#removeCouponBtn", function (e) {
    e.preventDefault();

    // RESET PROMO DATA
    appliedPromocodeId = null;
    appliedPromocodeCode = "";

    appliedDiscountAmount = 0;
    appliedPromoValue = 0;
    appliedPromoType = "";

    // CLEAR COUPON INPUT
    $("#couponInput").val("");

    // HIDE REMOVE BUTTON
    $("#removeCouponBtn").hide();
    if (poPromoSuccessMsg) poPromoSuccessMsg.style.display = "none";

    // HIDE PROMO DISCOUNT ROW
    $("#promoDiscountRow").addClass("hidden");
    $("#promoDiscountRow").css("display", "none");

    // CLEAR MESSAGE
    $("#couponMsg").html("");

    // RECALCULATE TOTAL
    updateFinalAmounts();

    // SUCCESS MESSAGE
    $("#couponMsg")
        .html("Promo code removed")
        .css("color", "red");
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

            price: currentPlan.unit_rate || currentPlan.price,

            quantity:
                currentPlan.plan_type === "team" ? $("#payQtyInput").val() : 1,

            total_amount: currentFinalTotal,

            // CONTACT
            contactPerson: $("#contactPerson").val(),
            designation: $("#designation").val(),
            phone: $("#phone").val(),
            email: $("#userEmail").val(),
            username: $("#username").val(),
            term_condition: $("#terms").is(":checked") ? 1 : 0,

            subscription_type: payBillingToggle.checked ? "year" : "month",

            currencyid: selectedCurrency?.currency_code,
            symbol: selectedCurrency?.symbol,
            base_amount: selectedCurrency?.base_amount,
            country: selectedCurrency?.country,

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

    //quantity increase
    if (payQtyPlus && payQtyInput) {
        payQtyPlus.addEventListener("click", function (e) {
            e.preventDefault();
            const minQuantity = getPlanMinimumQuantity();
            const step = getPlanLicenseStep();
            quantity = Math.max(parseInt(payQtyInput.value || minQuantity), minQuantity);
            quantity += step;

            payQtyInput.value = quantity;

            renderPlanData();
        });
        payQtyPlus.addEventListener("mousedown", function (e) {
            e.preventDefault();
        });
    }

    //quantity decrease
    if (payQtyMinus && payQtyInput) {
        payQtyMinus.addEventListener("click", function (e) {
            e.preventDefault();
            const minQuantity = getPlanMinimumQuantity();
            quantity = parseInt(payQtyInput.value || minQuantity);

            if (quantity > minQuantity) {
                const step = getPlanLicenseStep();
                quantity = Math.max(minQuantity, quantity - step);

                payQtyInput.value = quantity;

                renderPlanData();
            } else {
                payQtyInput.value = minQuantity;
            }
        });
        payQtyMinus.addEventListener("mousedown", function (e) {
            e.preventDefault();
        });
    }

    //quantity data
    if (payQtyInput) {
        payQtyInput.addEventListener("input", function () {
            let value = parseInt(this.value);

            const minQuantity = getPlanMinimumQuantity();

            if (isNaN(value) || value < minQuantity) {
                return;
            }

            quantity = value;

            this.value = quantity;

            renderPlanData();
        });

        payQtyInput.addEventListener("change", function () {
            let value = parseInt(this.value);
            const minQuantity = getPlanMinimumQuantity();

            if (isNaN(value) || value < minQuantity) {
                value = minQuantity;
            }

            quantity = value;
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
            scrollPlanIntoView(this);

            renderPlanData();
        });
    });

    updateToggleUI();

    renderPlanData();
    scrollPlanIntoView(document.querySelector(".selected-plan-option.selected"));

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
