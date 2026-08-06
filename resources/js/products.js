
/* ===============================
     TEAM TYPE
  =============================== */
$(".features-tabs .nav-link").click(function (e) {
  e.preventDefault();

  var tabId = ($(this).data("tab") || "").toString().trim();

  // If there's no matching pane, do nothing.
  if (!tabId || $("#" + tabId + ".features-tab-pane").length === 0) return;

  $(".features-tabs .nav-link").removeClass("active");
  $(".features-tab-pane").removeClass("active fade-in");

  $(this).addClass("active");
  $("#" + tabId).addClass("active fade-in");

  window.history.pushState(null, null, "?tab=" + tabId);
});

/* ===============================
     CORE FEATURES
  =============================== */
$(".core-features-tab").click(function () {
  var tabId = $(this).data("tab");

  $(".core-features-tab").removeClass("active");
  $(".core-features-panel").removeClass("active");

  $(this).addClass("active");
  $("#" + tabId).addClass("active");

  window.history.pushState(null, null, "?tab=" + tabId);
});

/* ===============================
     COLLABORATION SECTION ONLY
  =============================== */
$(".collaboration-tabs-wrapper .collaboration-tab").click(function () {
  var tabId = $(this).data("tab");
  var section = $(this).closest(".collaboration-section");

  section.find(".collaboration-tab").removeClass("active");
  section.find(".collaboration-panel").removeClass("active");

  $(this).addClass("active");
  section
    .find('.collaboration-panel[data-panel="' + tabId + '"]')
    .addClass("active");

  window.history.pushState(null, null, "?tab=" + tabId);
});

/* ===============================
     SECURITY SECTION ONLY
  =============================== */
$(".security-tabs-wrapper .collaboration-tab").click(function () {
  var tabId = $(this).data("tab");
  var section = $(this).closest(".security-section");

  section.find(".collaboration-tab").removeClass("active");
  section.find(".collaboration-panel").removeClass("active");

  $(this).addClass("active");
  section
    .find('.collaboration-panel[data-panel="' + tabId + '"]')
    .addClass("active");

  window.history.pushState(null, null, "?tab=" + tabId);
});

/* ===============================
     LOAD FROM URL (?tab=)
  =============================== */
const urlParams = new URLSearchParams(window.location.search);
const tab = urlParams.get("tab");

if (tab) {
  if ($("#" + tab + ".features-tab-pane").length) {
    $('.features-tabs .nav-link[data-tab="' + tab + '"]').click();
  }

  if ($("#" + tab + ".core-features-panel").length) {
    $('.core-features-tab[data-tab="' + tab + '"]').click();
  }

  if (
    $(".collaboration-section .collaboration-panel[data-panel='" + tab + "']")
      .length
  ) {
    $(
      ".collaboration-section .collaboration-tab[data-tab='" + tab + "']",
    ).click();
  }

  if (
    $(".security-section .collaboration-panel[data-panel='" + tab + "']").length
  ) {
    $(".security-section .collaboration-tab[data-tab='" + tab + "']").click();
  }
}

$(".integration-tab").click(function () {
  var tabId = $(this).data("tab");

  // remove active
  $(".integration-tab").removeClass("active");
  $(".integration-panel").removeClass("active");

  // activate clicked
  $(this).addClass("active");
  $("#" + tabId).addClass("active");

  // update URL
  window.history.pushState(null, null, "?tab=" + tabId);
});

/* ===============================
     LOAD FROM URL (?tab=)
  =============================== */
const urlParamsIntegration = new URLSearchParams(window.location.search);
const tabIntegration = urlParams.get("tab");

if (tabIntegration && $("#" + tabIntegration + ".integration-panel").length) {
  $('.integration-tab[data-tab="' + tabIntegration + '"]').click();
}
