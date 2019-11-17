<?php 
class publicaciones{
    public $id;
    public $titulo;
    public $contenido;
    public $fecha;
    public $idUsuario;

    public function InitializeData($id, $titulo, $contenido, $fecha,$idUser){
        $this->id = $id;
        $this->titulo = $titulo;
        $this->contenido = $contenido;
        $this->fecha = $fecha;
        $this->idUsuario = $idUser;
    }
}
?>