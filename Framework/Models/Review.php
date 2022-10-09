<?php
namespace Models;

class Review{
    private $id;
    private $fecha;
    private $calificacion;
    private $comentario;

    
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getFecha()
    {
        return $this->fecha;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }
    public function getCalificacion()
    {
        return $this->calificacion;
    }

    public function setCalificacion($calificacion)
    {
        $this->calificacion = $calificacion;
    }

    public function getComentario()
    {
        return $this->comentario;
    }

    public function setComentario($comentario)
    {
        $this->comentario = $comentario;
    }
}
?>