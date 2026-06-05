/**
 * EXERCÍCIO 1 - ALÍNEA B (Simplificado)
 * Função de Validação do Formulário
 */
function validarFormulario(event) {
    // 1. Procurar os elementos do formulário no HTML pelos seus IDs
    let campoNome = document.getElementById("nome");
    let campoIdade = document.getElementById("idade");
    let mensagemErro = document.getElementById("mensagem-erro");

    // Criamos uma variável para controlar se está tudo correto
    let valido = true;

    // -------------------------------------------------------------------------
    // i. DETEÇÃO DE CAMPOS OBRIGATÓRIOS NÃO PREENCHIDOS (Alínea b.i)
    // -------------------------------------------------------------------------
    if (campoNome.value.trim() === "") {
        campoNome.style.borderColor = "red";       // Bordo vermelho se estiver vazio
        campoNome.style.backgroundColor = "#ffe6e6"; // Fundo rosa claro
        valido = false;                             // Bloqueia o formulário
    } else {
        campoNome.style.borderColor = "";           // Repõe o estilo original se estiver preenchido
        campoNome.style.backgroundColor = "";
    }

    // -------------------------------------------------------------------------
    // ii. DETEÇÃO DE VALORES INVÁLIDOS COM MENSAGEM DE AJUDA (Alínea b.ii)
    // -------------------------------------------------------------------------
    if (campoIdade.value.trim() === "") {
        // Se a idade estiver vazia (campo obrigatório)
        campoIdade.style.borderColor = "red";
        campoIdade.style.backgroundColor = "#ffe6e6";
        mensagemErro.innerHTML = "O campo Idade é obrigatório!";
        valido = false;
    } 
    else if (isNaN(campoIdade.value) || campoIdade.value <= 0) {
        // Se o que o utilizador digitou NÃO for um número (isNaN) ou for menor/igual a zero
        campoIdade.style.borderColor = "orange";      // Bordo laranja para aviso de formato incorreto
        campoIdade.style.backgroundColor = "#fff2e6";  // Fundo laranja claro
        
        // Escreve a mensagem de ajuda no ecrã para o utilizador saber o que fazer
        mensagemErro.innerHTML = "Aviso: Introduza uma idade válida (apenas números maiores que 0).";
        valido = false;
    } 
    else {
        // Se estiver tudo correto com a idade
        campoIdade.style.borderColor = "";
        campoIdade.style.backgroundColor = "";
        mensagemErro.innerHTML = ""; // Limpa a mensagem de erro
    }

    // Se alguma validação falhou (valido == false), cancela o envio do formulário
    if (valido === false) {
        event.preventDefault(); // Impede a página de recarregar e enviar dados errados
    }
}

// Associar a função de validação ao evento de submissão do formulário assim que a página carregar
document.addEventListener("DOMContentLoaded", function() {
    let formulario = document.getElementById("meuFormularioID");
    if (formulario) {
        formulario.addEventListener("submit", validarFormulario);
    }
});
