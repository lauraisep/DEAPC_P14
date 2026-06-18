// Declaração da função principal de validação que recebe o evento de submissão do formulário por parâmetro
function validarFormulario(event) {
    // document representa a página HTML, getElementById permite selecionar um elemento pelo seu ID (neste caso "username")
    let campoNome = document.getElementById("username");
    // Procura na página e guarda numa variável o elemento input correspondente ao campo de palavra-passe
    let campoSenha = document.getElementById("password");
    //busca o elemento HTML com o ID "mensagem-erro" para exibir mensagens de erro
    let mensagemErro = document.getElementById("mensagem-erro");
    // Declara uma variável booleana para controlar a validade do formulário
    let valido = true;

    // Limpa qualquer mensagem de erro antiga que tenha ficado escrita no contentor de mensagens de erro antes de tentar validar novamente, o innerHTML permite alterar o conteúdo HTML interno de um elemento
    mensagemErro.innerHTML = "";

    // Verifica se o campo de texto do username está vazio, limpando espaços em branco extras nas pontas (.trim())
    if (campoNome.value.trim() === "") {
        // Altera dinamicamente a propriedade CSS da borda do input para a cor vermelha de erro
        campoNome.style.borderColor = "red";
        // Altera a cor de fundo do input para um tom rosa claro indicando atenção
        campoNome.style.backgroundColor = "#ffe6e6";
        // Define o estado global da validação atual como falso, indicando que o formulário não é válido para submissão
        valido = false;
    } else { //caso o utilizador tenha preenchido corretamente o campo
        // Restaura a cor da borda original 
        campoNome.style.borderColor = "";
        // Restaura a cor de fundo padrão do elemento
        campoNome.style.backgroundColor = "";
    }

    // Verifica se o campo destinado à palavra-passe está em branco
    if (campoSenha.value.trim() === "") {
        campoSenha.style.borderColor = "red";
        campoSenha.style.backgroundColor = "#ffe6e6";
        // Injeta uma frase descritiva dentro do elemento HTML de mensagens
        mensagemErro.innerHTML = "O campo Palavra-passe é obrigatório!";
        valido = false;
    } 
    // Se o campo não estiver vazio, testa se o comprimento da string digitada tem menos do que 4 caracteres
    else if (campoSenha.value.length < 4) {
        // Altera a borda do campo para laranja sinalizando um aviso de segurança fraca
        campoSenha.style.borderColor = "orange";
        // Aplica um fundo laranja esbatido no input
        campoSenha.style.backgroundColor = "#fff2e6";
        // Informa textualmente o requisito mínimo de segurança exigido
        mensagemErro.innerHTML = "Aviso: A palavra-passe deve ter pelo menos 4 caracteres.";
        valido = false;
    } 
    // Executado caso o campo preencha todos os parâmetros obrigatórios com sucesso
    else {
        campoSenha.style.borderColor = "";
        campoSenha.style.backgroundColor = "";
    }

    // Se no final das verificações a flag 'valido' estiver marcada como falsa
    if (valido === false) {
        // Intervém no fluxo original e impede que o formulário seja submetido e enviado para o ficheiro PHP
        event.preventDefault();
    }
}

// Assina um "ouvinte global" para detetar quando toda a estrutura da página (DOM) acabou de carregar no navegador
document.addEventListener("DOMContentLoaded", function() {
    // Procura pelo ID do formulário associado à rotina de autenticação
    let formulario = document.getElementById("meuFormularioID");
    // Garante que o código só tenta associar o evento se o formulário realmente existir nesta página HTML específica
    if (formulario) {
        // Intercepta a tentativa de submissão do formulário ("submit") e delega a execução para a função 'validarFormulario'
        formulario.addEventListener("submit", validarFormulario);
    }
    // Procura por um eventual botão de informações institucionais do grupo de projeto
    let botao = document.getElementById("btn-sobre");
    //cria uma variável para armazenar o elemento HTML que contém as informações do grupo
    let texto = document.getElementById("info-grupo");
    // Verifica a existência de ambos os componentes na árvore de elementos da página atual
    if (botao && texto) {
        // Associa uma função anónima ao evento de clique no respetivo botão
        botao.addEventListener("click", function() {
            // Lógica interna para alternar a exibição ou ocultação do bloco de informações (não descrita no snippet fornecido)
            texto.hidden = !texto.hidden;
        });
    }
});