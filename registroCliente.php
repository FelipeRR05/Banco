<?php
$hostname = "127.0.0.1";
$user = "root";
$password = "root";
$database = "banco";

$conexao = new mysqli($hostname, $user, $password, $database);

if ($conexao->connect_errno) {
    echo "Failed to connect to MySQL: " . $conexao->connect_error;
    exit();
} else {
    // Evita caracteres especiais (SQL Injection)
    $idCliente = $conexao->real_escape_string($_POST['idCliente']);
    $idGerente = $conexao->real_escape_string($_POST['idGerente']);
    $nome = $conexao->real_escape_string($_POST['nome']);
    $cpf = $conexao->real_escape_string($_POST['cpf']);
    $email = $conexao->real_escape_string($_POST['email']);
    $telefone = $conexao->real_escape_string($_POST['telefone']);
    $cartao = $conexao->real_escape_string($_POST['cartao']);
    
    // Insere o novo cliente no banco de dados
    $sqlInserirCliente = "INSERT INTO `clientes`
                                (`idGerente`, `nome`, `cpf`, `email`, `telefone`, `cartao`)
                            VALUES
                                ('$idGerente', '$nome', '$cpf', '$email', '$telefone', '0')";

    if ($conexao->query($sqlInserirCliente)) {
        // Redireciona para a página de menu
        header('Location: menuAdm.php');
        exit();
    } else {
        // Ocorreu um erro ao registrar o cliente
        echo "Erro ao registrar cliente: " . $conexao->error;
    }
}

// Fecha a conexão com o banco de dados
$conexao->close();
?>