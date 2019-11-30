function openNav() {
    document.getElementById("sideNavigation").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
    document.getElementById("sideNavigation").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
}

function Validar() {

    var FormatoCorreo = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    //var Usuario = document.getElementById("User");
    var Contra = document.getElementById("Contra");
    var Contra2 = document.getElementById("Contra2");
    var Correo = document.getElementById("email");
    var Nombre = document.getElementById("Nombre");
    var Apellidos = document.getElementById("Apellidos");
    //var Dir = document.getElementById("Direccion");
    //var Fecha = document.getElementById("FechaNac");
    var cont = 0;
    //if(Usuario.value == "")
    //    alert("Por favor, capture el usuario");
    //else
    if (Contra.value == "") {
        alert("Capture su contraseña");

        return false;
    } else {
        if (Contra.value != Contra2.value) {
            alert("Las contraseñas no coinciden");
            return false;
        } else {
            if (Nombre.value == "") {
                alert("Por favor, ingrese su nombre");
                return false;
            } else {
                if (Nombre.value == "") {
                    alert("Por favor, ingrese su nombre");
                    return false;
                } else {
                    if (Correo.value.match(FormatoCorreo))
                        return true;
                    else {
                        alert("Correo inválido");
                        return false;
                    }
                }
            }
        }
    }
}