/* ============================================
   DESKTOP MEGA MENU & SIMPLE DROPDOWN — Click Logic
============================================ */
const navItems = document.querySelectorAll(".nav-item");

navItems.forEach(item => {
    const toggleLink = item.querySelector("a.nav-link");
    const dropdownMenu = item.querySelector(".mega-menu, .simple-dropdown");

    if (toggleLink && dropdownMenu) {
        // Toggle on click
        toggleLink.addEventListener("click", (e) => {
            // Only prevent default if it has sub-menus (we set href="javascript:void(0)")
            if(toggleLink.getAttribute("href") === "javascript:void(0)") {
                e.preventDefault();
                e.stopPropagation();
            } else {
                return; // Let normal links work
            }
            
            // Close other open menus
            document.querySelectorAll(".mega-menu, .simple-dropdown").forEach(menu => {
                if(menu !== dropdownMenu) {
                    menu.style.opacity = "0";
                    menu.style.transform = "translateY(10px)";
                    setTimeout(() => (menu.style.display = "none"), 200);
                }
            });

            // Toggle current menu
            if (dropdownMenu.style.display === "block") {
                dropdownMenu.style.opacity = "0";
                dropdownMenu.style.transform = "translateY(10px)";
                setTimeout(() => (dropdownMenu.style.display = "none"), 200);
            } else {
                dropdownMenu.style.display = "block";
                setTimeout(() => {
                    dropdownMenu.style.opacity = "1";
                    dropdownMenu.style.transform = "translateY(0px)";
                }, 10);
            }
        });
    }
});

// Close when clicking outside
document.addEventListener("click", (e) => {
    if (!e.target.closest(".nav-item")) {
        document.querySelectorAll(".mega-menu, .simple-dropdown").forEach(menu => {
            if (menu.style.display === "block") {
                menu.style.opacity = "0";
                menu.style.transform = "translateY(10px)";
                setTimeout(() => (menu.style.display = "none"), 200);
            }
        });
    }
});

/* ============================================
   MOBILE DRAWER — Toggle System
============================================ */
const mobileMenu = document.getElementById("mobileMenu");
const mobileOverlay = document.getElementById("mobileMenuOverlay");
const mobileToggleBtn = document.getElementById("mobileToggleBtn");

window.closeMobileMenu = function () {
    if (mobileMenu) mobileMenu.classList.remove("open");
    if (mobileOverlay) mobileOverlay.classList.remove("show");
};

// CLICK to toggle drawer
if (mobileToggleBtn) {
    mobileToggleBtn.addEventListener("click", () => {
        mobileMenu.classList.add("open");
        mobileOverlay.classList.add("show");
    });
}

// CLICK overlay to close
if (mobileOverlay) {
    mobileOverlay.addEventListener("click", () => {
        window.closeMobileMenu();
    });
}

// ESC KEY SUPPORT
document.addEventListener("keydown", function (e) {
    if (e.key === "Escape") {
        window.closeMobileMenu();
    }
});
