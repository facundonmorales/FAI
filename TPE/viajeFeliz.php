<?php 

/* 
    Nombre:Facundo Nahuel
    Apellido: Morales
    Legajo:FAI-3294
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

    /**
     * Metodo para agregar un pasajero nuevo 
     * @param array $pasajero
     * @return boolean
     */
    public function agregarPasajero ($pasajero){
        $arrayPasajeros = $this->getPasajeros();
        array_push($arrayPasajeros, $pasajero);
        $this -> setPasajeros($arrayPasajeros);
        }
     
    /**
     * metodo que permite borrar un pasajero
     * @param array $arrayPasajeros
     *  
     */
    public function borrarPasajero ($pasajero){
        $arrayPasajeros = $this -> getPasajeros();
        $arrayOrd = [];
        $i = 0;
        $it = 0;
        while($pasajero != $arrayPasajeros[$i]){
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
     * @param array $datosPasajero
     * @return boolean
     */
    public function existenDatos($datosPasajero){
        $arrayPasajeros = $this -> getPasajeros();   
        $existeDato = false; 
        $i = 0;
        if(isset($arrayPasajeros[0])){
        while(count($arrayPasajeros) - 1 > $i && $arrayPasajeros[$i] != $datosPasajero){
            $i++;
        }
        if($arrayPasajeros[$i] == $datosPasajero){
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
     * @param array $pasajero
     * @param array $pasajeroNuevo
     */
    public function modifDatosPasajero ($pasajero, $pasajeroNuevo) {
        $arrayPersonas = $this -> getPasajeros();
        $i = 0;
            while($arrayPersonas[$i] != $pasajero){
                $i++;
            }
        $arrayPersonas[$i] = $pasajeroNuevo;
        $this -> setPasajeros($arrayPersonas);
    }

    public function __toString()
    {
        return "Codigo de viaje:".$this -> getCodigoViaje(). "\nNombre de destino:".$this -> getnombreDestino()."\nCantidad maxima de pasajeros:".$this -> getCantMaxPasajeros()."\n";
    }
}
