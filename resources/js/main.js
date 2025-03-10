// // NAVBAR
// let navbar = document.querySelector("#navbar");
// let dropdown = document.querySelector("#dropdown-menu");
// let dropdownUser = document.querySelector("#dropdown-user");
// let dropdownLanguage = document.querySelector("#dropdown-language");

// window.addEventListener("scroll", () => {
//     if (window.scrollY > 0) {
//         navbar.classList.add("nav-scrolled");
//         dropdown.classList.add("nav-scrolled");
//         dropdownUser.classList.add("nav-scrolled");
//         dropdownLanguage.classList.add("nav-scrolled");
//     } else {
//         navbar.classList.remove("nav-scrolled");
//         dropdown.classList.remove("nav-scrolled");
//         dropdownUser.classList.remove("nav-scrolled");
//         dropdownLanguage.classList.remove("nav-scrolled");
//     }
// });

// NAVBAR
let navbar = document.querySelector("#navbar");
let dropdown = document.querySelector("#dropdown-menu");
let dropdownUser = document.querySelector("#dropdown-user");
let dropdownLanguage = document.querySelector("#dropdown-language");

window.addEventListener("scroll", () => {
    if (window.scrollY > 0) {
        navbar.classList.add("nav-scrolled");
        dropdown.classList.add("nav-scrolled");
        if (dropdownUser) dropdownUser.classList.add("nav-scrolled");
        if (dropdownLanguage) dropdownLanguage.classList.add("nav-scrolled");
    } else {
        navbar.classList.remove("nav-scrolled");
        dropdown.classList.remove("nav-scrolled");
        if (dropdownUser) dropdownUser.classList.remove("nav-scrolled");
        if (dropdownLanguage) dropdownLanguage.classList.remove("nav-scrolled");
    }
});

// ANNULLA STICKY all'apertura modale
document.addEventListener("DOMContentLoaded", function () {
    let modal = document.getElementById("rejectModal");
    let textRevisor = document.querySelector(".text-revisor");

    modal.addEventListener("show.bs.modal", function () {
        if (textRevisor) {
            textRevisor.style.position = "static"; // Disabilita sticky
        }
    });

    modal.addEventListener("hidden.bs.modal", function () {
        if (textRevisor) {
            textRevisor.style.position = "sticky"; // Riattiva sticky
        }
    });
});
