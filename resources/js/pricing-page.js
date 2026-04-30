

document.addEventListener("DOMContentLoaded", function () {

    const params = new URLSearchParams(window.location.search);

    let planName = params.get("plan_name");
    let price = parseFloat(params.get("amount"));
    let currency = params.get("currency");
    let license = params.get("license");
    let storage = params.get("storage");

    if (planName) {
        document.getElementById("summaryPlanName").innerText = planName;
    }

    if (currency) {
        document.getElementById("summarySymbol").innerText = currency;
    }

    if (price) {

        document.getElementById("summaryUnitPrice").innerText = price;

        document.getElementById("summarySubtotal").innerText =
            currency + " " + price.toFixed(2);

        document.getElementById("summaryTotal").innerText =
            currency + " " + price.toFixed(2);

        document.getElementById("modalTotalAmount").innerText =
            currency + " " + price.toFixed(2);
    }

    let list = document.getElementById("planFeatureList");

    if (license && storage) {

        list.innerHTML = `
            <li>✓ License: ${license}</li>
            <li>✓ Total Storage: ${storage} GB</li>
            <li>✓ Unlimited Workspaces</li>
            <li>✓ Enterprise Security</li>
            <li>✓ All Integrations</li>
            <li>✓ Priority Support</li>
        `;

    }

});

$(document).ready(function () {

    console.log("Payment Flow Loaded 🚀");

    /* ========================================
       CSRF
    ======================================== */

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    /* ========================================
       BUILD REVIEW HTML
    ======================================== */

    function buildReviewHTML() {

        const gv = (id) => {
            let el = document.getElementById(id);
            return el && el.value ? el.value.trim() : "—";
        };

        return `

<div id="reviewView">

<div class="panel panel-default mb-4">

<div class="panel-heading pay-review-head">
<h4>Company Details</h4>
<button class="pay-edit-btn" id="editBtn">✏️ Edit</button>
</div>

<div class="panel-body">

<div class="row">

<div class="col-sm-6">
<div class="review-field">
<span class="review-label">Company Name</span>
<div class="review-value">${gv('companyNameInput')}</div>
</div>
</div>

<div class="col-sm-6">
<div class="review-field">
<span class="review-label">Company Email</span>
<div class="review-value">${gv('companyEmailInput')}</div>
</div>
</div>

</div>

<div class="row">

<div class="col-sm-6">
<div class="review-field">
<span class="review-label">Website</span>
<div class="review-value">${gv('websiteInput')}</div>
</div>
</div>

<div class="col-sm-6">
<div class="review-field">
<span class="review-label">Industry</span>
<div class="review-value">${gv('industryTypeInput')}</div>
</div>
</div>

</div>

<div class="row">

<div class="col-sm-12">
<div class="review-field">
<span class="review-label">Address</span>
<div class="review-value">${gv('addressInput')}</div>
</div>
</div>

</div>

</div>
</div>


<div class="panel panel-default mb-4">

<div class="panel-heading">
<h4>Contact Person</h4>
</div>

<div class="panel-body">

<div class="row">

<div class="col-sm-6">
<div class="review-field">
<span class="review-label">Contact Person</span>
<div class="review-value">${gv('contactPersonInput')}</div>
</div>
</div>

<div class="col-sm-6">
<div class="review-field">
<span class="review-label">Phone</span>
<div class="review-value">${gv('phoneInput')}</div>
</div>
</div>

</div>

<div class="row">

<div class="col-sm-6">
<div class="review-field">
<span class="review-label">Email</span>
<div class="review-value">${gv('emailInput')}</div>
</div>
</div>

<div class="col-sm-6">
<div class="review-field">
<span class="review-label">Username</span>
<div class="review-value">${gv('usernameInput')}</div>
</div>
</div>

</div>

</div>
</div>

</div>
`;
    }


    /* ========================================
       STEP 1 — SAVE & VERIFY
    ======================================== */

    // $(document).on("click", "#sideSubmitBtn", function () {

    //     console.log("Save & Verify clicked");

    //     $("#registrationForm").hide();

    //     $("#formCol").append(buildReviewHTML());

    //     $("#sideSubmitBtn")
    //         .attr("id", "verifyCheckoutBtn")
    //         .text("Verify & Checkout");

    // });


    /* ========================================
       EDIT BUTTON
    ======================================== */

    // $(document).on("click", "#editBtn", function () {

    //     $("#reviewView").remove();

    //     $("#registrationForm").show();

    //     $("#verifyCheckoutBtn")
    //         .attr("id", "sideSubmitBtn")
    //         .text("Save & Verify");

    // });

    function createToast(title, message, desc, time, type) {

        let toast = document.getElementById("toast");

        toast.innerHTML = `
        <strong>${title}</strong><br>
        ${message}<br>
        <small>${desc}</small>
    `;

        toast.style.display = "block";
        toast.style.opacity = "1";

        setTimeout(() => {
            toast.style.opacity = "0";
            setTimeout(() => {
                toast.style.display = "none";
            }, 300);
        }, 3000);
    }
    /* ========================================
       STEP 2 — VERIFY & CHECKOUT
    ======================================== */

    $(document).on("click", "#verifyCheckoutBtn", function () {

        console.log("Verify & Checkout clicked");

        let btn = $(this);
        btn.prop("disabled", true);

        let companyData = {

            companyName: $("#companyNameInput").val(),
            companyEmail: $("#companyEmailInput").val(),
            website: $("#websiteInput").val(),
            industryType: $("#industryTypeInput").val(),
            address: $("#addressInput").val(),

            contactPerson: $("#contactPersonInput").val(),
            phone: $("#phoneInput").val(),
            email: $("#emailInput").val(),
            username: $("#usernameInput").val()

        };

        $.ajax({

            url: saveCompanyUrl,
            type: "POST",
            data: companyData,
            dataType: "json",

            success: function (res) {

                if (!res.success) {

                    createToast(
                        "Error",
                        "Company could not be saved",
                        "Weak hint",
                        new Date(),
                        0
                    );

                    btn.prop("disabled", false);
                    return;
                }
                // ✅ STORE USER ID
                window.savedUserId = res.user_id;

                console.log("✅ User ID:", window.savedUserId);
                // ✅ 1. Show success toast
                createToast(
                    "Success",
                    "Company saved successfully",
                    "You can proceed with payment",
                    new Date(),
                    1
                );

                // ✅ 2. Delay modal properly (match toast duration)
                setTimeout(function () {

                    $("#paymentModal").fadeIn();

                }, 1500); // increased delay for better UX

            },

            error: function () {

                createToast(
                    "Server Error",
                    "Unable to save company",
                    "Weak hint",
                    new Date(),
                    0
                );

                btn.prop("disabled", false);

            }

        });

    });


    /* ========================================
       STEP 3 — CONFIRM PAYMENT
    ======================================== */

    $(document).on("click", "#confirmPayBtn", function () {

        console.log("Confirm payment clicked");

        let btn = $(this);
        btn.prop("disabled", true).text("Processing...");

        let paymentData = {

            user_id: window.savedUserId, // ✅ use saved ID
            plan_id: $("#selectedPlanId").val(),
            quantity: $("#selectedQuantity").val(),

            total_amount: $("#summaryTotal").text().replace(/[^0-9.]/g, ''),

            card_number: $("#cardNumberInput").val(),
            expiry: $("#cardExpiryInput").val(),
            cvv: $("#cardCvvInput").val(),
            card_name: $("#cardNameInput").val()

        };

        $.ajax({

            url: savePaymentUrl,
            type: "POST",
            data: paymentData,
            dataType: "json",

            success: function (payRes) {

                console.log("Payment response", payRes);

                if (payRes && payRes.status === "success") {

                    // ✅ Payment success toast
                    createToast(
                        "Success",
                        "Payment saved successfully",
                        "",
                        new Date(),
                        1
                    );

                    // ✅ Redirect after toast
                    setTimeout(function () {
                        window.location.href = "/pocketoffice/thank-you";
                    }, 1500);

                } else {

                    createToast(
                        "Error",
                        payRes.message || "Payment failed",
                        "",
                        new Date(),
                        0
                    );

                }

            },

            error: function () {

                createToast(
                    "Server Error",
                    "Unable to process payment",
                    "",
                    new Date(),
                    0
                );

            },

            complete: function () {
                btn.prop("disabled", false).text("Confirm Payment");
            }

        });

    });


    /* ========================================
       CLOSE MODAL
    ======================================== */

    $("#closePayModalBtn").click(function () {

        $("#paymentModal").fadeOut();

    });

});