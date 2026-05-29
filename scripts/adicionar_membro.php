<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "<h2>[DEBUG US4] Script Adicionar Membro da Equipa</h2>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'] ?? 'Não inserido';
    $cargo = $_POST['cargo'] ?? 'Não inserido';

    echo "<p style='color: green;'><strong>Novo Perfil de Colaborador Detetado:</strong></p>";
    echo "<ul>";
    echo "<li><strong>Nome Completo:</strong> " . htmlspecialchars($nome) . "</li>";
    echo "<li><strong>Função / Cargo:</strong> " . htmlspecialchars($cargo) . "</li>";
    echo "</ul>";
} else {
    echo "<p style='color: red;'>Aviso: Submeta os dados através do formulário da Equipa.</p>";
}
?>