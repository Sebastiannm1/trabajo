var slider_content = document.getElementById('banners');

var image =  ["tortugas", "venecia", "oppenheimer", "hablame", "barbie"];

var i = image.length;

function nextImage() {
    if (i < image.length) {
        i = i + 1;
        if (i == image.length) {
            i = 0;
        }
    } else {
        i = 0;
    }
    slider_content.innerHTML = "<img src=img/banners/" + image[i] + ".png>";
}

function beforeImage() {
    if (i < image.length + 1 && i > 1) {
        i = i - 1;
    } else {
        i = image.length;
    }
    slider_content.innerHTML = "<img src=img/banners/" + image[i - 1] + ".png>";
}

// Función para mostrar el desplegable de cerrar sesión
function mostrarCerrarSesionDropdown() {
    var dropdown = document.getElementById("cerrar-sesion-dropdown-content");
    dropdown.style.display = "block";
}

function ocultarCerrarSesionDropdown() {
    var dropdown = document.getElementById("cerrar-sesion-dropdown-content");
    dropdown.style.display = "none";
}

// Cerrar el desplegable cuando se hace clic fuera de él
window.onclick = function (event) {
    var dropdown = document.getElementById("cerrar-sesion-dropdown-content");
    if (!event.target.matches('.icono-boton') && dropdown.style.display === "block") {
        dropdown.style.display = "none";
    }
}