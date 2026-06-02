function setTab(tabName) {
  const container = document.getElementById("tabs");
  const tabs = container.querySelectorAll(".tab");
  const selectedTab = document.getElementById("selected_tab");
  const tabClasses = {
    user: "active-user",
    company: "active-admin",
    partner: "active-master",
  };

  tabs.forEach((tab) => tab.classList.remove("active"));
  tabs.forEach((tab) => {
    if (tab.dataset.tab === tabName) {
      tab.classList.add("active");
    }
  });

  // Reset all role classes
  container.classList.remove("active-user", "active-admin", "active-master");
  container.classList.add(tabClasses[tabName] || "active-user");

  if (selectedTab) {
    selectedTab.value = tabName;
  }
}

function togglePwd(btn) {
  const input = document.getElementById("pwd");
  const icon = btn.querySelector("i");

  if (input.type === "password") {
    input.type = "text";
    icon.classList.remove("fa-eye");
    icon.classList.add("fa-eye-slash");
  } else {
    input.type = "password";
    icon.classList.remove("fa-eye-slash");
    icon.classList.add("fa-eye");
  }
}

$(".forgot-password-section").hide();

$(".forgot").on("click", function () {
  $(".login-section").hide();
  $(".forgot-password-section").show();
});

$(".back-to-login").on("click", function () {
  $(".login-section").show();
  $(".forgot-password-section").hide();
});

// Toastr options
toastr.options = {
  closeButton: true,
  progressBar: true,
  positionClass: "toast-top-right",
  timeOut: "4000",
};

$(document).ready(function () {
  $(".submit-btn").on("click", function () {
    const email = $("input[type='email']").val().trim();

    if (email === "") {
      toastr.error("Please enter your email address.");
    } else if (!isValidEmail(email)) {
      toastr.warning("Please enter a valid email address.");
    } else {
      toastr.success("A password reset link has been sent to your email address");
      $("input[type='email']").val("");
      setTimeout(() => {
        $(".login-section").show();
        $(".forgot-password-section").hide();
      }, 4000);
    }
  });
});

function isValidEmail(email) {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(email);
}

document.addEventListener("DOMContentLoaded", function () {
  const selectedTab = document.getElementById("selected_tab");
  setTab((selectedTab && selectedTab.value) ? selectedTab.value : "user");
});
