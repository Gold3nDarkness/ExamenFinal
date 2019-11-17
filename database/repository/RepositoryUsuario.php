<?php
class RepositoryUsuario extends RepositoryBase
{
    public $usuario;
    public $utility;
    function __construct($db)
    {
        $this->usuario = new usuario();
        $this->utility = new Utilities();
        parent::__construct($db);
    }
    public function GetAll($entity = null)
    {
        return parent::GetAll($this->usuario);
    }
    public function GetAllActive($entity = null, $field = null)
    {
        return parent::GetAllActive($this->usuario, $field);
    }
    public function GetAllInactive($entity = null, $field = null)
    {
        return parent::GetAllInactive($this->usuario, $field);
    }
    public function GetById($id, $field = null, $entity = null)
    {
        return parent::GetById($id, $field, $this->usuario);
    }
    public function Update($entity, $field = null)
    {
        return parent::Update($entity, $field = null);
    }
    public function ChangeStatus($id, $value, $fieldStatus = null,$field = null, $entity = null)
    {
        return parent::ChangeStatus($id, $value, $fieldStatus,$field, $this->usuario );
    }
    public function Add($entity)
    {
        return parent::Add($entity);
    }
    public function Delete($id,$entity=null, $field = null)
    {
        return parent::Delete($id,$this->usuario);
    }
}