const {
    functionsIn
} = require("lodash");

function validar_cat() {
    txtdescripcion = document.getElementById("descripcion").value;
    if (txtdescripcion.length == 0 || /^\s+$/.test(txtdescripcion)) {
        alert('¡Ingrese descripción!');
        return false;
    } else if (txtdescripcion.length > 30) {
        alert('¡Máximo de caracteres: 30!');
        return false;
    }

    return true;
}

function validar_prod() {
    descripcion = document.getElementById("descripcion").value;
    precio = document.getElementById("precio").value;
    cantidad = document.getElementById("cantidad").value;
    if (descripcion.length == 0 || /^\s+$/.test(descripcion)) {
        alert('¡Ingrese descripción!');
        return false;
    } else if (precio.length == 0 || /^\s+$/.test(precio)) {
        alert('¡Ingrese precio!');
        return false;
    } else if (cantidad.length == 0 || /^\s+$/.test(cantidad)) {
        alert('¡Ingrese cantidad!');
        return false;
    } else if (descripcion.length > 30) {
        alert('¡Máximo de caracteres: 30!');
        return false;
    }

    return true;
}

function validar_cliente() {
    ruc_dni = document.getElementById("ruc_dni").value;
    nombres = document.getElementById("nombres").value;
    email = document.getElementById("email").value;
    direccion = document.getElementById("direccion").value;
    if (ruc_dni.length == 0 || /^\s+$/.test(ruc_dni)) {
        alert('¡Ingrese Ruc/Dni!');
        return false;
    } else if (nombres.length == 0 || /^\s+$/.test(nombres)) {
        alert('¡Ingrese Nombres/Razón!');
        return false;
    } else if (email.length == 0 || /^\s+$/.test(email)) {
        alert('¡Ingrese Email!');
        return false;
    } else if (direccion.length == 0 || /^\s+$/.test(direccion)) {
        alert('¡Ingrese Dirección!');
        return false;
    }

    return true;
}
