<?php
include_once ("viajeFeliz.php");

/* 
    Nombre:Facundo Nahuel
    Apellido: Morales
    Legajo:FAI-3294
*/

 /* Muestra un menu de opciones por pantalla */

function menu (){
    echo"\n------------- Menu VIAJE FELIZ -------------\n";
    echo"1) Cargar informacion de viaje\n";
    echo"2) Modificar destino\n";
    echo"3) Modificar cantidad maxima de pasajeros\n";
    echo"4) Modificar codigo de viaje\n";
    echo"5) Modificar datos de pasajero\n";
    echo"6) Agregar pasajero\n";
    echo"7) Borrar pasajero\n";
    echo"8) Ver datos de viaje\n";
    echo"9) Ver datos de los pasajeros\n";
    echo"10) SALIR\n";
    echo"--------------------------------------------\n";

}
/**
 * Carga los datos de viaje, retornando el objeto con su codigo de viaje, destino y cantidad maxima de pasajeros
 * @return object
 */
function cargarDatosViaje(){
    echo"--------------- DATOS DE VIAJE ---------------\n";
    echo"Ingrese el codigo de viaje:";
    $codViaje = trim(fgets(STDIN));
    echo"Ingrese el nombre de destino:";
    $destino = trim(fgets(STDIN));
    echo"Ingrese la cantidad maxima de pasajeros:";
    $cantidadMax = trim(fgets(STDIN));
    return new Viaje($codViaje, $destino, $cantidadMax);
}

/**
 * Permite el ingreso de los datos de un pasajero, devolviendo un array con su nombre, apellido y numero de documento
 * @return array
 */

function cargarPasajero(){
    echo"Ingrese el nombre del pasajero:";
    $nombre = trim(fgets(STDIN));
    echo"Ingrese el apellido del pasajero:";
    $apellido = trim(fgets(STDIN));
    echo"Ingrese el DNI del pasajero:";
    $nroDocumento = trim(fgets(STDIN));
    $pasajero = ["nombre" => $nombre, "apellido" => $apellido, "nroDocumento" => $nroDocumento];
    return $pasajero;
}

//Inicializacion de variables
$datosViaje = cargarDatosViaje();
$opcion = 0;

//Menu de opciones
while($opcion != 10){
    menu();
    $opcion = trim(fgets(STDIN));
    switch($opcion){
        case 1: //Carga los datos de viaje
            $datosViaje = cargarDatosViaje();
            break;
        case 2:  //Modifica el destino del viaje
            echo"El destino actual es:".$datosViaje -> getnombreDestino();
            echo"\nIngrese el nuevo destino:";
            $nvoDestino = trim(fgets(STDIN));
            $datosViaje -> setnombreDestino($nvoDestino);
            echo"--------------------------------------------\n";
            echo"         El destino nuevo es:".$datosViaje -> getnombreDestino(). "\n";
            echo"--------------------------------------------\n";
            break;
        case 3: //Modifica la cantidad maxima de pasajeros
            echo"La cantidad maxima de pasajeros es:".$datosViaje -> getCantMaxPasajeros();
            echo"\nIngrese la nueva capacidad maxima de pasajeros:";
            $nvoCantMax = trim(fgets(STDIN));
            $datosViaje -> setCantMaxPasajeros($nvoCantMax);
            echo"--------------------------------------------\n";
            echo"La capacidad maxima de pasajeros ahora es de:".$datosViaje -> getCantMaxPasajeros()."\n";
            echo"--------------------------------------------\n";
            break;
        case 4: //Modifica el codigo de destino
            echo"El codigo de viaje actual es:".$datosViaje -> getCodigoViaje();
            echo"\nIngrese el nuevo codigo de viaje:";
            $nvoCodViaje = trim(fgets(STDIN));
            $datosViaje -> setCodigoViaje($nvoCodViaje);
            echo"--------------------------------------------\n";
            echo"       El codigo de viaje nuevo es:".$datosViaje -> getCodigoViaje(). "\n";
            echo"--------------------------------------------\n";
            break;
        case 5: //Modifica los datos de un pasajero
            echo"DATOS A MODIFICAR:\n";
            $pasajero = cargarPasajero();
            if($datosViaje -> existenDatos($pasajero)){
                echo"DATOS NUEVOS:\n";
                $pasajeroNvo = cargarPasajero();
                $datosViaje -> modifDatosPasajero($pasajero, $pasajeroNvo);
                echo"--------------------------------------------\n";
                echo" Los datos del pasajero fueron cambiados\n";
                echo"--------------------------------------------\n";
            } else {
                echo"--------------------------------------------\n";
                echo" Los datos no coinciden con ningun pasajero\n";
                echo"--------------------------------------------\n";
            }
            break;
        case 6: //Agrega un pasajero 
            $pasajero = cargarPasajero();
            if($datosViaje -> hayEspacioDisp()){
                if(!($datosViaje -> existenDatos($pasajero))){ // Verifica que no exista un pasajero con los datos ingresados
                    $datosViaje -> agregarPasajero($pasajero);
                    echo"--------------------------------------------\n";
                    echo"   El pasajero fue agregado exitosamente\n";
                    echo"--------------------------------------------\n";
                } else {
                    echo"--------------------------------------------\n";
                    echo"          El pasajero ya existe\n";
                    echo"--------------------------------------------\n";
                }
            } else {
                echo"--------------------------------------------\n";
                echo"        No hay espacio disponible\n";
                echo"--------------------------------------------\n";
            }
            break;
        case 7: //Elimina los datos de un pasajero
            echo"DATOS DE PASAJERO A ELIMINAR:\n";
            $pasajero = cargarPasajero();
            if($datosViaje -> existenDatos($pasajero)){
                $datosViaje -> borrarPasajero($pasajero);
                echo"--------------------------------------------\n";
                echo"      Pasajero borrado correctamente\n";
                echo"--------------------------------------------\n";                
            } else {
                echo"--------------------------------------------\n";
                echo"Los datos no coinciden con ningun pasajero\n";
                echo"--------------------------------------------\n";
            }
            break;
        case 8: //Permite ver los datos del viaje
            echo $datosViaje;
            break;
        case 9: //Permite ver los datos de los pasajeros
            foreach($datosViaje -> getPasajeros() as $indice => $valor){
                $nombre = $valor["nombre"];
                $apellido = $valor["apellido"];
                $nroDocumento = $valor["nroDocumento"];
                $nroPasajero = $indice + 1;
                echo"Pasajero ".$nroPasajero. "\nNombre:".$nombre."\nApellido:".$apellido."\nNumero de documento:".$nroDocumento;
                echo"\n--------------------------------------------\n";
            }
            break;
    }
    
}
echo"\n ----------- PROGRAMA FINALIZADO -----------";