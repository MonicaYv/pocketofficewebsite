(function () {
  function ensureToastrLoaded() {
    if (window.toastr) return Promise.resolve();

    return new Promise(function (resolve, reject) {
      var existingScript = document.querySelector('script[data-toastr-dynamic="1"]');
      if (existingScript) {
        existingScript.addEventListener("load", function () { resolve(); });
        existingScript.addEventListener("error", function () { reject(new Error("Toastr load failed")); });
        return;
      }

      if (!document.querySelector('link[data-toastr-dynamic="1"]')) {
        var link = document.createElement("link");
        link.rel = "stylesheet";
        link.href = "https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css";
        link.setAttribute("data-toastr-dynamic", "1");
        document.head.appendChild(link);
      }

      var script = document.createElement("script");
      script.src = "https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js";
      script.setAttribute("data-toastr-dynamic", "1");
      script.onload = function () { resolve(); };
      script.onerror = function () { reject(new Error("Toastr load failed")); };
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
        grid
          .querySelectorAll(".form-check-input:not(.select-all):not(:disabled)")
          .forEach(function (cb) {
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
          grid.querySelectorAll(".form-check-input:not(.select-all):not(:disabled)")
        );
        var allChecked = items.length > 0 && items.every(function (cb) { return cb.checked; });
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
$('#serviceForm').on('submit', function(e) {
    e.preventDefault();
    let formData = new FormData(this);

    $.ajax({
        url: enquiryUrl,
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(res) {
            toastr.success(res.message || "Enquiry submitted successfully");
            $('#serviceForm')[0].reset();
            $('#sales-enquiry-overlay').hide();
        },
        error: function(err) {
            toastr.error("Something went wrong. Please try again.");
        }

    });

});
