<?php
// Inicia ou localiza a sessão ativa existente
session_start();
// "Destrói" por completo todos os dados associados à sessão atual do utilizador (faz o log out)
session_destroy();
// Redireciona o utilizador de volta para a página inicial pública da aplicação
header("Location: ../index.html");
// Termina imediatamente a execução do script para garantir que não é enviado mais nenhum conteúdo ao navegador depois do redirecionamento
exit();
?>