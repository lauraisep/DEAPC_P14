<?php
ini_set('display_errors', 1); // Exibição de erros (explicado no 'acessos.php')
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Exibe título marcando que este script simula a User Story 4 (Módulo de Equipa)
echo "<h2>[DEBUG US4] Script Adicionar Membro da Equipa</h2>";

// Verifica se os dados foram enviados através do método seguro POST (vindo de um formulário)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Busca o nome inserido no campo 'nome' para o novo colaborador. O operador '??' define o texto padrão 'Não inserido' se o campo estiver vazio
    $nome = $_POST['nome'] ?? 'Não inserido';
    // Busca o cargo profissional associado ao novo membro da equipa a ser adicionado
    $cargo = $_POST['cargo'] ?? 'Não inserido';

    // Imprime um parágrafo HTML com texto a verde a confirmar que o servidor intercetou com sucesso o envio dos dados
    echo "<p style='color: green;'><strong>Novo Perfil de Colaborador Detetado:</strong></p>";
    // Inicia uma lista não ordenada em HTML para exibir os dados recebidos 
    echo "<ul>";
    // Cria um item da lista e limpa códigos perigosos no nome usando a função htmlspecialchars()
    echo "<li><strong>Nome Completo:</strong> " . htmlspecialchars($nome) . "</li>";
    echo "<li><strong>Função / Cargo:</strong> " . htmlspecialchars($cargo) . "</li>"; 
    echo "</ul>"; // Fecha a lista não ordenada 
} else { // Executado caso alguém tente aceder diretamente ao script sem passar pelo formulário de submissão
    // Imprime um aviso em vermelho no ecrã informando que os dados devem ser submetidos através do formulário da Equipa
    echo "<p style='color: red;'>Aviso: Submeta os dados através do formulário da Equipa.</p>";
}
?>