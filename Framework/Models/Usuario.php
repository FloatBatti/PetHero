<?php
namespace Models;

abstract class Usuario {
    private $id;
    private $username;
    private $dni;
    private $nombre;
    private $apellido;
    private $correoelectronico;
    private $password;
    private $telefono;
    private $direccion;
        
    
    public function get_username(){
        return $this->username;
    }
    public function get_dni(){
        return $this->password;
    }
    public function get_nombre(){
        return $this->username;
    }
    public function get_apellido(){
        return $this->password;
    }
    public function get_correoelectronico(){
        return $this->username;
    }
    public function get_password(){
        return $this->password;
    }
    public function set_username($username){
        $this->username=$username;
    }
    public function set_dni($dni){
        $this->dni=$dni;
    }
    public function set_nombre($nombre){
        $this->nombre=$nombre;
    }
    public function set_apellido($apellido){
        $this->apellido=$apellido;
    }
    public function set_correoelectronico($email){
        $this->correoelectronico=$email;
    }
    public function set_password($pass){
        $this->password=$pass;
    }
     
    public function getTelefono()
    {
        return $this->telefono;
    }
 
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

    }
    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

    }

    public function setId($id)
    {
        $this->id = $id;

    }


    public function getId()
    {
        return $this->id;
    }
}
?>