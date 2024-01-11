// function ver mas
const toggleDetails = () => {
    const detalles = document.getElementById("detalles");
    const btnToggle = document.getElementById("toggleBtn");
    const iconoOculto = document.getElementById("iconoOculto");

    btnToggle.innerText = detalles.open ? "VER MÁS" : "VER MENOS";
    iconoOculto.style.display = detalles.open ? "none" : "block";
};


// clase active del menu
document.addEventListener("DOMContentLoaded", () => {
  const elementosMenu = document.querySelectorAll(".navbar-nav .nav-link");
  const logo = document.querySelector(".navbar-brand");
  logo.addEventListener("click", () => {
      elementosMenu.forEach(elemento => elemento.classList.remove("active"));
});

elementosMenu.forEach(elemento => {
    elemento.addEventListener("click", () => {
        elementosMenu.forEach(otroElemento => otroElemento.classList.remove("active"));
        elemento.classList.add("active");
        });
    });
});

