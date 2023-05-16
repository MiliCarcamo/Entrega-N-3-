<?php

class PasajeroVIP extends Pasajero{
    // Atributos propios de la clase PasajeroVIP
    private $nroViajeroFrecuente;
    private $cantMillas;

    // Metodo constructor propio de la clase
    public function __construct($nombre, $apellido, $nroDocumento, $nroTelefono, $nroAsiento, $nroTicket, $nroViajeroFrecuente, $cantMillas){
        // Invoco al constructor de la clase padre (Pasajero)
        parent::__construct($nombre, $apellido, $nroDocumento, $nroTelefono, $nroAsiento, $nroTicket);
        // Agrego los nuevos atributos
        $this->nroViajeroFrecuente = $nroViajeroFrecuente;
        $this->cantMillas = $cantMillas;
    }

    // Metodos de acceso

    // GET
    public function getNroViajeroFrecuente(){
        return $this->nroViajeroFrecuente;
    }

    public function getCantMillas(){
        return $this->cantMillas;
    }

    // SET
    public function setNroViajeroFrecuente($nroViajeroFrecuente){
        $this->nroViajeroFrecuente = $nroViajeroFrecuente;
    }

    public function setCantMillas($cantMillas){
        $this->cantMillas = $cantMillas;
    }

    // Metodo toString
    public function __toString(){
        $cadena = '';
        $cadena = parent::__toString();
        $cadena.= "\n Numero de viajero frecuente: ". $this->getNroViajeroFrecuente(). 
        "\n Cantidad de millas: ". $this->getCantMillas();
        return $cadena;
    }

    /**
     * Redefino la funcion darPorcentajeIncremento() de la clase padre, ya que no hace lo que necesito
     * Para un pasajero VIP se incrementa el importe un 35% y si la cantidad de millas acumuladas 
     * supera a las 300 millas se realiza un incremento del 30%. 
     */
    public function darPorcentajeIncremento(){
        
    }
    
    
}

?>