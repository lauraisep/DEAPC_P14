<?php
session_start();
// Inicia ou retoma uma sessão ativa para conseguir rastrear o utilizador nas páginas
include_once 'ligacao.php';

// Verifica se o formulário foi submetido através do método POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Guarda o valor enviado no campo 'username' do formulário numa variável local
    $username = $_POST['username'];
    // Guarda o valor enviado no campo 'password' do formulário numa variável local
    $password = $_POST['password'];

// Prepara uma consulta SQL segura com um marcador (:user) para evitar ataques de SQL Injection    
    $stmt = $ligacao->prepare("SELECT * FROM utilizadores WHERE username = :user");
    // Vincula o valor da variável $username ao marcador :user garantindo que é tratado como texto plano
    $stmt->bindValue(':user', $username, SQLITE3_TEXT);
    // Executa a consulta estruturada na base de dados
    $resultado = $stmt->execute();
    
    // Extrai o resultado da consulta no formato de um array associativo (propriedade:valor)
    $user = $resultado->fetchArray(SQLITE3_ASSOC);

    // Verifica se foi encontrado algum utilizador com aquele username
    if ($user) {
// Compara de forma estrita se a password digitada é exatamente igual à password guardada na base de dados        
    if ($password === $user['password']) {
            // Guarda o username na variável global de sessão para provar que este utilizador está autenticado
            $_SESSION['utilizador'] = $username;

            // Captura a data e hora atual do sistema no formato Ano-Mês-Dia Horas:Minutos:Segundos
            $agora = date('Y-m-d H:i:s');
            // Prepara uma instrução SQL para atualizar o campo 'ultimo_acesso' desse utilizador
            $stmt_acesso = $ligacao->prepare("UPDATE utilizadores SET ultimo_acesso = :agora WHERE username = :user");
            // Vincula a data/hora atual ao respetivo marcador na instrução SQL
            $stmt_acesso->bindValue(':agora', $agora, SQLITE3_TEXT);
            // Vincula o nome do utilizador ao respetivo marcador na instrução SQL
            $stmt_acesso->bindValue(':user', $username, SQLITE3_TEXT);
            // Executa a atualização na tabela de utilizadores para registar o último acesso
            $stmt_acesso->execute();

            // Redireciona o navegador do utilizador para a página principal (index.html) que está uma pasta acima
            header("Location: ../index.html");
            exit();
        }
    }
    
    // Caso o utilizador não exista ou a password esteja incorreta, exibe uma mensagem de erro simples
    echo "<h3>Utilizador ou Palavra-passe incorretos!</h3>";
    echo "<a href='../login.html'>Voltar a tentar</a>";
}
?>