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
    // METODOS DE ACCESO
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
        return $this->coleccion_prestamos_otorgados;
    }

    public function setArrayPrestamosOtorgados($nuevaColeccion){
        $this->coleccion_prestamos_otorgados = $nuevaColeccion;
    }
    // FIN METODOS DE ACCESO

    // METODO __toString
    public function __toString(){
        $res = "--------------------------------\nDenominacion: {$this->getDenominacion()} \nDireccion: {$this->getDireccion()} \nPrestamos Otorgados: {$this->coleccionPrestamosStr()}--------------------------------\n";
        return $res;
    }
    // FIN METODO __toString
    
    // FUNCIONALIDAD O COMPORTAMIENTO DE LA CLASE
    public function incorporarPrestamo($nuevoPrestamo){
        $nueva_coleccion = $this->getArrayPrestamosOtorgados();
        array_push($nueva_coleccion, $nuevoPrestamo);
        $this->setArrayPrestamosOtorgados($nueva_coleccion);
    }
    
    
    /* Implementar el método otorgarPrestamoSiCalifica, método que recorre la lista de prestamos que no
    han sido generadas sus cuotas. Por cada préstamo, se corrobora que su monto dividido la
    cantidad_de_cuotas no supere el 40 % del neto del solicitante, si la verificación es satisfactoria se invoca
    al método otorgarPrestamo. */
    public function otorgarPrestamoSiCalifica(){

        $lenghtArray = count($this->getArrayPrestamosOtorgados());
        for ($i=0; $i < $lenghtArray ; $i++) { 

            if (count($this->getArrayPrestamosOtorgados()[$i]->getArrayCuotas()) == 0) {

                $objPersona = $this->getArrayPrestamosOtorgados()[$i]->getInstanciaPersona();

                $monto = $this->getArrayPrestamosOtorgados()[$i]->getMonto() ;
                $cantCuotas = $this->getArrayPrestamosOtorgados()[$i]->getCantidadCuotas();
                $montoCuota = $monto / $cantCuotas ;
                if ( ($montoCuota) <= ($objPersona->getNeto() * 0.4)) {

                    $this->getArrayPrestamosOtorgados()[$i]->otorgarPrestamo();

                }
            }
        }
    }

    /* Implementar el método informarCuotaPagar(idPrestamo) que recibe por parámetro la identificación del
    préstamo, se busca el préstamo en la colección de prestamos y si es encontrado se obtiene la siguiente
    cuota a pagar. El método debe retornar la referencia a la cuota. Utilizar para su implementación el método
    darSiguienteCuotaPagar */
    public function informarCuotaPagar($idPrestamo){
        $encontrado = false;
        $siguienteCuota = null;
        $i = 0;
        do {
            if ($idPrestamo == $this->getArrayPrestamosOtorgados()[$i]->getIdPrestamo()) {
                $siguienteCuota = $this->getArrayPrestamosOtorgados()[$i]->darSiguienteCuotaPagar();
                $encontrado = true;
            }
            $i++;
        } while ($i < count($this->getArrayPrestamosOtorgados()) && $encontrado == false);

        return $siguienteCuota;

    }

    public function coleccionPrestamosStr(){
        $str = "";
        foreach ($this->getArrayPrestamosOtorgados() as $indice ) {
            $str .= $indice;
        }
        return $str;
    }
    // FIN DE LA FUNCIONALIDAD O COMPORTAMIENTO DE LA CLASE

}