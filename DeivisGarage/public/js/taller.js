function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

async function drop(ev) {
    ev.preventDefault();
    ev.dataTransfer.getData("text").draggable = true;

    console.log(ev.target)

    //console.log(ev.currentTarget.innerHTML);

    /*if (!ev.currentTarget.innerHTML) {*/
    var data = ev.dataTransfer.getData("text");
    ev.target.appendChild(document.getElementById(data));

    let options = {
        method: "PUT",
        headers: {"Content-type": "application/json; charset=utf-8"},
    };
    let respuesta = await axios(`http://localhost/DeivisGarage/public/api/apicar/${data}`, options);
    let json = await respuesta.data;

    location.reload();

    /*} else {
        console.log("hola");
        ev.dataTransfer.getData("text").draggable = false;
    }*/
}


/*
Desplegar el formulario de registro de un nuevo cliente
 */
var btnRegistroCliente = document.getElementById('btnNuevoCliente');

if (btnRegistroCliente != null) {
    btnRegistroCliente.addEventListener('click', function () {
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
}



//Mostrar la imagen cargada en el input-text del registro de coches
var inputImagen = document.getElementById("fotoCocheInput");
var imgCoche = document.getElementById("imgCoche");

if (inputImagen != null) {
    inputImagen.addEventListener("change", function () {
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
}

//Controlar cuando se ha escrito un coste de avería para poder imprimir la factura
var inputCosteAveria = document.getElementById('costeAveria');

if (inputCosteAveria != null) {
    var btnImprimir = document.getElementById('imprimir');

    inputCosteAveria.addEventListener('change', function () {
        btnImprimir.removeAttribute('disabled');
        inputCosteAveria.setAttribute('disabled', 'true');
    });

    if (inputCosteAveria.getAttribute('disabled') == 'true') {
        btnImprimir.removeAttribute('disabled');
        console.log('hola')
    }
}

//Imprimir la factura
async function imprimir(costeAveria) {
    //Actualización del coste de avería del coche
    var id = document.getElementById('idCoche').innerText;

    let options = {
        method: "PUT",
        headers: {"Content-type": "application/json; charset=utf-8"},
    };
    let respuesta = await axios(`http://localhost/DeivisGarage/public/api/apicar/${id}/${costeAveria}`, options);
    let json = await respuesta.data;

    //Plantillas de impresión
    var newstr = document.getElementById("impresion"); //Plantilla completa
    var template = document.getElementById("plantillaImpresion"); //Cabecera de la plantilla
    var template2 = document.getElementById("plantillaImpresion2"); //Firma del mecánico
    var template3 = document.getElementById("plantillaImpresion3"); //Coste de reparación

    //A la plantilla del coste hay que añadirle el precio que se haya establecido
    template3.childNodes[1].childNodes[1].childNodes[1].innerText = `Coste de reparación: ${costeAveria}€`;

    var oldstr = document.body.innerHTML; //Guardar en una variable el body inicial
    //Establecer como cuerpo del documento la plantilla más el div de contenido a imprimir
    document.body.innerHTML = template.innerHTML + newstr.innerHTML + template3.innerHTML + template2.innerHTML;
    window.print(); //Abrir el modal de impresión con el cuerpo establecido
    document.body.innerHTML = oldstr; //Es importante devolver el body como estaba
    history.go(); //Por cuestión de funcionalidad, mandar al mismo sitio y recargar
    //return false;
}
