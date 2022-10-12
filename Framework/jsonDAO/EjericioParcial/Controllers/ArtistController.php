<?php 

namespace Controllers;

use jsonDAO\ArtistDAO as ArtistDAO;
use Models\Artist as Artist;

class ArtistController{

    private $artistDAO;

    public function __construct()
    {
        $this->artistDAO = new ArtistDAO();
    }


}


?>