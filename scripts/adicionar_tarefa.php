<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "<h2>[DEBUG US2] Script Adicionar Tarefa</h2>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura e imprime os dados inseridos no formulário das tarefas
    $titulo = $_POST['titulo'] ?? 'Não inserido';
    $descricao = $_POST['descricao'] ?? 'Não inserido';
    $prioridade = $_POST['prioridade'] ?? 'Não inserido';

    echo "<p style='color: blue;'><strong>Dados recebidos com sucesso no servidor:</strong></p>";
    echo "<ul>";
    echo "<li><strong>Título da Tarefa:</strong> " . htmlspecialchars($titulo) . "</li>";
    echo "<li><strong>Descrição:</strong> " . htmlspecialchars($descricao) . "</li>";
    echo "<li><strong>Prioridade:</strong> " . htmlspecialchars($prioridade) . "</li>";
    echo "</ul>";
} else {
    echo "<p style='color: red;'>Aviso: Submeta os dados através do formulário HTML (Método POST).</p>";
}
?>