<?php

namespace Models;

class Mascota{

    private $id;
    private $nombre;
    private $raza;
    private $peso;
    private $fotoURL;
    private $planVacURL;
    private $videoURL;


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        
    }

    public function getRaza()
    {
        return $this->raza;
    }

    public function setRaza($raza)
    {
        $this->raza = $raza;
    }

    public function getPeso()
    {
        return $this->peso;
    }

    public function setPeso($peso)
    {
        $this->peso = $peso;  
    }

    public function getFotoURL()
    {
        return $this->fotoURL;
    }

 
    public function setFotoURL($fotoURL)
    {
        $this->fotoURL = $fotoURL; 
    }


    public function getPlanVacURL()
    {
        return $this->planVacURL;
    }


    public function setPlanVacURL($planVacURL)
    {
        $this->planVacURL = $planVacURL;
    }

    public function getVideoURL()
    {
        return $this->videoURL;
    }


    public function setVideoURL($videoURL)
    {
        $this->videoURL = $videoURL;

        
    }
}

?>