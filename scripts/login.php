<?php
session_start();
include_once 'ligacao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Procura o utilizador usando SQLite3
    $stmt = $ligacao->prepare("SELECT * FROM utilizadores WHERE username = :user");
    $stmt->bindValue(':user', $username, SQLITE3_TEXT);
    $resultado = $stmt->execute();
    
    $user = $resultado->fetchArray(SQLITE3_ASSOC);

    if ($user) {
        // Verifica se a password coincide
        if ($password === $user['password']) {
            $_SESSION['utilizador'] = $username;

            // --- ALÍNEA B: Grava o dia e hora atual do acesso ---
            $agora = date('Y-m-d H:i:s');
            $stmt_acesso = $ligacao->prepare("UPDATE utilizadores SET ultimo_acesso = :agora WHERE username = :user");
            $stmt_acesso->bindValue(':agora', $agora, SQLITE3_TEXT);
            $stmt_acesso->bindValue(':user', $username, SQLITE3_TEXT);
            $stmt_acesso->execute();

            // Login com sucesso -> Vai para a página principal
            header("Location: ../index.html");
            exit();
        }
    }
    
    // Se falhar
    echo "<h3>Utilizador ou Palavra-passe incorretos!</h3>";
    echo "<a href='../login.html'>Voltar a tentar</a>";
}
?>