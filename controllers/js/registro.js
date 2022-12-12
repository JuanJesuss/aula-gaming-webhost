window.onload= iniciar;

function iniciar(){
    document.formulario.email.onfocus= mostrarBordes;
    document.formulario.password.onfocus= mostrarBordes;
    document.formulario.alias.onfocus= mostrarBordes;
    document.formulario.nombre.onfocus= mostrarBordes;
    document.formulario.apellidos.onfocus= mostrarBordes;
    document.formulario.email.onblur= quitarBordes;
    document.formulario.password.onblur= quitarBordes;
    document.formulario.alias.onblur= quitarBordes;
    document.formulario.nombre.onblur= quitarBordes;
    document.formulario.apellidos.onblur= quitarBordes;
    document.formulario.mostrar.onclick= operar;
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
        document.formulario.password.type= "text"
    else
        document.formulario.password.type= "password"
}

if (document.addEventListener)
	window.addEventListener("load",inicio)
else if (document.attachEvent)
	window.attachEvent("onload",inicio);

let solicitar;
let peticion;
function inicio(){
    if(document.getElementById("trece")!=null){
        setTimeout(() => {
            document.getElementById("trece").style.display= "none";
        },3000);
    }

    if(window.XMLHttpRequest){
        solicitar=new XMLHttpRequest();
        peticion=new XMLHttpRequest();
    }
    else if(window.ActiveXObject){
        solicitar=new ActiveXObject("Microsoft.XMLHTTP");
        peticion=new ActiveXObject("Microsoft.XMLHTTP");
    }
    if(document.addEventListener){
        solicitar.addEventListener("readystatechange", procesar);
        peticion.addEventListener("readystatechange", proceso);
    }
    else if(document.attachEvent){
        solicitar.attachEvent("onreadystatechange", procesar);
        peticion.attachEvent("onreadystatechange", proceso);
    }
    solicitar.open("GET","php/obtener-correos.php");
    solicitar.send(null);
    peticion.open("GET","php/obtener-todos-alias.php");
    peticion.send(null);
}

function procesar(){
	if(solicitar.readyState==4){
		if(solicitar.status==200){
            let fila= JSON.parse(solicitar.responseText);
            select_emails= document.getElementById("emails");
            for(let i=0; i<fila.length; i++){
                let option= document.createElement("option");
                let texto_option= document.createTextNode(fila[i]);
                option.appendChild(texto_option);
                select_emails.appendChild(option);
            }
		}
    }
}

function proceso(){
	if(peticion.readyState==4){
		if(peticion.status==200){
            let fila= JSON.parse(peticion.responseText);
            select_todos_alias= document.getElementById("todosalias");
            for(let i=0; i<fila.length; i++){
                let option= document.createElement("option");
                let texto_option= document.createTextNode(fila[i]);
                option.appendChild(texto_option);
                select_todos_alias.appendChild(option);
            }
		}
    }
}

function validar_email(){
    //Debe ser un correo de gmail o outlook y tener entre 13 y 60 caracteres
    let dato= document.getElementById("email").value;
    let valido= true;
    if(dato==""){
        document.getElementById("erremail").value= "Introduzca correo.";
        valido= false;
    }
    else{
        if(dato.length<13 || dato.length>60){
            document.getElementById("erremail").value= "El correo debe tener entre 13 y 60 caracteres.";
            valido= false;
        }
        else{
            let otros= "@._-";
            let indice= 0;
            while(valido && indice<dato.length){
                if(dato.charAt(indice)<"a" || dato.charAt(indice)>"z")
                    if(dato.charAt(indice)<"0" || dato.charAt(indice)>"9")
                        if(!otros.includes(dato.charAt(indice)))
                            valido= false
                indice+=1;
            }
            if(!valido){
                document.getElementById("erremail").value= "El correo solo debe tener letras (en minusculas y sin tílde), números y @._-";
            }
            else{
                if(dato.indexOf("@")==-1){
                    document.getElementById("erremail").value= "Introduzca un correo válido.";
                    valido= false;
                }
                else{
                    dominios= Array("@gmail.com", "@outlook.com", "@outlook.es");
                    if(!dominios.includes(dato.substring(dato.indexOf("@")))){
                        document.getElementById("erremail").value= "Correo incorrecto.";
                        valido= false;
                    }
                    else{
                        let emails= document.getElementById("emails");
                        indice= 0;
                        while(valido && indice<emails.length){
                            if(dato==emails.item(indice).value)
                                valido= false
                            indice+=1;
                        }
                        if(!valido)
                            document.getElementById("erremail").value= "El correo introducido ya ha sido registrado."
                        else
                            document.getElementById("erremail").value= ""
                    }
                }
            }    
        }
    }
    return valido;
}

function validar_password(){
    //Debe tener entre 8 y 12 caracteres y tener al menos 1 mayúscula, 1 minúscula, 1 número y 1 caracter especial ($%?!).
    let dato= document.getElementById("password").value.toLowerCase();
    let validar= true;
    if(dato==""){
        document.getElementById("errpassword").value= "Introduzca contraseña.";
        validar= false;
    }
    else{
        if(dato.length<8 || dato.length>12){
            document.getElementById("errpassword").value= "La contraseña debe tener entre 8 y 12 caracteres.";
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
                document.getElementById("errpassword").value= "La contraseña solo puede tener letras sin tíldes, números y caracteres especiales($%?!).";
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
                for(let i=0; i<document.getElementById("password").value.length; i++){
                    if(mayusculas.includes(document.getElementById("password").value.charAt(i)))
                        contMayus++;
                    else if(minusculas.includes(document.getElementById("password").value.charAt(i)))
                        contMinus++;
                    else if(otros.includes(document.getElementById("password").value.charAt(i)))
                        contEspeciales++;
                    else if(numeros.includes(document.getElementById("password").value.charAt(i)))
                        contNumeros++;
                }
                if(contMinus==0 || contMayus==0 || contEspeciales==0 || contNumeros==0){
                    document.getElementById("errpassword").value= "La contraseña debe tener al menos 1 mayúscula, 1 minúscula, 1 número y 1 caracter especial.";
                    validar= false;
                }
                else
                    document.getElementById("errpassword").value=""
            }
        }
    }
    return validar;
}

function validar_alias(){
    //Debe tener entre 4 y 20 caracteres, los cuales pueden ser letras (en minúsculas y sin tíldes), números y .-_
    let dato= document.getElementById("alias").value;
    let validar= true;
    if(dato==""){
        document.getElementById("erralias").value= "Introduzca alias.";
        validar= false;
    }
    else{
        if(dato.length<4 || dato.length>20){
            document.getElementById("erralias").value= "El alias debe tener entre 4 y 20 caracteres.";
            validar= false;
        }
        else{
            let otros= ".-_";
            let indice= 0;
            while(validar && indice<dato.length){
                if(dato.charAt(indice)<"a" || dato.charAt(indice)>"z")
                    if(dato.charAt(indice)<"0" || dato.charAt(indice)>"9")
                        if(!otros.includes(dato.charAt(indice)))
                            validar= false
                indice+=1;
            }
            if(!validar)
                document.getElementById("erralias").value= "Solo puede tener letras (en minúsculas y sin tíldes), números y .-_"
            else{
                let todos_alias= document.getElementById("todosalias");
                indice= 0;
                while(validar && indice<todos_alias.length){
                    if(dato==todos_alias.item(indice).value)
                        validar= false
                    indice+=1;
                }
                if(!validar)
                    document.getElementById("erralias").value= "El alias introducido ya ha sido registrado."
                else
                    document.getElementById("erralias").value= ""
            }
        }
    }
    return validar;
}

function validar_turno(){
    let dato = document.getElementById("turno").value;
    let valido= true;
    if(dato==""){
        valido= false;
        document.getElementById("errturno").value= "Seleccione turno."
    }
    else
        document.getElementById("errturno").value= ""
    return valido;
}

function validar_nombre(){
    //Debe tener entre 3 y 50 caracteres, los cuales deben ser letras y espacios.
    let dato= document.getElementById("nombre").value.toLowerCase().trim();
    let validar= true;
    if(dato==""){
        document.getElementById("errnombre").value= "Introduzca nombre.";
        validar= false;
    }
    else{
        if(dato.length<3 || dato.length>50){
            document.getElementById("errnombre").value= "Debe tener entre 3 y 50 caracteres.";
            validar= false;
        }
        else{
            let valido= true;
            let indice= 0;
            let otros= "áéíóúüñ ";
            while(valido && indice<dato.length){
                if(dato.charAt(indice)<"a" || dato.charAt(indice)>"z")
                    if(!otros.includes(dato.charAt(indice)))
                        valido= false
                indice+=1;
            }
            if(!valido){
                document.getElementById("errnombre").value= "Solo debe tener letras y espacios.";
                validar= false;
            }
            else
                document.getElementById("errnombre").value= "";
        }
    }
    return validar;
}

function validar_apellidos(){
    //Debe tener entre 3 y 50 caracteres, los cuales deben ser letras y espacios.
    let dato= document.getElementById("apellidos").value.toLowerCase().trim();
    let validar= true;
    if(dato==""){
        document.getElementById("errapellidos").value= "Introduzca apellidos.";
        validar= false;
    }
    else{
        if(dato.length<3 || dato.length>50){
            document.getElementById("errapellidos").value= "Debe tener entre 3 y 50 caracteres.";
            validar= false;
        }
        else{
            let valido= true;
            let indice= 0;
            let otros= "áéíóúüñ ";
            while(valido && indice<dato.length){
                if(dato.charAt(indice)<"a" || dato.charAt(indice)>"z")
                    if(!otros.includes(dato.charAt(indice)))
                        valido= false
                indice+=1;
            }
            if(!valido){
                document.getElementById("errapellidos").value= "Solo debe tener letras y espacios.";
                validar= false;
            }
            else
                document.getElementById("errapellidos").value= "";
        }
    }
    return validar;
}

function validar(){
	let valido= true;
	if(!validar_email())
        valido=false
	if(!validar_password())
		valido= false
    if(!validar_alias())
        valido= false
    if(!validar_turno())
        valido= false
    if(!validar_nombre())
        valido= false
    if(!validar_apellidos())
        valido= false
    return valido;
}

