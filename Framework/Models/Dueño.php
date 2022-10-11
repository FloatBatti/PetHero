<?php   
namespace Models;

use Models\Usuario;

class Dueño extends Usuario{

    private $mascotas = array();
    private $guardianesFav = array();

    public function agregarMascota($mascota){

        array_push($this->mascotas, $mascota);
    }

    public function agregarGuardFav($guardian){
        
        array_push($this->guardianesFav, $guardian);

    }
    public function getGuardianesFav()
    {
        return $this->guardianesFav;
    }
    public function setGuardianesFav($guardianesFav)
    {
        $this->guardianesFav = $guardianesFav;
    }
    public function getMascotas()
    {
        return $this->mascotas;
    }
    public function setMascotas($mascotas)
    {
        $this->mascotas = $mascotas;
    }
}
    