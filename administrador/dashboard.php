<?php

include '../helpers/utilities.php';
include '../helpers/FileHandler/IFileHandler.php';
include '../helpers/FileHandler/JsonFileHandler.php';
include '../database/SADVContext.php';
include '/Publicacion/Publicacion.php';
include '../database/repository/IRepository.php';
include '../database/repository/RepositoryBase.php';
include '../database/repository/RepositoryPublicacion.php';
include '/Publicacion/PublicacionService.php';
include '../PhpMailer/Exception.php';
include '../PhpMailer/PHPMailer.php';
include '../PhpMailer/SMTP.php';
include '../helpers/emailHandler.php';



$utilities = new Utilities();
$service = new PublicacionService("../database");
$listados = $service->GetAll();


?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Inicio</title>

  <!-- Custom fonts for this template-->
  <link href="../styles/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="../styles/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../styles/css/sb-admin.css" rel="stylesheet">

  <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
  <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/libs/css/style.css">
  <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
  <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
  <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
  <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
  <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">

</head>

<body id="page-top">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top"><i class="fa fa-id-card" aria-hidden="true"></i>Tus publicaciones</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="../index.php">Salir</a>
            </li>
            </ul>
        </div>
        </div>
    </nav><br><br><br>
    <div id="content-wrapper">

      <div class="container-fluid">


<?php if (empty($listados)) : ?>

<h2>No hay publicaciones registradas, <a href="<?php echo "Publicacion/add.php?id=".$_GET['id']?>" class="btn btn-primary my-2"><i class="fa fa-plus-square"></i> Agregar nueva publicacion</a> </h2>

<?php else : ?>
    <h5 class="card-header">Publicaciones</h5>
    <a href="<?php echo "Publicacion/add.php?id=".$_GET['id']?>" class="btn btn-primary my-2"><i class="fa fa-plus-square"></i> Agregar nueva publicacion</a> </h2>
<?php foreach($listados as $publicacion):?>
                              <?php if($publicacion->idUsuario==$_GET['id']):?>
        <div class="col-8" style="text-align:center; margin-left: auto;margin-right: auto;">
          <div class="card"style="border:solid;">
              <div class="card-body p-0">
                              
                                <div class="card mb-12 shadow-sm"><?php echo $publicacion->titulo?></div><br><br>
                                <div class="card mb-12 shadow-sm"><?php echo $publicacion->fecha?></div><br><br>
                                <div class="card mb-12 shadow-sm"><?php echo $publicacion->contenido?></div>
                                <div class="btn-group">
                                                <a href="Publicacion/edit.php?id=<?php echo $publicacion->id ?>" class="btn text-white btn-sm btn-outline-secondary btn-warning"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a>
                                                <a href="Publicacion/delete.php?id=<?php echo $publicacion->id ?>" class="btn text-white btn-sm btn-outline-secondary btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</a>
                                            </div>
                              
                  </div>
              </div>
          </div><br><?php endif;?>
                              <?php endforeach;?>
                         
      </div>
      <br>
<?php endif?>
</body>

</html>
