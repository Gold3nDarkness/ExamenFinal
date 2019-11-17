<?php 

include '../../helpers/utilities.php';
include '../../helpers/FileHandler/IFileHandler.php';
include '../../helpers/FileHandler/JsonFileHandler.php';
include '../../database/SADVContext.php';
include 'Usuario.php';
include '../../database/repository/IRepository.php';
include '../../database/repository/RepositoryBase.php';
include '../../database/repository/RepositoryUsuario.php';
include 'UsuarioService.php';
include '../../helpers/emailHandler.php';
include '../../PhpMailer/Exception.php';
include '../../PhpMailer/PHPMailer.php';
include '../../PhpMailer/SMTP.php';


$utilities = new Utilities();
$service = new UsuarioService("../../database");
$listado= $service->getAll();
$id =0;
foreach($listado as $usuarios){
    if($usuarios->user==$_GET['id']){
        $id = $usuarios->id;
    }
}

$cambioEstado = $service->ChangeStatus($id,1);

header('location:../../index.php');
 exit();


?>