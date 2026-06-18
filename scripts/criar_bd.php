<?php

// Cria (ou abre caso já exista) o ficheiro de base de dados SQLite local chamado "projeto.db"
$db = new SQLite3("projeto.db");

// Executa um comando SQL para criar a tabela 'utilizadores' se ela não existir, com colunas para ID, nome e password
$db->exec("CREATE TABLE utilizadores (id INTEGER PRIMARY KEY, username TEXT, password TEXT);");

// Executa um comando SQL para criar a tabela 'acessos' para registar o IP do visitante e a data/hora do acesso
$db->exec("CREATE TABLE acessos (id INTEGER PRIMARY KEY, ip_utilizador TEXT, data_acesso TEXT);");

// Insere um utilizador de teste com o nome 'admin' e a palavra-passe 'admin123' na tabela
$db->exec("INSERT INTO utilizadores (username, password) VALUES ('admin', 'admin123');");
// Insere um segundo utilizador de teste com o nome 'aluno' e a palavra-passe 'isep2026'
$db->exec("INSERT INTO utilizadores (username, password) VALUES ('aluno', 'isep2026');");

// Imprime uma mensagem de sucesso no ecrã para confirmar o fim da execução
echo "Pronto! Base de dados criada.";
?>