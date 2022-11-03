<?php
namespace DAO;

use DAO\Connection;
use Models\Dueño as Dueño;
use DAO\InterfaceDAO as InterfaceDAO;
use DAO\UserDAO as UserDAO;
use Exception;

class DueñoDAO implements InterfaceDAO{
    
    private $connection;

    public function GetAll(){

        try{

            $dueñosList = array();

            $query = "SELECT 
            d.id_dueño,
            u.username,
            u.dni,
            u.nombre,
            u.apellido,
            u.correo,
            u.contraseña,
            u.telefono,
            u.foto_perfil
            FROM
            usuarios u
            INNER JOIN
            dueños d ON d.id_usuario = u.id_usuario";

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            foreach($resultSet as $row){

                $dueño = new Dueño();

                $dueño->setId($row["id_dueño"]);
                $dueño->setUsername($row["username"]);
                $dueño->setNombre($row["nombre"]);
                $dueño->setApellido($row["apellido"]);
                $dueño->setDni($row["dni"]);
                $dueño->setDireccion($row["direccion"]);
                $dueño->setTelefono($row["telefono"]);
                $dueño->setCorreoelectronico($row["correo"]);

                array_push($dueñosList, $dueño);

            }

            return $dueñosList;

        }
        catch(Exception $ex){

            throw $ex;
        }
    }

    public function checkDueño($username, $dni, $correo)
    {

        try {

            $query = "SELECT 
            u.username, u.dni, u.correo
            FROM
                usuarios u
            WHERE
                u.username = :username or u.dni= :dni or u.correo = :correo;";

            $parameters["username"] = $username;
            $parameters["dni"] = $dni;
            $parameters["correo"] = $correo;

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query, $parameters);

            return $resultSet;

        } catch (Exception $ex) {

            throw $ex;
        }
    }
    
    public function Add($dueño){

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