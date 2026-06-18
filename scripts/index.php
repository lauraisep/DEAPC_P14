<?php
// Força a exibição de falhas e avisos do PHP em tempo de execução
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Abre uma conexão com o ficheiro SQLite
$db = new SQLite3("projeto.db");

// Garante de forma preventiva que a tabela de registos globais de acessos existe antes de tentar inserir dados
$db->exec("CREATE TABLE IF NOT EXISTS acessos (id INTEGER PRIMARY KEY, ip_utilizador TEXT, data_acesso TEXT);");

// Lê o endereço IP do visitante através dos metadados da requisição do servidor
$ip = $_SERVER['REMOTE_ADDR'];
// Formata o momento exato do acesso (Ano-Mês-Dia Horas:Minutos)
$data = date('Y-m-d H:i');
// Executa a inserção direta das variáveis contendo o IP e Data na tabela 'acessos'
$db->exec("INSERT INTO acessos (ip_utilizador, data_acesso) VALUES ('$ip', '$data')");

// Imprime um bloco de texto formatado como logs de simulação no terminal ou na consola do interpretador PHP
echo "\n==================================================\n";
echo "   [DEBUG CLI - US1] DASHBOARD PRINCIPAL          \n";
echo "==================================================\n";
echo "Estado: Ativo e operacional.\n";
echo "Sucesso: O script PHP de cálculo de estatísticas respondeu!\n";
echo "==================================================\n\n";
?>

<br><br>
<a href="acessos.php">[ Ver Histórico de Acessos ]</a>