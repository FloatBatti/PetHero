<?php
namespace DAO;

use DAO\Connection;

use Models\Usuario as Usuario;
use Exception;
use DAO\DueñoDAO as DueñoDAO;
use DAO\GuardianDAO as GuardianDAO;
use Models\Dueño;

class UserDAO{
    
    private $connection;


    public function GetAll(){

        
    }

    public function retornarUsuarioLogueado($username, $password){

        try {

            $guardianDAO = new GuardianDAO();
            $dueñoDAO = new DueñoDAO();

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

            //Hasta aca es todo Base de datos

            $usuario = null;
            
            //Si el tipo de usuario es G llamamos a la funcion que nos retorna el guardian
            if($resultSet[0]["tipo_usuario"] == "G"){

                return $usuario = $guardianDAO->devolverGuardianPorId($resultSet[0]["id_usuario"]);
            }
            //Si el tipo de usuario es D llamamos a la funcion que nos retorna el dueño
            else if($resultSet[0]["tipo_usuario"] == "D"){

                return $usuario = $dueñoDAO->devolverDueñoPorId($resultSet[0]["id_usuario"]);
            }
            
            return $usuario; //Retorna null si no existe o devuelve el objeto en caso de existir
               
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

            return $this->connection->Execute($query, $parameters);
            
        } catch (Exception $ex) {

            throw $ex;
        }
    }

    public function AddGuardian(Usuario $guardian)
    {

        $guardianDAO = new GuardianDAO();

        try {

            $query = "INSERT INTO 
                usuarios (username, dni, nombre, apellido, correo, password, telefono, direccion, foto_perfil, tipo_usuario) 
                VALUES(:username, :dni, :nombre, :apellido, :correo, :password, :telefono, :direccion, :foto_perfil, :tipo_usuario);";

            $parameters["username"] = $guardian->getUsername();
            $parameters["dni"] = $guardian->getDni();
            $parameters["nombre"] = $guardian->getNombre();
            $parameters["apellido"] = $guardian->getApellido();
            $parameters["correo"] = $guardian->getCorreoelectronico();
            $parameters["password"] = $guardian->getPassword();
            $parameters["telefono"] = $guardian->getTelefono();
            $parameters["direccion"] = $guardian->getDireccion();
            $parameters["foto_perfil"] = $guardian->getFotoPerfil(); 
            $parameters["tipo_usuario"] = "G";

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);

            return $guardianDAO->Add($guardian);
            
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    
    public function AddDueño(Usuario $dueño)
    {
        $dueñoDAO = new DueñoDAO();

        try {

            $query = "INSERT INTO 
                usuarios (username, dni, nombre, apellido, correo, password, telefono, direccion, foto_perfil, tipo_usuario) 
                VALUES(:username, :dni, :nombre, :apellido, :correo, :password, :telefono, :direccion, :foto_perfil, :tipo_usuario);";

            $parameters["username"] = $dueño->getUsername();
            $parameters["dni"] = $dueño->getDni();
            $parameters["nombre"] = $dueño->getNombre();
            $parameters["apellido"] = $dueño->getApellido();
            $parameters["correo"] = $dueño->getCorreoelectronico();
            $parameters["password"] = $dueño->getPassword();
            $parameters["telefono"] = $dueño->getTelefono();
            $parameters["direccion"] = $dueño->getDireccion();
            $parameters["foto_perfil"] = $dueño->getFotoPerfil(); 
            $parameters["tipo_usuario"] = "D";

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);

            return $dueñoDAO->Add($dueño);

        } catch (Exception $ex) {
            throw $ex;
        }
    }
    public function AddFavorito($id){
            
            
        try{
            $query = "CALL agregar_favorito(" . $_SESSION["UserId"] .",". $id . ");";
            
            $this->connection = Connection::GetInstance();
            return $this->connection->ExecuteNonQuery($query);
         
        }
        catch(Exception $ex){
            throw $ex;
            }
    }
    public function deleteFavorito($idGuardian){
        
        try{
            $query = "CALL borrar_favorito(" . $_SESSION["UserId"] .",". $idGuardian . ");";
            
            $this->connection = Connection::GetInstance();
            $this->connection->ExecuteNonQuery($query);
              
        }
        catch(Exception $ex){
            throw $ex;
            }

    }
    
    public function grabarDatosActualizados($telefono,$direccion,$password){
       
        try{
            $query = "UPDATE usuarios u
                set u.telefono = :telefono, u.direccion=:direccion, u.password=:password WHERE u.id_usuario=:buscado";

               $parameters["telefono"] = $telefono;
               $parameters["direccion"] = $direccion;
               $parameters["password"] = $password;
               $parameters["buscado"] = ($_SESSION["UserId"]);
               
               $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);


        }
        catch (Exception $ex) {
            throw $ex;
        }

    }
    

}
