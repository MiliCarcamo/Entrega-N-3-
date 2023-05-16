<?php

class Pasajero{
    //Atributos
    private $nombre;
    private $apellido;
    private $nroDocumento;
    private $nroTelefono;
    // Nuevos atributos que pide el TP3, incluido el nombre que ya estaba
    private $nroAsiento;
    private $nroTicket;

    //Metodo constructor
    public function __construct($nombre, $apellido, $nroDocumento, $nroTelefono, $nroAsiento, $nroTicket){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->nroDocumento = $nroDocumento;
        $this->nroTelefono = $nroTelefono;
        $this->nroAsiento = $nroAsiento;
        $this->nroTicket = $nroTicket;
    }

    //Metodos de acceso

    // GET
    public function getNombre(){
        return $this->nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function getNroDocumento(){
        return $this-> nroDocumento;
    }

    public function getNroTelefono(){
        $this->nroTelefono;
    }

    public function getNroAsiento(){
        return $this->nroAsiento;
    }

    public function getNroTicket(){
        return $this->nroTicket;
    }

    // SET
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    public function setNroDocumento($nroDocumento){
        $this->nroDocumento = $nroDocumento;
    }

    public function setNroTelefono($nroTelefono){
        $this->nroTelefono = $nroTelefono;
    }

    public function setNroAsiento($nroAsiento){
        $this->nroAsiento = $nroAsiento;
    }

    public function setNroTicket($nroTicket){
        $this->nroTicket = $nroTicket;
    }

    public function __toString()
    {
        $cadena = '';
        $cadena = "Nombre: ". $this->getNombre().
        "\n Apellido: ". $this->getApellido(). 
        "\n Numero de documento: ". $this->getNroDocumento().
        "\n Numero de telefono: ". $this->getNroTelefono(). 
        "\n Numero de asiento: " . $this->getNroAsiento() . 
        "\n Numero de ticket: ". $this->getNroTicket(); 
        return $cadena;
    }

}
?>