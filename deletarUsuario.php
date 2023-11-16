<?php
session_start();

$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = "banco";

// Criar conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Verificar se o parâmetro 'id' está presente na URL
if (isset($_GET["id"])) {
    $idCliente = $_GET["id"];

    // Deletar o cliente do banco de dados
    $sql = "DELETE FROM clientes WHERE idCliente = '$idCliente'";

    if ($conn->query($sql) === true) {
        // Redirecionar o usuário de volta para a página anterior
        header("Location: ".$_SERVER['HTTP_REFERER']);
        exit;
    } else {
        echo "Erro ao deletar o cliente: " . $conn->error;
    }
}

// Fechar a conexão com o banco de dados
$conn->close();
?>