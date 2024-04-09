<?php 

/* 
    Nombre: Facundo Nahuel
    Apellido: Morales
    Legajo:FAI-3294
 */

/*
    La empresa de Transporte de Pasajeros “Viaje Feliz” quiere registrar la información referente a sus viajes.
    De cada viaje se precisa almacenar el código del mismo, destino, cantidad máxima de pasajeros y los pasajeros del viaje.

    Realice la implementación de la clase Viaje e implemente los métodos necesarios para modificar los atributos de dicha clase (incluso los datos de los pasajeros). 
    Utilice clases y arreglos  para   almacenar la información correspondiente a los pasajeros. Cada pasajero guarda  su “nombre”, “apellido” y “numero de documento”.

    Implementar un script testViaje.php que cree una instancia de la clase Viaje y presente un menú que permita cargar la información del viaje, modificar y ver sus datos.

    Modificar la clase Viaje para que ahora los pasajeros sean un objeto que tenga los atributos nombre, apellido, numero de documento y teléfono.
    El viaje ahora contiene una referencia a una colección de objetos de la clase Pasajero.
    También se desea guardar la información de la persona responsable de realizar el viaje, para ello cree una clase ResponsableV que registre el número de empleado, número de licencia, nombre y apellido. 
    La clase Viaje debe hacer referencia al responsable de realizar el viaje.

    Implementar las operaciones que permiten modificar el nombre, apellido y teléfono de un pasajero.
    Luego implementar la operación que agrega los pasajeros al viaje, solicitando por consola la información de los mismos.
    Se debe verificar que el pasajero no este cargado mas de una vez en el viaje. De la misma forma cargue la información del responsable del viaje.
*/

class Viaje{
    //Atributos
    //int $codigoViaje, $cantPasajeros, $cantMaxPasajeros
    //string $nombreDestino
    //array $pasajeros
    private $codigoViaje;
    private $nombreDestino;
    private $cantMaxPasajeros;
    private $cantPasajeros;
    private $pasajeros = [];
    private $responsableV;

    //METODOS
    public function __construct($codigoViaje, $nombreDestino, $cantMaxPasajeros)
    {
        $this -> codigoViaje = $codigoViaje;
        $this -> nombreDestino = $nombreDestino;
        $this -> cantMaxPasajeros = $cantMaxPasajeros;

    }

    public function getCodigoViaje(){
        return $this -> codigoViaje;
    }

    public function setCodigoViaje($codigoViaje){
        $this -> codigoViaje = $codigoViaje;
    }

    public function getnombreDestino(){
        return $this -> nombreDestino;
    }

    public function setnombreDestino($nombreDestino){
        $this -> nombreDestino = $nombreDestino;    
    }

    public function getCantMaxPasajeros(){
        return $this -> cantMaxPasajeros;
    }

    public function setCantMaxPasajeros($cantMaxPasajeros){
        $this -> cantMaxPasajeros = $cantMaxPasajeros;
    }

    public function getCantPasajeros(){
        return $this -> cantPasajeros;
    }

    public function setCantPasajeros($cantPasajeros){
        $this -> cantPasajeros = $cantPasajeros;
    }

    public function getPasajeros(){
        return $this -> pasajeros;
    }

    public function setPasajeros($pasajeros){
        $this -> pasajeros = $pasajeros;
    }

    public function getResponsableV (){
        return $this -> responsableV;
    }

    public function setResponsableV ($responsableV){
        $this -> responsableV = $responsableV;
    }

    /**
     * metodo para agregar un pasajero nuevo 
     * @param object $pasajero
     * @return boolean
     */
    public function agregarPasajero ($pasajero){
        $arrayPasajeros = $this->getPasajeros();
        array_push($arrayPasajeros, $pasajero);
        $this -> setPasajeros($arrayPasajeros);
        }
     
    /**
     * metodo que permite borrar un pasajero
     * @param string $dniPasajero
     *  
     */
    public function borrarPasajero ($dniPasajero){
        $arrayPasajeros = $this -> getPasajeros();
        $arrayOrd = [];
        $i = 0;
        $it = 0;
        while($dniPasajero != $arrayPasajeros[$i] -> getNroDocumento() ){
            $i++;
        }
        unset($arrayPasajeros[$i]);
        foreach($arrayPasajeros as $valor){ //intercambia los indices luego de eliminar un pasajero
            $arrayOrd [$it] = $valor;
            $it++; 
        }
        $this -> setPasajeros($arrayOrd);
    }

    /**
     * metodo que verifica si los datos de un pasajero ya existen
     * @param object $dni
     * @return boolean
     */
    public function existenDatos($dni){
        $arrayPasajeros = $this -> getPasajeros();   
        $existeDato = false; 
        $i = 0;
        if(isset($arrayPasajeros[0])){
        while(count($arrayPasajeros) - 1 > $i && $arrayPasajeros[$i] -> getNroDocumento() != $dni){
            $i++;
        }
        if($arrayPasajeros[$i] -> getNroDocumento() == $dni){
            $existeDato = true;
        }   
    }
        return $existeDato;
    }

    /**
     * metodo que verifica si hay lugar disponible en un viaje
     * @return boolean 
     */
    public function hayEspacioDisp (){
        $hayEspacio = false;
        if(count($this -> getPasajeros()) < $this -> getCantMaxPasajeros()){
            $hayEspacio = true;
        }
        return $hayEspacio;
    }

    /**
     * metodo que modifica los datos de un pasajero
     * @param string $dniPasajero
     * @param object $pasajeroNvo
     */
    public function modifDatosPasajero ($dniPasajero, $pasajeroNvo) {
        $arrayPersonas = $this -> getPasajeros();
        $i = 0;
            while($arrayPersonas[$i] -> getNroDocumento() != $dniPasajero){
                $i++;
            }
        $arrayPersonas[$i] = $pasajeroNvo;
        $this -> setPasajeros($arrayPersonas);
    }

    public function __toString()
    {
        $mensaje = "Codigo de viaje:".$this -> getCodigoViaje(). "\nNombre de destino:".$this -> getnombreDestino()."\nCantidad maxima de pasajeros:".$this -> getCantMaxPasajeros()."\n";
        $pasajeros = $this -> getPasajeros();
        $responsable = $this -> getResponsableV();
        foreach ($pasajeros as $indice => $valor){
            $nroPasajero = $indice + 1;
            $mensaje = $mensaje. "\nPasajero nro:".$nroPasajero."\n".$valor;
        }
        $mensaje = $mensaje. "\nResponsable de viaje:\n" .$responsable;
        return $mensaje;
    }
}
