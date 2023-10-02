// Datos de ejemplo de películas (puedes obtener estos datos de una API o base de datos)
let peliculas = [
    { id: 1, titulo: "Película 1", genero: "Acción", duracion: "120 minutos" },
    { id: 2, titulo: "Película 2", genero: "Comedia", duracion: "95 minutos" },
    { id: 3, titulo: "Película 3", genero: "Drama", duracion: "110 minutos" },
    // Agrega más películas aquí
];

// Función para mostrar las películas en la página
function mostrarPeliculas() {
    const peliculasContainer = document.getElementById("peliculas");
    peliculasContainer.innerHTML = ""; // Limpia el contenido existente

    peliculas.forEach((pelicula) => {
        const peliculaDiv = document.createElement("div");
        peliculaDiv.className = "pelicula";
        peliculaDiv.innerHTML = `<h2>${pelicula.titulo}</h2>
                                 <p>Género: ${pelicula.genero}</p>
                                 <p>Duración: ${pelicula.duracion}</p>
                                 <button onclick="editarPelicula(${pelicula.id})">Editar</button>`;
        peliculasContainer.appendChild(peliculaDiv);
    });
}

// Función para abrir el formulario de edición
function editarPelicula(id) {
    const pelicula = peliculas.find((p) => p.id === id);

    const formulario = `
        <h2>Editar Película</h2>
        <form onsubmit="guardarEdicion(${id}); return false;">
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" value="${pelicula.titulo}" required>
            <label for="genero">Género:</label>
            <input type="text" id="genero" value="${pelicula.genero}" required>
            <label for="duracion">Duración:</label>
            <input type="text" id="duracion" value="${pelicula.duracion}" required>
            <button type="submit">Guardar</button>
        </form>
    `;

    const formularioContainer = document.getElementById("formulario");
    formularioContainer.innerHTML = formulario;
}

// Función para guardar los cambios en la película
function guardarEdicion(id) {
    const titulo = document.getElementById("titulo").value;
    const genero = document.getElementById("genero").value;
    const duracion = document.getElementById("duracion").value;

    peliculas = peliculas.map((p) => {
        if (p.id === id) {
            return { ...p, titulo, genero, duracion };
        } else {
            return p;
        }
    });

    mostrarPeliculas();
    // Limpia el formulario
    const formularioContainer = document.getElementById("formulario");
    formularioContainer.innerHTML = "";
}
// Función para mostrar el formulario de edición de películas
function mostrarFormulario() {
    const formularioContainer = document.getElementById("formulario-container");
    formularioContainer.style.display = "block";
    const formulario = document.getElementById("formulario");
    formulario.innerHTML = `
        <h2>Agregar Película</h2>
        <form onsubmit="agregarPelicula(); return false;">
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" required>
            <label for="genero">Género:</label>
            <input type="text" id="genero" required>
            <label for="duracion">Duración:</label>
            <input type="text" id="duracion" required>
            <button type="submit">Guardar</button>
        </form>
    `;
}

// Función para agregar una nueva película a la cartelera
function agregarPelicula() {
    const titulo = document.getElementById("titulo").value;
    const genero = document.getElementById("genero").value;
    const duracion = document.getElementById("duracion").value;

    // Crea un objeto de película con los datos ingresados
    const nuevaPelicula = {
        titulo,
        genero,
        duracion,
    };

    // Agrega la nueva película al arreglo de películas
    peliculas.push(nuevaPelicula);

    // Oculta el formulario de edición
    const formularioContainer = document.getElementById("formulario-container");
    formularioContainer.style.display = "none";

    // Limpia los campos del formulario
    document.getElementById("titulo").value = "";
    document.getElementById("genero").value = "";
    document.getElementById("duracion").value = "";

    // Vuelve a mostrar la lista actualizada de películas
    mostrarPeliculas();
    
    function borrarPelicula(id) {
        // Preguntar al usuario si está seguro de borrar la película
        if (confirm("¿Estás seguro de que deseas borrar esta película?")) {
            // Enviar una solicitud para borrar la película en el servidor (puedes usar AJAX)
            // En este ejemplo, simplemente redireccionamos la página después de la confirmación
            window.location.href = 'borrar_pelicula.php?id=' + id;
        }
    }

}
// Llama a la función para mostrar las películas cuando la página se carga
window.onload = mostrarPeliculas;