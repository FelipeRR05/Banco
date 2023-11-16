<?php
include_once('funcoesJS.php');

$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = "banco";

session_start();
$idGerenteLogado = $_SESSION['idGerente'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['idCliente'])) {
        $idCliente = $_POST['idCliente'];
        $cartao = $_POST['cartao'];

        // Aqui você pode realizar as validações necessárias antes de atualizar os dados no banco de dados

        // Verificar se o número do cartão já está cadastrado para outro cliente
        $checkSql = "SELECT idCliente FROM clientes WHERE cartao = '$cartao' AND idCliente != $idCliente";
        $checkResult = $conn->query($checkSql);

        if ($checkResult->num_rows > 0) {
            echo "Erro: Este número de cartão já está cadastrado para outro cliente." . $conn->error . "<p><a href=\"visualizarUsuario.php?id=" . $idCliente . "\">Voltar</a></p>";
        } else {
            // Atualizar o campo de cartão de crédito na tabela de clientes
            $updateSql = "UPDATE clientes SET cartao = '$cartao' WHERE idCliente = $idCliente";

            if ($conn->query($updateSql) === TRUE) {
                header("Location: menuAdm.php");
            } else {
                echo "Erro ao atualizar o cartão de crédito: " . $conn->error . "<p><a href=\"visualizarUsuario.php\">Voltar</a></p>";
            }
        }
    } else {
        echo "ID do cliente não fornecido.<p><a href=\"visualizarUsuario.php\">Voltar</a></p>";
    }
}

// Fechar a conexão com o banco de dados
$conn->close();
?>