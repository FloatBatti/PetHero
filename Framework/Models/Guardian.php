<?php 

namespace Models;

use Models\Usuario;

class Guardian extends Usuario{

    private $disponibilidad = array();
    private $horarioIncio;
    private $horarioFin;
    private $tipoMascota = array();
    private $fotoEspacioURL;
    private $descripcion;    
    
    public function getDisponibilidad()
    {
        return $this->disponibilidad;
    }

    public function pushDisponibilidad($dia)
    {      
        array_push( $this->disponibilidad, $dia);
    }
 
    public function getTipoMascota()
    {
        return $this->tipoMascota;
    }

    public function pushTipoMascota($tipoMascota)
    {
        array_push($this->tipoMascota, $tipoMascota);
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


    public function getHorarioIncio()
    {
        return $this->horarioIncio;
    }

    public function setHorarioIncio($horarioIncio)
    {
        $this->horarioIncio = $horarioIncio;

    }

    public function getHorarioFin()
    {
        return $this->horarioFin;
    }

    public function setHorarioFin($horarioFin)
    {
        $this->horarioFin = $horarioFin;

    }
}

?>