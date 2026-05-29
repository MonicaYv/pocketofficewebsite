document.addEventListener("DOMContentLoaded", function () {
    const selectedPlan = JSON.parse(localStorage.getItem("selectedPlan"));
    const selectedCurrency = JSON.parse(
        localStorage.getItem("selectedCurrency"),
    );

    if (!selectedPlan) {
        // console.log("No selected plan found");
        return;
    }

    const summaryPlanName = document.getElementById("summaryPlanName");
    const summarySymbol = document.getElementById("summarySymbol");
    const summaryUnitPrice = document.getElementById("summaryUnitPrice");
    const summarySubtotal = document.getElementById("summarySubtotal");
    const summaryTotal = document.getElementById("summaryTotal");
    const summaryTax = document.getElementById("summaryTax");

    const planFeatureList = document.getElementById("planFeatureList");

    const payBillingToggle = document.getElementById("payBillingToggle");

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

    const planTiles = document.querySelectorAll(".selected-plan-option");

    const companyForm = document.querySelector(".pay-company-form");

    let currentPlan = {
        ...selectedPlan,
    };

    currentPlan.currencyid = selectedCurrency?.currency_code || null;
    currentPlan.symbol = selectedCurrency?.symbol || currentPlan.symbol;
    currentPlan.base_amount = selectedCurrency?.base_amount || 0;

    let quantity = 1;

    const initialBillingType =
        currentPlan.billing_type || currentPlan.subscription || "monthly";

    payBillingToggle.checked = initialBillingType.toLowerCase() === "yearly";

    planTiles.forEach((tile) => {
        const tileType = tile.dataset.planType;

        if (selectedPlan.plan_type === "single") {
            if (tileType !== "single") {
                tile.style.display = "none";
            } else {
                tile.style.display = "block";
            }
        } else {
            tile.style.display = "block";
        }
    });

    function updateToggleUI() {
        const yearly = payBillingToggle.checked;

        if (yearly) {
            payBillingMonthLabel.style.color = "#888";
            payBillingMonthLabel.style.fontWeight = "400";

            payBillingYearLabel.style.color = "#057A96";
            payBillingYearLabel.style.fontWeight = "600";

            payToggleTrack.style.background = "#057A96";
            payToggleThumb.style.left = "21px";
        } else {
            payBillingMonthLabel.style.color = "#057A96";
            payBillingMonthLabel.style.fontWeight = "600";

            payBillingYearLabel.style.color = "#888";
            payBillingYearLabel.style.fontWeight = "400";

            payToggleTrack.style.background = "#ccc";
            payToggleThumb.style.left = "3px";
        }
    }

    function renderPlanData() {
        const isYearly = payBillingToggle.checked;

        const billingType = isYearly ? "yearly" : "monthly";

        let basePrice = parseFloat(currentPlan.price || 0);

        let quantityValue =
            currentPlan.plan_type === "team"
                ? parseInt(payQtyInput.value || 1)
                : 1;

        let subtotalAmount = basePrice * quantityValue;

        let activeDiscount = 0;

        if (currentPlan.plan_type === "team") {
            activeDiscount = isYearly
                ? parseFloat(currentPlan.extra_yearly_discount || 0)
                : parseFloat(currentPlan.extra_monthly_discount || 0);
        } else {
            activeDiscount = isYearly
                ? parseFloat(currentPlan.yearly_discount || 0)
                : parseFloat(currentPlan.monthly_discount || 0);
        }

        let discountValue = activeDiscount;

        const finalTotal = subtotalAmount;

        summaryPlanName.innerText = currentPlan.name || "—";

        summarySymbol.innerText = currentPlan.symbol || "";

        summaryUnitPrice.innerText = Math.round(basePrice);

        summarySubtotal.innerText =
            currentPlan.symbol + " " + Math.round(subtotalAmount);

        summaryTax.innerText = currentPlan.symbol + " 0";

        summaryTotal.innerText =
            currentPlan.symbol + " " + Math.round(finalTotal);

        modalTotal.innerText =
            currentPlan.symbol + " " + Math.round(finalTotal);

        // APPLY PROMOCODE AGAIN AFTER PLAN/QTY CHANGE
        updateFinalAmounts();

        const periodText = document.querySelector(".plan-price small");

        if (periodText) {
            periodText.innerText = isYearly ? "/year" : "/month";
        }

        let monthlyDiscount = 0;
        let yearlyDiscount = 0;

        if (currentPlan.plan_type === "team") {
            monthlyDiscount = parseFloat(
                currentPlan.extra_monthly_discount || 0,
            );

            yearlyDiscount = parseFloat(currentPlan.extra_yearly_discount || 0);
        } else {
            monthlyDiscount = parseFloat(currentPlan.monthly_discount || 0);

            yearlyDiscount = parseFloat(currentPlan.yearly_discount || 0);
        }

        if (monthlyDiscount > 0) {
            monthlyDiscountBadge.style.display = "inline-block";
            monthlyDiscountBadge.innerText = monthlyDiscount + "% OFF";
        } else {
            monthlyDiscountBadge.style.display = "none";
        }

        if (yearlyDiscount > 0) {
            yearlyDiscountBadge.style.display = "inline-block";
            yearlyDiscountBadge.innerText = yearlyDiscount + "% OFF";
        } else {
            yearlyDiscountBadge.style.display = "none";
        }

        if (activeDiscount > 0) {
            discountRow.classList.remove("hidden");
            discountRow.style.display = "flex";

            discountRow.querySelector("span:first-child").innerText =
                `Discount (${activeDiscount}%)`;

            discountAmt.innerText = "- " + discountValue;
        } else {
            discountRow.classList.add("hidden");
            discountRow.style.display = "none";
        }

        if (activeDiscount > 0) {
            paySavingsNotice.classList.remove("hidden");
            paySavingsNotice.style.display = "block";

            paySavingsNotice.innerHTML = `🎉 ${activeDiscount}% OFF with ${billingType} billing`;
        } else {
            paySavingsNotice.classList.add("hidden");
            paySavingsNotice.style.display = "none";
        }

        if (currentPlan.plan_type === "team") {
            quantity = quantityValue;

            payQtyInput.value = quantity;

            companyForm.classList.remove("hidden");

            payQtyControls.style.display = "block";
        } else {
            quantity = 1;

            payQtyInput.value = 1;

            companyForm.classList.add("hidden");

            payQtyControls.style.display = "none";
        }

        let totalStorage = parseInt(currentPlan.storage || 0) * quantity;

        planFeatureList.innerHTML = `
        <li>${quantity} User License</li>
        <li>${currentPlan.storage} ${currentPlan.storage_unit} Per User</li>
        <li>Total Storage : ${totalStorage} ${currentPlan.storage_unit}</li>
        `;

        planTiles.forEach((tile) => {
            tile.classList.remove("selected");

            if (tile.dataset.planId == currentPlan.plan_id) {
                tile.classList.add("selected");
            }

            const tilePrice = tile.querySelector(".pay-plan-tile__price");

            if (tilePrice) {
                tilePrice.innerHTML =
                    currentPlan.symbol + " " + Math.round(basePrice);
            }
        });
    }

    //form validation and save or submit
    // =========================
    // VALIDATION HELPERS
    // =========================
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

    // =========================
    // VALIDATIONS
    // =========================
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
        return /^(?=.*[A-Z])[A-Za-z_]+$/.test(username);
    }

    // =========================
    // FORM VALIDATION
    // =========================
    function validateForm() {
        let valid = true;

        // =========================
        // TEAM ONLY VALIDATION
        // =========================
        if (currentPlan.plan_type === "team") {
            const companyName =
                document.getElementById("companyName")?.value.trim() || "";

            const address =
                document.getElementById("address")?.value.trim() || "";

            const companyEmail =
                document.getElementById("companyEmail")?.value.trim() || "";

            if (companyName.length < 2) {
                showError("companyName", "Company name is required");
                valid = false;
            } else {
                hideError("companyName");
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

        const contactPerson =
            document.getElementById("contactPerson")?.value.trim() || "";

        if (contactPerson.length < 2) {
            showError("contactPerson", "Enter contact person");
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

        const companyNumber = document.getElementById("companyNumber")?.value.trim() || "";

        if (!validateCompanyNumber(companyNumber)) {
            showError("companyNumber", "Enter valid 10 digit phone");
            valid = false;
        } else {
            hideError("companyNumber");
        }
        

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
                "Only letters + underscore with 1 capital letter",
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

    // =========================
    // MODAL
    // =========================
    const paymentModalForTeam = document.getElementById("paymentModalForTeam");

    const sideSubmitBtnForTeam = document.getElementById(
        "sideSubmitBtnForTeam",
    );

    const closePayModal = document.getElementById("closePayModal");

    // =========================
    // OPEN MODAL
    // =========================
    sideSubmitBtnForTeam?.addEventListener("click", function () {
        const valid = validateForm();

        if (!valid) {
            // console.log("Validation failed");
            return;
        }

        paymentModalForTeam?.classList.remove("hidden");
    });

    // =========================
    // CLOSE MODAL
    // =========================
    closePayModal?.addEventListener("click", function () {
        paymentModalForTeam?.classList.add("hidden");
    });

    // =========================
    // PROMOCODE VARIABLES
    // =========================
    let appliedPromocodeId = null;
    let appliedPromocodeCode = "";
    let appliedDiscountAmount = 0;

    // =========================
    // CALCULATE FINAL TOTAL
    // =========================
    function updateFinalAmounts() {
        const subtotalText = summarySubtotal.innerText.replace(/[^0-9.]/g, "");

        let subtotal = parseFloat(subtotalText || 0);

        let finalTotal = subtotal;

        // APPLY PROMO DISCOUNT
        if (appliedDiscountAmount > 0) {
            finalTotal = subtotal - appliedDiscountAmount;

            if (finalTotal < 0) {
                finalTotal = 0;
            }

            // SHOW DISCOUNT ROW
            discountRow.classList.remove("hidden");
            discountRow.style.display = "flex";

            discountRow.querySelector("span:first-child").innerText =
                "Promo Discount";

            discountAmt.innerText =
                "- " +
                currentPlan.symbol +
                " " +
                Math.round(appliedDiscountAmount);
        } else {
            // HIDE DISCOUNT ROW
            discountRow.classList.add("hidden");
            discountRow.style.display = "none";
        }

        // UPDATE TOTALS
        summaryTotal.innerText =
            currentPlan.symbol + " " + Math.round(finalTotal);

        modalTotal.innerText =
            currentPlan.symbol + " " + Math.round(finalTotal);
    }

    // =========================
    // APPLY PROMOCODE
    // =========================
    // =========================
    // APPLY PROMOCODE
    // =========================
    $(document).on("click", "#applyPromoBtn", function () {
        let code = $("#couponInput").val().trim();

        if (code === "") {
            $("#couponMsg").html("Enter promocode").css("color", "red");
            // alert("Enter promocode");
            return;
        }

        let subtotalAmount = summarySubtotal.innerText.replace(/[^0-9.]/g, "");

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
                // console.log(response);

                if (response.status === true) {
                    appliedPromocodeId = response.promocode_id;

                    appliedPromocodeCode = code;

                    appliedDiscountAmount = parseFloat(response.discount || 0);

                    // UPDATE TOTAL
                    updateFinalAmounts();

                    // SHOW REMOVE BUTTON
                    $("#removeCouponBtn").show();

                    // SUCCESS MESSAGE
                    $("#couponMsg")
                        .html("✅ Promocode applied successfully")
                        .css("color", "green");

                    // alert("Promocode applied successfully");
                } else {
                    appliedPromocodeId = null;

                    appliedPromocodeCode = "";

                    appliedDiscountAmount = 0;

                    updateFinalAmounts();

                    $("#removeCouponBtn").hide();

                    $("#couponMsg")
                        .html(response.message || "Invalid promocode")
                        .css("color", "red");

                    // alert(response.message || "Invalid promocode");
                }
            },

            error: function () {
                $("#couponMsg")
                    .html("Unable to apply promocode")
                    .css("color", "red");
                // alert("Unable to apply promocode");
            },
        });
    });

    // =========================
    // REMOVE PROMOCODE
    // =========================
    $(document).on("click", "#removeCouponBtn", function () {
        appliedPromocodeId = null;

        appliedPromocodeCode = "";

        appliedDiscountAmount = 0;

        // CLEAR INPUT
        $("#couponInput").val("");

        // HIDE REMOVE BUTTON
        $("#removeCouponBtn").hide();

        // CLEAR MESSAGE
        $("#couponMsg").html("");

        // RECALCULATE TOTAL
        updateFinalAmounts();

        $("#couponMsg").html("Promocode removed").css("color", "red");
        // alert("Promocode removed");
    });

    $(document).on("click", "#confirmPayBtn", function () {
        // console.log("Confirm payment clicked");

        let btn = $(this);

        btn.prop("disabled", true).text("Processing...");

        // PLAN DISCOUNT
        let planDiscount = 0;

        // EXTRA / PROMO DISCOUNT
        let extraDiscount = appliedDiscountAmount || 0;

        // SINGLE USER
        if (currentPlan.plan_type === "single") {
            planDiscount = payBillingToggle.checked
                ? parseFloat(currentPlan.yearly_discount || 0)
                : parseFloat(currentPlan.monthly_discount || 0);
        } else {
            // TEAM EXTRA DISCOUNT
            planDiscount = payBillingToggle.checked
                ? parseFloat(currentPlan.extra_yearly_discount || 0)
                : parseFloat(currentPlan.extra_monthly_discount || 0);
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
                currentPlan.plan_type === "team" ? $("#companyName").val() : "",

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
                // console.log(response);

                if (response.status === true || response.success === true) {
                    toastr.success(response.message);
                    window.location.href = "/thankyou";
                } else {
                    toastr.error("Payment failed");
                    // toastr.error(response.message);
                }
            },

            error: function (xhr) {
                toastr.error("Something went wrong");
                // console.log(xhr);
                // alert("Something went wrong");
            },

            complete: function () {
                btn.prop("disabled", false).text("🔒 Confirm Payment");
            },
        });
    });

    // =========================
    // LIVE VALIDATION
    // =========================

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
        this.value = this.value.replace(/[^A-Za-z_]/g, "");

        if (validateUsername(this.value.trim())) {
            hideError("username");
        }
    });

    // CONTACT PERSON
    document
        .getElementById("contactPerson")
        ?.addEventListener("input", function () {
            if (this.value.trim().length >= 2) {
                hideError("contactPerson");
            }
        });

    // COMPANY NAME
    document
        .getElementById("companyName")
        ?.addEventListener("input", function () {
            if (this.value.trim().length >= 2) {
                hideError("companyName");
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

    // COMONY PHONE
    document.getElementById("companyNumber")?.addEventListener("input", function () {
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
    //

    //on change toggle
    payBillingToggle.addEventListener("change", function () {
        updateToggleUI();
        renderPlanData();
    });

    payQtyPlus.addEventListener("click", function () {
        quantity++;

        payQtyInput.value = quantity;

        renderPlanData();
    });

    payQtyMinus.addEventListener("click", function () {
        if (quantity > 1) {
            quantity--;

            payQtyInput.value = quantity;

            renderPlanData();
        }
    });

    payQtyInput.addEventListener("input", function () {
        let value = parseInt(this.value);

        if (isNaN(value) || value < 1) {
            value = 1;
        }

        quantity = value;

        this.value = quantity;

        renderPlanData();
    });

    planTiles.forEach((tile) => {
        tile.addEventListener("click", function () {
            planTiles.forEach((t) => t.classList.remove("selected"));

            this.classList.add("selected");

            currentPlan = {
                ...currentPlan,

                plan_type: this.dataset.planType,
                plan_id: this.dataset.planId,
                name: this.dataset.name,

                price: this.dataset.price || 0,
                symbol: this.dataset.symbol || "₹",
                // currencyid: this.dataset.currencyid,

                subscription: this.dataset.subscription || "monthly",

                license: this.dataset.license,
                storage: this.dataset.storage,
                storage_unit: this.dataset.storageUnit,

                monthly_discount: this.dataset.monthlyDiscount || 0,
                yearly_discount: this.dataset.yearlyDiscount || 0,

                extra_monthly_discount: this.dataset.extraMonthlyDiscount || 0,

                extra_yearly_discount: this.dataset.extraYearlyDiscount || 0,
            };

            renderPlanData();
        });
    });

    updateToggleUI();

    renderPlanData();
});
