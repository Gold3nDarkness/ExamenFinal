<?php 

include '../../helpers/utilities.php';
include '../../helpers/FileHandler/IFileHandler.php';
include '../../helpers/FileHandler/JsonFileHandler.php';
include '../../database/SADVContext.php';
include 'Publicacion.php';
include '../../database/repository/IRepository.php';
include '../../database/repository/RepositoryBase.php';
include '../../database/repository/RepositoryPublicacion.php';
include 'PublicacionService.php';

$utilities = new Utilities();
$service = new PublicacionService("../../database");

// Validacion de POST
$containId = isset($_GET['id']);
$element = null;

if ($containId) {
    $id = $_GET['id'];
    $element = $service->GetByID($id);
    
}   


// Validacion de POST

if(isset($_POST['titulo']) && isset($_POST['contenido'])){

 $updateEntity = new publicaciones();
 $updateEntity->InitializeData($id, $_POST['titulo'], $_POST['contenido'],$element->fecha,$element->idUsuario);
 var_dump($updateEntity);
 $service->Update($updateEntity);
 header("Location:../dashboard.php?id=".$element->idUsuario);
  exit(); 
}


?>

<!DOCTYPE html>
<html lang="en">
<html>
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>Editar</title>

<!-- Custom fonts for this template-->
<link href="../../styles/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

<!-- Page level plugin CSS-->
<link href="../../styles/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

<!-- Custom styles for this template-->
<link href="../../styles/css/sb-admin.css" rel="stylesheet">

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
  <?php if ($containId && !empty($element)) : ?>
<main role="main">

    <div style="margin-top: -1%;margin-bottom: 5%;" class="card">
        <div class="card-header text-white bg-primary">
Editar Publicacion
        </div>
        <div class="card-body">


            <form method="POST" action="edit.php?id=<?php echo $element->id ?>" enctype="multipart/form-data">

                <div class="col-md-4">
                    <div class="form-group">

                        <label for="InputName">Titulo</label>
                        <input type="text" name="titulo" class="form-control" value="<?php echo $element->titulo;?>" id="InputName" placeholder="Introduzca el titulo">

                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">

                        <label for="InputTechniques">Tecnicas</label>
                        <textarea name="contenido" class="form-control" id="InputTechniques"  aria-describedby="TechniquesHelp" placeholder="Introduzca el contenido"> <?php echo $element->contenido?></textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary"><i class="fa fa-plus-square"></i> Crear</button>
            </form>

        </div>
    </div>
    <?php else : ?>

<h2>No existe</h2>

<?php endif; ?>
</main>
</body>
</html>