if (document.addEventListener)
	window.addEventListener("load",inicio)
else if (document.attachEvent)
	window.attachEvent("onload",inicio);

let solicitar;
function inicio(){

    if(document.getElementById("doce")!=null){
        setTimeout(() => {
            document.getElementById("doce").style.display= "none";
        },3000);
    }

    if(window.XMLHttpRequest)
        solicitar=new XMLHttpRequest()
    else if(window.ActiveXObject)
        solicitar=new ActiveXObject("Microsoft.XMLHTTP")

    if(document.addEventListener)
        solicitar.addEventListener("readystatechange", procesar)
    else if(document.attachEvent)
        solicitar.attachEvent("onreadystatechange", procesar)

    solicitar.open("POST","php/obtener-password.php");
    solicitar.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    solicitar.send("correo="+document.getElementById("correoactual").value);
}

function procesar(){
	if(solicitar.readyState==4){
		if(solicitar.status==200){
            let fila= JSON.parse(solicitar.responseText);
            let option= document.createElement("option");
            let texto_option= document.createTextNode(fila);
            option.appendChild(texto_option);
            document.getElementById("contrasenaactual").appendChild(option);
		}
    }
}

window.onload= iniciar;

function iniciar(){
    document.formulario.email.onfocus= mostrarBordes;
    document.formulario.contrasena.onfocus= mostrarBordes;
    document.formulario.nuevacontrasena.onfocus= mostrarBordes;
    document.formulario.email.onblur= quitarBordes;
    document.formulario.contrasena.onblur= quitarBordes;
    document.formulario.nuevacontrasena.onblur= quitarBordes;
    document.formulario.mostrar.onclick= operar;
    document.formulario.mostrar2.onclick= operar2;
    document.formulario.onsubmit= validar;
}

function mostrarBordes(evento){
    let miEvento= evento || window.event;
	miEvento.target.style.border= "1px solid #3774F7";
	miEvento.target.style.borderRadius= "1px";
}

function quitarBordes(evento){
    let miEvento= evento || window.event;
	miEvento.target.style.border= "";
	miEvento.target.style.borderRadius= "";
}

function operar(){
    if(document.formulario.mostrar.checked)
        document.formulario.contrasena.type= "text"
    else
        document.formulario.contrasena.type= "password"
}

function operar2(){
    if(document.formulario.mostrar2.checked)
        document.formulario.nuevacontrasena.type= "text"
    else
        document.formulario.nuevacontrasena.type= "password"
}

function validar(){
    let valido= true;
    if(!validar_email())
        valido= false
    if(!comprobar_contrasena_actual())
        valido= false
    if(!validar_nueva_contrasena())
        valido= false
    return valido;
}

function validar_email(){
    let dato= document.formulario.email.value;
    let valido= true
    if(dato==""){
        document.formulario.erremail.value= "Introduzca su correo."
        valido= false;
    }
    else{
        if(dato!=document.formulario.correoactual.value){
            document.formulario.erremail.value= "Correo incorrecto.";
            valido= false;
        }
        else
            document.formulario.erremail.value= ""
    }
    return valido;
}

function comprobar_contrasena_actual(){
    let dato = document.formulario.contrasena.value;
    let valido= true;
    if(dato==""){
        document.formulario.errcontrasena.value= "Introduzca contraseña."
        valido= false;
    }
    else{
        if(md5(dato)!= document.formulario.contrasenaactual.value){
            document.formulario.errcontrasena.value= "Contraseña actual incorrecta."
            valido= false;
        }
        else
            document.formulario.errcontrasena.value= ""
    }
    return valido;
}

function validar_nueva_contrasena(){
    //Debe tener entre 8 y 12 caracteres y tener al menos 1 mayúscula, 1 minúscula, 1 número y 1 caracter especial ($%?!).
    let dato= document.formulario.nuevacontrasena.value.toLowerCase();
    let validar= true;
    if(dato==""){
        document.formulario.errnuevacontrasena.value="Introduzca su nueva contraseña.";
        validar= false;
    }
    else{
        if(dato.length<8 || dato.length>12){
            document.formulario.errnuevacontrasena.value="La contraseña debe tener entre 8 y 12 caracteres.";
            validar= false;
        }
        else{
            let indice=0;
            let valido= true;
            let otros= "$%?!";
            while(valido && indice<dato.length){
                if(dato.charAt(indice)<"a" || dato.charAt(indice)>"z")
                    if(dato.charAt(indice)<"0" || dato.charAt(indice)>"9")
                        if(!otros.includes(dato.charAt(indice)))
                            valido= false
                indice+=1;
            }
            if(!valido){
                document.formulario.errnuevacontrasena.value="La contraseña solo puede tener letras sin tíldes, números y caracteres especiales($%?!).";
                validar= false;
            }
            else{
                let mayusculas= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                let minusculas= "abcdefghijklmnopqrstuvwxyz";
                let numeros= "0123456789";
                let contMayus= 0;
                let contMinus= 0;
                let contEspeciales= 0;
                let contNumeros= 0;
                for(let i=0; i<document.formulario.nuevacontrasena.value.length; i++){
                    if(mayusculas.includes(document.formulario.nuevacontrasena.value.charAt(i)))
                        contMayus++;
                    else if(minusculas.includes(document.formulario.nuevacontrasena.value.charAt(i)))
                        contMinus++;
                    else if(otros.includes(document.formulario.nuevacontrasena.value.charAt(i)))
                        contEspeciales++;
                    else if(numeros.includes(document.formulario.nuevacontrasena.value.charAt(i)))
                        contNumeros++;
                }
                if(contMinus==0 || contMayus==0 || contEspeciales==0 || contNumeros==0){
                    document.formulario.errnuevacontrasena.value="La contraseña debe tener al menos 1 mayúscula, 1 minúscula, 1 número y 1 caracter especial.";
                    validar= false;
                }
                else
                document.formulario.errnuevacontrasena.value=""
            }
        }
    }
    return validar;
}
