<?php
// Ativar erros para ajudar a detetar falhas
ini_set('display_errors', 1);
error_reporting(E_ALL);

try {
    // Liga-se ao ficheiro SQLite criado pela tua amiga
    $ligacao = new SQLite3(__DIR__ . '/projeto.db');
} catch (Exception $e) {
    die("Falha na ligação à base de dados: " . $e->getMessage());
}
?>