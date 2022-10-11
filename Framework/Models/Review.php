<?php
namespace Models;

class Review{

    private $id;
    private $user; //Quien recibe
    private $autor;//Quien realiza
    private $fecha;
    private $calificacion; // 1-5
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
 
    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    public function getAutor()
    {
        return $this->autor;
    }

    public function setAutor($autor)
    {
        $this->autor = $autor;

        return $this;
    }
}
?>