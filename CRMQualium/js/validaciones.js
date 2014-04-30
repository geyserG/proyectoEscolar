// function validarNumeroControl(id){
//     var NumeroControl = document.getElementById(id).value;
// //------------------------ 
// //--------------------------------

//     if(NumeroControl==null || NumeroControl.length== 0 || /^\s+$/.test(NumeroControl)){
//         alert("El campo no contiene datos, es necesario llenarlo");
//         document.getElementById(id).focus();
//         return false;
//     }
    
//     if(!(/^[EC]\d{8}$/.test(NumeroControl))){
//         alert("Escriba el Numero de Control con la letra E o C, seguida de 8 digitos ");
//         document.getElementById(id).value="";
//         document.getElementById(id).focus();
//         return false;
//     }else
//     {
//         return true;
//     }
        
// }


function validarTelefono(class){
    if(!(/^\d{10}$/.test(valor))) {
        document.getElementById(class).value="";
        document.getElementById(class).focus();
        alert('Escriba un número correcto');
        return false;
    }
    return true;
}

function validarCorreo () {
    if( !(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(     )) ) {
      alert('No es un correo valido!');
    }
}

function validarNumero (elemento) {
    if( isNaN($(this.$telefono.val().trim())) ) {
      alert('No es un numero valido');
    }
}

function validarDireccion(elEvento){
    var evento = elEvento || window.event;
    var codigoCaracter= evento.charCode || evento.keyCode;
    var caracteres="qwertyuiopasdfghjklñzxcvbnmáéíóúQWERTYUIOPASDFGHJKLÑZXCVBNMÁÉÍÓÚ0123456789.-/*¡!¿?'°,;:() ";
    var teclas_especiales=[8, 37, 39, 46];
    var caracter= String.fromCharCode(codigoCaracter);
    var tecla_especial=false;
    for( i in teclas_especiales){
        if(codigoCaracter == teclas_especiales[i]){
            tecla_especial = true;
            break;
        }
    }
    
    if(caracteres.indexOf(caracter) != -1 || tecla_especial){
        return true;
    }
    else{
        alert("Solo están permitidos estos simbolos -/*¡!¿?'°,;:()");
        return false;
    }
}

function mensajes(id){
    var elemento = document.getElementById(id);
    if(elemento != null){
    elemento.style.display="block";
    setTimeout(ocultar_msg,7000,id);
    }
}//fin de function
function ocultar_msg(id){
    var elemento = document.getElementById(id);
    if(elemento != null)
    elemento.style.display="none";
}

function confirmLink(msg){
    var result = confirm(msg);
    return result;
}
