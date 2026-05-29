<?php
// 1. Ativar a geração de mensagens de erro para debug (Recomendado na pág. 8 do Doc de Apoio)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    // 2. Estabelecer a ligação/criação do ficheiro da base de dados SQLite3
    // O ficheiro será criado automaticamente na mesma pasta do script
    $db = new SQLite3('projeto.db');
    echo "Ligação à base de dados estabelecida com sucesso!<br>";

    // 3. Definir a query SQL para criar a tabela de utilizadores
    // Inclui: id (Chave Primária), username, password e o registo do ultimo_acesso
    $sql_utilizadores = "CREATE TABLE IF NOT EXISTS utilizadores (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        username TEXT NOT EXISTS UNIQUE,
        password TEXT NOT EXISTS,
        ultimo_acesso TEXT
    );";

    // 4. Executar a query de criação utilizando o método exec() (Exemplo da pág. 9 do Doc de Apoio)
    if ($db->exec($sql_utilizadores)) {
        echo "Tabela 'utilizadores' criada com sucesso!<br>";
    } else {
        echo "Erro ao criar a tabela.<br>";
    }

    // 5. Opcional: Inserir um utilizador de teste (com password em texto limpo para o exercício 8a)
    // Usamos INSERT INTO e exec() conforme exemplificado no documento de apoio
    $check_empty = $db->querySingle("SELECT COUNT(*) FROM utilizadores");
    if ($check_empty == 0) {
        $db->exec("INSERT INTO utilizadores (username, password, ultimo_acesso) 
                   VALUES ('admin', 'admin123', 'Nunca')");
        $db->exec("INSERT INTO utilizadores (username, password, ultimo_acesso) 
                   VALUES ('aluno', 'isep2026', 'Nunca')");
        echo "Utilizadores de teste inseridos com sucesso!<br>";
    }

    // 6. Fechar a ligação libertando o objeto (pág. 9 do Doc de Apoio)
    unset($db);
    echo "Ligação fechada com segurança.<br>";

} catch (Exception $e) {
    echo "Ocorreu um erro na base de dados: " . $e->getMessage();
}
?>