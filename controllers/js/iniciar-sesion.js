if (document.addEventListener)
	window.addEventListener("load",inicio)
else if (document.attachEvent)
	window.attachEvent("onload",inicio);

let solicitar;
let peticion;
function inicio(){
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
    peticion.open("GET","php/obtener-passwords.php");
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
            select_passwords= document.getElementById("passwords");
            for(let i=0; i<fila.length; i++){
                let option= document.createElement("option");
                let texto_option= document.createTextNode(fila[i]);
                option.appendChild(texto_option);
                select_passwords.appendChild(option);
            }
		}
    }
}

window.onload= iniciar;

function iniciar(){
    document.formulario.email.onfocus= mostrarBordes;
    document.formulario.password.onfocus= mostrarBordes;
    document.formulario.email.onblur= quitarBordes;
    document.formulario.password.onblur= quitarBordes;
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

function validar(){
    let valido= true;
    if(!validar_email())
        valido= false
    if(!validar_password())
        valido= false
    return valido;
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

function validar_password(){
    let dato2= document.formulario.password.value;
    let validar= true;
    if(dato2==""){
        document.formulario.errpassword.value= "Introduzca contraseña.";
        validar= false;
    }
    else{
        document.formulario.errpassword.value= "";
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
                    if(md5(dato2)!=document.getElementById("passwords").item(posicion).value){
                        document.formulario.errpassword.value= "Contraseña incorrecta.";
                        validar= false;    
                    }
                }
            }
        }
    }
    return validar;
}

