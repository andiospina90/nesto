let btn = document.querySelector(".fa-bars");
let sidebar = document.querySelector(".sidebar");
let logo = document.querySelector(".logo img");
let n = document.querySelector(".logo-text");
let logoContainer = document.querySelector(".logo-text-container");

btn.addEventListener("click", () => {
    console.log(n);
    sidebar.classList.toggle("close");
    logo.classList.toggle("hide");
    n.classList.toggle("hide");
    logoContainer.classList.toggle("hide");
});

let arrows = document.querySelectorAll(".arrow");
for (var i = 0; i < arrows.length; i++) {
    arrows[i].addEventListener("click", (e) => {
        let arrowParent = e.target.parentElement.parentElement;

        arrowParent.classList.toggle("show");
    });
}