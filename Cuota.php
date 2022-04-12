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

    public function getMontoCuota()
    {
        return $this->monto_cuota;
    }

    public function setMontoCuota($nuevoMonto)
    {
        $this->monto_cuota = $nuevoMonto;
    }

    public function getMontoInteres()
    {
        return $this->monto_interes;
    }

    public function setMontoInteres($nuevoMonto)
    {
        $this->monto_interes = $nuevoMonto;
    }

    public function getCuotaCancelada()
    {
        return $this->cancelada;
    }

    public function setCuotaCancelada($nuevaCancelacion)
    {
        $this->cancelada = $nuevaCancelacion;
    }








    public function __toString()
    {
        
    }
}