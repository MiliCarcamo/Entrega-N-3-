<?php

class PasajeroEspecial extends Pasajero{
    // Atributos propios de la clase
    private $requiereSilla;
    private $requiereAsistencia;
    private $requiereComidaEsp;

    // Constructor de la clase PasajeroEspecial
    public function __construct($nombre, $apellido, $nroDocumento, $nroTelefono, $nroAsiento, $nroTicket, $requiereSilla, $requiereAsistencia, $requiereComidaEsp){
        // Invoco al constructor de la clase padre
        parent::__construct($nombre, $apellido, $nroAsiento, $nroTelefono, $nroAsiento, $nroTicket);
        // Agrego los nuevos atributos
        $this->requiereSilla = $requiereSilla;
        $this->requiereAsistencia = $requiereAsistencia;
        $this->requiereComidaEsp = $requiereComidaEsp;
    }

    // Metodos de acceso

    // GET
    public function getSillaRuedas(){
        return $this->requiereSilla;
    }

    public function getAsistencia(){
        return $this->requiereAsistencia;
    }

    public function getComidaEspecial(){
        return $this->requiereComidaEsp;
    }

    // SET
    public function setSillaRuedas($requiereSilla){
        $this->requiereSilla = $requiereSilla;
    }

    public function setAsistencia($requiereAsistencia){
        $this->requiereAsistencia = $requiereAsistencia;
    }

    public function setComidaEspecial($requiereComidaEsp){
        $this->requiereComidaEsp = $requiereComidaEsp;
    }

    // Metodo toString
    public function __toString(){
        $cadena = '';
        $cadena = parent::__toString();
        $cadena.= "\n Requiere silla de ruedas: ". $this->getSillaRuedas().
        "Requiere asistencia para embarque o desembarque: ". $this->getAsistencia().
        "Requiere comida especial: ". $this->getComidaEspecial();
        return $cadena;
    }

    // /**
    //  * Funcion para determinar si va a requerir algun servicio y retorna si o no
    //  * 
    //  */
    // public function RequiereAlgunServicio($requiere){
    //     $rta = "NO";
    //     if ($requiere) {
    //         $rta = "SI";
    //     }
    //     return $rta;
    // }

    /**
     * Redefino la funcion darPorcentajeIncremento() de la clase padre, ya que no hace lo que necesito
     * Si el pasajero tiene necesidades especiales y requiere silla de ruedas, asistencia y comida especial 
     * entonces el pasaje tiene un incremento del 30%; si solo requiere uno de los servicios prestados entonces el incremento es del 15%
     */
    public function darPorcentajeIncremento(){
        if ($this->getSillaRuedas() && $this->getAsistencia() && $this->getComidaEspecial()) {
            $porcIncremento = 30;
        }elseif ($this->getSillaRuedas() || $this->getAsistencia() || $this->getComidaEspecial()) {
            $porcIncremento = 15;
        }
        return $porcIncremento;
    }
    
}


?>