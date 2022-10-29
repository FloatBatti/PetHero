<?php 

namespace Models;

use Models\Usuario;

class Guardian extends Usuario{

    
    private $fechaInicio;
    private $fechaFin;
    private $tipoMascota = array();
    private $fotoEspacioURL;
    private $descripcion;
    private $costo;    
    
    public function setInicio($fechaInicio){

        $this->fechaInicio=$fechaInicio;
    }
    public function getInicio(){

        return $this->fechaInicio;
    }
    public function setFin($fechaFin){

        $this->fechaFin=$fechaFin;
    }
    public function getFin(){

        $this->fechaFin;
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


    public function getCosto()
    {
        return $this->costo;
    }

    public function setCosto($costo)
    {
        $this->costo = $costo;
    }
}

?>