$(document).ready(function () {
  $(function () {
    var validators = {
      required: function (v) {
        return $.trim(v).length > 0;
      },
      email: function (v) {
        return !v || /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v);
      },
      phone: function (v) {
        return !v || /^[\+\d\s\(\)\-]{7,20}$/.test(v);
      },
      url: function (v) {
        return !v || /^https?:\/\/.+\..+/.test(v);
      },
      username: function (v) {
        return !v || /^[a-zA-Z0-9_]+$/.test(v);
      },
      minlen: function (v, a) {
        return !v || v.length >= parseInt(a);
      },
      match: function (v, a) {
        return v === $("#" + a).val();
      },
    };

    function validate(field) {
      var $f = $(field);
      var val = $f.val();
      var rules = ($f.data("rule") || "").split("|").filter(Boolean);
      if (!rules.length) return true;

      var isValid = true;
      for (var i = 0; i < rules.length; i++) {
        var parts = rules[i].split(":");
        if (!validators[parts[0]](val, parts[1])) {
          isValid = false;
          break;
        }
      }

      var id = $f.attr("id");
      var $wrap = $f.closest(".form-group");
      $wrap
        .removeClass("has-success has-error")
        .addClass(isValid ? "has-success" : "has-error");
      $("#" + id + "-icon")
        .removeClass("glyphicon-ok glyphicon-remove")
        .addClass(isValid ? "glyphicon-ok" : "glyphicon-remove");
      var $err = $("#" + id + "-err");
      if (isValid) $err.hide();
      else $err.show();

      return isValid;
    }

    // Live re-validation only enabled after first submit attempt
    var submitted = false;
    $("[data-rule]").on("blur input change", function () {
      if (!submitted) return;
      validate(this);
      if ($(this).attr("id") === "password" && $("#passwordConfirm").val())
        validate($("#passwordConfirm")[0]);
    });

    // Password strength meter
    $("#password").on("input", function () {
      var v = $(this).val(),
        s = 0;
      if (v.length >= 8) s++;
      if (/[A-Z]/.test(v)) s++;
      if (/[0-9]/.test(v)) s++;
      if (/[^a-zA-Z0-9]/.test(v)) s++;
      var colors = ["#d9534f", "#f0ad4e", "#f0c040", "#5cb85c"];
      var widths = ["25%", "50%", "75%", "100%"];
      $("#strengthFill").css({
        width: s ? widths[s - 1] : "0",
        background: s ? colors[s - 1] : "",
      });
    });

    // Promo code
    var codes = {
      SAVE10: "10% discount applied!",
      FREE1MONTH: "First month free!",
    };
    $("#applyPromo").on("click", function () {
      var code = $("#promoCode").val().trim().toUpperCase();
      var $msg = $("#promoMsg").removeClass("hidden text-success text-danger");
      $msg
        .addClass(codes[code] ? "text-success" : "text-danger")
        .text(codes[code] ? "OK: " + codes[code] : "Invalid promo code");
    });

    function validateAll() {
      var ok = true;
      $("[data-rule]").each(function () {
        if (!validate(this)) ok = false;
      });
      if (!$("#terms").is(":checked")) {
        $("#terms-err").show();
        ok = false;
      } else {
        $("#terms-err").hide();
      }
      return ok;
    }

    // â”€â”€ Review Summary View â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€
        function getVal(id) {
      return $("#" + id).val() || "—";
    }

    function getPaymentPayload() {
      return {
        companyName: ($("#companyName").val() || "").trim(),
        industry: ($("#industry").val() || "").trim(),
        companyType: ($("#companyType").val() || "").trim(),
        address: ($("#address").val() || "").trim(),
        companyNumber: ($("#companyNumber").val() || "").trim(),
        companyEmail: ($("#companyEmail").val() || "").trim(),
        website: ($("#website").val() || "").trim(),
        contactPerson: ($("#contactPerson").val() || "").trim(),
        designation: ($("#designation").val() || "").trim(),
        phone: ($("#phone").val() || "").trim(),
        email: ($("#email").val() || "").trim(),
        username: ($("#username").val() || "").trim(),
        password: ($("#password").val() || "").trim(),
        passwordQuestion: ($("#passwordQuestion").val() || "").trim(),
        securityAnswer: ($("#securityAnswer").val() || "").trim(),
        portalLink: "https://pocketoffice.sizaf.com/"
      };
    }

    function buildReviewHTML() {
      return `
        <div id="reviewView">
          <div class="panel panel-default mb-4">
            <div class="panel-heading d-flex justify-content-between align-items-center" style="display:flex;justify-content:space-between;align-items:center;">
              <h4 style="margin:0;">Company Details</h4>
              <button class="btn btn-sm btn-outline-secondary" id="editBtn" style="font-size:12px;padding:3px 12px;border:1px solid #057A96;color:#057A96;border-radius:4px;background:transparent;cursor:pointer;">
                Edit
              </button>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-sm-6">
                  <div class="review-field">
                    <label class="review-label">Company Name*</label>
                    <div class="review-value">${getVal("companyName")}</div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="review-field">
                    <label class="review-label">Industry</label>
                    <div class="review-value">${getVal("industry") || "-"}</div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="review-field">
                    <label class="review-label">Company Type</label>
                    <div class="review-value">${getVal("companyType") || "-"}</div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="review-field">
                    <label class="review-label">Address*</label>
                    <div class="review-value">${getVal("address")}</div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="review-field">
                    <label class="review-label">Company Number</label>
                    <div class="review-value">${getVal("companyNumber") || "-"}</div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="review-field">
                    <label class="review-label">Company Email Address</label>
                    <div class="review-value">${getVal("companyEmail") || "-"}</div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="review-field">
                    <label class="review-label">Website</label>
                    <div class="review-value">${getVal("website") || "-"}</div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="panel panel-default mb-4">
            <div class="panel-heading">
              <h4> Contact Person Details</h4>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-sm-6">
                  <div class="review-field">
                    <label class="review-label">Contact Person*</label>
                    <div class="review-value">${getVal("contactPerson")}</div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="review-field">
                    <label class="review-label">Designation / Role</label>
                    <div class="review-value">${getVal("designation") || "-"}</div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="review-field">
                    <label class="review-label">Phone Number*</label>
                    <div class="review-value">${getVal("phone")}</div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="review-field">
                    <label class="review-label">Email Address*</label>
                    <div class="review-value">${getVal("email")}</div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="review-field">
                    <label class="review-label">Username*</label>
                    <div class="review-value">${getVal("username")}</div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="review-field">
                    <label class="review-label">Security Question*</label>
                    <div class="review-value">${getVal("passwordQuestion") || "-"}</div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="review-field">
                    <label class="review-label">Security Answer*</label>
                    <div class="review-value">${getVal("securityAnswer")}</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      `;
    }

    // â”€â”€ Save & Verify handler â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€
    var paymentMailSent = false;

    function switchToReviewView() {
      $("#registrationForm").hide();
      var $col = $("#registrationForm").closest(".col-md-8");

      $("#reviewView").remove();
      $col.append(buildReviewHTML());

      $("#sideSubmitBtn")
        .text("Verify and Checkout")
        .off("click")
        .on("click", handleVerifyCheckout);

      $("html,body").animate({ scrollTop: $col.offset().top - 80 }, 400);

      $(document).off("click", "#editBtn").on("click", "#editBtn", function () {
        paymentMailSent = false;
        $("#reviewView").remove();
        $("#registrationForm").show();
        $("#sideSubmitBtn")
          .text("Save & Verify")
          .off("click")
          .on("click", handleSaveVerify);
        $("html,body").animate(
          { scrollTop: $("#registrationForm").offset().top - 80 },
          400,
        );
      });
    }

    function sendPaymentCredentialsMail(payload, done) {
      var targetEmail = payload.companyEmail;
      if (!targetEmail) {
        toastr.error("Company Email Address is required.");
        return;
      }

      var $btn = $("#sideSubmitBtn");
      var originalText = $btn.text();
      $btn.prop("disabled", true).text("Sending...");

      fetch("send_payment_credentials.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify(payload)
      })
        .then(function (res) {
          return res.json().then(function (data) {
            if (!res.ok || data.result !== "success") {
              throw new Error(data.msg || "Unable to send login mail.");
            }
            return data;
          });
        })
        .then(function (data) {
          paymentMailSent = true;
          toastr.success(data.msg || "Mail sent successfully.");
          showEmailToast(targetEmail);
          if (typeof done === "function") done();
        })
        .catch(function (err) {
          toastr.error(err && err.message ? err.message : "Unable to send login mail.");
        })
        .finally(function () {
          $btn.prop("disabled", false).text(originalText);
        });
    }

    function handleSaveVerify() {
      submitted = true;
      if (validateAll()) {
        var payload = getPaymentPayload();
        sendPaymentCredentialsMail(payload, switchToReviewView);
      } else {
        var $first = $(".has-error .form-control").first();
        if ($first.length)
          $("html,body").animate({ scrollTop: $first.offset().top - 100 }, 400);
      }
    }

    // â”€â”€ Verify and Checkout handler â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€
    function handleVerifyCheckout() {
      var targetEmail = ($("#companyEmail").val() || "").trim();
      if (!paymentMailSent) {
        toastr.info("Use Save & Verify to send registration mail first.");
        return;
      }
      showEmailToast(targetEmail || "company email");
    }

    function showEmailToast(targetEmail) {
      // Remove existing toast if any
      $("#emailToast").remove();

      var $toast = $(`
        <div id="emailToast" style="
          position: fixed;
          top: 24px;
          right: 24px;
          z-index: 9999;
          background: #fff;
          border-left: 4px solid #057A96;
          border-radius: 8px;
          box-shadow: 0 8px 32px rgba(0,0,0,0.15);
          padding: 16px 22px;
          min-width: 300px;
          max-width: 380px;
          display: flex;
          align-items: flex-start;
          gap: 12px;
          animation: slideInToast 0.35s cubic-bezier(.22,.68,0,1.2) both;
        ">
          <div style="font-size:26px;line-height:1;">&#9993;</div>
          <div>
            <div style="font-weight:700;color:#057A96;font-size:15px;margin-bottom:4px;">Check your email!</div>
            <div style="color:#555;font-size:13px;line-height:1.5;">We have sent your PocketOffice login details to <strong>${targetEmail}</strong>. Please check your inbox.</div>
          </div>
          <button onclick="$('#emailToast').fadeOut(300, function(){$(this).remove();})" style="background:none;border:none;cursor:pointer;color:#aaa;font-size:18px;line-height:1;margin-left:auto;padding:0 0 0 8px;">&times;</button>
        </div>
      `);

      // Add animation keyframes if not present
      if (!document.getElementById("toastStyle")) {
        $(
          "<style id='toastStyle'>@keyframes slideInToast { from { opacity:0; transform:translateX(60px);} to { opacity:1; transform:translateX(0);} }</style>",
        ).appendTo("head");
      }

      $("body").append($toast);

      // Auto-dismiss after 6 seconds
      setTimeout(function () {
        $toast.fadeOut(400, function () {
          $(this).remove();
        });
      }, 6000);
    }

    // â”€â”€ Form submit (main button inside form) â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€
    $("#registrationForm").on("submit", function (e) {
      e.preventDefault();
      handleSaveVerify();
    });

    // â”€â”€ Sidebar button initial binding â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€
    $("#sideSubmitBtn").on("click", handleSaveVerify);

    $("#terms").on("change", function () {
      if (!submitted) return;
      if ($(this).is(":checked")) $("#terms-err").hide();
      else $("#terms-err").show();
    });
  });
});



