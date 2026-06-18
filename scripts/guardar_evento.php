<?php
ini_set('display_errors', 1); // Exibição de erros (explicado no 'acessos.php')
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Exibe título marcando que este script simula a User Story 3 (Módulo de Calendário)
echo "<h2>[DEBUG US3] Script Guardar Evento</h2>";

// Verifica se os dados foram enviados através do método seguro POST (vindo de um formulário)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recolhe o valor do campo 'titulo_evento'. O operador '??' define o texto padrão 'Não inserido' se o campo estiver vazio    
    $evento = $_POST['titulo_evento'] ?? 'Não inserido';
    // Captura o input de tipo data recolhido da interface do calendário
    $data = $_POST['data_evento'] ?? 'Não inserido';

    echo "<p style='color: purple;'><strong>Evento intercetado no Calendário:</strong></p>";
    echo "<ul>";
    echo "<li><strong>Nome do Evento/Meta:</strong> " . htmlspecialchars($evento) . "</li>";
    echo "<li><strong>Data Agendada:</strong> " . htmlspecialchars($data) . "</li>";
    echo "</ul>";
} else {
    echo "<p style='color: red;'>Aviso: Submeta os dados através do formulário do Calendário.</p>";
}
?>