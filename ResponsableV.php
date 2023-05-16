<?php

class ResponsableV{
    //Atributos
    private $nroEmpleado;
    private $nroLicencia;
    private $nombre;
    private $apellido;

    //Metodo Constructor
    public function __construct($nroEmpleado, $nroLicencia, $nombre, $apellido){
        $this->nroEmpleado = $nroEmpleado;
        $this->nroLicencia = $nroLicencia;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }

    //Metodos de acceso

    // GET
    public function getNroEmpleado(){
        return $this->nroEmpleado;
    }

    public function getNroLicencia(){
        return $this->nroLicencia;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    // SET
    public function setNroEmpleado($nroEmpleado){
        $this->nroEmpleado = $nroEmpleado;
    }

    public function setNroLicencia($nroLicencia){
        $this->nroLicencia = $nroLicencia;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    // Metodo toString
    public function __toString()
    {
        $cadena = '';
        $cadena = "Numero de empleado: ". $this->getNroEmpleado().
        "\n Numero de Licencia: ". $this->getNroLicencia().
        "\n Nombre: ". $this->getNombre().
        "\n Apellido: ". $this->getApellido(). "\n ";
        return $cadena;
    }
}

?>