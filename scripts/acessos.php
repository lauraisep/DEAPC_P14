<?php

// Altera temporariamente (enquanto o ficheiro estiver a ser executado) a configuração do PHP para forçar a exibição de erros no ecrã
ini_set('display_errors', 1); // 1-true, 0-false
// Força a exibição de erros específicos que aconteçam logo na inicialização do script
ini_set('display_startup_errors', 1);
// Diz ao php para reportar todos os tipos de erros
error_reporting(E_ALL);

// Conecta-se à base de dados SQLite e abre o ficheiro "projeto.db" para leitura e escrita, criando-o se não existir
$db = new SQLite3("projeto.db");
// Executa uma pesquisa SQL extraindo todas as linhas e colunas existentes na tabela 'acessos' e guarda o resultado em $dados
$dados = $db->query("SELECT * FROM acessos");

// Inclui e executa o ficheiro visual HTML 'acessos.html', permitindo que a variável '$dados' liste a tabela no ecrã
include "acessos.html";
?>