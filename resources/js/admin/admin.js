
// admin dashboard 

const mobileSidebar = document.getElementById("mobile-sidebar");
const openSidebarBtn = document.getElementById("open-sidebar");
const closeSidebarBtn = document.getElementById("close-sidebar");

openSidebarBtn.addEventListener("click", () => {
    mobileSidebar.classList.remove("-translate-x-full");
});

closeSidebarBtn.addEventListener("click", () => {
    mobileSidebar.classList.add("-translate-x-full");
});

// Close when clicking outside
document.addEventListener("click", (e) => {
    if (
        !mobileSidebar.contains(e.target) &&
        !openSidebarBtn.contains(e.target)
    ) {
        mobileSidebar.classList.add("-translate-x-full");
    }
});
