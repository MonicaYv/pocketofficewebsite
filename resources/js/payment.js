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
    const summaryTitle = document.querySelector(".os-title");
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

    function syncPlanFromTile(tile, preserveQuantity = false) {
        if (!tile) {
            return;
        }

        const nextPlan = {
            ...currentPlan,
            plan_type: tile.dataset.planType,
            plan_id: tile.dataset.planId,
            name: tile.dataset.name,
            default_qty: parseInt(tile.dataset.defQty || 1),
            price: tile.dataset.pricemonth || 0,
            priceM: parseFloat(tile.dataset.monthlyPrice) || 0,
            priceY: parseFloat(tile.dataset.yearlyPrice) || 0,
            originalPriceM: parseFloat(tile.dataset.originalMonthly) || 0,
            originalPriceY: parseFloat(tile.dataset.originalYearly) || 0,
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
                    ? parseFloat(tile.dataset.extraYearlyDiscount) || 0
                    : parseFloat(tile.dataset.extraYrDiscount) || 0,
        };

        const minQuantity = getPlanMinimumQuantity(nextPlan);
        const nextQuantity = preserveQuantity
            ? Math.max(parseInt(payQtyInput.value || minQuantity), minQuantity)
            : minQuantity;

        currentPlan = nextPlan;
        quantity = nextQuantity;
        currentPlan.quantity = nextQuantity;

        if (payQtyInput) {
            payQtyInput.value = nextQuantity;
            payQtyInput.min = minQuantity;
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

    const isSinglePurchase = currentPlan.plan_type === "single";

    if (isSinglePurchase) {
        payBillingControls?.classList.remove("hidden");
        planSelector?.classList.add("hidden");
    }

    planTiles.forEach((tile) => {
        const tileType = tile.dataset.planType;

        if (currentPlan.plan_type === "single") {
            if (tileType !== "single") {
                tile.style.display = "none";
            } else {
                tile.style.display = "block";
            }
        } else {
            tile.style.display = "block";
        }
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

        payQtyControls.style.display = "none";
        companyForm.classList.add("hidden");

        const billingType = isYearly ? "yearly" : "monthly";

        let basePrice =
            parseFloat(
                isYearly
                    ? (currentPlan.priceY ?? currentPlan.price)
                    : (currentPlan.priceM ?? currentPlan.price),
            ) || 0;

        basePrice = parseFloat(basePrice) || 0;

        const originalPrice = isYearly
            ? currentPlan.originalPriceY
            : currentPlan.originalPriceM;

        let quantityValue = 1;
        const minQuantity = getPlanMinimumQuantity();

        if (currentPlan.plan_type === "team") {
            quantityValue = Math.max(
                parseInt(payQtyInput.value || minQuantity),
                minQuantity,
            );
            quantity = quantityValue;
            currentPlan.quantity = quantityValue;
            payQtyInput.value = quantityValue;
            payQtyInput.min = minQuantity;
        } else {
            quantityValue = 1;

            // FORCE RESET UI FOR SINGLE
            payQtyInput.value = 1;
            payQtyInput.min = 1;
            quantity = 1;
            currentPlan.quantity = 1;
        }

        const originalUnitPrice = parseFloat(originalPrice) || basePrice;

        // let activeDiscount = 0;

        // if (currentPlan.plan_type === "team") {
        //     activeDiscount = isYearly
        //         ? parseFloat(currentPlan.extra_yearly_discount || 0)
        //         : parseFloat(currentPlan.extra_monthly_discount || 0);
        // } else {
        //     activeDiscount = isYearly
        //         ? parseFloat(currentPlan.yearly_discount || 0)
        //         : parseFloat(currentPlan.monthly_discount || 0);
        // }

        let activeDiscount = isYearly
            ? parseFloat(currentPlan.yearly_discount || 0)
            : parseFloat(currentPlan.monthly_discount || 0);

        let discountValue = activeDiscount;

        //extra disc
        let extraDiscount = 0;

        if (currentPlan.plan_type === "team") {
            extraDiscount = isYearly
                ? parseFloat(currentPlan.extra_yr_discount || 0)
                : parseFloat(currentPlan.extra_mo_discount || 0);
        } else {
            extraDiscount = isYearly
                ? parseFloat(currentPlan.extra_yr_discount || 0)
                : parseFloat(currentPlan.extra_mo_discount || 0);
        }

        const totalDiscountPercent = activeDiscount + extraDiscount;
        const discountedUnitPrice =
            originalUnitPrice > 0 && totalDiscountPercent > 0
                ? originalUnitPrice -
                (originalUnitPrice * totalDiscountPercent) / 100
                : basePrice;
        basePrice = Math.round(discountedUnitPrice);

        let subtotalAmount = basePrice * quantityValue;
        const finalTotal = Math.round(subtotalAmount);

        const displayPlanName =
            currentPlan.display_name ||
            (currentPlan.plan_type === "single"
                ? `Personal (${currentPlan.name || "Basic"})`
                : currentPlan.name || "—");

        summaryPlanName.innerText = displayPlanName;

        if (summaryTitle) {
            summaryTitle.innerText = displayPlanName;
        }

        if (summarySubtitle) {
            summarySubtitle.innerText =
                "Review your selected plan before proceeding.";
        }

        if (summaryPlanIcon) {
            summaryPlanIcon.innerHTML = getPlanIconSvg(currentPlan.name || "");
        }

        summarySymbol.innerText = currentPlan.symbol || "";

        summaryUnitPrice.innerText = formatIndianNumber(basePrice);

        summaryOrgTotal.innerText = formatCurrencyAmount(
            currentPlan.symbol,
            originalUnitPrice * quantityValue,
        );

        currentPayableSubtotal = Math.round(subtotalAmount);

        summaryTax.innerText = formatCurrencyAmount(currentPlan.symbol, 0);

        summaryTotal.innerText =
            formatCurrencyAmount(currentPlan.symbol, finalTotal);

        modalTotal.innerText = formatCurrencyAmount(currentPlan.symbol, finalTotal);

        // APPLY PROMOCODE AGAIN AFTER PLAN/QTY CHANGE
        updateFinalAmounts();

        document.querySelectorAll(".plan-period").forEach((periodText) => {
            periodText.innerText = isYearly ? "/year" : "/month";
        });

        // let monthlyDiscount = 0;
        // let yearlyDiscount = 0;

        // if (currentPlan.plan_type === "team") {
        //     monthlyDiscount = parseFloat(
        //         currentPlan.extra_monthly_discount || 0,
        //     );

        //     yearlyDiscount = parseFloat(currentPlan.extra_yearly_discount || 0);
        // } else {
        //     monthlyDiscount = parseFloat(currentPlan.monthly_discount || 0);

        //     yearlyDiscount = parseFloat(currentPlan.yearly_discount || 0);
        // }

        let monthlyDiscount = parseFloat(currentPlan.monthly_discount || 0);
        let yearlyDiscount = parseFloat(currentPlan.extra_yr_discount || 0);

        if (monthlyDiscount > 0) {
            monthlyDiscountBadge.style.display = "inline-block";
            monthlyDiscountBadge.textContent = `(${monthlyDiscount}% Discount)`;
        } else {
            monthlyDiscountBadge.style.display = "none";
        }

        if (yearlyDiscount > 0) {
            yearlyDiscountBadge.style.display = "inline-block";
            yearlyDiscountBadge.textContent = `(${yearlyDiscount}% Discount)`;
        } else {
            yearlyDiscountBadge.style.display = "none";
        }

        // Discount Amounts (based on original total)
        const origTotal = originalUnitPrice * quantityValue;

        const activeDiscountAmount = Math.round(
            (origTotal * activeDiscount) / 100,
        );

        const extraDiscountAmount = Math.round(
            (origTotal * extraDiscount) / 100,
        );

        if (activeDiscount > 0) {
            discountRow.classList.remove("hidden");
            discountRow.style.display = "flex";

            // discountRow.querySelector("span:first-child").innerText =
            //     `${billingType === "yearly" ? "Yearly" : "Monthly"} Discount Applied (${activeDiscount}%)`;
            discountRow.querySelector("span:first-child").innerHTML =
                `Discount Applied (<span style="color: red;">${activeDiscount}%</span>)`;

            discountAmt.innerText =
                `-${formatCurrencyAmount(currentPlan.symbol, activeDiscountAmount)}`;
        } else {
            discountRow.classList.add("hidden");
            discountRow.style.display = "none";
        }

        if (extraDiscount > 0) {
            extradiscountRow.classList.remove("hidden");
            extradiscountRow.style.display = "flex";

            extradiscountRow.querySelector("span:first-child").innerHTML =
                `${billingType === "yearly" ? "Yearly" : "Monthly"} Extra Discount Applied ( <span style="color: red;">${extraDiscount}%)`;

            extradiscountAmt.innerText =
                `-${formatCurrencyAmount(currentPlan.symbol, extraDiscountAmount)}`;
        } else {
            extradiscountRow.classList.add("hidden");
            extradiscountRow.style.display = "none";
        }

        // if (
        //     (activeDiscount > 0 || extraDiscount > 0) &&
        //     currentPlan.original_price
        // ) {
        //     summaryOrgTotal.innerHTML = `<del>${currentPlan.symbol}${Math.round(currentPlan.original_price)}</del>`;
        // } else {
        //     summaryOrgTotal.innerHTML = "";
        // }

        // const originalTotal = originalPrice * (currentPlan.default_qty || 1);
        const originalTotal = originalUnitPrice * quantityValue;

        if ((activeDiscount > 0 || extraDiscount > 0) && originalUnitPrice > 0) {
            if (summaryOriginalRow) {
                summaryOriginalRow.style.display = "flex";
            }

            summaryOrgTotal.innerText = formatCurrencyAmount(
                currentPlan.symbol,
                originalTotal,
            );
        } else {
            if (summaryOriginalRow) {
                summaryOriginalRow.style.display = "none";
            }

            summaryOrgTotal.innerHTML = "";
        }

        const totalDiscountAmount = activeDiscountAmount + extraDiscountAmount;

        if (summarySubtotalLabel) {
            summarySubtotalLabel.innerText = "You Save";
        }

        if (summarySubtotal) {
            summarySubtotal.innerText = formatCurrencyAmount(
                currentPlan.symbol,
                totalDiscountAmount,
            );
        }

        if (summarySubtotalRow) {
            summarySubtotalRow.style.display =
                totalDiscountAmount > 0 ? "flex" : "none";
        }

        const discountMessages = [];

        if (activeDiscount > 0) {
            discountMessages.push(`${activeDiscount}% off`);
        }

        if (extraDiscount > 0) {
            discountMessages.push(`${extraDiscount}% special offer`);
        }

        if (discountMessages.length > 0) {
            paySavingsNotice.classList.remove("hidden");
            paySavingsNotice.innerHTML = `🎉 ${discountMessages.join(" + ")} with ${billingType} billing`;
        } else {
            paySavingsNotice.classList.add("hidden");
            paySavingsNotice.innerHTML = "";
        }

        const savingsChip = document.querySelector(".ten-percent-savings");
        if (savingsChip) {
            if (yearlyDiscount > 0) {
                savingsChip.style.display = "inline-flex";
                const chipIcon = savingsChip.querySelector("svg")?.outerHTML || "";
                savingsChip.innerHTML = `${chipIcon} Save ${yearlyDiscount}% with Yearly Billing`;
            } else {
                savingsChip.style.display = "none";
            }
        }

        if (currentPlan.plan_type === "team") {
            payQtyControls.style.display = "block";
            companyForm.classList.remove("hidden");
        } else {
            payQtyControls.style.display = "none";
            companyForm.classList.add("hidden");

            // RESET TEAM DATA
            payQtyInput.value = 1;
            quantity = 1;
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

        if (selectedFeatures.length > 0) {
            planFeatureList.innerHTML = selectedFeatures
                .map((feature) => `<li>${feature}</li>`)
                .join("");
        } else {
            const displayedLicense =
                currentPlan.plan_type === "team"
                    ? quantityValue
                    : parseInt(currentPlan.license || 1);
            let totalStorage = parseInt(currentPlan.storage || 0) * quantityValue;
            planFeatureList.innerHTML = `
            <li>${displayedLicense} User License</li>
            <li>${currentPlan.storage} ${currentPlan.storage_unit} Per User</li>
            <li>Total Storage : ${totalStorage} ${currentPlan.storage_unit}</li>
            `;
        }

        planTiles.forEach((tile) => {
            tile.classList.remove("selected");

            // if (tile.dataset.planId == currentPlan.plan_id) {
            //     tile.classList.add("selected");
            // }

            if (
                tile.dataset.planId == currentPlan.plan_id &&
                tile.dataset.planType == currentPlan.plan_type
            ) {
                tile.classList.add("selected");
            }

            const tilePrice = tile.querySelector(".view_plan_price_details");

            if (tilePrice) {
                const price = isYearly
                    ? parseFloat(tile.dataset.yearlyPrice || 0)
                    : parseFloat(tile.dataset.monthlyPrice || 0);

                tilePrice.innerHTML =
                    tile.dataset.symbol + "" + formatIndianNumber(price);
            }
            // const tilePrice = tile.querySelector(".plan_price_details");

            // if (tilePrice) {
            //     tilePrice.innerHTML =
            //         currentPlan.symbol + " " + Math.round(basePrice);
            // }
        });
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
        return /^[0-9]{10}$/.test(phone);
    }

    function validateCompanyNumber(companyNumber) {
        return /^[0-9]{10}$/.test(companyNumber);
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
                showError("companyNumber", "Enter valid 10 digit phone");
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
            showError("phone", "Enter valid 10 digit phone");
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

    function formatPromoLabel(value, type) {
        const numericValue = Number(value || 0);
        if (type === "flat") {
            return formatCurrencyAmount(currentPlan.symbol, numericValue);
        }

        return Math.round(numericValue) + "%";
    }

    // CALCULATE FINAL TOTAL
    function updateFinalAmounts() {
        let subtotal = parseFloat(currentPayableSubtotal || 0);

        let finalTotal = subtotal;

        // APPLY PROMO DISCOUNT
        if (appliedDiscountAmount > 0) {
            finalTotal = subtotal - appliedDiscountAmount;

            if (finalTotal < 0) {
                finalTotal = 0;
            }

            promoDiscountRow.classList.remove("hidden");
            promoDiscountRow.style.display = "flex";

            const promoLabel = promoDiscountRow.querySelector("span:first-child");
            if (appliedPromoType === "flat") {
                promoLabel.innerText = "Promo Code";

                promoDiscountAmt.innerText =
                    "-" + formatCurrencyAmount(
                        currentPlan.symbol,
                        appliedDiscountAmount
                    );
            }
            else {
                promoLabel.innerHTML =
                    `Promo Code (<span style="color: red;">${Math.round(appliedPromoValue)}%</span>)`;

                promoDiscountAmt.innerText =
                    "-" + formatCurrencyAmount(
                        currentPlan.symbol,
                        appliedDiscountAmount
                    );
            }
        } else {
            promoDiscountRow.classList.add("hidden");
            promoDiscountRow.style.display = "none";
        }

        // UPDATE TOTALS
        summaryTotal.innerText =
            formatCurrencyAmount(currentPlan.symbol, finalTotal);

        modalTotal.innerText =
            formatCurrencyAmount(currentPlan.symbol, finalTotal);
    }

    // APPLY PROMOCODE
    $(document).on("click", "#applyPromoBtn", function () {
        let code = $("#couponInput").val().trim();

        if (code === "") {
            $("#couponMsg").html("Enter promocode").css("color", "red");
            // alert("Enter promocode");
            return;
        }

        let subtotalAmount = currentPayableSubtotal;

        $.ajax({
            url: "/apply-promocode",

            type: "POST",

            data: {
                code: code,
                amount: subtotalAmount,
            },

            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },

            success: function (response) {
                if (response.status === true) {
                    appliedPromocodeId = response.promocode_id;

                    appliedPromocodeCode = code;

                    appliedDiscountAmount = parseFloat(response.discount || 0);
                    appliedPromoValue = parseFloat(
                        response.discount_value || response.promodiscount || 0,
                    );
                    appliedPromoType =
                        response.discount_type || response.type || "";

                    // UPDATE TOTAL
                    updateFinalAmounts();

                    // SHOW REMOVE BUTTON
                    $("#removeCouponBtn").show();

                    // SUCCESS MESSAGE
                    $("#couponMsg")
                        .html("✅ Promo code applied successfully")
                        .css("color", "green");
                } else {
                    appliedPromocodeId = null;

                    appliedPromocodeCode = "";

                    appliedDiscountAmount = 0;
                    appliedPromoValue = 0;
                    appliedPromoType = "";

                    updateFinalAmounts();

                    $("#removeCouponBtn").hide();

                    $("#couponMsg")
                        .html(response.message || "Invalid promo code")
                        .css("color", "red");
                }
            },

            error: function () {
                $("#couponMsg")
                    .html("Unable to apply promo code")
                    .css("color", "red");
            },
        });
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

            price: currentPlan.price,

            quantity:
                currentPlan.plan_type === "team" ? $("#payQtyInput").val() : 1,

            total_amount: $("#summaryTotal")
                .text()
                .replace(/[^0-9.]/g, ""),

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
        this.value = this.value.replace(/\D/g, "").slice(0, 10);

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
            this.value = this.value.replace(/\D/g, "").slice(0, 10);

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
        payQtyPlus.addEventListener("click", function () {
            quantity = parseInt(payQtyInput.value || getPlanMinimumQuantity());
            quantity++;

            payQtyInput.value = quantity;

            renderPlanData();
        });
    }

    //quantity decrease
    if (payQtyMinus && payQtyInput) {
        payQtyMinus.addEventListener("click", function () {
            const minQuantity = getPlanMinimumQuantity();
            quantity = parseInt(payQtyInput.value || minQuantity);

            if (quantity > minQuantity) {
                quantity--;

                payQtyInput.value = quantity;

                renderPlanData();
            } else {
                payQtyInput.value = minQuantity;
            }
        });
    }

    //quantity data
    if (payQtyInput) {
        payQtyInput.addEventListener("input", function () {
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

    $(`.payment-tab-${selectedPlan.plan_id}`).trigger("click");
});
