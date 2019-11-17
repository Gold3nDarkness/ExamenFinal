<?php

include '../helpers/utilities.php';
include '../helpers/FileHandler/IFileHandler.php';
include '../helpers/FileHandler/JsonFileHandler.php';
include '../database/SADVContext.php';
include '/Usuario/Usuario.php';
include '../database/repository/IRepository.php';
include '../database/repository/RepositoryBase.php';
include '../database/repository/RepositoryUsuario.php';
include '/Usuario/UsuarioService.php';
include '../PhpMailer/Exception.php';
include '../PhpMailer/PHPMailer.php';
include '../PhpMailer/SMTP.php';
include '../helpers/emailHandler.php';



$utilities = new Utilities();
$service = new UsuarioService("../database");
$listados = $service->GetAll();



$user = array();
if($listados!=null){
    foreach($listados as $usuario){
       $user[] = $usuario->user;
}
}


if(isset($_POST["nombre"])&&isset($_POST["apellido"])&&isset($_POST["email"])&&isset($_POST["user"])&&isset($_POST['password'])){
    foreach($user as $nombre){
        if($_POST['user']==$nombre){
            echo "<script type='text/javascript'>alert('El usuario ya existe');</script>";
            header("location:Registrate.php");
            exit();
        }
     }
     
       $newEntity = new Usuario();
     $newEntity->InitializeData(0, $_POST["nombre"], $_POST["apellido"],$_POST["email"],$_POST["user"],$_POST['password'],0);
     $service->Add($newEntity);
    header("Location: ReviseSuCorreo.php"); 
    exit();   
     
     

}

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Bootstrap core CSS -->
    <link href="styles/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="styles/css/scrolling-nav.css" rel="stylesheet">

    <!-- Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <link rel="stylesheet" href="../styles/loginStyles.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrate</title>
</head>

<body>
     <!-- Barra de Navegacion-->   
 
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top"><i class="fa fa-id-card" aria-hidden="true"></i>  Registrate </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="../index.php">Inicio Sesion</a>
            </li>
            </ul>
        </div>
        </div>
    </nav>

    <!-- Formulario -->
    <br><br><br>
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                        <form id="login-form" class="needs-validation" novalidate action="Registrate.php" method="POST" enctype="multipart/form-data">
                            <h3 class="text-center text-info">Registrate</h3>
                            <div class="form-group row">
                                <label for="nombre" class="text-info">Nombre:</label><br>
                                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Escriba su nombre" required/>
                                <div class="invalid-feedback">
                                    Digite su nombre
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="apellido" class="text-info">Apellido:</label><br>
                                <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Escriba su apellido"required/>
                                <div class="invalid-feedback">
                                    Digite su apellido
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="foto" class="text-info">Foto de Usuario:</label><br>
                                <input name ="foto" type="file" class="form-control" id="foto" required/>
                                <div class="invalid-feedback">
                                    Ingrese una imagen
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="text-info">Correo:</label><br>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Escriba su correo electronico"required/>
                                <div class="invalid-feedback">
                                    Digite su correo electronico
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username" class="text-info">Nombre de Usuario:</label><br>
                                <input type="text" name="user" id="user" class="form-control" placeholder="Escriba su usuario" required/>
                                <div class="invalid-feedback">
                                    Digite su nombre de usuario
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="text-info">Contraseña:</label><br>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Escriba una contraseña recordable" required/>
                                <div class="invalid-feedback">
                                    Digite su contraseña
                                </div>
                            </div>
                            <div class="form-group row">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Ingresar"/>
                            </div>
                        </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>

</body>
</html>