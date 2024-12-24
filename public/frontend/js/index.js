const allHoverImages = document.querySelectorAll(".hover-container div img");
const imgContainer = document.querySelector(".img-container");

window.addEventListener("DOMContentLoaded", () => {
    allHoverImages[0].parentElement.classList.add("active");
});

allHoverImages.forEach((image) => {
    image.addEventListener("mouseover", () => {
        imgContainer.querySelector("img").src = image.src;
        resetActiveImg();
        image.parentElement.classList.add("active");
    });
});

function resetActiveImg() {
    allHoverImages.forEach((img) => {
        img.parentElement.classList.remove("active");
    });
}
// tabsider Voucher
let openVoucher = document.querySelector(".buttonMore");
let closeVoucher = document.querySelector(".iconClose");
let body = document.querySelector("body");

openVoucher.addEventListener("click", () => {
    body.classList.add("active");
});
closeVoucher.addEventListener("click", () => {
    body.classList.remove("active");
});
// tablesider tableSize
let openTableSize = document.querySelector(".buttonTableSize");
let closeTableSize = document.querySelector(".iconCloseTableSize");
let body1 = document.querySelector("body");
openTableSize.addEventListener("click", () => {
    body1.classList.add("activeTableSize");
});
closeTableSize.addEventListener("click", () => {
    body1.classList.remove("activeTableSize");
});
// tabsider Fovorite
window.addEventListener("load", () => {
    const loader = document.querySelector(".preloader");
    loader.classList.add("preloader-hidden");
    loader.addEventListener("transitioned", () => {
        document.body.removeChild("preloader");
    });
});
