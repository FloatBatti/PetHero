<?php 

namespace DAO;

use Models\Guardian as Guardian;

interface IGuardianDAO{

    public function GetAll();
    public function Add(Guardian $objeto);

}



?>