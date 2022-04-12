<?php
class Cuota{
    private $numero;
    private $monto_cuota;
    private $monto_interes;
    private $cancelada; //Boolean 

    public function __construct($ID, $montoCuota, $montoInteres, $cuotaCancelada)
    {
        $this->numero = $ID;
        $this->monto_cuota = $montoCuota;
        $this->monto_interes = $montoInteres;
        $this->cancelada = $cuotaCancelada;
    }

    public function getNumero(){
        return $this->numero;
    }

    public function setNumero($nuevoID){
        $this->numero = $nuevoID;
    }

    public function get()
    {
    }

    public function set()
    {
    }

    public function get()
    {
    }

    public function set()
    {
    }

    public function get()
    {
    }

    public function set()
    {
    }








    public function __toString()
    {
        
    }
}