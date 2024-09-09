function validarFormulario() {
    //Obtém o formulário e os campos
    const formulario = document.getElementById("meuFormulario");
    const campos = formulario.querySelectorAll('input[type="text"]');
    //Loop para percorrer todos os campos do formulário
    for(let campo of campos){
        const valor = campo.value.trim();
        //Verifica se o campo está vazio
        if(valor === ''){
            alert("O campo "+campo.name +" não podem ser vazios");
            campo.focus();
            return false;
        }

        //Verifica se os campos tem números
        const contemNumero = /\d/.test(valor);
        if(contemNumero){
            alert("O campo "+ campo.name +" não podem ter números");
            campo.focus();
            return false;
        }
    }
}
