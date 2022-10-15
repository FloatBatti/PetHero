<?php
namespace Controllers;

class HomeController{
    
    public function Index(){

        require_once(VIEWS_PATH."index.php");

    }

    public function Eleccion(){
        
        require_once(VIEWS_PATH."filtroRegistro.php");
    }
}
?>