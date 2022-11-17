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
        
    
    public function getUsername(){
        return $this->username;
    }
    public function getDni(){
        return $this->dni;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function getCorreoelectronico(){
        return $this->correoelectronico;
    }
    public function getPassword(){
        return $this->password;
    }
    public function setUsername($username){
        $this->username=$username;
    }
    public function setDni($dni){
        $this->dni=$dni;
    }
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function setApellido($apellido){
        $this->apellido=$apellido;
    }
    public function setCorreoelectronico($email){
        $this->correoelectronico=$email;
    }
    public function setPassword($pass){
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