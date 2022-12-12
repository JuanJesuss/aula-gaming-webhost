if (document.addEventListener)
	window.addEventListener("load",inicio)
else if (document.attachEvent)
	window.attachEvent("onload",inicio);

let solicitar;
let peticion;
function inicio(){
    if(document.getElementById("diez")!=null){
        setTimeout(() => {
            document.getElementById("diez").style.display= "none";
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
    peticion.open("GET","php/obtener-codigos-rec.php");
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
            select_codigos= document.getElementById("codigos");
            for(let i=0; i<fila.length; i++){
                let option= document.createElement("option");
                let texto_option= document.createTextNode(fila[i]);
                option.appendChild(texto_option);
                select_codigos.appendChild(option);
            }
		}
    }
}

window.onload= iniciar;

function iniciar(){
    document.formulario.email.onfocus= mostrarBordes;
    document.formulario.codigo.onfocus= mostrarBordes;
    document.formulario.contra.onfocus= mostrarBordes;
    document.formulario.email.onblur= quitarBordes;
    document.formulario.codigo.onblur= quitarBordes;
    document.formulario.contra.onblur= quitarBordes;
    document.formulario.validar.onclick= validar;
    document.formulario.mostrar.onclick= operar;
    document.formulario.onsubmit= comprobar;
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
        document.formulario.contra.type= "text"
    else
        document.formulario.contra.type= "password"
}

function validar(){
    let valido= true;
    if(!validar_email())
        valido= false
    if(!validar_codigo())
        valido= false
    if(valido){
        document.getElementById("caja").hidden= true;
        document.getElementById("caja2").hidden= false;
        setTimeout(() => {
            document.getElementById("ocho").style.display= "none";
        },3000);
    }
}

function validar_email(){
    let dato= document.formulario.email.value;
    let validar= true;
    if(dato==""){
        document.formulario.erremail.value= "Introduzca correo.";
        validar= false;
    }
    else{
        let otros= "@._-";
        let indice= 0;
        while(validar && indice<dato.length){
            if(dato.charAt(indice)<"a" || dato.charAt(indice)>"z")
                if(dato.charAt(indice)<"0" || dato.charAt(indice)>"9")
                    if(!otros.includes(dato.charAt(indice)))
                        validar= false
            indice+=1;
        }
        if(!validar){
            document.formulario.erremail.value= "El correo solo debe tener letras (en minusculas y sin tílde), números y @._-";
        }
        else{
            let select_emails= document.getElementById("emails");
            let emails= Array();
            for(let i=0; i<select_emails.length; i++){
                emails.push(select_emails.item(i).value);
            }
            if(emails.indexOf(dato)==-1){
                document.formulario.erremail.value= "Correo no registrado.";
                validar= false;
            }
            else
                document.formulario.erremail.value= ""
        }
    }
    return validar;
}

function validar_codigo(){
    let dato2= document.formulario.codigo.value;
    let validar= true;
    if(dato2==""){
        document.formulario.errcodigo.value= "Introduzca código.";
        validar= false;
    }
    else{
        document.formulario.errcodigo.value= "";
        let dato= document.formulario.email.value;
        if(dato!=""){
            let otros= "@._-";
            let indice= 0;
            while(validar && indice<dato.length){
                if(dato.charAt(indice)<"a" || dato.charAt(indice)>"z")
                    if(dato.charAt(indice)<"0" || dato.charAt(indice)>"9")
                        if(!otros.includes(dato.charAt(indice)))
                            validar= false
                indice+=1;
            }
            if(validar){
                let select_emails= document.getElementById("emails");
                let emails= Array();
                for(let i=0; i<select_emails.length; i++){
                    emails.push(select_emails.item(i).value);
                }
                if(emails.indexOf(dato)!=-1){
                    let posicion= emails.indexOf(dato);
                    if(dato2!=document.getElementById("codigos").item(posicion).value){
                        document.formulario.errcodigo.value= "Código incorrecto.";
                        validar= false;    
                    }
                }
            }
        }
    }
    return validar;
}

function comprobar(){
    let valido= true;
    if(!validar_contrasena())
        valido= false
    return valido;
}

function validar_contrasena(){
    //Debe tener entre 8 y 12 caracteres y tener al menos 1 mayúscula, 1 minúscula, 1 número y 1 caracter especial ($%?!).
    let dato= document.formulario.contra.value.toLowerCase();
    let validar= true;
    if(dato==""){
        document.formulario.errcontra.value= "Introduzca contraseña.";
        validar= false;
    }
    else{
        if(dato.length<8 || dato.length>12){
            document.formulario.errcontra.value= "La contraseña debe tener entre 8 y 12 caracteres.";
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
                document.formulario.errcontra.value= "La contraseña solo puede tener letras sin tíldes, números y caracteres especiales ($%?!)";
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
                for(let i=0; i<document.formulario.contra.value.length; i++){
                    if(mayusculas.includes(document.formulario.contra.value.charAt(i)))
                        contMayus++;
                    else if(minusculas.includes(document.formulario.contra.value.charAt(i)))
                        contMinus++;
                    else if(otros.includes(document.formulario.contra.value.charAt(i)))
                        contEspeciales++;
                    else if(numeros.includes(document.formulario.contra.value.charAt(i)))
                        contNumeros++;
                }
                if(contMinus==0 || contMayus==0 || contEspeciales==0 || contNumeros==0){
                    document.formulario.errcontra.value= "La contraseña debe tener al menos 1 mayúscula, 1 minúscula, 1 número y 1 caracter especial ($%?!)";
                    validar= false;
                }
            }
        }
    }
    return validar;
}
