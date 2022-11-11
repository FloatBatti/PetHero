<?php
namespace DAO;


use Models\Mensaje as Mensaje;
use \Exception as Exception;


class MensajeDAO{

    private $connection;

    function __construct(){
        
    }
    public function GetMsg($id)
    {
      $listaMensajes = array();
        
      $query ="SELECT 
      fecha, 
      id_emisor,
      id_receptor,
      contenido 
      from mensajes 
      
      order by fecha;";
           //where (id_emisor = :id_usuario and id_receptor = :id) or (id_emisor = :id and id_receptor = :id_usuario)   
            $parameters["id_usuario"]=$_SESSION["UserId"];
            $parameters["id"]=$id;

            $this->connection = Connection::GetInstance();

            try {

                $resultSet = $this->connection->Execute($query);
    
                foreach($resultSet as $reg){
    
                    $mensaje=new Mensaje();
                    $mensaje->setFecha($reg["fecha"]);
                    $mensaje->setEmisor($reg["id_emisor"]);
                    $mensaje->setReceptor($reg["id_receptor"]);
                    $mensaje->setContenido($reg["contenido"]);
                  
    
                    array_push($listaMensajes,$mensaje);
    
                }
                return $listaMensajes;

            } catch (Exception $ex) {
    
                throw $ex;
            }
    }
    public function Add($mensaje){


        $query = "INSERT INTO
        mensajes
        (fecha,id_emisor,id_receptor,contenido)
        values(current_timestamp(),5,7, contenido),
        :fecha, :id_emisor,:id_receptor,:contenido;";
 

        $parameters["fecha"] = $mensaje->getFecha();
        $parameters["id_emisor"] =$mensaje->getEmisor();
        $parameters["id_receptor"] =$mensaje->getReceptor();
        $parameters["contenido"] =$mensaje->getContenido();

        $this->connection = Connection::GetInstance();   

        try {
            return $this->connection->ExecuteNonQuery($query, $parameters);
        }
        catch (Exception $ex) {
            throw $ex;
        }

    }


}

?>