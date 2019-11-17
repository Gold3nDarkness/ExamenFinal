<?php
class usuario{
    public $id;
    public $nombre;
    public $apellido;
    public $foto;
    public $correo;
    public $user;
    public $password;
    public $estado;

    public function InitializeData($Id,$nombre,$apellido,$correo,$user,$password,$estado){
        $this->id = $Id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->correo=$correo;
        $this->user = $user;
        $this->password = $password;
        $this->estado = $estado;

    }
}
?>