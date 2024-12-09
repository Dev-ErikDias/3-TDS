function verificaUsr(elemento) {
    let url = 'usuario.php?nome=' + encodeURIComponent(elemento.value);
    let xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            try {
                let response = xhr.responseText;
                let label = document.getElementById("ico");
                let campo = document.getElementById("usuario");
                if (response> 0 || campo.value == '') {
                    label.innerHTML = "<i class='fa-solid fa-circle-xmark' style='color: #a13030;'></i>";
                    campo.value = '';
                    campo.focus();
                } else {
                    label.innerHTML = "<i class='fa-solid fa-circle-check' style='color: #269c28;'></i>";
                    label.style.color = "green";
                }
            } catch (e) {
                console.error("Erro ao processar a resposta:", e);
            }
        }
    };
    xhr.send();
}
