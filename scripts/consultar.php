<?php
session_start();
require_once 'ligacao.php';

// Proteção: Se não tiver sessão, manda para o index
if (!isset($_SESSION['utilizador'])) {
    die("<h3>Acesso negado. Por favor, faça login.</h3><a href='../index.html'>Ir para o Login</a>");
}

// 8c. Consulta dos registos de acesso
$sql = "SELECT username, ultimo_acesso FROM utilizadores";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Registos de Acesso</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <div style="padding: 20px;">
        <h2>Bem-vindo, <?php echo $_SESSION['utilizador']; ?>!</h2>
        <h3>Registos de Acesso dos Utilizadores</h3>

        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>Utilizador</th>
                    <th>Último Acesso</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result && $result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['username'] . "</td>";
                        $data = $row['ultimo_acesso'] ? $row['ultimo_acesso'] : "Nunca acedeu";
                        echo "<td>" . $data . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>Nenhum registo encontrado.</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <p><br><a href="logout.php">Terminar Sessão (Sair)</a></p>
    </div>
</body>
</html>