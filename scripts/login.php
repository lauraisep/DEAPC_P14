<?php
session_start();
require_once 'ligacao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password']; 

    // 8a. Validar acesso com base no utilizador e password (tabela 'utilizadores')
    $sql = "SELECT * FROM utilizadores WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $user_data = $result->fetch_assoc();
        
        $_SESSION['utilizador'] = $user_data['username'];
        $_SESSION['id_utilizador'] = $user_data['id'];

        // 8b. Registo do último acesso (Guarda o dia e a hora atuais)
        $agora = date('Y-m-d H:i:s');
        $id_user = $user_data['id'];
        
        $sql_update = "UPDATE utilizadores SET ultimo_acesso = '$agora' WHERE id = $id_user";
        $conn->query($sql_update);

        // Redireciona para a página de consulta
        header("Location: consultar.php");
        exit();
    } else {
        echo "<h3>Utilizador ou palavra-passe incorretos!</h3>";
        echo "<a href='../index.html'>Voltar a tentar</a>";
    }
}
?>