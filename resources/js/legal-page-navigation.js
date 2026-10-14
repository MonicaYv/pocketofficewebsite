document.addEventListener("DOMContentLoaded", function () {
    const navLinks = document.querySelectorAll(".terms-container .sidebar a");

    if (navLinks.length > 0) {
        navLinks[0].classList.add("active");
    }

    navLinks.forEach((link) => {
        link.addEventListener("click", function (event) {
            event.preventDefault();
            event.stopImmediatePropagation();

            navLinks.forEach((navLink) => navLink.classList.remove("active"));
            this.classList.add("active");

            const targetId = this.getAttribute("href").substring(1);
            const targetSection = document.getElementById(targetId);
            if (!targetSection) return;

            const offset =
                targetSection.getBoundingClientRect().top + window.pageYOffset - 110;

            window.scrollTo({ top: offset, behavior: "smooth" });
        });
    });
});
