function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    ev.dataTransfer.getData("text").draggable = true;

    console.log(ev.currentTarget.innerHTML);

    if (!ev.currentTarget.innerHTML) {
        var data = ev.dataTransfer.getData("text");
        ev.target.appendChild(document.getElementById(data));
    } else {
        console.log("hola");
        ev.dataTransfer.getData("text").draggable = false;
    }
}


/*
Desplegar el formulario de registro de un nuevo cliente
 */
var btnRegistroCliente = document.getElementById('btnNuevoCliente');

btnRegistroCliente.addEventListener('click', function(){
    var btnAnnadirCoche = document.querySelector("#btnAnnadirCoche");
    var btnNuevoCliente = document.querySelector("#btnNuevoCliente");
    var formNewClient = document.getElementById("formNewClient");

    var classList = formNewClient.classList;

    classList.forEach(element => {
        if (element == "d-none") {
            formNewClient.classList.remove("d-none");
            formNewClient.classList.add("d-block");
            btnAnnadirCoche.classList.add("disabled");
            btnNuevoCliente.setAttribute("value", "Cancelar");

        } else if (element == "d-block") {
            formNewClient.classList.remove("d-block");
            formNewClient.classList.add("d-none");
            btnAnnadirCoche.classList.remove("disabled");
            btnNuevoCliente.setAttribute("value", "¿Nuevo cliente?");
        }
    });
});


//Mostrar la imagen cargada en el input-text del registro de coches
var inputImagen = document.getElementById("fotoCocheInput");
var imgCoche = document.getElementById("imgCoche");

inputImagen.addEventListener("change", function (){
    // Los archivos seleccionados, pueden ser muchos o uno
    const archivos = inputImagen.files;
    // Si no hay archivos salimos de la función y quitamos la imagen
    if (!archivos || !archivos.length) {
        imgCoche.src = "";
        return;
    }
    // Ahora tomamos el primer archivo, el cual vamos a previsualizar
    const primerArchivo = archivos[0];
    // Lo convertimos a un objeto de tipo objectURL
    const objectURL = URL.createObjectURL(primerArchivo);
    // Y a la fuente de la imagen le ponemos el objectURL
    imgCoche.src = objectURL;
});