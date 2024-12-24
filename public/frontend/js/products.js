document.addEventListener("DOMContentLoaded", function () {
    const mainImage = document.querySelector(".image-box__src");
    const thumbnailButtons = document.querySelectorAll(".thumb-item__btn");

    thumbnailButtons.forEach((button) => {
        button.addEventListener("click", function () {
            // Lấy thẻ img trong nút thumbnail được click
            const thumbnailImage = button.querySelector("img");

            // Cập nhật src của ảnh chính
            mainImage.src = thumbnailImage.src;

            // Cập nhật aria-expanded cho ảnh chính
            mainImage.setAttribute("aria-expanded", "true");
        });
    });
});
document.querySelectorAll(".productInforTitle").forEach((title) => {
    title.addEventListener("click", function () {
        const card = this.closest(".productInforCard");
        card.classList.toggle("active");
    });
});
function changeQuantity(amount) {
    const input = document.getElementById("input");
    let newValue = parseInt(input.value) + amount;
    if (newValue < 0) newValue = 0; // Prevent negative values
    input.value = newValue;
}
