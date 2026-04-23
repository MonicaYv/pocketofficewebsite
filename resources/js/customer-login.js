function setTab(index) {
    const container = document.getElementById("tabs");
    const tabs = container.querySelectorAll(".tab");

    tabs.forEach((tab) => tab.classList.remove("active"));
    tabs[index].classList.add("active");

    if (index === 1) {
        container.classList.add("active-admin");
    } else {
        container.classList.remove("active-admin");
    }
}

function handleLogin() {
    const email = document
        .querySelector('input[placeholder="Email or phone number"]')
        .value.trim();
    const password = document.getElementById("pwd").value.trim();
    const container = document.getElementById("tabs");
    const btn = document.querySelector(".btn-signin");

    // Validation
    if (!email || !password) {
        btn.innerText = "Fill all fields!";
        btn.style.backgroundColor = "red";
        return;
    }
    btn.innerText = "Sign in";
    btn.style.backgroundColor = "";

    // Check if this is docs login page (it doesn't have the "Back to Home" button)
    const isDocsPage = !document.querySelector('.btn-google');
    
    if (isDocsPage) {
        // Docs login page redirect
        window.location.href = "https://documentation.pocketoffice.sizaf.com/user/login";
    } else {
        // Customer login page redirect
        window.open("https://documentation.officelescloud.sizaf.com:5050/books", "_blank");
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
