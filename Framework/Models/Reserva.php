<?php
namespace Models;

class Reserva{
    private $id;
    private $fecha;
    private $fechaInicio;
    private $fechaFin;
    private $mascotaID;
    private $guardianID;
    private $dueñoID;
    private $costo;
    private $estado;//pendiente de aprobacion/aceptada/rechazada


 
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
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;
    }
    public function getFechaFin()
    {
        return $this->fechaFin;
    }
    public function setFechaFin($fechaFin)
    {
        $this->fechaFin = $fechaFin;
    }
    public function getMascotaID()
    {
        return $this->mascotaID;
    }
    public function setMascotaID($idMascota)
    {
        $this->mascotaID = $idMascota;
    }
    public function getGuardianID()
    {
        return $this->guardianID;
    }
    public function setGuardianID($guardian)
    {
        $this->guardianID = $guardian;
    }
    public function getDueñoID()
    {
        return $this->dueñoID;
    }
    public function setDueñoID($dueño)
    {
        $this->dueñoID = $dueño;
    }
    public function getCosto()
    {
        return $this->costo;
    }
    public function setCosto($costo)
    {
        $this->costo = $costo;
    }
    public function getEstado()
    {
        return $this->estado;
    }
    public function setEstado($estado)
    {
        $this->estado = $estado;

    }
}



?>