const modal = document.getElementById("quickview");
const openModalBtn = document.getElementById("openModal");
const closeModalBtn = document.getElementById("closeModal");
const closeFooterBtn = document.getElementById("closeFooter");

// Open modal
openModalBtn.addEventListener("click", () => {
    modal.style.display = "block";
});

// Close modal
closeModalBtn.addEventListener("click", () => {
    modal.style.display = "none";
});

closeFooterBtn.addEventListener("click", () => {
    modal.style.display = "none";
});

// Close modal when clicking outside of it
window.addEventListener("click", (event) => {
    if (event.target === modal) {
        modal.style.display = "none";
    }
});
