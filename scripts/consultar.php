<?php
session_start();
include_once 'ligacao.php';

// Se não estiver logado, manda para o login
if (!isset($_SESSION['utilizador'])) {
    header("Location: ../login.html");
    exit();
}

$user = $_SESSION['utilizador'];

// Procura o último acesso na base de dados SQLite
$stmt = $ligacao->prepare("SELECT ultimo_acesso FROM utilizadores WHERE username = :user");
$stmt->bindValue(':user', $user, SQLITE3_TEXT);
$resultado = $stmt->execute();
$dados = $resultado->fetchArray(SQLITE3_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Consulta de Acessos</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f9; padding: 40px; }
        .container { background: white; padding: 30px; border-radius: 8px; max-width: 450px; margin: 0 auto; box-shadow: 0 4px 12px rgba(0,0,0,0.1); text-align: center; }
        .info-box { background: #e9ecef; padding: 15px; border-radius: 6px; border-left: 5px solid #28a745; margin: 20px 0; }
        a { color: #007bff; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>

<div class="container">
    <h2>Histórico de Acessos (Exercício 8c)</h2>
    <p>Utilizador: <strong><?php echo htmlspecialchars($user); ?></strong></p>
    
    <div class="info-box">
        <strong>Último acesso registado:</strong><br>
        <?php 
        if (!empty($dados['ultimo_acesso']) && $dados['ultimo_acesso'] !== 'Nunca') {
            echo date('d/m/Y às H:i:s', strtotime($dados['ultimo_acesso']));
        } else {
            echo "Este é o teu primeiro acesso.";
        }
        ?>
    </div>
    <p><a href="../index.html">Página Principal</a> | <a href="logout.php" style="color: #dc3545;">Sair</a></p>
</div>

</body>
</html>