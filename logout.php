<?php
session_start();

// Destruir todas as variáveis de sessão
$_SESSION = array();

// Encerrar a sessão
session_destroy();

// Redirecionar para a página de login
header("Location: index.php");
exit();
?>