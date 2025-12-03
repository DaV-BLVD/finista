import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

document.addEventListener("DOMContentLoaded", () => {
    const mobileBtn = document.getElementById("mobile-menu-btn");
    const mobileMenu = document.getElementById("mobile-menu");
    const desktopLinks = document.querySelectorAll("#desktop-menu .nav-link");
    const mobileLinks = document.querySelectorAll(
        "#mobile-menu .mobile-nav-link"
    );
    const logo = document.getElementById("logo");

    // MOBILE MENU TOGGLE
    mobileBtn.addEventListener("click", () => {
        mobileMenu.classList.toggle("hidden");
    });

    // NAVIGATION FUNCTION
    function navigateTo(pageId) {
        // Hide all page sections
        document
            .querySelectorAll(".page-section")
            .forEach((sec) => sec.classList.remove("active"));

        // Show target section
        const target = document.getElementById(pageId);
        if (target) target.classList.add("active");

        // Highlight desktop links
        desktopLinks.forEach((link) =>
            link.classList.remove("active-nav-link")
        );
        desktopLinks.forEach((link) => {
            if (link.dataset.page === pageId)
                link.classList.add("active-nav-link");
        });

        // Highlight mobile links
        mobileLinks.forEach((link) => link.classList.remove("active-nav-link"));
        mobileLinks.forEach((link) => {
            if (link.dataset.page === pageId)
                link.classList.add("active-nav-link");
        });

        // Close mobile menu on small screens
        if (
            window.innerWidth < 768 &&
            !mobileMenu.classList.contains("hidden")
        ) {
            mobileMenu.classList.add("hidden");
        }

        // Scroll to top
        window.scrollTo({ top: 0, behavior: "smooth" });
    }

    // ATTACH CLICK EVENTS
    desktopLinks.forEach((link) =>
        link.addEventListener("click", () => navigateTo(link.dataset.page))
    );
    mobileLinks.forEach((link) =>
        link.addEventListener("click", () => navigateTo(link.dataset.page))
    );
    logo.addEventListener("click", () => navigateTo("home"));

    // EXPOSE GLOBALLY
    window.navigateTo = navigateTo;

    // INITIALIZE DEFAULT PAGE
    navigateTo("home");
});
