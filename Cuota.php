<?php
class Cuota{
    private $numero;
    private $monto_cuota;
    private $monto_interes;
    private $cancelada = false; //Boolean 

    public function __construct($ID, $montoCuota, $montoInteres)
    {
        $this->numero = $ID;
        $this->monto_cuota = $montoCuota;
        $this->monto_interes = $montoInteres;
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

    //Implementar el método darMontoFinalCuota() que retorna el importe total de la cuota mas los intereses que deben ser aplicados.
    /**
     * Retorna el importe total de la cuota mas los intereses que deben ser aplicados
     * @param void
     * @return void
     */
    public function darMontoFinalCuota(){
        $montoCuota = $this->getMontoCuota();
        $interes = $this->getMontoInteres();
        $montoFinal = $montoCuota + $interes;
        return $montoFinal;
    }

    public function __toString()
    {
        $str = "\nNumero Cuota: {$this->getNumero()}
        \nMonto Cuota:$ {$this->getMontoCuota()}
        \nMonto Interes:$ {$this->getMontoInteres()}
        \nCuota Cancelada: {$this->getCuotaCancelada()}";
        return $str;
    }
}