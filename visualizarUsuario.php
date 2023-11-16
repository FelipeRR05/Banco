<!DOCTYPE html>
<html lang="en">

<head><?php
include('protect.php');
?>
<link rel="icon" src="img/logo.png">
    <meta charset="utf-8">
    <title>Banco | Cadastrar Cliente</title>
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
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="menuAdm.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><img height="75" src="img/logo3.png"></h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative top-0 start-0 w-100 h-30 d-flex align-items-center">
                <img class="img-fluid" src="img/tela.png" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(23, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">on
                            <div class="col-sm-10 col-lg-8">
                                <h5 class="text-primary text-uppercase mb-3 animated slideInDown"></h5>
                                <h1 class="display-3 text-white animated slideInDown">Magic Book Library</h1>
                                <p class="fs-5 text-white mb-4 pb-2">SEJA BEM VINDO A LIBRARY! onde a curiosidade é incentivada e o conhecimento é valorizado.
                                    .
                                </p>
                                <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Tela de livros</a>
                                <a href="" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Ir para tela de cadastro</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/tela.png" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(14, 16, 31, 0.7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h5 class="text-primary text-uppercase mb-3 animated slideInDown"></h5>
                                <h1 class="display-3 text-white animated slideInDown">Magic Book Library</h1>
                                <p class="fs-5 text-white mb-4 pb-2">Descubra novas aventuras a cada página na Libery Store - sua biblioteca de leitura.
                                </p>
                                <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Tela de Livros</a>
                                <a href="" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Ir para tela de cadastro</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Service Start -->
    <!-- Service End -->


    <!-- About Start -->
    <!-- About End -->


    <!-- Categories Start -->    
    <div class="container-xxl py-5 category">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Clientes</h6>
                <h1 class="mb-5">Visualizar Cliente</h1>
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
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$idGerenteLogado = $_SESSION['idGerente'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Verificar se o ID do cliente foi passado pela URL
if (isset($_GET['id'])) {
    $idCliente = $_GET['id'];

    // Consulta para selecionar os dados do cliente
    $sql = "SELECT * FROM clientes WHERE idCliente = $idCliente AND idGerente = $idGerenteLogado";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Visualizar Cliente</title>
</head>
<body>
    <div style="display: flex; justify-content: center; align-items: center;">
        <div class="container" style="padding: 50px; background-color: #f7f7f7; box-shadow: 0px 0px 15px #666; width: 55%; border-radius: 15px;">
            <form action="registrarCartao.php" method="POST">
                <div style="display: flex; justify-content: center;">
                    <h2 style="color: rgba(17, 27, 88, 0.7);">Visualizar Cliente</h2>
                </div>
                <input type="hidden" name="idCliente" value="' . $idCliente . '">
                <div style="padding-bottom: 12px;">
                    <div style="display: flex; justify-content: space-between; width: 100%;">
                        <div style="width: 48%; padding-bottom: 12px;">
                            <label style="float: left; padding-bottom: 5px;" for="nome">Nome Completo</label><br>
                            <input style="display: block; border: 2px solid #333; background-color: #eee; color: #333; width: 100%; height: 55px; padding: 10px; margin: 10px; border-radius: 5px;" placeholder="Nome" type="text" id="nome" name="nome" value="' . $row['nome'] . '" readonly>
                        </div>
                        <div style="width: 48%; padding-bottom: 12px;">
                            <label style="float: left; padding-bottom: 5px; " for="cpf">CPF</label><br>
                            <input style="display: block; border: 2px solid #333; background-color: #eee; color: #333; width: 100%; height: 55px; padding: 10px; margin: 10px; border-radius: 5px;" placeholder="CPF" onkeyup="formatarCPF()" type="text" id="cpf" name="cpf" value="' . $row['cpf'] . '" readonly>
                        </div>
                    </div>
                    <div style="width: 100%; padding-bottom: 12px;">
                        <label style="float: left; padding-bottom: 5px;" for="email">Email</label><br>
                        <input style="display: block; border: 2px solid #333; background-color: #eee; color: #333; width: 100%; height: 55px; padding: 10px; margin: 10px; border-radius: 5px;" placeholder="Email" type="email" id="email" name="email" value="' . $row['email'] . '" readonly>
                    </div>
                    <div style="width: 100%; padding-bottom: 12px;">
                        <label style="float: left; padding-bottom: 5px; " for="telefone">Telefone</label><br>
                        <input style="display: block; border: 2px solid #333; background-color: #eee; color: #333; width: 100%; height: 55px; padding: 10px; margin: 10px; border-radius: 5px;" placeholder="Telefone" onkeyup="formatarTelefone()" type="tel" id="telefone" name="telefone" value="' . $row['telefone'] . '" readonly>
                    </div>
                    <div style="width: 100%; padding-bottom: 12px;">
                        <label style="float: left; padding-bottom: 5px; width: 100px;" for="idGerente">Gerente:</label><br>
                        <select style="flex: 1; width: calc(100% - 0px); border: 2px solid #333; background-color: #eee; color: #333; height: 55px; padding: 10px; margin: 10px; border-radius: 5px;" id="idGerente" name="idGerente" readonly>
                            <option value="' . $row['idGerente'] . '">' . $row['nome'] . '</option>
                        </select>
                    </div>
                    <div style="width: 100%; padding-bottom: 12px;">
                        <label style="float: left; padding-bottom: 5px; " for="cartao">Cartão de Crédito:</label><br>
                        <input style="display: block; border: 2px solid #ccc; width: 100%; height: 55px; padding: 10px; margin: 10px; border-radius: 5px;" placeholder="Cartão de Crédito"  type="number" id="cartao" name="cartao" value="' . $row['cartao'] . '" required>
                    </div>
                </div>
                <div style="width: 100%; padding-bottom: 12px;">
                    <div style="width: 100%; display: flex; justify-content: flex-end; align-items: center;">
                        <button type="submit">Cadastrar cartão de crédito</button>
                    </div>
                </div>
            </form>
        </div>
    </div>';
    } else {
        echo '<div class="container">';
        echo '<p>O cliente não foi encontrado ou não pertence ao gerente logado.</p>';
        echo '</div>';
    }
} else {
    echo '<div class="container">';
    echo '<p>ID do cliente não fornecido.</p>';
    echo '</div>';
}

// Fechar a conexão com o banco de dados
$conn->close();
?>

</div>
</div>
        </div>
    </div>
    <!-- Categories Start -->


    <!-- Courses Start -->
    
    <!-- Courses End -->

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