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
        peticion.addEventListener("readystatechange", procesar2);
    }
    else if(document.attachEvent){
        solicitar.attachEvent("onreadystatechange", procesar);
        peticion.attachEvent("onreadystatechange", procesar2);
    }
    
    solicitar.open("POST","php/reservas.php");
    solicitar.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    solicitar.send("fecha="+document.getElementById("fecha").value+"&email="+document.getElementById("email").value);

    peticion.open("POST","php/registrador.php");
    peticion.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    peticion.send("fecha="+document.getElementById("fecha").value+"&turno="+document.getElementById("turno").value);
}

function procesar(){
	if(solicitar.readyState==4){
		if(solicitar.status==200){
            let respuesta= JSON.parse(solicitar.responseText);
            if(respuesta=="si")
                document.getElementById("botonmr").hidden= false
            else{
                document.getElementById("trece").textContent= "Necesita tener reserva en el día de hoy."
                document.getElementById("trece").style.backgroundColor= "#C4FF33"
                setTimeout(() => {
                    document.getElementById("trece").textContent= ""
                    document.getElementById("trece").style.backgroundColor= ""
                },3000);
            }
		}
    }
}

function procesar2(){
	if(peticion.readyState==4){
		if(peticion.status==200){
            let fila= JSON.parse(peticion.responseText);
            select_registrador= document.getElementById("registrador");
            for(let i=0; i<fila.length; i++){
                let option= document.createElement("option");
                let texto_option= document.createTextNode(fila[i]);
                option.appendChild(texto_option);
                select_registrador.appendChild(option);
            }
        }
    }
}

window.onload= iniciar;

function iniciar(){
    if(document.getElementById("email").value==document.getElementById("correoregistrador").value){
        document.getElementById("nueve").hidden= false;
        document.getElementById("botonmr").style.visibility = "hidden";
    }
    document.formulario.onsubmit= operar;
}

let solicitud;
function operar(){
    let valido= true;
    let indice=0;
    while(valido && indice<document.getElementById("registrador").length){
        if(document.getElementById("registrador").item(indice).value=="si")
            valido= false
        indice+=1;
    }
    if(!valido){
        document.getElementById("doce").textContent= "Permiso ya concedido a otro usuario."
        document.getElementById("doce").style.backgroundColor= "#C4FF33"
        setTimeout(() => {
            document.getElementById("doce").textContent= ""
            document.getElementById("doce").style.backgroundColor= ""
        },3000);
    }
    return valido;
}
