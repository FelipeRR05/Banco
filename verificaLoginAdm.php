<html>
    <body>
        <?php
        // Iniciar uma sessão
        session_start();

        $hostname = "127.0.0.1";
        $user = "root";
        $password = "root";
        $database = "banco";

        $conexao = new mysqli($hostname, $user, $password, $database);

        if ($conexao->connect_errno) {
            echo "Failed to connect to MySQL: " . $conexao->connect_error;
            exit();
        } else {
            // Evitar caracteres especiais (SQL Inject)
            $email = $conexao->real_escape_string($_POST['email']);
            $senha = $conexao->real_escape_string($_POST['senha']);

            $sql = "SELECT `idGerente`, `nome` FROM `gerentes`
                    WHERE `email` = '" . $email . "'
                    AND `senha` = '" . $senha . "';";

            $resultado = $conexao->query($sql);

            if ($resultado->num_rows != 0) {
                $row = $resultado->fetch_array();
                $_SESSION['idGerente'] = $row['idGerente'];
                $_SESSION['nome'] = $row['nome'];

                $conexao->close();

                header('Location: menuAdm.php');
                exit();
            } else {
                $conexao->close();
                header('Location: index.php');
                exit();
            }
        }
        ?>
    </body>
</html>
