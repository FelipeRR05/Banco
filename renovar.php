<!DOCTYPE html>
<html lang="en">

<head>
<link rel="icon" href="https://imagensemoldes.com.br/wp-content/uploads/2020/04/Livro-Aberto-PNG.png">
    <meta charset="utf-8">
    <title>Magic Book Library</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <script src="https://kit.fontawesome.com/be77d4a767.js" crossorigin="anonymous"></script>

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

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
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="livros.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><img height="150" src="img/Logo.png"></h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="livros.php" class="nav-item nav-link">Catálogo</a>
                <a href="meusEmp.php" class="nav-item nav-link ">Meus Empréstimos</a>
                <a href="renovar.php" class="nav-item nav-link active">Renovação</a>
                <a href="perfil.php" class="nav-item nav-link">Perfil</a>
                <a href="index.php" class="nav-item nav-link">Acessos</a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Meus Empréstimos</h1>
                    <nav aria-label="breadcrumb"></ol>
                    </nav>
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
                <h6 class="section-title bg-white text-center text-primary px-3">Empréstimos</h6>
                <h1 class="mb-5">Renovar Empréstimo</h1>
            </div>
            <div class="row g-4">
            <?php
date_default_timezone_set('America/Sao_Paulo');

$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = "projeto_biblioteca";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $empId = $_POST["empId"];
    $titulo = $_POST['titulo'];
    $nome = $_POST['nome'];
    $inicioEmp = date('Y-m-d', strtotime($_POST['inicioEmp'])); // Converter para ano-mês-dia
    $fimEmp = date('Y-m-d', strtotime($_POST['fimEmp'])); // Converter para ano-mês-dia
    $renovado = $_POST['renovado'];


    // Atualizar as informações do livro no banco de dados
    $sql = "UPDATE emprestimo SET titulo='$titulo', nome='$nome', inicioEmp='$inicioEmp', fimEmp='$fimEmp', renovado='1' WHERE id='$empId'";

    if ($conn->query($sql) === TRUE) {
        // Redirecionar o usuário de volta à página de gerenciamento de livros
        echo "<script>window.location.href = 'meusEmp.php';</script>";
        exit(); // Certifique-se de sair do script após o redirecionamento
    } else {
        echo "Erro ao atualizar o empréstimo: " . $conn->error;
    }
}

// Consulta para obter as informações do livro a ser atualizado
if (isset($_GET['id'])) {
    $empId = $_GET['id'];
    $sql = "SELECT * FROM emprestimo WHERE id = '$empId'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $empId = $row['id'];
        $titulo = $row['titulo'];
        $nome = $row['nome'];
        $inicioEmp = date('Y-m-d', strtotime($row['inicioEmp'])); // Converter para ano-mês-dia
        $fimEmp = date('Y-m-d', strtotime($row['fimEmp'])); // Converter para ano-mês-dia
        $renovado = $row['renovado'];
    
    } else {
        echo "Empréstimo não encontrado.";
    }
}

// Fechar a conexão com o banco de dados
$conn->close();
?>

<title>Formulário de Registro</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
    
<div style="display: flex; justify-content: center; padding-bottom: 20px; padding-top: 15;">
    <form style="background-color: #f7f7f7; box-shadow: 0px 0px 15px #666; width: 55%; border-radius: 15px;" method="post" action="renovar.php" id="formlogin" name="formlogin">
        <div style="padding: 50px; display: flex; flex-wrap: wrap;">
            <div style="padding-bottom: 25px; width: 100%; display: block;">
                <h2 style="display: flex; justify-content: center; color: rgba(17, 27, 88, 0.7);">Atualizar Empréstimo</h2>
            </div>
            <input type="hidden" name="empId" value="<?php echo $empId; ?>">
            <div style="width: 100%; padding-bottom: 12px;">
                <label style="float: left; padding-bottom: 5px; width: 100px;" for="titulo">Livro</label><br>
                <input style="flex: 1; border: 2px solid #333; height: 55px; background-color: #eee; color: #333; padding: 10px; margin: 10px; border-radius: 5px;" type="text" id="titulo" name="titulo" value="<?php echo $titulo; ?>" readonly>
            </div>
            <div style="width: 100%; padding-bottom: 12px;">
                <label style="float: left; padding-bottom: 5px; width: 100px;" for="nome">Usuário</label><br>
                <input style="flex: 1; border: 2px solid #333; height: 55px; background-color: #eee; color: #333; height: 55px; padding: 10px; margin: 10px; border-radius: 5px;" type="text" id="nome" name="nome" value="<?php echo $nome; ?>" readonly>
            </div>
            <div style="width: 100%; padding-bottom: 12px; display: flex;">
                <div style="flex: 1;">
                    <label style="float: left; padding-bottom: 5px;" for="inicioEmp">Início do Empréstimo</label><br>
                    <input style="width: 100%; border: 2px solid #333; height: 55px; background-color: #eee; color: #333; height: 55px; padding: 10px; margin: 10px; border-radius: 5px;"type="date" id="inicioEmp" name="inicioEmp" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime('+0 days')); ?>" value="<?php echo $inicioEmp; ?>" readonly>
                    </div>
                <div style="flex: 1; margin-left: 20px;">
                    <label style="float: left; padding-bottom: 5px;" for="fimEmp">Fim do Empréstimo</label><br>
                    <input style="width: 100%; border: 2px solid #ccc; height: 55px; padding: 10px; margin: 10px; border-radius: 5px;" type="date" id="fimEmp" name="fimEmp" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime('+7 days')); ?>" value="<?php echo $fimEmp; ?>">
                </div>
            </div>
            <div style="width: 100%; display: flex; justify-content: flex-end; align-items: center;">
                <button type="submit">Renovar</button>
        </div>
        </div>
    </form>
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
                <p class="mb-2"><i class=""></i>Agradecemos por nos visitar! Esperamos que você retorne sempre à Magic Book Library para explorar novos livros e continuar desfrutando da nossa vasta seleção. Estamos aqui para acompanhá-lo em sua jornada de leitura.</p>
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