<?php
class ResponsableV{
    private $numEmpleado;
    private $numLicencia;
    private $nombre;
    private $apellido;
public function __construct($numEmpleado,$numLicencia,$nombre,$apellido){
$this->numEmpleado = $numEmpleado;
$this->numLicencia=$numLicencia;
$this->nombre=$nombre;
$this->apellido=$apellido;
}
public function getNumEmpleado(){
    return $this->numEmpleado;
}
public function getNumLicencia(){
    return $this->numLicencia;
}
public function getNombre(){
    return $this->nombre;
}
public function getApellido(){
    return $this->apellido;
}
public function setNumEmpleado($numEmpleado){
    $this->numEmpleado = $numEmpleado;
}
public function setNumLicencia($numLicencia){
    $this->numLicencia=$numLicencia;
}
public function setNombre($nombre){
    $this->nombre=$nombre;
}
public function setApellido($apellido) {
    $this->apellido=$apellido;
}
public function __toString(){
    $PersonaRes="     DATOS DE PERSONAL RESPONSABLE DEL VIAJE! \n". 
    "Numero de Empleado: ".$this->getNumEmpleado(). "\n".
    "Numero de Licencia: ".$this->getNumLicencia() ."\n". 
    "Nombre: ".$this->getNombre() ."\n". 
    "Apellidos: ".$this->getApellido() ."\n";
    return $PersonaRes;
}
}
