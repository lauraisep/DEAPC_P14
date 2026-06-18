<?php
// Ativa a exibição de erros diretamente no ecrã
ini_set('display_errors', 1);
// Configura o PHP para reportar todos os tipos de erros existentes
error_reporting(E_ALL);

try {
// Tenta instanciar uma nova ligação SQLite3 usando o caminho absoluto do diretório atual (__DIR__) concatenado com o ficheiro do banco de dados    
    $ligacao = new SQLite3(__DIR__ . '/projeto.db');
} catch (Exception $e) {
    // Se a ligação falhar, o bloco catch intercetará a exceção, interromperá o script (die) e mostrará a mensagem de erro correspondente
    die("Falha na ligação à base de dados: " . $e->getMessage());
}
?>