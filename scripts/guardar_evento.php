<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "<h2>[DEBUG US3] Script Guardar Evento</h2>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $evento = $_POST['titulo_evento'] ?? 'Não inserido';
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