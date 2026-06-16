<?php
// para mostrar mensagens de erro
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db = new SQLite3("projeto.db");
$dados = $db->query("SELECT * FROM acessos");

include "../acessos.html";
?>