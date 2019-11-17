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

$utilities = new Utilities();
$service = new PublicacionService("../../database");
$listado= $service->getAll();

$eliminando = $service->Delete($id);

header("Location:../dashboard.php?id=".$element->idUsuario);
exit();


?>