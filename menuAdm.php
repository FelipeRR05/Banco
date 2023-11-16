<!DOCTYPE html>
<html lang="en">

<head><?php
include('protect.php');
?>
<link rel="icon" src="img/logo.png">
    <meta charset="utf-8">
    <title>Banco | Tela principal</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/logo.jpg" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <?php
    
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$hostname = '127.0.0.1';
$user = 'root';
$password = 'root';
$database = 'banco';

$conexao = new mysqli($hostname, $user, $password, $database);
if ($conexao->connect_errno) {
    echo 'Falha na conexão: ' . $conexao->connect_error;
    exit();
} else {
    // Obter o nome do gerente a partir das variáveis de sessão
    $nomeGerente = isset($_SESSION['nome']) ? $_SESSION['nome'] : '';

    // Restante do código permanece o mesmo
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Administrativo</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="menuAdm.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><img height="75" src="img/logo3.png"></h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <!-- Exibir o nome do gerente logado -->
            <h1 class="navtxt"><?php echo $nomeGerente; ?></h1>
        </div>
        <div class="ms-auto d-flex align-items-center">
            <form action="logout.php" method="POST">
                <button type="submit" class="btn btn-danger">Sair</button>
            </form>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Tela Principal</h1>
                    <nav aria-label="breadcrumb"></ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
<!-- About Start -->
    <!-- About End -->

    <!-- Team Start --> <div class="container-xxl py-5 category">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Clientes</h6>
                <h1 class="mb-5">Gerenciar Clientes</h1>
            </div>
            <div class="row g-4">
            <?php
include_once('funcoesJS.php');

$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = "banco";

// Supondo que você tenha a informação do gerente logado armazenada em algum lugar, como $_SESSION
// Substitua isso com a lógica real que você está usando para obter o id do gerente logado
$idGerenteLogado = $_SESSION['idGerente'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Verificar se a pesquisa foi enviada
if (isset($_GET['search'])) {
    $search = $_GET['search'];

    // Consulta para selecionar os usuários que correspondem à pesquisa
    $sql = "SELECT * FROM clientes WHERE (nome LIKE '%$search%' OR cartao LIKE '%$search%' OR email LIKE '%$search%' OR cpf LIKE '%$search%') AND idGerente = $idGerenteLogado ORDER BY nome";
} else {
    // Consulta para selecionar todos os usuários do gerente logado
    $sql = "SELECT * FROM clientes WHERE idGerente = $idGerenteLogado ORDER BY idCliente";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<div class="container">';
    echo '<h2 style="margin-bottom: 20px;">Lista de ' . $result->num_rows . ' Clientes</h2>';

    // Adicionar barra de pesquisa com ícone de lupa
    echo '<form method="GET" action="menuAdm.php">';
    echo '<div style="display: flex; align-items: center;">';
    echo '<input type="text" name="search" placeholder="Pesquisar clientes">';
    echo '<button type="submit" style="background-color: #565d88; border: none; cursor: pointer; padding:10px; margin-right: 5px;"><i class="fas fa-search" style="color: white;"></i></button>';
    
    // Botão de Cadastro
    echo '<a href="cadastrarCliente.php" class="btn btn-primary btn-sm" style="background-color: #565d88; border-radius: 5px; "><i class="fas fa-plus"></i> Cadastrar Cliente</a>';
    
    echo '</div>';
    echo '</form>';

    // Adicionar espaço entre a barra de pesquisa e a lista de usuários
    echo '<div style="margin-top: 20px;"></div>';

    echo '<ul>';

    while ($row = $result->fetch_assoc()) {
        $idCliente = $row["idCliente"];
        $idGerente = $row["idGerente"];
        $nome = $row["nome"];
        $cpf = $row["cpf"];
        $email = $row["email"];
        $telefone = $row["telefone"];
        $cartao = $row["cartao"];

        echo '<li>';
        echo '<span style="margin-right: 10px;">Número: ' . $idCliente . '</span>';
        echo '<span style="margin-right: 10px;">Nome: ' . $nome . '</span>';
        // Botão de Deletar
        echo '<a href="deletarUsuario.php?id=' . $idCliente . '" class="btn btn-danger btn-sm" style="margin-right: 5px; margin-bottom: 5px; border-radius: 5px; background-color: #dc3545;" onclick="return confirm(\'Tem certeza de que deseja excluir o usuário?\')" onmouseover="this.style.backgroundColor=\'#c82333\'" onmouseout="this.style.backgroundColor=\'#dc3545\'"><i class="fas fa-trash"></i> Excluir</a>';
        
        // Botão de Visualizar (Editar)
        echo '<a href="visualizarUsuario.php?id=' . $idCliente . '" class="btn btn-success btn-sm" style="margin-right: 5px; margin-bottom: 5px; border-radius: 5px; background-color: #28a745;" onmouseover="this.style.backgroundColor=\'#218838\'" onmouseout="this.style.backgroundColor=\'#28a745\'"><i class="fas fa-eye"></i> Visualizar</a>';
        
        echo '</li>';
    }

    echo '</ul>';
    echo '</div>';

} else {
    echo '<div class="container">';
    echo '<h2 style="margin-bottom: 20px;">Lista de ' . $result->num_rows . ' Clientes</h2>';

    // Adicionar barra de pesquisa com ícone de lupa
    echo '<form method="GET" action="menuAdm.php">';
    echo '<div style="display: flex; align-items: center;">';
    echo '<input type="text" name="search" placeholder="Pesquisar clientes">';
    echo '<button type="submit" style="background-color: #565d88; border: none; cursor: pointer; padding:10px; margin-right: 5px;"><i class="fas fa-search" style="color: white;"></i></button>';
    
    // Botão de Cadastro
    echo '<a href="cadastrarCliente.php" class="btn btn-primary btn-sm" style="background-color: #565d88; border-radius: 5px; "><i class="fas fa-plus"></i> Cadastrar Cliente</a>';
    
    echo '</div>';
    echo '</form>';

    // Adicionar espaço entre a barra de pesquisa e a lista de usuários
    echo '<div style="margin-top: 20px;"></div>';

    echo '<ul>';
}

// Fechar a conexão com o banco de dados
$conn->close();
?>
</div>
</div>
        </div>
    </div>

   <!-- Footer Start -->
   <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-4">
        <div class="row g-5">
            <div class="col-lg-6 col-md-6 text-start">
                <h4 class="text-white mb-3">Obrigado!</h4>
                <p class="mb-2"><i class=""></i>Agradecemos por escolher o Banco Vasco BMG! Esperamos que você retorne sempre para explorar nossos serviços financeiros e continue desfrutando da ampla gama de opções que oferecemos. Estamos aqui para acompanhá-lo em sua jornada financeira.</p>
                <p class="mb-2"><i class=""></i>Volte sempre!</p>
            </div>
            <div class="col-lg-3 col-md-6 text-start">
                <h4 class="text-white mb-3"></h4>
                <p class="mb-2"><i class=""></i></p>
                <p class="mb-2"><i class=""></i></p>
                <p class="mb-2"><i class=""></i></p>
            </div>
            
            <div class="col-lg-3 col-md-6 text-end ">
                <h4 class="text-white mb-3">Contatos</h4>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Av. Ver. Abrahão João Francisco, 3655 - Ressacda, Itajaí-SC</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+55 (47) 99999-9999</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>estudante@sesisenai.org.br</p>
            </div>
        </div>
    </div>
</div>
    <!-- Footer End -->


    <!-- Back to Top -->


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>