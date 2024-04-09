<?php 
class Viaje{

   private $codigoViaje;
   private $destino;
   private $cantidadPasajero;
   private $objColPasajero;
   private $objPersonaResp;

   public function __construct($codigoViaje,$destino,$cantidadPasajero,$objColPasajero,$objPersonaResp){
$this->codigoViaje=$codigoViaje;
$this->destino=$destino;
$this->cantidadPasajero=$cantidadPasajero;
$this->objColPasajero=$objColPasajero;
$this->objPersonaResp=$objPersonaResp;
   }
public function getCodigoViaje(){
    return $this->codigoViaje;
}
public function getDestino(){
    return $this->destino;
}
public function getCantidadPasajero(){
    return $this->cantidadPasajero;
}
public function getObjColPasajero(){
    return $this->objColPasajero;
}
public function getObjPersonaResp(){
    return $this->objPersonaResp;
 }
public function setCodigoViaje($codigoViaje){
    $this->codigoViaje=$codigoViaje;
}
public function setDestino($destino){
    $this->destino=$destino;
} 
public function setCantidadPasajero($cantidadPasajero){
    $this->cantidadPasajero=$cantidadPasajero;
}  
public function setObjColPasajero($objColPasajero){
    $this->objColPasajero=$objColPasajero;
}
public function setObjPersonaResp($objPersonaResp){
    $this->objPersonaResp=$objPersonaResp;
}


public function venderPasaje($pasajero){
    $pasaje = false; 
    if (in_array($pasajero,$this->getobjColPasajero())) {
        $pasaje = false; 
    } else {
        $objPasajero=$this->getObjColPasajero();
        array_push($objPasajero,$pasajero);
        $this->setObjColPasajero($objPasajero);
        $pasaje = true;
    }
    return $pasaje;
}


public function hayPasajesDisponible(){
    $res= true;
    if ($this->getCantidadPasajero()<=(count($this->getObjColPasajero()))){
        $res= false;
    }
    return $res;
}


public function eliminarPasajero($pasajero){
    $reducir = false;
    $pasaje = $this->getObjColPasajero()();
    if(in_array($pasajero, $pasaje)){
        $cod = array_search($pasajero, $pasaje);
        array_splice($pasaje, $cod, 1);
        $this->setObjColPasajero($pasaje);
        $reducir = true;
    }
    return $reducir;
}


public function cambiaDatosPasajeros($pasajero, $otroPasajero){
    $psajero_=false;
    if (in_array($pasajero,$this->getObjColPasajero())) {
        $key =array_search($pasajero, $this->getObjColPasajero());
        $this->getObjColPasajero()[$key]=$otroPasajero;
        $psajero_=true;
    }
    return $psajero_;
}


public function mostrarPasajero(){
    $mostrarPasajero=[];
    $i=0;
    $objPasaje=$this->getObjColPasajero();
    foreach ($objPasaje as $key => $value){
        $nombre=$value['nombre'];
        $apellido=$value['apellido'];
        $dni=$value['DNI'];
        $telefono=$value['telefono'];
      $pasajero=new pasajero($nombre,$apellido,$dni,$telefono);
     //  $mostrarPasajero[$i]=array("nombre"=>$nombre,"apellido"=>$apellido,"DNI"=>$dni,"telefono"=>$telefono);
     array_push($mostrarPasajero,$pasajero);
       $i++; 
    }
    //return print_r($mostrarPasajero);
    return $mostrarPasajero;
}



public function __toString(){
    $listaP= print_r($this->getObjColPasajero());
    $viaje="           !DATOS DEL VIAJE! \n". 
    "Codigo del Viaje: ".$this->getCodigoViaje(). "\n". 
    "Destino: ".$this->getDestino();
    "numero de Pasajero: ".$this->getCantidadPasajero() ."\n". 
    "Lista de Pasajeros: ".$listaP."\n". 
    "\n                ¡Información Persona Responsable!".
    "\n".$this->getObjPersonaResp()."\n";
    return $viaje;
       }
      
}
