<?php
namespace DAO;

use DAO\Connection;
use Models\Dueño as Dueño;
use DAO\IDueñoDAO as IDueñoDAO;
use DAO\UserDAO as UserDAO;
use Exception;

class MascotaDAO{
    
    private $connection;

    public function GetAll(){


        
    }


    
    public function Add(Dueño $dueño){

        try {

            $query = "INSERT INTO 
                dueños (id_usuario) 
                values ((select id_usuario from usuarios where username = '" . $dueño->getUsername() . "'));";

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query);


            
        } catch (Exception $ex) {
            throw $ex;
        }

    }

}