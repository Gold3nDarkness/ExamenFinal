<?php
class UsuarioService
{
    public $context;
    public $utility;
    public $repository;
    public $emailHandler;
    function __construct($directory)
    {
        $this->context = new SADVContext($directory);
        $this->utility = new Utilities();
        $this->repository = new RepositoryUsuario($this->context->db);
        $this->emailHandler = new EmailHandler();
    }
    public function GetById($id, $field = null)
    {
        return $this->repository->GetById($id, $field);
    }
    public function Update($id, $entity, $field = null)
    {
        $element = $this->GetById($id);

        if ($_FILES['foto']) {

            if ($_FILES['foto']['error'] == 4) {
                $entity->foto = $element->foto;
            } else {
                $typeReplace = str_replace("image/", "", $_FILES["foto"]["type"]);
            $type =  $_FILES["foto"]["type"];
            $size =  $_FILES["foto"]["size"];
            $name = 'img/' . $entity->user . '.' . $typeReplace;

            $sucess = $this->utility->uploadImage("../Usuario/img", $name, $_FILES['foto']['tmp_name'], $type, $size);

                if ($sucess) {
                    $entity->foto = $name;
                }
            }
        }
        return $this->repository->Update($entity, $field);
    }
    public function Add($entity)
    {
        if ($_FILES['foto']) {

            $typeReplace = str_replace("image/", "", $_FILES["foto"]["type"]);
            $type =  $_FILES["foto"]["type"];
            $size =  $_FILES["foto"]["size"];
            $name = 'img/' . $entity->user . '.' . $typeReplace;

            $sucess = $this->utility->uploadImage("Usuario/img", $name, $_FILES['foto']['tmp_name'], $type, $size);

            if ($sucess) {
                $entity->foto = $name;
            }
        }
        $this->emailHandler->SendEmail($entity);
        return $this->repository->Add($entity);
        
    }
    public function GetAll()
    {
        return $this->repository->GetAll();
    }
    public function GetAllActive()
    {
        return $this->repository->GetAllActive();
    }
    public function ChangeStatus($id, $value, $fieldStatus = null, $field = null, $entity = null)
    {
        return $this->repository->ChangeStatus($id, $value, $fieldStatus, $field, $entity);
    }
    public function Delete($id)
    {
        return $this->repository->Delete($id);
    }
    public function GetAllInactive()
    {
        return $this->repository->GetAllInactive();
    }
}