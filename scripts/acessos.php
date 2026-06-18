<?php
// Ativa os relatórios de erros para
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Conecta-se à base de dados SQLite
$db = new SQLite3("projeto.db");
// Executa uma pesquisa SQL "crua" extraindo todas as linhas e colunas existentes na tabela 'acessos'
$dados = $db->query("SELECT * FROM acessos");

// Inclui dinamicamente o ficheiro HTML de visualização, permitindo que a variável '$dados' seja percorrida lá dentro
include "../acessos.html";
?>