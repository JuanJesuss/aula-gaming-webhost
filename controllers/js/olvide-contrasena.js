if (document.addEventListener)
	window.addEventListener("load",inicio)
else if (document.attachEvent)
	window.attachEvent("onload",inicio);

let solicitar;
function inicio(){
    if(document.getElementById("siete")!=null){
        setTimeout(() => {
            document.getElementById("siete").style.display= "none";
        },4000);
    }

    if(window.XMLHttpRequest)
        solicitar=new XMLHttpRequest()
    else if(window.ActiveXObject)
        solicitar=new ActiveXObject("Microsoft.XMLHTTP")

    if(document.addEventListener)
        solicitar.addEventListener("readystatechange", procesar)
    else if(document.attachEvent)
        solicitar.attachEvent("onreadystatechange", procesar)

    solicitar.open("GET","php/obtener-correos.php");
    solicitar.send(null);
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

window.onload= iniciar;

function iniciar(){
    document.formulario.email.onfocus= mostrarBordes;
    document.formulario.email.onblur= quitarBordes;
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

function validar(){
    let valido= true;
    if(!validar_email())
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
            document.formulario.erremail.value= "El correo solo debe tener letras (en minusculas y sin t??lde), n??meros y @._-";
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
        }
    }
    return validar;
}
