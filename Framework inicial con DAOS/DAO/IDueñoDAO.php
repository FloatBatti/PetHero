<?php 

namespace DAO;
use Models\Dueño as Dueño;

interface IDueñoDAO{

    public function GetAll();
    public function Add(Dueño $objeto);
    

}



?>