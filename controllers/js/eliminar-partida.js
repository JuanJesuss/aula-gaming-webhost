if (document.addEventListener)
	window.addEventListener("load",inicio)
else if (document.attachEvent)
	window.attachEvent("onload",inicio);

function inicio(){	
    let selectAlias= document.getElementById("alias");
    if (document.addEventListener)
        selectAlias.addEventListener("change",proceso)
    else if (document.attachEvent)
        selectAlias.attachEvent("onchange",proceso)
}

let peticion;
function proceso(){
    let selectJuego= document.getElementById("juego");
    let todosOption= selectJuego.getElementsByTagName("option");
    for(let i=(todosOption.length-1); i>0; i--){
            todosOption.item(i).remove();
    }
    if (window.XMLHttpRequest)
        peticion=new XMLHttpRequest()
    else if (window.ActiveXObject)
        peticion=new ActiveXObject("Microsoft.XMLHTTP");

    if (document.addEventListener)
        peticion.addEventListener("readystatechange", proceso2)
    else if (document.attachEvent)
        peticion.attachEvent("onreadystatechange", proceso2);

        peticion.open("POST","php/juegos-alias.php");
        peticion.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        peticion.send("ali="+document.getElementById("alias").value);
}

function proceso2(){
	if (peticion.readyState==4){
		if (peticion.status==200){
            let juegos= JSON.parse(peticion.responseText);
            let selectJuego= document.getElementById("juego");
            for(let i=0; i<juegos.length; i++){
                let option= document.createElement("option");
                let textoOption= document.createTextNode(juegos[i]);
                option.appendChild(textoOption);
                selectJuego.appendChild(option);
            }
		}
    }
}