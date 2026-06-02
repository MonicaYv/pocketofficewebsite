function setTab(tabName) {
  const container = document.getElementById("tabs");
  const tabs = container?.querySelectorAll(".tab") || [];
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

  if (container) {
    container.classList.remove("active-user", "active-admin", "active-master");
    container.classList.add(tabClasses[tabName] || "active-user");
  }

  if (selectedTab) {
    selectedTab.value = tabName;
  }
}

function togglePwd(btn) {
  const input = document.getElementById("pwd");
  const icon = btn.querySelector("i");

  if (!input || !icon) {
    return;
  }

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

document.addEventListener("DOMContentLoaded", function () {
  const selectedTab = document.getElementById("selected_tab");
  setTab((selectedTab && selectedTab.value) ? selectedTab.value : "user");
});
