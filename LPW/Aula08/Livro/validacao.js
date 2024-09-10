function validarFormulario(){
    
    var titulo = document.querySelector('#titulo');
    var genero = document.querySelector('#genero');
    var qtdPagina = document.querySelector('#qtdPagina');
    var span = document.querySelector('#msg');


    if(titulo.value.trim() == ''){
        span.innerHTML = "Informe o título JS";
        return false;
    }else if(genero.value.trim() == ''){
        span.innerHTML = "Informe o gênero JS";
        return false;
    }else if(qtdPagina.value.trim() == ''){
        span.innerHTML = "Informe o número de páginas JS";
        return false;
    }
    return true;
}
