<?php 

namespace Models;

use Models\Usuario;

class Guardian extends Usuario{

    private $disponibilidad;
    private $tipoMascota;
    private $fotoEspacioURL;
    private $descripcion;    
    private $reviews;

    
    public function getDisponibilidad()
    {
        return $this->disponibilidad;
    }

    public function setDisponibilidad($disponibilidad)
    {
        $this->disponibilidad = $disponibilidad;

        return $this;
    }
 
    public function getTipoMascota()
    {
        return $this->tipoMascota;
    }

    public function setTipoMascota($tipoMascota)
    {
        $this->tipoMascota = $tipoMascota;

        return $this;
    }

    public function getFotoEspacioURL()
    {
        return $this->fotoEspacioURL;
    }

    public function setFotoEspacioURL($fotoEspacioURL)
    {
        $this->fotoEspacioURL = $fotoEspacioURL;

        return $this;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getReviews()
    {
        return $this->reviews;
    }

    public function setReviews($reviews)
    {
        $this->reviews = $reviews;

        return $this;
    }
}



?>