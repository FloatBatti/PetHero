<?php
namespace DAO;

use DAO\Connection;

use DAO\IUserDAO as IUserDAO;
use Models\Usuario as Usuario;
use Exception;

class UserDAO implements IUserDAO{
    
    private $connection;

    public function GetAll(){

        
    }

    public function returnLogedUser($username, $password){

        try {

            $query = "SELECT 
            u.id_usuario, u.tipo_usuario
            FROM
                usuarios u
            WHERE
                u.username = :username and u.password= :password;";

            $parameters["username"] = $username;
            $parameters["password"] = $password;

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query, $parameters);

            $homeSet = array();

            if($resultSet){

                array_push($homeSet, $resultSet[0]["tipo_usuario"]);
                array_push($homeSet, $resultSet[0]["id_usuario"]);

                return $homeSet;
            }

            return $homeSet;
            
        } catch (Exception $ex) {

            throw $ex;
        }

    }

    public function checkUsuario($username, $dni, $correo)
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

    public function Add(Usuario $user, $tipoUsuario)
    {


        try {
            $query = "INSERT INTO 
                usuarios (username, dni, nombre, apellido, correo, password, telefono, direccion, foto_perfil, tipo_usuario) 
                VALUES(:username, :dni, :nombre, :apellido, :correo, :password, :telefono, :direccion, :foto_perfil, :tipo_usuario);";

            $parameters["username"] = $user->getUsername();
            $parameters["dni"] = $user->getDni();
            $parameters["nombre"] = $user->getNombre();
            $parameters["apellido"] = $user->getApellido();
            $parameters["correo"] = $user->getCorreoelectronico();
            $parameters["password"] = $user->getPassword();
            $parameters["telefono"] = $user->getTelefono();
            $parameters["direccion"] = $user->getDireccion();
            $parameters["foto_perfil"] = $user->getFotoPerfil(); 
            $parameters["tipo_usuario"] = $tipoUsuario;

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);

        } catch (Exception $ex) {
            throw $ex;
        }
    }
    

}