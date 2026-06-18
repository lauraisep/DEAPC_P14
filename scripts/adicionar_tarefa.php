<?php
ini_set('display_errors', 1); // Exibição de erros (explicado no 'acessos.php')
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Exibe um título marcando que este script simula a User Story 2 (Gestão de Tarefas)
echo "<h2>[DEBUG US2] Script Adicionar Tarefa</h2>";

// Verifica se os dados foram enviados através do método seguro POST (vindo de um formulário)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recolhe o valor do campo 'titulo'. O operador '??' define o texto padrão 'Não inserido' se o campo estiver vazio    
    $titulo = $_POST['titulo'] ?? 'Não inserido';
    // Recolhe o valor do campo 'descricao' enviado pelo utilizador
    $descricao = $_POST['descricao'] ?? 'Não inserido';
    // Recolhe o valor do seletor de prioridade do formulário
    $prioridade = $_POST['prioridade'] ?? 'Não inserido';

    // Imprime um aviso de sucesso na interceção dos dados na cor azul, indicando que o servidor recebeu os dados do formulário de forma segura
    echo "<p style='color: blue;'><strong>Dados recebidos com sucesso no servidor:</strong></p>";
    echo "<ul>"; // Inicia uma lista não ordenada em HTML para exibir os dados recebidos
    // Exibe os dados recolhidos aplicando htmlspecialchars para evitar qualquer injeção maliciosa de código HTML/JS no ecrã
    echo "<li><strong>Título da Tarefa:</strong> " . htmlspecialchars($titulo) . "</li>";
    echo "<li><strong>Descrição:</strong> " . htmlspecialchars($descricao) . "</li>";
    echo "<li><strong>Prioridade:</strong> " . htmlspecialchars($prioridade) . "</li>";
    echo "</ul>"; // Fecha a lista não ordenada 
} else {
    // Alerta exibido em vermelho caso alguém tente aceder ao ficheiro diretamente pelo link sem submeter o formulário
    echo "<p style='color: red;'>Aviso: Submeta os dados através do formulário HTML (Método POST).</p>";
}
?>