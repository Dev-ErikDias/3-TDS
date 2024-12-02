function buscaCidade(elemento){
    let url = 'Cidade.php?id='+elemento.value;
    let xhr = new XMLHttpRequest();
    xhr.open("GET", url, true);
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4){
            if(xhr.status == 200)
                document.getElementById("cidades").innerHTML = xhr.responseText
        }
    }
    xhr.send();
}
