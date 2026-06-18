<?php
// Inicia o sistema de sessões para verificar o estado do utilizador
session_start();
// Importa as configurações de ligação à base de dados
include_once 'ligacao.php';

// Proteção da página: se a variável de sessão 'utilizador' não estiver definida, significa que não fez login
if (!isset($_SESSION['utilizador'])) {
    // Redireciona imediatamente o utilizador invasor para o formulário de login
    header("Location: ../login.html");
    // Trava o script por segurança
    exit();
}

// Guarda o nome do utilizador "logado" numa variável para facilitar a manipulação
$user = $_SESSION['utilizador'];

// Prepara uma consulta para ir buscar o histórico do campo 'ultimo_acesso' do utilizador em causa
$stmt = $ligacao->prepare("SELECT ultimo_acesso FROM utilizadores WHERE username = :user");
// Vincula com segurança a variável da sessão ao marcador SQL
$stmt->bindValue(':user', $user, SQLITE3_TEXT);
// Corre a pesquisa na base de dados
$resultado = $stmt->execute();
// Transforma o retorno numa estrutura de dados legível pelo PHP
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
        // Valida se o dado retornado não está vazio e se é diferente da palavra string 'Nunca'
        if (!empty($dados['ultimo_acesso']) && $dados['ultimo_acesso'] !== 'Nunca') {
            // Converte a string de data americana e formata-a para o padrão português (Dia/Mês/Ano às Horas:Minutos:Segundos)
            echo date('d/m/Y às H:i:s', strtotime($dados['ultimo_acesso']));
        } else {
            // Mensagem caso não exista histórico prévio
            echo "Este é o teu primeiro acesso.";
        }
        ?>
    </div>
    <p><a href="../index.html">Página Principal</a> | <a href="logout.php" style="color: #dc3545;">Sair</a></p>
</div>

</body>
</html>