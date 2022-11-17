<?php
namespace Models;

class Review{

    private $id;
    private $fecha;
    private $autorID;//Quien realiza
    private $userID; //Quien recibe
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
 
    public function getUserID()
    {
        return $this->userID;
    }

    public function setUserID($user)
    {
        $this->userID = $user;

        return $this;
    }

    public function getAutorID()
    {
        return $this->autorID;
    }

    public function setAutorID($autor)
    {
        $this->autorID = $autor;

    }
}
?>