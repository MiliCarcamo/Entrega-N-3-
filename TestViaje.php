<?php
include_once 'Pasajero.php';
include_once 'PasajeroVIP.php';
include_once 'PasajeroEspecial.php';
include_once 'ResponsableV.php';
include_once 'Viaje.php';

// Creo algunos pasajeros
$pasajero1 = new Pasajero('Laura,', 'Perez',111111111,2995000000,12,1010);
$pasajero2 = new Pasajero('Pepe,', 'Perez',222222222,2995111111,13,1212);
$pasajero3 = new Pasajero('Mirta,', 'Perez',333333333,2995222222,14,1313);

// Creo el arreglo indexado con los pasajeros
$pasajeros = [$pasajero1, $pasajero2, $pasajero3];

//datos del responsable del viaje
$objResponsableV = new ResponsableV(2525, 2121, 'Pepe', 'Lopez');

// Creo un viaje
$objViaje1 = new Viaje(1111, 'Misiones',10, $pasajeros,$objResponsableV,5000);

// Creo un pasajero VIP y 1 Pasajero Especial para las clases hijas
$objPasajeroVIP1 = new PasajeroVIP('Juan', 'Lopez', 555555555,2995070405,8,88,488,5200);
$objPasajeroEspecial1 = new PasajeroEspecial('Alma', 'Muñoz',999999999,5555555555,63,52,'NO','NO','SI');


/**
 * Funcion que va a almacenar la informacion de los pasajeros
 * @param Int $cantidad
 * @return Aray
 */
function informacionPasajeros($cantidad){
    //arrayPersonas: arreglo asociativo que va a guardar, nombre, apellido y dni. Estas son las claves
    $arrayPersonas = [];
    for ($i=0; $i < $cantidad; $i++) { 
        echo "Ingrese los datos del pasajero/a: \n " ;
        echo "Nombre: ";
        $nombre = trim(fgets(STDIN));
        echo "Apellido: ";
        $apellido = trim(fgets(STDIN));
        echo "Dni: ";
        $dni = trim(fgets(STDIN));
        echo "Ingrese el telefono: ";
        $telefono = trim(fgets(STDIN));
        echo "Ingrese el numero de asiento: ";
        $nroAsiento = trim(fgets(STDIN));
        echo "Ingrese el numero de ticket: ";
        $nroTicket = trim(fgets(STDIN));
        $objPasajero= new Pasajero($nombre, $apellido, $dni, $telefono, $nroAsiento, $nroTicket);
        //Almaceno los datos de las personas
        $arrayPersonas[$i] = $objPasajero;
        
    }
    return $arrayPersonas;
}

/**
 * Funcion que busca a un pasajero, para luego modificarlo
 * @return array
 */
function pasajero(){
    echo "Nombre del pasajero: ";
    $nombrePasajero = trim(fgets(STDIN));
    echo "Apellido: ";
    $apellidoPasajero = trim(fgets(STDIN));
    echo "DNI: ";
    $dniPasajero = trim(fgets(STDIN));
    $arrayPasajero = [];
    $arrayPasajero = ['nombre' => $nombrePasajero, 'apellido' => $apellidoPasajero, 'dni' => $dniPasajero];
    return $arrayPasajero;
}




/**
 * Funcion del menu de opciones
 * @return Int
 */
function menu(){
    echo "Menu de opciones: \n
    1) Ver viaje
    2) Crear un nuevo viaje 
    3) Ver codigo del viaje 
    4) Modificar codigo de viaje
    5) Ver el destino del viaje
    6) Modificar el destino del viaje
    7) Modificar datos de un pasajero
    8) Modificar capacidad maxima
    9) Ver Responsable del Viaje.
    10) Modificar el responsable del viaje
    11) Agregar Pasajero
    12) Vencer Pasaje
    13) Salir \n";
    echo "Ingrese una opcion entre 1 y 13: ";
    $opcion = trim(fgets(STDIN));

    return $opcion;
}



// ************ PROGRAMA PRINCIPAL ************
do {

    $opcionSeleccionada = menu();
    switch ($opcionSeleccionada) {
        case '1':
            //Ver viaje
            echo "Los datos del viaje son: \n";
            echo $objViaje1;
            break;
        case '2':
            # Crear un nuevo viaje
            echo "Ingrese el codigo de viaje: ";
            $codigo = trim(fgets(STDIN));
            echo "Ingrese el destino del viaje: ";
            $destino = trim(fgets(STDIN));
            echo "Capacidad maxima de pasajeros: ";
            $capacidadMaxima = trim(fgets(STDIN));
            echo "Ingrese la cantidad de pasajeros que va a cargar: ";
            $cantPasajeros = trim(fgets(STDIN));
            if ($cantPasajeros <= $capacidadMaxima) {
                $pasajeros = informacionPasajeros($cantPasajeros);
                //Creo el objViaje, que es una nueva instancia de la clase Viaje
                $objViaje2 = new Viaje($codigo, $destino, $capacidadMaxima, $pasajeros, $objResponsableV, 80000);
                echo "Viaje creado con exito.";
            }else{
            echo "No es posible guardar los datos del Viaje. La cantidad de pasajeros, supera el maximo. \n";
            }
            break;
        case '3':
            // Ver codigo del viaje
            echo "El codigo del viaje es: ";
            echo $objViaje1->getCodigoViaje(). "\n";

            break;
        case '4':
            // Modificar codigo de viaje \n
            echo "Ingrese el nuevo codigo del viaje: ";
            $nuevoCodigo = trim(fgets(STDIN));
            $objViaje1->setCodigoViaje($nuevoCodigo);
            echo "Cambio realizado con exito. \n 
            Ahora el codigo es: ". $nuevoCodigo;
            break;
        case '5':
            //Ver el destino del viaje
            echo "El destino del viaje es: ";
            echo $objViaje1->getDestino();
            break;
        case '6':
            //Modificar el destino del viaje
            echo "Ingrese el nuevo destino del viaje: ";
            $nuevoDestino = trim(fgets(STDIN));
            $objViaje1-> setDestino($nuevoDestino);
            echo "Cambio exitoso. \n 
            Ahora el destino de viaje es: " . $nuevoDestino. "\n";
            break;
        case '7':
            //Modificar datos de un pasajero
            echo "Ingrese el DNI del pasajero que quiere modificar: ";
            $dni = trim(fgets(STDIN));
            $indice = $objViaje1->buscarIndicePasajero($dni);
            if ($indice == -1) {
                echo "El dni no se encuentra registrado.\n";
            }else {
                $pasajeroModif = $objViaje1->getArrayPasajeros($indice);
                echo "Ingrese el nuevo Nombre: ";
                $nuevoNombre = trim(fgets(STDIN));
                echo "Ingrese el nuevo apellido: ";
                $nuevoApellido = trim(fgets(STDIN));
                $pasajeroModif = $objViaje1->modificarDatosPasajeros($indice, $nuevoNombre, $nuevoApellido);
                echo "Datos modificados con exito. \n";
            }
            
            break;
        case '8':
            //Modificar capacidad maxima
            echo "Ingrese la nueva capacidad Maxima: ";
            $nuevaCapMax = trim(fgets(STDIN));
            $objViaje1->setCantMaxPasajeros($nuevaCapMax);
            echo "La nueva capacidad maxima es: ". $nuevaCapMax . "\n";
            break;
        case '9':
            # Ver Responsable del viaje
            echo $objResponsableV;
            break;
        case '10':
            #Modificar el responsable del viaje
            echo "Ingrese el nombre del responsable del viaje:";
            $nombreResponsableV = trim(fgets(STDIN));
            echo "Apellido: ";
            $apellidoResponsableV = trim(fgets(STDIN));
            echo "Numero de empleado: ";
            $nroEmpleado = trim(fgets(STDIN));
            echo "Numero de licencia: ";
            $nroLicencia = trim(fgets(STDIN));
            $objResponsableV->setNombre($nombreResponsableV);
            $objResponsableV->setApellido($apellidoResponsableV);
            $objResponsableV->setNroEmpleado($nroEmpleado);
            $objResponsableV->setNroLicencia($nroLicencia);
            echo "Los datos del nuevo responsable es: ". $objResponsableV;
            break;
        case '11':
            // Agregar Pasajero
            $capacidadMaxima = $objViaje1->getCantMaxPasajeros();
            $cantPasajeros = count($pasajeros);
            if ($capacidadMaxima > $cantPasajeros) {
                echo "Quedan lugares disponibles. \n";
                do {
                    $agregarPasajero = false; 

                    echo "¿Quiere agregar a un nuevo pasajero/a? (si/no): \n";
                    $respuesta = trim(fgets(STDIN));
                    if ($respuesta == "si") {
                        $capacidadLimite = $objViaje1->cantLugaresDisponibles();
                        if ($capacidadLimite >= $cantPasajeros) {
                            echo "Quedan ".$capacidadLimite. " asientos disponibles. Cuantos pasajeros va a agregar?: ";
                            $cantNuevosPasajeros = trim(fgets(STDIN));
                            //$nuevaCantPasajeros va a guardar la cantidad actualizada de pasajeros
                            $nuevaCantPasajeros = $cantPasajeros + $cantNuevosPasajeros;
                            if ($nuevaCantPasajeros <= $capacidadMaxima) {
                                $nuevosPasajero = informacionPasajeros($cantNuevosPasajeros);
                                $objViaje1-> agregarPasajero($nuevosPasajero);
                                $agregarPasajero = true;
                                echo "Datos guardados con exito. \n";
                            }else {
                                echo "No se puede agregar. Solo hay " . $capacidadLimite . " asiento/s disponibles \n";
                            }
                        }else{
                            echo "No hay mas lugar en el viaje. \n";
                        }

                    }
                } while ($agregarPasajero);
                echo "Pasajero agregado con exito. \n";
                
            }
            # code...
            break;
        case '12':
            # Vender Pasaje
            // Creo el nuevo pasajero
            echo "Nombre: ";
            $nombre = trim(fgets(STDIN));
            echo "Apellido: ";
            $apellido = trim(fgets(STDIN));
            echo "Dni: ";
            $dni = trim(fgets(STDIN));
            echo "Ingrese el telefono: ";
            $telefono = trim(fgets(STDIN));
            echo "Ingrese el numero de asiento: ";
            $nroAsiento = trim(fgets(STDIN));
            echo "Ingrese el numero de ticket: ";
            $nroTicket = trim(fgets(STDIN));
            $objPasajero= new Pasajero($nombre, $apellido, $dni, $telefono, $nroAsiento, $nroTicket);
            // Pregunto el tipo de pasajero
            echo "Que tipo de pasajero es? (vip / especial): " ;
            $tipo = trim(fgets(STDIN));

            if ($tipo == 'vip') {
                
            }
            break;
        default:
            # code...
            break;
    }
    
} while ($opcionSeleccionada != 13);



?>