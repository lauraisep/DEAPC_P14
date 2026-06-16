function validarFormulario(event) {
    let campoNome = document.getElementById("username");
    let campoSenha = document.getElementById("password");
    let mensagemErro = document.getElementById("mensagem-erro");
    let valido = true;

    mensagemErro.innerHTML = "";

    if (campoNome.value.trim() === "") {
        campoNome.style.borderColor = "red";
        campoNome.style.backgroundColor = "#ffe6e6";
        valido = false;
    } else {
        campoNome.style.borderColor = "";
        campoNome.style.backgroundColor = "";
    }

    if (campoSenha.value.trim() === "") {
        campoSenha.style.borderColor = "red";
        campoSenha.style.backgroundColor = "#ffe6e6";
        mensagemErro.innerHTML = "O campo Palavra-passe é obrigatório!";
        valido = false;
    } 
    else if (campoSenha.value.length < 4) {
        campoSenha.style.borderColor = "orange";
        campoSenha.style.backgroundColor = "#fff2e6";
        mensagemErro.innerHTML = "Aviso: A palavra-passe deve ter pelo menos 4 caracteres.";
        valido = false;
    } 
    else {
        campoSenha.style.borderColor = "";
        campoSenha.style.backgroundColor = "";
    }

    if (valido === false) {
        event.preventDefault();
    }
}

document.addEventListener("DOMContentLoaded", function() {
    let formulario = document.getElementById("meuFormularioID");
    if (formulario) {
        formulario.addEventListener("submit", validarFormulario);
    }

    let botao = document.getElementById("btn-sobre");
    let texto = document.getElementById("info-grupo");
    if (botao && texto) {
        botao.addEventListener("click", function() {
            texto.hidden = !texto.hidden;
        });
    }
});