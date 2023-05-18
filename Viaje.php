<?php

class Viaje{
    //Atributos
    private $codigoViaje;
    private $destino;
    private $cantMaxPasajeros;
    private $arrayPasajeros;
    private $objResponsableV;
    // Agrego los nuevos atributos que me pide en el enunciado del TP3
    private $costoViaje;
    private $sumaCostosAbonados;

    //Metodo constructor
    public function __construct($codigoViaje, $destino, $cantMaxPasajeros, $arrayPasajeros, $objResponsableV, $costoViaje){
        $this->codigoViaje = $codigoViaje;
        $this->destino = $destino;
        $this->cantMaxPasajeros = $cantMaxPasajeros;
        $this->arrayPasajeros = $arrayPasajeros ;
        $this->objResponsableV = $objResponsableV;
        $this->costoViaje = $costoViaje;
    }

    //Metodos Get
    public function getCodigoViaje(){
        return $this->codigoViaje;
    } 

    public function getDestino(){
        return $this->destino;
    }

    public function getCantMaxPasajeros(){
        return $this->cantMaxPasajeros;
    }

    public function getArrayPasajeros(){
        return $this->arrayPasajeros;
    }

    public function getResponsableV(){
        return $this->objResponsableV;
    }

    public function getCostoViaje(){
        return $this->costoViaje;
    }

    public function getSumaCostosAbonados(){
        return $this->sumaCostosAbonados;
    }

    //Metodos Set
    public function setCodigoViaje($codigoViaje){
        $this->codigoViaje = $codigoViaje;
    }

    public function setDestino($destino){
        $this->destino = $destino;
    }

    public function setCantMaxPasajeros($cantMaxPasajeros){
        $this->cantMaxPasajeros = $cantMaxPasajeros;
    }

    public function setArrayPasajeros($arrayPasajeros){
        $this->arrayPasajeros = $arrayPasajeros;
    }

    public function setResponsableV($objResponsableV){
        $this->objResponsableV = $objResponsableV;
    }

    public function setCostoViaje($costoViaje){
        $this-> costoViaje = $costoViaje;
    }

    public function setSumaCostosAbonados($sumaCostosAbonados){
        $this->sumaCostosAbonados = $sumaCostosAbonados;
    }

    //***************** FUNCIONES *****************

    /**
     * Funcion para agregar pasajeros
     * @param Array $nuevoPasajero
     * @return Array 
     */
    public function agregarPasajero($nuevoPasajero){
        $arrayPasajeros = [];
        $arrayPasajeros = $this->getArrayPasajeros();
        //arra_push inserta uno o mas elementos al final de un array
        array_push($arrayPasajeros, $nuevoPasajero);
        $this->setArrayPasajeros($arrayPasajeros);
    }

    /**
     * Busca la posicion del dni del pasajero
     * @param Int $dni
     * @return Int
     */
    public function buscarIndicePasajero($dni){
        $i=0;
        $indice = -1;
        $bandera = true;
        while ($i < count($this->arrayPasajeros) && $bandera) {
            if ($this->arrayPasajeros[$i]['dni'] == $dni) {
                $indice = $i;
                $bandera = false;
            }
            $i++;
        }
        return $indice;
    }

    /**
     * Modifica los datos de los pasajeros
     * @param Int $indice
     * @param Array $arrayPasajeros
     * @return Array 
     */
    public function modificarDatosPasajeros($indice, $nombreNuevo, $apellidoNuevo ){
        $unPasajero = $this->getArrayPasajeros();
        $unPasajero = $this->arrayPasajeros[$indice]['nombre'] = $nombreNuevo;
        $unPasajero = $this->arrayPasajeros[$indice]['apellido'] = $apellidoNuevo;
        $this->setArrayPasajeros($unPasajero);
    }


    /**
     * Metodo que muestra la cantidad de lugares disponibles
     * @return Int
     */
    public function cantLugaresDisponibles(){
        $lugarDisponible = $this->getCantMaxPasajeros() - count($this->arrayPasajeros);
        return $lugarDisponible;
    }

    /**
     *  venderPasaje($objPasajero) que debe incorporar el pasajero a la colección de pasajeros 
     * (solo si hay espacio disponible), actualizar los costos abonados y retornar el costo 
     * final que deberá ser abonado por el pasajero.
     * @param Obj $objPasajero
     * @return Float
     */
    public function venderPasaje($objPasajero){
        $costoTotal = null;
        $arregloPasajeros = $this->getArrayPasajeros();
        if ($this->hayPasajesDisponible()) {
            array_push($arregloPasajeros, $objPasajero);
            $this->setArrayPasajeros($arregloPasajeros);
            $costo = $this->getCostoViaje();
            $incremento = $objPasajero->darPorcentajeIncremento();
            $costoTotal = $costo + (($incremento/100)*$costo) + $this->getSumaCostosAbonados();
            $this->setSumaCostosAbonados($costoTotal); 
        }
        return $costoTotal;
    }

    /**
     * hayPasajesDisponible() que retorna verdadero si la cantidad de pasajeros del viaje es 
     * menor a la cantidad máxima de pasajeros y falso caso contrario
     * @return Boolean
     */
    public function hayPasajesDisponible(){
        $disponible = false;
        $cantPasajerosEnViaje = count($this->getArrayPasajeros());
        if ($cantPasajerosEnViaje < $this->getCantMaxPasajeros()) {
            $disponible = true;
        }
        return $disponible;
    }


    //Metodo toString
    public function __toString()
    {
        $viaje = $this->getDestino();
        $codigo = $this->getCodigoViaje();
        $capacidadViaje = $this->getCantMaxPasajeros();
        $totalPasajeros = $this->getArrayPasajeros();
        $responsable = $this->getResponsableV();
        $cadena = "El codigo de viaje es: " . $codigo . "\n".
        "El destino es del viaje es: " . $viaje . "\n" . 
        "La capacidad maxima de pasajeros es: " . $capacidadViaje . "\n" .
        "La cantidad de pasajeros a bordo es: " . count($totalPasajeros) . "\n" . 
        "El responsable del viaje es: " . $responsable . "
        El costo del viaje es: ". $this->getCostoViaje() . "\n";
        return $cadena;
    }


}
?>