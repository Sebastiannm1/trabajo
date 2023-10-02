// Datos de ejemplo de peliculas (puedes obtener estos datos de una API o base de datos)
const peliculas = [
    { titulo: "Pelicula 1", genero: "Accion", duracion: "120 minutos" },
    { titulo: "Pelicula 2", genero: "Comedia", duracion: "95 minutos" },
    { titulo: "Pelicula 3", genero: "Drama", duracion: "110 minutos" },
    // Agrega mas peliculas aqui
];

// Funcion para mostrar las peliculas en la pagina
function mostrarPeliculas() {
    const peliculasContainer = document.getElementById("peliculas");

    peliculas.forEach((pelicula) => {
        const peliculaDiv = document.createElement("div");
        peliculaDiv.className = "pelicula";
        peliculaDiv.innerHTML = `<h2>${pelicula.titulo}</h2>
                                 <p>Genero: ${pelicula.genero}</p>
                                 <p>Duracion: ${pelicula.duracion}</p>`;
        peliculasContainer.appendChild(peliculaDiv);
    });
}

// Llama a la funcion para mostrar las peliculas cuando la pagina se carga
window.onload = mostrarPeliculas;