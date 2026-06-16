<?php
$db = new SQLite3("projeto.db");

// Cria a tabela dos utilizadores
$db->exec("CREATE TABLE utilizadores (id INTEGER PRIMARY KEY, username TEXT, password TEXT);");

// Cria a tabela dos acessos
$db->exec("CREATE TABLE acessos (id INTEGER PRIMARY KEY, ip_utilizador TEXT, data_acesso TEXT);");

// Mete os utilizadores de teste
$db->exec("INSERT INTO utilizadores (username, password) VALUES ('admin', 'admin123');");
$db->exec("INSERT INTO utilizadores (username, password) VALUES ('aluno', 'isep2026');");

echo "Pronto! Base de dados criada.";
?>