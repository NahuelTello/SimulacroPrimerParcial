<?php
class Persona{
    private $nombre;
    private $apellido;
    private $dni;
    private $direccion;
    private $mail;
    private $telefono;
    private $neto;

    public function __construct($name, $lastName, $direccion, $email, $tel, $net)
    {
        $this->nombre = $name;
        $this->apellido = $lastName;
        $this->direccion = $direccion;
        $this->mail = $email;
        $this->telefono = $tel;
        $this->neto = $net;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nuevoNombre){
        $this->nombre = $nuevoNombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function setApellido($nuevoApellido)
    {
        $this->apellido = $nuevoApellido;
    }

    public function getDni()
    {
        return $this->dni;
    }

    public function setDni($nuevoDni)
    {
        $this->dni = $nuevoDni;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($nuevaDireccion)
    {
        $this->direccion = $nuevaDireccion;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function setMial($nuevoMail)
    {
        $this->mail = $nuevoMail;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($nuevoTelefono)
    {
        $this->telefono = $nuevoTelefono;
    }

    public function getNeto()
    {
        return $this->neto;
    }

    public function setNeto($nuevoNeto)
    {
        $this->neto = $nuevoNeto;
    }

    public function __toString()
    {
        $res = "\nNombre: {$this->getNombre()}\nApellido: {$this->getApellido()}\nDireccion: {$this->getDireccion()}\nMail: {$this->getMail()}\nTelefono: {$this->getTelefono()}\nNeto: {$this->getNeto()}\n--------------------------------";
        return $res;
    }
}