<?php   
namespace Models;

use Models\Usuario;

class Dueño extends Usuario{

    private $mascotas;
    private $guardianesFav;
    private $reviews;

    
    public function getReviews()
    {
        return $this->reviews;
    }
    public function setReviews($reviews)
    {
        $this->reviews = $reviews;
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
    