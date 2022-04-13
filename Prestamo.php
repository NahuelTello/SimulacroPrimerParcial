<?php
class Prestamo{
    private $ID_prestamo;
    private $ID_electrodomestico;
    private $fecha_otorgamiento;
    private $monto;
    private $cantidad_de_cuotas;
    private $taza_interes;
    private $coleccion_de_cuotas = []; //cantCuotas, valor de cada cuota
    private $objPersona;

    public function __construct($ID, $montoPrestamo, $cantCuotas, $tazaInteres, $instanciaPersona)
    {
        $this->ID_prestamo = $ID;
        $this->monto = $montoPrestamo;
        $this->cantidadCuotas = $cantCuotas;
        $this->taza_interes = $tazaInteres;
        $this->objetoPersona = $instanciaPersona;
    }

    public function getIdPrestamo(){
        return $this->ID_prestamo;
    }

    public function setIdPrestamo($nuevoId){
        $this->ID_prestamo = $nuevoId;
    }

    public function getIdElectrodomestico(){
        return $this->ID_electrodomestico;
    }

    public function setIdElectrodomestico($nuevoId)
    {
        $this->ID_electrodomestico = $nuevoId;
    }

    public function getFechaOtorgamiento()
    {
        return $this->fecha_otorgamiento;
    }

    public function setFechaOtorgamiento($nuevaFecha)
    {
        $this->fecha_otorgamiento = $nuevaFecha;
    }

    public function getMonto()
    {
        return $this->monto;
    }

    public function setMonto($nuevoMonto)
    {
        $this->monto = $nuevoMonto;
    }

    public function getCantidadCuotas()
    {
        return $this->cantidadCuotas;
    }

    public function setCantidadCuotas($nuevaCantCuotas)
    {
        $this->cantidadCuotas = $nuevaCantCuotas;
    }

    public function getTazaInteres()
    {
        return $this->taza_interes;
    }

    public function setTazaInteres($nuevoInteres)
    {
        $this->taza_interes = $nuevoInteres;
    }

    public function getArrayCuotas(){
        return $this->coleccion_de_cuotas;
    }

    public function setArrayCuotas($nuevaColeccion)
    {
        $this->coleccion_de_cuotas = $nuevaColeccion;
    }

    public function getInstanciaPersona(){
        return $this->objPersona;
    }

    public function setInstanciaPersona($nuevaInstancia){
        $this->objPersona = $nuevaInstancia;
    }


    /**
     * Calcula el importe del interes sobre el saldo deudor
     * 
     * @param int $numCutoa
     * @return float
     */
    public function calcularInteresPrestamo($numCuota){
        $getMonto = $this->getMonto();
        $getCantCuotas = $this->getCantidadCuotas();
        $getTazaInteres = $this->getTazaInteres();
        $interes = ( $getMonto - ( ($getMonto/$getCantCuotas ) * ( $numCuota - 1 ) ) ) * $getTazaInteres / 0.01;
        return $interes;
    }

    /**
     * 
     * @param void
     * @return void
     */
    public function otorgarPrestamo(){
        $nuevaFecha = getdate();
        $this->setFechaOtorgamiento($nuevaFecha);
        $coleccion = $this->getArrayCuotas();
        $montoCuota = $this->getMonto() / $this->getCantidadCuotas();
        
        for ($i=0; $i < $this->getCantidadCuotas() ; $i++) {
            $interes = $this->calcularInteresPrestamo($i + 1);
            $objCuota = new Cuota($i+1, $montoCuota, $interes); //Crea una nueva instancia cuota para crear una cuota
            $coleccion[$i] = $objCuota;
        }
        $this->setArrayCuotas($coleccion);
    }
    //Implementar el método darSiguienteCuotaPagar método que retorna la referencia a la siguiente cuota
    //que debe ser abonada de un préstamo, si el préstamo tiene todas sus cuotas canceladas retorna null.
    public function darSiguienteCuotaPagar(){
        $objSigCuota = null;
        $coleccion = $this->getArrayCuotas();
        $i=0;
        while ( ($objSigCuota == null) && ($i < count($coleccion))) {
            $objCuota = $coleccion[$i];
            if (!$objCuota->getCuotaCancelada()) {
                $objSigCuota = $objCuota;
            }
            $i++;
        }
        return $objSigCuota;
    }

    public function cuotasToString(){
        $coleccion = $this->getArrayCuotas();
        $str= "";
        foreach ($coleccion as $indice => $elemento) {
            $str = $str.$elemento;
        }
        return $str;
    }

    public function __toString()
    {
        $objetoPersona = $this->getInstanciaPersona();
        $res = "ID PRESTAMO: {$this->getIdPrestamo()} \nID ELECTRODOMESTICO: {$this->getIdElectrodomestico()} \nFecha de otorgamiento: {$this->getFechaOtorgamiento()} \nMonto: $ {$this->getMonto()} \nCantidad de Cuotas: {$this->getCantidadCuotas()} \nTaza de Interés: {$this->getTazaInteres()} \nColeccion Cuotas: {$this->cuotasToString()} \nDatos de la Persona: {$objetoPersona->getNombre()} {$objetoPersona->getApellido()} - DNI {$objetoPersona->getDni()}";
        return $res;
    }
}