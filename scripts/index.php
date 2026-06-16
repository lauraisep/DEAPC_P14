<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db = new SQLite3("projeto.db");

$db->exec("CREATE TABLE IF NOT EXISTS acessos (id INTEGER PRIMARY KEY, ip_utilizador TEXT, data_acesso TEXT);");

$ip = $_SERVER['REMOTE_ADDR'];
$data = date('Y-m-d H:i');
$db->exec("INSERT INTO acessos (ip_utilizador, data_acesso) VALUES ('$ip', '$data')");

echo "\n==================================================\n";
echo "   [DEBUG CLI - US1] DASHBOARD PRINCIPAL          \n";
echo "==================================================\n";
echo "Estado: Ativo e operacional.\n";
echo "Sucesso: O script PHP de cálculo de estatísticas respondeu!\n";
echo "==================================================\n\n";
?>

<br><br>
<a href="acessos.php">[ Ver Histórico de Acessos ]</a>