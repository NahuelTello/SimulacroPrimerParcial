<?php
class Financiera{
    private $denominacion;
    private $direccion; 
    private $coleccion_prestamos_otorgados = [];

    public function __construct($denominacionFinanciera, $direc)
    {
        $this->denominacion = $denominacionFinanciera;
        $this->direccion = $direc;
    }

    public function getDenominacion(){
        return $this->denominacion;
    }

    public function setDenominacion($nuevaDenominacion){
        $this->denominacion = $nuevaDenominacion;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function setDireccion($nuevaDireccion){
        $this->direccion = $nuevaDireccion;
    }

    public function getArrayPrestamosOtorgados(){
        return $this->coleccionPrestamos;
    }

    public function setArrayPrestamosOtorgados($nuevaColeccion){
        $this->coleccionPrestamos = $nuevaColeccion;
    }


    public function incorporarPrestamo($nuevoPrestamo){
        
    }

    public function otorgarPrestamoSiCalifica(){
        
    }

    public function __toString()
    {
        $res = "";
        return $res;
    }

}