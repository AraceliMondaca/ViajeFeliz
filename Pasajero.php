<?php 
final class Pasajero{
    private $nombre;
    private $apellido;
    private $numeroDocumento;
    private $telefono;
public function __construct($nombre,$apellido,$numeroDocumento,$telefono){
    $this->nombre=$nombre;
    $this->apellido=$apellido;
    $this->numeroDocumento=$numeroDocumento;
    $this->telefono=$telefono;
}
public function getNombre() {
    return $this->nombre;
}
public function getApellido(){
    return $this->apellido;
}
public function getNumeroDocumerto(){
    return $this->numeroDocumento;
}
public function getTelefono(){
    return $this->telefono;
}
public function setNombre($nombre){
    $this->nombre=$nombre;
}
public function setApellido($apellido){
    $this->apellido=$apellido;
}
public function setNumeroDocumento($numeroDocumento){
    $this->numeroDocumento=$numeroDocumento;
}
public function telefono($telefono){
    $this->telefono=$telefono;
}
public function __toString(){
    
    $pasajeros= "PASAJERO: \n".
    "nombre: ".$this->getNombre()."\n". 
    "apellido: ".$this->getApellido()."\n". 
    "Numero de documento: ".$this->getNumeroDocumerto() ."\n";
    return $pasajeros;
}
    
}
