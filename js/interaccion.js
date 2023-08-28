'use strict';

const contactoHeader = document.querySelector('.contacto_header');
const header = document.querySelector("header");
const titulo = document.querySelector(".titulo_SS");
const showNavBar = document.querySelector(".button_show_navbar");
const navbar = document.querySelector(".nav_bar");
const col = document.querySelectorAll(".col");
const li = document.querySelectorAll(".nav_bar li");
const img = document.querySelectorAll(".img");
const containerShadow_form = document.querySelector(".container_background_shadow");
// const btnOpenFormHeader = document.querySelector(".open_contact_form_header");
const btnOpenFormDown = document.querySelector(".open_contact_form_down");
const btncloseForm = document.querySelector(".close_form_contact_us");

showNavBar.addEventListener("click", () => {
    if (!navbar.style.display) {
        navbar.style.display="flex";
    }else{
        navbar.removeAttribute("style");
    }
});

window.addEventListener("scroll", () => {
    if (window.innerWidth > 576) {
        if (window.scrollY > 50) {
            titulo.style.display = "none";
            col.item(1).classList.add("col-2");
            col.item(2).classList.add("col-2");
            navbar.classList.add("col-8");
            navbar.style.borderLeft = "1px solid #010d52";
        } else {
            titulo.style.display = "flex";
            col.item(1).classList.remove("col-2");
            col.item(2).classList.remove("col-2");
            navbar.classList.remove("col-8");
        }
    }
});

// //Open the form contact us by button header
// btnOpenFormHeader.addEventListener("click", () => {
//     containerShadow_form.style.display = "flex";
// });
//Open the form contact us by button down
btnOpenFormDown.addEventListener("click", () => {
    containerShadow_form.style.display = "flex";
});

//Close the form contact us
btncloseForm.addEventListener("click", () => {
    containerShadow_form.style.display = "none";
});