function avaliarLetra(campo){
    campo.addEventListener("keydown", function(event){
        const div = document.getElementById("mensagem");
        if(event.keyCode >= 48 && event.keyCode <= 57){
            event.preventDefault();
            div.innerHTML = "Digito invalido (apenas letras)";
        }
        else{
            div.innerHTML = "";
        }
    });
}
