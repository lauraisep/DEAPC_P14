<?php
$host = "localhost";
$user = "root";       // Se na aula usaram outro utilizador, altera aqui
$pass = "";           // Se a vossa BD tiver password, coloca-a aqui
$db   = "deapc";      // Substitui pelo nome real da vossa Base de Dados

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Falha na ligação à base de dados: " . $conn->connect_error);
}
?>